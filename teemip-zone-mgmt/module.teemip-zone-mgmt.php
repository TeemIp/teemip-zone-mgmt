<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

/** @noinspection PhpUnhandledExceptionInspection */
SetupWebPage::AddModule(
	__FILE__, // Path to the current file, all other file names are relative to the directory containing this file
	'teemip-zone-mgmt/3.1.2',
	array(
		// Identification
		//
		'label' => 'Zone Management',
		'category' => 'business',

		// Setup
		//
		'dependencies' => array(
			'teemip-ip-mgmt/3.1.0',
			'teemip-ipv6-mgmt/3.1.0',
			'teemip-network-mgmt/3.1.0',
		),
		'mandatory' => false,
		'visible' => true,
		'installer' => 'ZoneManagementInstaller',

		// Components
		//
		'datamodel' => array(
			'vendor/autoload.php',
			'src/Hook/ReleaseRRsFromObsoleteIPs.php',
			'model.teemip-zone-mgmt.php',
		),
		'webservice' => array(),
		'data.struct' => array(// add your 'structure' definition XML files here,
		),
		'data.sample' => array(
			'data/data.sample.Zone.xml',
			'data/data.sample.ResourceRecordType.xml',
			'data/data.sample.ARecord.xml',
			'data/data.sample.AAAARecord.xml',
			'data/data.sample.CNAMERecord.xml',
			'data/data.sample.DSRecord.xml',
			'data/data.sample.GenericRecord.xml',
			'data/data.sample.MXRecord.xml',
			'data/data.sample.NSRecord.xml',
			'data/data.sample.OPENPGPKEYRecord.xml',
			'data/data.sample.PTRRecord.xml',
			'data/data.sample.SRVRecord.xml',
			'data/data.sample.SSHFPRecord.xml',
			'data/data.sample.TLSARecord.xml',
			'data/data.sample.TXTRecord.xml',
		),

		// Documentation
		//
		'doc.manual_setup' => '',
		'doc.more_information' => '',

		// Default settings
		//
		'settings' => array(
			'rr_release_on_ip_status' => array(
				'enabled' => false,
				'debug' => false,
				'periodicity' => 3600,
				'status_list' => array('released', 'unassigned'),
			),
		),
	)
);

if (!class_exists('ZoneManagementInstaller')) {
	// Module installation handler
	//
	class ZoneManagementInstaller extends ModuleInstallerAPI
	{
		public static function BeforeWritingConfig(Config $oConfiguration)
		{
			// If you want to override/force some configuration values, do it here
			return $oConfiguration;
		}

		/**
		 * Handler called before creating or upgrading the database schema
		 * @param $oConfiguration Config The new configuration of the application
		 * @param $sPreviousVersion string PRevious version number of the module (empty string in case of first install)
		 * @param $sCurrentVersion string Current version number of the module
		 */
		public static function BeforeDatabaseCreation(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion)
		{
			// If you want to migrate data from one format to another, do it here
		}

		/**
		 * Handler called after the creation/update of the database schema
		 * @param $oConfiguration Config The new configuration of the application
		 * @param $sPreviousVersion string PRevious version number of the module (empty string in case of first install)
		 * @param $sCurrentVersion string Current version number of the module
		 */
		public static function AfterDatabaseCreation(Config $oConfiguration, $sPreviousVersion, $sCurrentVersion)
		{
			// For migration from 1.0.0 or 1.1.0 to 1.2.0 and above
			// Remove ResourceRecord class from the DNSObject tree and move it directly under cmdbAbstractObject class
			// Delete release_date from IPSubnet
			// Migrate allocation_date and release_date from IPAddress to IPObject
			// Delete allocation_date and release_date from IPAddress

			if (($sPreviousVersion == '1.0.0') || ($sPreviousVersion == '1.1.0')) {
				SetupLog::Info("Module teemip-zone-mgmt: remove ResourceRecord class from the DNSObject tree and move it directly under cmdbAbstractObject class");

				$sDNSObjectTable = MetaModel::DBGetTable('DNSObject');
				$sRRTable = MetaModel::DBGetTable('ResourceRecord');
				$sCopy = "UPDATE `$sRRTable` AS rr JOIN `$sDNSObjectTable` AS d ON rr.id = d.id SET rr.finalclass = d.finalclass, rr.org_id = d.org_id, rr.name = d.name, rr.comment = d.comment";
				CMDBSource::Query($sCopy);

				$sRemove = "DELETE FROM `$sDNSObjectTable` WHERE finalclass IN ('ARecord', 'AAAARecord', 'CNAMERecord', 'MXRecord', 'NSRecord', 'PTRRecord', 'SRVRecord', 'TextRecord')";
				CMDBSource::Query($sRemove);

				SetupLog::Info("Module teemip-zone-mgmt: migration done");
			}

			if (in_array($sPreviousVersion, array('2.7.0', '2.6.2', '2.6.1', '2.6.0', '1.2.0'))) {
				SetupLog::Info("Module teemip-zone-mgmt: move zone authoritative servers from obsolete lnkServerToZone to new lnkFunctionalCIToZone");

				$sDBSubname = $oConfiguration->Get('db_subname');
				$sCopy = "INSERT INTO ".$sDBSubname."lnkfunctionalcitozone (functionalci_id, zone_id, authority) SELECT server_id, zone_id, authority FROM ".$sDBSubname."lnkservertozone";
				CMDBSource::Query($sCopy);

				SetupLog::Info("Module teemip-zone-mgmt: migration done");
			}

			// Load audit category and rules related to the module
			if (version_compare($sPreviousVersion, $sCurrentVersion, '!=')) {
				$oDataLoader = new XMLDataLoader();

				CMDBObject::SetTrackInfo("Initialization");
				$oMyChange = CMDBObject::GetCurrentChange();

				$sLang = null;
				// Try to get app. language from configuration fil (app. upgrade)
				$sConfigFileName = APPCONF.'production/'.ITOP_CONFIG_FILE;
				if (file_exists($sConfigFileName)) {
					$oFileConfig = new Config($sConfigFileName);
					if (is_object($oFileConfig)) {
						$sLang = str_replace(' ', '_', strtolower($oFileConfig->GetDefaultLanguage()));
					}
				}

				// If still no language, get the default one
				if (null === $sLang) {
					$sLang = str_replace(' ', '_', strtolower($oConfiguration->GetDefaultLanguage()));
				}

				$sFileName = dirname(__FILE__)."/data/".$sLang.".data.teemip-zone-mgmt.xml";
				SetupLog::Info("Searching file: $sFileName");
				if (!file_exists($sFileName)) {
					$sFileName = dirname(__FILE__)."/data/en_us.data.teemip-zone-mgmt.xml";
				}
				SetupLog::Info("Loading file: $sFileName");
				$oDataLoader->StartSession($oMyChange);
				$oDataLoader->LoadFile($sFileName, false, true);
				$oDataLoader->EndSession();
			}
		}
	}
}

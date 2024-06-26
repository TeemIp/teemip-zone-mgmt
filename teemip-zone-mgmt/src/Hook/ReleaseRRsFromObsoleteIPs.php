<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\ZoneManagement\Hook;

use CMDBObject;
use CMDBObjectSet;
use DateTime;
use DBObjectSearch;
use Exception;
use iScheduledProcess;
use MetaModel;

class ReleaseRRsFromObsoleteIPs implements iScheduledProcess
{
	const MODULE_CODE = 'teemip-zone-mgmt';
	const FUNCTION_CODE = 'rr_release_on_ip_status';
	const FUNCTION_SETTING_ENABLED = 'enabled';
	const FUNCTION_SETTING_DEBUG = 'debug';
	const FUNCTION_SETTING_PERIODICITY = 'periodicity';
	const FUNCTION_SETTING_STATUS_LIST = 'status_list';

	const DEFAULT_FUNCTION_SETTING_ENABLED = true;
	const DEFAULT_FUNCTION_SETTING_DEBUG = false;
	const DEFAULT_FUNCTION_SETTING_PERIODICITY = 3600;
	const DEFAULT_FUNCTION_SETTING_STATUS_LIST = ['released', 'unassigned'];

	protected $aDefaultSettings = array();
	protected $bDebug;

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		$this->aDefaultSettings = array(
			static::FUNCTION_SETTING_ENABLED => static::DEFAULT_FUNCTION_SETTING_ENABLED,
			static::FUNCTION_SETTING_DEBUG => static::DEFAULT_FUNCTION_SETTING_DEBUG,
			static::FUNCTION_SETTING_PERIODICITY => static::DEFAULT_FUNCTION_SETTING_PERIODICITY,
			static::FUNCTION_SETTING_STATUS_LIST => static::DEFAULT_FUNCTION_SETTING_STATUS_LIST
		);
		$aFunctionSettings = MetaModel::GetModuleSetting(static::MODULE_CODE, static::FUNCTION_CODE, $this->aDefaultSettings);
		$this->bDebug = (bool) $aFunctionSettings[static::FUNCTION_SETTING_DEBUG];
	}

	public static function GetObsoleteStatusList()
	{
		$aDefaultSettings = array(
			static::FUNCTION_SETTING_ENABLED => static::DEFAULT_FUNCTION_SETTING_ENABLED,
			static::FUNCTION_SETTING_DEBUG => static::DEFAULT_FUNCTION_SETTING_DEBUG,
			static::FUNCTION_SETTING_PERIODICITY => static::DEFAULT_FUNCTION_SETTING_PERIODICITY,
			static::FUNCTION_SETTING_STATUS_LIST => static::DEFAULT_FUNCTION_SETTING_STATUS_LIST
		);
		$aFunctionSettings = MetaModel::GetModuleSetting(static::MODULE_CODE, static::FUNCTION_CODE, $aDefaultSettings);
		$aStatusList = $aFunctionSettings[static::FUNCTION_SETTING_STATUS_LIST];

		return $aStatusList;
	}

	/**
	 * Read module settings and return parameters required for the process to run
	 *
	 * @return array
	 */
	private function GetSetting(): array
	{
		$aFunctionSettings = MetaModel::GetModuleSetting(static::MODULE_CODE, static::FUNCTION_CODE, $this->aDefaultSettings);
		return [
			(bool) $aFunctionSettings[static::FUNCTION_SETTING_ENABLED],
			$aFunctionSettings[static::FUNCTION_SETTING_PERIODICITY],
			$aFunctionSettings[static::FUNCTION_SETTING_STATUS_LIST]
		];
	}

	/**
	 * Gives the exact time at which the process must be run next time
	 *
	 * @return \DateTime
	 * @throws \Exception
	 */
	public function GetNextOccurrence()
	{
		// Get module parameters and postpone next occurrence if function is disabled
		list ($bEnabled, $sPeriodicity) = $this->GetSetting();
		$oRet = new DateTime();
		if (!$bEnabled) {
			$sPeriodicity = '86400';
		}
		$oRet->modify('+'.$sPeriodicity.' seconds');

		return $oRet;
	}

	/**
	 * @inheritdoc
	 */
	public function Process($iUnixTimeLimit)
	{
		// Get module parameters and don't run the process if the module is disabled
		list ($bEnabled, $iPeriodicity, $aStatusList) = $this->GetSetting();
		if (!$bEnabled) {
			return 'Process being disabled for the time being, execution has not run.';
		}

		$aReport = array(
			'rr-released' => 0,
		);

		CMDBObject::SetTrackInfo('Automatic - Background task to release Resource Records from obsolete IPs');
		CMDBObject::SetTrackOrigin('custom-extension');

		// Get list of organizations for which IPs are released when CIs are obsoleted
		$oOrgToCleanSet = new CMDBObjectSet(DBObjectSearch::FromOQL("SELECT Organization AS o JOIN IPConfig AS ic ON ic.org_id = o.id WHERE ic.ip_update_dns_records = 'yes' AND ic.remove_rr_on_ip_obsolete = 'yes'"));
		if ($oOrgToCleanSet->Count() == 0) {
			$this->Trace('No organization has activated this feature. Exiting...');

			return '';
		}
		// Build list for OQL query
		$sOrgToCleanList = "";
		$i = 0;
		while ($oOrg = $oOrgToCleanSet->Fetch()) {
			if ($i++ == 0) {
				$sOrgToCleanList = "(".$oOrg->GetKey();
			} else {
				$sOrgToCleanList .= ", ".$oOrg->GetKey();
			}
		}
		$sOrgToCleanList .= ")";

		// 1st step: get list of status that trigger the release action
		$sStatusList = "";
		$i = 0;
		foreach ($aStatusList as $sStatus) {
			if ($i++ == 0) {
				$sStatusList = "('$sStatus'";
			} else {
				$sStatusList .= ", '$sStatus'";
			}
		}
		$sStatusList .= ")";

		// 2nd step: delete A, AAAA, CNAME and PTR records attached to obsolete IPs
		$aRecordToCheck = [
			'A' => "SELECT ARecord AS rr JOIN IPv4Address AS ip ON rr.ip_id = ip.id WHERE ip.status IN $sStatusList AND ip.org_id IN $sOrgToCleanList",
			'AAAA' => "SELECT AAAARecord AS rr JOIN IPv6Address AS ip ON rr.ip_id = ip.id WHERE ip.status IN $sStatusList AND ip.org_id IN $sOrgToCleanList",
			'CNAME' => "SELECT CNAMERecord AS rr JOIN Organization AS o ON rr.org_id = o.id JOIN IPAddress AS ip ON ip.org_id = o.id WHERE rr.cname = ip.fqdn AND ip.status IN $sStatusList AND ip.org_id IN $sOrgToCleanList",
			'PTR' => "SELECT PTRRecord AS rr JOIN Organization AS o ON rr.org_id = o.id JOIN IPAddress AS ip ON ip.org_id = o.id WHERE rr.hostname = ip.fqdn AND ip.status IN $sStatusList AND o.id IN $sOrgToCleanList",
		];
		foreach ($aRecordToCheck as $sRecordName => $sOQL) {
			if (time() < $iUnixTimeLimit) {
				$oRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL));
				while ((time() < $iUnixTimeLimit) && ($oRecord = $oRecordSet->Fetch())) {
					try {
						$aReport['rr-released']++;

						$oRecord->DBDelete();
					} catch (Exception $e) {
						$this->Trace('Skipping'.$sRecordName.' Record deletion as there was an exception! ('.$e->getMessage().')');
					}
				}
			}
		}

		// Info to help understand why not all objects have been processed during this batch.
		if (time() >= $iUnixTimeLimit) {
			$this->Trace('Stopped because time limit exceeded!');
		}

		// Report
		$sReport = ($aReport['rr-released'] === 0) ? "\nNo RR have been released\n" : "\n".$aReport['rr-released']." Resource Records have been released.\n";

		return $sReport;
	}

	/**
	 * Prints a $sMessage in the CRON output.
	 *
	 * @param string $sMessage
	 */
	protected function Trace($sMessage)
	{
		if ($this->bDebug) {
			echo $sMessage."\n";
		}
	}
}

<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\ZoneManagement\Model;

use ApplicationContext;
use CMDBObjectSet;
use DBObjectSearch;
use Dict;
use DisplayBlock;
use DNSObject;
use IPConfig;
use iTopWebPage;
use MetaModel;
use TeemIp\TeemIp\Extension\Framework\Helper\IPUtils;
use utils;

class _Zone extends DNSObject
{
	const MODULE_CODE = 'teemip-zone-mgmt';
	const IPV4_PTR_PATTERN = 'ip4_ptr_pattern';
	const IPV4_SUB_CLASS_C_PTR_PATTERN = 'ipv4_sub_class_c_ptr_pattern';
	const IPV4_REVERSE_ZONE_PATTERN = 'ipv4_reverse_zone_pattern';
	const IPV4_SUB_CLASS_C_SEPARATOR = 'ipv4_sub_class_c_separator';
	const IPV4_SUB_CLASS_C_REVERSE_ZONE_PATTERN = 'ipv4_sub_classC_reverse_zone_pattern';
	const IPV6_PTR_PATTERN = 'ip6_ptr_pattern';
	const IPV6_REVERSE_ZONE_PATTERN = 'ipv6_reverse_zone_pattern';

	// x.y.z.t.in-addr.arpa.
	const DEFAULT_IPV4_PTR_PATTERN = '^((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.){4}in-addr\.arpa\.$';
	// w.u-v.x.y.z.in-addr.arpa.
	const DEFAULT_IPV4_SUB_CLASS_C_PTR_PATTERN = '^((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.)((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])-(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.)((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.){3}in-addr\.arpa\.$';
	// x.[y.][z.]in-addr.arpa.
	const DEFAULT_IPV4_REVERSE_ZONE_PATTERN = '^((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.){1,3}in-addr\.arpa\.$';
	const DEFAULT_IPV4_SUB_CLASS_C_SEPARATOR = '-';
	// u-v.x.y.z.in-addr.arpa.
	const DEFAULT_IPV4_SUB_CLASS_C_REVERSE_ZONE_PATTERN = '^((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])-(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.)((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.){3}in-addr\.arpa\.$';
	// x32.x31. ... .x2.x1.ip6..arpa.
	const DEFAULT_IPV6_PTR_PATTERN = '^((\d|[a-f]|[A-F])\.){32}ip6\.arpa\.$';
	// x32.[x31.]...[x1.]ip6..arpa.
	const DEFAULT_IPV6_REVERSE_ZONE_PATTERN = '^((\d|[a-f]|[A-F])\.){1,31}ip6\.arpa\.$';

	private $aRecordClasses = ['ARecord', 'AAAARecord', 'CAARecord', 'CNAMERecord', 'DSRecord', 'MXRecord', 'OPENPGPKEYRecord', 'SSHFPRecord', 'SRVRecord', 'TLSARecord', 'TXTRecord', 'GenericRecord'];
	private $aPrimaryRecordClasses = ['ARecord', 'AAAARecord', 'CNAMERecord'];
	private $aSecondaryRecordClasses = ['CAARecord', 'DSRecord', 'MXRecord', 'OPENPGPKEYRecord', 'SSHFPRecord', 'SRVRecord', 'TLSARecord', 'TXTRecord', 'GenericRecord'];


	/**
	 * Provides the zone that correspond to a FQDN - Works recursively
	 *
	 * @param $sFqdn
	 * @param $iView
	 * @param $sMapping
	 * @param $iOrgId
	 *
	 * @return array
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \MySQLException
	 * @throws \OQLException
	 */
	public static function GetZoneFromFqdn($sFqdn, $iView, $sMapping, $iOrgId): array
	{
		$sError = '';
		// Are we at the end of the recursive process ?
		if ((strlen($sFqdn) == 0) || ($iOrgId == 0)) {
			return array(Dict::Format('UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:'.$sMapping), 0, '');
		}
		// Look for sub class C IPv4 reverse zone
		if ($sMapping == 'ipv4reverse') {
			list ($iZoneId, $sZoneName) = self::GetIPv4SubClassCReverseZoneFromFqdn($sFqdn, $iView, $iOrgId);
			if ($iZoneId > 0) {
				return array($sError, $iZoneId, $sZoneName);
			}
		}
		// Continue lookup
		$sOQL = "SELECT Zone WHERE org_id = :org_id AND view_id = :view_id AND name = :name";
		$oZoneSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('org_id' => $iOrgId, 'view_id' => $iView, 'name' => $sFqdn));
		if ($oZone = $oZoneSet->Fetch()) {
			$iZoneId = $oZone->GetKey();
			$sZoneName = $oZone->Get('name');
		} else {
			$i = strpos($sFqdn, '.');
			$sNextFqdn = substr($sFqdn, $i + 1);
			list($sError, $iZoneId, $sZoneName) = self::GetZoneFromFqdn($sNextFqdn, $iView, $sMapping, $iOrgId);
		}

		return array($sError, $iZoneId, $sZoneName);
	}

	/**
	 * Get the IPv4 sub class C reverse zone that correspond to the given FQDN
	 *
	 * @param $sFqdn
	 * @param $iView
	 * @param $iOrgId
	 *
	 * @return int
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \MySQLException
	 * @throws \OQLException
	 */
	public static function GetIPv4SubClassCReverseZoneFromFqdn($sFqdn, $iView, $iOrgId): array
	{
		if (self::IsIPv4PTR($sFqdn)) {
			$sOQL = "SELECT Zone WHERE org_id = :org_id AND view_id = :view_id AND mapping = 'ipv4reverse'";
			$oZoneSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('org_id' => $iOrgId, 'view_id' => $iView));
			while ($oZone = $oZoneSet->Fetch()) {
				$sZoneName = $oZone->Get('name');
				if (self::IsIPv4SubClassCReverseZone($sZoneName) && self::IsInSubClassCReverseZone($sFqdn, $sZoneName)) {
					return array($oZone->GetKey(), $sZoneName);
				}
			}
		}

		return array(0, '');
	}

	/**
	 * Check is FQDN has IPv4 PTR format
	 *
	 * @param $sFqdn
	 *
	 * @return bool
	 */
	public static function IsIPv4PTR($sFqdn): bool
	{
		// Get user defined pattern if exists
		$sUserPattern = MetaModel::GetModuleSetting(self::MODULE_CODE, self::IPV4_PTR_PATTERN, '');
		$sPattern = ($sUserPattern !== '') ? $sUserPattern : self::DEFAULT_IPV4_PTR_PATTERN;
		if (preg_match('/'.$sPattern.'/', $sFqdn)) {
			return true;
		}

		return false;
	}

	/**
	 * Check is FQDN has IPv4 sub class C PTR format
	 *
	 * @param $sFqdn
	 *
	 * @return bool
	 */
	public static function IsIPv4SubClassCPTR($sFqdn): bool
	{
		// Get user defined pattern if exists
		$sUserPattern = MetaModel::GetModuleSetting(self::MODULE_CODE, self::IPV4_SUB_CLASS_C_PTR_PATTERN, '');
		$sPattern = ($sUserPattern !== '') ? $sUserPattern : self::DEFAULT_IPV4_SUB_CLASS_C_PTR_PATTERN;
		if (preg_match('/'.$sPattern.'/', $sFqdn)) {
			return true;
		}

		return false;
	}

	/**
	 * Check if the given zone is an IPv4 reverse zone
	 *
	 * @param $sZoneName
	 *
	 * @return bool
	 */
	public static function IsIPv4ReverseZone($sZoneName): bool
	{
		// Get user defined pattern if exists
		$sUserPattern = MetaModel::GetModuleSetting(self::MODULE_CODE, self::IPV4_REVERSE_ZONE_PATTERN, '');
		$sPattern = ($sUserPattern !== '') ? $sUserPattern : self::DEFAULT_IPV4_REVERSE_ZONE_PATTERN;
		if (preg_match('/'.$sPattern.'/', $sZoneName)) {
			return true;
		}

		return false;
	}

	/**
	 * Check if the given zone is an IPv4 sub class C reverse zone
	 *
	 * @param $sZoneName
	 *
	 * @return bool
	 */
	public static function IsIPv4SubClassCReverseZone($sZoneName): bool
	{
		$sUserPattern = MetaModel::GetModuleSetting(self::MODULE_CODE, self::IPV4_SUB_CLASS_C_REVERSE_ZONE_PATTERN, '');
		$sPattern = ($sUserPattern !== '') ? $sUserPattern : self::DEFAULT_IPV4_SUB_CLASS_C_REVERSE_ZONE_PATTERN;
		if (preg_match('/'.$sPattern.'/', $sZoneName)) {
			return true;
		}

		return false;
	}

	/**
	 * Check is FQDN has IPv6 PTR format
	 *
	 * @param $sFqdn
	 *
	 * @return bool
	 */
	public static function IsIPv6PTR($sFqdn): bool
	{
		// Get user defined pattern if exists
		$sUserPattern = MetaModel::GetModuleSetting(self::MODULE_CODE, self::IPV6_PTR_PATTERN, '');
		$sPattern = ($sUserPattern !== '') ? $sUserPattern : self::DEFAULT_IPV6_PTR_PATTERN;
		if (preg_match('/'.$sPattern.'/', $sFqdn)) {
			return true;
		}

		return false;
	}

	/**
	 * Check if the given zone is an IPv6 reverse zone
	 *
	 * @param $sZoneName
	 *
	 * @return bool
	 */
	public static function IsIPv6ReverseZone($sZoneName): bool
	{
		$sUserPattern = MetaModel::GetModuleSetting(self::MODULE_CODE, self::IPV6_REVERSE_ZONE_PATTERN, '');
		$sPattern = ($sUserPattern !== '') ? $sUserPattern : self::DEFAULT_IPV6_REVERSE_ZONE_PATTERN;
		if (preg_match('/'.$sPattern.'/', $sZoneName)) {
			return true;
		}

		return false;
	}

	/**
	 * Check if the FQDN belongs to the sub class C IPv4 reverse zone
	 *
	 * @param $sFqdn
	 *   . format is w1.[u1-v1].x1.y1.z1.in-addr.arpa.
	 * @param $sZoneName
	 *   . format is u2-v2.x2.y2.z2.in-addr.arpa.
	 *
	 * @return bool
	 */
	public static function IsInSubClassCReverseZone($sFqdn, $sZoneName): bool
	{
		// Make sure $sZoneName is a sub class C reverse zone
		if (!self::IsIPv4SubClassCReverseZone($sZoneName)) {
			return false;
		}
		$sClassCZoneFromZone = substr(strstr($sZoneName, '.'), 1);
		$sUserSeparator = MetaModel::GetModuleSetting(self::MODULE_CODE, self::IPV4_SUB_CLASS_C_SEPARATOR, '');
		$sSeparator = ($sUserSeparator !== '') ? $sUserSeparator : self::DEFAULT_IPV4_SUB_CLASS_C_SEPARATOR;
		$aZoneLabels = explode('.', $sZoneName);
		$aRange = explode($sSeparator, $aZoneLabels[0]);

		if (self::IsIPv4PTR($sFqdn)) {
			// Handle simple PTR first
			$sClassCZoneFromFQDN = substr(strstr($sFqdn, '.'), 1);
			if ($sClassCZoneFromFQDN != $sClassCZoneFromZone) {
				return false;
			}
		} elseif (self::IsIPv4SubClassCPTR($sFqdn)) {
			// Handle sub class C PTR next
			$sSubClassCZoneFromFQDN = substr(strstr($sFqdn, '.'), 1);
			$sClassCZoneFromFQDN = substr(strstr($sSubClassCZoneFromFQDN, '.'), 1);
			if (($sClassCZoneFromFQDN != $sClassCZoneFromZone) || ($sSubClassCZoneFromFQDN != $sZoneName)) {
				return false;
			}
		} else {
			return false;
		}

		// Check last digit of FQDN is in sub class C range
		$aFqdnLabels = explode('.', $sFqdn);
		$sLastDigit = $aFqdnLabels[0];
		if (($sLastDigit < $aRange[0]) || ($aRange[1] < $sLastDigit)) {
			return false;
		}

		return true;
	}

	/**
	 * Straighten reverse zone name if required
	 *
	 * @param $sMapping
	 * @param $sName
	 *
	 * @return string
	 */
	private function StraightenReverse($sMapping, $sName): string
	{
		if ($sMapping == 'ipv4reverse') {
			if (substr($sName, -13) != 'in-addr.arpa.') {
				if (substr($sName, -8) == 'in-addr.') {
					return ($sName.'arpa.');
				} elseif (substr($sName, -5) == 'arpa.') {
					$sName = substr($sName, 0, -5);

					return ($sName.'in-addr.arpa.');
				} else {
					return ($sName.'in-addr.arpa.');
				}
			} else {
				return ($sName);
			}
		} elseif ($sMapping == 'ipv6reverse') {
			if (substr($sName, -9) != 'ip6.arpa.') {
				if (substr($sName, -4) == 'ip6.') {
					return ($sName.'arpa.');
				} elseif (substr($sName, -5) == 'arpa.') {
					$sName = substr($sName, 0, -5);

					return ($sName.'ip6.arpa.');
				} else {
					return ($sName.'ip6.arpa.');
				}
			} else {
				return ($sName);
			}
		}

		return ($sName);
	}

	/**
	 * @inheritdoc
	 */
	protected function OnInsert()
	{
		parent::OnInsert();

		// Add '.' at the end of name and sourcedname fields if not already set
		$sName = strtolower($this->Get('name'));
		if (substr($sName, -1) != '.') {
			$this->Set('name', $sName.'.');
		}
		$sSourceDName = strtolower($this->Get('sourcedname'));
		if (substr($sSourceDName, -1) != '.') {
			$this->Set('sourcedname', $sSourceDName.'.');
		}

		// Check if reverse zone ends up with right arpa domain.
		$sName = $this->StraightenReverse($this->Get('mapping'), $this->Get('name'));
		$this->Set('name', $sName);
	}

	/**
	 * @inheritdoc
	 */
	protected function OnUpdate()
    {
        parent::OnUpdate();

        // Add '.' at the end of name and sourcedname fields if not already set
        $sName = $this->Get('name');
        if (substr($sName, -1) != '.') {
            $this->Set('name', $sName . '.');
        }
        $sSourceDName = $this->Get('sourcedname');
        if (substr($sSourceDName, -1) != '.') {
            $this->Set('sourcedname', $sSourceDName . '.');
        }

        // Check if reverse zone ends up with right arpa domain.
        $sName = $this->StraightenReverse($this->Get('mapping'), $this->Get('name'));
        $this->Set('name', $sName);
    }

    /**
     * @inheritdoc
     */
    protected function AfterUpdate()
    {
        parent::AfterUpdate();

        // Recompute serial #, if relevant attribute of the zone have changed
        $aChanges = $this->ListPreviousValuesForUpdatedAttributes();
        if (array_key_exists('ttl', $aChanges) || array_key_exists('sourcedname', $aChanges) ||
            array_key_exists('mbox', $aChanges) || array_key_exists('refresh', $aChanges) ||
            array_key_exists('retry', $aChanges) || array_key_exists('expire', $aChanges) ||
            array_key_exists('minimum', $aChanges)) {
            $this->IncreaseSerial();
        }
    }

    /**
	 * @inheritdoc
	 */
	public function DisplayBareRelations($oPage, $bEditMode = false)
	{
		// Execute parent function first
		parent::DisplayBareRelations($oPage, $bEditMode);

		if (!$bEditMode) {
			// Tab for NS records
			$sOQL = "SELECT NSRecord WHERE zone_id = :zone_id";
			$oNSRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
			$sName = Dict::Format('Class:Zone/Tab:nsrecords_list');
			$sTitle = Dict::Format('Class:Zone/Tab:nsrecords_list+');
			IPUtils::DisplayTabContent($oPage, $sName, 'ns_records', 'NSRecord', $sTitle, '', $oNSRecordSet);

			switch ($this->Get('mapping')) {
				case 'direct':
					// Tabs for "primary" records
					foreach ($this->aPrimaryRecordClasses as $sClass) {
						$sOQL = "SELECT ".$sClass." WHERE zone_id = :zone_id";
						$oRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
						$sName = Dict::Format('Class:Zone/Tab:'.strtolower($sClass).'s_list');
						$sTitle = Dict::Format('Class:Zone/Tab:'.strtolower($sClass).'s_list+');
						IPUtils::DisplayTabContent($oPage, $sName, strtolower($sClass), $sClass, $sTitle, '', $oRecordSet);
					}

					// Tab for Other records
					$aRecordSets = [];
					$iOtherRecords = 0;
					foreach ($this->aSecondaryRecordClasses as $sClass) {
						$sOQL = "SELECT ".$sClass." WHERE zone_id = :zone_id";
						$oRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
						$aRecordSets[$sClass] = $oRecordSet;
						$iOtherRecords += $oRecordSet->Count();
					}

					$sName = Dict::Format('Class:Zone/Tab:otherrecords_list');
					$sTitle = Dict::Format('Class:Zone/Tab:otherrecords_list+');
					if ($iOtherRecords > 0) {
						$oPage->SetCurrentTab('otherrecords_list', $sName.' ('.$iOtherRecords.')', $sTitle);
						foreach ($this->aSecondaryRecordClasses as $sClass) {
							$oRecordSet = $aRecordSets[$sClass];
							if ($oRecordSet->Count() > 0) {
								$oBlock = new DisplayBlock($oRecordSet->GetFilter(), 'list', false);
								$sSubTitle = Dict::Format('Class:Zone/Tab:records_list', MetaModel::GetName($sClass));
								$oBlock->Display($oPage, 'blk-'.strtolower($sClass), array(
									'menu' => false,
									'panel_title' => MetaModel::GetName($sClass),
									'panel_title_tooltip' => $sSubTitle,
									'panel_icon' => MetaModel::GetClassIcon($sClass, false)
								));
							}
						}
					} else {
						$oSet = CMDBObjectSet::FromScratch('ResourceRecord');
						IPUtils::DisplayTabContent($oPage, $sName, 'otherrecords_list', 'ResourceRecord', $sTitle, '', $oSet);
					}
					break;

                /** @noinspection PhpMissingBreakStatementInspection */
                case 'ipv4reverse':
                     // Tab for CNAME records for non sub class C reverse zones
					if (!$this->IsIPv4SubClassCReverseZone($this->GetName())) {
						$sOQL = "SELECT CNAMERecord WHERE zone_id = :zone_id";
						$oCNAMERecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
						$sName = Dict::Format('Class:Zone/Tab:cnamerecords_list');
						$sTitle = Dict::Format('Class:Zone/Tab:cnamerecords_list+');
						IPUtils::DisplayTabContent($oPage, $sName, 'cname_records', 'CNAMERecord', $sTitle, '', $oCNAMERecordSet);
					}

				case 'ipv6reverse':
					// Tab for PTR records
					$sOQL = "SELECT PTRRecord WHERE zone_id = :zone_id";
					$oPTRRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
					$sName = Dict::Format('Class:Zone/Tab:ptrrecords_list');
					$sTitle = Dict::Format('Class:Zone/Tab:ptrrecords_list+');
					IPUtils::DisplayTabContent($oPage, $sName, 'ptr_records', 'PTRRecord', $sTitle, '', $oPTRRecordSet);
					break;

				default:
					break;
			}
		}
	}

	/**
	 * @inheritdoc
	 */
	public function DoCheckToWrite()
	{
		parent::DoCheckToWrite();

		$sMapping = $this->Get('mapping');
		$sName = $this->Get('name');
		if ($sMapping == 'ipv4reverse') {
			if (!$this->IsIPv4ReverseZone($sName) && !$this->IsIPv4SubClassCReverseZone($sName)) {
				$this->m_aCheckIssues[] = Dict::Format('UI:ZoneManagement:Action:New:Zone:V4:WrongFormat');
			}
		} elseif ($sMapping == 'ipv6reverse') {
			if (!$this->IsIPv6ReverseZone($sName)) {
				$this->m_aCheckIssues[] = Dict::Format('UI:ZoneManagement:Action:New:Zone:V6:WrongFormat');
			}
		}
	}

	/**
	 * Displays data file
	 *
	 * @param \iTopWebPage $oP
	 * @param $aParams
	 *
	 * @return void
	 * @throws \ApplicationException
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \DictExceptionMissingString
	 * @throws \MySQLException
	 * @throws \OQLException
	 */
	public function DisplayDataFile(iTopWebPage $oP, $aParams = array()): void
	{
		$this->DisplayBareTab($oP, 'UI:ZoneManagement:Action:DataFileDisplay:');

		if ($this->Get('mapping') == 'direct') {
			$id = $this->GetKey();

			// Prepare context to switch display order and display button
			$sUrl = utils::GetAbsoluteUrlModulePage('teemip-zone-mgmt', 'ui.teemip-zone-mgmt.php');
			$sHtml = "<form method=\"post\" action=\"".$sUrl."\">";
			$sHtml .= "<input type=\"hidden\" name=\"class\" value=\"Zone\">";
			$sHtml .= "<input type=\"hidden\" name=\"id\" value=\"$id\">";
			$sHtml .= "<input type=\"hidden\" name=\"operation\" value=\"datafiledisplay\">";
			$sHtml .= "<input type=\"hidden\" name=\"transaction_id\" value=\"".utils::GetNewTransactionId()."\">";
			$sSortOrder = $aParams['sort-order'];
			$sNewSortOrder = ($sSortOrder == 'sort_by_record') ? 'sort_by_char' : 'sort_by_record';
			$sHtml .= "<input type=\"hidden\" name=\"sort_order\" value=\"$sNewSortOrder\">";
			$oAppContext = new ApplicationContext();
			$sHtml .= $oAppContext->GetForForm();
			$sButton = "<button type=\"submit\" class=\"action\"><span>".Dict::S('UI:ZoneManagement:Action:DataFileDisplay:Zone:'.$sNewSortOrder)."</span></button>";
			$sHtml .= $sButton."<br><br>";
			$sHtml .= "</form>";
			$oP->add($sHtml);
		}

		// Display text area
		$sHtml = $this->GetDataFile($aParams['sort-order']);
		$sUITitle = Dict::Format('UI:ZoneManagement:Action:DataFileDisplay:Zone:PageTitle_Object_Class', 'Zone', $this->GetName());
		$oP->SetBreadCrumbEntry($sUITitle, $sUITitle, '', '', 'fas fa-file', iTopWebPage::ENUM_BREADCRUMB_ENTRY_ICON_TYPE_CSS_CLASSES);
		$oP->add(<<<HTML
				<div id="zonedatafile" class="ibo-is-code">
				<pre>$sHtml</pre>
				</div>
HTML
		);
	}

	/**
	 * Provides zone in BIND format in a text field
	 *
	 * @param $sSortOrder
	 *
	 * @return string
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \MySQLException
	 * @throws \OQLException
	 */
	public function GetDataFile($sSortOrder): string
	{
		// Default TTL
		$sHtml = "\$TTL ".$this->Get('ttl')."\n";

		// Prepare mailbox
		//  Fully qualify it
		//  Replace @ by . and replace prior . by \.
		$sMBox = $this->Get('mbox');
		if (substr($sMBox, -1) != '.') {
			$sMBox .= '.';
		}
		$aMBox = explode('@', $sMBox);
		$sMBox = str_replace(".", "\.", $aMBox[0]).'.'.$aMBox[1];

		// SOA Record
		$sHtml .= "@ IN SOA ".$this->Get('sourcedname')." ".$sMBox." (\n";
		$sHtml .= str_pad("", SPACE_TO_SOA)." ".str_pad($this->Get('serial'), SPACE_SOA_TO_COMMENT)."; Serial\n";
		$sHtml .= str_pad("", SPACE_TO_SOA)." ".str_pad($this->Get('refresh'), SPACE_SOA_TO_COMMENT)."; Refresh\n";
		$sHtml .= str_pad("", SPACE_TO_SOA)." ".str_pad($this->Get('retry'), SPACE_SOA_TO_COMMENT)."; Retry\n";
		$sHtml .= str_pad("", SPACE_TO_SOA)." ".str_pad($this->Get('expire'), SPACE_SOA_TO_COMMENT)."; Expire\n";
		$sHtml .= str_pad("", SPACE_TO_SOA)." ".str_pad($this->Get('minimum')." )", SPACE_SOA_TO_COMMENT)."; Negative caching\n";

		// NS records section
		$sHtml .= Dict::S('Class:Zone/DataFile:NSRecord')."\n";
		$sOQL = "SELECT NSRecord WHERE zone_id = :zone_id";
		$oNSRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
		while ($oNSRecord = $oNSRecordSet->Fetch()) {
			$sHtml .= $oNSRecord->GetDataString();
		}

		// Retrieve records
		switch ($this->Get('mapping')) {
			case 'direct':
				$aRecordSets = [];
				foreach ($this->aRecordClasses as $sClass) {
					$sOQL = "SELECT ".$sClass." WHERE zone_id = :zone_id";
					$aRecordSets[$sClass] = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
				}

				if ($sSortOrder == 'sort_by_record') {
					// Display by record type
					foreach ($this->aRecordClasses as $sClass) {
						$sHtml .= Dict::S('Class:Zone/DataFile:'.$sClass)."\n";
						while ($oRecord = $aRecordSets[$sClass]->Fetch()) {
							$sHtml .= $oRecord->GetDataString();
						}
					}
				} else {
					// List zone records in an array
					$aZoneRecords = array();
					foreach ($this->aRecordClasses as $sClass) {
						while ($oARecord = $aRecordSets[$sClass]->Fetch()) {
							$aZoneRecord = array();
							$aZoneRecord['name'] = $oARecord->Get('name');
							$aZoneRecord['data-string'] = $oARecord->GetDataString();
							$aZoneRecords[] = $aZoneRecord;
						}
					}

					// Sort array and display it
					asort($aZoneRecords);
					$sHtml .= Dict::S('Class:Zone/DataFile:records_in_alphaorder')."\n";
					foreach ($aZoneRecords as $index => $aRecord) {
						$sHtml .= $aRecord['data-string'];
					}
				}
				break;

            /** @noinspection PhpMissingBreakStatementInspection */
            case 'ipv4reverse':
				if (!$this->IsIPv4SubClassCReverseZone($this->GetName())) {
					$sOQL = "SELECT CNAMERecord WHERE zone_id = :zone_id";
					$oCNAMERecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));

					// CNAMES records section
					if ($oCNAMERecordSet->Count() != 0) {
						$sHtml .= Dict::S('Class:Zone/DataFile:CNAMERecord')."\n";
						while ($oCNAMERecord = $oCNAMERecordSet->Fetch()) {
							$sHtml .= $oCNAMERecord->GetDataString();
						}
					}
				}

            case 'ipv6reverse':
				$sOQL = "SELECT PTRRecord WHERE zone_id = :zone_id";
				$oPTRRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));

				// PTR records section
				$sHtml .= Dict::S('Class:Zone/DataFile:PTRRecord')."\n";
				while ($oPTRRecord = $oPTRRecordSet->Fetch()) {
					$sHtml .= $oPTRRecord->GetDataString();
				}

				break;

			default:
				break;
		}

		return $sHtml;
	}

	/**
	 * Increase serial number
	 *
	 * @throws \ArchivedObjectException
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 */
	public function IncreaseSerial(): void
	{
        $sSerialUpdateMethod = IPConfig::GetFromGlobalIPConfig('serial_update_method', $this->Get('org_id'));
        switch ($sSerialUpdateMethod) {
            case 'set_date':
                $sSerial = $this->Get('serial');
                $sDateSerial = substr($sSerial, 0, 8);
                $sDate = date('Ymd');
                if ($sDateSerial != $sDate) {
                    $sSerial = $sDate.'01';
                } else {
                    $sNb = (int) substr($sSerial, 8, 2) + 1;
                    $sSerial = $sDateSerial.sprintf("%'.02d", $sNb);
                }
                break;

            case 'set_ux_time':
                $sSerial = time();
                break;

            case 'increment_by_one':
            default:
                $sSerial = $this->Get('serial') + 1;
                break;
        }
		$this->Set('serial', $sSerial);
	}

}

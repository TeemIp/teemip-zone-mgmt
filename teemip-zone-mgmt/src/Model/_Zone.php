<?php
/*
 * @copyright   Copyright (C) 2021 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\ZoneManagement\Model;

use ApplicationContext;
use CMDBObjectSet;
use Combodo\iTop\Application\UI\Base\Component\MedallionIcon\MedallionIcon;
use DBObjectSearch;
use Dict;
use DisplayBlock;
use DNSObject;
use iTopWebPage;
use MetaModel;
use TeemIp\TeemIp\Extension\Framework\Helper\IPUtils;
use utils;
use WebPage;

class _Zone extends DNSObject {
	/**
	 * Provides the zone that correspond to a FQDN
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
	static function GetZoneFromFqdn($sFqdn, $iView, $sMapping, $iOrgId) {
		$sError = '';
		if ((strlen($sFqdn) == 0) || ($iOrgId == 0)) {
			return array(Dict::Format('UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:'.$sMapping), 0);
		}
		$sOQL = "SELECT Zone WHERE org_id = :org_id AND view_id = :view_id AND name = :name";
		$oZoneSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('org_id' => $iOrgId, 'view_id' => $iView, 'name' => $sFqdn));
		if ($oZone = $oZoneSet->Fetch()) {
			$iZoneId = $oZone->GetKey();
		} else {
			$i = strpos($sFqdn, '.');
			$sNextFqdn = substr($sFqdn, $i + 1);
			list($sError, $iZoneId) = static::GetZoneFromFqdn($sNextFqdn, $iView, $sMapping, $iOrgId);
		}

		return array($sError, $iZoneId);
	}

	/**
	 * @inheritdoc
	 */
	public function DoCheckToWrite() {
		parent::DoCheckToWrite();

		$sName = $this->Get('name');
		$sMapping = $this->Get('mapping');
		if ($sMapping == 'ipv4reverse') {
			$sPattern = '/^((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.){1,3}in-addr\.arpa\.$/';
			if (!preg_match($sPattern, $sName)) {
				$this->m_aCheckIssues[] = Dict::Format('UI:ZoneManagement:Action:New:Zone:V4:WrongFormat');

				return;
			}
		} elseif ($sMapping == 'ipv6reverse') {
			$sPattern = '/^((\d|[a-f]|[A-F])\.){1,31}ip6\.arpa\.$/';
			if (!preg_match($sPattern, $sName)) {
				$this->m_aCheckIssues[] = Dict::Format('UI:ZoneManagement:Action:New:Zone:V6:WrongFormat');

				return;
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
	public function DisplayDataFile(iTopWebPage $oP, $aParams = array()) {
		$this->DisplayBareTab($oP, 'UI:ZoneManagement:Action:DataFileDisplay:');

		if ($this->Get('mapping') == 'direct') {
			$id = $this->GetKey();

			// Prepare context to switch display order and display button
			$sUrl = utils::GetAbsoluteUrlModulePage('teemip-zone-mgmt', 'ui.teemip-zone-mgmt.php', array());
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
			if (version_compare(ITOP_DESIGN_LATEST_VERSION, '3.0', '<')) {
				$sHtml .= "<br>".$sButton."<br>";
			} else {
				$sHtml .= $sButton."<br><br>";
			}
			$sHtml .= "</form>";
			$oP->add($sHtml);
		}

		// Display text area
		$sHtml = $this->GetDataFile($aParams['sort-order']);
		if (version_compare(ITOP_DESIGN_LATEST_VERSION, '3.0', '<')) {
			$oP->add(<<<HTML
				<div id="zonedatafile" class="display_block">
				<textarea>{$sHtml}</textarea>
				</div>
HTML
			);
			// Adjust the size of the block
			$oP->add_ready_script(" $('#zonedatafile>textarea').height($('#zonedatafile').parent().height() - 220).width( $('#zonedatafile').parent().width() - 30);");
		} else {
			$sUITitle = Dict::Format('UI:ZoneManagement:Action:DataFileDisplay:Zone:PageTitle_Object_Class', 'Zone', $this->GetName());
			$oP->SetBreadCrumbEntry($sUITitle, $sUITitle, '', '', 'fa fa-file', iTopWebPage::ENUM_BREADCRUMB_ENTRY_ICON_TYPE_CSS_CLASSES);
			$oP->add(<<<HTML
				<div id="zonedatafile" class="ibo-is-code">
				<pre>$sHtml</pre>
				</div>
HTML
			);
		}
	}

	/**
	 * @inheritdoc
	 */
	public function DisplayBareRelations(WebPage $oP, $bEditMode = false) {
		// Execute parent function first
		parent::DisplayBareRelations($oP, $bEditMode);

		if (!$bEditMode) {
			// Tab for NS records
			$sOQL = "SELECT NSRecord WHERE zone_id = :zone_id";
			$oNSRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
			$sName = Dict::Format('Class:Zone/Tab:nsrecords_list');
			$sTitle = Dict::Format('Class:Zone/Tab:nsrecords_list+');
			IPUtils::DisplayTabContent($oP, $sName, 'ns_records', 'NSRecord', $sTitle, '', $oNSRecordSet);

			switch ($this->Get('mapping')) {
				case 'direct':
					// Tab for A records
					$sOQL = "SELECT ARecord WHERE zone_id = :zone_id";
					$oARecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
					$sName = Dict::Format('Class:Zone/Tab:arecords_list');
					$sTitle = Dict::Format('Class:Zone/Tab:arecords_list+');
					IPUtils::DisplayTabContent($oP, $sName, 'a_records', 'ARecord', $sTitle, '', $oARecordSet);

					// Tab for AAAA records
					$sOQL = "SELECT AAAARecord WHERE zone_id = :zone_id";
					$oAAAARecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
					$sName = Dict::Format('Class:Zone/Tab:aaaarecords_list');
					$sTitle = Dict::Format('Class:Zone/Tab:aaaarecords_list+');
					IPUtils::DisplayTabContent($oP, $sName, 'aaaa_records', 'AAAARecord', $sTitle, '', $oAAAARecordSet);

					// Tab for CNAME records
					$sOQL = "SELECT CNAMERecord WHERE zone_id = :zone_id";
					$oCNAMERecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
					$sName = Dict::Format('Class:Zone/Tab:cnamerecords_list');
					$sTitle = Dict::Format('Class:Zone/Tab:cnamerecords_list+');
					IPUtils::DisplayTabContent($oP, $sName, 'cname_records', 'CNAMERecord', $sTitle, '', $oCNAMERecordSet);

					// Tab for Other records
					$sOQL = "SELECT MXRecord WHERE zone_id = :zone_id";
					$oMXRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
					$iMXRecords = $oMXRecordSet->Count();
					$iOtherRecords = $iMXRecords;

					$sOQL = "SELECT SRVRecord WHERE zone_id = :zone_id";
					$oSRVRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
					$iSRVRecords = $oSRVRecordSet->Count();
					$iOtherRecords += $iSRVRecords;

					$sOQL = "SELECT TXTRecord WHERE zone_id = :zone_id";
					$oTXTRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
					$iTXTRecords = $oTXTRecordSet->Count();
					$iOtherRecords += $iTXTRecords;

					$sName = Dict::Format('Class:Zone/Tab:otherrecords_list');
					$sTitle = Dict::Format('Class:Zone/Tab:otherrecords_list+');
					if ($iOtherRecords > 0) {
						$oP->SetCurrentTab($sName.' ('.$iOtherRecords.')');
						$oP->p($sTitle);
						if ($iMXRecords > 0) {
							if (version_compare(ITOP_DESIGN_LATEST_VERSION, '3.0', '<')) {
								$oP->p(MetaModel::GetClassIcon('MXRecord').'&nbsp;'.Dict::Format('Class:Zone/Tab:mxrecords_list', $iMXRecords));
							} else {
								$oClassIcon = new MedallionIcon(MetaModel::GetClassIcon('MXRecord', false));
								$oClassIcon->SetDescription(Dict::Format('Class:Zone/Tab:mxrecords_list', MetaModel::GetName('MXRecord')))->AddCSSClass('ibo-block-list--medallion');
								$oP->AddUiBlock($oClassIcon);
							}
							$oBlock = new DisplayBlock($oMXRecordSet->GetFilter(), 'list', false);
							$oBlock->Display($oP, 'mx_records', array('menu' => false));
						}
						if ($iSRVRecords > 0) {
							if (version_compare(ITOP_DESIGN_LATEST_VERSION, '3.0', '<')) {
								$oP->p(MetaModel::GetClassIcon('SRVRecord').'&nbsp;'.Dict::Format('Class:Zone/Tab:srvrecords_list', $iSRVRecords));
							} else {
								$oClassIcon = new MedallionIcon(MetaModel::GetClassIcon('SRVRecord', false));
								$oClassIcon->SetDescription(Dict::Format('Class:Zone/Tab:srvrecords_list', MetaModel::GetName('SRVRecord')))->AddCSSClass('ibo-block-list--medallion');
								$oP->AddUiBlock($oClassIcon);
							}
							$oBlock = new DisplayBlock($oSRVRecordSet->GetFilter(), 'list', false);
							$oBlock->Display($oP, 'srv_records', array('menu' => false));
						}
						if ($iTXTRecords > 0) {
							if (version_compare(ITOP_DESIGN_LATEST_VERSION, '3.0', '<')) {
								$oP->p(MetaModel::GetClassIcon('TXTRecord').'&nbsp;'.Dict::Format('Class:Zone/Tab:txtrecords_list', $iTXTRecords));
							} else {
								$oClassIcon = new MedallionIcon(MetaModel::GetClassIcon('TXTRecord', false));
								$oClassIcon->SetDescription(Dict::Format('Class:Zone/Tab:txtrecords_list', MetaModel::GetName('TXTRecord')))->AddCSSClass('ibo-block-list--medallion');
								$oP->AddUiBlock($oClassIcon);
							}
							$oBlock = new DisplayBlock($oTXTRecordSet->GetFilter(), 'list', false);
							$oBlock->Display($oP, 'txt_records', array('menu' => false));
						}
					} else {
						$oSet = CMDBObjectSet::FromScratch('ResourceRecord');
						IPUtils::DisplayTabContent($oP, $sName, 'otherrecords_list', 'ResourceRecord', $sTitle, '', $oSet);
					}
					break;

				case 'ipv4reverse':
				case 'ipv6reverse':
					// Tab for PTR records
					$sOQL = "SELECT PTRRecord WHERE zone_id = :zone_id";
					$oPTRRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
					$sName = Dict::Format('Class:Zone/Tab:ptrrecords_list');
					$sTitle = Dict::Format('Class:Zone/Tab:ptrrecords_list+');
					IPUtils::DisplayTabContent($oP, $sName, 'ptr_records', 'PTRRecord', $sTitle, '', $oPTRRecordSet);
					break;

				default:
					break;
			}
		}
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
	public function GetDataFile($sSortOrder) {
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
		$sHtml .= Dict::S('Class:Zone/DataFile:ns')."\n";
		$sOQL = "SELECT NSRecord WHERE zone_id = :zone_id";
		$oNSRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
		while ($oNSRecord = $oNSRecordSet->Fetch()) {
			$sHtml .= $oNSRecord->GetDataString();
		}

		// Retrieve records
		switch ($this->Get('mapping')) {
			case 'direct':
				$sOQL = "SELECT ARecord WHERE zone_id = :zone_id";
				$oARecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
				$sOQL = "SELECT AAAARecord WHERE zone_id = :zone_id";
				$oAAAARecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
				$sOQL = "SELECT CNAMERecord WHERE zone_id = :zone_id";
				$oCNAMERecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
				$sOQL = "SELECT MXRecord WHERE zone_id = :zone_id";
				$oMXRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
				$sOQL = "SELECT SRVRecord WHERE zone_id = :zone_id";
				$oSRVRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));
				$sOQL = "SELECT TXTRecord WHERE zone_id = :zone_id";
				$oTXTRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));

				if ($sSortOrder == 'sort_by_record') {
					// A records section
					$sHtml .= Dict::S('Class:Zone/DataFile:ipv4')."\n";
					while ($oARecord = $oARecordSet->Fetch()) {
						$sHtml .= $oARecord->GetDataString();
					}

					// AAAA records section
					$sHtml .= Dict::S('Class:Zone/DataFile:ipv6')."\n";
					while ($oAAAARecord = $oAAAARecordSet->Fetch()) {
						$sHtml .= $oAAAARecord->GetDataString();
					}

					// CNAMES records section
					$sHtml .= Dict::S('Class:Zone/DataFile:cnames')."\n";
					while ($oCNAMERecord = $oCNAMERecordSet->Fetch()) {
						$sHtml .= $oCNAMERecord->GetDataString();
					}

					// MX records section
					$sHtml .= Dict::S('Class:Zone/DataFile:mx')."\n";
					while ($oMXRecord = $oMXRecordSet->Fetch()) {
						$sHtml .= $oMXRecord->GetDataString();
					}

					// SRV records section
					$sHtml .= Dict::S('Class:Zone/DataFile:srv')."\n";
					while ($oSRVRecord = $oSRVRecordSet->Fetch()) {
						$sHtml .= $oSRVRecord->GetDataString();
					}

					// TXT records section
					$sHtml .= Dict::S('Class:Zone/DataFile:txt')."\n";
					while ($oTXTRecord = $oTXTRecordSet->Fetch()) {
						$sHtml .= $oTXTRecord->GetDataString();
					}
				} else {
					// List zone records in an array
					$aZoneRecords = array();
					while ($oARecord = $oARecordSet->Fetch()) {
						$aZoneRecord = array();
						$aZoneRecord['name'] = $oARecord->Get('name');
						$aZoneRecord['data-string'] = $oARecord->GetDataString();
						$aZoneRecords[] = $aZoneRecord;
					}
					while ($oAAAARecord = $oAAAARecordSet->Fetch()) {
						$aZoneRecord = array();
						$aZoneRecord['name'] = $oAAAARecord->Get('name');
						$aZoneRecord['data-string'] = $oAAAARecord->GetDataString();
						$aZoneRecords[] = $aZoneRecord;
					}
					while ($oCNAMERecord = $oCNAMERecordSet->Fetch()) {
						$aZoneRecord = array();
						$aZoneRecord['name'] = $oCNAMERecord->Get('name');
						$aZoneRecord['data-string'] = $oCNAMERecord->GetDataString();
						$aZoneRecords[] = $aZoneRecord;
					}
					while ($oMXRecord = $oMXRecordSet->Fetch()) {
						$aZoneRecord = array();
						$aZoneRecord['name'] = $oMXRecord->Get('name');
						$aZoneRecord['data-string'] = $oMXRecord->GetDataString();
						$aZoneRecords[] = $aZoneRecord;
					}
					while ($oSRVRecord = $oSRVRecordSet->Fetch()) {
						$aZoneRecord = array();
						$aZoneRecord['name'] = $oSRVRecord->Get('name');
						$aZoneRecord['data-string'] = $oSRVRecord->GetDataString();
						$aZoneRecords[] = $aZoneRecord;
					}
					while ($oTXTRecord = $oTXTRecordSet->Fetch()) {
						$aZoneRecord = array();
						$aZoneRecord['name'] = $oTXTRecord->Get('name');
						$aZoneRecord['data-string'] = $oTXTRecord->GetDataString();
						$aZoneRecords[] = $aZoneRecord;
					}

					// Sort array and display it
					asort($aZoneRecords);
					$sHtml .= Dict::S('Class:Zone/DataFile:records_in_alphaorder')."\n";
					foreach ($aZoneRecords as $index => $aRecord) {
						$sHtml .= $aRecord['data-string'];
					}
				}
				break;

			case 'ipv4reverse':
			case 'ipv6reverse':
				$sOQL = "SELECT PTRRecord WHERE zone_id = :zone_id";
				$oPTRRecordSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('zone_id' => $this->GetKey()));

				// PTR records section
				$sHtml .= Dict::S('Class:Zone/DataFile:ptr')."\n";
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
	public function IncreaseSerial() {
		$iSerial = $this->Get('serial');
		$this->Set('serial', $iSerial + 1);
	}

	/**
	 * @inheritdoc
	 */
	protected function OnInsert() {
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
	 * Straighten reverse zone name if required
	 *
	 * @param $sMapping
	 * @param $sName
	 *
	 * @return string
	 */
	private function StraightenReverse($sMapping, $sName) {
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
	protected function OnUpdate() {
		parent::OnUpdate();

		// Add '.' at the end of name and sourcedname fields if not already set
		$sName = $this->Get('name');
		if (substr($sName, -1) != '.') {
			$this->Set('name', $sName.'.');
		}
		$sSourceDName = $this->Get('sourcedname');
		if (substr($sSourceDName, -1) != '.') {
			$this->Set('sourcedname', $sSourceDName.'.');
		}

		// Check if reverse zone ends up with right arpa domain.
		$sName = $this->StraightenReverse($this->Get('mapping'), $this->Get('name'));
		$this->Set('name', $sName);
	}
}

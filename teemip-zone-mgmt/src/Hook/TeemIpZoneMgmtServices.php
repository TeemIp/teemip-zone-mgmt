<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\ZoneManagement\Hook;

use iRestServiceProvider;
use RestResult;
use RestResultWithObjects;
use RestUtils;
use TeemIp\TeemIp\Extension\Framework\Controller\RestResultWithTextFile;
use UserRights;

/**
 * Implementation of TeemIp REST services
 *
 * @package     TeemIp
 */
class TeemIpZoneMgmtServices implements iRestServiceProvider
{
	/**
	 * Enumerate services delivered by this class
	 *
	 * @param string $sVersion The version (e.g. 1.0) supported by the services
	 * @return array An array of hash 'verb' => verb, 'description' => description
	 */
	public function ListOperations($sVersion)
	{
		$aOps = array();
		$aOps[] = array(
			'verb' => 'teemip/get_zone_file',
			'description' => 'Generate and provide the text file that describes the specified DNS zones'
		);
		return $aOps;
	}

	/**
	 * Enumerate services delivered by this class
	 *
	 * @param string $sVersion The version (e.g. 1.0) supported by the services
	 * @param string $sVerb
	 * @param object $aParams
	 *
	 * @return RestResult The standardized result structure (at least a message)
	 * @throws \CoreException
	 * @throws \CoreUnexpectedValue
	 * @throws \SimpleGraphException
	 * @throws \Exception
	 */
	public function ExecOperation($sVersion, $sVerb, $aParams)
	{
		switch ($sVerb) {
			case 'teemip/get_zone_file':
				$oResult = new RestResultWithTextFile();
                if (UserRights::IsActionAllowed('Zone', UR_ACTION_READ) != UR_ALLOWED_YES) {
					$oResult->code = RestResult::UNAUTHORIZED;
					$oResult->message = "The current user does not have enough permissions for reading data of class Zone";
				} else {
					$key = RestUtils::GetMandatoryParam($aParams, 'key');
					$oZoneSet = RestUtils::GetObjectSetFromKey('Zone', $key);
					while ($oZone = $oZoneSet->Fetch()) {
						$sFormat = RestUtils::GetMandatoryParam($aParams, 'format');
						$sFormat = ($sFormat == 'sort_by_record') ? 'sort_by_record' : 'sort_by_char';
						$sText = $oZone->GetDataFile($sFormat);
						$oResult->AddObject(0, 'computed', $oZone, $sText);
					}
					$oResult->message = "Found: ".$oZoneSet->Count();
				}
				break;

			default:
				$oResult = new RestResultWithObjects();
				// unknown operation: handled at a higher level
		}
		return $oResult;
	}
}


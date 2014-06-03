<?php
require_once DIR_MAGNALISTER.DIRECTORY_SEPARATOR.'php'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.'TopTen.php';
require_once(DIR_MAGNALISTER_INCLUDES.'modules/ebay/ebayFunctions.php');

class EbayTopTen extends TopTen {
	/**
	 *
	 * @param string $sType  topPrimaryCategory || topSecondaryCategory || topStoreCategory || topStoreCategory2
	 * @return array (key=>value)
	 * @throws Exception 
	 */
	public function getTopTenCategories($sType, $aConfig = array()) {
		$blStoreCat = substr($sType,0,16) == 'topStoreCategory';
		if ($blStoreCat) {
			try {
				$aStoreData = MagnaConnector::gi()->submitRequest(array('ACTION' => 'HasStore'));
			} catch (MagnaException $e) {
				echo print_m($e->getErrorArray(), 'Error');
			}
			if(!$aStoreData['DATA']['Answer']=='True'){
				throw new Exception('noStore');
			}
		}
		
		$limit = (int)getDBConfigValue($this->marketplace.'.topten', $this->iMarketPlaceId);
		$sTopTenCatSql = "
			SELECT DISTINCT ".$sType."
			FROM ".TABLE_MAGNA_EBAY_PROPERTIES." 
			WHERE ".$sType." <> 0 and mpID = '".$this->iMarketPlaceId."'
			GROUP BY ".$sType." 
			ORDER BY count( `".$sType."` ) DESC
			".(($limit != 0) ? "LIMIT ".$limit : "");
		$aTopTenCatSql = MagnaDB::gi()->fetchArray($sTopTenCatSql, true);
		if (empty($aTopTenCatSql)) {
			return array();
		}
		
		$aTopTenCatIds = array();
		foreach ($aTopTenCatSql as $iCatId) {
			$aTopTenCatIds[$iCatId] = geteBayCategoryPath($iCatId,$blStoreCat);
			if ('<span class="invalid">'.ML_LABEL_INVALID.'</span>' == $aTopTenCatIds[$iCatId]) {
				unset($aTopTenCatIds[$iCatId]);
				MagnaDB::gi()->query("UPDATE ".TABLE_MAGNA_EBAY_PROPERTIES." set ".$sType."=0 where ".$sType."='".$iCatId."'");//no mpid
			}
		}
		return $aTopTenCatIds;
	}
	
	public function configCopy() {
		$sCopySql = "
			update ".TABLE_MAGNA_EBAY_PROPERTIES."
			set 
				topPrimaryCategory = primaryCategory,
				topSecondaryCategory = secondaryCategory,
				topStoreCategory1 = storeCategory,
				topStoreCategory2 = storeCategory2
			where 
				mpID = '".$this->iMarketPlaceId."'
		";
		MagnaDB::gi()->query($sCopySql);
	}
	
	protected function getTableName() {
		return TABLE_MAGNA_EBAY_PROPERTIES;
	}
	
	protected function getResettableCategoryDescription() {
		return array(
			'topPrimaryCategory'   => ML_EBAY_PRIMARY_CATEGORY, 
			'topSecondaryCategory' => ML_EBAY_SECONDARY_CATEGORY, 
			'topStoreCategory1'    => ML_EBAY_STORE_CATEGORY, 
			'topStoreCategory2'    => ML_EBAY_SECONDARY_STORE_CATEGORY
		);
	}
	
	protected function getResettableCategoryDefinition() {
		return array (
			'topPrimaryCategory' => 'topPrimaryCategory',
			'topSecondaryCategory' => 'topSecondaryCategory',
			'topStoreCategory1' => 'topStoreCategory1',
			'topStoreCategory2' => 'topStoreCategory2',
		);
	}
	
	public static function renderConfigForm($args, &$value = '') {
		return self::runRenderConfigForm(new self(), __METHOD__, $args, $value);
	}
	
}

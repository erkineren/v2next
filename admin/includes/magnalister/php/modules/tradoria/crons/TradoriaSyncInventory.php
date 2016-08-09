<?php
/**
 * 888888ba                 dP  .88888.                    dP                
 * 88    `8b                88 d8'   `88                   88                
 * 88aaaa8P' .d8888b. .d888b88 88        .d8888b. .d8888b. 88  .dP  .d8888b. 
 * 88   `8b. 88ooood8 88'  `88 88   YP88 88ooood8 88'  `"" 88888"   88'  `88 
 * 88     88 88.  ... 88.  .88 Y8.   .88 88.  ... 88.  ... 88  `8b. 88.  .88 
 * dP     dP `88888P' `88888P8  `88888'  `88888P' `88888P' dP   `YP `88888P' 
 *
 *                          m a g n a l i s t e r
 *                                      boost your Online-Shop
 *
 * -----------------------------------------------------------------------------
 * $Id$
 *
 * (c) 2010 - 2011 RedGecko GmbH -- http://www.redgecko.de
 *     Released under the MIT License (Expat)
 * -----------------------------------------------------------------------------
 */

defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

require_once(DIR_MAGNALISTER_MODULES.'magnacompatible/crons/MagnaCompatibleSyncInventory.php');

class TradoriaSyncInventory extends MagnaCompatibleSyncInventory {

	public function __construct($mpID, $marketplace) {
		parent::__construct($mpID, $marketplace);
	}
	
	protected function identifySKU() {
		$this->cItem['pID'] = (int)magnaSKU2pID($this->cItem['SKU']);
		if ($this->cItem['Parentage'] == 'Child') {
			$this->cItem['aID'] = (int)magnaSkuWithParentSku2aID($this->cItem['SKU'], $this->cItem['ParentSKU']);
		} else {
			$this->cItem['aID'] = (int)magnaSKU2aID($this->cItem['SKU']);
		}
	}
	
	protected function uploadItems() {
		/* Do nothing. */
	}
	
	protected function updatePrice() {
		if ($this->cItem['Parentage'] == 'Parent') return false;
		return parent::updatePrice();
	}
	
	protected function updateQuantity() {
		if ($this->cItem['Parentage'] == 'Parent') return false;
		return parent::updateQuantity();
	}
	
	public function process() {
		parent::process();
	}
}

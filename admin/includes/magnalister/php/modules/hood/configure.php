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
 * (c) 2011 RedGecko GmbH -- http://www.redgecko.de
 *     Released under the MIT License (Expat)
 * -----------------------------------------------------------------------------
 */

defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

require_once(DIR_MAGNALISTER_MODULES.'magnacompatible/configure.php');
require_once(DIR_MAGNALISTER_MODULES.'hood/classes/HoodShippingDetailsProcessor.php');
require_once(DIR_MAGNALISTER_MODULES.'hood/classes/HoodTopTenCategories.php');

class HoodConfigure extends MagnaCompatibleConfigure {

	protected function getAuthValuesFromPost() {
		$nAPIKey = trim($_POST['conf'][$this->marketplace.'.apikey']);
		$nMPUser = trim($_POST['conf'][$this->marketplace.'.mpusername']);
		$nMPPass = trim($_POST['conf'][$this->marketplace.'.mppassword']);
		
		$nAPIKey = $this->processPasswordFromPost('apikey', $nAPIKey);
		$nMPPass = $this->processPasswordFromPost('mppassword', $nMPPass);
		
		if (empty($nMPUser)) {
			unset($_POST['conf'][$this->marketplace.'.mpusername']);
		}
		if ($nMPPass === false) {
			unset($_POST['conf'][$this->marketplace.'.mppassword']);
		}
		if (empty($nAPIKey)) {
			unset($_POST['conf'][$this->marketplace.'.apikey']);
		}
		
		return array (
			'KEY' => $nAPIKey,
			'MPUSERNAME' => $nMPUser,
			'MPPASSWORD' => $nMPPass,
		);
	}
	
	protected function getFormFiles() {
		$forms = parent::getFormFiles();
		
		$forms[] = 'orderStatus';
		$forms[] = 'orderStatusHood';
		$forms[] = 'template';
		
		return $forms;
	}

	protected function loadChoiseValues() {
		parent::loadChoiseValues();
		
		# prepare
		$this->form['payment']['fields']['paymentmethod']['values'] = HoodApiConfigValues::gi()->getHoodPaymentOptions();
		
		if (false === getDBConfigValue('hood.imagepath', $this->mpID, false)) {
			$this->form['images']['fields']['imagepath']['default'] = defined('DIR_WS_CATALOG_POPUP_IMAGES')
				? HTTP_CATALOG_SERVER.DIR_WS_CATALOG_POPUP_IMAGES
				: HTTP_CATALOG_SERVER.DIR_WS_CATALOG_IMAGES;
			setDBConfigValue('hood.imagepath', $this->mpID, $this->form['images']['fields']['imagepath']['default'], true);
		}
		getLanguages($this->form['listingdefaults']['fields']['language']);
		
		#fixed listings
		getCustomersStatus($this->form['fixedsettings']['fields']['whichprice'], true);
		if (!empty($this->form['fixedsettings']['fields']['whichprice'])) {
			$this->form['fixedsettings']['fields']['whichprice']['values']['0'] = ML_LABEL_SHOP_PRICE;
			ksort($this->form['fixedsettings']['fields']['whichprice']['values']);
			unset($this->form['fixedsettings']['fields']['specialprices']);
		} else {
			unset($this->form['fixedsettings']['fields']['whichprice']);
		}	
		
		$this->form['fixedsettings']['fields']['fixedduration']['values'] = HoodApiConfigValues::gi()->getListingDurations();
		
		# bidding auctions
		getCustomersStatus($this->form['classicsettings']['fields']['whichprice'], true);
		if (!empty($this->form['classicsettings']['fields']['whichprice'])) {
			$this->form['classicsettings']['fields']['whichprice']['values']['0'] = ML_LABEL_SHOP_PRICE;
			ksort($this->form['classicsettings']['fields']['whichprice']['values']);
			unset($this->form['classicsettings']['fields']['specialprices']);
		} else {
			unset($this->form['classicsettings']['fields']['whichprice']);
		}
		
		# no checkin config, this is all in prepare.form
		# checkin is set by magnacompatible
		unset($this->form['checkin']);
		# same with price
		unset($this->form['price']);
		
		# OrderSync
		getOrderStatus($this->form['orderSyncState']['fields']['shippedstatus']);
		unset($this->form['orderSyncState']['fields']['carrierMatch']);
		unset($this->form['orderSyncState']['fields']['trackingMatch']);
		getOrderStatus($this->form['orderSyncState']['fields']['cancelstatus']);
		
	/*
		# Bestellimporte
		getCustomersStatus($this->form['import']['fields']['customersgroup']);
		getOrderStatus($this->form['import']['fields']['openstatus']);
		# Build 1735: allow multiple 'closed states'
		if (!is_array($closedstatus = getDBConfigValue('hood.orderstatus.closed', $this->mpID, '3'))) {
			setDBConfigValue('hood.orderstatus.closed', $this->mpID, array($closedstatus));
		}
		getOrderStatus($this->form['import']['fields']['closedstatus']);
		if (false === getDBConfigValue('hood.orderstatus.paid', $this->mpID, false)) {
			$paidStatus = (int)MagnaDB::gi()->fetchOne('SELECT orders_status_id FROM '.TABLE_ORDERS_STATUS.'
				WHERE orders_status_name IN (\'Bezahlt\',\'Payment received\') ORDER BY language_id LIMIT 1');
			setDBConfigValue('hood.orderstatus.paid', $this->mpID, $paidStatus);
		}
	//	getOrderStatus($this->form['ordersync']['fields']['paidstatus']);
	//	if (false === getDBConfigValue('hood.updateable.orderstatus', $this->mpID, false)) {
	//		setDBConfigValue('hood.updateable.orderstatus', $this->mpID, array($this->form['import']['fields']['openstatus']['default']));
	//	}
	//	getOrderStatus($this->form['ordersync']['fields']['updateablestatus']);
	
		# Bestellstatus-Sync
	//	getOrderStatus($this->form['orderSyncState']['fields']['shippedstatus']);
	//	getOrderStatus($this->form['orderSyncState']['fields']['cancelstatus']);
		
		getShippingModules($this->form['import']['fields']['defaultshipping']);
		getPaymentModules($this->form['import']['fields']['defaultpayment']);
	
		if (false === getDBConfigValue('hood.imagepath', $this->mpID, false)) {
			$this->form['images']['fields']['imagepath']['default'] =
			defined('DIR_WS_CATALOG_POPUP_IMAGES')
				? HTTP_CATALOG_SERVER.DIR_WS_CATALOG_POPUP_IMAGES
				: HTTP_CATALOG_SERVER.DIR_WS_CATALOG_IMAGES;
			setDBConfigValue('hood.imagepath', $this->mpID, $this->form['images']['fields']['imagepath']['default'], true);
		}
		# Bilder
		if (false === getDBConfigValue('hood.gallery.imagepath', $this->mpID, false)) {
			$this->form['images']['fields']['galleryimagepath']['default'] =
			defined('DIR_WS_CATALOG_POPUP_IMAGES')
				? HTTP_CATALOG_SERVER.DIR_WS_CATALOG_POPUP_IMAGES
				: HTTP_CATALOG_SERVER.DIR_WS_CATALOG_IMAGES;
			setDBConfigValue('hood.gallery.imagepath', $this->mpID, $this->form['images']['fields']['galleryimagepath']['default'], true);
		}
	*/
	}
	
	protected function finalizeForm() {
		#echo var_dump_pre($this->isAuthed, '$this->isAuthed');
		if (!$this->isAuthed) {
			$this->form = array (
				'login' => $this->form['login']
			);
			return;
		}
		
	}
	
}

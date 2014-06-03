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
 * $Id: MeinpaketPrepareCategoryView.php 3376 2013-12-09 01:46:20Z derpapst $
 *
 * (c) 2011 RedGecko GmbH -- http://www.redgecko.de
 *     Released under the MIT License (Expat)
 * -----------------------------------------------------------------------------
 */

defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');
require_once(DIR_MAGNALISTER_INCLUDES.'lib/classes/SimpleCategoryView.php');

class MeinpaketPrepareCategoryView extends SimpleCategoryView {
	public function __construct($cPath = 0, $settings = array(), $sorting = false, $search = '', $productIDs = array()) {
		parent::__construct($cPath, $settings, $sorting, $search, $productIDs);

		if (!isset($_GET['kind']) || ($_GET['kind'] != 'ajax')) {
			$this->simplePrice->setCurrency(getCurrencyFromMarketplace($this->_magnasession['mpID']));
		}
	}

	public function getAdditionalHeadlines() {
		return '
			<td class="lowestprice">'.ML_MEINPAKET_LABEL_CATEGORY.'</td>
			<td class="matched">'.ML_MEINPAKET_LABEL_PREPARED.'</td>';
	}

	public function getAdditionalCategoryInfo($cID, $data = false) {
		$html = '<td>&mdash;</td>';

		$pIDs = $this->list['categories'][$cID]['allproductsids'];
		if (!empty($pIDs)) {
			$totalItems = count($pIDs);
			$itemsFailed = 0;
			$itemsMatched = 0;
			if (getDBConfigValue('general.keytype', '0') == 'artNr') {
				$query = '
					SELECT COUNT(DISTINCT pa.products_id) as itemsCount,
					       SUM(IF(pa.MarketplaceCategory="", 1, 0)) as incompleteCount
					  FROM '.TABLE_PRODUCTS.' p,
					       '.TABLE_MAGNA_MEINPAKET_PROPERTIES.' pa
					 WHERE p.products_id IN ("'.implode('", "', $pIDs).'")
					       AND p.products_model=pa.products_model
					       AND p.products_model<>""
					       AND mpID = '.$this->_magnasession['mpID'].'	
				';
			} else {
				$query = '
					SELECT COUNT(DISTINCT products_id) as itemsCount,
					       SUM(IF(MarketplaceCategory="", 1, 0)) as incompleteCount
					  FROM '.TABLE_MAGNA_MEINPAKET_PROPERTIES.'
					 WHERE products_id IN ("'.implode('", "', $pIDs).'")
					       AND mpID = '.$this->_magnasession['mpID'].'	
				';
			}
				$itemsApplied = MagnaDB::gi()->fetchRow($query);
			#echo print_m($itemsApplied, '$itemsApplied ('.$totalItems.')');
		}
		if ($itemsApplied !== false) {
			if ($itemsApplied['itemsCount'] == 0) {
				/* Keine Artikel beantragt */
				return $html.'
					<td title="'.ML_MEINPAKET_LABEL_CATMATCH_NOT_PREPARED.'">'.
						html_image(DIR_MAGNALISTER_IMAGES . 'status/grey_dot.png', ML_MEINPAKET_LABEL_CATMATCH_NOT_PREPARED, 12, 12).
					'</td>';
			}
			if ($itemsApplied['incompleteCount'] == $totalItems) {
				/* Alle Artikel in Kategorie unvollstaendig beantragt */
				return $html.'
					<td title="'.ML_MEINPAKET_LABEL_CATMATCH_PREPARE_INCOMPLETE.'">'.
						html_image(DIR_MAGNALISTER_IMAGES . 'status/red_dot.png', ML_MEINPAKET_LABEL_CATMATCH_PREPARE_INCOMPLETE, 12, 12).
					'</td>';
			}
			if (($itemsApplied['itemsCount'] == $totalItems) && ($itemsApplied['incompleteCount'] == 0)) {
				/* Alle Artikel in Kategorie beantragt */
				return $html.'
					<td title="'.ML_MEINPAKET_LABEL_CATMATCH_PREPARE_COMPLETE.'">'.
						html_image(DIR_MAGNALISTER_IMAGES . 'status/green_dot.png', ML_MEINPAKET_LABEL_CATMATCH_PREPARE_COMPLETE, 12, 12).
					'</td>';
			}
			if ($itemsApplied['itemsCount'] > 0) {
				/* Einige nicht beantragt */
				return $html.'
					<td title="'.ML_MEINPAKET_LABEL_CATMATCH_PREPARE_INCOMPLETE.'">'.
						html_image(DIR_MAGNALISTER_IMAGES . 'status/yellow_dot.png', ML_MEINPAKET_LABEL_CATMATCH_PREPARE_INCOMPLETE, 12, 12).
					'</td>';
			}
		}
		return $html.'
			<td title="'.ML_ERROR_UNKNOWN.' $itemsApplied:'.print_m($itemsApplied, true).' $totalItems:'.$totalItems.'">'.
				html_image(DIR_MAGNALISTER_IMAGES . 'status/red_dot.png', ML_ERROR_UNKNOWN, 12, 12).
				html_image(DIR_MAGNALISTER_IMAGES . 'status/red_dot.png', ML_ERROR_UNKNOWN, 12, 12).
			'</td>';
	}

	private function renderCatBlock($data) {
		return '
			<table class="nostyle"><tbody>
				<tr><td>MP:</td><td>'.(empty($data['MarketplaceCategory']) ? '&mdash;' : $data['MarketplaceCategory']).'</td><tr>
				<tr><td>Store:</td><td>'.(empty($data['StoreCategory']) ? '&mdash;' : $data['StoreCategory']).'</td><tr>
			</tbody></table>';
	}

	public function getAdditionalProductInfo($pID, $data = false) {
		$a = MagnaDB::gi()->fetchRow('
			SELECT products_id, MarketplaceCategory, StoreCategory
			  FROM '.TABLE_MAGNA_MEINPAKET_PROPERTIES.' 
			 WHERE '.((getDBConfigValue('general.keytype', '0') == 'artNr')
						? 'products_model="'.MagnaDB::gi()->escape($data['products_model']).'"'
						: 'products_id="'.$pID.'"'
					).'
				   AND mpID="'.$this->_magnasession['mpID'].'"
		');
		if ($a !== false) {
			if ($a['MarketplaceCategory'] != '') {
				return '
					<td>'.$this->renderCatBlock($a).'</td>
					<td>'.html_image(DIR_MAGNALISTER_IMAGES . 'status/green_dot.png', ML_MEINPAKET_LABEL_CATMATCH_PREPARE_COMPLETE, 12, 12).'</td>';
			} else {
				return '
					<td>'.$this->renderCatBlock($a).'</td>
					<td>'.html_image(DIR_MAGNALISTER_IMAGES . 'status/red_dot.png', ML_MEINPAKET_LABEL_CATMATCH_PREPARE_INCOMPLETE, 12, 12).'</td>';
			}
		}
		return '
			<td>&mdash;</td>
			<td>'.html_image(DIR_MAGNALISTER_IMAGES . 'status/grey_dot.png', ML_MEINPAKET_LABEL_CATMATCH_NOT_PREPARED, 12, 12).'</td>';
	}

	public function getFunctionButtons() {
		return '
			<input type="hidden" value="'.$this->settings['selectionName'].'" name="selectionName"/>
			<input type="hidden" value="_" id="actionType"/>
			<table class="right"><tbody>
				<tr>
					<td class="texcenter inputCell">
						<input type="submit" class="fullWidth button smallmargin" value="'.ML_EBAY_LABEL_PREPARE.'" id="prepare" name="prepare"/>
					</td>
				</tr>
			</tbody></table>
		';
	}

	public function getLeftButtons() {
		return '<input type="submit" class="button" value="'.ML_EBAY_BUTTON_UNPREPARE.'" id="unprepare" name="unprepare"/>';
	}
}

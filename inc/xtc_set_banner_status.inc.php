<?php

/* -----------------------------------------------------------------
 * 	$Id: xtc_set_banner_status.inc.php 866 2014-03-17 12:07:35Z akausch $
 * 	Copyright (c) 2011-2021 commerce:SEO by Webdesign Erfurt
 * 	http://www.commerce-seo.de
 * ------------------------------------------------------------------
 * 	based on:
 * 	(c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
 * 	(c) 2002-2003 osCommerce - www.oscommerce.com
 * 	(c) 2003     nextcommerce - www.nextcommerce.org
 * 	(c) 2005     xt:Commerce - www.xt-commerce.com
 * 	Released under the GNU General Public License
 * --------------------------------------------------------------- */

// Sets the status of a banner
function xtc_set_banner_status($banners_id, $status) {
    if ($status == '1') {
        return xtc_db_query("UPDATE " . TABLE_BANNERS . " SET status = '1', date_status_change = now(), date_scheduled = NULL WHERE banners_id = '" . (int) $banners_id . "';");
    } elseif ($status == '0') {
        return xtc_db_query("UPDATE " . TABLE_BANNERS . " SET status = '0', date_status_change = now() WHERE banners_id = '" . (int) $banners_id . "';");
    } else {
        return -1;
    }
}

/**
 * @version SOFORT Gateway 5.2.0 - $Date: 2013-06-05 15:01:19 +0200 (Mi, 05 Jun 2013) $
 * @author SOFORT AG (integration@sofort.com)
 * @link http://www.sofort.com/
 *
 * Copyright (c) 2012 SOFORT AG
 * 
 * Released under the GNU General Public License (Version 2)
 * [http://www.gnu.org/licenses/gpl-2.0.html]
 *
 * $Id: testAuth.js 420 2013-06-19 18:04:39Z akausch $
 */

var testApiKey = function() {
var apiKey = jQuery('[name|="configuration[MODULE_PAYMENT_SOFORT_MULTIPAY_APIKEY]"]').attr('value');

	jQuery('#su_ajax_loader').css('display','block');
	jQuery.post("../callback/sofort/ressources/javascript/testAuth_2.php", {k: apiKey},
		function(data){
		jQuery('#su_ajax_loader').css('display','none');
			if(data.substring(0,1) == 't') alert(data.substring(1));
			else if(data.substring(0,1) == 'f') alert(data.substring(1));
		});
}

document.write('<input type="button" onclick="javascript:testApiKey()" value="Test" /><span id="su_ajax_loader" style="display:none;"><img src="../callback/sofort/ressources/images/loader.gif" /></span>');
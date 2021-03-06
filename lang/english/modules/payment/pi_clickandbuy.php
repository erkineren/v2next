<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @category  PayIntelligent
 * @package   PayIntelligent_ClickandBuy
 * @copyright (C) 2010 PayIntelligent GmbH  <http://www.payintelligent.de/>
 * @license   GPLv2
 */

define('MODULE_PAYMENT_PI_CLICKANDBUY_STATUS_TITLE', 'Activate ClickandBuy');
define('MODULE_PAYMENT_PI_CLICKANDBUY_STATUS_DESC', 'Do you accept ClickandBuy?');

define('MODULE_PAYMENT_PI_CLICKANDBUY_TEXT', 'ClickandBuy');
define('MODULE_PAYMENT_PI_CLICKANDBUY_TEXT_TITLE', 'ClickandBuy');
define('MODULE_PAYMENT_PI_CLICKANDBUY_TEXT_DESCRIPTION', 'Test');
define('MODULE_PAYMENT_PI_CLICKANDBUY_TEXT_DESCRIPTION_HEAD', 'Offer and accept all relevant payment methods with ClickandBuy - worldwide!');
define('MODULE_PAYMENT_PI_CLICKANDBUY_TEXT_DESCRIPTION_TEXT_1', 'No registration fee, no monthly fee, no fixed costs!!!');
define('MODULE_PAYMENT_PI_CLICKANDBUY_TEXT_DESCRIPTION_TEXT_2', 'Commission: 1.9 % + 0.35 Euro per transaction');
define('MODULE_PAYMENT_PI_CLICKANDBUY_TEXT_DESCRIPTION_SUBHEAD', 'Sign up now with ClickandBuy as a commercial merchant');
define('MODULE_PAYMENT_PI_CLICKANDBUY_MERCHANT_ID_TITLE', 'Merchant ID');
define('MODULE_PAYMENT_PI_CLICKANDBUY_MERCHANT_ID_DESC', 'Number identifying the merchant');
define('MODULE_PAYMENT_PI_CLICKANDBUY_PROJECT_ID_TITLE', 'Project ID');
define('MODULE_PAYMENT_PI_CLICKANDBUY_PROJECT_ID_DESC', 'Number representing the API-key used for this payment calls');
define('MODULE_PAYMENT_PI_CLICKANDBUY_SECRET_KEY_TITLE', 'Project Secret Key');
define('MODULE_PAYMENT_PI_CLICKANDBUY_SECRET_KEY_DESC', 'Your ClickandBuy project shared secret key for token generation');
define('MODULE_PAYMENT_PI_CLICKANDBUY_SECRET_KEY_MMS_TITLE', 'MMS Secret Key');
define('MODULE_PAYMENT_PI_CLICKANDBUY_SECRET_KEY_MMS_DESC', 'Your ClickandBuy MMS shared secret key for the XML event verification');
define('MODULE_PAYMENT_PI_CLICKANDBUY_SANDBOX_TITLE', 'Sandbox');
define('MODULE_PAYMENT_PI_CLICKANDBUY_SANDBOX_DESC', 'Activate sandbox?');
define('MODULE_PAYMENT_PI_CLICKANDBUY_MERCHANT_REGISTRATION_BUTTON', 'ClickandBuy Registration');

define('MODULE_PAYMENT_PI_CLICKANDBUY_SORT_ORDER_TITLE', 'Sort order of display');
define('MODULE_PAYMENT_PI_CLICKANDBUY_SORT_ORDER_DESC', 'Sort order of display. Lowest is displayed first.');
define('MODULE_PAYMENT_PI_CLICKANDBUY_ZONE_TITLE', 'Payment Zone');
define('MODULE_PAYMENT_PI_CLICKANDBUY_ZONE_DESC', 'If a zone is selected, only enable this payment method for that zone.');
define('MODULE_PAYMENT_PI_CLICKANDBUY_ORDER_STATUS_ID_TITLE', 'Set Order Status');
define('MODULE_PAYMENT_PI_CLICKANDBUY_ORDER_STATUS_ID_DESC', 'Set the status of orders made with this payment module to this value');
define('MODULE_PAYMENT_PI_CLICKANDBUY_ALLOWED_TITLE', 'Allowed Zones');
define('MODULE_PAYMENT_PI_CLICKANDBUY_ALLOWED_DESC', 'Please enter the zones separately which should be allowed to use this modul (e. g. DE,AT (leave empty if you want to allow all zones))');

define('MODULE_PAYMENT_PI_CLICKANDBUY_CHECKOUT_TEXT_INFO', 'Easy and secure payments with Credit/Debit Card, Direct Debit,<br />Online Bank Transfer and cash funding.');
define('MODULE_PAYMENT_PI_CLICKANDBUY_CHECKOUT_MORE_INFO_LINK_TITLE', 'More');
define('MODULE_PAYMENT_PI_CLICKANDBUY_SHIPPING_COSTS_TEXT', 'Shipping costs');

define('CLICKANDBUY_CHECKOUT_ORDER_DESCRIPTION', 'Your purchase at ');

define('CLICKANDBUY_ERROR_MESSAGE_1', 'Invalid shash in pi_clickandbuy_do_trans.php%20');
define('CLICKANDBUY_ERROR_MESSAGE_2', 'An error has occurred. Probably, this is a temporary error. Error message: ');
define('CLICKANDBUY_ERROR_MESSAGE_3', 'Please try again. If the problem persists, contact our support.');
define('CLICKANDBUY_ERROR_MESSAGE_4', 'Wrong shash in before_process.');
define('CLICKANDBUY_ERROR_MESSAGE_5', 'Handshake error in before_process.');
define('CLICKANDBUY_ERROR_MESSAGE_6', 'Unkown');
define('CLICKANDBUY_ERROR_MESSAGE_7', 'Handshake error in pi_clickandbuy_trans.php');
define('CLICKANDBUY_ERROR_MESSAGE_8', 'Invalid shash#1 in pi_clickandbuy_trans.php');
define('CLICKANDBUY_ERROR_MESSAGE_9', 'Invalid shash#2 in pi_clickandbuy_trans.php');

define('CLICKANDBUY_LANG_CODE', 'GB_en');

?>
<?php
#########################################################
#                                                       #
#  CC / Credit Card payment method                      #
#  This module is used for real time processing         #
#                                                       #
#  Copyright (c) Novalnet AG                            #
#                                                       #
#  Released under the GNU General Public License        #
#  This free contribution made by request.              #
#  If you have found this script usefull a small        #
#  recommendation as well as a comment on merchant form #
#  would be greatly appreciated.                        #
#                                                       #
#  Script : novalnet_cc.php                             #
#                                                       #
#########################################################

include_once 'novalnet_common.php';

define('MODULE_PAYMENT_NOVALNET_CC_TEXT_TITLE', 'Kreditkarte');
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_PUBLIC_TITLE', 'Kreditkarte');

define('MODULE_PAYMENT_NOVALNET_CC_LOGO_TITLE', NOVALNET_TEXT_LOGO_IMAGE . '&nbsp;');
define('MODULE_PAYMENT_NOVALNET_CC_PAYMENT_LOGO_TITLE', '<a href="https://www.novalnet.de" target="_new"><img src="'.$img_src.'Visa_Mastercard.png" alt="Kreditkarte " height="25px;" title="Kreditkarte" border="0"></a>');
define('MODULE_PAYMENT_NOVALNET_CC_AMEX_LOGO_TITLE', '<a href="https://www.novalnet.de" target="_new"><img src="'.$img_src.'Amex.png" alt="AMEX" title="AMEX" height="25px;" border="0"></a>');
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_DESCRIPTION', '<span style="float:left;clear:both;">' . NOVALNET_CC_TEXT_DESCRIPTION . '</span>');

if (MODULE_PAYMENT_NOVALNET_CC_NOVALNET_LOGO_ACTIVE_MODE == 'True') {
        define('MODULE_PAYMENT_NOVALNET_CC_LOGO_STATUS',  MODULE_PAYMENT_NOVALNET_CC_LOGO_TITLE);
} else{
        define('MODULE_PAYMENT_NOVALNET_CC_LOGO_STATUS', '' );
}

if (MODULE_PAYMENT_NOVALNET_CC_PAYMENT_LOGO_ACTIVE_MODE == 'True') {
        define('MODULE_PAYMENT_NOVALNET_CC_PAYMENT_LOGO_STATUS', MODULE_PAYMENT_NOVALNET_CC_PAYMENT_LOGO_TITLE);
}else {
        define('MODULE_PAYMENT_NOVALNET_CC_PAYMENT_LOGO_STATUS', '');
}

if (MODULE_PAYMENT_NOVALNET_CC_AMEX_LOGO_ACTIVE_MODE == 'True') {
        define('MODULE_PAYMENT_NOVALNET_CC_PAYMENT_AMEX_LOGO_STATUS', MODULE_PAYMENT_NOVALNET_CC_AMEX_LOGO_TITLE);
}else {
        define('MODULE_PAYMENT_NOVALNET_CC_PAYMENT_AMEX_LOGO_STATUS', '');
}

define('MODULE_PAYMENT_NOVALNET_CC_TEXT_JS_NN_CHECK_LIMIT_MISSING', NOVALNET_TEXT_JS_NN_CHECK_LIMIT_MISSING);
define('MODULE_PAYMENT_NOVALNET_CC_IN_TEST_MODE', NOVALNET_IN_TEST_MODE);
define('MODULE_PAYMENT_NOVALNET_CC_NOT_CONFIGURED', NOVALNET_NOT_CONFIGURED);
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_LANG', NOVALNET_TEXT_LANG);
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_INFO', NOVALNET_TEXT_INFO);
define('MODULE_PAYMENT_NOVALNET_CC_STATUS_TITLE', NOVALNET_STATUS_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_STATUS_DESC', NOVALNET_STATUS_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_VENDOR_ID_TITLE', NOVALNET_VENDOR_ID_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_VENDOR_ID_DESC', NOVALNET_VENDOR_ID_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_AUTH_CODE_TITLE', NOVALNET_AUTH_CODE_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_AUTH_CODE_DESC', NOVALNET_AUTH_CODE_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PRODUCT_ID_TITLE', NOVALNET_PRODUCT_ID_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_PRODUCT_ID_DESC', NOVALNET_PRODUCT_ID_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_TARIFF_ID_TITLE', NOVALNET_TARIFF_ID_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_TARIFF_ID_DESC', NOVALNET_TARIFF_ID_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PASSWORD_TITLE', NOVALNET_PASSWORD_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_PASSWORD_DESC', NOVALNET_PASSWORD_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_MANUAL_CHECK_LIMIT_TITLE', NOVALNET_MANUAL_CHECK_LIMIT_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_MANUAL_CHECK_LIMIT_DESC', NOVALNET_MANUAL_CHECK_LIMIT_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PRODUCT_ID2_TITLE', NOVALNET_PRODUCT_ID2_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_PRODUCT_ID2_DESC', NOVALNET_PRODUCT_ID2_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_TARIFF_ID2_TITLE', NOVALNET_TARIFF_ID2_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_TARIFF_ID2_DESC', NOVALNET_TARIFF_ID2_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_COMPLETE_ORDER_STATUS_ID_TITLE', NOVALNET_COMPLETE_ORDER_STATUS_ID_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_COMPLETE_ORDER_STATUS_ID_DESC', NOVALNET_ORDER_STATUS_ID_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_SORT_ORDER_TITLE', NOVALNET_SORT_ORDER_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_SORT_ORDER_DESC', NOVALNET_SORT_ORDER_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_ZONE_TITLE', NOVALNET_ZONE_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_ZONE_DESC', NOVALNET_ZONE_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_ALLOWED_TITLE', NOVALNET_ALLOWED_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_ALLOWED_DESC', NOVALNET_ALLOWED_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_INFO_TITLE', NOVALNET_INFO_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_INFO_DESC', NOVALNET_INFO_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_JS_NN_MISSING', NOVALNET_TEXT_JS_NN_MISSING);
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_ERROR', NOVALNET_CC_TEXT_ERROR);
define('MODULE_PAYMENT_NOVALNET_CC_TEST_ORDER_MESSAGE', NOVALNET_TEST_ORDER_MESSAGE);
define('MODULE_PAYMENT_NOVALNET_CC_TEST_MODE', NOVALNET_TEST_MODE_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_TEST_MODE_TITLE', NOVALNET_TEST_MODE_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_TEST_MODE_DESC', NOVALNET_TEST_MODE_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_HASH_ERROR', NOVALNET_TEXT_HASH_ERROR);
define('MODULE_PAYMENT_NOVALNET_CC_PASSWORD_TITLE', NOVALNET_PASSWORD_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_PASSWORD_DESC', NOVALNET_PASSWORD_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PROXY_TITLE', NOVALNET_PROXY_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_PROXY_DESC', NOVALNET_PROXY_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_AUTO_REFILL_TITLE', NOVALNET_EMPTY_FIELDS_AUTO_REFILL_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_REFERENCE1_TITLE', NOVALNET_REFERENCE1_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_REFERENCE1_DESC', NOVALNET_REFERENCE1_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_REFERENCE2_TITLE', NOVALNET_REFERENCE2_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_REFERENCE2_DESC', NOVALNET_REFERENCE2_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_REFERRER_ID_TITLE', NOVALNET_REFERRER_ID_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_REFERRER_ID_DESC', NOVALNET_REFERRER_ID_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_JS_NN_ID2_MISSING', NOVALNET_TEXT_JS_NN_ID2_MISSING);
define('MODULE_PAYMENT_NOVALNET_CC_TID_MESSAGE', NOVALNET_TID_MESSAGE);
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_REFERRER_ID_ERROR', NOVALNET_REFERRER_ID_ERROR);
define('MODULE_PAYMENT_NOVALNET_CC_TEXT_JS_COMMON_ERROR', 'Geben Sie bitte g&uuml;ltige Kreditkartendaten ein!');
define('MODULE_PAYMENT_NOVALNET_CC_AUTH_ERROR','Authentifizierung fehlgeschlagen!');
define('MODULE_PAYMENT_NOVALNET_CC_3DSECURE_CHECK_TITLE','3D Secure (Achtung : dies muss zuerst bei Novalnet eingerichtet werden: bitte wenden Sie sich an support@novalnet.de, falls Sie dies w&uuml;nschen) ');
define('MODULE_PAYMENT_NOVALNET_CC_3DSECURE_CHECK_DESC','(Bitte beachten Sie; dass dieses Verfahren nur eine geringe Akzeptanz bei Endkunden hat). Sobald 3D-Secure f&uuml;r Kreditkarten aktiviert ist, läßt die Bank den K&auml;ufer ein Passwort eingeben, um den Mißbrauch der Kreditkarte zu verhindern. Dies kann als Beweis verwendet werden, dass der K&auml;ufer tats&auml;chlich der Inhaber der Kreditkarte ist.');
define('MODULE_PAYMENT_NOVALNET_CC_NOVALNET_LOGO_ACTIVE_MODE_TITLE', NOVALNET_LOGO_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_NOVALNET_LOGO_ACTIVE_MODE_DESC', NOVALNET_LOGO_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PAYMENT_LOGO_ACTIVE_MODE_TITLE', NOVALNET_PAYMENT_LOGO_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_PAYMENT_LOGO_ACTIVE_MODE_DESC', NOVALNET_PAYMENT_LOGO_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_AMEX_LOGO_ACTIVE_MODE_TITLE', NOVALNET_PAYMENT_AMEX_LOGO_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_AMEX_LOGO_ACTIVE_MODE_DESC', NOVALNET_PAYMENT_AMEX_LOGO_DESC);

//Pin by callback
define('MODULE_NN_CC_PIN_TITLE', MODULE_NN_PIN_TITLE);
define('MODULE_NN_CC_PIN_DESC', MODULE_NN_PIN_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_MIN_LIMIT_TITLE', NOVALNET_PIN_BY_CALLBACK_MIN_LIMIT_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_MIN_LIMIT_DESC', NOVALNET_PIN_BY_CALLBACK_MIN_LIMIT_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_TEL', NOVALNET_PIN_BY_CALLBACK_SMS_TEL);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_TITLE', NOVALNET_PIN_BY_CALLBACK_SMS_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_DESC', NOVALNET_PIN_BY_CALLBACK_SMS_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_TEL', NOVALNET_PIN_BY_CALLBACK_SMS_TEL);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_MOB', NOVALNET_PIN_BY_CALLBACK_SMS_MOB);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_PIN', NOVALNET_PIN_BY_CALLBACK_SMS_PIN);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_NEW_PIN', NOVALNET_PIN_BY_CALLBACK_SMS_NEW_PIN);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_TEL_NOTVALID', NOVALNET_PIN_BY_CALLBACK_SMS_TEL_NOTVALID);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_PIN_NOTVALID', NOVALNET_PIN_BY_CALLBACK_SMS_PIN_NOTVALID);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_CALL_MESSAGE', NOVALNET_PIN_BY_CALLBACK_SMS_CALL_MESSAGE);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_MIN_LIMIT_TITLE', NOVALNET_PIN_BY_CALLBACK_MIN_LIMIT_TITLE);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_MIN_LIMIT_DESC', NOVALNET_PIN_BY_CALLBACK_MIN_LIMIT_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_INPUT_REQUEST_DESC', NOVALNET_PIN_INPUT_REQUEST_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SESSION_ERROR', NOVALNET_PIN_BY_CALLBACK_SESSION_ERROR);
define('MODULE_PAYMENT_NOVALNET_CC_EMAIL_INPUT_REQUEST_DESC', NOVALNET_EMAIL_INPUT_REQUEST_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_EMAIL', NOVALNET_PIN_BY_CALLBACK_EMAIL);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_EMAIL_NOTVALID', NOVALNET_PIN_BY_CALLBACK_EMAIL_NOTVALID);
define('MODULE_PAYMENT_NOVALNET_CC_FORGOT_PIN_INFO', NOVALNET_FORGOT_PIN_INFO);
define('MODULE_PAYMENT_NOVALNET_CC_FORGOT_PIN_DIV', NOVALNET_FORGOT_PIN_DIV);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_MOB_NUMBER', NOVALNET_PIN_BY_CALLBACK_SMS_MOB_NUMBER);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_BY_CALLBACK_SMS_TEL_NUMBER', NOVALNET_PIN_BY_CALLBACK_SMS_TEL_NUMBER);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_CHECK_MSG', NOVALNET_PIN_CHECK_MSG);
define('MODULE_PAYMENT_NOVALNET_CC_EMAIL_REPLY_CHECK_MSG', NOVALNET_EMAIL_REPLY_CHECK_MSG);
define('MODULE_PAYMENT_NOVALNET_CC_EMAIL_REPLY_INFO', NOVALNET_EMAIL_REPLY_INFO);
define('MODULE_PAYMENT_NOVALNET_CC_EMAIL_REPLY_CHECKBOX_INFO', NOVALNET_EMAIL_REPLY_CHECKBOX_INFO);
define('MODULE_PAYMENT_NOVALNET_CC_EMAIL_INFO_DESC', NOVALNET_EMAIL_INFO_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_PIN_INFO_DESC', NOVALNET_PIN_INFO_DESC);
define('MODULE_PAYMENT_NOVALNET_CC_AMOUNT_VARIATION_MESSAGE', NOVALNET_AMOUNT_VARIATION_MESSAGE);

//Pin by Option Values
define('NOVALNET_NOT_ACTIVE','Nicht aktiv');
define('NOVALNET_CALLBACK',' Callback (Telefon & Handy) ');
define('NOVALNET_EMAIL','Antwort per Email ');
define('NOVALNET_SMS','SMS (nur Handy) ');
<?php
/*-----------------------------------------------------------------
* 	$Id: create_account.php 420 2013-06-19 18:04:39Z akausch $
* 	Copyright (c) 2011-2021 commerce:SEO by Webdesign Erfurt
* 	http://www.commerce-seo.de
* ------------------------------------------------------------------
* 	based on:
* 	(c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
* 	(c) 2002-2003 osCommerce - www.oscommerce.com
* 	(c) 2003     nextcommerce - www.nextcommerce.org
* 	(c) 2005     xt:Commerce - www.xt-commerce.com
* 	Released under the GNU General Public License
* ---------------------------------------------------------------*/




define('NAVBAR_TITLE', 'Konto erstellen');

define('HEADING_TITLE', 'Kundenkonto Admin');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>ACHTUNG:</b></font></small> Wenn Sie bereits ein Konto besitzen, melden Sie sich bitte <a href="%s"><u><b>hier</b></u></a> an.');

define('EMAIL_SUBJECT', 'Willkommen bei ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Sehr geehrter Herr ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_MS', 'Sehr geehrte Frau ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_NONE', 'Sehr geehrte ' . stripslashes($HTTP_POST_VARS['firstname']) . ',' . "\n\n");
define('EMAIL_WELCOME', 'Willkommen bei <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Sie k&ouml;nnen jetzt unseren <b>Online-Service</b> nutzen. Der Service bietet unter anderem:' . "\n\n" . '<li><b>Kundenwarenkorb</b> - Jeder Artikel bleibt darin registriert bis Sie zur Kasse bezahlen, oder die Artikel aus dem Warenkorb entfernen.' . "\n" . '<li><b>Adressbuch</b> - Wir k&ouml;nnen jetzt die Artikel zu der von Ihnen ausgesuchten Adresse senden. Der perfekte Weg ein Geburtstagsgeschenk zu versenden.' . "\n" . '<li><b>Vorherige Bestellungen</b> - Sie k&ouml;nnen jederzeit Ihre vorangegangenen Bestellungen &uuml;berpr&uuml;fen.' . "\n" . '<li><b>Meinungen &uuml;ber Artikel</b> - Teilen Sie Ihre Meinung zu unseren Artikeln mit anderen Kunden.' . "\n\n");
define('EMAIL_CONTACT', 'Falls Sie Fragen zu unserem Kunden-Service haben, wenden Sie sich bitte an uns: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Achtung:</b> Diese eMail-Adresse wurde uns von einem Kunden bekannt gegeben. Falls Sie sich nicht angemeldet haben, senden Sie bitte eine eMail an ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('ENTRY_PAYMENT_UNALLOWED','Nicht erlaubte Zahlungsmodule:');
define('ENTRY_SHIPPING_UNALLOWED','Nicht erlaubte Versandmodule:');
define('ENTRY_VAT_ERROR','<b>Keine gültige UST-ID</b>');
define('ENTRY_REQUIRE','<span style="color:red">* erforderliche Felder</span>');
?>
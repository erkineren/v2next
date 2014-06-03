<?php
/*
 * #########################################################################################################
 * Project: Blog_3.0.0.1
 * #########################################################################################################
 * 
 * blog.php
 * 
 * 23.02.2014 www.indiv-style.de
 * 
 * Copyright by H&S eCom 
 * @author little Pit(S.B.)
 * 
 * #########################################################################################################
 */

define('HEADING_TITLE','BLOG f&uuml;r Gambio GX2 - V3.0');
define('TABLE_HEADING_NAVIGATION','Navigation:');
define('TABLE_HEADING_DATE','Datum - (tt mm jjjj)');
define('TABLE_HEADING_DATEINFO','Tragen Sie hier das Datum ein. Wenn Sie diese Felder leer lassen wird das Tagesdatum verwendet.');
define('TABLE_HEADING_DESCRIPTION','Blogeintrag');
define('TABLE_HEADING_SHORTDESC','Kurzbeschreibung');
define('TABLE_HEADING_CATDESC','Kategoriebeschreibung');
define('TABLE_HEADING_BLOG_TOPIC','Seiten: ');
define('TABLE_HEADING_BLOG_TOPIC_OFF','davon Offline: ');
define('TABLE_HEADING_NAVIGATION_OVERVIEW','&Uuml;bersicht');
define('TABLE_HEADING_NAVIGATION_NEWCATEGORIE','Neue Kategorie');
define('TABLE_HEADING_NEWCATEGORIE_STATUS','Status');
define('TABLE_HEADING_NAVIGATION_NEWITEM','Neues Thema');
define('TABLE_HEADING_NAVIGATION_STARTSITE','Startseite bearbeiten');
define('TABLE_HEADING_NAVIGATION_SETTINGS','Einstellungen');
define('VALUE_YES', 'ja');
define('VALUE_NO', 'nein');
define('VALUE_SEND', 'Absenden');
define('SAVE_SUCCESS', '<span style="color:#ff0000;font-weight:700">Deine Einstellungen wurden gespeichert.</span><br /><br />');
define('SOCIAL_TITLE', 'Social Bookmarks');
define('SOCIAL_DESC', 'Sollen &uuml;ber dem Artikel Sociallinks angezeigt werden, die den Betrag beim entsprechenden Dienst verlinken?');
define('REGISTER_USER_TITLE','Kunde');
define('REGISTER_USER_DESC','D&uuml;rfen nur registrierte Kunden eine Bewertung abgeben?');
define('COMMENTS_TITLE', 'Bewertungen');
define('COMMENTS_DESC', 'Geben Sie dem Kunden die M&ouml;glichkeit zu Ihrem Beitrag eine Meinung zu schreiben.<br />Sind Sie als eingeloggter Admin im Blog, k&ouml;nnen Sie einzelne Bewertungen l&ouml;schen');
define('BLOG_CAPTCHA_TITLE','Captcha');
define('BLOG_CAPTCHA_DESC','Soll eine Captcha-Abfrage bei Bewertungen eingef&uuml;gt werden?');
define('PIC_CAT_TITLE','Bilderanzahl Kategorien');
define('PIC_CAT_DESC','Geben sie die Anzahl der Bilder an, welche f&uuml;r die Slider verwendet werden sollen.');
define('PIC_START_TITLE','Bilderanzahl Startseite');
define('PIC_START_DESC','Geben sie die Anzahl der Bilder an, welche f&uuml;r die Slider verwendet werden sollen.');
define('PIC_ITEM_TITLE','Bilderanzahl Beitr&auml;ge');
define('PIC_ITEM_DESC','Geben sie die Anzahl der Bilder an, welche f&uuml;r die Slider verwendet werden sollen.');
define('RATE_TITLE', 'Bewertung');
define('RATE_DESC', 'D&uuml;rfen Kunden Ihren Beitrag bewerten?');
define('SESSION_RATE_TITLE', 'Session Sperre');
define('SESSION_RATE_DESC', 'D&uuml;rfen Kunden nur eine Bewertung pro Beitrag in einer Session abgeben?');
define('BLOG_NAV_AJAX_TITLE','Box mit 2. Kat-Ebene');
define('BLOG_NAV_AJAX_DESC','M&ouml;chten Sie in der Box die 2. Kategorieebene anzeigen lassen? ');
define('TABLE_HEADING_EDIT_ALL','Alle Titeln bearbeiten');
define('TABLE_HEADING_TITLE','Kategorien');
define('TABLE_HEADING_DESC','Content');
define('TABLE_HEADING_ACTION','Aktion');
define('TABLE_HEADING_ACTION_EDIT_0','---');
define('TABLE_HEADING_ACTION_EDIT','Bearbeiten');
define('TABLE_HEADING_ACTION_NEWITEM','Neu');
define('TABLE_FOOTER_STATUS','Status: ');	
define('TABLE_FOOTER_STATUS_0','---');	
define('TABLE_FOOTER_STATUS_1','Offline');	
define('TABLE_FOOTER_STATUS_2','Online');	
define('TABLE_FOOTER_STATUS_3','L&ouml;schen');	
define('UPDATE_ENTRY','Aktualisieren?');	
define('UPDATE_SAVE','Speichern');	
// Neue Kategorie
define('TABLE_HEADING_NEWCATEGORIE_NAME','Bezeichung');	
define('TABLE_HEADING_NEWCATEGORIE_POSITION','Position');	
// Neuer Blogbeitrag
define('TABLE_HEADING_NEWITEM_NAME','&Uuml;berschrift');	
define('TABLE_HEADING_NEWITEM_TITLE','Titel f�r die Box');
define('TABLE_HEADING_NEWITEM_LENGHT','Nach wie vielen Zeichen soll in der &Uuml;berischt &quot;abgeschnitten&quot; werden?');
define('TABLE_HEADING_META_TITLE', 'Meta - Titel');	
define('TABLE_HEADING_META_DESCRIPTION', 'Meta - Description');
define('TABLE_HEADING_META_KEYWORDS', 'Meta - Keywords');
// Bewertungen
define('HEADING_TITLE', 'Artikelbewertungen');

// BOF GM_MOD
define('HEADING_SUB_TITLE', 'Artikelkatalog');
// EOF GM_MOD

define('ENTRY_PRODUCT', 'Artikel:');
define('ENTRY_FROM', 'Author:');
define('ENTRY_DATE', 'Datum:');
define('ENTRY_REVIEW', 'Bewertung:');
define('ENTRY_REVIEW_TEXT', '<small><font color="#ff0000"><b>HINWEIS:</b></font></small>&nbsp;HTML wird nicht konvertiert!&nbsp;');
define('ENTRY_RATING', 'Bewertung:');

define('TEXT_INFO_DELETE_REVIEW_INTRO', 'Sind Sie sicher, dass Sie diese Bewertung l&ouml;schen m&ouml;chten?');

define('TEXT_INFO_DATE_ADDED', 'hinzugef&uuml;gt am:');
define('TEXT_INFO_LAST_MODIFIED', 'letzte &Auml;nderung:');
define('TEXT_INFO_IMAGE_NONEXISTENT', 'BILD EXISTIERT NICHT');
define('TEXT_INFO_REVIEW_AUTHOR', 'geschrieben von:');
define('TEXT_INFO_REVIEW_RATING', 'Bewertung:');
define('TEXT_INFO_REVIEW_READ', 'gelesen:');
define('TEXT_INFO_REVIEW_SIZE', 'Gr&ouml;&szlig;e:');
define('TEXT_INFO_PRODUCTS_AVERAGE_RATING', 'durchschnittl. Wertung:');

define('TEXT_OF_5_STARS', '%s von 5 Sternen!');
define('TEXT_GOOD', '<small><font color="#ff0000"><b>GUT</b></font></small>');
define('TEXT_BAD', '<small><font color="#ff0000"><b>SCHLECHT</b></font></small>');
define('TEXT_INFO_HEADING_DELETE_REVIEW', 'Bewertung l&ouml;schen');
?>
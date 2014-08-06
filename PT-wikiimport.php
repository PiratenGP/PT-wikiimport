<?php
/*
Plugin Name: Piraten-Tools / Wikiimport
Plugin URI: https://github.com/PiratenGP/PT-wikiimport
Description: Piraten-Tools / Wikiimport
Version: 1.0.0
Author: @stoppegp
Author URI: http://stoppe-gp.de
License: CC-BY-SA 3.0
*/

global $PT_infos;
$PT_infos[] = array(
	'name'		=>		'Wikiimport',
	'desc'		=>		'Von einer externen Website kann der Inhalt eines div-Containers mit bekannter ID ausgelesen und ausgegeben werden.
Dadurch kann man zum Beispiel automatisiert die Tagesordnung des nächsten Stammtischs aus dem Piratenwiki ausgeben.
(Anleitung tbd)',
);

require('mainmenu.php');

if (!function_exists("piratentools_main_menu")) {
	add_action( 'admin_menu', 'piratentools_main_menu');
	function piratentools_main_menu() {
		add_menu_page( "Piraten-Tools", "Piraten-Tools", 0, "piratentools" , "PT_main_menu");
	}
}

add_action( 'admin_menu', 'PT_wikiimport_main_menu' );
function PT_wikiimport_main_menu() {
	add_submenu_page( "piratentools", "Wiki Import", "Wiki Import", "manage_options", "pt_wikiimport", array("PT_wikiimport", "adminmenu") );
}

require('wikiimport/wikiimport.php');
?>
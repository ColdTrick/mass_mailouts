<?php
	/**
	 * Mass Mail outs.
	 * 
	 * @package mass_mailouts
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author ColdTrick IT Solutions
	 * @copyright ColdTrick 2009
	 * @link http://www.coldtrick.com/
	 */
	global $CONFIG;
	
	/**
	 * Initialise and set up the menus.
	 *
	 */
	function mass_mailouts_init(){
		// Extend CSS
		extend_view("css", "mass_mailouts/css");
		
		// Register a page handler, so we can have nice URLs
		register_page_handler('mass_mailouts','mass_mailouts_page_handler');
	}
	
	/**
	 * Adding to the admin menu
	 *
	 */
	function mass_mailouts_pagesetup(){
		if (get_context() == 'admin' && isadminloggedin()) {
			global $CONFIG;
			add_submenu_item(elgg_echo('mass_mailouts'), $CONFIG->wwwroot . 'pg/mass_mailouts/');
		}
	}
	
	/**
	 * page handler
	 *
	 * @param array $page Array of page elements, forwarded by the page handling mechanism
	 */
	function mass_mailouts_page_handler($page) {
		global $CONFIG;
		
		if($page[0] == "progressWindow"){
			include($CONFIG->pluginspath . "mass_mailouts/progressWindow.php");
		} else {
			include($CONFIG->pluginspath . "mass_mailouts/index.php"); 
		}
	}
	
	// Initialise log browser
	register_elgg_event_handler('init','system','mass_mailouts_init');
	register_elgg_event_handler('pagesetup','system','mass_mailouts_pagesetup');
	
	// Register Action
	register_action("mass_mailouts/send", false, $CONFIG->pluginspath . "mass_mailouts/actions/mass_mailouts/send.php", true);
	register_action("mass_mailouts/progress", false, $CONFIG->pluginspath . "mass_mailouts/actions/mass_mailouts/progress.php", true);
?>
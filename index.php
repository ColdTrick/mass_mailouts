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

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

admin_gatekeeper();
set_context('admin');

// Set admin user for user block
set_page_owner($_SESSION['guid']);

$title = elgg_view_title(elgg_echo('mass_mailouts'));
$form = elgg_view('mass_mailouts/form');

$page_data = $title . $form;

// Display main admin menu
page_draw(elgg_echo('mass_mailouts'), elgg_view_layout("two_column_left_sidebar", '', $page_data));

?>

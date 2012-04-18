<?php 
/**
* Mass Mail outs.
* 
* Get the progress of sending all the mails
* 
* @package mass_mailouts
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
* @author ColdTrick IT Solutions
* @copyright ColdTrick 2009
* @link http://www.coldtrick.com/
*/

	admin_gatekeeper();
	
	$user = get_loggedin_user();
	
	$progress = $user->mass_mailouts_progress;
	
	$result = array();
	
	if(!empty($progress)){
		$ts = time();
		$token = generate_action_token($ts);
		
		list($progress, $text) = explode("|", $progress);
		
		if($progress == 100){
			remove_metadata($user->guid, "mass_mailouts_progress");
		}
		
		$result["result"] = true;
		$result["progress"] = $progress;
		$result["text"] = $text;
	} else {
		$result["result"] = false;
	}
	
	// Need new security tokens
	$result["ts"] = $ts;
	$result["token"] = $token;
	
	// Sent correct headers
	header("Content-Type: application/json; charset=UTF-8");
	header("Cache-Control: no-cache");
	header("Pragma: no-cache");
	
	echo json_encode($result);
	
	exit();
?>
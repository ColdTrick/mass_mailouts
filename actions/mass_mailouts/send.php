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
	
	action_gatekeeper();
	admin_gatekeeper();
	
	$subject = get_input('email_subject');
	$text = get_input("email_text", "", false);
	$methods_override = get_input("methods_override", ""); // override default notify
	
	if (!empty($subject) && !empty($text)) {
		$count = get_entities("user", "", 0, null, null, null, true);
		$users = get_entities("user", "", 0, null, $count);
		
		$failure = 0;
		$succes = 0;
		
		$curUser = get_loggedin_user();
		unset($curUser->mass_mailouts_progress);
		
		foreach($users as $user){
			set_time_limit(5);
			
			$newSubject = str_ireplace("[displayname]", $user->name, $subject);
			$newSubject = str_ireplace("[profile]", "<a href='" . $user->getUrl() . "'>" . $user->getUrl() . "</a>", $newSubject);
			$newSubject = str_ireplace("[username]", $user->username, $newSubject);
			$newSubject = str_ireplace("[email]", $user->email, $newSubject);
			$newSubject = str_ireplace("&nbsp;", "", $newSubject);
			
			$newText = str_ireplace("[displayname]", $user->name, $text);
			$newText = str_ireplace("[profile]", "<a href='" . $user->getUrl() . "'>" . $user->getUrl() . "</a>", $newText);
			$newText = str_ireplace("[username]", $user->username, $newText);
			$newText = str_ireplace("[email]", $user->email, $newText);
			$newText = str_ireplace("&nbsp;", "", $newText);
			
			$result = notify_user($user->guid, $user->site_guid, $newSubject, $newText, null, $methods_override);
			
			if($result["email"] === false){
				$failure++;
			} else {
				$succes++;
			}
			
			$percentage = round((($succes + $failure) / $count) * 100);
			
			$curUser->mass_mailouts_progress = $percentage . "|" . sprintf(elgg_echo("mass_mailouts:progress:text"), ($succes + $failure), $count);
		}
		
		if($failure == 0){
			system_message(sprintf(elgg_echo("mass_mailouts:success"), $succes));
		} else {
			if($failure == $count){
				register_error(elgg_echo("mass_mailouts:failure"));
			} else {
				register_error(sprintf(elgg_echo("mass_mailouts:some_errors"), $failure, $count));
			}
		}
	} else {
		register_error(elgg_echo("mass_mailouts:invalid_input"));
	}
	
	exit();
?>
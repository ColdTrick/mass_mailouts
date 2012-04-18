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

	$english = array(
		/**
		 * Menu items and titles
		 */
		'mass_mailouts' => 'Mass Mailing',
		'mass_mailouts:email_text' => 'E-mail Message:',
		'mass_mailouts:subject' => 'E-mail Subject:',
		'mass_mailouts:methods_override' => 'Select the method used for sending this message',
		'mass_mailouts:methods_override:site' => 'Send to site',
		'mass_mailouts:methods_override:email' => 'Send to mail',
		'mass_mailouts:methods_override:user_preference' => 'User defined method',
	
		'mass_mailouts:send' => 'Send E-mail',
	
		'mass_mailouts:footnote' => "You can use the following tags to personalize the emails (can be used is Subject and in Text):",
		'mass_mailouts:footnote:displayname' => "for the user's full name (display name)",
		'mass_mailouts:footnote:profile' => "for the link to the user's Profile page",
		'mass_mailouts:footnote:username' => "for the user's username",
		'mass_mailouts:footnote:email' => "for the user's e-mail address",
		
		'mass_mailouts:invalid_input' => "Incorrect input provided, you need a Subject and some Text",
		'mass_mailouts:success' => 'E-mail has been sent succesfully to %s users',
		'mass_mailouts:some_errors' => 'E-mail failed to be send to some of the users (failure: %s / succes: %s)',
		'mass_mailouts:failure' => 'E-mail failed to be send',
		
		'mass_mailouts:progress:text' => "Send %s of %s",
		'mass_mailouts:progress:window_title' => "Mass Mailouts progress",
	);
	
	add_translation("en", $english);
?>
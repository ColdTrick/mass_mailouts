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

	$dutch = array(
		/**
		 * Menu items and titles
		 */
		'mass_mailouts' => 'Mass Mailouts',
		'mass_mailouts:email_text' => 'E-mail Bericht:',
		'mass_mailouts:subject' => 'E-mail Onderwerp:',
		'mass_mailouts:send' => 'Verstuur E-mail',
		'mass_mailouts:footnote' => "Je kunt de volgende tags gebruiken om de e-mails te personalizeren (kan worden gebruikt in Onderwerp en Tekst):",
		'mass_mailouts:footnote:displayname' => "voor de volledige naam van de gebruiker (weergave naam)",
		'mass_mailouts:footnote:profile' => "voor de link naar het profiel van de gebruiker",
		'mass_mailouts:footnote:username' => "voor de gebruikernaam",
		'mass_mailouts:footnote:email' => "voor het e-mailadres van de gebruiker",
		
		'mass_mailouts:invalid_input' => "Onjuiste invoer, je moet een Onderwerp en Text opgeven",
		'mass_mailouts:success' => 'E-mail is succesvol verstuurd aan %s gebruikers',
		'mass_mailouts:some_errors' => 'E-mail is niet aan alle gebruikers verstuurd (fouten: %s / succes: %s)',
		'mass_mailouts:failure' => 'E-mail is niet verstuurd',
		
		'mass_mailouts:progress:text' => "%s van %s verzonden",
		'mass_mailouts:progress:window_title' => "Mass Mailouts voortgang",
	);
	
	add_translation("nl", $dutch);
?>
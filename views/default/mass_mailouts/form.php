<?php 
	
	$methods_override = array("email" => elgg_echo("mass_mailouts:methods_override:email"), "" => elgg_echo("mass_mailouts:methods_override:user_preference"));
	if(is_plugin_enabled("messages")){
		$methods_override["site"] = elgg_echo("mass_mailouts:methods_override:site");
	}
	
	ksort($methods_override);
		

	$form = "";

	$form .= "<p>";
	$form .= elgg_echo('mass_mailouts:subject');
	$form .= elgg_view('input/text',array('internalname' => 'email_subject'));
	$form .= "</p>";
	
	$form .= "<p>";
	$form .= elgg_echo('mass_mailouts:email_text');
	$form .= elgg_view('input/longtext',array('internalname' => 'email_text'));
	$form .= "</p>";
	
	$form .= "<p>";
	$form .= elgg_echo("mass_mailouts:methods_override");
	$form .= elgg_view("input/pulldown", array("internalname" => "methods_override", "options_values" => $methods_override));
	$form .= "</p>";
	
	$form .= elgg_view('input/submit',array('value' => elgg_echo('mass_mailouts:send')));
	
	$wrappedform2 = elgg_view('input/form',array(
		'body' => $form,
		'internalid' => "massmailForm",
		'action' => $vars['url'] . "pg/mass_mailouts/progressWindow"
	));

?>
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#massmailForm').attr("target", "_blank");

		$('#massmailForm').submit(function(){
			setTimeout("clearForm()", 500);
			
			return true;
		});
	});

	function clearForm(){
		$('#massmailForm').each(function(){
			this.reset();
		});
	}
</script>
<div id="mass_mailouts_email_area" class="contentWrapper">
	<?php echo $wrappedform2; ?>
	<p class="footnote">
		<?php echo elgg_echo("mass_mailouts:footnote"); ?><br />
		<b>[displayname]</b>: <?php echo elgg_echo("mass_mailouts:footnote:displayname"); ?><br />
		<b>[profile]</b>: <?php echo elgg_echo("mass_mailouts:footnote:profile"); ?><br />
		<b>[username]</b>: <?php echo elgg_echo("mass_mailouts:footnote:username"); ?><br />
		<b>[email]</b>: <?php echo elgg_echo("mass_mailouts:footnote:email"); ?><br />
	</p>
</div>

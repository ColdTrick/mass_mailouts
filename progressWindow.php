<?php 
	global $CONFIG;
	
	action_gatekeeper();
	admin_gatekeeper();
	
	$email_subject = get_input("email_subject");
	$email_text = get_input("email_text", "", false);
	$methods_override = get_input("methods_override", "");
	
	$ts = time();
	$token = generate_action_token($ts);
	
	if(!empty($email_subject) && !empty($email_text)){
		$formBody = elgg_view("input/hidden", array("internalname" => "email_subject", "value" => $email_subject));
		$formBody .= elgg_view("input/hidden", array("internalname" => "email_text", "value" => $email_text));
		$formBody .= elgg_view("input/hidden", array("internalname" => "methods_override", "value" => $methods_override));
		
		$form = elgg_view("input/form", array("internalid" => "massmailForm", "action" => $CONFIG->wwwroot . "action/mass_mailouts/send", "body" => $formBody));
	} else {
		$close = "<script type='text/javascript'>window.close();</script>";
		echo $close;
	}
	
?>
<html>
	<head>
		<title><?php echo elgg_echo("mass_mailouts:progress:window_title"); ?></title>
		<script type="text/javascript" src="<?php echo $CONFIG->wwwroot; ?>vendors/jquery/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="<?php echo $CONFIG->wwwroot; ?>mod/mass_mailouts/js/jquery.progressbar.js"></script>
		<script type='text/javascript'>
			var orgTitle = "<?php echo elgg_echo("mass_mailouts:progress:window_title"); ?>";
			var ts = <?php echo $ts; ?>;
			var token = "<?php echo $token; ?>";
			
			$(document).ready(function(){
				checkProgress();
				
				$('#massmailForm').submit(function(){
					$.post(this.action, $('#' + this.id).serialize(), function(data){
						// don't do anything
					});
		
					return false;
				});
		
				$('#massmailForm').submit();
			});
		
			function checkProgress(){
				$.getJSON("<?php echo $CONFIG->wwwroot; ?>action/mass_mailouts/progress?__elgg_ts=" + ts + "&__elgg_token=" + token, function(data){
					if(data.result){
						$('#progress').progressBar(data.progress, { showText: false, 
																	boxImage: '<?php echo $CONFIG->wwwroot; ?>/mod/mass_mailouts/images/progressbar.gif', 
																	barImage: '<?php echo $CONFIG->wwwroot; ?>/mod/mass_mailouts/images/progressbg_green.gif'
																});
						$('#progressText').html(data.text);

						document.title = orgTitle + " (" + data.progress + "%)";
						
						if(parseInt(data.progress) >= 100){
							setTimeout("window.close()", 10000);
						}else {
							setTimeout("checkProgress()", 1000);
						}
					} else {
						setTimeout("checkProgress()", 1000);
					}

					ts = data.ts;
					token = data.token;
				});
				
			}
		</script>
	</head>
	<body>
		<div id='all'>
			<center>
			<div id='sending'>
				<img src="<?php echo $CONFIG->wwwroot; ?>_graphics/ajax_loader.gif" alt="sending" title="sending" />
				<br />
				<br />
			</div>
			<div id="progress"></div>
			<div id="progressText"></div>
			<div id="form" style="display:none;">
				<?php echo $form; ?>
			</div>
			</center>
		</div>
	</body>
</html>
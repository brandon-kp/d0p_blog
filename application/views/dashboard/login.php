<?php
$open     = form_open('dashboard/login');
$username = form_input(array(
'class'=>'login-inp',
'name'=>'username',
'value'=>set_value('username'),
'placeholder'=>'Username...',
));
$password = form_password(array(
'class'=>'login-inp',
'name'=>'password',
'value'=>set_value('password'),
'placeholder'=>'Password...',
));
$close    = form_close();
$form     = array($username,$password);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Internet Dreams</title>
<link rel="stylesheet" href="<?=base_url();?>/static/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="<?=base_url();?>/static/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="<?=base_url();?>/static/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?=base_url();?>/static/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
	<div id="login-holder">
		<div class="clear"></div>
		<div id="loginbox">
			<div id="login-inner">
				<?php 
				echo validation_errors(); 
				?>
				<?=$open;?>
				<ul>
					<? foreach($form as $forms):?>
					<li><?=$forms;?></li>
					<? endforeach; ?>
					<li><input type="submit" class="submit-login" value="" /></li>
				</ul>
				<div class="clear"></div>
				<?=$close;?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>
</html>
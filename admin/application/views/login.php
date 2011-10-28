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

include 'head.inc.php'; 
?>
</head>
	<body>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Sign in to your account</h2>
					<p class="error"><?php 
					echo validation_errors(); 
					?></p>
				</div>
<?=$open;?>			
				<div class="grid_6">
					<p>
						<label>Username</label>
						<?=$username;?>
					</p>
				</div>
				
				<div class="grid_6">
					<p>
						<label>Password</label>
						<?=$password;?>
					</p>
				</div>

				<div class="grid_1">
					<p>
						<label>&nbsp;</label>
						<input type="submit" value="Login!" />
					</p>
				</div>
<?=$close;?>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
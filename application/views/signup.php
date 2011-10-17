<?php
$open     = form_open('dashboard/add_account');

$username = form_input(array(
'class'=>'inp-form',
'name'=>'username',
'value'=>set_value('username'),
));

$email    = form_input(array(
'class'=>'inp-form',
'name'=>'email',
'value'=>set_value('email'),
));

$password = form_password(array(
'class'=>'inp-form',
'name'=>'password',
'value'=>set_value('password'),
));

$passconf = form_password(array(
'class'=>'inp-form',
'name'=>'passconf',
'value'=>set_value('password'),
));

$close    = form_close();

$form     = array($username,$email,$password, $passconf);

include 'head.inc.php'; 
?>
</head>
	<body>
<? include('navbar.inc.php'); ?>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Create your account</h2>
					<p class="error"><?php 
					echo validation_errors(); 
					?></p>
				</div>
<?=$open;?>
				<div class="grid_4">
					<p>
						<label>Email</label>
						<?=$email;?>
					</p>
				</div>
				
				<div class="grid_4">
					<p>
						<label>Username</label>
						<?=$username;?>
					</p>
				</div>
				
				<div class="grid_4">
					<p>
						<label>Password</label>
						<?=$password;?>
					</p>
				</div>
				
				<div class="grid_4">
					<p>
						<label>Password (again)</label>
						<?=$passconf;?>
					</p>
				</div>

				<div class="grid_1 prefix_11">
					<p>
						<input type="submit" value="Done!" />
					</p>
				</div>
<?=$close;?>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
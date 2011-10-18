<?php
$open     = form_open('manageblog/import');

$username = form_input(array(
'class'=>'login-inp',
'name'=>'username',
'value'=>set_value('username'),
'placeholder'=>'Username...',
));

$close    = form_close();

include 'head.inc.php'; 
?>
</head>
	<body>
<? include('navbar.inc.php'); ?>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Import your <span id="blog_types"></span> blog</h2>
					<p class="error"><?php 
					echo validation_errors(); 
					?></p>
				</div>
<?=$open;?>		
				<div class="grid_16">
					<p id="tumblr" style="display:none;">If you have a custom domain name set up with your tumblr, you'll need to input that instead of a username. If not, just ignore this. </p>
				</div>
				<div class="grid_6">
					<p>
						<?=$username;?>
					</p>
				</div>

				<div class="grid_6">
					<p>
						<select name="blog_types" id="blog-types">
							<option value="" selected="selected"></option>
							<option value="tumblr" onclick="$('#tumblr').fadeIn('slow');">Tumblr</option>
						</select>
					</p>
				</div>

				<div class="grid_1">
					<p>
						<input type="submit" value="Import!" />
					</p>
				</div>
<?=$close;?>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
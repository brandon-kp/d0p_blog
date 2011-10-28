<?php
$open = form_open_multipart('managefiles/upload');
$close = form_close();

$file = form_upload(array(
	'name'  => 'file',
	'class' => 'login-inp',
	'placeholder' => 'Pick a file...',
));

$title = form_input(array(
	'name'  => 'title',
	'class' => 'login-inp',
	'placeholder' => 'Title...',
));

$caption = form_input(array(
	'name'  => 'caption',
	'class' => 'login-inp',
	'placeholder' => 'Caption...',
));

include 'head.inc.php'; 
?>
</head>
	<body>
<? include('navbar.inc.php'); ?>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Upload Files</h2>
					<p class="error"><?=validation_errors().$errors;?></p>
				</div>
<?=$open;?>			
				<div class="grid_7">
					<label for="title">Title</label>
					<?=$title;?>
					<hr />
				</div>
				
				<div class="clear"></div>
				
				<div class="grid_7">
					<label for="caption">Caption</label>
					<?=$caption;?>
					<hr />
				</div>
				
				<div class="clear"></div>
				
				<div class="grid_7">
					<label for="file">File</label>
					<?=$file;?>
					<hr />
				</div>
				
				<div class="clear"></div>

				<div class="grid_7">
					<input type="submit" value="upload" />
				</div>
				
				<div class="grid_10">
				<?php if(isset($_POST['file'])):?>
<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
				</div>
<?=$close;?>				
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
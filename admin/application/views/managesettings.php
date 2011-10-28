<?php
$open = form_open('managesettings/index');
$close = form_close();

$inp_header = form_input(array(
	'name'  => 'header',
	'class' => 'login-inp',
	'value' => $header,
));

$inp_subheader = form_input(array(
	'name'  => 'subheader',
	'class' => 'login-inp',
	'value' => $subheader,
));

$inp_title = form_input(array(
	'name'  => 'title',
	'class' => 'login-inp',
	'value' => $title,
));

$inp_tags = form_input(array(
	'name'  => 'tags',
	'class' => 'login-inp',
	'value' => $tags,
));

$inp_blogs_per_page = form_input(array(
	'name'  => 'blogs_per_page',
	'class' => 'login-inp',
	'value' => $blogs_per_page,
	'style' => 'width:25px;',
));

$inp_description = form_textarea(array(
	'name'  => 'description',
	'class' => 'login-inp',
	'value' => $description,
));
include 'head.inc.php'; 
?>
</head>
	<body>
<? include('navbar.inc.php'); ?>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Manage your blog settings</h2>
					<p class="error"><?=validation_errors();?></p>
				</div>
<?=$open;?>				
				<div class="grid_7">
					<label for="header">Header</label>
					<?=$inp_header;?>
					<hr />
				</div>
				
				<div class="grid_7">
					<label for="subheader">Sub-Header</label>
					<?=$inp_subheader;?>
					<hr />
				</div>

				<div class="clear"></div>
				
				<div class="grid_7">
					<label for="title">Page Title</label>
					<?=$inp_title;?>
					<hr />
				</div>	
				
				<div class="grid_7">
					<label for="tags">Page Tags</label>
					<?=$inp_tags;?>
					<hr />
				</div>	
				
				<div class="clear"></div>
				
				<div class="grid_10">
					<label for="tags">Description</label>
					<?=$inp_description;?>
					<hr />
				</div>
				
				<div class="grid_3">
					<label for="blogs_per_page">Blogs per Page</label>
					<?=$inp_blogs_per_page;?>
					<hr />
				</div>	
<?=$close;?>				
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
<?php
$open     = form_open('manageblog/post');

$title = form_input(array(
'class'=>'login-inp',
'name'=>'title',
'value'=>set_value('title'),
'placeholder'=>'Title...',
));

$tags = form_input(array(
'class'=>'login-inp',
'name'=>'tags',
'value'=>set_value('tags'),
'placeholder'=>'Tags...',
));

$text = form_textarea(array(
//'class'=>'login-inp',
'name'=>'text',
'value'=>set_value('text'),
'placeholder'=>'Text...',
));

$close    = form_close();

include 'head.inc.php'; 
?>
</head>
	<body>
<? include('navbar.inc.php'); ?>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Add a blog</h2>
					<p class="error"><?php 
					echo validation_errors(); 
					?></p>
				</div>
<?=$open;?>			
				<div class="grid_8">
					<p>
						<label>Title</label>
						<?=$title;?>
					</p>
				</div>
				
				<div class="grid_8">
					<p>
						<label>Tags</label>
						<?=$tags;?>
					</p>
				</div>
				
				<div class="grid_13">
					<p>
						<label>Post</label>
						<?=$text;?>
					</p>
				</div>

				<div class="grid_12">
					<p>
						<input type="submit" value="Post!" />
					</p>
				</div>
<?=$close;?>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
<?php
$open     = form_open('managepages/post');

$title = form_input(array(
'class'=>'login-inp',
'name'=>'title',
'value'=>set_value('title'),
'placeholder'=>'Title...',
));

$content = form_textarea(array(
//'class'=>'login-inp',
'name'=>'content',
'value'=>set_value('content'),
'placeholder'=>'Content...',
));

$close    = form_close();

include 'head.inc.php'; 
?>
</head>
	<body>
<? include('navbar.inc.php'); ?>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Add a page</h2>
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
				
				<div class="grid_13">
					<p>
						<label>Content</label>
						<?=$content;?>
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
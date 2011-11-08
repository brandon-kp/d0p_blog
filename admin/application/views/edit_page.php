<?php
$open     = form_open('managepages/edit/'.$page['id']);

$title = form_input(array(
'class'=>'login-inp',
'name'=>'title',
'value'=>$page['title'],
'placeholder'=>'Title...',
));

$text = form_textarea(array(
//'class'=>'login-inp',
'name'=>'content',
'value'=>$page['content'],
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
					<h2>Modify Page</h2>
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
						<label>Post</label>
						<?=$text;?>
					</p>
				</div>

				<div class="grid_12">
					<p>
						<input type="submit" value="Update!" />
					</p>
				</div>
<?=$close;?>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
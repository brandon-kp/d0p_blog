<?php
$open     = form_open('dashboard/post');

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
<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
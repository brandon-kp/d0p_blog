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
<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
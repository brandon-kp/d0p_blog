<!DOCTYPE html>
<html dir='ltr' xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>
<?=$title;?> - d0p.us
</title>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
<meta name="keywords" content="<?=$settings['tags'];?>" />
<meta name="description" content="<?=$settings['description'];?>" />
<!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
<link type="text/css" rel="stylesheet" href="<?=base_url();?>static/css/blog2.css" />
<link type="text/css" rel="stylesheet" href="<?=base_url();?>static/css/reset.css" />
<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<body>
<div id="content">
	<div id="header">
		<h1><?=$settings['header'];?></h1>
		<h2><?=$settings['subheader'];?></h2>
	</div>
	
	<div id="main">
<div class="post_body">
	<h2><?=$title;?></h2>
	<?=$content;?>
	<hr />
</div>
<div class="clear"></div>
	</div>
	
	<div id="footer">
	
	</div>
</div>
</body>
</html>

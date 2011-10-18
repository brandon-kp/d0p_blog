<!DOCTYPE html>
<html dir='ltr' xmlns='http://www.w3.org/1999/xhtml'>
<head>
<title>
d0p.us
</title>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
<link type="text/css" rel="stylesheet" href="<?=base_url();?>static/css/blog2.css" />
<link type="text/css" rel="stylesheet" href="<?=base_url();?>static/css/reset.css" />
<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<body>
<div id="content">
	<div id="header">
		<h1>Powerpig, Hello</h1>
		<h2>personal web log of brandon probst</h2>
	</div>
	
	<div id="main">
<?php $i = 0; foreach($list_blogs as $blog): ?>
<div class="post_body">
	<h2><?=$blog['title'];?></h2>
	<p><?=$blog['text'];?></p>
	<hr />
	<div class="post_footer">
		<a href="#" title="<?=timespan($blog['date']);?> ago"><?=unix_to_human($blog['date']);?></a>
		<strong>|</strong>
<?foreach(Main::_format_tags($blog['tags']) as $tag):?>
		<a href="search/<?=Main::_url_safe($tag);?>" class="tag"><?=$tag;?></a>
<? endforeach; ?>
	</div>
</div>
<div class="clear"></div>
<?php $i++; endforeach; ?>
		<div id="pagination"><?=$pagination;?></div>
	</div>
	
	<div id="footer">
	
	</div>
</div>
</body>
</html>

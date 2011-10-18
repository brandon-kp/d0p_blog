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

include 'head.inc.php'; ?>
		<script src="<?=base_url();?>static/js/jquery-1.4.2.js" type="text/javascript"></script>
		<script src="<?=base_url();?>static/js/jquery-ui-1.8.1.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() {
				$("#content .grid_5, #content .grid_6").sortable({
					placeholder: 'ui-state-highlight',
					forcePlaceholderSize: true,
					connectWith: '#content .grid_6, #content .grid_5',
					handle: 'h2',
					revert: true
				});
				$("#content .grid_5, #content .grid_6").disableSelection();
			});
		</script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>
<? include('navbar.inc.php'); ?>

			<div id="content" class="container_16 clearfix">
				<div class="grid_5">
					<div class="box">
						<h2><?=$username;?></h2>
						<div class="utils">
							<a href="logout/">Log out</a>
						</div>
						<p><strong>Last Activity : </strong> <?=$signin;?><br /><strong>IP Address : </strong> <?=$ipaddy;?></p>
					</div>
					<div class="box">
						<h2>CMS Updates</h2>
						<div class="utils">
							<a href="#">Github repo</a>
						</div>
						<p class="center"><?=$version;?></p>
					</div>
				</div>
				<div class="grid_6">
					<div class="box">
						<h2>At a Glance</h2>
						<div class="utils">
							<a href="#">View More</a>
						</div>
						<table>
							<tbody>
								<tr>
									<td><?=$post_count;?> Post(s)</td>
									<td><?=$tag_count;?> Tag(s)</td>
								</tr>
								<tr>
									<td><?=$page_count;?> Page(s)</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="box">
						<h2>Quick Post</h2>
						<div class="utils">
							<a href="<?=site_url();?>/manageblog/post/">Advanced</a>
						</div>
						<?=$open;?>
							<p>
								<?=$title;?>
							</p>
							<p>
								<?=$tags;?>
							</p>
							<p>
								<?=$text;?>
							</p>
							<p>
								<input type="submit" value="Post!" />
							</p>
						</form>
					</div>
				</div>
				<div class="grid_5">
					<div class="box">
						<h2>Statistics</h2>
						<div class="utils">
							<a href="#">View More</a>
						</div>
						<table>
							<tbody>
								<tr>
									<td>News</td>
									<td>+ 120%</td>
								</tr>
								<tr>
									<td>Downloads</td>
									<td>+ 220%</td>
								</tr>
								<tr>
									<td>Users</td>
									<td>- 10%</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="box">
						<h2>Schedule</h2>
						<div class="utils">
							<a href="#">View More</a>
						</div>
						<?=$calendar;?>
						<ol>
							<li>Draft contract template.</li>
							<li>Draft invoice template.</li>
							<li>Draft business cards.</li>
						</ol>
					</div>
				</div>
			</div>
		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					<a href="#">Contact Me</a>
				</div>
			</div>
		</div>
	</body>
</html>
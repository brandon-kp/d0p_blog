<?php
include 'head.inc.php'; 
?>
</head>
	<body>
<? include('navbar.inc.php'); ?>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<table>
						<thead>
							<tr>
								<th>Title</th>
								<th>Content</th>
								<th colspan="2" width="10%">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="5" class="pagination">
									<span class="active curved">1</span><a href="#" class="curved">2</a><a href="#" class="curved">3</a><a href="#" class="curved">4</a> ... <a href="#" class="curved">10 million</a>
								</td>
							</tr>
						</tfoot>
						<tbody>
						<? $i=1; foreach($list_pages as $listpages):?>
							<tr<?if($i&1) echo ' class="alt"';?>>
								<td><a href="#"><?=$listpages['title'];?></a></td>
								<td><?=word_limiter(strip_tags($listpages['content']), 10);?></td>
								<td><a href="<?=site_url();?>/managepages/edit/<?=$listpages['id'];?>" class="edit">Edit</a></td>
								<td><a href="delete/<?=$listpages['id'];?>" class="delete">Delete</a></td>
							</tr>
						<? $i++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
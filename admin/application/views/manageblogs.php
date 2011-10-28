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
								<th>Text</th>
								<th>Tags</th>
								<th>ID</th>
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
						<? $i=1; foreach($list_blogs as $listblogs):?>
							<tr<?if($i&1) echo ' class="alt"';?>>
								<td><a href="#"><?=$listblogs['title'];?></a></td>
								<td><?=word_limiter(strip_tags($listblogs['text']), 10);?></td>
								<td><?=$listblogs['tags'];?></td>
								<td><?=$listblogs['id'];?></td>
								<td><a href="edit/<?=$listblogs['id'];?>" class="edit">Edit</a></td>
								<td><a href="delete/<?=$listblogs['id'];?>" class="delete">Delete</a></td>
							</tr>
						<? $i++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
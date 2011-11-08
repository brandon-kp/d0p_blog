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
								<th>Link</th>
								<th>Type</th>
								<th>Views / Bandwidth</th>
								<th>Posted</th>
								<th colspan="2" width="10%">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="6" class="pagination">
									<?=$pagination;?>
								</td>
							</tr>
						</tfoot>
						<tbody>
						<? $i=1; foreach($files as $files):?>
							<tr<?if($i&1) echo ' class="alt"';?>>
								<td><?=$files['title'];?></td>
								<td><a href="<?=$files['original'];?>"><?=$files['original'];?></a></td>
								<td><?=$files['type'];?></td>
								<td><strong><?=$files['views'].' / '.number_format(($files['bandwidth']/1024)/1024,'2');?></strong>MB</td>
								<td><?=$files['datetime']?></td>
								<td><a href="managefiles/delete/<?=$files['deletehash'];?>" class="delete">Delete</a></td>
							</tr>
						<? $i++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		
<? include('footer.inc.php'); ?>
	</body>
</html>
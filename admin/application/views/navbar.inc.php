<h1 id="head" onclick="window.location='<?=site_url();?>';" style="cursor:pointer;">d0p_blog admin panel</h1>
		<ul id="nav-one naviagtion" class="nav">
			<li>

				<a href="<?=site_url();?>/dashboard">Overview</a>
				<!--<ul>
					<li><a href="">&nbsp;</a></li>
				</ul>-->
			</li>
			<li>
				<a href="<?=site_url();?>/manageblog/">Manage Blog</a>
				<ul>
					<li><a href="<?=site_url();?>/manageblog/">Manage Blogs</a></li>
					<li><a href="<?=site_url();?>/manageblog/post/">Post Blog</a></li>
					<li><a href="<?=site_url();?>/manageblog/import/">Import Blog</a></li>
				</ul>
			</li>
			<li>
				<a href="<?=site_url();?>/managesettings/">Manage Settings</a>
				<ul>
					<li><a href="<?=site_url();?>/managesettings/blogsettings/">Blog Settings</a></li>
					<li><a href="<?=site_url();?>/managesettings/columnettings/">Column Settings</a></li>
				</ul>
			</li>
			<li>
				<a href="<?=site_url();?>/managefiles/">Manage Files</a>
				<ul>
					<li><a href="<?=site_url();?>/managefiles/">Manage Files</a></li>
					<li><a href="<?=site_url();?>/managefiles/upload/">Upload Files</a></li>
				</ul>
			</li>
			<li>
				<a href="<?=site_url();?>/managepages/">Manage Pages</a>
				<ul>
					<li><a href="<?=site_url();?>/managepages/">Manage Pages</a></li>
					<li><a href="<?=site_url();?>/managepages/addpage/">Add Page</a></li>
				</ul>
			</li>
			<li>
				<a style="float:right" href="<?=site_url();?>/dashboard/logout/">Logout</a>
			</li>
		</ul>
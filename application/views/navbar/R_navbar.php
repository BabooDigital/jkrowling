<nav class="navbar navbar-expand-lg fixed-top-message bg-white" style="position: fixed;width: 100%;z-index: 1300;">
<div class="container">
<a class="navbar-brand" href="#">
	<img src="<?php echo base_url(); ?>public/img/new_logo.svg" width="80" class="img-fluid" alt="">
</a>

<form class="form-inline srcform pull-right">
	<input class="form-search" type="text" placeholder="Penulis atau Buku" aria-label="Search" style="height:30px; width: 200px; font-size: 14px; margin-left:-30px;">
</form>
<form class="form-inline">
	<a href="<?php echo site_url('message') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
		<img src="<?php echo base_url() ?>/public/img/icon-tab/pesan.svg" width="30" height="30"><br>
	</a>
</form>
</div>
</nav>

<nav class="navbar navbar-expand-lg fixed-top" style="height:auto;box-shadow: none;">
<div style="background-color: #f9fbfc; position: absolute; left:0; right: 0; top:60px; width: 150%;">
	<div class="container">
		<div class="row" style="">
			<div class="col-2 mt-5 mb-1">
				<center><a href="<?php echo site_url('timeline'); ?>" dat-title="Timeline Feed" id="tab_page" class="menu-page <?php if ($this->uri->segment('1') == 'timeline') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>">
					<img src="<?php if ($this->uri->segment('1') == 'timeline') { echo base_url('public/img/icon-tab/feed_icon_active.svg'); }else { echo base_url('public/img/icon-tab/feed_icon.svg'); } ?>" width="25" height="25"><br>Explore</a>
					
				</center>
			</div>
			<div class="col-2 mt-5 mb-1">
				<center><a href="<?php echo site_url('library'); ?>" dat-title="Your Library" id="tab_page" class="menu-page <?php if ($this->uri->segment('1') == 'library') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>">
				<img src="<?php if ($this->uri->segment('1') == 'library') { echo base_url('public/img/icon-tab/library_icon_active.svg'); }else { echo base_url('public/img/icon-tab/library_icon.svg'); } ?>" width="25" height="25"><br>Library</a>
				</center>
			</div>
			<div class="col-2 mt-5 mb-1">
				<center><a href="<?php echo site_url('notification'); ?>" id="tab_page" dat-title="Your Activity" class="menu-page <?php if ($this->uri->segment('1') == 'notification') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>">
				<img src="<?php if ($this->uri->segment('1') == 'notification') { echo base_url('public/img/icon-tab/notif_icon_active.svg'); }else { echo base_url('public/img/icon-tab/notif_icon.svg'); } ?>" width="25" height="25"><br>Activity</a>
				</center>
			</div>
			<div class="col-2 mt-5 mb-1">
				<center><a href="<?php echo site_url('profile'); ?>" dat-title="Your Profile" id="tab_page" class="menu-page <?php if ($this->uri->segment('1') == 'profile') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>">
				<img src="<?php if ($this->uri->segment('1') == 'profile') { echo base_url('public/img/icon-tab/profil_icon_active.svg'); }else { echo base_url('public/img/icon-tab/profil_icon.svg'); } ?>" width="25" height="25"><br>My Profile</a>
				</center>
			</div>
		</div>
	</div>
</div>
</nav>

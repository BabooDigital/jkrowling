<nav class="navbar navbar-expand-lg fixed-top-message bg-white" style="position: fixed;width: 100%;z-index: 1300;top: 0;">
	<div class="container">
		<a class="navbar-brand" href="<?php echo site_url(); ?>"><img alt="" class="img-fluid" src="<?php echo base_url(); ?>public/img/new_logo.svg" width="80"></a>
		<!-- <form class="form-inline srcform pull-right">
			<input aria-label="Search" class="form-search" placeholder="Penulis atau Buku" style="height:30px; width: 200px; font-size: 14px; margin-left:-30px;" type="text">
		</form> -->
		<form class="form-inline">
			<a href="#" id="tab_page" class="mr-20"><img src="<?php echo base_url() ?>/public/img/assets/icon_search.svg" width="25"><br></a>
			<a class="menu-page mr-20" href="<?php echo site_url('yourdraft'); ?>" id="tab_page" dat-title="Daftar Draft Buku"><img src="<?php echo base_url() ?>/public/img/assets/icon_draft.svg" width="25"></a>
			<a href="<?php echo site_url('message') ?>" id="tab_page" style="color:#9785bc; font-size:10px;"><img src="<?php echo base_url() ?>/public/img/icon-tab/icon_message.svg" width="26"><br></a>
		</form>
	</div>
</nav>
<nav class="navbar navbar-expand-lg fixed-top" style="height:auto;box-shadow: none;">
	<div class="rnavbarin">
		<div class="container">
			<div class="row" style="">
				<div class="col-2 mt-5 mb-1">
					<center>
						<a class="menu-page <?php if ($this->uri->segment('1') == 'timeline') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('timeline'); ?>" id="tab_page" dat-title="Timeline"><img height="25" src="<?php if ($this->uri->segment('1') == 'timeline') { echo base_url('public/img/icon-tab/feed_icon_active.svg'); }else { echo base_url('public/img/icon-tab/feed_icon.svg'); } ?>" width="25"><br>
						Explore</a>
					</center>
				</div>
				<div class="col-2 mt-5 mb-1">
					<center>
						<a class="menu-page <?php if ($this->uri->segment('1') == 'library') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('library'); ?>" id="tab_page" dat-title="Library"><img height="25" src="<?php if ($this->uri->segment('1') == 'library') { echo base_url('public/img/icon-tab/library_icon_active.svg'); }else { echo base_url('public/img/icon-tab/library_icon.svg'); } ?>" width="25"><br>
						Library</a>
					</center>
				</div>
				<div class="col-2 mt-5 mb-1">
					<center>
						<div id="noti_Counter"></div>
						<a class="menu-page <?php if ($this->uri->segment('1') == 'activity') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('activity'); ?>" id="tab_page" dat-title="activity"><img height="25" src="<?php if ($this->uri->segment('1') == 'activity') { echo base_url('public/img/icon-tab/notif_icon_active.svg'); }else { echo base_url('public/img/icon-tab/notif_icon.svg'); } ?>" width="25"><br>
						Activity</a>
					</center>
				</div>
				<div class="col-2 mt-5 mb-1">
					<center>
						<a class="menu-page <?php if ($this->uri->segment('1') == 'profile') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('profile'); ?>" id="tab_page" dat-title="My Profile"><img height="25" src="<?php if ($this->uri->segment('1') == 'profile') { echo base_url('public/img/icon-tab/profil_icon_active.svg'); }else { echo base_url('public/img/icon-tab/profil_icon.svg'); } ?>" width="25"><br>
						My Profile</a>
					</center>
				</div>
			</div>
		</div>
	</div>
</nav>
<?php if ($this->session->userdata('isLogin')): ?>
	
<nav class="navbar navbar-expand-lg fixed-top-message bg-white rfirstnav" style="position: fixed;width: 100%;z-index: 1000;top: 0;padding: 0.4rem 1rem !important;">
	<div class="container">
		<a class="navbar-brand" href="<?php echo site_url(); ?>"><img alt="" class="img-fluid" src="<?php echo base_url(); ?>public/img/new_logo.svg" width="85"></a>
		<!-- <form class="form-inline srcform pull-right">
			<input aria-label="Search" class="form-search" placeholder="Penulis atau Buku" style="height:30px; width: 200px; font-size: 14px; margin-left:-30px;" type="text">
		</form> -->
		<form class="form-inline">
			<a href="<?php echo site_url('search'); ?>" id="tab_page" class="menu-page mr-20" id="tab_page" dat-title="Pencarian"><img src="<?php echo base_url() ?>/public/img/assets/icon_search.svg" width="25"></a>
			<a class="menu-page mr-20" href="<?php echo site_url('yourdraft'); ?>" id="tab_page" dat-title="Daftar Draft Buku"><img src="<?php echo base_url() ?>/public/img/assets/icon_draft.svg" width="25"></a>
			<a href="<?php echo site_url('message') ?>" id="tab_page" style="color:#9785bc; font-size:10px;"><img src="<?php echo base_url() ?>/public/img/icon-tab/icon_message.svg" width="24"></a>
		</form>
	</div>
</nav>
<nav class="navbar navbar-expand-lg fixed-top rsecnav" style="height:auto;box-shadow: none;">
	<div class="rnavbarin">
		<div class="container">
			<div class="row" style="">
				<div class="col-2 mt-5 mb-1">
					<center>
						<a class="menu-page <?php if ($this->uri->segment('1') == 'timeline') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('timeline'); ?>" id="tab_page" dat-title="Timeline"><img height="30" src="<?php if ($this->uri->segment('1') == 'timeline') { echo base_url('public/img/icon-tab/feed_icon_active.svg'); }else { echo base_url('public/img/icon-tab/feed_icon.svg'); } ?>" width="30">
						<p>Explore</p></a>
					</center>
				</div>
				<div class="col-2 mt-5 mb-1">
					<center>
						<div id="transaction_counter" style="top:-20px;right: 20px;"></div>
						<a class="menu-page <?php if ($this->uri->segment('1') == 'library') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('library'); ?>" id="tab_page" dat-title="Library"><img height="30" src="<?php if ($this->uri->segment('1') == 'library') { echo base_url('public/img/icon-tab/library_icon_active.svg'); }else { echo base_url('public/img/icon-tab/library_icon.svg'); } ?>" width="30">
						<p>Library</p></a>
					</center>
				</div>
				<div class="col-2 mt-5 mb-1">
					<center>
						<div id="noti_Counter" style="top:-20px;right: 20px;"></div>
						<a class="menu-page <?php if ($this->uri->segment('1') == 'activity') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('activity'); ?>" id="tab_page" dat-title="activity"><img height="30" src="<?php if ($this->uri->segment('1') == 'activity') { echo base_url('public/img/icon-tab/notif_icon_active.svg'); }else { echo base_url('public/img/icon-tab/notif_icon.svg'); } ?>" width="30">
						<p>Activity</p></a>
					</center>
				</div>
				<div class="col-2 mt-5 mb-1">
					<center>
						<a class="menu-page <?php if ($this->uri->segment('1') == 'profile') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('profile'); ?>" id="tab_page" dat-title="Profile"><img height="30" src="<?php if ($this->uri->segment('1') == 'profile') { echo base_url('public/img/icon-tab/profil_icon_active.svg'); }else { echo base_url('public/img/icon-tab/profil_icon.svg'); } ?>" width="30">
						<p>Profile</p></a>
					</center>
				</div>
			</div>
		</div>
	</div>
</nav>
<?php else: ?>
	<nav class="navbar navbar-expand-lg fixed-top baboonav">
		<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars"></span></button>
		<a class="" href="#"><img alt="Baboo.id" src="<?php echo base_url(); ?>public/img/new_logo.svg" width="100"></a>
		<a href="<?php echo site_url();?>login" class="btn bukupilihan" style="background-color:#f7f3ff; border:solid 1px #7554bd; color:#7554bd; ">Masuk</a>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item mr-20 active">
					<a class="nav-link b-nav-link" href="<?php echo site_url('home'); ?>">Beranda</a>
				</li>
				<li class="nav-item">
					<div class="mb-10">
						<a class="nav-link btn-navdaftar" href="<?php echo site_url(); ?>login#btndaftar"><span class="navdaftar">Daftar</span></a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
<?php endif ?>
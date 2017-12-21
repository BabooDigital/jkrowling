<nav class="navbar navbar-expand-lg fixed-top-message baboonav" style="height:60px;">
<div class="container">
<a class="navbar-brand" href="#">
	<img src="<?php echo base_url(); ?>public/img/logo_purple.png" width="80" class="img-fluid" alt="">
</a>

<form class="form-inline srcform pull-right">
	<input class="form-search" type="text" placeholder="Penulis, Buku atau Tulisan" aria-label="Search" style="height:30px; width: 200px; font-size: 14px; margin-left:-30px;">
</form>
<form class="form-inline">
	<a href="<?php echo site_url('message') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
		<img src="<?php echo base_url() ?>/public/img/icon-tab/pesan.svg" style="width:24px;height: 24px;"><br>
	</a>
</form>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav" style="margin-bottom: -7px;">
		<li class="nav-item mr-20 active">
			<a class="nav-link" href="#"><b>Beranda</b></a>
		</li>
		<li class="nav-item mr-30">
			<a class="nav-link" href="#"><b>Explore</b></a>
		</li>
		<li class="nav-item mr-30">
			<a class="nav-link btn-newstory" href="#">
				<i class="fa fa-pencil-square-o"></i> Tulis Cerita
			</a>
		</li>
		<li class="nav-item">
			<div class="media nav-link martopbot">
				<a href="#">
					<img class="d-flex mr-2 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="40" alt="Generic placeholder image">
				</a>
				<div class="media-body">
					<p style="font-weight: bold;"><a href="#" style="font-size: 10pt;"><b>Aditia Nugraha</b></a>
						<span style="display: block;font-size: 7pt;">FIKSI</span></p>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
</nav>

<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:auto;">
<div style="height:70px; background-color: #FFF; position: absolute; left:0; right: 0; top:60px; width: 150%; box-shadow: 0 2px 2px -2px gray;">
	<div class="container">
		<div class="row" style="">
			<div class="col-2" style="margin-top:10px;">
				<center><a href="<?php echo site_url('timeline') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
					<img src="<?php echo base_url() ?>/public/img/icon-tab/feed_icon.svg" style="width:24px;height: 24px;"><br>Explore</a>
				</center>
			</div>
			<div class="col-2" style="margin-top:10px;">
				<center><a href="<?php echo site_url('library') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
				<img src="<?php echo base_url() ?>/public/img/icon-tab/library_icon_active.svg" style="width:24px;height: 24px;"><br>Library</a>
				</center>
			</div>
			<div class="col-2" style="margin-top:10px;">
				<center><a href="notification" id="tab_page" style="color:#9785bc; font-size:10px;">
				<img src="<?php echo base_url() ?>/public/img/icon-tab/notif_icon_active.svg" style="width:24px;height: 24px;"><br>Notification</a>
				</center>
			</div>
			<div class="col-2" style="margin-top:10px;">
				<center><a href="<?php echo site_url('profile') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
				<img src="<?php echo base_url() ?>/public/img/icon-tab/profil_icon_active.svg" style="width:24px;height: 24px;"><br>Profile</a>
				</center>
			</div>
		</div>
	</div>
</div>
</nav>

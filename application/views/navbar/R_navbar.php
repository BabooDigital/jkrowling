<div class="container">
			<a class="navbar-brand" href="#">
				<img src="<?php echo base_url(); ?>public/img/logo_purple.png" width="80" class="img-fluid" alt="">
			</a>

			<form class="form-inline srcform pull-left">
				<input class="form-search" type="text" placeholder="Penulis, Buku atau Tulisan" aria-label="Search" style="height:30px; width: 270px; font-size: 14px; margin-left:-90px;">
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
			<div style="height:60px; background-color: #FFF; position: absolute; left:0; right: 0; top:60px; width: 120%; ">
				<div class="container">
					<div class="row" style="">
						<div class="col-2" style="margin-top:10px;">
							<center><a href="<?php echo site_url('timeline') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
								<img src="<?php echo base_url() ?>/public/img/icon-tab/explore.png" style="width:24px;height: 24px;"><br>Explore</a>
							</center>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<center><a href="<?php echo site_url('library') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
							<img src="<?php echo base_url() ?>/public/img/icon-tab/library.png" style="width:24px;height: 24px;"><br>Library</a>
							</center>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<center><a href="<?php echo site_url('notification') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
							<img src="<?php echo base_url() ?>/public/img/icon-tab/notif.png" style="width:24px;height: 24px;"><br>Notification</a>
							</center>
						</div>
						<div class="col-2" style="margin-top:10px;">
							<center><a href="<?php echo site_url('profile') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
							<img src="<?php echo base_url() ?>/public/img/icon-tab/profile.png" style="width:24px;height: 24px;"><br>Profile</a>
							</center>
						</div>
						<div class="col-1" style="margin-top:10px;margin-left: 1%;">
							<center><a href="<?php echo site_url('more') ?>" id="tab_page" style="color:#9785bc; font-size:10px;">
								<img src="<?php echo base_url() ?>/public/img/icon-tab/more.png" style="width:24px;height: 24px;"><br>More </a>
							</center>
						</div>
					</div>
				</div>
			</div>
<nav class="navbar navbar-expand-lg fixed-top baboonav">
	<div class="container">
		<a class="navbar-brand" href="<?php echo site_url(); ?>"><img alt="Baboo Main Logo" src="<?php echo base_url(); ?>public/img/logo_purple.png" width="100"></a>
		<form class="form-inline my-2 my-lg-0">
			<input aria-label="Search" class="search-form form-control" placeholder="Cari di baboo" type="search">
		</form>

		<?php if ($this->session->userdata('isLogin') != 200) { ?>

		<div class="pull-right">
			<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars fa-border"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item mr-30">
						<a class="nav-link btn-navmasuk" href="<?php echo site_url(); ?>login">Masuk</a>
					</li>
					<li class="nav-item">
						<div class=" nav-link">
							<a class="btn-navdaftar" href="<?php echo site_url(); ?>login#btndaftar" id="btndaftar"><span class="navdaftar">Daftar</span></a></div>
						</li>
					</ul>
				</div>
			</div>

			<?php }else { ?>

			<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars fa-border"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav text-center" style="margin-bottom: -8px;">
					<li class="nav-item active mt-5">
						<a class="nav-link" href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>public/img/icon-tab/feed_icon.svg" width="23"><p class="fs-12px"><b>Explore</b></p></a>
					</li>
					<li class="nav-item mt-5">
						<a class="nav-link" href="#"><img src="<?php echo site_url(); ?>public/img/icon-tab/library_icon.svg" width="25"><p class="fs-12px"><b>Library</b></p></a>
					</li>
					<li class="nav-item mt-5 noti_Container">
						<div id="noti_Counter"></div>
						<a id="noti_Button" class="nav-link" href="#"><img src="<?php echo site_url(); ?>public/img/icon-tab/notif_icon.svg" width="25"><p class="fs-12px"><b>Notification</b></p></a>
						<!-- <div id="noti_Counter2" style="display: none;">7</div> -->
						<div id="notifications" style="margin-left: 50%;overflow: scroll;overflow-x: scroll;overflow-y: scroll;">
							<h5>Notifications</h5>
							<div class="loader" id="loader_notif" style="margin-left: auto;margin-right: auto;"></div>
							<div class="list-group" id="notification">
								<a href="asd" class="list-group-item list-group-item-action flex-column align-items-start">
									<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;">
										<div class="media" style="width: 100%;">
											<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
											<div class="media-body mt-5">
												<span class="nametitle2">Marina Saraswati</span>
												<br> <span class="text-muted fontkecil">Mulai mengikuti tulisan anda</span><span class="button_follow">
													<img class="img_follow" src="<?php echo base_url(); ?>public/img/icon-tab/add_follow.svg">
												</span>
												<p class="text-muted fontkecil">1 hours ago</p></small></p>
											</div>
										</div>
									</div>
								</a>
								<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
									<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;">
										<div class="media" style="width: 100%;">
											<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
											<div class="media-body mt-5">
												<span class="nametitle2">Marina Saraswati</span> <span class="text-muted fontkecil">Mengomentari tulisan anda</span><span class="button_follow">
											</div>
											</div>
										</div>
										<div class="row" style="padding: 0px 10px 0px 10px;">
											<div class="media">
												<img src="<?php echo base_url(); ?>public/img/book-cover/cover_hori.png" style="width: 100%;">
											</div>
											<h5 style="padding-top:20px; font-weight: 500;"><b>Story of Diana</b></h5>
										</div>
									</a>
								</div>

								<div class="seeAll"><a href="#">See All</a></div>
							</div>
						</li>			
						<li class="nav-item mt-5">
							<a class="nav-link" href="#"><img src="<?php echo site_url(); ?>public/img/icon-tab/pesan.svg" width="25"><p class="fs-12px"><b>Pesan</b></p></a>
						</li>
						<li class="nav-item ml-100 mr-30">
							<form action="<?php echo site_url(); ?>createidbook" method="POST" class="mt-10">
								<input type="hidden" name="iaiduui" id="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
								<button type="submit" class="nav-link btn-newstory" style="cursor: pointer;height: 33px;"><span><i class="fa fa-pencil-square-o"></i> Tulis Cerita</span></button>
							</form>
						</li>
						<li class="nav-item">
							<div class="media" style="margin-top: 6px;margin-bottom: -8px;">
								<a href="#">
									<?php if ($this->session->userdata('userData')) {
										$img = $this->session->userdata('userData'); ?>
										<img alt="<?php echo $img['fullname']; ?>" class="d-flex mr-2 rounded-circle" src="<?php if ($img['prof_pict'] == NULL){
											echo base_url('public/img/profile/blank-photo.jpg');
										}else{
											echo $img['prof_pict'];
										} ?>" id="profpict" width="40" height="40"> 
										<?php } ?>
									</a>
									<div class="media-body">
										<p style="font-weight: bold;"><a href="<?php echo site_url(); ?>profile" style="font-size: 11pt;"><b id="profname"><?php if ($this->session->userdata('userData')){
											$name = $this->session->userdata('userData'); $n = $name['fullname']; $m = explode(' ', $n); echo $m[0]; ?>
											<?php } ?></b></a> <span style="display: block;font-size: 8pt;">Online</span></p>
											<div class="boodropdown">
												<span style="display: block;font-size: 10pt;"><button class="btnsidecaret" onclick="funcDropdown()"><span style="display: block;font-size: 7pt;"><i class="fa fa-angle-down"></i></span>
													<div class="dropdown-content" id="myDropdown">
														<a href="<?php echo site_url(); ?>logout">Keluar</a>
													</div></button></span>
												</div>
												<p></p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<?php } ?>
						</div>
					</nav>

<body>
	<nav class="navbar navbar-expand-lg fixed-top baboonav">
		<div class="container">
			<a class="navbar-brand" href="#"><img alt="" src="<?php echo base_url(); ?>public/img/logo_purple.png" width="100"></a>
			<form class="form-inline srcform">
				<input aria-label="Search" class="form-search" placeholder="Cari di baboo" type="text">
			</form><button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars fa-border"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item mr-20 active">
						<a class="nav-link" href="<?php echo site_url(); ?>"><b>Beranda</b></a>
					</li>
					<li class="nav-item mr-100">
						<a class="nav-link" href="#"><b>Explore</b></a>
					</li>
					<li class="nav-item mr-30">
						<a class="nav-link btn-navmasuk" href="<?php echo site_url(); ?>login">Masuk</a>
					</li>
					<li class="nav-item">
						<div class="mb-10">
							<a class="nav-link btn-navdaftar" href="<?php echo site_url(); ?>login#btndaftar" id="btndaftar"><span class="navdaftar">Daftar</span></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- slider -->
	<div class="mt-60 hidden-sm hidden-xs">
		<div class="slideboo">
			<div class="leftboo"></div>
				<div class="slidecontrols">
					<span id="slider-prev"></span> <span id="slider-next" style="padding-left: 40%;"></span>
				</div>
			<div style="width: 100%;height: auto;position: relative;">
				<div class="slider6" style="left: 11% !important;">
					<div class="slide">
						<div class="blueslidebg">
							<div class="media">
							  <img class="d-flex mr-3" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="160">
							  <div class="media-body mt-10 blueslide" style="padding: 5% 0;">
							    <h4 class="mt-0"><b>Kite Runner</b></h4>
							    <p class="authorslide">by Khaled Hosseini</p>
							    <p>Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang...</p>
							    <div class="mt-20"><a href="#" class="btnbooread"><span style="">Baca Buku</span></a></div>
							  </div>
							</div>
						</div>
					</div>
					<div class="pinkslide">
						<div class="pinkslidebg">
							<div class="media">
							  <img class="d-flex mr-3" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="160">
							  <div class="media-body mt-10 pinkslide" style="padding: 5% 0;">
							    <h4 class="mt-0"><b>Kite Runner</b></h4>
							    <p class="authorslide">by Khaled Hosseini</p>
							    <p>Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang...</p>
							    <div class="mt-20"><a href="#" class="btnbooread"><span style="">Baca Buku</span></a></div>
							  </div>
							</div>
						</div>
					</div>
					<div class="slide">
						<div class="blueslidebg">
							<div class="media">
							  <img class="d-flex mr-3" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="160">
							  <div class="media-body mt-10 blueslide" style="padding: 5% 0;">
							    <h4 class="mt-0"><b>Kite Runner</b></h4>
							    <p class="authorslide">by Khaled Hosseini</p>
							    <p>Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang...</p>
							    <div class="mt-20"><a href="#" class="btnbooread"><span style="">Baca Buku</span></a></div>
							  </div>
							</div>
						</div>
					</div>
					<div class="slide">
						<div class="pinkslidebg">
							<div class="media">
							  <img class="d-flex mr-3" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="160">
							  <div class="media-body mt-10 pinkslide" style="padding: 5% 0;">
							    <h4 class="mt-0"><b>Kite Runner</b></h4>
							    <p class="authorslide">by Khaled Hosseini</p>
							    <p>Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang...</p>
							    <div class="mt-20"><a href="#" class="btnbooread"><span style="">Baca Buku</span></a></div>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="<?php echo base_url();?>public/img/slider.png" style="height:300px;">
		</div>
	</div>
	<div class="container babooid">
		<div class="row">
			<div class="col-md-3">
				<div class="stickymenu">
					<!-- Penulis Minggu Ini -->
					<div class="card mb-15" style="background-color: transparent;border: none;">
						<div class="card-header" style="border: none;">
							Penulis minggu ini
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush">
								<li class="media baboocontents">
									<a href="#">
										<img alt="Name" class="d-flex mr-3 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_pria2.png" width="50">
									</a>
									<div class="media-body">
										<h5 class="mt-0 mb-1"><a class="nametitle" href="#">Rian</a></h5><small>Fiksi</small>
									</div>
								</li>
								<li class="media baboocontents">
									<a href="#">
										<img alt="Name" class="d-flex mr-3 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="50">
									</a>
									<div class="media-body">
										<h5 class="mt-0 mb-1"><a class="nametitle" href="#">Risa Sulis</a></h5><small>Fiksi</small>
									</div>
								</li>
								<li class="media baboocontents">
									<a href="#">
										<img alt="Name" class="d-flex mr-3 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_laki2.png" width="50">
									</a>
									<div class="media-body">
										<h5 class="mt-0 mb-1"><a class="nametitle" href="#">Rizky Ramadhan</a></h5><small>Fiksi</small>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- Penulis Minggu Ini -->
					<!-- Buku Populer -->
					<div class="card mb-15" style="background-color: transparent;border: none;">
						<div class="card-header" style="border: none;">
							Buku Populer
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush">
								<li class="list-group-item" style="background-color: transparent;border: none;">
									<div class="media">
										<div class="media-left mr-10">
											<a href="#"><img class="media-object" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="60"></a>
										</div>
										<div class="media-body">
											<div>
												<h4 class="media-heading bold mt-10 mb-10"><a href="#">Big Magic: Creative Living Beyon Fear</a></h4>
												<p style="font-size: 10pt;">by <a href="#">Aditia Nugraha</a></p>
											</div>
										</div>
									</div>
								</li>
								<li class="list-group-item" style="background-color: transparent;border: none;">
									<div class="media">
										<div class="media-left mr-10">
											<a href="#"><img class="media-object" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="60"></a>
										</div>
										<div class="media-body">
											<div>
												<h4 class="media-heading bold mt-10 mb-10"><a href="#">The Painter's Daughter</a></h4>
												<p style="font-size: 10pt;">by <a href="#">Juli Kasi</a></p>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- Buku Populer -->
				</div>
			</div>
			<div class="col-md-9">
				<div class="row mt-10 mb-10">
					<div class="col-md-2">
						<span class="bukupilihan">Buku Pilihan</span>
					</div>
					<div class="col-md-10">
						<ul class="catul">
							<li class="catli">
								<a class="btnfilter" data-filter="all" href="javascript:;">Semua Buku</a>
							</li>
							<li class="catli">
								<a class="btnfilter" data-filter="fiksi" href="javascript:;">Fiksi</a>
							</li>
							<li class="catli">
								<a class="btnfilter" data-filter="komik" href="javascript:;">Komik</a>
							</li>
							<li class="catli">
								<a class="btnfilter" data-filter="nonfiksi" href="javascript:;">Non Fiksi</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 all fiksi" style="margin-right: -15px;">
						<div class="card mb-15" style="padding: 0 10px;">
							<div class="card-body p-0 p-20">
								<div class="row mb-30">
									<div class="media">
										<img class="d-flex align-self-start mr-20 rounded-circle" width="60" src="<?php echo base_url(); ?>public/img/profile/pp_anak2.png" alt="Generic placeholder image">
										<div class="media-body mt-5">
											<h5 class="card-title nametitle2">Marina Saraswati</h5>
											<p><small><span>Jakarta, Indonesia</span>
												<span class="ml-10">1 hours ago</span></small></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="media">
										<img class="d-flex align-self-start mr-10" src="<?php echo base_url(); ?>public/img/book-cover/book_cover1.png" width="130" alt="Profile">
										<div class="media-body">
											<h5 class="card-title nametitle3">Story Of Drama</h5>
											<p class="catbook mb-10"><a href="#" class="mr-20"><span style="border: 1px #7554bd solid;border-radius: 25px;padding: 0px 10px;color: #7554bd;">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 290</span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> 12</span></p>
											<p class="text-desc-out">
												Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
								<div class="pull-right">
									<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" class="mr-10" width="18"> Bagikan</a>
								</div>
								<div>
									<a href="#" class="mr-30"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" class="mr-10" width="27"> Suka</a>
									<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 all komik" style="margin-right: -15px;">
						<div class="card mb-15" style="padding: 0 10px;">
							<div class="card-body p-0 p-20">
								<div class="row mb-30">
									<div class="media">
										<img class="d-flex align-self-start mr-20 rounded-circle" width="60" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" alt="Generic placeholder image">
										<div class="media-body mt-5">
											<h5 class="card-title nametitle2">Marina Saraswati</h5>
											<p><small><span>Jakarta, Indonesia</span>
												<span class="ml-10">1 hours ago</span></small></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="media">
										<img class="d-flex align-self-start mr-10" src="<?php echo base_url(); ?>public/img/book-cover/book_cover2.png" width="130" alt="Profile">
										<div class="media-body">
											<h5 class="card-title nametitle3">DORAYAMON</h5>
											<p class="catbook mb-10"><a href="#" class="mr-20"><span style="border: 1px #7554bd solid;border-radius: 25px;padding: 0px 10px;color: #7554bd;">KOMIK</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 290</span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> 12</span></p>
											<p class="text-desc-out">
												Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
								<div class="pull-right">
									<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" class="mr-10" width="18"> Bagikan</a>
								</div>
								<div>
									<a href="#" class="mr-30"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" class="mr-10" width="27"> Suka</a>
									<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 all nonfiksi" style="margin-right: -15px;">
						<div class="card mb-15" style="padding: 0 10px;">
							<div class="card-body p-0 p-20">
								<div class="row mb-30">
									<div class="media">
										<img class="d-flex align-self-start mr-20 rounded-circle" width="60" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" alt="Generic placeholder image">
										<div class="media-body mt-5">
											<h5 class="card-title nametitle2">Marina Saraswati</h5>
											<p><small><span>Jakarta, Indonesia</span>
												<span class="ml-10">1 hours ago</span></small></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="media">
										<img class="d-flex align-self-start mr-10" src="<?php echo base_url(); ?>public/img/book-cover/book_cover3.png" width="130" alt="Profile">
										<div class="media-body">
											<h5 class="card-title nametitle3">The Painter's Daughter</h5>
											<p class="catbook mb-10"><a href="#" class="mr-20"><span style="border: 1px #7554bd solid;border-radius: 25px;padding: 0px 10px;color: #7554bd;">NON-FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 290</span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> 12</span></p>
											<p class="text-desc-out">
												Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
								<div class="pull-right">
									<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" class="mr-10" width="18"> Bagikan</a>
								</div>
								<div>
									<a href="#" class="mr-30"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" class="mr-10" width="27"> Suka</a>
									<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
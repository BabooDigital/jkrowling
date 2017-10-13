<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Timeline Baboo - Baca buku online</title>

	<!-- CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/baboo.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/baboo-responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/custom-margin-padding.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.css">

</head>
<body>
	
	<nav class="navbar navbar-expand-lg fixed-top baboonav">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="<?php echo base_url(); ?>public/img/logo_purple.png" width="100" alt="">
			</a>

			<form class="form-inline ml-70">
				<input class="form-search" type="text" placeholder="Cari di baboo" aria-label="Search">
			</form>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars fa-border"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav"  style="flex-direction: initial;">
					<li class="nav-item mr-30 active">
						<a class="nav-link" href="#"><b>Beranda</b></a>
					</li>
					<li class="nav-item mr-100">
						<a class="nav-link" href="#"><b>Explore</b></a>
					</li>
					<li class="nav-item mr-30">
						<a href="#" class="nav-link btn-navmasuk">Masuk</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link btn-navdaftar"><span class="navdaftar">Daftar</span></a>
					</li>
				</ul>
			</div>
		</nav>
	<!-- slider -->
	<div class="mt-60 hidden-sm">
		<div style="display: flex;position: relative;">
			<div style="position: absolute;left: 0;top: 0;bottom: 0;z-index: 1000;width: 10%;height: auto;
  background-image: linear-gradient(202deg, #8148c2, #7554bd);">
			
		</div>

		<div style="width: 100%;height: auto;">
		<div style="z-index: 1001;position: absolute;top: 45%;right: 0;left: 5%;">
			<span id="slider-prev"></span>
			<span id="slider-next" style="padding-left: 40%;"></span>
		</div>
			<div class="slider6">
			  <div class="slide"><img src="http://placehold.it/500x300/7db6d0&text=FooBar1"></div>
			  <div class="slide"><img src="http://placehold.it/500x300/edb6c1&text=FooBar2"></div>
			  <div class="slide"><img src="http://placehold.it/500x300/7db6d0&text=FooBar3"></div>
			</div>
		</div>
		<div style="border-radius: 50% 0 0 15%;width: 47%;height: auto;
  background-image: linear-gradient(202deg, #8148c2, #7554bd);position: absolute;right: 0;top: 0;bottom: 0;z-index: 1000;overflow: hidden;">
  			<div style="position: inherit;color: #fff;z-index: 1005;">
  				<div class="contenttextslider">
  					<div class="sidetextslide">
  						<p style="    position: relative;
    text-align: right;
    right: 10%;"><span style="
  						font-size: 15pt;
  						">Kamu suka nulis cerpen? atau buku?</span>
  						<span style="
  						font-size: 22pt;
  						font-weight: bold;
  						">Gabung bersama Baboo dan dapatkan penghasilan dari hobimu</span>
  						<span class="mt-10" style="
    font-size: 14pt;
"><a href="#" style="
    color: #fff;
">Mulai Gabung <i class="fa fa-arrow-right ml-10"></i></a></span></p>
  					</div>
  				</div>
  			</div>
  			<img src="https://yesassets.okdk.co.uk/east/cache/east-2285-q80-w450-h300-f0.jpg" style="opacity: 0.1;width: 100%;">
		</div>
		</div>
	</div>
	<div class="container babooid">
		<div class="row">
			<div class="col-md-3">
				<!-- Penulis Minggu Ini -->
				<div class="card mb-15" style="background-color: transparent;border: none;">
					<div class="card-header" style="border: none;">
						Penulis minggu ini
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush">
							<li class="media baboocontents">
								<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="Name">
								<div class="media-body">
									<h5 class="mt-0 mb-1"><a href="#" class="nametitle">Rian</a></h5>
									<small>Fiksi</small>
								</div>
							</li>
							<li class="media baboocontents">
								<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="Name">
								<div class="media-body">
									<h5 class="mt-0 mb-1"><a href="#" class="nametitle">Risa Sulis</a></h5>
									<small>Fiksi</small>
								</div>
							</li>
							<li class="media baboocontents">
								<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="Name">
								<div class="media-body">
									<h5 class="mt-0 mb-1"><a href="#" class="nametitle">Rizky Ramadhan</a></h5>
									<small>Fiksi</small>
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
									<a href="#"><img class="media-object" src="http://placehold.it/60x80"></a>
								</div>
								<div class="media-body">
									<div>
										<h4 class="media-heading bold mt-10"><a href="#">Big Magic: Creative Living Beyon Fear</a></h4>
										<p style="font-size: 10pt;">by <a href="#">Aditia Nugraha</a></p>
									</div>
								</div>
							</div>
					    </li>
					    <li class="list-group-item" style="background-color: transparent;border: none;">
					    	<div class="media">
								<div class="media-left mr-10">
									<a href="#"><img class="media-object" src="http://placehold.it/60x80"></a>
								</div>
								<div class="media-body">
									<div>
										<h4 class="media-heading bold mt-10"><a href="#">The Painter's Daughter</a></h4>
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
			<div class="col-md-9">
				<div class="row mt-10">
					<div class="col-md-4">
						Buku Pilihan
					</div>
					<div class="col-md-8">
						<ul style="display: inline-block;list-style: none;float: right;">
							<li style="float: left;margin-left: 20px"><a href="javascript:;" class="btnfilter" data-filter="all">Semua Buku</a></li>
							<li style="float: left;margin-left: 20px"><a href="javascript:;" class="btnfilter" data-filter="fiksi">Fiksi</a></li>
							<li style="float: left;margin-left: 20px"><a href="javascript:;" class="btnfilter" data-filter="komik">Komik</a></li>
							<li style="float: left;margin-left: 20px"><a href="javascript:;" class="btnfilter" data-filter="nonfiksi">Non Fiksi</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
						<div class="col-md-6 all fiksi" style="margin-right: -15px;">
							<div class="card mb-15" style="padding: 0 10px;">
								<div class="card-body p-0 p-20">
									<div class="row mb-30">
										<div class="media">
											<img class="d-flex align-self-start mr-30 rounded-circle" src="http://placehold.it/70x70" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle2">Marina Saraswati</h5>
												<p><small><span>Jakarta, Indonesia</span>
													<span class="ml-30">1 hours ago</span></small></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="media">
											<img class="d-flex align-self-start mr-20" src="http://placehold.it/110x170" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle3">Story Of Drama</h5>
												<p>FIKSI</p>
												<p class="text-desc">
													Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted" style="font-size: 1.4em;">
									<div class="pull-right">
										<a href="#"><i class="fa fa-eye"></i> <small style="font-size: 10pt !important;">290</small></a>
										<a href="#" class="ml-20"><i class="fa fa-share"></i> <small style="font-size: 10pt !important;">12</small></a>
									</div>
									<div>
										<a href="#" class="mr-30"><i class="fa fa-heart-o"></i></a>
										<a href="#"><i class="fa fa-comment-o"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 all fiksi" style="margin-right: -15px;">
							<div class="card mb-15" style="padding: 0 10px;">
								<div class="card-body p-0 p-20">
									<div class="row mb-30">
										<div class="media">
											<img class="d-flex align-self-start mr-30 rounded-circle" src="http://placehold.it/70x70" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle2">Marina Saraswati</h5>
												<p><small><span>Jakarta, Indonesia</span>
													<span class="ml-30">1 hours ago</span></small></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="media">
											<img class="d-flex align-self-start mr-20" src="http://placehold.it/110x170" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle3">Story Of Drama</h5>
												<p>FIKSI</p>
												<p class="text-desc">
													Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted" style="font-size: 1.4em;">
									<div class="pull-right">
										<a href="#"><i class="fa fa-eye"></i> <small style="font-size: 10pt !important;">290</small></a>
										<a href="#" class="ml-20"><i class="fa fa-share"></i> <small style="font-size: 10pt !important;">12</small></a>
									</div>
									<div>
										<a href="#" class="mr-30"><i class="fa fa-heart-o"></i></a>
										<a href="#"><i class="fa fa-comment-o"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 all komik" style="margin-right: -15px;">
							<div class="card mb-15" style="padding: 0 10px;">
								<div class="card-body p-0 p-20">
									<div class="row mb-30">
										<div class="media">
											<img class="d-flex align-self-start mr-30 rounded-circle" src="http://placehold.it/70x70" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle2">Marina Saraswati</h5>
												<p><small><span>Jakarta, Indonesia</span>
													<span class="ml-30">1 hours ago</span></small></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="media">
											<img class="d-flex align-self-start mr-20" src="http://placehold.it/110x170" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle3">Story Of Drama</h5>
												<p>FIKSI</p>
												<p class="text-desc">
													Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted" style="font-size: 1.4em;">
									<div class="pull-right">
										<a href="#"><i class="fa fa-eye"></i> <small style="font-size: 10pt !important;">290</small></a>
										<a href="#" class="ml-20"><i class="fa fa-share"></i> <small style="font-size: 10pt !important;">12</small></a>
									</div>
									<div>
										<a href="#" class="mr-30"><i class="fa fa-heart-o"></i></a>
										<a href="#"><i class="fa fa-comment-o"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 all komik" style="margin-right: -15px;">
							<div class="card mb-15" style="padding: 0 10px;">
								<div class="card-body p-0 p-20">
									<div class="row mb-30">
										<div class="media">
											<img class="d-flex align-self-start mr-30 rounded-circle" src="http://placehold.it/70x70" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle2">Marina Saraswati</h5>
												<p><small><span>Jakarta, Indonesia</span>
													<span class="ml-30">1 hours ago</span></small></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="media">
											<img class="d-flex align-self-start mr-20" src="http://placehold.it/110x170" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle3">Story Of Drama</h5>
												<p>FIKSI</p>
												<p class="text-desc">
													Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted" style="font-size: 1.4em;">
									<div class="pull-right">
										<a href="#"><i class="fa fa-eye"></i> <small style="font-size: 10pt !important;">290</small></a>
										<a href="#" class="ml-20"><i class="fa fa-share"></i> <small style="font-size: 10pt !important;">12</small></a>
									</div>
									<div>
										<a href="#" class="mr-30"><i class="fa fa-heart-o"></i></a>
										<a href="#"><i class="fa fa-comment-o"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 all nonfiksi" style="margin-right: -15px;">
							<div class="card mb-15" style="padding: 0 10px;">
								<div class="card-body p-0 p-20">
									<div class="row mb-30">
										<div class="media">
											<img class="d-flex align-self-start mr-30 rounded-circle" src="http://placehold.it/70x70" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle2">Marina Saraswati</h5>
												<p><small><span>Jakarta, Indonesia</span>
													<span class="ml-30">1 hours ago</span></small></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="media">
											<img class="d-flex align-self-start mr-20" src="http://placehold.it/110x170" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle3">Story Of Drama</h5>
												<p>FIKSI</p>
												<p class="text-desc">
													Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted" style="font-size: 1.4em;">
									<div class="pull-right">
										<a href="#"><i class="fa fa-eye"></i> <small style="font-size: 10pt !important;">290</small></a>
										<a href="#" class="ml-20"><i class="fa fa-share"></i> <small style="font-size: 10pt !important;">12</small></a>
									</div>
									<div>
										<a href="#" class="mr-30"><i class="fa fa-heart-o"></i></a>
										<a href="#"><i class="fa fa-comment-o"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 all nonfiksi" style="margin-right: -15px;">
							<div class="card mb-15" style="padding: 0 10px;">
								<div class="card-body p-0 p-20">
									<div class="row mb-30">
										<div class="media">
											<img class="d-flex align-self-start mr-30 rounded-circle" src="http://placehold.it/70x70" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle2">Marina Saraswati</h5>
												<p><small><span>Jakarta, Indonesia</span>
													<span class="ml-30">1 hours ago</span></small></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="media">
											<img class="d-flex align-self-start mr-20" src="http://placehold.it/110x170" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle3">Story Of Drama</h5>
												<p>FIKSI</p>
												<p class="text-desc">
													Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted" style="font-size: 1.4em;">
									<div class="pull-right">
										<a href="#"><i class="fa fa-eye"></i> <small style="font-size: 10pt !important;">290</small></a>
										<a href="#" class="ml-20"><i class="fa fa-share"></i> <small style="font-size: 10pt !important;">12</small></a>
									</div>
									<div>
										<a href="#" class="mr-30"><i class="fa fa-heart-o"></i></a>
										<a href="#"><i class="fa fa-comment-o"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 all fiksi" style="margin-right: -15px;">
							<div class="card mb-15" style="padding: 0 10px;">
								<div class="card-body p-0 p-20">
									<div class="row mb-30">
										<div class="media">
											<img class="d-flex align-self-start mr-30 rounded-circle" src="http://placehold.it/70x70" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle2">Marina Saraswati</h5>
												<p><small><span>Jakarta, Indonesia</span>
													<span class="ml-30">1 hours ago</span></small></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="media">
											<img class="d-flex align-self-start mr-20" src="http://placehold.it/110x170" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle3">Story Of Drama</h5>
												<p>FIKSI</p>
												<p class="text-desc">
													Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted" style="font-size: 1.4em;">
									<div class="pull-right">
										<a href="#"><i class="fa fa-eye"></i> <small style="font-size: 10pt !important;">290</small></a>
										<a href="#" class="ml-20"><i class="fa fa-share"></i> <small style="font-size: 10pt !important;">12</small></a>
									</div>
									<div>
										<a href="#" class="mr-30"><i class="fa fa-heart-o"></i></a>
										<a href="#"><i class="fa fa-comment-o"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 all fiksi" style="margin-right: -15px;">
							<div class="card mb-15" style="padding: 0 10px;">
								<div class="card-body p-0 p-20">
									<div class="row mb-30">
										<div class="media">
											<img class="d-flex align-self-start mr-30 rounded-circle" src="http://placehold.it/70x70" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle2">Marina Saraswati</h5>
												<p><small><span>Jakarta, Indonesia</span>
													<span class="ml-30">1 hours ago</span></small></p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="media">
											<img class="d-flex align-self-start mr-20" src="http://placehold.it/110x170" alt="Generic placeholder image">
											<div class="media-body">
												<h5 class="card-title nametitle3">Story Of Drama</h5>
												<p>FIKSI</p>
												<p class="text-desc">
													Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a href="#" class="readmore">Lanjut</a>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-muted" style="font-size: 1.4em;">
									<div class="pull-right">
										<a href="#"><i class="fa fa-eye"></i> <small style="font-size: 10pt !important;">290</small></a>
										<a href="#" class="ml-20"><i class="fa fa-share"></i> <small style="font-size: 10pt !important;">12</small></a>
									</div>
									<div>
										<a href="#" class="mr-30"><i class="fa fa-heart-o"></i></a>
										<a href="#"><i class="fa fa-comment-o"></i></a>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/baboo.js"></script>
</body>
</html>	
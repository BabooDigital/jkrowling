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
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	<nav class="navbar navbar-expand-lg fixed-top baboonav">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="<?php echo base_url(); ?>public/img/logo_purple.png" width="100" alt="">
			</a>

			<form class="form-inline srcform">
				<input class="form-search" type="text" placeholder="Cari di baboo" aria-label="Search">
			</form>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars fa-border"></span>
			</button>
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
								<img class="d-flex mr-2 rounded-circle" src="http://placehold.it/40x40" alt="Generic placeholder image">
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

	<div class="container babooid">
		<div class="row">
			<!-- Left Side -->
			<div class="col-md-3">
				<!-- Penulis Minggu Ini -->
				<div class="card mb-15">
					<div class="card-header">
						Penulis minggu ini
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush">
							<li class="media baboocontent">
								<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="Name">
								<div class="media-body mt-7">
									<h5 class="mt-0 mb-1 nametitle">Rian</h5>
									<small>Fiksi</small>
									<div class="pull-right baboocolor">
										<a href="#" class="addbutton">
											<img src="<?php echo base_url(); ?>public/img/assets/icon_plus_purple.svg" width="20" class="mt-img">
										</a>
									</div>
								</div>
							</li>
							<li class="media baboocontent">
								<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="Name">
								<div class="media-body mt-7">
									<h5 class="mt-0 mb-1 nametitle">Risa Sulis</h5>
									<small>Fiksi</small>
									<div class="pull-right baboocolor">
										<a href="#" class="addbutton">
											<img src="<?php echo base_url(); ?>public/img/assets/icon_plus_purple.svg" width="20" class="mt-img">
										</a>
									</div>
								</div>
							</li>
							<li class="media baboocontent">
								<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="Name">
								<div class="media-body mt-7">
									<h5 class="mt-0 mb-1 nametitle">Rizky Ramadhan</h5>
									<small>Fiksi</small>
									<div class="pull-right baboocolor">
										<a href="#" class="addbutton">
											<img src="<?php echo base_url(); ?>public/img/assets/icon_plus_purple.svg" width="20" class="mt-img">
										</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Penulis Minggu Ini -->

				<!-- Trending -->
				<div class="card mb-15">
					<div class="card-header">
						Trending
					</div>
					<div class="card-body p-0">
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item">
					    	<p><span class="bold"><a href="#">UI Interactions of the week</a></span>
					    	<span class="bold"><a href="#">#94</a></span>
					    	<span style="font-size: 10pt;">by <a href="#">Muzil</a></span></p>
					    </li>
					    <li class="list-group-item">
					    	<p><span class="bold"><a href="#">UI Interactions of the week</a></span>
					    	<span class="bold"><a href="#">#94</a></span>
					    	<span style="font-size: 10pt;">by <a href="#">Muzil</a></span></p>
					    </li>
					    <li class="list-group-item">
					    	<p><span class="bold"><a href="#">UI Interactions of the week</a></span>
					    	<span class="bold"><a href="#">#94</a></span>
					    	<span style="font-size: 10pt;">by <a href="#">Muzil</a></span></p>
					    </li>
					    <li class="list-group-item">
					    	<p><span class="bold"><a href="#">UI Interactions of the week</a></span>
					    	<span class="bold"><a href="#">#94</a></span>
					    	<span style="font-size: 10pt;">by <a href="#">Muzil</a></span></p>
					    </li>
					  </ul>
					</div>
				</div>
				<!-- Trending -->
			</div>

			<!-- Mid Side -->
			<div class="col-md-6">
				<!-- Status -->
				<div class="card mb-15" style="padding: 0 10px;">
					<div class="card-body p-0 p-20">
						<div class="row mb-30">
							<div class="media">
								<img class="d-flex align-self-start mr-20 rounded-circle" src="http://placehold.it/60x60" alt="Generic placeholder image">
								<div class="media-body mt-5">
									<h5 class="card-title nametitle2">Paulsen JS</h5>
									<p><small><span>Jakarta, Indonesia</span>
										<span class="ml-10">1 hours ago</span></small></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="media">
								<img class="d-flex align-self-start mr-10" src="http://placehold.it/110x160" alt="Profile">
								<div class="media-body">
									<h5 class="card-title nametitle3">Story Of Drama</h5>
									<p class="catbook"><a href="#" class="mr-20"><span style="border: 1px #7554bd solid;border-radius: 25px;padding: 0px 10px;color: #7554bd;">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 290</span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> 12</span></p>
									<p class="text-desc-in">
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
				<div class="card mb-15" style="padding: 0 10px;">
					<div class="card-body p-0 p-20">
						<div class="row mb-30">
							<div class="media">
								<img class="d-flex align-self-start mr-20 rounded-circle" src="http://placehold.it/60x60" alt="Generic placeholder image">
								<div class="media-body mt-5">
									<h5 class="card-title nametitle2">Marina Saraswati</h5>
									<p><small><span>Jakarta, Indonesia</span>
										<span class="ml-10">1 hours ago</span></small></p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="media">
								<img class="d-flex align-self-start mr-10" src="http://placehold.it/110x160" alt="Profile">
								<div class="media-body">
									<h5 class="card-title nametitle3">Story Of Drama</h5>
									<p class="catbook"><a href="#" class="mr-20"><span style="border: 1px #7554bd solid;border-radius: 25px;padding: 0px 10px;color: #7554bd;">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 290</span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> 12</span></p>
									<p class="text-desc-in">
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

			<!-- Right Side -->
			<div class="col-md-3">
				<div class="stickymenu">
					<!-- Card Widget -->
					<div class="card card-widget mb-15">
						<div class="card-content">
							<p class="smalltitle">Tunggu apalagi?</p>
							<p class="fillcontent">Tuliskan semua ceritamu dan dapatkan banyak pembaca</p><a class="btn btn-white" href="#"><i class="fa fa-pencil-square-o"></i> Tulis Cerita</a>
						</div>
					</div>
					<!-- Card Widget -->

					<!-- Buku Populer -->
					<div class="card mb-15">
						<div class="card-header">
							Buku Populer
						</div>
						<div class="card-body p-0">
						  <ul class="list-group list-group-flush">
						    <li class="list-group-item">
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
						    <li class="list-group-item">
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
						    <li class="list-group-item">
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
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js">
	</script> 
	<script src="https://cdn.rawgit.com/leafo/sticky-kit/v1.1.2/jquery.sticky-kit.js">
	</script> 
	<script src="<?php echo base_url(); ?>public/js/baboo.js">
	</script>
</body>
</html>
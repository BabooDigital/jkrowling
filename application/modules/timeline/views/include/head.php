<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	
	<title><?php echo $judul; ?></title>

	<!-- CSS -->
	<link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>public/css/baboo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/jquery.bxslider.min.css" rel="stylesheet" type="text/css">
	<!-- <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script> -->
	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
</head>

<body>
	<nav class="navbar navbar-expand-lg fixed-top baboonav">
		<div class="container">
			<a class="navbar-brand" href="<?php echo site_url(); ?>"><img alt="Baboo Main Logo" src="<?php echo base_url(); ?>public/img/logo_purple.png" width="100"></a>
			<form class="form-inline srcform my-2 my-lg-0">
				<input aria-label="Search" class="search-form form-control" placeholder="Cari di baboo" type="search">
			</form>

			<?php if ($this->session->userdata('isLogin') != 200) { ?>

			<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars fa-border"></span></button>
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

			<?php }else { ?>

			<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars fa-border"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav" style="margin-bottom: -13px;">
					<li class="nav-item mr-20 active">
						<a class="nav-link" href="<?php echo site_url(); ?>"><b>Beranda</b></a>
					</li>
					<li class="nav-item mr-20">
						<a class="nav-link" href="#"><b>Explore</b></a>
					</li>
					<li class="nav-item mr-30">
						<a class="nav-link btn-newstory" style="cursor: pointer;" href="<?php echo site_url(); ?>create_book"><i class="fa fa-pencil-square-o"></i> Tulis Cerita</a>
					</li>
					<li class="nav-item">
						<div class="media nav-link martopbot">
							<a href="#">
								<?php if ($this->session->userdata('userData')) {
									$img = $this->session->userdata('userData'); ?>
									<img alt="<?php echo $img['fullname']; ?>" class="d-flex mr-2 rounded-circle" src="<?php if ($img['prof_pict'] == NULL){
										echo base_url('public/img/profile/blank-photo.jpg');
									}else{
										echo $img['prof_pict'];
									} ?>" width="40"> 
									<?php } ?>
								</a>
								<div class="media-body">
									<p style="font-weight: bold;"><a href="<?php echo site_url(); ?>profile" style="font-size: 10pt;"><b><?php if ($this->session->userdata('userData')){
										$name = $this->session->userdata('userData');
										echo $name['fullname']; ?>
										<?php } ?></b></a> <span style="display: block;font-size: 7pt;">FIKSI</span></p>
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
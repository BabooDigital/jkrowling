<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	
	<title><?php echo $title; ?></title>

	<!-- CSS -->
	<link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>public/css/baboo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/jquery.bxslider.min.css" rel="stylesheet" type="text/css">
	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
	<script type="text/javascript">
		var base_url = "<?php echo base_url('') ?>";
	</script>
</head>
<style>
	.nav-link {
		padding: 0px 0.3rem !important;
	}
</style>

<body>
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
						<a class="nav-link" href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>public/img/icon-tab/feed_iconn.svg" width="23"><p class="fs-12px"><b>Explore</b></p></a>
					</li>
					<li class="nav-item mt-5">
						<a class="nav-link" href="#"><img src="<?php echo site_url(); ?>public/img/icon-tab/library_icon.svg" width="25"><p class="fs-12px"><b>Library</b></p></a>
					</li>
					<li class="nav-item mt-5">
						<a class="nav-link" href="#"><img src="<?php echo site_url(); ?>public/img/icon-tab/notif_icon.svg" width="25"><p class="fs-12px"><b>Notification</b></p></a>
					</li>
					<li class="nav-item mt-5">
						<a class="nav-link" href="#"><img src="<?php echo site_url(); ?>public/img/icon-tab/pesan.svg" width="25"><p class="fs-12px"><b>Pesan</b></p></a>
					</li>
					<li class="nav-item ml-100 mr-30">
						<form action="<?php echo site_url(); ?>createidbook" method="POST" class="mt-10">
							<input type="hidden" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
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
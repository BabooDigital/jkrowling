<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?> <?php echo get_css($css) ?> <?php endif ?>
</head>
<style type="text/css">
	.btnfollow-f {
	    background: #fff;
	    border: none;
	    border-radius: 50px;
	    padding: 0% 20%;
	    font-size: 30pt;
	    color: #7554bd;
	}
	.body-foll {
		background: #7db6d0;
	    padding: 5% 0%;
	    color: #fff !important;
	    border-top-right-radius: 10px;
	    border-bottom-right-radius: 10px;
	}
	.media-border {
		box-shadow: 0px 0px 10px #bdbdbd;
		border-radius: 10px;
	}
</style>
<body class="bg-borr">
	<div class="wrapper">
		<nav class="navbar navbar-light bg-borr pl-40 pr-40 pt-30 pb-30">
			<div class="container-fluid float-">
				<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left fa-2x"></i> </button>
				<a href="<?php echo site_url(); ?>timeline" style="color: #333;"> <span style="font-size: 30pt;">Lewati</span> </a>
			</div>
		</nav>
		<div class="container-fluid mb-200">
		<input type="hidden" id="iaiduui" value="<?php $aw = $this->session->userdata('userData'); echo $aw['user_id']; ?>">
			<div class="p-40">
				<div class="row">
					<div class="mb-100">
						<h1 class="parent-title">Penulis yang sesuai dengan minatmu</h1>
					</div>
				</div>
				<?php foreach ($userFollow as $ufoll) { ?>
				<div class="row mb-50">
					<div class="col-12">
						<div class="media bg-white media-border">
							<div class="media-first text-center p-30" style="width: 48%;">
								<img src="<?php if($ufoll['prof_pict']	== null){ echo base_url('public/img/profile/blank-photo.jpg'); }else { echo $ufoll['prof_pict']; }  ?>" width="160" height="160" class="rounded-circle">
								<p><h2><?php echo $ufoll['fullname'] ?></h2></p>
								<p><h3>Jakarta, Indonesia</h3></p>
							</div>
							<div class="media-body body-foll">
								<div class="row">
									<div class="col-6 text-center">
										<p style="display: inline-flex;"><img src="<?php echo base_url('') ?>public/img/icon-tab/book.svg" width="80"> <span style="font-size: 30pt;">1</span></p>
										<h2>Buku</h2>
									</div>
									<div class="col-6 text-center">
										<p style="display: inline-flex;"><img src="<?php echo base_url('') ?>public/img/icon-tab/followers.svg" width="80"> <span style="font-size: 30pt;"><?php echo $ufoll['followers'] ?></span></p>
										<h2>Pengikut</h2>
									</div>
								</div>
								<div class="row mt-50">
									<div class="col-12 text-center">
										<button class="btnfollow-f follow-u" user-d="<?php echo $ufoll['user_id'] ?>"><img src="<?php echo site_url(); ?>public/img/icon-tab/add_follow.svg" width="80"> <span>Follow</span></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

			</div>
		</div>

		<nav class="navbar navbar-light bg-borr fixed-bottom p-70">
			<div class="w-100">
				<a href="<?php echo site_url(); ?>timeline" class="mx-auto btnupdate-prof">Lanjutkan</a>
			</div>
		</nav>
	</div>

<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
<script type="text/javascript">
		var base_url = "<?php echo base_url('') ?>";
	</script>
</body>
</html>
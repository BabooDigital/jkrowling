<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?> <?php echo get_css($css) ?> <?php endif ?>
</head>
<style type="text/css">
.btnfollow-f {
	background: #fff;
	border: none;
	border-radius: 50px;
	padding: 0% 10%;
	font-size: 12pt;
	color: #7554bd;
}
.body-foll {
	background: #7db6d0;
	padding: 6% 3% 0% 0%;
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
		<div class="modal fade" id="first_follow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content" style="width: 105% !important; height: 800px;">
					<div class="modal-header">
						<nav class="navbar navbar-light bg-borr">
							<a href="<?php echo site_url(); ?>timeline" style="color: #333;"> <span class="float-right" style="font-size: 12pt;">Lewati</span> </a>
						</nav>
					</div>
					<div class="modal-content">
						<div class="container mt-20 mb-20">
							<input type="hidden" id="iaiduui" value="<?php $aw = $this->session->userdata('userData'); echo $aw['user_id']; ?>">
							<div class="row">
								<div class="col-12 mb-20">
									<h1 class="parent-title">Penulis yang sesuai dengan minatmu</h1>
								</div>
							</div>
							<div class="mb-90">
								<?php foreach ($userFollow as $ufoll) { ?>
								<div class="row mb-15">
									<div class="col-12">
										<div class="media bg-white media-border">
											<div class="media-first text-center p-10" style="width: 48%;">
												<img src="<?php if($ufoll['prof_pict']	== null){ echo base_url('public/img/profile/blank-photo.jpg'); }else { echo $ufoll['prof_pict']; }  ?>" width="50" height="50" class="rounded-circle mb-10">
												<span style="display: block;font-weight: bold;"><?php echo $ufoll['fullname'] ?></span>
												<span>Jakarta, Indonesia</span>
											</div>
											<div class="media-body body-foll">
												<div class="row">
													<div class="col-6 text-center">
														<span style="display: inline-flex;"><img src="<?php echo base_url('') ?>public/img/icon-tab/book.svg" width="30"> <span style="font-size: 12pt;"><?php echo $ufoll['book_made'] ?></span></span>
														<span>Buku</span>
													</div>
													<div class="col-6 text-center">
														<span style="display: inline-flex;"><img src="<?php echo base_url('') ?>public/img/icon-tab/followers.svg" width="30"> <span style="font-size: 12pt;"><?php echo $ufoll['followers'] ?></span></span>
														<span>Pengikut</span>
													</div>
												</div>
												<div class="row mt-10">
													<div class="col-12 text-center mb-20">
														<button class="btnfollow-f follow-u" user-d="<?php echo $ufoll['user_id'] ?>"><img src="<?php echo site_url(); ?>public/img/icon-tab/add_follow.svg" width="30"> <span class="txtfollow">Follow</span></button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>

						</div>
					</div>
					<div class="modal-footer">
						<nav class="navbar navbar-light fixed-bottom p-10">
							<a href="<?php echo site_url(); ?>timeline" class="mx-auto btnupdate-prof">Lanjutkan</a>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</div>

	<script>
		var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
	</script>
	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
	<script type="text/javascript">
		var base_url = "<?php echo base_url('') ?>";
	</script>
	<script type="text/javascript">
		$("#first_follow").modal();
	</script>
</body>
</html>
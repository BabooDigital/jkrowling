<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
	<style type="text/css">
	.liststyle_ {
		position: relative;
		display: block;
		padding: 10px 0px;
		margin-bottom: -1px;
		font-size: 15pt;
		background-color: #fff;
		border-bottom: 1px solid rgba(193, 193, 193, 0.2);
	}
	.fs-35 {
	}
</style>
</head>
<body class="bg-white">
	<div class="wrapper">
		<nav class="navbar-light" style="font-size: 12pt;">
			<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> </button>
		</nav>

		<div class="container mt-20">
			<!-- <div class="p-40"> -->
				<div class="row">
					<div class="col-12">
						<h1 class="parent-title">Pengaturan</h1>
						<!-- </div> -->
						<!-- </div> -->

						<!-- <div class="row"> -->
							<div class="list-group w-100">
								<!-- <a href="#" class="mb-10 list-group-item-action liststyle_">Pengaturan Akun</a>
								<a href="#" class="mb-10 list-group-item-action liststyle_">Pengaturan Aplikasi</a>
								<a href="#" class="mb-10 list-group-item-action liststyle_">Bantuan</a> -->
								<a href="<?php echo site_url('tnc'); ?>" class="mb-10 list-group-item-action liststyle_">Terms &amp; Condition</a>
								<a href="<?php echo site_url(); ?>change-pass" class="mb-10 list-group-item-action liststyle_">Ubah Password</a>
								<a href="<?php echo site_url(); ?>logout" class="mb-10 list-group-item-action liststyle_">Keluar</a>
							</div>
						</div>
						</div>
					</div>
				</div>

				<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
			</body>
			</html>
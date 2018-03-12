<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?> <?php echo get_css($css) ?> <?php endif ?>
</head>
<style type="text/css">
.btn-secondary {
	padding: 30px 30px;
	background-color: #ffffff;
	color: #333;
}
.btn-secondary.active, .btn-secondary:active, .show>.btn-secondary.dropdown-toggle {
	background-color: #7554bd;
	border: none;
	color: #fff;
}
.btn-secondary:hover {
	background-color: #7554bd;
	border: none;
	color: #fff;
}
</style>
<body class="bg-borr">
	<div class="wrapper">
		<nav class="navbar navbar-light bg-borr">
			<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> </button>
			<a href="<?php echo site_url(); ?>timeline" style="color: #333;"> <span style="font-size: 15pt;">X</span> </a>
		</nav>

		<div class="container mt-20">
			<div class="row">
				<div class="col-12 mb-20">
					<h1 class="parent-title">Jenis buku apa yang kamu suka?</h1>
				</div>
			</div>

			<div class="row">

				<div class="items col-6 mb-20">
					<div class="info-block block-info clearfix">
						<div data-toggle="buttons" class="btn-group itemcontent w-100">
							<label class="btn btn-secondary w-100">
								<div class="itemcontent">
									<input type="checkbox" name="cat_id[]" id="catselect" autocomplete="off" value="1">
									<img src="<?php echo base_url(); ?>public/img/assets/icon_fiksi.svg" width="40" height="40">
									<h4>Fiksi</h4>
								</div>
							</label>
						</div>
					</div>
				</div>
				<div class="items col-6 mb-20">
					<div class="info-block block-info clearfix">
						<div data-toggle="buttons" class="btn-group itemcontent w-100">
							<label class="btn btn-secondary w-100">
								<div class="itemcontent">
									<input type="checkbox" name="cat_id[]" id="catselect" autocomplete="off" value="2">
									<img src="<?php echo base_url(); ?>public/img/assets/icon_nonfiksi.svg" width="40" height="40">
									<h4>Non-Fiksi</h4>
								</div>
							</label>
						</div>
					</div>
				</div> 
				<div class="items col-6 mb-20">
					<div class="info-block block-info clearfix">
						<div data-toggle="buttons" class="btn-group itemcontent w-100">
							<label class="btn btn-secondary w-100">
								<div class="itemcontent">
									<input type="checkbox" name="cat_id[]" id="catselect" autocomplete="off" value="3">
									<img src="<?php echo base_url(); ?>public/img/assets/icon_komik.svg" width="40" height="40">
									<h4>Komik</h4>
								</div>
							</label>
						</div>
					</div>
				</div></div>

				<div class="row mt-10">
					<div class="col-12">
						<p style="font-size: 15pt;">*Kamu boleh pilih lebih dari satu sesuai yang kamu suka</p>
						<input type="hidden" id="iaiduui" value="<?php echo $this->session->userdata('userData')['user_id']; ?>">
					</div>
				</div>
			</div>

			<nav class=" navbar-light bg-borr fixed-bottom p-10">
				<button id="selectCat" class="mx-auto btnupdate-prof">Lanjutkan</button>
			</nav>
		</div>
		<script type="text/javascript">
			var base_url = '<?php echo base_url(); ?>';
		</script>
		<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
	</body>
	</html>
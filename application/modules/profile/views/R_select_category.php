<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?> <?php echo get_css($css) ?> <?php endif ?>
</head>
<style type="text/css">
 .btn-secondary {
 	padding: 80px 90px;
 	background-color: #ffffff;
 	color: #333;
 }
 .btn-secondary.active, .btn-secondary:active, .show>.btn-secondary.dropdown-toggle {
 	background-color: #edb6c1;
 	border: none;
 	color: #fff;
 }
 .btn-secondary:hover {
 	background-color: #7554bd;
 	border: none;
 	color: #fff;
 }
 div.itemcontent > h1 {
 	font-size: 3.5rem;
 }
 .items-collection {
 	/*display: -webkit-box;*/
 }
</style>
<body class="bg-borr">
	<div class="wrapper">
		<nav class="navbar navbar-light bg-borr pl-40 pr-40 pt-30 pb-30">
			<div class="container-fluid float-">
				<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left fa-2x"></i> </button>
				<a href="<?php echo site_url(); ?>timeline" style="color: #333;"> <span style="font-size: 30pt;">X</span> </a>
			</div>
		</nav>

		<div class="container-fluid mb-200">
			<div class="p-40">
				<div class="row">
					<div class="mb-100">
						<h1 class="parent-title">Jenis buku apa yang kamu suka?</h1>
					</div>
				</div>
				
				<div class="row">
					<!-- <div class="form-group">
						<div class="items-collection"> -->

							<div class="items col-6 mb-60">
								<div class="info-block block-info clearfix">
									<div data-toggle="buttons" class="btn-group bizmoduleselect">
										<label class="btn btn-secondary">
											<div class="itemcontent">
												<input type="checkbox" name="var_id[]" autocomplete="off" value="">
												<img src="http://placehold.it/200x200">
												<h1>Fiksi</h1>
											</div>
										</label>
									</div>
								</div>
							</div>
							<div class="items col-6 mb-60">
								<div class="info-block block-info clearfix">
									<div data-toggle="buttons" class="btn-group itemcontent">
										<label class="btn btn-secondary">
											<div class="itemcontent">
												<input type="checkbox" name="var_id[]" autocomplete="off" value="">
												<img src="http://placehold.it/200x200">
												<h1>Non-Fiksi</h1>
											</div>
										</label>
									</div>
								</div>
							</div> 
							<div class="items col-6 mb-60">
								<div class="info-block block-info clearfix">
									<div data-toggle="buttons" class="btn-group itemcontent">
										<label class="btn btn-secondary">
											<div class="itemcontent">
												<input type="checkbox" name="var_id[]" autocomplete="off" value="">
												<img src="http://placehold.it/200x200">
												<h1>Komik</h1>
											</div>
										</label>
									</div>
								</div>
							</div>                

						<!-- </div>
					</div>
 -->				</div>

				<div class="row mt-70">
					<p style="font-size: 30pt;">*Kamu boleh pilih lebih dari satu sesuai yang kamu suka</p>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-light bg-borr fixed-bottom p-70">
			<div class="w-100">
				<a href="<?php echo site_url(); ?>first_follow" class="mx-auto btnupdate-prof">Lanjutkan</a>
			</div>
		</nav>
	</div>

<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</body>
</html>
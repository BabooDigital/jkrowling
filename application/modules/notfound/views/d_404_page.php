<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.ico" sizes="16x16">

	<title><?php echo $title; ?></title>

	<!-- CSS -->
	<link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script>
	<script>
		var base_url = '<?php echo base_url(); ?>';
		var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
	</script>
	<?php $this->load->view('include/third_party_script'); ?>
</head>
<style>
body, html {
	height: 100%;
	margin: 0;
}
.btn-purp {
	background: #7554bd;color: #fff;border: none;border-radius: 35px;width: 70%;height: 40px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.32);
}
.leftbg {
	width: 100%;
}
</style>
<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVW4JD3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
				<!-- <div class="bg"></div> -->
				<img src="<?php echo base_url('public/img/404_notfound_d.svg'); ?>" class="img-fluid leftbg">
			</div>
			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
				<div class="row mt-50">
					<div class="col-2"></div>
					<div class="col-8">
						<div class="text-center">
							<div style=" font-size:  115pt; ">404</div>
							<div style=" font-size:  30pt; ">Sepertinya kembali adalah langkah yang benar</div>
							<button class="mt-30 btn-purp btn-back">Kembali</button>
						</div>
					</div>
					<div class="col-2"></div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).on('click', '.btn-back', function(event) {
			event.preventDefault();
			/* Act on the event */
			window.history.back();
		});
	</script>
</body>
</html>
<body>

</body>
</html>
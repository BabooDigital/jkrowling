<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta data-n-head="true" content="yes" data-hid="mobile-web-app-capable" name="mobile-web-app-capable">
	<meta data-n-head="true" content="#7661ca" data-hid="theme-color" name="theme-color">
	<meta data-n-head="true" content="#7661ca" data-hid="msapplication-navbutton-color" name="masapplication-navbutton-color">

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">

	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.ico" sizes="16x16">

	<title><?php echo $title; ?></title>

	<!-- CSS -->
	<link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script>
	<script>var base_url = '<?php echo base_url(); ?>';</script>
</head>
<style>
body, html {
	height: 100%;
	margin: 0;
}
.layout_layer {
	position: absolute; bottom: 20px; right: 0; padding: 20px;
}
.btn-purp {
	background: #7554bd;color: #fff;border: none;border-radius: 35px;width: 70%;height: 40px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.32);
}
.bg {
	background-image: url("public/img/404_notfound.svg");
	height: 100%; 
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}
</style>
<body>
	<div class="bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-8 layout_layer">
				<div class="text-right">
					<div style=" font-size:  60pt; ">404</div>
					<div style=" font-size:  13pt; ">Sepertinya kembali adalah langkah yang benar</div>
					<button class="mt-30 btn-purp btn-back">Kembali</button>
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
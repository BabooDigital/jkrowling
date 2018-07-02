<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta data-n-head="true" content="yes" data-hid="mobile-web-app-capable" name="mobile-web-app-capable">
	<meta data-n-head="true" content="#7661ca" data-hid="theme-color" name="theme-color">
	<meta data-n-head="true" content="#7661ca" data-hid="msapplication-navbutton-color" name="masapplication-navbutton-color">

	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.ico" sizes="16x16">
	
	<title><?php echo $title; ?></title>

	<!-- CSS -->
	<link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>public/css/baboo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
	<!-- <style type="text/css">
	.navbar {
		padding: 0.4rem 1rem !important;
	}
	
</style> -->
<script type="text/javascript">
	var base_url = "<?php echo base_url(''); ?>";
	var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
	var csrf_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
</script>
<!-- <script src="https://js.pusher.com/4.2/pusher.min.js"></script> -->

</head>
<style>
.nav-link {
	padding: 0px 8px !important;
}
</style>
<body>
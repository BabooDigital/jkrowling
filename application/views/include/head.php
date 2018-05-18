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
	<link href="<?php echo base_url();?>public/css/baboo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
	<style type="text/css">
	.navbar {
		padding: 0.4rem 1rem !important;
	}
	
</style>
<script type="text/javascript">
	var base_url = "<?php echo base_url(''); ?>";
</script>
<script src="https://js.pusher.com/4.2/pusher.min.js"></script>
<!--    Auto Ads-->
<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
<!--<script>-->
<!--  (adsbygoogle = window.adsbygoogle || []).push({-->
<!--    google_ad_client: "ca-pub-4994852796413443",-->
<!--    enable_page_level_ads: true-->
<!--  });-->
<!--</script>-->
</head>
<style>
.nav-link {
	padding: 0px 8px !important;
}
</style>
<body>
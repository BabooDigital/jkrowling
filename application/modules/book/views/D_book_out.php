<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<?php 
	foreach ($desc as $meta) {
		$txt  = strip_tags($meta['paragraph_text']);
		if ($counts == 0) { $view_counts = '+'; }else{ $view_counts = $counts;}
		$datas .= substr($txt, 0, 150);
	}
	echo "<meta name='description'  content='".$datas."' />";
	?>
	<meta name="Keywords" content="baboo">

	<!-- Facebook -->
	<?php $u1= $this->uri->segment(2); echo "<meta property='og:url'                content='".base_url('book/'.$u1.'/preview')."' />"; ?>
	<meta property="og:type"               content="website" />
	<meta property="og:title"              content="<?php echo $title; ?> | Baboo - Beyond Book &amp; Creativity" />
	<?php 
	foreach ($desc as $meta) {
		$txt  = strip_tags($meta['paragraph_text']);
		if ($counts == 0) { $view_counts = '+'; }else{ $view_counts = $counts;}
		$datas .= substr($txt, 0, 150);
	}
	echo "<meta property='og:description'			content='".$datas."' />";
	?>
	
	<meta property="og:image"              content="<?php echo $cover; ?>" />

	<title><?php echo $title; ?> | Baboo - Beyond Book &amp; Creativity</title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>

</head>
<body style="background: #f5f8fa;padding: 50px 0">
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12 bg-white" style="padding: 20px;">
					<div class="media">
						<img class="mr-3" src="<?php echo $cover; ?>" width="270" height="400" alt="<?php echo $title; ?> | Cover Book Image">
						<div class="media-body">
							<h2 class="mt-0"><b><?php echo $title; ?></b></h2>
							<div class="descBook">
								<?php 
								foreach ($desc as $book) {
									if ($count == 0) { $view_count = '+'; }else{ $view_count = $count;}
									$data .= "<div class='mb-20'>".$book['paragraph_text']."</div>";
								}
								echo $data;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<a href="<?php echo site_url(); ?>login?b=<?php echo $bid; ?>" class="btn btn-info">LOGIN</a>
				</div>
			</div>
		</div>
	</div>
	
</div>

</body>
</html>
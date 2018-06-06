<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
	<style type="text/css">
	a {color: #333;}
	.titlebooks {font-size: 20pt;font-weight: 900;}
	.card-footer {border-radius: none !important;}
</style>
<script>
	var base_url = '<?php echo base_url(); ?>';
	var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
</head>
<body id="pageContent">
	<div class="wrapper" style="background: #f5f8fa;">

		<div class="lds-css ng-scope" style="display: none;">
			<div class="lds-eclipse" style="width:100%;height:100%">
				<img class="img-loading" src="<?php echo base_url('public/img/splash_.png'); ?>" width="90">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>

		<nav class="navbar navbar-light">
			<a class="menu-page boo-menu" href="<?php echo site_url('library'); ?>" id="tab_page" dat-title="Library"><i class="fa fa-arrow-left fa-2x"></i></a> <h5 style="margin: auto;">Semua Koleksi Buku Mu</h5>
		</nav>

		<div class="container mt-15 pt-15 pb-15 bg-white">
			<div class="row">
				<?php if (!empty($book)) {
					foreach ($book as $b) { ?>
					<div class="col-6 mb-30">
						<a href="<?php echo site_url(); ?>book/<?php echo $b['book_id']; ?>-<?php echo url_title($b['title_book'], 'dash', true); ?>"><img class="rounded" src="<?php echo $b['cover_url']; ?>" width="150" height="180" style="object-fit: cover;"> </a>
						<div class="mt-10" style="text-align:left;">
							<a href="<?php echo site_url(); ?>book/<?php echo $b['book_id']; ?>-<?php echo url_title($b['title_book'], 'dash', true); ?>"><div id="title_book">
								<span style="font-size: 13px;font-weight: bold;"><?php if(strlen($b['title_book']) > 15){ $str =  substr($b['title_book'], 0, 15).'...'; echo $str; }else { echo $b['title_book']; }  ?></span>
							</div></a>
							<div id="author_book">
								<a href="<?php echo site_url('profile/'.$b['author_id'].'-'.url_title($b['author_name'], 'dash', true)); ?>"><span style="font-size: 12px;"><img class="rounded-circle" height="20" src="<?php if($b['author_avatar'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $b['author_avatar']; } ?>" width="20"> <?php echo $b['author_name']; ?></span></a>
								</div>
							</div>
						</div>
						<?php } }else{
							echo "<div class='col-12'><h5 class='text-muted'>Anda belum memiliki koleksi buku apapun...</h5></div>";
						} ?>
					</div>
				</div>

				<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
			</body>
			</html>
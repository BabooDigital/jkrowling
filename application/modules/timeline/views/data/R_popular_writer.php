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
			<a class="menu-page <?php if ($this->uri->segment('1') == 'timeline') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('timeline'); ?>" id="tab_page" dat-title="Timeline"><i class="fa fa-arrow-left fa-2x"></i></a> <h5 style="margin: auto;">Penulis Populer</h5>
		</nav>

		<div class="container mt-15">
			<div class="row">
				<?php error_reporting(0); foreach ($populars as $pop){
                    $urlToUser = url_title($pop['fullname'], 'dash', true).'-'.$pop['user_id']; ?>
				<div class='col-6 mb-10 pr-5 pl-5'>
					<div class='card pt-15 pb-15' style='border: solid 1px #e8ebec;border-radius: 10px !important;'>
						<div class='text-center'>
							<img class='rounded-circle' height='50' src='<?php echo $pop['prof_pict']; ?>' alt='<?php echo $pop['fullname']; ?>' style='object-fit:cover;' width='50'>
							<p class='nametitled'><a href='<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>'><?php echo $pop['fullname']; ?></a></p>
						</div>
						<div class='row'>
							<div class='col-6 text-center rborder pr-0'>
								<p style='display: inline-flex;'><img src='public/img/icon-tab/book.svg' width='25'> <span style='font-weight: bold;'><?php echo $pop['book_made']; ?></span></p>
								<h6>Buku</h6>
							</div>
							<div class='col-6 text-center pl-0'>
								<p style='display: inline-flex;'><img src='public/img/icon-tab/followers.svg' width='25'> <span style='font-weight: bold;'><?php echo $this->baboo_lib->ConvertToK($pop['followers']); ?></span></p>
								<h6>Teman</h6>
							</div>
						</div>
						<div class='row mt-10'>
							<div class='col-12 text-center' style='height:30px;'>
								<?php if ($pop['user_id'] != '1') { ?>
								<button type='button' class='btn-follow <?php if($pop['isFollow'] == true){echo 'unfollow-u';}else{echo 'follow-u';} ?>' data-follow='<?php echo $pop['user_id']; ?>'><img src='public/img/icon-tab/add_follow.svg' width='25'> <span class='txtfollow'><?php if($pop['isFollow'] == true){echo 'Diikuti';}else{echo 'Ikuti';} ?></span></button>
								<?php }else{} ?>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>

		<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
	</body>
	</html>

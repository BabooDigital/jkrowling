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
			<a class="menu-page <?php if ($this->uri->segment('1') == 'timeline') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('timeline'); ?>" id="tab_page" dat-title="Timeline"><i class="fa fa-arrow-left fa-2x"></i></a>
		</nav>

		<div class="container mt-15">
			<div class="row mb-15">
				<div class="col-12">
					<h3><strong>Draft Buku</strong></h3>
				</div>
			</div>

			<div class="row">
				<div class="w-100">
					<?php if (!empty($datadraft)) { 
						foreach ($datadraft as $data) {  ?>
						<div class='card mb-20'>
							<div class='card-header bg-white'>
								<span><img src='public/img/assets/icon_clock.svg' width='20'> <?php echo $data['latest_update']; ?></span> <span class='float-right' style='color: red;'>Draft</span>
							</div>
							<div class='card-body'>
								<?php if (!empty($data['image_url'])) { ?>
								<img alt='asd' class='d-flex align-self-start mr-10 float-left' height='170' src='<?php echo $data['image_url']; ?>' width='120'>
								<?php } ?>
								<h4 class='card-title nametitle3'><span class="titlebooks"><?php echo $data['title_book']; ?></span></h4>
								<p class='catbook mb-10'><span class='btn-no-fill'><?php echo $data['category']; ?></span></p>
								<p class='text-desc-in'><?php echo substr($data['desc'],0,200); ?> ...</p>
							</div>
							<div class='card-footer text-muted bg-white' style='font-size: 0.8em;font-weight: bold;'>
								<div class='pull-right' style="margin-top: 3px;">
									<a class='mr-10 fs-14px mb-5' href='<?php echo site_url('listchapter/'. $data['book_id']); ?>' style='border: 1px #333 solid;border-radius: 40px;padding: 8px 25px;'><img src='public/img/assets/icon_pen.svg' width='23'> Edit</a> <a href='<?php echo site_url('cover/'. $data['book_id']); ?>' style='border: 1px #7554bd solid;border-radius: 40px;padding: 8px 20px;color: #7554bd;'><img class='mr-10 fs-14px mb-5' src='public/img/assets/icon_publish.svg' width='20'> Publish</a>
								</div>
								<div>
									<button type="button" class="clear-btn deldraft" draft-id="<?php echo $data['book_id']; ?>"><img src='public/img/icon-tab/dustbin.svg' width='20'></button>
								</div>
							</div>
						</div>
						<?php } }else {
							echo "<div class='container first_login mt-30' style='height:100vh;'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'> <img src='".base_url('public/img/icon_draft_blank.png')."' width='190'> </div> <div class='text-center'> <h4><b>Belum ada draft buku yang kamu tulis</b></h4> </div> </div> </div> </div>";
						} ?>
					</div>
				</div>
			</div>
		</div>

		<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
		<script>
			var base_url = '<?php echo base_url(); ?>';
		</script>
	</body>
	</html>
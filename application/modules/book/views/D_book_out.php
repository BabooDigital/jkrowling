<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<?php $this->load->view('include/meta_head', $data, FALSE); ?>

	<title><?php echo $title; ?></title>
	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.ico" sizes="16x16">
	<!-- CSS -->
	<link href="<?php echo base_url('') ?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url('') ?>public/css/baboo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('') ?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('') ?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('') ?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('') ?>public/plugins/holdOn/css/HoldOn.css">
	<script type="text/javascript">
		var base_url = "<?php echo base_url('') ?>";
		var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
	</script>
	<!-- <script src="https://js.pusher.com/4.2/pusher.min.js"></script> -->
	<?php $this->load->view('include/third_party_script'); ?>
</head>
<style>
.nav-link {
	padding: 0px 0.3rem !important;
}
</style>

<?php $this->load->view('navbar/D_navbar'); ?>

<style type="text/css">

/*Right*/
.modal.right.fade .modal-dialog {
	right: -435px;
	-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
	-moz-transition: opacity 0.3s linear, right 0.3s ease-out;
	-o-transition: opacity 0.3s linear, right 0.3s ease-out;
	transition: opacity 0.3s linear, right 0.3s ease-out;
}

.modal.right.fade.in .modal-dialog {
	right: 0;
}
.modal-backdrop
{
	opacity:0.5 !important;
}

/* ----- MODAL STYLE ----- */
.modal-content {
	border-radius: 0;
	border: none;
	height: 100vh;
}

.modal-header {
	border-bottom-color: #EEEEEE;
	background-color: #FAFAFA;
}

.closes {
	background: none;
	font-size: 2rem;
	line-height: 1;
	opacity: .5;
	border: none;
	position: absolute;
	right: 35px;
}

.thumbnail {
	position: relative;
	display: inline-block;
}

.caption {
	position: absolute;
	top: 44%;
	left: 50%;
	transform: translate( -50%, -50% );
	text-align: center;
	font-weight: bold;
	color: #7554bd;
}
.btnlogin {
	color: #fff;
    background: #7554bd;
    padding: 10px 100px;
    font-size: 15pt;
    border-radius: 35px;
    box-shadow: 0px 2px 3px #818181;
}
.fsize {
	font-size: 12px;
}
</style>
<body>
	<div data-content-category='Book &gt; <?php echo $category; ?>' data-content-ids='<?php echo $bid; ?>' data-content-name='<?php echo $bo_title; ?>' data-content-type='<?php echo $m_type; ?>' data-page-type='ViewContent' data-value='<?php echo $m_book_price; ?>' id='fbpixel'></div>
<div class="container pt-100 mb-80">
	<div class="row">
		<div class="col-md-4 dtlbok" style="padding: 0 40px;">
			<div class="card pb-20">
				<div class="text-center pr-30 pl-30 pt-20">
					<img class="cover_image" src="<?php echo ($cover != null) ? $cover : base_url('public/img/profile/blank-photo.jpg') ; ?>" width="150" height="200">
					<div class="card-body">
						<input type="hidden" name="iaidubi" id="iaidubi" value="2311">
						<a href="#">
							<h1 class="dbooktitle" style="font-size: 25px;"><?php echo $bo_title; ?></h1>
						</a>
						<div class="dbooksociallist">
							<a href="#"><span title="Total <?php echo $view; ?>"><img src="<?php echo base_url('') ?>public/img/assets/icon_view.svg" width="25"> <span class="fsize" id="viewcount"><?php echo $this->baboo_lib->ConvertToK($view); ?></span></span></a>
						</div>
						<div class="dbooksociallist">
							<a href="#"><span title="Total <?php echo $comment; ?>"><img src="<?php echo base_url('') ?>public/img/assets/icon_comment.svg" width="14"> <span class="fsize" id="commentcount"><?php echo $this->baboo_lib->ConvertToK($comment); ?></span></span></a>
						</div>
						<div class="dbooksociallist">
							<a href="#"><span title="Total <?php echo $like; ?>"><img src="<?php echo base_url('') ?>public/img/assets/icon_love.svg" width="15"> <span class="fsize" id="likecount"><?php echo $this->baboo_lib->ConvertToK($like); ?></span></span></a>
						</div>
						<div class="dbooksociallist">
							<a href="#"><span title="Total <?php echo $share; ?>"><img src="<?php echo base_url('') ?>public/img/assets/icon_share.svg" width="15"> <span class="fsize" id="sharecount"><?php echo $this->baboo_lib->ConvertToK($share); ?></span></span></a>
						</div>
					</div>
				</div>
				<div class="pr-20 pl-20">
                <br>
                <div class="mx-auto">
                	<?php echo $this->load->view('ads/250_side_ad'); ?>
                </div>
				</div>
			</div>
		</div>

		<div class="col-md-7"">
			<div class="card pt-10 pl-20 pr-20 book-content">
				<div class="card-body">
					<div class="media" style="margin-bottom: -15px;">
						<img class="d-flex align-self-start mr-20 rounded-circle" width="50" height="50" src="
						<?php echo ($avatar != null) ? $avatar : base_url('public/img/profile/blank-photo.jpg') ; ?>" alt="<?php echo $author; ?>">
						<div class="media-body">
							<p class="nametitle2 author_name h2"><?php echo $author; ?></p>
							<p><small><span>Jakarta, Indonesia</span></small></p>
							<a href="#"><span></span></a>
						</div>
					</div>
					<div id="appentoContent" class="mt-15">
<!--						<h2 class="dbooktitlebook"></h2>-->
						<br>
						<div id="post-data">
							<h2 id="" class="book-title chapter mb-30" style="font-weight: 600;font-size: 20px;"><?php echo $ch_title; ?></h2>
							<div id="parentparaph">
								<?php
								foreach ($desc as $book) {
									if ($count == 0) { $view_count = '+'; }else{ $view_count = $count;}
									$data .= "<div id='detailStyle' class='textp parap-desk'>".$book['paragraph_text']."</div>";
								}
								echo $data;
								?>
							</div>
						</div>
					</div>
					<div id="appendContent">

					</div>
				</div>
			</div>
			<hr>
			<div class="row mb-20">
				<div class="col-12">
					<div class="text-center">
						<span class="desc_outs"><?php echo $txt_desc_btn; ?></span>
					</div>
				</div>
			</div>
			<div class="row mb-50">
				<div class="col-12">
					<div class="text-center">
						<a href="<?php echo site_url(); ?>login?w=<?php echo $aid; ?>&b=<?php echo $bid.$hash_uri; ?>" class="btnlogin"><?php echo $txt_btn; ?></a>
					</div>
				</div>
			</div>
			<div class="row">
				<?php echo $this->load->view('ads/top_mid_ad'); ?>
			</div>
		</div>
		<div class="col-md-1">
			<div class="card stickymenu">
				<div class="text-center">
					<a onclick="showLoading()" href="<?php echo site_url(); ?>login?w=<?php echo $aid; ?>&b=<?php echo $bid; ?>">
						<div class="p-1">
							<img src="<?php echo base_url('') ?>public/img/assets/read-mode.svg" width="45">
							<span class="bold11px">Mode Baca</span>

						</div>
					</a>
					<div class="border1px"></div>
					<div class="pt-20 pb-20">
						<p class="mb-30">
							<a data-id="2311" href="<?php echo site_url(); ?>login?w=<?php echo $aid; ?>&b=<?php echo $bid; ?>" id="loveboo" class="fs-14px unlike">
								<img src="<?php echo base_url('') ?>public/img/assets/icon_love.svg" class="" width="40">
							</a>
						</p>
						<p><button type="button" data-toggle="modal" data-target="#commentModal" style="cursor: pointer;background: none;border: none;">
							<div class="thumbnail"><img src="<?php echo base_url('') ?>public/img/assets/icon_comment.svg" width="40"><div class="caption"><span id="commentcount">0</span></div></div>
						</button></p>
					</div>
					<div class="border1px"></div>
					<div class="pt-20 pb-20 pl-5 pr-5">
						<a href="javascript:void(0);" class="share-fb">
							<p class="mb-10" style="background-color: #3a81d5;padding: 10px 5px;border-radius: 5px;">
								<img src="<?php echo base_url('') ?>public/img/assets/icon_fb_white.svg" width="30">
							</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url('') ?>public/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('') ?>public/js/umd/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('') ?>public/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('') ?>public/js/jquery.sticky-kit.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('') ?>public/plugins/holdOn/js/HoldOn.js" type="text/javascript"></script>
</body>
</html>

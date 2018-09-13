
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<?php $this->load->view('include/meta_head', $data, FALSE); ?>

	<title><?php echo $title; ?></title>
    <meta data-n-head="true" content="yes" data-hid="mobile-web-app-capable" name="mobile-web-app-capable">
    <meta data-n-head="true" content="#7661ca" data-hid="theme-color" name="theme-color">
    <meta data-n-head="true" content="#7661ca" data-hid="msapplication-navbutton-color" name="masapplication-navbutton-color">

    <!-- CSS -->
	<link href="<?php echo base_url('') ?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url('') ?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('') ?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('') ?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
	.bgboo {
		background: #f3f5f7;
	}
	.title_out {
		font-weight: 900;
	}
	.desc_outs {
		font-weight: 600;
	}
	.pcat {
		font-size: 10pt;
	}
	.btnlogin {
		color: #fff;
		background: #7554bd;
		padding: 10px 100px;
		font-size: 15pt;
		border-radius: 35px;
		box-shadow: 0px 2px 3px #818181;
	}
	.textp > p {
		text-indent: 10%;
	}
	a {
		color: #333;
	}
	.btnlogin a:hover {
		color: #fff;
	}
</style>
<script type="text/javascript">
	var base_url = "<?php echo base_url('') ?>";
	var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
	<?php $this->load->view('include/third_party_script'); ?>
</head>
<body class="bgboo">
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
	<div class="bannerPopUp"></div>
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->

	<div data-content-category='Book &gt; <?php echo $category; ?>' data-content-ids='<?php echo $bid; ?>' data-content-name='<?php echo $bo_title; ?>' data-content-type='<?php echo $m_type; ?>' data-page-type='ViewContent' data-value='<?php echo $m_book_price; ?>' id='fbpixel'></div>

	<div class="wrapper">
		<nav class="navbar navbar-expand-lg fixed-top mb-20 bgboo">
			<div class="container">
				<form class="navbar-brande">
					<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> &nbsp; </button>

				</form>
				<!-- <label class="btn-transparant">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('') ?>/public/img/icon-tab/more_icon.svg"></label>  -->
			</div>
		</nav>
		<div class="container mt-60">
			<div class="row">
				<div class="col-12">
					<div class="text-center">
						<h1 class="title_out" style="font-size: 25px;"><?php echo $bo_title; ?></h1>
						<p class="text-muted pcat"><b><?php echo $category; ?></b> &#8226; Dibaca <?php echo $view; ?> kali</p>
                        <img class="img-fluid rounded mt-5 mb-5 w-50" src="<?php echo $cover; ?>">
					</div>
				</div>
			</div>
			<div class="row mt-20">
                <div class="col-2"></div>
                    <div class="col-8">
					<div class="media text-center">
						<img class="d-flex align-self-start ml-30 rounded-circle" src="<?php if($avatar == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $avatar; } ?>" width="40" height="40" alt="<?php echo $detail_book['data']['author']['author_name']; ?>">
						<div class="media-body">
							<span class="nametitle2 title_out" style="display: -webkit-inline-box;"><a href="#" class="author_name"><h2 class="font-weight-bold" style="font-size: 16px;"><?php echo $author; ?></h2></a></span>
							<!-- <a href="#" data-follow="<?php echo $aid; ?>" class="btn-topup follow-u float-right mt-5"
								><span class="nametitle2 txtfollow pcat">Follow</span>
							</a> -->
							<p style="margin-top: -5px;"><span class="text-muted"><small>Jakarta, Indonesia</small></span>
							</p>
						</div>
					</div>
				</div>
                <div class="col-2"></div>
			</div>
            <hr>
			<div class="row">
				<div class="col-12">
					<div class="text-center">
						<h2 class="title_out" style="font-size: 20px;"><?php echo $ch_title; ?></h2>
						<!-- <p class="text-muted pcat">Chapter</p> -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div id='detailStyle' class="detailbook text-justify">
						<?php
						foreach ($desc as $book) {
							$text = strip_tags($book['paragraph_text']);
							$data .= $book['paragraph_text'];
						}
						echo $data;
						?>
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
			<div class="row mb-70">
				<div class="col-12">
					<div class="text-center">
						<?php $cid = $this->uri->segment(6); $link = ""; if (empty($cid)) {$link = "b=".$bid; }else{$link = "b=".$bid."&c=".$cid; } ?>
						<a href="<?php echo site_url('login?w='.$aid.'&'.$link.$hash_uri); ?>" class="btnlogin"><?php echo $txt_btn; ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url('') ?>public/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('') ?>public/js/umd/popper.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('') ?>public/js/bootstrap.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			showPopUpBanner();
		});
		var isMobile = {
			Android: function() {
				return navigator.userAgent.match(/Android/i);
			},
			BlackBerry: function() {
				return navigator.userAgent.match(/BlackBerry/i);
			},
			iOS: function() {
				return navigator.userAgent.match(/iPhone|iPad|iPod/i);
			},
			Opera: function() {
				return navigator.userAgent.match(/Opera Mini/i);
			},
			Windows: function() {
				return navigator.userAgent.match(/IEMobile/i);
			},
			any: function() {
				return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
			}
		};
		<?php $cid = $this->uri->segment(6); if (empty($cid)) { $url = BASE_URL_DEEPLINK.'penulis/'.$aid.'/'.$bid; }else{ $url = BASE_URL_DEEPLINK.'penulis/'.$aid.'/'.$bid.'/preview/chapter/'.$cid;} ?>
		var link = "intent://"+"<?php echo $url; ?>"+"#Intent;scheme=https;package=id.android.baboo;S.doctype=FRA;S.docno=FRA1234;S.browser_fallback_url=market://details?id=id.android.baboo;end";
		$('.bannerPopUp').html("<div class='popUpBannerBox'> <div class='popUpBannerInner'> <div class='popUpBannerContent'> <a href='"+link+"'><span class='popUpBannerSpan'>Baca di Aplikasi</span></a><a href='#' class='closeButton'>&#120;</a> </div> </div> </div>");

		function showPopUpBanner() {
			if( isMobile.Android() ) {
				$('.popUpBannerBox').fadeIn("2000");
			}else{

			}
		}

		$('.closeButton').click(function() {
			$('.popUpBannerBox').fadeOut("2000");
			return false;
		});
	</script>
</body>
</html>

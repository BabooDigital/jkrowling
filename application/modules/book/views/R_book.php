<style>
.list-group-item.active {
	z-index: 2;
	color: #fff;
	background-color: #7661ca;
}
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
/*Right*/
.modal.right.fade .modal-dialog {
	/*right: -435px;*/
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
	min-height: 100vh;
	background: #f5f8fa;
}

.modal-header {
	border-bottom: none;
	background-color: #f5f8fa;
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
</style>
<?php 
$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
$appid = '196429547790304';
if (strpos($base, 'stg.baboo.id') !== false) {
	$appid = '1677083049033942';
} elseif (strpos($base, 'localhost/jkrowling') !== false || strpos($base, 'dev-baboo.co.id') !== false) {
	$appid = '196429547790304';
} elseif (strpos($base, 'baboo.id') !== false || strpos($base, 'www.baboo.id') !== false) {
	$appid = '2093513617332249';
}
echo "<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=".$appid."';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";
?>
<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
<div class="bannerPopUp"></div>
<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->

<input type="checkbox" id="toggle-right">	
<div class="page-wrap wrapper">
	<div id="banner">
		<nav class="navbar navbar-expand-lg fixed-top mb-20 bgboo" id="navscroll" style="height: 60px;">
			<div class="container">
				<form class="navbar-brande">
					<a class="clear-btn backfrmbook" href="javascript:void(0);"><i class="fa fa-arrow-left"></i> &nbsp;</a>
				</form>
				<label class="profile-toggle" for="toggle-right"><img src="<?php echo base_url('') ?>/public/img/icon-tab/more_icon.svg"></label>
			</div>
		</nav>
	</div>
	<div class="profiles">
		<label class="close" for="toggle-right" style="height: 45px;">&nbsp;&nbsp;&times;</label>
		<div class="text-center">
			<div class="mt-20">
				<p><img class="cover_image rounded" height="180" src="<?php echo $detail_book['data']['book_info']['cover_url']; ?>" width="130"></p>
			</div>
			<div class="mt-15">
				<h3 class="title_book" style="font-weight: bold;color: #141414;"><?php echo $detail_book['data']['book_info']['title_book']; ?></h3>
			</div>
		</div>
		<div class="mt-20">
			<p class="text-muted ml-20">Daftar Chapter</p>
			<div class="list-group mt-10 mb-50 pl-10 pr-10" id="list_Rchapter"></div>
		</div>
		<?php if ($detail_book['data']['book_info']['is_free'] == true) { ?>
		<div></div>
		<?php }else{ ?>
		<div class="bg-white" style="width: 250px;height: auto;position: fixed;bottom: 0;padding: 5px 15px;">
			<small>Versi Buku Full</small>
			<div>
				<p><img src="<?php echo site_url('public/img/assets/icon_sell.png'); ?>" width="20" class="mr-5"><span style="color: #7661ca;font-weight: 600;">Rp <span class="priceb"><?php echo $detail_book['data']['book_info']['book_price']; ?></span></span> <button type="button" class="float-right btn-transparant buyfullbook" style="margin-top: -10px;padding: 3px 30px;border-radius: 35px;background: #7661ca;color: #fff;">Beli</button></p>
			</div>
		</div>
		<?php } ?>
	</div><br>
	<br>
	<div class="container mt-30">
		<?php if (empty($this->uri->segment(3))) { ?>
		<div class="row mb-30">
			<div class="col-12">
				<div class="text-center mb-15">
					<h3 style="font-weight: 900;"><?php echo $detail_book['data']['book_info']['title_book']; ?></h3>
					<p class="text-muted pcat"><b class="cbookd"><?php echo $detail_book['data']['category']['category_name']; ?></b> &#8226; Dibaca <span class="boview"><?php echo $detail_book['data']['book_info']['view_count']; ?></span> kali</p>
				</div>
			</div>
		</div>
		<?php }else{} ?>
		<div class="row">
			<div class="col-12">
				<?php $sess = $this->session->userdata('userData'); if (empty($this->uri->segment(3))) { ?>
				<div class="media mb-20">
					<img alt="<?php echo $detail_book['data']['author']['author_name']; ?>" class="d-flex align-self-start mr-20 rounded-circle authimg" height="55" src="<?php if($detail_book['data']['author']['avatar'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $detail_book['data']['author']['avatar']; } ?>" width="55">
					<div class="media-body mt-5">
						<div style="display: flex;"><h5 class="nametitle2 mr-20"><a href="#" class="author_name"><?php echo $detail_book['data']['author']['author_name']; ?></a></h5>
							<?php if ($sess['user_id'] == $detail_book['data']['author']['author_id']) { ?>
							<div></div>
							<?php }else{ ?>
							<a data-follow="<?php echo $detail_book['data']['author']['author_id']; ?>" class="btn-topup <?php if ($detail_book['data']['author']['is_follow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow" style="font-size: 12px;"><?php if ($detail_book['data']['author']['is_follow'] == false) { echo "Ikuti"; }else{ echo "Diikuti"; } ?></span></a>
							<?php } ?>
						</div>
						<p style="margin-top: -5px;"><span class="text-muted"><small><?php echo $detail_book['data']['book_info']['publish_date']; ?></small></span>
						</p>
					</div>
				</div>
				<?php }else{

				} ?>
				<input id="iaidubi" name="iaidubi" type="hidden" value="<?php echo $detail_book['data']['book_info']['book_id']; ?>"> <input id="iaiduui" name="iaiduui" type="hidden" value="<?php $dat = $this->session->userdata('userData'); echo $dat['user_id']; ?>">
			</div>
		</div>
		<?php if ($detail_book['data']['chapter']['chapter_free'] == true) { ?>
		<div class="row">
			<div class="col-12 text-center mt-10">
				<h5 style="font-weight: 900;"><?php echo $detail_book['data']['chapter']['chapter_title']; ?></h5>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="detailbook">
					<?php
					foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
						$text = strip_tags($book['paragraph_text']);
						$count = $book['comment_count'];
						if ($count == 0) { $view_count = '+'; }else{ $view_count = $count;}
						$data .= "<div  class='mb-20 textp' id='detailStyle' data-id-p='".$book['paragraph_id']."' data-text='".$text."'>".$book['paragraph_text']."<button type='button' data-p-id='".$book['paragraph_id']."' data-toggle='modal' data-target='#myModal2' class='btncompar comment-marker on-inline-comments-modal' for='toggle-right'><span class='num-comment'>". $view_count ."</span><span  aria-hidden='true' style='font-size:28px;'><img src='".base_url('public/img/assets/icon_comment.svg')."'></span></button></div>";
					}
					echo $data;
					?>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<div class="container text-center">
			<div class="row">
				<div class="col-12">
					<h3>Versi Buku Full</h3>
					<img src="<?php echo site_url('public/img/assets/icon_sell.png'); ?>" width="40" class="mr-5"><span style="color: #7661ca;font-weight: 600;font-size: 40px;">Rp <?php echo $detail_book['data']['book_info']['book_price']; ?></span>
				</div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<button type="button" class="float-right btn-transparant buyfullbook w-100" style="margin-top: -10px;padding: 3px 30px;border-radius: 35px;background: #7661ca;color: #fff;">Beli</button>
				</div>
			</div>	
		</div>
	</div>
	<?php } ?>
	<hr class="mt-40 mb-10">
	<div class="row">
		<div class="col-12">
			<div class="commentbook mb-60">
				<p></p>
				<h4>Komentar <span style="color: #797979;">(<?php echo $detail_book['data']['book_info']['book_comment_count']; ?>)</span></h4>
				<p></p>
				<div class="media">
					<img alt="<?php $dat = $this->session->userdata('userData'); echo $dat['fullname']; ?>" class="d-flex align-self-start mr-20 rounded-circle" height="48" id="profpict" src="<?php $dat = $this->session->userdata('userData');  if($dat['prof_pict'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $dat['prof_pict']; } ?>" width="48">
					<div class="media-body mt-5">
						<div>
							<span><input class="frmcomment commentform" id="comments" placeholder="Tulis sesuatu.." style="width: 70%;height: 45px;" type="text"> <button class="Rpost-comment" type="button" style="background: none;border: none;"><img src="<?php echo base_url('public/img/assets/icon_sendcomm.png'); ?>" width="45" height="45"></button></span>
						</div>
					</div>
				</div><br>
				<br>
				<div id="Rbookcomment_list"></div>
				<div class="loader mx-auto" style="display: none;"></div>
			</div>
		</div>
	</div>
</div>
</div>
<div id="footbanner">
	<nav class="navbar navbar-expand-lg fixed-bottom baboonav" id="navscrollf" style="height:60px;">
		<div class="container-fluid">
			<div>
				<a class="<?php if($detail_book['data']['book_info']['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>" data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo"><img class="mr-5 loveicon" src="<?php if($detail_book['data']['book_info']['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" width="24"> <span id="likecount"><?php echo $detail_book['data']['book_info']['like_count']; ?></span></a>
			</div>
			<div>
				<a href="#comments"><img class="mr-5" src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="22"> <?php echo $detail_book['data']['book_info']['book_comment_count']; ?></a>
			</div>
			<div>
				<a class="share-fb" href="javascript:void(0);"><img class="mr-5" src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="23"> <span class="boshare"><?php echo $detail_book['data']['book_info']['share_count']; ?></span></a>
			</div>
			<div>
				<a href="#"><img class="mr-5" src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="35"> <?php echo $detail_book['data']['book_info']['view_count']; ?></a>
			</div>
			<div>
				<a class="<?php if($detail_book['data']['book_info']['is_bookmark'] == false){ echo 'bookmark'; }else{ echo 'unbookmark'; } ?>" data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="bookmarkboo"><img class="mr-5 bookmarkicon" src="<?php if($detail_book['data']['book_info']['is_bookmark'] == false){ echo base_url('public/img/assets/icon_bookmark.svg'); }else{ echo base_url('public/img/assets/icon_bookmark_active.svg'); } ?>" width="27"></a>
			</div>
		</div>
	</nav>
</div>
<!-- Modal -->
<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="closes" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel2"><b>Komentar Paragraf</b></h4>
			</div>

			<div class="modal-body">
				<div>
					<p style="padding: 10px 7px;background: #eceff2;"><span class="fs-14px mr-5">&#8220;</span><span class="fs-14px append_txt"> Paragraph </span><span class="fs-14px ml-5">&#8222;</span></p>
				</div>
				<br>
				<div id="Rparagraphcomment_list">

				</div>
				<nav class="navbar navbar-light bg-light fixed-bottom">
					<span class="w-100 mb-20">
						<input id="pcomments" placeholder="Tulis sesuatu.." type="text"  class="frmcomment commentform" style="width: 80%;height: 45px;">
						<button class="Rpost-comment-parap" type="button" style="background: none;border: none;"><img src="<?php echo base_url('public/img/assets/icon_sendcomm.png'); ?>" width="45" height="45"></button>
					</span>
				</nav>
			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->

	<?php $this->load->view('include/modal_checkout'); ?>

<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
<script type="text/javascript">
	$(document).ready(function() {
		showPopUpBanner();
	});

	var segment = '<?php echo $this->uri->segment(2); ?>';
	var active = '<?php echo $this->uri->segment(3); ?>';
	var count_data = '<?php echo $detailChapter; ?>';

	var banner_height = $("#navscroll, #navscrollf").height();
	var lastScrollTop = 0;
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		var currScrollTop = $(this).scrollTop();
		if (scroll >= banner_height && currScrollTop > lastScrollTop) {
			$("#banner, #footbanner").hide();
		} else {
			$("#banner, #footbanner").show();
		}
		lastScrollTop = currScrollTop;

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
	var bid = segment.split('-');
	var link = "intent://www.baboo.id/book/"+bid[0]+"#Intent;scheme=https;package=id.android.baboo;S.doctype=FRA;S.docno=FRA1234;S.browser_fallback_url=market://details?id=id.android.baboo;end";
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
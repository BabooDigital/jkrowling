<style type="text/css">

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
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11&appId=124081454991891';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<body id="pageContent">
	<input type="checkbox" id="toggle-right">	
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top mb-20" style="height:60px;background: #f5f8fa;">
			<div class="container">
				<form class="navbar-brande">
					<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> </button>
					
				</form>
				<!-- <form class="form-inline"> -->
					<label class="btn-transparant" for="toggle-right" class="profile-toggle">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('') ?>/public/img/icon-tab/more_icon.svg"></label> 
					<!-- <label for="toggle-right" class="profile-toggle"><b>+</b></label> -->
					<!-- </form> -->
					<nav class="profile">
						<label class="btn-transparant" for="toggle-right" class="close">&nbsp;&nbsp;&times;</label> 
						<div class="text-center">
							<div class="mt-20">
								<p><img class="cover_image" width="160" height="222" src="<?php echo $detail_book['data']['book_info']['cover_url']; ?>"></p>
							</div>
						</div>
						<div class="mt-20 pl-20 pr-20">
							<h3 class="title_book" style="font-weight: bold;color: #141414;"><?php echo $detail_book['data']['book_info']['title_book']; ?></h3>
						</div>
						<hr>

						<div class="mt-10">
							<!-- <div class="list-group" id="list-tab" role="tablist">
						      <a class="list-group-item list-group-item-action active" id="<?php echo $detail_book['data']['chapter']['chapter_id']; ?>" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><?php echo $detail_book['data']['chapter']['chapter_title']; ?></a>
						  </div> -->
						  <div class="list-group" id="list_Rchapter">

						  </div>
						</div>
					</nav>
				</div>
			</nav>
			<br>
			<br>
			<div class="container">
				<div class="row form_book">
					<div class="loader" style="display: none;"></div>
					<div class="input-group paddingbook mb-15">
						<h2 class="paddingparagraph"><strong><?php echo $detail_book['data']['book_info']['title_book']; ?></strong></h2>
					</div>
					<div class="media mb-20">
						<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($detail_book['data']['author']['avatar'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $detail_book['data']['author']['avatar']; } ?>" width="55" height="55" alt="<?php echo $detail_book['data']['author']['author_name']; ?>">
						<div class="media-body mt-5">
							<div style="display: flex;"><h5 class="nametitle2 mr-20"><a href="#" class="author_name"><?php echo $detail_book['data']['author']['author_name']; ?></a></h5><a data-follow="<?php echo $detail_book['data']['author']['author_id']; ?>" class="btn-topup <?php if ($detail_book['data']['author']['is_follow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow" style="font-size: 12px;"><?php if ($detail_book['data']['author']['is_follow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a></div>
							<p style="margin-top: -5px;"><span class="text-muted"><small>Jakarta, Indonesia</small></span>
							</p>
						</div>
						<input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $detail_book['data']['book_info']['book_id']; ?>">
						<input type="hidden" name="iaiduui" id="iaiduui" value="<?php $dat = $this->session->userdata('userData'); echo $dat['user_id']; ?>">

					</div>
				</div>
				<div class="detailbook">
					<?php 
					foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
						$text = strip_tags($book['paragraph_text']);
						$count = $book['comment_count'];
						if ($count == 0) { $view_count = '+'; }else{ $view_count = $count;}
						$data .= "<div class='mb-20 textp' data-id-p='".$book['paragraph_id']."' data-text='".$text."'>".$book['paragraph_text']."<button type='button' data-p-id='".$book['paragraph_id']."' data-toggle='modal' data-target='#myModal2' class='btncompar comment-marker on-inline-comments-modal' for='toggle-right'><span class='num-comment'>". $view_count ."</span><span  aria-hidden='true' style='font-size:28px;'><img src='".base_url('public/img/assets/icon_comment.svg')."'></span></button></div>";
					}
					echo $data;
					?>
				</div>
				<hr class="mt-10 mb-10">
				<div class="commentbook mb-60">
					<p><h4> Komentar <span style="color: #797979;">(<?php echo $detail_book['data']['book_info']['book_comment_count']; ?>)</span></h4></p>
					<div class="media">
						<img class="d-flex align-self-start mr-20 rounded-circle" id="profpict" src="<?php $dat = $this->session->userdata('userData'); 
						if($dat['prof_pict'] == NULL){
							echo base_url('public/img/profile/blank-photo.jpg');
						}else{
							echo $dat['prof_pict']; } ?>" width="48" height="48" alt="<?php $dat = $this->session->userdata('userData'); echo $dat['fullname']; ?>">
							<div class="media-body mt-5">
								<div>
									<span>
										<input id="comments" placeholder="Tulis sesuatu.." type="text"  class="frmcomment commentform" style="width: 70%;height: 45px;">
										<button class="btn Rpost-comment">Kirim</button>
									</span>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div id="Rbookcomment_list">

						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg fixed-bottom baboonav" style="height:60px;">
			<div class="container-fluid">
				<div><a href="javascript:void(0);" id="loveboo" class="<?php if($detail_book['data']['book_info']['is_like'] == 'false'){ echo 'like'; }else{ echo 'unlike'; } ?>" data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>"><img src="<?php if($detail_book['data']['book_info']['is_like'] == 'false'){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="mr-5 loveicon" width="24"> <span id="likecount"><?php echo $detail_book['data']['book_info']['like_count']; ?></span></a></div>
				<div><a href="#comments"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-5" width="22"> <?php echo $detail_book['data']['book_info']['book_comment_count']; ?></a></div>
				<div><a href="javascript:void(0);" class="share-fb"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" class="mr-5" width="23"> <?php echo $detail_book['data']['book_info']['share_count']; ?></a></div>
				<div><a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" class="mr-5" width="35"> <?php echo $detail_book['data']['book_info']['view_count']; ?></a></div> 
				<div><a href="javascript:void(0);" id="bookmarkboo" class="<?php if($detail_book['data']['book_info']['is_bookmark'] == 'false'){ echo 'bookmark'; }else{ echo 'unbookmark'; } ?>" data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>"><img src="<?php if($detail_book['data']['book_info']['is_bookmark'] == 'false'){ echo base_url('public/img/assets/icon_bookmark.svg'); }else{ echo base_url('public/img/assets/icon_bookmark_active.svg'); } ?>" class="mr-5 bookmarkicon" width="27"></a></div> 
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
							<button class="btn Rpost-comment-parap">Kirim</button>
						</span>
					</nav>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>
	<script type="text/javascript">
		var segment = '<?php echo $this->uri->segment(2); ?>';
		var active = '<?php echo $this->uri->segment(3); ?>';
		var count_data = '<?php echo $detailChapter; ?>';
	</script>
	<script type="<?php echo base_url('') ?>/public/plugins/froala/js/plugins/image.min.js"></script>
</body>
</html>
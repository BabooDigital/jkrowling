<?php 
echo "<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=".APPID_FB."';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";
?>

<?php $this->load->view('navbar/D_navbar'); ?>	
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-FbaqZneHUk1HWy6m"></script>

<style type="text/css">
@media only screen and (min-width: 1200px) {
	.modal.right.fade .modal-dialog {
		right: -29%;
	}
}
@media only screen and (min-width: 1300px) {
	.modal.right.fade .modal-dialog {
		right: -32%;
	}
}
@media only screen and (max-width: 1000px) {
	.modal.right.fade .modal-dialog {
		right: -25%;
	}
}

/*Right*/
.modal.right.fade .modal-dialog {
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
.comment-marker .num-comment{
	top: 5px !important;
}
</style>
<div class="container pt-100 mb-80">
	<div class="row">
		<div class="col-md-4 dtlbok">
			<?php if (!empty($detail_book)) { ?>
			<div class="card pb-20" style="background: #F5F8FA;">
				<div class="text-center pr-30 pl-30 pt-20">
					<img class="cover_image" src="<?php echo ($detail_book['data']['book_info']['cover_url'] != 'Kosong') ? ($detail_book['data']['book_info']['cover_url'] != null ? $detail_book['data']['book_info']['cover_url'] : base_url('public/img/profile/blank-photo.jpg')) : base_url('public/img/profile/blank-photo.jpg'); ?>" width="150" height="200">
					<div class="card-body">
						<input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $detail_book['data']['book_info']['book_id']; ?>">
						<h3 class="dbooktitle"><?php echo $detail_book['data']['book_info']['title_book']; ?></h3>
						
						<div class="dbooksociallist">
							<span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> <span id="viewcount"><?php echo $detail_book['data']['book_info']['view_count']; ?></span></span>
						</div>
						<div class="dbooksociallist">
							<span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> <span id="commentcount"><?php echo $detail_book['data']['book_info']['book_comment_count']; ?></span></span>
						</div>
						<div class="dbooksociallist">
							<span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="16"> <span id="likecount"><?php echo $detail_book['data']['book_info']['like_count']; ?></span></span>
						</div>
						<div class="dbooksociallist">
							<span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> <span id="sharecount"><?php echo $detail_book['data']['book_info']['share_count']; ?></span></span>
						</div>
					</div>
				</div>
				<div class="pr-20 pl-20 subchapter">
					<ul class="list-group list-group-flush">
						<li class="list-group-item" style="background: transparent;border-bottom: 1px #eeeeee;"><small>Bagian Cerita</small></li>
						<div id="loader_chapter">
							<div class="loads-css ng-scope"><div style="width:20px;height:20px" class="lds-flickr"><div></div><div></div><div></div></div></div>
						</div>
						<div id="list_chapter">
							
						</div>
					</ul>
				</div>
                <br>
                <div>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Disamping -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:250px"
                         data-ad-client="ca-pub-4994852796413443"
                         data-ad-slot="7276054409"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
			</div>
			<?php  }else {
				echo "kosong";
			} ?>
		</div>

		<div class="col-md-7" style="background: #fff;border-radius: 10px;">
			<div class="card pb-20 pt-10 pl-20 pr-20 book-content">
				<div class="card-body">
					<div class="media">
						<img class="d-flex align-self-start mr-20 rounded-circle" width="50" height="50" src="
						<?php if($detail_book['data']['author']['avatar'] == NULL){
							echo base_url('public/img/profile/blank-photo.jpg');
						}else{
							echo $detail_book['data']['author']['avatar']; } ?>" alt="<?php echo $detail_book['data']['author']['author_name']; ?>">
							<div class="media-body">
								<a data-usr-prf="<?php echo $detail_book['data']['author']['author_id']; ?>" data-usr-name="<?php echo $detail_book['data']['author']['author_name'] ?>" href="<?php echo site_url('profile/'.url_title($detail_book['data']['author']['author_name'])) ?>" class="profile"><h5 class="card-title nametitle2 profile"><?php
							echo $detail_book['data']['author']['author_name']; ?></h5></a>
								<!-- <h5 class="nametitle2 author_name"><?php echo $detail_book['data']['author']['author_name']; ?></h5> -->
								<p><small><span>Jakarta, Indonesia</span></small></p>
								<a href="#" data-follow="<?php echo $detail_book['data']['book_info']['book_id']; ?>" class="btn-no-fill dbookfollowbtn ml-20 <?php if ($detail_book['data']['author']['isFollow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow"><?php if ($detail_book['data']['author']['isFollow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a>
							</div>
						</div>
						<div id="appentoContent">
							<h2 class="dbooktitlebook"><?php echo $detail_book['data']['title_book']; ?></h2>
							<br>
							<div id="post-data">
								<?php $this->load->view('data/D_book'); ?>
							</div>
						</div>
						<div id="appendContent">
							
						</div>
					</div>
				</div>
				<center>
					<div class="loader" id="loader_scroll" style="display: none;"></div>
				</center>
			</div>
			<div class="col-md-1">
				<div class="card stickymenu" style="background: #F5F8FA;">
					<div class="text-center">
						<?php echo $detail_book['data']['title_book']; ?>
						<a onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php
						echo $detail_book['data']['book_info']['book_id']; ?>-<?php echo url_title($detail_book['data']['book_info']['title_book'], 'dash', true); ?>/read">
						<div class="p-1">
							<img src="<?php echo base_url(); ?>public/img/assets/read-mode.svg" width="45">
							<span class="bold11px">Mode Baca</span>

						</div>
					</a>
					<div class="border1px"></div>
					<div class="pt-20 pb-20">
						<p class="mb-30">
							<a data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo" class="fs-14px <?php if($detail_book['data']['book_info']['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>">
								<img src="<?php if($detail_book['data']['book_info']['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="loveicon" width="40">
							</a>
						</p>
						<p><button data-b-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" onclick="getCommentBook()" type="button" data-toggle="modal" data-target="#commentModal" style="cursor: pointer;background: none;border: none;">
							<div class="thumbnail"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="40"><div class="caption"><span id="commentcount"><?php echo $detail_book['data']['book_info']['book_comment_count']; ?></span></div></div>
						</button></p>
					</div>
					<div class="border1px"></div>
					<div class="pt-20 pb-20 pl-5 pr-5">
						<a href="javascript:void(0);" class="share-fb">
							<p class="mb-10" style="background-color: #3a81d5;padding: 10px 5px;border-radius: 5px;">
								<img src="<?php echo base_url(); ?>public/img/assets/icon_fb_white.svg" width="30">
							</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="buymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<?php $this->load->view('data/D_paybook'); ?>
</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-bottom box-shadow-navbar">
			<div class="container pt-5 pb-5">
				<div class="col-md-4">

				</div>
				<div class="col-md-7">
					<ul class="navbar-nav pull-right">
						<!-- <li class="nav-item"><span class="text-muted" id="id_page"><small>Page</small> <strong>Description</strong></span></li> -->
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo" class="fs-14px <?php if($detail_book['data']['book_info']['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>">
								<img src="<?php if($detail_book['data']['book_info']['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="loveicon" width="30">
							</a>
						</li>
						<li class="nav-item ml-20">
							<button data-b-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" onclick="getCommentBook()" type="button" data-toggle="modal" data-target="#commentModal" style="cursor: pointer;background: none;border: none;">
								<div class="thumbnail"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="25"><div class="caption fs-12px"><span id="commentcount"><?php echo $detail_book['data']['book_info']['book_comment_count']; ?></span></div></div>
							</button>
						</li>
						<li class="nav-item ml-20">
							<a href="javascript:void(0);" id="bookmarkboo" class="<?php if($detail_book['data']['book_info']['is_bookmark'] == false){ echo 'bookmark'; }else{ echo 'unbookmark'; } ?>" data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>"><img src="<?php if($detail_book['data']['book_info']['is_bookmark'] == false){ echo base_url('public/img/assets/icon_bookmark.svg'); }else{ echo base_url('public/img/assets/icon_bookmark_active.svg'); } ?>" class="mr-5 bookmarkicon" width="27"></a>
						</li>
					</ul>
				</div>
				<div class="col-md-1">

				</div>
			</div>

			<div class="progress navprogress" id="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</nav>
		<!-- Modal -->
		<div class="modal right fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-header bg-white">
						<button type="button" class="closes" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="commentLabel">Komentar</h4>
					</div>

					<div class="modal-body mb-50" style="overflow-x: auto;">
						<div>
							<div id="bookcomment_list">

							</div>
						</div>

						<nav class="navbar navbar-expand-lg navbar-light fixed-bottom box-shadow-navbar bg-white">
							<div class="container pb-10 pt-10">
								<div class="col-md-9">
									<textarea style="outline:0;" id="comments" class="commentform" placeholder="Tulis Komentar kamu..."></textarea>
								</div>
								<div class="col-md-3">
									<div>
										<button class="btn post-comment">Kirim</button>	
									</div>
								</div>
							</div>
						</nav>
					</div>

				</div><!-- modal-content -->
			</div><!-- modal-dialog -->
		</div><!-- modal -->

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
						<div id="paragraphcomment_list">

						</div>
						<nav class="navbar navbar-light bg-light fixed-bottom">
							<span class="w-100 mb-20">
								<input id="pcomments" placeholder="Tulis sesuatu.." type="text"  class="frmcomment commentform mention" style="width: 80%;height: 45px;">
								<button class="btn post-comment-parap">Kirim</button>
							</span>
						</nav>
					</div>

				</div><!-- modal-content -->
			</div><!-- modal-dialog -->
		</div><!-- modal -->
		<?php if ($this->session->flashdata('popup_status_payment')): ?>
			<div class="modal fade" id="notifpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<?php $this->load->view('data/D_notifpayment'); ?>
			</div>
		<?php endif ?>
		<script type="text/javascript">
			var segment = '<?php echo $this->uri->segment(2); ?>';
			var count_data = '<?php echo $detailChapter; ?>';
			var userdata = '<?php echo $this->session->userdata('userData')['user_id']; ?>';
			var userbook = '<?php echo $detail_book['data']['author']['author_id']; ?>';
		</script>
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
			<script src='http://podio.github.io/jquery-mentions-input/lib/jquery.events.input.js' type='text/javascript'></script>
			<script src='http://podio.github.io/jquery-mentions-input/lib/jquery.elastic.js' type='text/javascript'></script>

<!-- <script type="text/javascript">
	var page = 0;
	$(window).scroll(function() {
		if($(window).scrollTop() + $(window).height() > $(document).height() - 1000) {
			if (page < count_data) {
				page++;
				loadMoreData(page);
			}
		}
	});
	function loadMoreData(page){
		$.ajax(
		{
			url: '?chapter=' + page,
			type: "get",
			beforeSend: function()
			{
				$('#loader_scroll').show();
			}
		})
		.done(function(data)
		{
			if(data == " "){
				$('#loader_scroll').html("No more records found");
				return;
			}
			$('#loader_scroll').hide();
			$("#post-data").append(data);
		})
		.fail(function(jqXHR, ajaxOptions, thrownError)
		{
			console.log('server not responding...');
		});
	}
</script> -->
</body>
</html>
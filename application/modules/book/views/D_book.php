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
</style>
<div class="container pt-100 mb-80">
	<div class="row">
		<div class="col-md-4 dtlbok">
			<?php if (!empty($detailBook)) { ?>
			<div class="card pb-20 stickymenu">
				<div class="text-center pr-30 pl-30 pt-20">
					<img src="<?php echo $detailBook['data']['book_info']['cover_url']; ?>" width="150">
					<div class="card-body">
						<input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $detailBook['data']['book_info']['book_id']; ?>">
						<a href="#">
							<h3 class="dbooktitle"><?php echo $detailBook['data']['book_info']['title_book']; ?></h3>
						</a>
						<div class="dbooksociallist">
							<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> <span id="viewcount"><?php echo $detailBook['data']['book_info']['view_count']; ?></span></span></a>
						</div>
						<div class="dbooksociallist">
							<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> <span id="commentcount"><?php echo $detailBook['data']['book_info']['book_comment_count']; ?></span></span></a>
						</div>
						<div class="dbooksociallist">
							<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="16"> <span id="likecount"><?php echo $detailBook['data']['book_info']['like_count']; ?></span></span></a>
						</div>
						<div class="dbooksociallist">
							<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> <span id="sharecount"><?php echo $detailBook['data']['book_info']['share_count']; ?></span></span></a>
						</div>
					</div>
				</div>
				<div class="pr-20 pl-20 subchapter">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><small>Bagian Cerita</small></li>
						<center>
							<div class="loader" id="loader_chapter"></div>
						</center>
						<span id="list_chapter"></span>
					</ul>
				</div>
			</div>
			<?php  }else {
				echo "kosong";
			} ?>
		</div>

		<div class="col-md-7"">
			<div class="card pt-10 pl-20 pr-20 book-content">
				<div class="card-body">
					<div class="media">
						<img class="d-flex align-self-start mr-20 rounded-circle" width="50" height="50" src="
						<?php if($detailBook['data']['author']['avatar'] == NULL){
							echo base_url('public/img/profile/blank-photo.jpg');
						}else{
							echo $detailBook['data']['author']['avatar']; } ?>" alt="<?php echo $detailBook['data']['author']['author_name']; ?>">
							<div class="media-body">
								<h5 class="nametitle2"><?php echo $detailBook['data']['author']['author_name']; ?></h5>
								<p><small><span>Jakarta, Indonesia</span></small></p>
								<a href="#" data-follow="<?php echo $detailBook['data']['book_info']['book_id']; ?>" class="btn-no-fill dbookfollowbtn ml-20 <?php if ($detailBook['data']['author']['is_follow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow"><?php if ($detailBook['data']['author']['is_follow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a>
							</div>
						</div>
						<div id="appentoContent">
							<h2 class="dbooktitlebook"><?php echo $detailBook['data']['title_book']; ?></h2>
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
				<div class="card stickymenu">
					<div class="text-center">
						<?php echo $detailBook['data']['title_book']; ?>
						<a href="<?php echo site_url(); ?>book/<?php
								echo $detailBook['data']['book_info']['book_id']; ?>-<?php echo url_title($detailBook['data']['book_info']['title_book'], 'dash', true); ?>/read">
							<div class="p-1">
								<img src="<?php echo base_url(); ?>public/img/assets/read-mode.svg" width="45">
								<span class="bold11px">Mode Baca</span>

							</div>
						</a>
						<div class="border1px"></div>
						<div class="pt-20 pb-20">
							<p class="mb-30">
								<a data-id="<?php echo $detailBook['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo" class="fs-14px <?php if($detailBook['data']['book_info']['is_like'] == 'false'){ echo 'like'; }else{ echo 'unlike'; } ?>">
									<img src="<?php if($detailBook['data']['book_info']['is_like'] == 'false'){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="loveicon" width="40">
								</a>
							</p>
							<p><button type="button" data-toggle="modal" data-target="#commentModal" style="cursor: pointer;background: none;border: none;">
								<div class="thumbnail"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="40"><div class="caption"><span id="commentcount"><?php echo $detailBook['data']['book_info']['book_comment_count']; ?></span></div></div>
							</button></p>
						</div>
						<div class="border1px"></div>
						<div class="pt-20 pb-20 pl-5 pr-5">
							<a href="#">
								<p class="mb-10" style="background-color: #3a81d5;padding: 10px 5px;border-radius: 5px;">
									<img src="<?php echo base_url(); ?>public/img/assets/icon_fb_white.svg" width="30">
								</p>
							</a>
							<a href="#">
								<p class="mb-10" style="background-color: #55abf7;padding: 10px 5px;border-radius: 5px;">
									<img src="<?php echo base_url(); ?>public/img/assets/icon_fb_white.svg" width="30">
								</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-bottom box-shadow-navbar">
		<div class="container pt-5 pb-5">
			<div class="col-md-4">

			</div>
			<div class="col-md-7">
				<ul class="navbar-nav pull-right">
					<li class="nav-item"><span class="text-muted"><small>Page</small> <strong>01</strong></span></li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a data-id="<?php echo $detailBook['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo" class="fs-14px <?php if($detailBook['data']['book_info']['is_like'] == 'false'){ echo 'like'; }else{ echo 'unlike'; } ?>">
									<img src="<?php if($detailBook['data']['book_info']['is_like'] == 'false'){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="loveicon" width="30">
								</a>
					</li>
					<li class="nav-item ml-20">
						<button type="button" data-toggle="modal" data-target="#commentModal" style="cursor: pointer;background: none;border: none;">
								<div class="thumbnail"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="25"><div class="caption fs-12px"><span id="commentcount"><?php echo $detailBook['data']['book_info']['book_comment_count']; ?></span></div></div>
							</button>
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
								<textarea id="comments" class="commentform" placeholder="Tulis Komentar kamu..."></textarea>
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
	<script type="text/javascript">
		var segment = '<?php echo $this->uri->segment(2); ?>';
		var count_data = '<?php echo $detailChapter; ?>';
	</script>
	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>

	<script type="text/javascript">
		var page = 0;
		$(window).scroll(function() {
			if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
				if (page <= count_data) {
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
	</script>
</body>
</html>
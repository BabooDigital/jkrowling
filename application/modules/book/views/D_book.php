<div class="container pt-100 mb-80">
	<div class="row">
		<div class="col-md-4 dtlbok">
			<?php if (!empty($detailBook)) { ?>
			<div class="card pb-20 stickymenu">
				<div class="text-center pr-30 pl-30 pt-20">
					<img src="<?php echo $detailBook['data']['cover_url']; ?>" width="150">
					<div class="card-body">
						<a href="#">
							<h3 class="dbooktitle"><?php echo $detailBook['data']['title_book']; ?></h3>
						</a>
						<div class="dbooksociallist">
							<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> <?php echo $detailBook['data']['view_count']; ?></span></a>
						</div>
						<div class="dbooksociallist">
							<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> <?php echo $detailBook['data']['book_comment_count']; ?></span></a>
						</div>
						<div class="dbooksociallist">
							<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="16"> <?php echo $detailBook['data']['like_count']; ?></span></a>
						</div>
						<div class="dbooksociallist">
							<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> <?php echo $detailBook['data']['share_count']; ?></span></a>
						</div>
					</div>
				</div>
				<div class="pr-20 pl-20 subchapter">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><small>Bagian Cerita</small></li>
						<?php foreach ($detailBook['data']['chapters'] as $listChapt) { ?>
						<!-- <a href="<?php echo site_url(); ?>book/<?php echo $this->uri->segment('2'); ?>/ch/<?php
							echo $listChapt['chapter_id']; ?>" id="<?php echo $listChapt['chapter_id'] ?>"><?php echo $listChapt['chapter_title'] ?></a> -->

						<li class="list-group-item"><a href="#" class="id_chapter" id="<?php echo $listChapt['chapter_id'] ?>" b_id="<?php echo $this->uri->segment('2'); ?>" ><?php echo $listChapt['chapter_title'] ?></a></li>
						<?php } ?>
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
								<a href="#" class="btn-no-fill dbookfollowbtn"><span class="nametitle2">Follow</span></a>
							</div>
						</div>
						<div id="appentoContent">
							<h2 class="dbooktitlebook"><?php echo $detailBook['data']['title_book']; ?></h2>
							<br>
							<?php $this->load->view('data/D_book'); ?>
						</div>
						<div id="appendContent">
							
						</div>
					</div>
				</div>
				<center>
					<div class="loader" style="display: none;"></div>
				</center>
			</div>
			<div class="col-md-1">
				<div class="card stickymenu">
					<div class="text-center">
						<a href="#" data-toggle="modal" data-target="#detail_book">
							<div class="p-1">
								<img src="<?php echo base_url(); ?>public/img/assets/read-mode.svg" width="45">
								<span class="bold11px">Mode Baca</span>
							</div>
						</a>
						<div class="border1px"></div>
						<div class="pt-20 pb-20">
							<p class="mb-30"><a href="#">
								<img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="40">
							</a></p>
							<p><a href="#">
								<img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="37">
							</a></p>
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
						<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="30"></a>
					</li>
					<li class="nav-item ml-20">
						<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="25"></a>
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
	
	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>

	<script type="text/javascript">
	var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
	        page++;
	        loadMoreData(page);
	    }
	});

	function loadMoreData(page){
	  $.ajax(
	        {
	            url: '?chapter=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.loader').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data == " "){
	                $('.loader').html("No more records found");
	                return;
	            }
	            $('.loader').hide();
	            $("#post-data").append(data);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
	</script>
	<!-- <script>
	$(window).scroll(function(){
	    if ($(window).scrollTop() == $(document).height() - $(window).height()){
	        $('.loader').show();

	        var post_id = $('.Posted:last').attr('id');
	        $.post("add_more_posts.php", {post_id: post_id} , function(data){
	            if(data){
	                $('#loading-img').fadeOut();
	                $('#AddPosts').append(data);
	            }else{
	                // $('#AddPosts').append('Finished Loading!');
	            }
	        });
	    }
	});
	</script> -->
</body>
</html>
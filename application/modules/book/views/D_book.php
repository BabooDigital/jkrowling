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
						<li class="list-group-item"><a href="#" id="<?php echo $listChapt['chapter_id'] ?>"><?php echo $listChapt['chapter_title'] ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php  }else {
				echo "kosong";
			} ?>
		</div>

		<div class="col-md-7">
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
						<div>
							<h2 class="dbooktitlebook"><?php echo $detailBook['data']['title_book']; ?></h2>
							<br>
							<?php 
							foreach ($detail_book['data']['content'] as $book) {
								$data .= $book['paragraph_text'];
							}
							echo $data;
							?>
						</div>
					</div>
				</div>
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
	<div class="modal fade" id="detail_book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true" style="font-size: 20pt;color: #fff;">&times;</span>
			</button>
			<div class="card p-30" style="border-radius: 0;background-color: #f5f8fa !important;">
				<div class="card-body">
					<div class="media">
						<img class="d-flex align-self-start mr-20 rounded-circle" width="50" src="<?php echo base_url(); ?>public/img/profile/pp_anak2.png" alt="Generic placeholder image">
						<div class="media-body">
							<h5 class="nametitle2">Marina Saraswati</h5>
							<p><small><span>Jakarta, Indonesia</span></small></p>
							<a href="#" class="btn-no-fill dbookfollowbtn"><span class="nametitle2">Follow</span></a>
						</div>
					</div>
					<div>
						<h2 class="dbooktitlebook"><?php echo $detailBook['data']['title_book']; ?></h2>
						<br>
						<?php 
						$data = "";
						foreach ($detail_book['data']['content'] as $book) {
							$data .= $book['paragraph_text'];
						}
						echo $data;
						?>
					</div>
					<hr>
					<div>
						<p class="modallimitbook">Kamu baru saja selesai membaca  batas gratis buku ini, untuk membaca bab lainnya silahkan beli buku ini lalu lanjutkan membaca.</p>
					</div>
					<hr>
					<div class="media">
						<img class="mr-3" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="150" alt="Book Cover">
						<div class="media-body mt-10">
							<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>book">Story Of Drama</a></h5>

							<div class="mt-20 mb-50">
								<div class="col-md-10">
									<div class="dbooksociallistmodal">
										<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> 290</span></a>
									</div>
									<div class="dbooksociallistmodal">
										<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> 45</span></a>
									</div>
									<div class="dbooksociallistmodal">
										<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="16"> 290</span></a>
									</div>
									<div class="dbooksociallistmodal">
										<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> 8</span></a>
									</div>
									<div class="dbooksociallistmodal">
										<a href="#"><span class=".fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_have.svg" width="20"> 8</span></a>
									</div>
								</div>
							</div>

							<div><h3><strong>Rp 45.000</strong></h3></div>

							<div class="mt-40">
								<a href="#" class="btnbeliskrg"><span class="txtbtnbeliskrg">Beli Sekarang</span></a>
							</div>
						</div>
					</div>

					<div class="mt-10">
						<div class="bg-white p-10">
							<p>Nilai Produk</p>
							<hr>
							<div class="row">
								<div class="col-md-3">
									<div class="border border-top-0 border-left-0 border-bottom-0">
										<h1 style="font-size: 5.5rem;"><strong>4.4</strong></h1>
									</div>
								</div>
								<div class="col-md-9">
									<div class="row" style="position: relative;right: 25px;">
										<div class="col-md-5">
											<div class="rating">
												<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="progress ratingprogress">
												<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-md-1">
											<span style="position: relative;top: -7px;"><b>5</b></span>
										</div>
									</div>
									<div class="row" style="position: relative;right: 25px;">
										<div class="col-md-5">
											<div class="rating">
												<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="progress ratingprogress" id="progress">
												<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-md-1">
											<span style="position: relative;top: -7px;"><b>5</b></span>
										</div>
									</div>
									<div class="row" style="position: relative;right: 25px;">
										<div class="col-md-5">
											<div class="rating">
												<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="progress ratingprogress">
												<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-md-1">
											<span style="position: relative;top: -7px;"><b>5</b></span>
										</div>
									</div>
									<div class="row" style="position: relative;right: 25px;">
										<div class="col-md-5">
											<div class="rating">
												<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="progress ratingprogress">
												<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-md-1">
											<span style="position: relative;top: -7px;"><b>5</b></span>
										</div>
									</div>
									<div class="row" style="position: relative;right: 25px;">
										<div class="col-md-5">
											<div class="rating">
												<span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
											</div>
										</div>
										<div class="col-md-6">
											<div class="progress ratingprogress">
												<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
										<div class="col-md-1">
											<span style="position: relative;top: -7px;"><b>5</b></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-bottom box-shadow-navbar">
			<div class="container pt-5 pb-5">
				<div class="col-md-1">

				</div>
				<div class="col-md-10">
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

			<div class="progress navprogress">
				<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</nav>
	</div>
	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>
</body>
</html>
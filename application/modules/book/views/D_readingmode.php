<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<title><?php echo $judul; ?></title><?php if (isset($css)): ?><?php echo get_css($css) ?><?php endif ?>
</head>
<body>
	<div class="container-fluid mb-40">
		<div class="row">
			<div class="col-md-2 bg-dark"></div>
			<div class="col-md-8 bg-white">
				<div id="readingModeContent">
					<div class="card p-30" style="border-radius: 0;border: none;">
						<div class="card-body">
							<div class="media">
								<img alt="Generic placeholder image" class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_anak2.png" width="50">
								<div class="media-body">
									<h5 class="nametitle2">Marina Saraswati</h5>
									<p><small><span>Jakarta, Indonesia</span></small></p><a class="btn-no-fill dbookfollowbtn" href="#"><span class="nametitle2">Follow</span></a>
								</div>
							</div>
							<div id="post-data">
								<!-- <?php 
									$this->load->view('data/D_readingmode', $detail_book); ?> -->
								<h2 class="dbooktitlebook"><?php echo $detailBook['data']['title_book']; ?></h2><br>
								<?php 
								$data = "";
								foreach ($detail_book['data']['content'] as $book) {
									$data .= $book['paragraph_text'];
								}
								echo $data;
								?>
							</div>
							<!-- <div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div> -->
							<hr>
							<div>
								<p class="modallimitbook">Kamu baru saja selesai membaca batas gratis buku ini, untuk membaca bab lainnya silahkan beli buku ini lalu lanjutkan membaca.</p>
							</div>
							<hr>
							<div class="media">
								<img alt="Book Cover" class="mr-3" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="150">
								<div class="media-body mt-10">
									<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>book">Story Of Drama</a></h5>
									<div class="mt-20 mb-50">
										<div class="col-md-10">
											<div class="dbooksociallistmodal">
												<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> 290</span></a>
											</div>
											<div class="dbooksociallistmodal">
												<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> 45</span></a>
											</div>
											<div class="dbooksociallistmodal">
												<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="16"> 290</span></a>
											</div>
											<div class="dbooksociallistmodal">
												<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> 8</span></a>
											</div>
											<div class="dbooksociallistmodal">
												<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_have.svg" width="20"> 8</span></a>
											</div>
										</div>
									</div>
									<div>
										<h3><strong>Rp 45.000</strong></h3>
									</div>
									<div class="mt-40">
										<a class="btnbeliskrg" href="#"><span class="txtbtnbeliskrg">Beli Sekarang</span></a>
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
														<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar" role="progressbar" style="width: 25%;"></div>
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
														<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress-bar" role="progressbar"></div>
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
														<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar" role="progressbar" style="width: 25%;"></div>
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
														<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar" role="progressbar" style="width: 25%;"></div>
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
														<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar" role="progressbar" style="width: 25%;"></div>
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
					<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-bottom box-shadow-navbar">
						<div class="container-fluid pt-5 pb-5">
							<div class="col-md-2"></div>
							<div class="col-md-8">
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
							<div class="col-md-2"></div>
						</div>
						<div class="progress navprogress">
							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar" role="progressbar" style="width: 25%;"></div>
						</div>
					</nav><?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
				</div>
			</div>
			<div class="col-md-2 bg-dark">
				<div style="position: fixed;">
					<a href="javascript:void(0);" class="backbtn" style="font-size: 14pt;color: #fff;">&#88;</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
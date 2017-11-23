<div class="mt-60 hidden-sm hidden-xs">
	<div class="slideboo">
		<div class="leftboo"></div>
		<div class="slidecontrols">
			<span id="slider-prev"></span> <span id="slider-next" style="padding-left: 40%;"></span>
		</div>
		<!-- SLIDE BABOO -->
		<div style="width: 100%;height: auto;position: relative;">
			<?php $this->load->view('include/slide'); ?>
		</div>
		<!-- END SLIDE BABOO -->
	</div>

	<!-- CONTENT BABOO -->
	<div class="container babooid">
		<div class="row">
			<div class="col-md-3 outleft">
				<div class="stickymenu">
					<!-- Penulis Minggu Ini -->
					<div class="card mb-15" style="background-color: transparent;border: none;">
						<div class="card-header" style="border: none;">
							Penulis minggu ini
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush" id="author_this_week"></ul>
						</div>
					</div>
					<!-- Penulis Minggu Ini -->
					
					<!-- Buku Populer -->
					<div class="card mb-15" style="background-color: transparent;border: none;">
						<div class="card-header" style="border: none;">
							Buku Populer
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush">	
								<li class="list-group-item" style="background-color: transparent;border: none;">
									<div class="media">
										<div class="media-left mr-10">
											<a href="#"><img class="media-object" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="60"></a>
										</div>
										<div class="media-body">
											<div>
												<h4 class="media-heading bold mt-10 mb-10"><a href="#">Big Magic: Creative Living Beyon Fear</a></h4>
												<p style="font-size: 10pt;">by <a href="#">Aditia Nugraha</a></p>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- Buku Populer -->

				</div>
			</div>
			<div class="col-md-9">
				<div class="row mt-10 mb-10">
					<div class="col-md-3">
						<span class="bukupilihan">Buku Pilihan</span>
					</div>
					<div class="col-md-9">
						<ul class="catul">
							<li class="catli">
								<a class="btnfilter" data-filter="all" href="javascript:;">Semua Buku</a>
							</li>
							<li class="catli">
								<a class="btnfilter" data-filter="fiksi" href="javascript:;">Fiksi</a>
							</li>
							<li class="catli">
								<a class="btnfilter" data-filter="komik" href="javascript:;">Komik</a>
							</li>
							<li class="catli">
								<a class="btnfilter" data-filter="nonfiksi" href="javascript:;">Non Fiksi</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 all fiksi" style="margin-right: -15px;">
						<div class="card mb-15" style="padding: 0 10px;">
							<div class="card-body p-0 p-20">
								<div class="row mb-30">
									<div class="media">
										<img alt="Generic placeholder image" class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_anak2.png" width="60">
										<div class="media-body mt-5">
											<h5 class="card-title nametitle2">Marina Saraswati</h5>
											<p><small><span>Jakarta, Indonesia</span> <span class="ml-10">1 hours ago</span></small></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="media">
										<img alt="Profile" class="d-flex align-self-start mr-10" src="<?php echo base_url(); ?>public/img/book-cover/book_cover1.png" width="130">
										<div class="media-body">
											<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>login">Story Of Drama</a></h5>
											<p class="catbook mb-10"><a class="mr-20" href="#"><span class="btn-no-fill">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 290</span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> 12</span></p>
											<p class="text-desc-out">Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang seolah-olah kau ingin mengatakan pada dunia bahwa kamu sangat... <a class="readmore" href="#">Lanjut</a></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
								<div class="pull-right">
									<a href="#"><img class="mr-10" src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="18"> Bagikan</a>
								</div>
								<div>
									<a class="mr-30" href="#"><img class="mr-10" src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="27"> Suka</a> <a href="#"><img class="mr-10" src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="25"> Komentar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</div>
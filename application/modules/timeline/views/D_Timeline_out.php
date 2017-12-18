<div class="mt-50 hidden-sm hidden-xs">
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
				<div class="row" id="post-data">
					<?php 
						$this->load->view('data/D_timeline_out', $home);
					?>
				</div>
				<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			</div>
		</div>
	</div>
	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</div>
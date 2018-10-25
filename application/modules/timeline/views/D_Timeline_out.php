	<?php $this->load->view('navbar/D_navbar'); ?>

<div class="mt-50 hidden-sm hidden-xs">
	<div class="slideboo">
		<div class="leftboo"></div>
		<div class="slidecontrols">
			<span id="slider-prev"></span> <span id="slider-next" style="padding-left: 40%;"></span>
		</div>
		<div style="width: 100%;height: auto;position: relative;">
			<?php if (isset($slide) && $slide['code'] == 200) {
				$this->load->view('include/slide');
			}else{
				echo "<div></div>";
			}  ?>
		</div>
	</div>

	<div class="container babooid mb-60">
		<div class="row">
			<div class="col-md-3 outleft">
				<div class="stickymenu">

					<?php if (isset($writter) && $writter['code'] == 200) { ?>
						<div class="card mb-15" style="background-color: transparent;border: none;">
							<div class="card-header" style="border: none;">
								Penulis minggu ini
							</div>
							<div class="card-body p-0">
								<ul class="list-group list-group-flush" id="author_this_week">
									<?php foreach ($writter['data'] as $wr) {
									    $urlToUser = url_title($wr['author_name'], 'dash', TRUE).'-'.$wr['author_id'];;
									    ?>
									<li class="media baboocontent">
										<a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>">
											<img alt="<?php echo $wr['author_name']; ?>" class="d-flex mr-3 rounded-circle" src="<?php echo $wr['avatar']; ?>" width="50" height="50">
										</a>
										<div class="media-body mt-7">
											<a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>">
												<h5 class="mt-0 mb-1 nametitle"><?php if(strlen($wr['author_name']) > 25){ $str =  substr($wr['author_name'], 0, 23).'...'; echo $str; }else { echo $wr['author_name']; }  ?>
												</h5>
												<small>Penulis</small>
											</a>
											<div class="pull-right baboocolor">
												<a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"></a>
												<a href="<?php echo site_url('login'); ?>" class="addbutton">
													<img src="<?php echo base_url('public/img/assets/icon_plus_purple.svg'); ?>" width="20" class="mt-img">
												</a>
											</div>
										</div>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
				<?php }else{ ?>
					<div></div>
				<?php }  ?>

                    <ul class="list-group list-group-flush">
                    	<?php echo $this->load->view('ads/250_side_ad'); ?>
                    </ul>

					<!-- Buku Populer -->
					<!-- <div class="card mb-15" style="background-color: transparent;border: none;">
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
					</div> -->
					<!-- Buku Populer -->

				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-12 text-center mx-auto">
					<?php echo $this->load->view('ads/top_mid_ad'); ?>
					</div>
				</div>
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
						$this->load->view('data/D_Timeline_out', $home);
					?>
				</div>
				<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			</div>
		</div>
	</div>

    <?php $this->load->view('footer/D_footer'); ?>

	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</div>

</body>
</html>


<body id="pageContent">
	<div class="lds-css ng-scope" style="display: none;"><div style="width:100%;height:100%" class="lds-eclipse"><img src="<?php echo base_url('public/img/splash_.png'); ?>" width="90" class="img-loading"><div></div><div></div><div></div><div></div><div></div></div></div>
	<?php $this->load->view('navbar/R_navbar'); ?>	
	<div id="floating-btn">
		<a href="<?php echo site_url(); ?>create_mybook" class="floating-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></a>
	</div>
	<br>
	<br>
	<br>
	<br>
	<div class="container bodymessage" >
		<div class="paddingbook search_message">
			<div class="">
				<br>
				<a href="<?php echo site_url('') ?>">
					<div class="statuspembelian">
						<div class="textpembelian">
							<span class="">Pembelian</span>
							<span class="" style="float: right;">Pembelian</span>
						</div>
						<br>
						<div class="textpembelian">
							<span class="" style="font-size: 20px;font-weight: bold;">Dont Make Me think</span>
							<span class="" style="float: right;">More</span>
							<br>
							<span class="fontkecil">Menunggu proses pembayaran</span>
						</div>
					</div>
				</a>
				<div class="loader mx-auto mt-10" style="display: none;"></div>
			</div>
		</div>
		<br>
	</div>
	<div class="container babooid" align="center">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div id="myWorkContent">
						<div id="insideDivTerakhirDilihat">
							<div class="terakhir_dilihat">
								<a class="terakhir_dilihat_label">Terakhir Dilihat</a>
								<a class="terakhir_dilihat_button"><b>Lihat Semua</b></a>
								<div class="terakhir_dilihat_enter mt-20"></div>
								<div class="terakhir_dilihat_sub1a">
									<img src="https://spark.adobe.com/images/landing/examples/how-to-book-cover.jpg" class="terakhir_dilihat_img">
									<div class="terakhir_dilihat_sub2">
										<div id="title_book">
											<b class="font_title_terakhir_dilihat">The Kite Runner ...</b>
										</div>
										<div id="author_book">
											<p class="terakhir_dilihat_by">By : Idealcom</p>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="babooid" style="overflow-y: hidden;overflow-x: hidden;">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<main class="main-md">
						<input class="input-md" id="tab1" type="radio" name="tabs" checked>
						<label class="label-md" for="tab1">Bookmark</label>
						<input class="input-md" id="tab2" type="radio" name="tabs">
						<label class="label-md" for="tab2">Koleksi Buku</label>
						<input class="input-md" id="tab3" type="radio" name="tabs">

						<section class="section-md" id="content1">

						</section>
						<section class="section-md" id="content2">
							<p>
								<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
									<div class="list-group">
										<a href="#" class="list-group-item-library">
											<div style="float: left;">
												<div style="float:left;width:40%;height: auto;">

													<img src="https://spark.adobe.com/images/landing/examples/how-to-book-cover.jpg" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5); height:40%;width: 100%;margin-left: -5px;">
												</div>
												<div style="float: left;width:60%;height: auto;">
													<div style="padding: 10px;">
														<b style="font-size: 16px;">Kite Runner - Powerfull Hunting</b>
														<div style="padding-top: 10px;"></div><span style="font-size:12px;border: 1px #7554bd solid;border-radius: 25px;padding: 3px 10px;color: #7554bd;">FIKSI</span>
														<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 290</span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> 12</span></p>
														<div style="padding-top: 10px;"></div>
														<div class="media">
															<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
															<div class="media-body mt-5">
																<h5 class="card-title nametitle2">Saraswati</h5>
																<p class="text-muted" style="margin-top:-10px;"><small><span>Jakarta, Indonesia</span>
																</div>
															</div>
															<div style="padding-top: 10px;"></div>
															<div id="bintang">
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star checked"></span>
																<span class="fa fa-star"></span>
																<span class="fa fa-star"></span>
															</div>
														</div>
													</div>
												</div>

											</a>
										</div>
									</div>
								</div>
							</p>
						</section>
					</main>
				</div>
			</div>
		</div>
		<!-- JS -->
		<script type="text/javascript">
			var user = '<?php echo $this->session->userdata('userData')['user_id']; ?>';
		</script>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
	</body>
	</html>
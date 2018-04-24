<body id="pageContent">
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
	<div class="bannerPopUp"></div>
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
	<div class="lds-css ng-scope" style="display: none;"><div style="width:100%;height:100%" class="lds-eclipse"><img src="<?php echo base_url('public/img/splash_.png'); ?>" width="90" class="img-loading"><div></div><div></div><div></div><div></div><div></div></div></div>
	<?php $this->load->view('navbar/R_navbar'); ?>	
	<div id="floating-btn">
		<a class="floating-btn" href="<?php echo site_url(); ?>create_mybook"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></a>
	</div>
	<div class="container pr-5 pl-5">
		<?php if (!empty($transaction['data'])){
			$end = end($transaction['data']);
		 ?>
			<div class="paddingbook m-0 mt-130">
				<a data-toggle="modal" href="#list_trans" style="outline: none;">
					<div style="position: relative;text-align: center; color: white;">
						<img class="img-fluid" src="<?php echo base_url('public/img/bg_pending.png'); ?>">
						<div class="lefttop-inf">
							<div class="text-left">
								<span class="text-white fs18px">Pembelian <span class="badge badge-pill badge-light"><?php echo count($transaction['data']); ?></span></span>
							</div>
						</div>
						<div class="leftbot-inf">
							<div class="text-left">
								<p class="text-white"><span class="pendbook-lib"><?php echo $end['title_book']; ?></span><span class="text-light d-block pendtext-lib">Menunggu Proses Pembayaran . . .</span></p>
							</div>
						</div><span class="badge" style="position: absolute; right: 5%; bottom: 40%;">More <i class="fa fa-chevron-right"></i></span>
					</div></a>
				</div>
			<?php }else{ echo "<div class='paddingbook m-0 mt-100'></div>"; } ?>
		</div>
		<div align="center" class="container babooid">
			<div class="row p-10">
				<p class="mt-10 mb-30 w-100"><span class="terakhir_dilihat_label">Terakhir Dibaca</span> <span class="float-right alllast" style="display: none;"><a href="<?php echo site_url('library/all_lastread'); ?>">Lihat Semua</a></span></p>
				<div class="mb-10" id="myWorkContent" style="margin-top: -10px;">
					<div id="insideDiv"></div>
				</div>
				<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			</div>
		</div>
		<div class="container babooid pb-70" style="overflow-y: hidden;overflow-x: hidden;background: #fcfcff;">
			<div class="row p-20">
				<h4><b>Koleksi Buku</b></h4>
			</div>
			<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			<div class="row" id="collectionList"></div>
			<div class="row allcoll" style="display: none;">
				<div class="col-12">
					<button class="btn-all" type="button">Lihat Semua Koleksi</button>
				</div>
			</div>
			<div class="row p-20 mt-30">
				<h4><b>Bookmark Buku</b></h4>
			</div>
			<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			<div class="row" id="bookmarkList"></div>
			<div class="row allmark" style="display: none;">
				<div class="col-12">
					<button class="btn-all" type="button">Lihat Semua Bookmark</button>
				</div>
			</div>
		</div>

		<?php if (!empty($transaction)): ?>
			<?php $this->load->view('include/modal_listtrans'); ?>
		<?php endif ?>

		<!-- JS -->
		<script type="text/javascript">
			var iaiduui = '<?php echo $this->session->userdata('userData')['user_id']; ?>';
		</script>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
	</body>
	</html>
<body id="pageContent">
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
	<div class="bannerPopUp"></div>
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
	<div class="lds-css ng-scope" style="display: none;"><div style="width:100%;height:100%" class="lds-eclipse"><img src="<?php echo base_url('public/img/splash_.png'); ?>" width="90" class="img-loading"><div></div><div></div><div></div><div></div><div></div></div></div>
	<?php $this->load->view('navbar/R_navbar'); ?>	
	<div id="floating-btn">
		<a href="<?php echo site_url(); ?>create_mybook" class="floating-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></a>
	</div>
	<!-- <div class="container bodymessage" >
		<div class="paddingbook search_message">
			<div class="">
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
	</div> -->
	<div class="container babooid" align="center">
		<div class="row p-10">
			<p class="mt-120 mb-30 w-100"><span class="terakhir_dilihat_label">Terakhir Dibaca</span> <span class="float-right alllast" style="display: none;"><a href="<?php echo site_url('library/all_lastread'); ?>">Lihat Semua</a></span></p>
			<div id="myWorkContent" class="mb-10" style="margin-top: -10px;">
				<div id="insideDiv"> 
				</div>
			</div>
			<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div
				>
			</div>
		</div>
		<div class="container babooid pb-70" style="overflow-y: hidden;overflow-x: hidden;background: #fcfcff;">
			<div class="row p-20">
				<h4><b>Koleksi Buku</b></h4>
			</div>
			<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			<div class="row" id="collectionList">

			</div>
			<div class="row allcoll" style="display: none;">
				<div class="col-12">
					<button type="button" class="btn-all">Lihat Semua Koleksi</button>
				</div>
			</div>

			<div class="row p-20 mt-30">
				<h4><b>Bookmark Buku</b></h4>
			</div>
			<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			<div class="row" id="bookmarkList">

			</div>
			<div class="row allmark" style="display: none;">
				<div class="col-12">
					<button type="button" class="btn-all">Lihat Semua Bookmark</button>
				</div>
			</div>
		</div>
		<!-- JS -->
		<script type="text/javascript">
			var iaiduui = '<?php echo $this->session->userdata('userData')['user_id']; ?>';
		</script>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
	</body>
	</html>
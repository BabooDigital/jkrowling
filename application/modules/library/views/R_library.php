
<body id="pageContent">
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
			<p class="mt-120 mb-30"><span class="terakhir_dilihat_label">Terakhir Dibaca</span></p>
			<!-- <span class="terakhir_dilihat_button"><b>Lihat Semua</b></span> -->
			<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			<div id="myWorkContent" class="mb-10" style="margin-top: -10px;">
				<div id="insideDiv"> 
				</div>
			</div>
			<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div
		</div>
	</div>
	<div class="container babooid bg-white pb-70" style="overflow-y: hidden;overflow-x: hidden;">
		<div class="row p-20">
			<h4><b>Bookmark Buku</b></h4>
		</div>
		<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
		<div class="row" id="bookmarkList">

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
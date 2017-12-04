
<body id="pageContent">

	<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
		<?php $this->load->view('navbar/R_navbar'); ?>	
	</nav>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div>	
		<div class="container bodymessage">
			<div class="paddingbook search_message">
				<div class="">
					<div class="balance">
						<span class="text-muted"><img src="<?php echo base_url() ?>/public/img/icon-tab/save.svg">Balance</span>
						<span class="topup"><button class="btn-topup" type="submit">Top up</button></span>
					</div>
					<span class="title_book_form"><h4><b>Rp 15.000.000</b></h4></span>
					<div class="textdoku">
						<span class="text-muted">Powered By Doku</span>
						<span class="text-muted lihathistory"><b>Lihat History >></b></span>
					</div>
					<br>
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
					<div class="loader" style="display: none;"></div>
				</div>
			</div>
			<br>
			<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
				<div class="list-group">
					<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
						<div class="media">
								<h5 class="card-title nametitle2">Pengaturan Akun</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
						<div class="list-group">
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
								<div class="media">
								<h5 class="card-title nametitle2">Pengaturan Aplikasi</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
						<div class="list-group">
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
								<div class="media">
								<h5 class="card-title nametitle2">Bantuan</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
						<div class="list-group">
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
								<div class="media">
								<h5 class="card-title nametitle2">Keluar</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>

			<!-- JS -->

			<?php if (isset($js)): ?>
				<?php echo get_js($js) ?>
			<?php endif ?>
		</body>
		</html>
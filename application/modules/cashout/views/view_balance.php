<body>
	<nav class="navbar bg-greyboo">
		<a class="navbar-brand backcheck" href="javascript:void(0);"><i class="fa fa-arrow-left text-dark"></i></a>
		<a href="#"><img src="<?php echo base_url('') ?>public/img/icon-tab/group_15.svg" width="23"></a>
	</nav>
	<div class="container mb-30">
		<div class="row bg-greyboo">
			<div class="col-12 mt-10">
				<img src="<?php echo base_url('public/img/bg_wallet.png'); ?>" class="img-fluid">
				<div class="centered-inf">
					<div class="text-center"><img src="<?php echo base_url('public/img/assets/icon_wallet_white.png'); ?>" width="23" class="mr-5 mb-5"> <span class="text-white fs18px">Saldo</span></div>
					<p class="text-white fs30pxfw600">Rp <span id="">90.000</span></p>
				</div>
				<div class="botrigth-inf">
					<span class="text-white fs-12px">Powered by Veritrans</span>
				</div>
			</div>
		</div>
		<div class="row mt-30">
			<div class="col-12">
				<div class="mx-auto text-center">
					<button class="btn-cashout" onclick="location.href=base_url+'cashout/first';"><img src="<?php echo base_url('public/img/assets/icon_cashout_wallet.png'); ?>" width="27" class="img-fluid mr-10"> <span class="fs17pxfw600">Tarik Dana</span></button>
				</div>
			</div>
		</div>
		<div class="row mt-30">
			<div class="col-12">
				<div class="mx-auto text-center">
					<a href="#" class="statPro">Status Penarikan Dana ( <span>1</span> )</a>
				</div>
			</div>
		</div>
		<div class="row mt-30">
			<div class="col-12">
				<p>Sejarah Transaksi</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<ul class="list-group">
					<li class="list-group-item border-top-0 border-left-0 border-right-0">
						<div class="row">
							<div class="col-7">
								<div class="media">
									<img src="<?php echo base_url('public/img/assets/icon_sell.png'); ?>" class="img-fluid mt-15 mr-10" width="30" alt="Icon Penjualan">
									<div class="media-body">
										<span class="mt-0 d-block"><small>Penjualan</small></span>
										Kite Runner
									</div>
								</div>
							</div>
							<div class="col-5">
								<div class="float-right">
									<span class="mt-0 d-block text-right"><small>2 Nov 2017</small></span>
								<span class="txt-selling">Rp 45.000</span>
								</div>
							</div>
						</div>					
					</li>
					<li class="list-group-item border-top-0 border-left-0 border-right-0">
						<div class="row">
							<div class="col-7">
								<div class="media">
									<img src="<?php echo base_url('public/img/assets/icon_buying.png'); ?>" class="img-fluid mt-15 mr-10" width="30" alt="Icon Pembelian">
									<div class="media-body">
										<span class="mt-0 d-block"><small>Pembelian</small></span>
										Story of Diana
									</div>
								</div>
							</div>
							<div class="col-5">
								<div class="float-right">
									<span class="mt-0 d-block text-right"><small>1 Nov 2017</small></span>
								<span class="txt-buying">- Rp 45.000</span>
								</div>
							</div>
						</div>					
					</li>
					<li class="list-group-item border-top-0 border-left-0 border-right-0">
						<div class="row">
							<div class="col-7">
								<div class="media">
									<img src="<?php echo base_url('public/img/assets/icon_cashout_wallet.png'); ?>" class="img-fluid mt-15 mr-10" width="26" alt="Icon Pembelian">
									<div class="media-body">
										<span class="mt-0 d-block"><small>Penarikan Dana</small></span>
										BCA - 921909119
									</div>
								</div>
							</div>
							<div class="col-5">
								<div class="float-right">
									<span class="mt-0 d-block text-right"><small>1 Nov 2017</small></span>
								<span class="txt-cashout">- Rp 2.000.000</span>
								</div>
							</div>
						</div>					
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script>
		$('.backcheck').click(function () {
			window.location = base_url+'profile';
		});
	</script>
</body>
</html>
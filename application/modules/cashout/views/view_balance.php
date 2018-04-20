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
					<p class="text-white fs30pxfw600">Rp <span id=""><?php echo number_format($balance , 0, ',', '.'); ?></span></p>
				</div>
				<div class="botrigth-inf">
					<span class="text-white fs-12px">Powered by Veritrans</span>
				</div>
			</div>
		</div>
		<div class="row mt-30">
			<div class="col-12">
				<div class="mx-auto text-center">
				<?php if (empty($pay_pending)) { ?>
					<button class="btn-cashout" onclick="location.href=base_url+'cashout/first';"><img src="<?php echo base_url('public/img/assets/icon_cashout_wallet.png'); ?>" width="27" class="img-fluid mr-10"> <span class="fs17pxfw600">Tarik Dana</span></button>
				<?php }else{ ?>
				<button class="btn-cashout disabled" disabled="disabled" style="background: #e2e2e2;    color: #989898;"><img src="<?php echo base_url('public/img/assets/icon_cashout_wallet.png'); ?>" width="27" class="img-fluid mr-10"> <span class="fs17pxfw600">Tarik Dana</span></button>
				<?php } ?>
				</div>
			</div>
		</div>
		<?php if (!empty($pay_pending)) { ?>
		<div class="row mt-30">
			<div class="col-12">
				<div class="mx-auto text-center">
					<?php foreach ($pay_pending as $pay) { ?>
					<a href="<?php echo site_url('cashout/stat/'.$pay['reference_number']); ?>" class="statPro">Status Penarikan Dana ( <span>1</span> )</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<?php } ?>
		<div class="row mt-30">
			<div class="col-12">
				<p>Sejarah Transaksi</p>
			</div>
		</div>
		<?php if (!empty($history)) { ?>
		<div class="row">
			<div class="col-12">
				<ul class="list-group">
					<?php foreach ($history as $his) { ?>

					<li class="list-group-item border-top-0 border-left-0 border-right-0 type-sell">
						<div class="row">
							<div class="col-7">
								<div class="media">
									<?php if ($his['payment_type'] == 'penarikan') {
										echo "<img src='".base_url('public/img/assets/icon_cashout_wallet.png')."' class='img-fluid mt-15 mr-10' width='26' alt='Icon Penarikan'>";
									}else if ($his['payment_type'] == 'penjualan') {
										echo "<img src='".base_url('public/img/assets/icon_sell.png')."' class='img-fluid mt-15 mr-10' width='30' alt='Icon Penjualan'>";
									}else if ($his['payment_type'] == 'pembelian') {
										echo "<img src='".base_url('public/img/assets/icon_buying.png')."' class='img-fluid mt-15 mr-10' width='30' alt='Icon Pembelian'>";
									} ?>
									<div class="media-body">
										<span class="mt-0 d-block"><small><?php if ($his['payment_type'] == 'penarikan') {
											echo ucfirst($his['payment_type']);
										}else if ($his['payment_type'] == 'penjualan') {
											echo ucfirst($his['payment_type']);
										}else if ($his['payment_type'] == 'pembelian') {
											echo ucfirst($his['payment_type']);
										} ?></small></span>
										<?php echo $his['transaction_title']; ?>
									</div>
								</div>
							</div>
							<div class="col-5">
								<div class="float-right">
									<span class="mt-0 d-block text-right"><small><?php echo $his['transaction_time']; ?></small></span>
									<span class="txt-selling">Rp 45.000</span>
								</div>
							</div>
						</div>					
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php }else{ ?>
		<div class="row mt-20">
			<div class="col-12">
				<div class="text-center text-muted">
					Belum ada transaksi apapun...
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>
	<script>
		$('.backcheck').click(function () {
			window.location = base_url+'profile';
		});
	</script>
	<?php $this->session->flashdata('fail_alert'); ?>
</body>
</html>
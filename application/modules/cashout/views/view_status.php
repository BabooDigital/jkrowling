<style>
.btn-done-rek {
	background: #7661ca;
	color: #fff;
	font-size: 19px;
	border: none;
	border-radius: 35px;
	width: 50%;
	padding: 10px 0;
}
</style>
<body class="bg-greyboo">
	<nav class="navbar bg-greyboo">
		<a class="navbar-brand backcheck" href="javascript:void(0);"><i class="fa fa-arrow-left text-dark asdsa"></i></a>
	</nav>
	<div class="container mb-30">
		<div class="row">
			<div class="col-12">
				<h1 class="parent-title">Status Penarikan Dana</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<th style="border:none;"></th>
							<th style="border:none;"></th>
						</tr>
					</thead>
					<tbody>
						<tr style="font-weight: 600;color:#000;">
							<td style="border:none;">
								<div class="pt-5 pb-5">Jumlah Penarikan <span class="float-right">:</span></div>
								<div class="pt-5 pb-5">Bank <span class="float-right">:</span></div>
								<div class="pt-5 pb-5">Nama Akun <span class="float-right">:</span></div>
								<div class="pt-5 pb-5">No. Rekening <span class="float-right">:</span></div>
								<div class="pt-5 pb-5">Status <span class="float-right">:</span></div>
							</td>
							<td style="border:none;">
								<div class="pt-5 pb-5"><span style="color: #f5f8fa;">-</span><?php echo 'Rp. '.number_format($pend[0]['amount'], 0, ',', '.'); ?></div>
								<div class="pt-5 pb-5"><span style="color: #f5f8fa;">-</span><?php echo $pend[0]['bank_name']; ?></div>
								<div class="pt-5 pb-5"><span style="color: #f5f8fa;">-</span><?php echo $pend[0]['account_name']; ?></div>
								<div class="pt-5 pb-5"><span style="color: #f5f8fa;">-</span><?php echo $pend[0]['account_number']; ?></div>
								<div class="pt-5 pb-5" style="font-weight: bold"><span style="color: #f5f8fa;">-</span><?php echo $pend[0]['payment_type']; ?></div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="text-center mt-40">
					<button type="button" class="btn-done-rek">OK</button>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar bg-greyboo fixed-bottom">
		<a class="text-dark fs18px" href="#">Butuh Bantuan?</a>
		<a class="text-dark fs18px" style="font-weight: 600;" href="#">Hubungi Kami</a>
	</nav>
	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>
	<script>
		$('.backcheck, .btn-done-rek').click(function () {
			window.location = base_url+'dompet';
		});
	</script>
</body>
</html>
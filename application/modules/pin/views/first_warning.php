<body class="color-layer">
	<nav class="navbar color-layer">
		<a class="navbar-brand backcheck" href="javascript:void(0);"><i class="fa fa-arrow-left text-white"></i></a>
	</nav>
	<div class="container h-100">
		<div class="text-center layer-center">
			<div class="row">
				<div class="col-12">
					<img src="<?php echo base_url('public/img/assets/icon_padlock_pin.png'); ?>" width="50" class="img-fluid">
				</div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<span class="text-head text-white">Keamanan Jual Beli</span>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-12">
					<p class="text-white text-p">Sebelum menjual buku, Anda harus mengisi beberapa data untuk keamanan proses jual beli di baboo.</p>
				</div>
			</div>
			<div class="row mt-10">
				<div class="col-12">
					<span class="text-white text-foot">Proses ini tidak akan lama, Kami janji.</span>
				</div>
			</div>
			<div class="row mt-10">
				<div class="col-12">
					<button class="btn-ok">OK</button>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function () {
			$(document).on('click',".btn-ok", function() {
				window.location = base_url+'pin_dompet/second';
			});
			$('.backcheck').click(function () {
				window.history.back();
			});
		});
	</script>
</body>
</html>
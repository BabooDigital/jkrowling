	<style>
	.btn-done-rek {
		background: #7661ca;
		color: #fff;
		font-size: 19px;
		border: none;
		border-radius: 35px;
		width: 50%;
		padding: 5px 0;
		box-shadow: 0px 2px 4px 0px #333;
	}
</style>
<body>

	<div class="container h-100">
		<div class="text-center layer-center">
			<div class="row">
				<div class="col-12">
					<img src="<?php echo base_url('public/img/assets/icon_done_check.png'); ?>" width="70" class="img-fluid">
				</div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<span class="text-head "><b>Sukses</b></span>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-12">
					<p class=" text-p">Permintaan penarikan dana telah kami terima,
						Pencairan dana akan dilaksanakan maksimal 
					2 x 24 jam semenjak permintaan diajukan.</p>
				</div>
			</div>
			<div class="row mt-10">
				<div class="col-12">
					<button type="button" class="btn-done-rek">OK</button>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.btn-done-rek').click(function () {
				window.location = base_url+'dompet';
			});
		});  
	</script>
</body>
</html>
<style>
.list-group-item-action {
	color: #000;
}
.btn-outline-secondary {
	background-color: #7661ca;
	color: #fff;
}
.btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
	background-color: #dcdcdc;
}
.btnNextd {
	border-top-left-radius: 0;
	border-bottom-left-radius: 0;

}
.txtInpRek {
	border-top-right-radius: 0;
	border-bottom-right-radius: 0;
}
</style>
<body>
	<nav class="navbar navbar-light">
		<a class="navbar-brand backcheck" href="javascript:void(0);"><i class="fa fa-arrow-left text-dark"></i></a>
	</nav>
	<div class="container mb-30">
		<div class="row">
			<div class="col-12">
				<h3 style="font-weight: 800;">Tarik Dana</h3>
			</div>
		</div>
		<div class="row mt-20">
			<div class="col-12">
				<label for="noRekInput">Transfer Ke</label>
				<div class="input-group">
					<input type="number" class="form-control fs17pxfw600 txtInpRek" placeholder="Nomor Rekening Penerima" aria-label="Nomor Rekening Penerima" aria-describedby="basic-addon2" id="noRekInput">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary btnNextd" type="button" onclick="location.href=base_url+'cashout/second';" disabled>LANJUT</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-20">
			<div class="col-12">
				<span>Riwayat Tarik Dana</span>
				<div class="list-group">
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start border-top-0 border-left-0 border-right-0">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Sweta Kartika</h5>
							<!-- <span class="badge text-dark">></span> -->
						</div>
						<p class="mb-1"><span>999812172128</span> - <span>Bank Central Asia</span></p>
					</a>
				</div>
				<div class="list-group">
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start border-top-0 border-left-0 border-right-0">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Sweta Kartika</h5>
							<!-- <span class="badge text-dark">></span> -->
						</div>
						<p class="mb-1"><span>999812172128</span> - <span>Bank Mandiri</span></p>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.backcheck').click(function () {
				window.history.back();
			});
			$('#noRekInput').keyup(function(){
				if ($('#noRekInput').val() > 0) {
					$('.btnNextd').prop('disabled', false);
				}else{
					$('.btnNextd').prop('disabled', true);
				}    
			});
		});
	</script>
</body>
</html>
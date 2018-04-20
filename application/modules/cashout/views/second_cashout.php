<style>
body {
	color: #000;
}
.btn-done-rek {
	background: #7661ca;
	color: #fff;
	font-size: 19px;
	border: none;
	border-radius: 35px;
	width: 100%;
	padding: 10px 0;
	box-shadow: 0px 2px 4px 0px #333;
}
.form-control {
	height: 50px !important;
}
</style>
<body>
	<nav class="navbar navbar-light">
		<a class="navbar-brand backcheck" href="javascript:void(0);"><i class="fa fa-arrow-left text-dark"></i></a>
	</nav>
	<div class="container mb-30">
		<form id="formBankData">
			<div class="row">
				<div class="col-12">
					<h3 style="font-weight: 800;">Tarik Dana</h3>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-12">
					<div class="form-group">
						<label for="inpNoRek">Nomor Rekening</label>
						<input type="number" class="form-control fs17pxfw600" id="inpNoRek" name="inpNoRek" placeholder="">
					</div>
					<div class="form-group">
						<label for="inpNamaBank">Nama Bank</label>
						<select class="form-control fs17pxfw600" id="inpNamaBank" name="inpNamaBank">
							<option value="">Pilih Bank</option>
							<?php if (!empty($bank)) {
									foreach ($bank as $b) { ?>
									<option value="<?php echo $b['bank_code']; ?>"><?php echo $b['bank_name']; ?></option>
									<?php } }else { ?>
									<option>Data gagal diterima</option>
									<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="inpNamaRek">Nama Penerima</label>
						<input type="text" class="form-control fs17pxfw600" id="inpNamaRek" name="inpNamaRek" placeholder="	">
					</div>
				</div>
			</div>
			<div class="row mt-50">
				<div class="col-12">
					<div class="text-center">
						<button type="submit" class="btn-done-rek">Benar</button>
					</div>
				</div>
			</div>
		</form>
	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url();?>public/js/custom/cashout_auth.js"></script>
	<script>
		$(document).ready(function () {
			getRek();
			validationFormBank();
		});
	</script>
</body>
</html>
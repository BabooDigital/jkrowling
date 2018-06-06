<body class="color-layer">
	<nav class="navbar color-layer">
		<a class="navbar-brand backcheck" href="javascript:void(0);" style="margin-right: -17px !important;"><i class="fa fa-arrow-left text-white"></i></a>
		<span class="mx-auto title-nav">Keamanan Jual Beli</span>
	</nav>
	<div class="container mb-30">
		<div class="text-center">
			<div class="row mt-20">
				<div class="col-12">
					<span class="text-white text-head-1">Tentukan Pertanyaan Keamanan</span>
				</div>
			</div>
			<div class="row mt-30">
				<div class="col-1"></div>
				<div class="col-10">
					<span class="text-white text-p">Pertanyaan keamanan digunakan pada saat anda lupa PIN</span>
				</div>
				<div class="col-1"></div>
			</div>
		</div>
		<form id="questionForm">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
			<div class="row mt-20">
				<div class="col-12">
					<div class="form-group">
						<label for="firstQuestion" class="text-white">Pertanyaan 1</label>
						<select class="form-control pin-form-text text-white item_id required" name="firstQuestions" id="firstQuestion" required>
							<option value="">Pilih pertanyaan mu..</option>
							<?php if (!empty($listQ)) {
									foreach ($listQ as $dat) { ?>
							<option value="<?php echo $dat['question_id'] ?>"><?php echo $dat['question_text'] ?></option>
									<?php } }else {echo "kosong";} ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="firstAnswer" class="text-white">Jawaban</label>
						<input type="text" name="firstAnswer" class="form-control text-white pin-form-text" id="firstAnswer" required>
					</div>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-12">
					<div class="form-group">
						<label for="secondQuestion" class="text-white">Pertanyaan 2</label>
						<select class="form-control pin-form-text text-white item_id required" name="secondQuestions" id="secondQuestion" required>
							<option value="">Pilih pertanyaan mu..</option>
							<?php if (!empty($listQ)) {
									foreach ($listQ as $dat) { ?>
							<option value="<?php echo $dat['question_id'] ?>"><?php echo $dat['question_text'] ?></option>
									<?php } }else {echo "kosong";} ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="secondAnswer" class="text-white">Jawaban</label>
						<input type="text" name="secondAnswer" class="form-control text-white pin-form-text" id="secondAnswer" required>
					</div>
				</div>
			</div>
			<div class="text-center">
				<div class="row mt-20">
					<div class="col-1"></div>
					<div class="col-10">
						<button type="submit" class="btn-ok btn-okq w-100">OK</button>
					</div>
					<div class="col-1"></div>
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
	<script src="<?php echo base_url();?>public/js/custom/pin_auth.js"></script>
	<script>
		$(document).ready(function () {
			disableSelectOpt();
			validateFormQuestion();
		});

</script>
</body>
</html>
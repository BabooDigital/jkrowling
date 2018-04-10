<body class="color-layer">
	<nav class="navbar color-layer">
		<a class="navbar-brand backcheck" href="javascript:void(0);" style="margin-right: -17px !important;"><i class="fa fa-arrow-left text-white"></i></a>
		<span class="mx-auto title-nav">Keamanan Jual Beli</span>
	</nav>
	<div class="container mb-30">
		<div class="text-center">
			<div class="row mt-20">
				<div class="col-12">
					<span class="text-white text-head-1">Konfirmasi Akun</span>
				</div>
			</div>
		</div>
		<form id="activationForm">
			<div class="row mt-20">
				<div class="col-12">
					<div class="form-group">
						<label for="nameImportant" class="text-white">Nama Sesuai KTP</label>
						<input type="text" name="nameKTP" class="form-control text-white pin-form-text" id="nameImportant" required>
					</div>
					<div class="form-group">
						<label for="numbImportant" class="text-white">Nomor KTP</label>
						<input type="number" name="numbKTP" class="form-control text-white pin-form-text" id="numbImportant" required>
					</div>
					<div class="form-group">
						<label for="fileImportant" class="text-white">Upload KTP</label>
						<label class="fileContainer" for="fileImportant">
							<span class="txtFile">Pilih File</span> <img src="<?php echo base_url('public/img/assets/icon_upload_photo.png'); ?>" class="float-right" width="30">
							<input type="file" name="fileKTP" class="form-control text-white pin-form-file" id="fileImportant" required>
						</label>
					</div>
					<div class="form-group">
						<label for="hpImportant" class="text-white">Nomor HP</label>
						<input type="number" name="numbHP" class="form-control text-white pin-form-text" id="hpImportant" placeholder="( Contoh : +6289123456789 )" maxlength="15" required>
					</div>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-1"></div>
				<div class="col-10">
					<img src="<?php echo base_url('public/img/assets/icon_check_shield.png'); ?>" width="25" class="float-left mr-10">
					<p class="text-white text-w-last">Kami jamin data anda aman dan tidak akan disalahgunakan</p>
				</div>
				<div class="col-1"></div>
			</div>
			<div class="text-center">
				<div class="row mt-20">
					<div class="col-1"></div>
					<div class="col-10">
						<button type="submit" class="btn-ok btn-nexts w-100">Lanjut</button>
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
	<script>
		$(document).ready(function() {
			$('.backcheck').click(function () {
				window.history.back();
			});
			$('#fileImportant').change(function () {
				var a = $('#fileImportant').val().toString().split('\\');
				$('.txtFile').text(a[a.length -1]);
			});
			$("#activationForm").validate({
				ignore: [],
				rules: {
					nameKTP: {
						required: true
					},
					numbKTP: {
						required: true,
						number: true,
						minlength: 15
					},
					fileKTP: {
						required: true,
						extension: "jpg|png|jpeg|gif"
					},
					numbHP: {
						required: true,
						number: true,
						minlength: 10
					}
				},
				messages: {
					nameKTP: {
						required: 'Nama lengkap harus di isi.'
					},
					numbKTP: {
						required: 'Email sangat diperlukan.',
						number   : 'Nomor KTP harus valid',
						minlength: 'Nomor KTP Kurang dari 16 Digit'
					},
					fileKTP: {
						required: 'Foto KTP sangat diperlukan.',
						extension: 'File foto harus berformat .jpg / .png untuk diterima.'
					},
					numbHP: {
						required: 'Nomor Handphone sangat diperlukan.',
						number : 'Nomor Handphone Harus Valid',
						minlength: 'Nomor Handphone tidak valid'
					}
				},
				submitHandler: function(form) {
					window.location = base_url+'pin_dompet/third';
				}
			});
		});
	</script>
</body>
</html>
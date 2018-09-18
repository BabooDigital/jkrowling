<body class="color-layer">
	<nav class="navbar color-layer">
		<a class="navbar-brand backcheck" href="javascript:void(0);" style="margin-right: -17px !important;"><i class="fa fa-arrow-left text-white asdsa"></i></a>
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
						<input type="number" onKeyPress="if(this.value.length==16) return false;" name="numbKTP" class="form-control text-white pin-form-text" id="numbImportant" required>
					</div>
					<div class="form-group">
						<label for="fileImportant" class="text-white">Upload KTP</label>
						<label class="fileContainer" for="fileImportant">
							<span class="txtFile">Pilih File</span> <img src="<?php echo base_url('public/img/assets/icon_upload_photo.png'); ?>" class="float-right" width="30">
							<input type="file" name="fileKTP" class="form-control text-white pin-form-file" id="fileImportant" accept="image/*" required>
						</label>
					</div>
					<div class="form-group">
						<label for="hpImportant" class="text-white">Nomor HP</label>
						<input type="number" name="numbHP" onKeyPress="if(this.value.length==15) return false;" class="form-control text-white pin-form-text" id="hpImportant" placeholder="( Contoh : 6289123456789 )" maxlength="15" required>
					</div>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-1"></div>
				<div class="col-10">
					<img src="<?php echo base_url('public/img/assets/icon_check_shield.png'); ?>" width="25" class="float-left mr-10">
					<p class="text-white text-w-last">Kami jamin data anda aman dan tidak akan disalah gunakan</p>
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
	<script src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="<?php echo base_url();?>public/js/custom/pin_auth.js"></script>
	<?php echo $this->session->flashdata('fail_alert');?>
	<script>
		$(document).ready(function() {
			validateFormActivation();
		});
	</script>
</body>
</html>

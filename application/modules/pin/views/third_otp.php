
<style>
.timer, .timer-done, .timer-loop {
	font-size: 13px;
	color: #fff;
    position: absolute;
    left: 30%;
}
.jst-hours {
	float: left;
	display: none;
}
.jst-minutes {
	float: left;
}
.jst-seconds {
	float: left;
}
.jst-timeout {
	color: #fff;
	font-weight: bold;
}
.disabled>small{
	color: #d2d2d2 !important;
	font-weight: bold;
	font-size: 12px !important;
}
</style>
<body class="color-layer">
	<nav class="navbar color-layer">
		<a class="navbar-brand backcheck" href="javascript:void(0);" style="margin-right: -17px !important;"><i class="fa fa-arrow-left text-white"></i></a>
		<span class="mx-auto title-nav">Keamanan Jual Beli</span>
	</nav>
	<div class="container mb-30">
		<div class="text-center">
			<div class="row mt-20">
				<div class="col-12">
					<span class="text-white text-head-1">Masukan Kode OTP</span>
				</div>
			</div>
			<div class="row mt-30">
				<div class="col-1"></div>
				<div class="col-10">
					<span class="text-white text-p">Masukkan Kode Verifikasi yang dikirim ke <b class="phoneNum"><?php echo $this->session->userdata('hasPhone'); ?></b></span>
				</div>
				<div class="col-1"></div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<a href="<?php echo site_url('pin-dompet/second'); ?>" class="text-white text-p"><small><u>No. HP salah?</u></small></a>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-2"></div>
				<div class="col-8">
					<div class="row">
						<form id="formOTP" style="display: flex;">
							<div class="col-3 pr-5 pl-5">
								<input name="firstdigit" class="form-control digit text-center first" type="number" required id="firstdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="0">
							</div>
							<div class="col-3 pr-5 pl-5">
								<input name="secondtdigit" class="form-control digit text-center" type="number" required id="secondtdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="1">
							</div>
							<div class="col-3 pr-5 pl-5">
								<input name="thirddigit" class="form-control digit text-center" type="number" required id="thirddigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1"  tabindex="2" >
							</div>
							<div class="col-3 pr-5 pl-5">
								<input name="fourthdigit" class="form-control digit text-center" type="number" required id="fourthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="3">
							</div>
						</form>
					</div>
				</div>
				<div class="col-2"></div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<div class="text-white text-p text-center"><div class='timer' data-minutes-left=5></div><button class="btn-transparant ml-20 btn-senda disabled" disabled><small style="color:#fff;font-size: 15px;">Kirim Ulang</small></button></div>
				</div>
			</div>
		</div>

	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url();?>public/plugins/simple_timer/jquery.simple.timer.js"></script>
	<script src="<?php echo base_url();?>public/js/custom/pin_auth.js"></script>
	<script>
		$(document).ready(function() {
			$("#firstdigit").focus();
			resendOTP();
			keyupOTP();

		});
	</script>
</body>
</html>
<body class="color-layer">
	<nav class="navbar color-layer">
		<a class="navbar-brand backcheck" href="javascript:void(0);" style="margin-right: -17px !important;"><i class="fa fa-arrow-left text-white"></i></a>
		<span class="mx-auto title-nav">Lupa PIN</span>
	</nav>
	<div class="container mb-30">
		<div class="text-center">
			<div class="row mt-20">
				<div class="col-12">
					<span class="text-white text-head-1">Buat PIN Baru</span>
				</div>
			</div>
			<div class="row mt-30">
				<div class="col-1"></div>
				<div class="col-10">
					<span class="text-white text-p">Buat 6-Digit PIN untuk mengakses hasil penjualanmu</span>
				</div>
				<div class="col-1"></div>
			</div>
			<div class="row mt-50">
				<div class="col-1"></div>
				<div class="col-10">
					<div class="row">
						<form id="formPin" style="display: flex;">
							<div class="col-2 pr-5 pl-5">
								<input name="firstdigit" class="form-control text-center pininput" type="number" required id="firstdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="0">
							</div>
							<div class="col-2 pr-5 pl-5">
								<input name="secondtdigit" class="form-control text-center pininput" type="number" required id="secondtdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="1">
							</div>
							<div class="col-2 pr-5 pl-5">
								<input name="thirddigit" class="form-control text-center pininput" type="number" required id="thirddigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1"  tabindex="2">
							</div>
							<div class="col-2 pr-5 pl-5">
								<input name="fourthdigit" class="form-control text-center pininput" type="number" required id="fourthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="3">
							</div>
							<div class="col-2 pr-5 pl-5">
								<input name="fifthdigit" class="form-control text-center pininput" type="number" required id="fifthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="4">
							</div>
							<div class="col-2 pr-5 pl-5">
								<input name="sixthdigit" class="form-control text-center pininput" type="number" required id="sixthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="5">
							</div>
						</form>
					</div>
				</div>
				<div class="col-1"></div>
			</div>
		</div>

	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url();?>public/js/custom/pin_auth.js"></script>
	<script>
		$(document).ready(function () {
			$("#firstdigit").focus();
			keyupPINs();
		});
	</script>
</body>
</html>
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
					<span class="text-white text-p">Masukkan Kode Verifikasi yang dikirim ke <b>0859-4599-2394</b></span>
				</div>
				<div class="col-1"></div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<a href="#" class="text-white text-p"><small><u>No. HP salah?</u></small></a>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-2"></div>
				<div class="col-8">
					<div class="row">
						<form id="formOTP" style="display: flex;">
							<div class="col-3 pr-5 pl-5">
								<input name="firstdigit" class="form-control digit text-center first" type="number" onchange="checkAndSubmit()" required id="firstdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="0">
							</div>
							<div class="col-3 pr-5 pl-5">
								<input name="secondtdigit" class="form-control digit text-center" type="number" onchange="checkAndSubmit()" required id="secondtdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="1">
							</div>
							<div class="col-3 pr-5 pl-5">
								<input name="thirddigit" class="form-control digit text-center" type="number" onchange="checkAndSubmit()" required id="thirddigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1"  tabindex="2" >
							</div>
							<div class="col-3 pr-5 pl-5">
								<input name="fourthdigit" class="form-control digit text-center" type="number" onchange="checkAndSubmit()" required id="fourthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="3">
							</div>
						</form>
					</div>
				</div>
				<div class="col-2"></div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<p class="text-white text-p"><small>05:00</small> <a href="#" class="text-white ml-20"><small>Kirim Ulang</small></a></p>
				</div>
			</div>
		</div>

	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.backcheck').click(function () {
				window.history.back();
			});
			$("#firstdigit").focus();

			$(":input[type='number']").keyup(function(event){
				if ($(this).next('[type="number"]').length > 0){
					$(this).next('[type="number"]')[0].focus();
				}else{
					if ($(this).parent().next().find('[type="number"]').length > 0){
						$(this).parent().next().find('[type="number"]')[0].focus();
					}
				}
			});
		});

		function checkAndSubmit()
		{
			var a = $( "#firstdigit" );
			var b = $( "#secondtdigit" );
			var c = $( "#thirddigit" );
			var d = $( "#fourthdigit" );
			if (a.val().length > 0 && b.val().length > 0 && c.val().length > 0 && d.val().length > 0)
			{
			    // $('#formOTP').submit();
			    window.location = base_url+'pin_dompet/fourth';
			}
		}
	</script>
</body>
</html>
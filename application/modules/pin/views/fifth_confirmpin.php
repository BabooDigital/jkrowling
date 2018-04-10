<body class="color-layer">
	<nav class="navbar color-layer">
		<!-- <a class="navbar-brand" href="#" style="margin-right: -17px !important;"><i class="fa fa-arrow-left text-white"></i></a> -->
		<span class="mx-auto title-nav">Keamanan Jual Beli</span>
	</nav>
	<div class="container mb-30">
		<div class="text-center">
			<div class="row mt-20">
				<div class="col-12">
					<span class="text-white text-head-1">Konfirmasi PIN</span>
				</div>
			</div>
			<div class="row mt-30">
				<div class="col-1"></div>
				<div class="col-10">
					<span class="text-white text-p">Ketik ulang PIN yang sudah kamu buat</span>
				</div>
				<div class="col-1"></div>
			</div>
			<div class="row mt-80">
				<div class="col-1"></div>
				<div class="col-10">
					<div class="row">
						<div class="col-2 pr-5 pl-5">
							<input name="firstdigit" class="form-control text-center pininput" type="number" onchange="checkAndSubmit()" required id="firstdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="0">
						</div>
						<div class="col-2 pr-5 pl-5">
							<input name="secondtdigit" class="form-control text-center pininput" type="number" onchange="checkAndSubmit()" required id="secondtdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="1">
						</div>
						<div class="col-2 pr-5 pl-5">
							<input name="thirddigit" class="form-control text-center pininput" type="number" onchange="checkAndSubmit()" required id="thirddigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1"  tabindex="2" >
						</div>
						<div class="col-2 pr-5 pl-5">
							<input name="fourthdigit" class="form-control text-center pininput" type="number" onchange="checkAndSubmit()" required id="fourthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="3">
						</div>
						<div class="col-2 pr-5 pl-5">
							<input name="fifthdigit" class="form-control text-center pininput" type="number" onchange="checkAndSubmit()" required id="fifthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="4">
						</div>
						<div class="col-2 pr-5 pl-5">
							<input name="sixthdigit" class="form-control text-center pininput" type="number" onchange="checkAndSubmit()" required id="sixthdigit" size="1" minlength="1" onKeyPress="if(this.value.length==1) return false;" maxlength="1" tabindex="5">
						</div>
					</div>
				</div>
				<div class="col-1"></div>
			</div>
		</div>

	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function () {
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
			var e = $( "#fifthdigit" );
			var f = $( "#sixthdigit" );
			if (a.val().length > 0 && b.val().length > 0 && c.val().length > 0 && d.val().length > 0 && e.val().length > 0 && f.val().length > 0)
			{
			    // $('#formPin').submit();
			    window.location = base_url+'pin_dompet/sixth';
			}
		}
	</script>
</body>
</html>
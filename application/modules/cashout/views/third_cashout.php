<style>
.list-group-item-action {
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
.input-group-prepend {
	margin-right: -1px;
}
.input-group-append, .input-group-prepend {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
}
.input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle), .input-group>.input-group-append:last-child>.input-group-text:not(:last-child), .input-group>.input-group-append:not(:last-child)>.btn, .input-group>.input-group-append:not(:last-child)>.input-group-text, .input-group>.input-group-prepend>.btn, .input-group>.input-group-prepend>.input-group-text {
	border-top-right-radius: 0;
	border-bottom-right-radius: 0;
}
.input-group-text {
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-align: center;
	-ms-flex-align: center;
	align-items: center;
	padding: .375rem .75rem;
	margin-bottom: 0;
	font-size: 1rem;
	font-weight: 400;
	line-height: 1.5;
	color: #495057;
	text-align: center;
	white-space: nowrap;
	background-color: #e9ecef;
	border: 1px solid #ced4da;
	border-radius: .25rem;
}
.form-control {
	height: 50px;
}
#inpJumSal-error {
	position: absolute;
	top: 55px;
}
</style>
<body>
	<nav class="navbar navbar-light">
		<a class="navbar-brand backcheck" href="javascript:void(0);"><i class="fa fa-arrow-left text-dark"></i></a>
	</nav>
	<div class="container mb-30">
		<form id="formDataCashOut">
			<div class="row">
				<div class="col-12">
					<h3 style="font-weight: 800;">Tarik Dana</h3>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-12">
					<div class="form-group">
						<label for="inpNoRek">Transfer Ke</label>
						<div class="list-group">
							<a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start tfRek" data-toggle="modal" data-target="#selectNoRek">
								<div class="d-flex w-100 justify-content-between">
									<h5 class="mb-1" id="namaRek">Sweta Kartika</h5>
									<!-- <span class="badge text-dark">></span> -->
								</div>
								<p class="mb-0"><span id="nomRek">999812172128</span> - <span id="namaBank">Bank Central Asia</span></p>
							</a>
						</div>
					</div>
					<div class="row mt-40">
						<div class="col-12">
							<div style="background:  #f7f5fa;padding: 15px 0 1px 0;border: 1px #ededed solid;">
								<div style="
								text-align:  center;
								">
								<span style="
								font-weight:  600;
								">Dana yang tersedia</span>
								<p><span style="
								font-size: 27px;
								font-weight: 900;
								">Rp 900.000</span></p>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group mt-30">
					<label for="inpJumSal">Jumlah yang ingin ditarik</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">Rp</div>
						</div>
						<input type="number" class="form-control fs17pxfw600" id="inpJumSal" name="inpJumSal" placeholder="250000">
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-40">
			<div class="col-12">
				<div class="text-center">
					<button type="submit" class="btn-done-rek">OK</button>
				</div>
			</div>
		</div> 
	</form>
</div>

<!-- Modal -->
<div class="modal fade" id="selectNoRek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="top: 25%;">
		<div class="modal-content">
			<div class="modal-body">
				<div class="list-group">
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start border-top-0 border-left-0 border-right-0">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1" id="">Sweta Kartika</h5>
							<!-- <span class="badge text-dark">></span> -->
						</div>
						<p class="mb-1"><span id="">999812172128</span> - <span id="">Bank Central Asia</span></p>
					</a>
				</div>
				<div class="list-group">
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start border-top-0 border-left-0 border-right-0">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1" id="">Sweta Kartika</h5>
							<!-- <span class="badge text-dark">></span> -->
						</div>
						<p class="mb-1"><span id="">999812172128</span> - <span id="">Bank Mandiri</span></p>
					</a>
				</div>
				<div class="list-group">
					<a href="<?php echo site_url('cashout/second'); ?>" class="list-group-item list-group-item-action flex-column align-items-start border-top-0 border-left-0 border-right-0">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1">Rekening Baru</h5>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- JS -->
<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
	$(document).ready(function () {
		$('.backcheck').click(function () {
			window.history.back();
		});
		$('.tfrek').click(function () {
			$('#selectNoRek').modal('show');
		});
		$("#formDataCashOut").validate({
			ignore: [],
			rules: {
				inpJumSal: {
					required: true,
					min: 200000
				}
			},
			messages: {
				inpJumSal: {
					required: 'Masukan saldo yang ingin ditarik.',
					min : 'Minimum penarikan sebesar Rp 200.000'
				}
			},
			submitHandler: function(form) {
				window.location = base_url+'cashout/fourth';
			}
		});
	});
</script>
</body>
</html>
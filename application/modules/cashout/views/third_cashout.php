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
		<a class="navbar-brand backcheck" href="javascript:void(0);"><i class="fa fa-arrow-left text-dark asdsa"></i></a>
	</nav>
	<div class="container mb-30">
		<form id="formDataCashOut">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
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
									<h5 class="mb-1" id="namaRek">Memuat..</h5>
									<span class="badge text-dark"><i class="fa fa-chevron-right"></i></span>
								</div>
								<p class="mb-0"><span id="nomRek">Memuat..</span> - <span id="namaBank">Memuat..</span></p>
							</a>
						</div>
					</div>
					<div class="row mt-40">
						<div class="col-12">
							<div style="background:  #f7f5fa;padding: 15px 0 1px 0;border: 1px #ededed solid;">
								<div style="text-align:  center;
								">
								<span style="font-weight:  600;
								">Dana yang tersedia</span>
								<p style="font-size: 27px;font-weight: 900;
								">Rp <span class="amount">-</span></p>
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
						<input type="text" class="form-control fs17pxfw600" id="inpJumSal" name="inpJumSal" placeholder="( Contoh : 200000 )">
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
					<?php if (!empty($bank)) { ?>
					<?php foreach ($bank as $b) { ?>
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start border-top-0 border-left-0 border-right-0 modList" rekdata="<?php echo $b['account_number']; ?>" accid="<?php echo $b['id_acc']; ?>">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1 nameAcc"><?php echo $b['account_name']; ?></h5>
						</div>
						<p class="mb-1"><span class="numAcc"><?php echo $b['account_number']; ?></span> - <span class="bankAcc"><?php echo $b['bank_name']; ?></span></p>
					</a>
					<?php } }else{ ?>
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start border-top-0 border-left-0 border-right-0">Data tidak didapatkan.</a>
					<?php } ?>
					<a href="<?php echo site_url('cashout/second'); ?>" class="list-group-item list-group-item-action flex-column align-items-start border-top-0 border-left-0 border-right-0">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1 text-muted"><strong>Rekening Baru</strong></h5>
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
<script src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url();?>public/js/custom/cashout_auth.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.number.js"></script>
<script>
	$(document).ready(function () {
		// selectRekData();
		rekValidation();
		validationFormCashout();
		selectRekModal();
		$('#inpJumSal').number(true);
	});
</script>
</body>
</html>

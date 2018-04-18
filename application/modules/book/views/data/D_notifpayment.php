<?php if ($this->session->flashdata('popup_status_payment') == 2): ?>
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="width: 150% !important;right: 25%;">
			<div class="">
			</div>
			<div class="modal-header">
				<b>Menunggu Pembayaran</b>
				<button type="button" data-dismiss="modal" class="close-btn">×</button>
			</div>
			<div class="modal-body">
				<div class="container">
				<div class="row">
					
					<div class="col-12 text-justify mb-50" style="color: #000;">
						<p>Mohon segera selesaikan pembayaran sebelum batas waktu dengan detail berikut</p>
						<br>
						<div class="countdown" style="height: 500px;">
							<object data="<?php echo $this->session->userdata('pdf_url'); ?>" type="application/pdf" width="100%" height="100%">
								<iframe src="<?php echo $this->session->userdata('pdf_url'); ?>" width="100%" height="100%" style="border: none;">
								</iframe>
							</object>

							<!-- <embed src="<?php echo $this->session->userdata('pdf_url'); ?>" type="application/pdf" width="120%" height="600px" /> -->
						</div>
					</div>
				</div>					
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
<?php if ($this->session->flashdata('popup_status_payment') == 1): ?>
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="width: 105% !important;">
			<div class="">
			</div>
			<div class="modal-header">
				<b>Pembelian Berhasil</b>
				<button type="button" data-dismiss="modal" class="close-btn">×</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="col-12 text-justify mb-50" style="color: #000;">
						<br>
						<div class="countdown" style="height: 250px;" align="center">
							<img src="<?php echo base_url('public/img/assets/transaction_success.svg') ?>" width="200" height="200">
						</div>
						<p>Buku anda otomatis ditambahkan ke halaman “Library” dan dapat Anda baca dalam mode offline</p>
						<div class="countdown" style="height: 200px;" align="center">
							<img src="<?php echo base_url('public/img/assets/garis_panjang.svg') ?>" width="200" height="200">
						</div>
						<div align="center">
							<a href="<?php echo site_url('library') ?>" class="btn-back-library">Lihat di library</a>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
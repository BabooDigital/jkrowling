	<!-- <?php if ($this->session->userdata('popup_status_payment') == 2): ?> -->
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="closes" data-dismiss="modal" aria-label="Close" style="height: 45px;left: 0;right: none;">
						<span aria-hidden="true" style="font-size: 20px;"><i class="fa fa-arrow-left"></i></span>
					</button>
				</div>
				<div class="modal-body pl-0 pr-0">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<span style="font-size: 25px;font-weight: 800;">Menunggu Pembayaran</span>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<p class="mt-15" style="line-height: 20px;font-size: 15px;">Kamu baru Mohon segera selesaikan pembayaran sebelum batas waktu dengan detail berikut</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<a href="<?php echo $this->session->userdata('pdf_url'); ?>" target="_blank" style="font-size: 15pt;font-weight: 600;color: #7661ca;">Klik disini untuk detailnya..</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <?php endif ?>
		<?php if ($this->session->userdata('popup_status_payment') == 1): ?>
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
		<?php endif ?> -->
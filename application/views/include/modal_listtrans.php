<!-- Modal TnC -->
<div class="modal fade" id="list_trans" tabindex="-1" role="dialog" aria-labelledby="list_transaction_modal" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 100%; height: 100%; padding: 0; margin:0;">
		<div class="modal-content" style="height:100%;border:none;border-radius:0; color:#333; overflow:auto;">
			<div class="modal-body p-0">
				<nav class="navbar color-layer">
					<a class="navbar-brand" href="javascript:void(0);" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i></a>
				</nav>
				<div class="container mb-50">
					<div class="row mb-20">
						<div class="col-12">
							<h4>Daftar Pembelian</h4>
						</div>
					</div>
					<?php foreach ($transaction as $trans): ?>
					<div class="listpend mt-20" style="border-bottom: .5px #c3c3c3 solid;">
						<div class="row mb-5">
							<div class="col-12">
								<div class="media">
									<img class="mr-3" src="<?php echo $trans['cover_url'] ?>" width="50" height="70" alt="<?php echo $trans['title_book']; ?>" style="object-fit: cover;">
									<div class="media-body">
										<div class="pull-right">
											<div class="dropdown">
												<button class="share-btn dropbtn fs-14px" type="button" id="dropOption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
												</button>
												<div class="dropdown-menu" aria-labelledby="dropOption">
													<a class="dropdown-item cancel-trans" href="javascript:void(0);" data-cancel="<?php echo $trans['order_id']; ?>">Batalkan Transaksi</a>
												</div>
											</div>
										</div>
										<h5 class="mt-0" style="width: 90%;"><?php if(strlen($trans['title_book']) > 55){ $str =  substr($trans['title_book'], 0, 50).'...'; echo ucfirst(strtolower($str)); }else { echo ucfirst(strtolower($trans['title_book'])); }  ?></h5>
										<span style="font-size: 15pt;">Rp <?php echo number_format($trans['gross_amount'],0,",","."); ?></span>
									</div>
								</div>
							</div>
						</div>
						<?php if ($trans['payment_type'] == "echannel"){ ?>
						<div class="row">
							<div class="col-8">
								<p><span>Bank Transfer:</span><span class="d-block font-weight-bold" style="text-transform: uppercase;"><?php echo $trans['bank'] ?> - <?php echo $trans['va_numbers']; ?></span></p>
							</div>
							<div class="col-4">
								<a href="<?php echo $trans['pdf_url']; ?>" target="_blank" class="float-right">Details ></a>
							</div>
						</div>
						<div class="row mb-10">
							<div class="col-12">
								<span class="text-muted"><?php echo $trans['transaction_desc']; ?></span>
							</div>
						</div>
						<?php }else if ($trans['payment_type'] == "credit_card") { ?>
						<div class="row">
							<div class="col-8">
								<p><span>Kartu Kredit:</span><span class="d-block font-weight-bold" style="text-transform: uppercase;"><?php echo $trans['bank'] ?></span></p>
							</div>
							<div class="col-4">
								<a href="#" class="float-right">Details ></a>
							</div>
						</div>
						<div class="row mb-10">
							<div class="col-12">
								<span class="text-muted"><?php echo $trans['transaction_desc']; ?></span>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>
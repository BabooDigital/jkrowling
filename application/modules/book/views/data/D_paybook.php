<div class="modal-dialog" role="document">
	<div class="modal-content" style="width: 105% !important;">
		<div class="">
		</div>
		<div class="modal-header">
			<b>Versi Lengkap</b>
			<button type="button" data-dismiss="modal" class="close-btn">×</button>
		</div>
		<div class="modal-body">
			<div class="container">
				<div class="col-12 text-justify mb-50" style="color: #000;">
					<p>Kamu baru saja selesai membaca batas gratis buku ini, untuk membaca cerita selanjutnya silahkan lakukan pembelian buku.</p>
					<?php $attr = array('id' => 'payment-form'); echo form_open('pay_book/finish', $attr); ?>

						<input type="hidden" name="result_type" id="result-type" value=""></div>
						<input type="hidden" name="result_data" id="result-data" value=""></div>
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<?php echo form_close(); ?>
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="media">
									<img class="align-self-start mr-3" src="<?php echo $detail_book['data']['book_info']['cover_url'] ?>" width="150" height="210" alt="Generic placeholder image">
									<div class="media-body">
										<span class="h3 mt-0 d-block"><a class="book_link" href="<?php echo $detail_book['data']['book_info']['book_id']; ?>"><?php echo $detail_book['data']['book_info']['title_book']; ?></a></span>
										<span class="mr-10" style="font-size: 12px;">Fiksi &#8226;</span>
										<span class="text-muted" style="font-size: 11px;">Dibaca <?php echo $detail_book['data']['book_info']['view_count'] ?> kali</span>
										<br>
										<div class="media mt-20">
											<img class="d-flex align-self-start mr-10 rounded-circle" src="<?php if($detail_book['data']['author']['avatar'] == NULL){
												echo base_url('public/img/profile/blank-photo.jpg');
											}else{
												echo $detail_book['data']['author']['avatar']; } ?>" width="50" height="50">
												<div class="media-body mt-5">
													<span class="h5 card-title nametitle2"><a href="#" class="author_name menu-page" id="tab-page"><?php echo $detail_book['data']['author']['author_name']; ?></a></span>
													<p class="text-muted" style="margin-top:-10px;"><small>
														<span><?php echo $detail_book['data']['book_info']['publish_date']; ?></span></small></p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<span class="float-left">Harga Buku</span><span class="float-right"><b>Rp. <?php echo number_format($detail_book['data']['book_info']['book_price'],2,",","."); ?></b></span>
									</div>
									<div class="card-footer">
										<span class="float-left">Total Pembayaran</span><span class="float-right"><b>Rp. <?php echo number_format($detail_book['data']['book_info']['book_price'],2,",","."); ?></b></span>
									</div>
								</div>
							</div>
							<div class="modal-footer">
                                <?php if ($this->session->userdata('isLogin') == 200 && (bool)$detail_book['data']['book_info']['is_free'] == false){
                                    echo "<button class='btn-acc-tnc' id='buy-btn'>Lanjutkan bayar</button>";
                                }else{
                                    echo "<a href='".site_url('login?w='.$detail_book['data']['author']['author_id'].'&b='.$detail_book['data']['book_info']['book_id'].'&hash=buynow')."' class='btn-acc-tnc text-center pt-5'>Lanjutkan bayar</a>";
                                } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

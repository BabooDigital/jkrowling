<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="icon" href="<?php echo base_url(); ?>public/img/favicon.ico" sizes="16x16">

	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
	<?php $this->load->view('include/third_party_script'); ?>
</head>
<style>
.btntnc {
	border: none;
	border-radius: 35px;
	padding: 10px 50px;
	box-shadow: 0px 2px 5px 0px #999999;
	font-weight: 600;
}
.btn-diss {
	background: #dadada;
	color: #333;
}
.btns {
	background: none;
	border: none;
}
.btn-acc {
	background: #7661ca;
	color: #fff;
}
</style>
<script type="text/javascript">
		var base_url = '<?php echo base_url() ?>';
		var uri_segment = '<?php echo $this->uri->segment(2) ?>';
		var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo TAGMNG_GID; ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	<?php $attr = array('id' => 'form_book');
		form_open_multipart('my_book/create_book/publish', $attr);
	?>
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 bg-white pt-10 cleftmenu pb-20">
					<div class="stickymenu" style="height: auto;">
						<a href="javascript:void(0);" class="backbtn" style="font-size: 14px;"><i class="fa fa-long-arrow-left mr-10" aria-hidden="true"></i> Kembali</a>
						<div class="text-center">
							<div class="coverprev mt-20" style="margin-bottom: -60px;">
								<p><img width="160" height="222" id="preview" src="<?php $src = $this->session->userdata('dataCover'); if(($src != NULL)){  echo $src['asset_url']; }else{
									echo base_url()."public/img/assets/def_prev.png";
								} ?>"></p>
								<input type="hidden" name="cover_name" id="cover_name" accept="image/*"  value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo ""; } ?>">
								<input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'preview')" name="file_cover" value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo ""; } ?>">
							</div>
							<div>
								<p style="font-size: 16px;">Atau
									<input type="button" style="background: transparent; color: #b448cc;border: 0;cursor: pointer;" onclick="window.location.href = '<?php echo site_url('create_cover'); ?>';" value="Buat Disini" />
							</div>
						</div>
						<div class="mt-30">
							<div id="loading" style="display: none;">loading</div>
							<div class="alert alert-success" id="success" style="display: none;">
							  <strong>Success!</strong> Subchapter telah ditambahkan.
							</div>
							<div align="center">
								<p style="font-size: 18px;font-weight: 600;color: #141414;" class="title_book_txt"></p>
								<p style="font-size: 15px;" class="desc_book_txt"></p>
							</div>
							<hr>
							<div id="subchapter">
								<a style="display: none;" class="btn w-100 mb-10 chapterdata0 editsubchapt1 btnsavedraft" id="btnsavedraft" id="editchapt" href="#"></a>
								<div id="btn_chapter">
									<div class="loads-css ng-scope"><div style="width:20px;height:20px" class="lds-flickr"><div></div><div></div><div></div></div></div>
								</div>
                                <?php $query = $this->input->get();
                                $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
                                $url_no = 'http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
                                if (!empty($query['stat'])){ ?>
                                    <a href="<?php echo $url_no; ?>" class="btn w-100 mb-10 chapterdata0" style="cursor: pointer;padding: 12px 0;border-radius: 4px;border: dashed 2px #dde4e9;">Tambah Sub Cerita</a>
                                <?php }else{ ?>
                                    <input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />
                                <?php } ?>
							</div>
							<div class="mt-5">
								<div class="form-group">
									<select class="form-control" id="category_id" name="category_id" required>
										<option value="">Kategori</option>
									</select>
								</div>
							</div>
							<div class="mt-20">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="" class="checktnc" name="ischecked">
										<a href="javascript:void(0);" class="tncModal" style="color: #7554bd;">Term of Service</a>
									</label>
								</div>
							</div>
							<div class="mt-20" id="sell_book" style="display: none;">
								<div class="form-group">
									<span class="text-left">Jual Buku ?</span>
									<label class="switch float-right">
										<input type="checkbox" id="is_free" data-toggle='collapse' class="priceCheck">
										<span class="slider round"></span>
									</label>
								</div>
							</div>
							<input type="hidden" id="what" value="<?php $pin = $this->session->userdata('hasPIN'); if ($pin == 1) {echo 'true';}else{echo 'false';}  ?>">
							<div class="container mt-20 pb-5 rangebook" style="background: #DDDDDD;">
								<div class="col-12">
									<div class="form-group">
										<select class="selectbook select-kurs" id="category_id" name="cat_book">
											<option value="rp">Rp</option>
										</select>
										<input type="text" name="Harga Buku" class="input-range first_price" placeholder="Masukan Harga Buku">
									</div>
									<div class="row">
										<div class="col-5">
											<label class="fs-10">Penulis (<span id="writen1"></span>)</label>
										</div>
										<div class="col-7">
											<label class="fs-10-right"><b style="display: none;" id="rp2">Rp</b> <b id="writen-earn">-</b></label>
										</div>
										<div class="col-5">
											<label class="fs-10">Baboo (<span id="baboo1"></span>)</label>
										</div>
										<div class="col-7">
											<label class="fs-10-right"> <b style="display: none;" id="rp_fee2">Rp</b> <b id="baboo-earn">-</b></label>
										</div>
									</div>
									<hr class="mt-5 mb-5">
									<div class="row">
										<div class="col-5">
											<label class="fs-10">+ Pph 21 (<span id="fee1"></span>)</label>
										</div>
										<div class="col-7">
											<label class="fs-10-right"><b style="display: none;" id="rp">Rp</b> <b id="ppn">-</b></label>
										</div>
										<div class="col-5">
											<label class="fs-10">+ Biaya Transaksi</label>
										</div>
										<div class="col-7">
											<label class="fs-10-right"> <b style="display: none;" id="rp_fee">Rp</b> <b id="payment_fee">-</b></label>
										</div>
									</div>
									<hr class="mt-5 mb-5">
									<div class="form-group pd-ppn">
										<label class="fs-10">Harga Jual Buku</label>
										<label class="fs-10-right"> <b style="display: none;" id="rp_total">Rp</b> <b id="total">-</b></label>
									</div>
									<div class="form-group">
										<label class="">Mulai Jual Pada Chapter</label>
										<input type="number" name="start_chapter" class="input-range start_chapter" id="chapter_start" style="width: 40%;" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly>
										<a class="ml-20 btn-transparant value-control addmin" data-action="minus" data-target="start_chapter" style="cursor: pointer;"><img src="<?php echo base_url('public/img/assets/icon_minch_active.png'); ?>" width="35"></a>
										<a class="ml-10 btn-transparant value-control addplus" data-action="plus" data-target="start_chapter" style="cursor: pointer;"><img src="<?php echo base_url('public/img/assets/icon_plusch_active.png'); ?>" width="35"></a>
									</div>
								</div>
							</div>
                            <div class="mt-20" id="schedule_pub">
                                <div class="form-group">
                                    <span class="text-left">Jadwalkan Penerbitan?</span>
                                    <label class="switch float-right">
                                        <input type="checkbox" id="showOptPub" data-toggle='collapse' data-target='#publishSet' class="publishCheck">
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="container mt-20 pb-5 collapse" id="publishSet" style="background: #DDDDDD;">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label class="text-muted">Tentukan Tanggal</label>
                                                <input type="text" class="form-control" id="date_pub" data-format="YYYY-MM-DD" data-template="YYYY MMMM DD" name="date_pub">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label class="text-muted">Tentukan Waktu</label>
                                                <input type="text" id="time_pub" data-format="HH:mm" data-template="HH : mm" name="time_pub" value="00:00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
				<div class="col-md-9" id="pageContent">
					<div class="pt-10 pb-10 pl-50 pr-50">
						<div class="media">
							<img alt="Name" class="d-flex mr-3 rounded-circle" src="<?php $uri = $this->session->userdata('userData'); if($uri['prof_pict'] == NULL){
									echo base_url('public/img/profile/blank-photo.jpg');
								}else{
									echo $uri['prof_pict']; } ?>" width="50" height="50">
							<div class="media-body mt-7">
								<input type="hidden" name="user_id" id="user_id" value="<?php $name = $this->session->userdata('userData');
										echo $name['user_id']; ?>">
									<input type="hidden" name="book_id" id="uri" value="<?php echo $this->uri->segment(2); ?>">
									<input type="hidden" name="book_id" id="book_id" value="<?php echo $this->uri->segment(2); ?>">
									<input type="hidden" id="cover_url" accept="image/*" onchange="tampilkanPreview(this,'preview')" name="cover_url" value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo " "; } ?>">
									<div id="books_id"></div>
								<h5 class="mt-0 mb-1 nametitle"><?php $uri = $this->session->userdata('userData'); echo $uri['fullname'] ?></h5>
							</div>
						</div>

						<div>
                            <?php
                            echo "<input type='hidden' id='ch_id' value='".$chapter_id."'>";
                            $query = $this->input->get();
                            if (!empty($query['stat'])){
                                echo "<input type='hidden' id='title_book' value='".$book_title."'>";
                                $desc = "";
                                foreach ($chapter_desc as $book) {
                                    $desc .= $book['paragraph_text'];
                                }
                                $btn_save = "<input type='button' class='mr-30' id='updateChapter' style='font-size: 18px; font-weight: bold; background: #7554bd; border: 0px; cursor: pointer; margin-top: 20px; color: #fff; border-radius: 35px; padding: 10px 20px;' value='Update Chapter' />";
                                ?>
                                <div class="mt-30 tulisjuduls">
                                    <input type="text" name="title_chapter" id="title_chapter" class="w-100" placeholder="Masukan Chapter" required="" value="<?php echo $chapter_title; ?>">
                                </div>
                            <?php }else{
                                $desc = "";
                                $btn_save = "<input type='button' class='mr-30 saveasdraft' ch_id='' style='font-size: 18px;font-weight: bold;background: transparent; border: 0; cursor: pointer;' value='Simpan ke Draft' />";
                                ?>
                                <div class="mt-30 tulisjudul">

                                </div>
                            <?php } ?>

							<div class="tulisbuku mt-10">
								<textarea id="book_paragraph" class="form-control book_paragraph" style="height: 1000px;" name="book_paragraph" required><?php echo $desc; ?></textarea>
							</div>

						</div>
					</div>

					<div class="pull-right mb-10">
						<?php echo $btn_save; ?>
						<button type="button" class="btnbeliskrg" id='publish_book' href="#" style="padding: 10px 50px;"><span class="txtbtnbeliskrg">Publish</span></button>
						<button type='button' class='btnbeliskrg activeWallet' id='setpin_publish' style="display: none;padding: 10px 50px;"><span class="txtbtnbeliskrg">Publish</span></button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="wallet-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="height: ">
				<div class="modal-content" style="width: 440px !important; left: 10%;">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="bottom: auto;right: -40px;">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="modal-body" style="height: 670px;">
						<iframe id="targetFrame" width="100%" height="100%" scrolling="NO" frameborder="0" src="<?php echo site_url('pin-dompet');?>">></iframe>
					</div>
				</div>
			</div>
		</div>
	<?php echo form_close(); ?>
	<?php $this->load->view('include/modal_tnc'); ?>
	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>
	<script>
        $(function(){
            $('#date_pub').combodate({
                firstItem: 'name',
                minYear: 2018,
                maxYear: 2020,
                yearDescending: false
            });
            $('#time_pub').combodate({
                firstItem: 'name', //show 'hour' and 'minute' string at first item of dropdown
                minuteStep: 1
            });
        });
		$(document).on('click','.tncModal',function(){
			$('#tnc-modal').modal('show');
			$(document).on('click', '.btn-acc', function() {
				$('.checktnc').prop('checked', true);
				$('#tnc-modal').modal('hide');
			});
			$(document).on('click', '.btn-diss', function() {
				$('.checktnc').prop('checked', false);
				$('#tnc-modal').modal('hide');
			});
		});
		$(document).on('click', '#is_free', function() {
			var sellbtn = $('#is_free:checkbox:checked');
			var pin = $('#what').val();
			if (sellbtn.length == 0 && pin == 'false') {
				$('#publish_book').show();
				$('#setpin_publish').hide();
			}else if (sellbtn.length == 1 && pin == 'true'){
				$('#publish_book').show();
				$('#setpin_publish').hide();
			}else if (sellbtn.length == 0 && pin == 'true'){
				$('#publish_book').show();
				$('#setpin_publish').hide();
			}else{
				$('#publish_book').hide();
				$('#setpin_publish').show();
			}
			if (sellbtn.length == 0) {
				$('.rangebook').hide();
			}else{
				$('.rangebook').show();
				$('.first_price').focus();
                window.scrollTo(0,document.body.scrollHeight);
			}
		});
	</script>
	<?php echo $this->session->flashdata('limit_character'); ?>
</body>
</html>

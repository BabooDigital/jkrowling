<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
	<?php $this->load->view('include/third_party_script'); ?>
</head>
<?php   $b = $this->uri->segment(3); ?>
<script type="text/javascript">
	var base_url = '<?php echo base_url() ?>';
	function tampilkanPreview(gambar, idpreview) {
		var gb = gambar.files;
		for (var i = 0; i < gb.length; i++) {
			var gbPreview = gb[i];
			var imageType = /image.*/;
			var preview = document.getElementById(idpreview);
			var reader = new FileReader();

			if (gbPreview.type.match(imageType)) {
				preview.file = gbPreview;
				reader.onload = (function(element) {
					return function(e) {
						element.src = e.target.result;
					};
				})(preview);
				reader.readAsDataURL(gbPreview);
			} else {
				alert("Type file tidak sesuai. Khusus image.");
			}

		}
	}

	var base_url = '<?php echo base_url() ?>';
	var uri_segment = '<?php echo $this->uri->segment(2) ?>';
	var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>
<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVW4JD3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php  $attr = array('id' => 'form_book'); echo form_open_multipart('my_book/create_book/publish'); ?>
	
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 bg-white pt-10 cleftmenu">
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
								<p style="font-size: 16px;">Atau <!-- 
									<form action="<?php echo site_url(); ?>create_cover">
									    <input type="submit" value="Buat Disini" style="color: #b448cc;"/>
									</form> -->
									<input type="button" style="background: transparent; color: #b448cc;border: 0;cursor: pointer;" onclick="window.location.href = '<?php echo site_url('create_cover'); ?>';" value="Buat Disini" />
									<!-- <a href="<?php echo site_url(); ?>create_cover" style="color: #b448cc;"><b>Buat Di Sini</b></a></p> -->
								</div>
							</div>
							<div class="mt-30">
								<div id="loading" style="display: none;">loading</div>
								<div class="alert alert-success" id="success" style="display: none;">
									<strong>Success!</strong> Indicates a successful or positive action.
								</div>

								<div align="center">
									<p style="font-size: 18px;font-weight: 600;color: #141414;" class="title_book_txt"><?php echo $detail_chapter['data']['book_info']['title_book']; ?></p>
									<p style="font-size: 15px;" class="desc_book_txt"><?php echo $detail_chapter['data']['chapter'][0]['desc']; ?></p>
								</div>

								<hr>
								<div>
									<input type="hidden" name="book_id" id="book_id" value="<?php 
									$id = $this->session->userdata('dataBook');
									$user = $this->session->userdata('userData');?> <?php echo $id['book_id']; ?>">
								</div>
								<div id="subchapter">
									<div id="accordion"> 
										<div class="card"> 
											<div class="card-header" id="headingOne"> 
												<h5 class="mb-0"> 
													<button class="btn btn-transparent" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Daftar Chapter <span class="caret"></span> </button> 
												</h5> 
											</div> 
											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
												<?php foreach ($detail_chapter['data']['chapter'] as $key => $btn_chapters): ?>		
													<?php if ($this->uri->segment(4) == $btn_chapters['chapter_id']): ?>
														<?php 
														$active = 'chapter_active';
														?> 
													<?php endif ?>
													<div class="">
														<?php if ($this->uri->segment(4) == $btn_chapters['chapter_id']): ?>
															<span class="<?php echo ($this->uri->segment(4) == $btn_chapters['chapter_id']) ? 'chapter_active_list' : ''; ?> btn w-100 addsubchapt_on ">
																<img src="<?php echo ($this->uri->segment(4) == $btn_chapters['chapter_id']) ? base_url('').'public/img/icon-tab/chapter_active.svg' : base_url('').'public/img/icon-tab/chapter.svg'; ?>" class="pr-10">
																<?php echo substr($btn_chapters['chapter_title'], 0, 25) .((strlen($btn_chapters['chapter_title']) > 25) ? '...' : ''); ?>	
																<div style="float: right;"><a data-id="<?php echo $btn_chapters['chapter_id']; ?>" href="<?php echo site_url('my_book/'.$detail_chapter['data']['book_info']['book_id'].'/delchapter/'.$btn_chapters['chapter_id']) ?>" class="deletechapter"><img src="<?php echo base_url('public/img/icon-tab/trash.svg') ?>"></a></div>
															</span>
															<?php else: ?>
																<a class="<?php echo ($this->uri->segment(4) == $btn_chapters['chapter_id']) ? 'chapter_active_list' : ''; ?> btn w-100 addsubchapt_on " book="2016" chapter="1326" id="editchapt" href="<?php $url = 'my_book/'.$detail_book['data']['book_info']['book_id'].'/chapter/'.$btn_chapters['chapter_id']; echo site_url($url) ?>" onclick="showLoading()">
																	<img src="<?php echo ($this->uri->segment(4) == $btn_chapters['chapter_id']) ? base_url('').'public/img/icon-tab/chapter_active.svg' : base_url('').'public/img/icon-tab/chapter.svg'; ?>" class="pr-10">
																	<?php echo substr($btn_chapters['chapter_title'], 0, 25) .((strlen($btn_chapters['chapter_title']) > 25) ? '...' : ''); ?>	</a>
																<?php endif ?>
															</div>
														<?php endforeach ?>
													</div>
										</div>
									</div>
									<br>
									<a onclick="showLoading()" href="<?php echo site_url('my_book/'.$this->uri->segment(2)); ?>" class="btn w-100 mb-10 btn-default" style="background: #f3f3f3;padding: 15px;">Tambah Sub Cerita</a>
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
								<div class="col-md-15">
									<div class="form-group">
										<select class="selectbook select-kurs" id="category_id" name="cat_book">
											<option value="rp">Rp</option>
										</select>
										<input type="text" name="Harga Buku" class="input-range" placeholder="Masukan Harga Buku">
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
									<input type="hidden" name="book_id" id="book_id" value="<?php echo $this->uri->segment(2); ?>">
									<input type="hidden" name="book_id" id="uri" value="<?php echo $this->uri->segment(2); ?>">
									<input type="hidden" id="cover_url" accept="image/*" onchange="tampilkanPreview(this,'preview')" name="cover_url" value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo " "; } ?>">
									<div id="books_id"></div>
									<h5 class="mt-0 mb-1 nametitle"><?php $uri = $this->session->userdata('userData'); echo $uri['fullname'] ?></h5>
								</div>
							</div>
							<div>
								<div class="mt-30 tulisjudul">
									<input type="hidden" name="books_id" id="books_id" value="<?php echo $this->uri->segment(2); ?>">
									<input type="hidden" name="chapter_id" id="chapter_id" value="<?php echo $this->uri->segment(4); ?>">
									<input type="hidden" name="title_book" id="title_book" class="w-100" placeholder="Masukan Judul buku" value="<?php echo $detail_book['data']['book_info']['title_book']; ?>">
									<input type="text" name="title_chapter" id="title_chapter" class="w-100" placeholder="Masukan Judul buku" value="<?php echo $detail_book['data']['chapter']['chapter_title']; ?>" required>
								</div>

								<div class="tulisbuku mt-10">
									<textarea id="book_paragraph" name="book_paragraph">
										<?php 
										$data = "";
										foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
											$data .= $book['paragraph_text'];
										}
										echo $data;
										?>
									</textarea>
								</div>

							</div>
						</div>
						<div class="pull-right mb-10">
							<input type="button" class="mr-30" id="updateChapter" style="font-size: 18px; font-weight: bold; background: #7554bd; border: 0px; cursor: pointer; margin-top: 20px; color: #fff; border-radius: 35px; padding: 10px 20px;" value="Update Chapter" />
							<!-- <button type="button" class="btnbeliskrg" id='publish_book' href="#" style="padding: 10px 50px;"><span class="txtbtnbeliskrg">Publish</span></button>
							<button type='button' class='btnbeliskrg activeWallet' id='setpin_publish' style="display: none;padding: 10px 50px;"><span class="txtbtnbeliskrg">Publish</span></button> -->
						</div>
					</div>
				</div>
			</div>


		<?php echo form_close(); ?>

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
		<?php $this->load->view('include/modal_tnc'); ?>

		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
		<script>
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
				}
			});
		</script>
		<?php echo $this->session->flashdata('limit_character'); ?>
	</body>
	</html>

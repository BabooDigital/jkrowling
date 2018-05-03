<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
</head>
<script type="text/javascript">
		var base_url = '<?php echo base_url() ?>';
		var uri_segment = '<?php echo $this->uri->segment(2) ?>';
</script>
<body>
	<form action="<?php echo site_url(); ?>my_book/create_book/publish" id="form_book" method="POST" enctype="multipart/form-data">
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
								<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />
							</div>
							<div class="mt-5">
								<div class="form-group">
									<select class="form-control" id="category_id" name="category_id" required>
										<option value="">Kategori</option>
									</select>
								</div>
							</div>
							<div class="mt-20" id="sell_book" style="display: none;">
								<div class="form-group">
									<span class="text-left">Jual Buku ?</span>
									<span style="float: right;">
										<label class="switch">
										  <input type="checkbox" id="is_free">
										  <div id="sell_nominal" style="display: none;">
										  	
										  </div>
										  <span class="slider round"></span>
										</label>
									</span>
								</div>
							</div>
							<div class="container mt-20 rangebook" style="background: #DDDDDD;">
								<div class="col-md-15">
									<div class="form-group">
										<select class="selectbook select-kurs" id="category_id" name="cat_book">
											<option value="rp">Rp</option>
										</select>
										<input type="text" name="Harga Buku" class="input-range" placeholder="Masukan Harga Buku">
									</div>
									<div class="form-group pd-ppn">
										<label class="text-muted fs-10">PPN 10%</label>
										<label class="text-muted fs-10-right"><b style="display: none;" id="rp">Rp</b> <b id="ppn">-</b></label>
									</div>
									<div class="form-group pd-ppn" style="margin-top: -30px;">
										<label class="text-muted fs-10">Payment Fee</label>
										<label class="text-muted fs-10-right"> <b style="display: none;" id="rp_fee">Rp</b> <b id="payment_fee">-</b></label>
									<hr style="margin-top: -5px;">
									</div>
									<div class="form-group pd-ppn" style="margin-top: -35px;">
										<label class="text-muted fs-10">Harga Jual Buku</label>
										<label class="text-muted fs-10-right"> <b style="display: none;" id="rp_total">Rp</b> <b id="total">-</b></label>
									</div>
									<div class="form-group">
										<label class="text-muted">Mulai Jual Pada Chapter</label>
										<input type="number" name="start_chapter" class="input-range start_chapter" id="font-size" style="width: 40%;">
										<a class="ml-20 btn-transparant value-control addmin" data-action="minus" data-target="font-size"><img src="<?php echo base_url('public/img/assets/icon_minch_active.png'); ?>" width="35"></a>
										<a class="ml-10 btn-transparant value-control addplus" data-action="plus" data-target="font-size"><img src="<?php echo base_url('public/img/assets/icon_plusch_active.png'); ?>" width="35"></a>
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
							<div class="mt-30 tulisjudul">
								
							</div>

							<div class="tulisbuku mt-10">
								<textarea id="book_paragraph" class="form-control book_paragraph" style="height: 1000px;" name="book_paragraph" required></textarea>
							</div>

						</div>
					</div>

					<div class="pull-right mb-10">
						<input type="button" class="mr-30 saveasdraft" style="font-size: 18px;font-weight: bold;background: transparent; border: 0; cursor: pointer;" value="Simpan ke Draft" />
						<button type="submit" class="btnbeliskrg" href="#" style="padding: 10px 50px;"><span class="txtbtnbeliskrg" ">Publish</span></button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>
	<?php echo $this->session->flashdata('limit_character'); ?>
</body>
</html>
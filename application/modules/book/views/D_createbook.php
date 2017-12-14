<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<title><?php echo $judul; ?></title>

	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
</head>
<script type="text/javascript">
		function tampilkanPreview(gambar, idpreview) {
		// membuat objek gambar
		var gb = gambar.files;

		// loop untuk merender gambar
		for (var i = 0; i < gb.length; i++) {
			// bikin variabel
			var gbPreview = gb[i];
			var imageType = /image.*/;
			var preview = document.getElementById(idpreview);
			var reader = new FileReader();

			if (gbPreview.type.match(imageType)) {
				// jika tipe data sesuai
				preview.file = gbPreview;
				reader.onload = (function(element) {
					return function(e) {
						element.src = e.target.result;
					};
				})(preview);

				// membaca data URL gambar
				reader.readAsDataURL(gbPreview);
			} else {
				// jika tipe data tidak sesuai
				alert("Type file tidak sesuai. Khusus image.");
			}

		}
	}
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
								<input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'preview')" name="file_cover" value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo " "; } ?>">
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
							  <strong>Success!</strong> Subchapter telah ditambahkan.
							</div>
							<span style="font-size: 18px;font-weight: 600;color: #141414;">Judul Buku</span>
							<hr>
							<div id="subchapter">
								<a style="display: none;" class="btn w-100 mb-10 chapterdata0 editsubchapt1 btnsavedraft" id="btnsavedraft" id="editchapt" href="#"></a>
								<!-- <a class="btn w-100 mb-10 chapterdata0 addsubchapt" id="editchapt">Tambah Sub Cerita</a> -->
								<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />
							</div>

							<div class="mt-40">
								<div class="form-group">
									<select class="form-control" id="category_id" name="category_id">
										<option>Kategori</option>
										<option value="1">2</option>
										<option value="2">3</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" name="tag_book" id="tag_book" class="form-control" placeholder="Tambah Tag Buku">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9" id="pageContent">
					<div class="pt-10 pb-10 pl-50 pr-50">
						<div class="media">
							<img alt="Name" class="d-flex mr-3 rounded-circle" src="<?php $uri = $this->session->userdata('userData'); echo $uri['prof_pict'] ?>" width="50" height="50">
							<div class="media-body mt-7">
								<input type="hidden" name="user_id" id="user_id" value="<?php $name = $this->session->userdata('userData');
										echo $name['user_id']; ?>">
									<input type="hidden" name="book_id" id="book_id" value="<?php echo $this->uri->segment(2); ?>">
									<input type="hidden" id="cover_url" accept="image/*" onchange="tampilkanPreview(this,'preview')" name="cover_url" value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo " "; } ?>">
									<div id="books_id"></div>
								<h5 class="mt-0 mb-1 nametitle"><?php $uri = $this->session->userdata('userData'); echo $uri['fullname'] ?></h5>
								<small>Fiksi</small>
							</div>
						</div>

						<div>
							<div class="mt-30 tulisjudul">
								<input type="text" name="title_book" id="title_book" class="w-100" placeholder="Masukan Judul buku">
							</div>

							<div class="tulisbuku mt-10">
								<textarea id="book_paragraph" class="form-control" style="height: 1000px;" name="book_paragraph"></textarea>
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
</body>
</html>
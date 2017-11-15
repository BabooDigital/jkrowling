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
<?php   $b = $this->uri->segment(3); ?>
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

	<form action="#" id="form_book" method="POST" enctype="multipart/form-data">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 bg-white pt-10 cleftmenu">
					<div class="stickymenu">
						<a href="javascript:void(0);" class="backbtn" style="font-size: 14px;"><i class="fa fa-long-arrow-left mr-10" aria-hidden="true"></i> Kembali</a>
						<div class="text-center">
							<div class="coverprev mt-20" style="margin-bottom: -60px;">
								<p><img width="160" height="222" id="preview"></p>
								<input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'preview')" name="file_cover">
							</div>
							<div>
								<p style="font-size: 16px;">Atau <a href="<?php echo site_url(); ?>create_cover" style="color: #b448cc;"><b>Buat Di Sini</b></a></p>
							</div>
						</div>
						<div class="mt-30">
							<div class="alert alert-success" id="success" style="display: none;">
							  <strong>Success!</strong> Indicates a successful or positive action.
							</div>
							<span style="font-size: 18px;font-weight: 600;color: #141414;">Judul Buku</span>
							<hr>
							<div id="subchapter">
								<a class="btn w-100 mb-10 addsubchapt"><span style="font-size: 12px;color: #7b8a95;" id="sub_title">Tambah Sub Cerita</span></a>
							</div>

							<div class="mt-40">
								<div class="form-group">
									<select class="form-control" id="category_id" name="cat_book">
										<option>Kategori</option>
										<option value="1">2</option>
										<option value="2">3</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" name="tag" id="tag_book" class="form-control" placeholder="Tambah Tag Buku">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="pt-10 pb-10 pl-50 pr-50">
						<div class="media">
							<img alt="Name" class="d-flex mr-3 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="50">
							<div class="media-body mt-7">
								<input type="hidden" name="user_id" id="user_id" value="<?php $name = $this->session->userdata('userData');
										echo $name['user_id']; ?>">
								<h5 class="mt-0 mb-1 nametitle">Risa Sulistya</h5>
								<small>Fiksi</small>
							</div>
						</div>

						<div>
							<div class="mt-30 tulisjudul">
								<input type="text" name="title_book" id="title_book" class="w-100" placeholder="Masukan Judul buku">
							</div>

							<div class="tulisbuku mt-10">
								<textarea id="book_paragraph" name="book_paragraph"></textarea>
							</div>

						</div>
					</div>

					<div class="pull-right mb-10">
						<a class="mr-30" href="#" style="font-size: 18px;font-weight: bold;">Simpan ke Draft</a>
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
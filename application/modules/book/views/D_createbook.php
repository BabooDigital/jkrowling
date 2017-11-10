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
<body>
	<form action="<?php echo site_url('awsd'); ?>" method="POST">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 bg-white pt-10 cleftmenu">
					<div class="stickymenu">
						<a href="javascript:void(0);" class="backbtn" style="font-size: 14px;"><i class="fa fa-long-arrow-left mr-10" aria-hidden="true"></i> Kembali</a>
						<div class="text-center">
							<div class="coverprev mt-20">
								<input type="file" />
							</div>
							<div>
								<p style="font-size: 16px;">Atau <a href="<?php echo site_url(); ?>create_cover" style="color: #b448cc;"><b>Buat Di Sini</b></a></p>
							</div>
						</div>
						<div class="mt-30">
							<span style="font-size: 18px;font-weight: 600;color: #141414;">Judul Buku</span>
							<hr>
							<div>
								<button class="btn w-100 addsubchapt"><span style="font-size: 12px;color: #7b8a95;">Tambah Sub Cerita</span></button>
							</div>

							<div class="mt-40">
								<div class="form-group">
									<select class="form-control" id="exampleFormControlSelect1">
										<option>Kategori</option>
										<option>2</option>
										<option>3</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" name="tag" class="form-control" placeholder="Tambah Tag Buku">
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
								<h5 class="mt-0 mb-1 nametitle">Risa Sulistya</h5>
								<small>Fiksi</small>
							</div>
						</div>

						<div>
							<div class="mt-30 tulisjudul">
								<input type="text" name="judul" class="w-100" placeholder="Judul buku">
							</div>

							<div class="tulisbuku mt-10">
								<textarea id="summernote" name="paragraph"></textarea>
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
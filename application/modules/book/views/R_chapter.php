
<body id="pageContent">
<input type="checkbox" id="toggle-right">
<div class="page-wrap">
<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
<div class="container">
	<!-- <form class="navbar-brande"> -->
		<button class="backlink" style="background: transparent;border: 1px solid transparent;"><i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span></button>
	<!-- </form> -->
	<!-- <form class="form-inline" method="post" action="<?php echo site_url('cover') ?>"> -->
		<input type="hidden" name="book_id" id="book_id" value="<?php echo $book_id; ?>">
		<!-- <input type="hidden" name="chapter_title" id="chapter_title"> -->
		<!-- <input type="text" name="paragraph" id="paragraph"> -->
		<!-- <textarea style="display: none;" name="paragraph" id="paragraph"></textarea> -->
		<button class="btn-transparant" id="publish_chapter"><span>Publish</span> &nbsp;&nbsp;<img src="<?php echo base_url() ?>public/img/icon-nav/publish.png" width="30" height="30"></button>
	<!-- </form> -->
	<nav class="profile">
		<label class="btn-transparant" for="toggle-right" class="close">&nbsp;&nbsp;&times;</label> 
		<div class="text-center">
			<div class="coverprev mt-20" style="margin-bottom: -60px;">
				<p><img width="160" height="222" id="preview" src="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{
					echo base_url()."public/img/assets/def_prev.png";
				} ?>"></p>
				<input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'preview')" name="file_cover" value="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{ echo ""; } ?>">
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
		<div class="mt-30 form_cover">
			<div id="loading" style="display: none;">loading</div>
			<div class="alert alert-success" id="success" style="display: none;">
			  <strong>Success!</strong> Indicates a successful or positive action.
			</div>
			<span style="font-size: 18px;font-weight: 600;color: #141414;">Judul Buku</span>
			<hr>
			<div>
				<input type="hidden" name="book_id" id="book_id" value="<?php 
					echo $this->session->userdata('idBook_'); ?>">
			</div>
			<div id="subchapter">
				<a style="display: none;" class="btn w-100 mb-10 chapterdata0 editsubchapt1 btnsavedraft" id="btnsavedraft" id="editchapt" href="#"></a>
				<!-- <a class="btn w-100 mb-10 chapterdata0 addsubchapt" id="editchapt">Tambah Sub Cerita</a> -->
				<input type="button" class="btn w-100 mb-10 chapterdata0 addsubchapt" value="Tambah Sub Cerita" />
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
    </nav>
</div>
</nav>
</div>
<br>
<br>
<div class="container">
	<div class="row form_book">
		<div class="input-group paddingbook">
			<input type="text" name="title_book" id="chapter_title_out" class="title_book_form" style="text-align: left;" placeholder="Judul Buku" value="">
			<div class="loader" style="display: none;"></div>
		</div>
		<div class="input-group paddingparagraph">
			<textarea id="paragraph_book" class="paragraph"></textarea>
		</div>
	</div>
</div>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>

</body>
</html>

<body id="pageContent" class="bodymessage">
<input type="checkbox" id="toggle-right">
<div class="page-wrap">
<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
<div class="container bodymessage">
	<form class="navbar-brande">
		<i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> 
	</form>
	
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
			<span style="font-size: 18px;font-weight: 600;color: #141414;">Pesan Masuk</span>
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
<br>
<div class="container bodymessage">
	<div class="row form_book">
		<div class="">
			<span class="title_book_form"><h4><b>Judul Buku</b></h4></span>
			<div class="loader" style="display: none;"></div>
		</div>
	</div>
</div>
<div class="container bodymessage">
<div class="paddingbook search_message">
	<form class="">
		<input class="form-search search_message_form" type="text" placeholder="Penulis, Buku atau Tulisan" aria-label="Search">
	</form>
</div>
<br>
<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
	<div class="list-group">
	    <div class="row mb-10" style="padding: 0px 10px 0px 10px;">
			<div class="media">
				<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
				<div class="media-body mt-5">
					<h5 class="card-title nametitle2">Marina Saraswati</h5>
					<p class="text-muted" style="margin-top:-10px;"><small><span>Hallo</span>
						<span class="ml-10">1 hours ago</span></small></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
	<div class="list-group">
	    <div class="row mb-10" style="padding: 0px 10px 0px 10px;">
			<div class="media">
				<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
				<div class="media-body mt-5">
					<h5 class="card-title nametitle2">Marina Saraswati</h5>
					<p class="text-muted" style="margin-top:-10px;"><small><span>Terima Kasih Atas Saran nya..</span>
						<span class="ml-10">1 hours ago</span></small></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
</body>
</html>
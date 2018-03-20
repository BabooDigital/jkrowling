
<body id="pageContent">
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
			<div class="container">
				<form class="navbar-brande">
					<a href="<?php echo site_url(); ?>listchapter/<?php echo $this->uri->segment(2); ?>">
					<i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> 
				</a>
			</form>
			<form class="form-inline">
				<!-- <button class="btn-transparant"><span>Selesai</span> &nbsp;&nbsp;<img src="<?php echo base_url() ?>public/img/icon-nav/publish.png" width="30" height="30"></button>  -->
				<!-- <label for="toggle-right" class="profile-toggle"><b>+</b></label> -->
			</form>
		</div>
	</nav>
</div>
<div class="container margin_cover">
	<div align="center">
		<div class="text-center">
			<div class="coverprev" align="center">
				<input type="hidden" id="uri" value="<?php echo $this->uri->segment(2); ?>">
				<p><img width="160" height="222" id="previews" src="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{
					echo base_url()."public/img/assets/def_prev.png";
				} ?>"></p>
				<input type="hidden" name="cover_name" id="cover_name" accept="image/*"  value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo ""; } ?>">
				<input type="hidden" name="cover_file" id="cover_file" accept="image/*">
				<input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'previews')" name="file_cover" value="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{ echo ""; } ?>">
			</div>
			<div class="min_padding">
				<p style="font-size: 16px;">Atau
					<input type="button" style="background: transparent; color: #b448cc;border: 0;cursor: pointer;" onclick="window.location.href = '<?php echo site_url('create_cover'); ?>';" value="Buat Disini" />
					<!-- <a href="<?php echo site_url(); ?>create_cover" style="color: #b448cc;"><b>Buat Di Sini</b></a></p> -->
				</div>
			</div>
			<div class="mt-40">
				<div class="form-group">
					<select class="form-control" id="category_ids" name="category_id" required>
										<option value="">Kategori</option>
									</select>
				</div>
			</div>
		</div>
	</div>
	<footer class="navbar navbar-expand-lg fixed-bottom baboonav" style="height:60px;">
		<div class="container">
			<button class="btn-publish" id="publish_book">Publish</button> 
		</div>
	</footer>
	<?php if (isset($js)): ?>
		<?php echo get_js($js)	 ?>
	<?php endif ?>
</body>
</html>
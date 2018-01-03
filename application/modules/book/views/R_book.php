
<body id="pageContent">
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
			<div class="container">
				<form class="navbar-brande">
					<i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> 
				</form>
				<form class="form-inline">
					<label class="btn-transparant" for="toggle-right" class="profile-toggle">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('') ?>/public/img/icon-tab/more_icon.svg"></label> 
					<!-- <label for="toggle-right" class="profile-toggle"><b>+</b></label> -->
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
				<span style="font-size: 18px;font-weight: 600;color: #141414;">Judul Buku</span>
				<hr>
				<div>
					<input type="hidden" name="book_id" id="book_id" value="<?php echo $detailBook['data']['book_info']['book_id']; ?>">
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
			<span class="paddingparagraph"><h3><?php echo $detailBook['data']['book_info']['title_book']; ?></h3></span>
			<div class="loader" style="display: none;"></div>
		</div>
		<div class="media">
			<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($detailBook['data']['author']['avatar'] == NULL){
				echo base_url('public/img/profile/blank-photo.jpg');
			}else{
				echo $detailBook['data']['author']['avatar']; } ?>" width="70" height="70" alt="Generic placeholder image">
				<div class="media-body mt-5">
					<span><h5 class="card-title nametitle2"><a href=""><?php
					echo $detailBook['data']['author']['author_name']; ?></a></h5></span>
					<p class="text-muted" style="margin-top:-10px;"><small><span>Jakarta, Indonesia</span>
						<p class="text-muted"><small><span><button type="submit" class="btn-topup">Follow</button></span></p>
						</div>
					</div>
				</div>
				<div class="detailbook">
					<?php 
					foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
						$data .= $book['paragraph_text'];
					}
					echo $data;
					?>
				</div>
				<hr>
				<div class="commentbook mb-60">
					<p><h4> Komentar <span style="color: #797979;">(2)</span></h4></p>
					<div class="media">
						<img class="d-flex align-self-start mr-20 rounded-circle" id="profpict" src="<?php $dat = $this->session->userdata('userData'); 
						if($dat['prof_pict'] == NULL){
							echo base_url('public/img/profile/blank-photo.jpg');
						}else{
							echo $dat['prof_pict']; } ?>" width="48" height="48" alt="<?php $dat = $this->session->userdata('userData'); echo $dat['fullname']; ?>">
							<div class="media-body mt-5">
								<div>
									<span>
										<input id="comments" placeholder="Tulis sesuatu.." type="text"  class="frmcomment commentform" style="width: 70%;height: 45px;">
										<button class="btn Rpost-comment">Kirim</button>
									</span>
								</div>
							</div>
						</div>
						<br>
						<br>
						<div id="Rbookcomment_list">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="navbar navbar-expand-lg fixed-bottom baboonav" style="height:60px;">
			<div class="container">

				<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 100</span> 
				<span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg">1200</span></p>
				<span><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg">540</span></p>
				<span><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg">540</span></p>
			</div>
		</footer>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
		<script type="text/javascript"></script>
		<script type="<?php echo base_url('') ?>/public/plugins/froala/js/plugins/image.min.js"></script>
	</body>
	</html>
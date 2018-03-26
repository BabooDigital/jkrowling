	<?php 
	$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
	$appid = '382931948848880';
	if (strpos($base, 'stg.baboo.id') !== false) {
		$appid = '1015515621929474';
	} elseif (strpos($base, 'localhost/jkrowling') !== false || strpos($base, 'dev-baboo.co.id') !== false) {
		$appid = '382931948848880';
	} elseif (strpos($base, 'baboo.id') !== false || strpos($base, 'www.baboo.id') !== false) {
		$appid = '142508586445900';
	}
	echo "<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=".$appid."';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>";
	?>
	<?php $this->load->view('navbar/D_navbar'); ?>	
	<style type="text/css">
	button {
		cursor: pointer;
	}
	.nav-tabs {
		border: none;
	}
	.arrowdraft {
		padding: 10px;
		border: 2px #da0707 solid;
	}
	.nav-pills .nav-link.active, .show>.nav-pills .nav-link {
		background-color: #7554bd !important;
		border-radius: 40px;
		padding: 5px 40px !important;
	}
	.btn-edprof {
		background: none;
		width: 45%;
		border-radius: 40px;
		border: solid 1px #797979;
		padding: 5px 20px;
	}
</style>
<div class="container babooidin">	
	<div class="row">
		<!-- Left Side -->
		<div class="col-md-3">
			<div class="">
				<div class="card mb-15">
					<div class="text-center pr-10 pl-10 pt-20">
						<div class="card-body p-0">
							<input type="hidden" id="iaiduui" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
							<img alt="<?php echo $userdata['name']; ?>" class="rounded-circle p-5" height="100" src="<?php if($userdata['prof_pict'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $userdata['prof_pict']; } ?>" style="border: .5px #7554bd solid;" width="100">
							<p class="mt-10"><b><?php echo $userdata['fullname']; ?></b></p>
							<p>Jakarta, Indonesia</p>
							<div class="quote">
								<p><?php echo $userdata['about_me']; ?></p>
							</div>
							<div class="mb-20">
								<?php if (!$this->uri->segment(2)): ?>
									<a data-toggle="modal" data-target="#edit-profile" href="#" class="btn-edprof fs-12px mr-10">Edit Profile</a> <a href="<?php echo site_url('message'); ?>" class="btn-edprof fs-12px">Message</a>
								<?php else: ?>
									<a href="#" data-follow="<?php echo $userdata['user_id']; ?>" class="btn-edprof fs-12px mr-10 <?php if ($userdata['isFollow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class=" txtfollow"><?php if ($userdata['isFollow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a>
									<input type="hidden" name="iaiduui" id="iaiduui" value="<?php $dat = $this->session->userdata('userData'); echo $dat['user_id']; ?>">
									<!-- <a href="#" data-follow="<?php echo $userdata['isFollow']; ?>" class="btn-edprof fs-12px mr-10 dbookfollowbtn <?php echo $userdata['isFollow']; ?> <?php if ($userdata['isFollow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow"><?php if ($userdata['isFollow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a> -->
								<?php endif ?>
							</div>
							<hr>
							<?php if (!$this->uri->segment(2)): ?>
								<div class="penghargaan">
									<label><b>Statistik</b></label>
								</div>
								<div class="dbooksociallist">
									<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_books.svg" width="27">
										<p class="mt-5"><?php echo $userdata['book_made']; ?></p></a>
									</div>
									<div class="dbooksociallist">
										<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_follower.svg" width="27">
											<p class="mt-5"><?php echo $userdata['followers']; ?></p></a>
										</div>
										<div class="dbooksociallist">
											<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_liker.svg" width="27">
												<p class="mt-5"><?php echo $userdata['ppl_like']; ?></p></a>
											</div>
											<div class="dbooksociallist">
												<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_soldbook.svg" width="27">
													<p class="mt-5"><?php echo $userdata['book_sold']; ?></p></a>
												</div><br>
							<!-- <div class="mt-100 mb-20" style="background: #fcfbff;padding: 15px;">
								<p><small>Buku Terjual</small></p>
								<p style="font-size: 25px;color: #7a5abf;font-weight: 700;">Rp. 25.500.000</p>
							</div> -->
						<?php endif ?>
					</div>
				</div>
			</div><!-- Trending -->
		</div>
	</div><!-- Mid Side -->
	<?php if (!$this->uri->segment(2)): ?>
		<div class="col-md-6" id="post-data">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item mr-50">
					<a class="nav-link mt-5 active" id="pills-publish-tab" data-toggle="pill" href="#pills-publish" role="tab" aria-controls="pills-publish" aria-selected="true">Publish</a>
				</li>
				<li class="nav-item">
					<a class="nav-link mt-5" id="pills-draft-tab" data-toggle="pill" href="#pills-draft" role="tab" aria-controls="pills-draft" aria-selected="false">Draft</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-publish" role="tabpanel" aria-labelledby="pills-publish-tab">
					<div id="publishdata">
						
					</div>
				</div>
				<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
				<div class="tab-pane fade" id="pills-draft" role="tabpanel" aria-labelledby="pills-draft-tab">
					<div id="draftdata">

					</div>
				</div>
			</div>
		</div><!-- Right Side -->
	<?php else: ?>
		<div class="col-md-6" id="post-data">
			<?php if (!empty($bookdata)) {
				foreach ($bookdata as $s_book) {  ?>
				<div class="card mb-15" style="padding: 0 10px 10px;">
					<div class="card-body p-0 p-20">
						<div class="row mb-20 pb-10" style="border-bottom: 1px rgba(225, 225, 225, 0.28) solid;">
							<div class="media">
								<a href="#"><img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
									echo base_url('public/img/profile/blank-photo.jpg');
								}else{
									echo $s_book['author_avatar']; } ?>" width="60" height="60" alt="<?php
									echo $s_book['author_name']; ?>"></a>
									<div class="media-body mt-5">
										<a data-usr-prf="<?php echo $s_book['author_id']; ?>" data-usr-name="<?php echo url_title($s_book['author_name'], 'dash', true); ?>" href="<?php echo site_url(); ?>profile/<?php echo url_title($s_book['author_name'], 'dash', true); ?>" class="profile"><h5 class="card-title nametitle2"><?php
										echo $s_book['author_name']; ?></h5></a>
										<p><small>
											<span><?php echo $s_book['publish_date'] ?></span></small></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="media w-100">
										<div class="media-body">
											<input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $s_book['book_id']; ?>">
											<input type="hidden" name="iaiduui" id="iaiduui" value="<?php $dat = $this->session->userdata('userData'); echo $dat['user_id']; ?>">
											<a href="<?php echo site_url(); ?>book/<?php
											echo $s_book['book_id']; ?>
											-<?php echo url_title($s_book['title_book'], 'dash', true); ?>
											">
											<input type="hidden" name="" class="dbooktitle" value="<?php echo $s_book['title_book']; ?>">
											<?php if ($s_book['cover_url'] != null): ?>
												<img class="effect-img d-flex align-self-start mr-20 float-left" src="<?php echo ($s_book['cover_url'] != 'Kosong') ? ($s_book['cover_url'] != null ? $s_book['cover_url'] : base_url('public/img/icon-tab/empty-set.png')) : base_url('public/img/icon-tab/empty-set.png'); ?>" width="120" height="170" alt="<?php
												echo $s_book['title_book']; ?>">
											<?php endif ?>
										</a>
										
										<h5 class="card-title nametitle3"><a onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php
										echo $s_book['book_id']; ?>
										-<?php echo url_title($s_book['title_book'], 'dash', true); ?>
										" id="book-link<?php
										echo $s_book['book_id']; ?>"><?php
										echo $s_book['title_book']; ?></a></h5>
										<p class="catbook"><a href="#" class="mr-20"><span class="btn-no-fill">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> <?php
										echo $s_book['view_count']; ?></span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php
										echo $s_book['share_count']; ?></span></p>
										<p class="text-desc-in desc<?php
										echo $s_book['book_id']; ?>"><span class="ptexts" style="font-family: 'Noto Serif', serif;"><?php
										echo $s_book['desc']; ?> </span><a class="segment" data-href="<?php
										echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>" onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>" class="readmore">Lanjut</a>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;border-radius: 15px;">
						<div class="pull-right">
							<div class="dropdown">
								<button class="share-btn dropbtn fs-14px" type="button" id="dropShare" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="23" class="mr-10"> Bagikan
								</button>
								<div class="dropdown-menu" aria-labelledby="dropShare">
									<a class="dropdown-item share-fb" href="javascript:void(0);" data-share="<?php echo $s_book['book_id']; ?>"><img src="<?php echo base_url(); ?>public/img/assets/fb-icon.svg" width="20"> Facebook</a>
								</div>
							</div>
						</div>
						<div>
							<a data-id="<?php echo $s_book['book_id']; ?>" href="javascript:void(0);" id="loveboo<?php echo $s_book['book_id']; ?>" class="mr-30 fs-14px <?php if($s_book['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>"><img src="<?php if($s_book['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="mr-10 loveicon" width="27"> <span class="<?php if($s_book['is_like'] == false){ echo 'txtlike'; }else{ echo 'txtunlike'; } ?>"><?php if($s_book['is_like'] == false){ echo 'Suka'; }else{ echo 'Batal Suka'; } ?></span></a>
							<a onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php
							echo $s_book['book_id']; ?>
							-<?php echo url_title($s_book['title_book'], 'dash', true); ?>#comment
							" id="commentboo" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>
						</div>
					</div>
				</div>
				<?php } }else {
				} ?>
			</div><!-- Right Side -->
		<?php endif ?>
		<div class="col-md-3 tmlin">
			<div class="">
				<!-- Buku Populer -->
				<div class="card mb-15">
					<div class="card-header">
						Terakhir Dibaca
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush" id="latestreadbook">

						</ul>
					</div>
				</div><!-- Buku Populer -->
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="width: 105% !important;height: 800px;">
			<div class="modal-body">
				<div class="container">
					<div class="alert alert-success" id="alert_success" style="display: none;">
					  <strong>Success!</strong> Data Updated.
					</div>
					<div class="col-lg-12 col-xl-12">
						<img src="<?php echo base_url();?>public/img/logo_purple.png" style="height:50px; margin-top:36px;">
					</div>
					<div class="col-lg-12 col-xl-12">
							<div class="row">
								<div class="col-lg-12" style="margin-top:55.1px;">
									<p class="text-img-modal"><h3><b>Edit Profile</b></h3></p>
									<br>
								</div>
								<div class="col-lg-12">
									<form id="profile-edit">
										<div class="form-group">
											<label>Nama Lengkap</label>
											<input type="text" class="required fullname error form-control login-input" id="fullname" name="fullname" placeholder="Nama Lengkap">
										</div>
										<div class="form-group">
											<label>Tanggal Lahir</label>
											<input type="date" class="required date_of_birth error form-control login-input" id="date_of_birth" name="date_of_birth" placeholder="Tanggal Lahir">
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<textarea class="required address error form-control login-input" id="address" name="address" placeholder="Alamat"></textarea>
											<!-- <input type="date" class="required date_of_birth error form-control login-input" id="date_of_birth" name="date_of_birth" placeholder="Tanggal Lahir"> -->
										</div>
										<div class="form-group">
											<label>Bio</label>
											<input type="text" class="about_me error form-control login-input" id="about_me" name="about_me" placeholder="About Me">
										</div>
										<div class="form-group">
											<div class="pull-left">
												<button type="submit" name="submit" class="btn btn-primary pull-right btn-login ikuti-lomba"><i class="icon-arrow-right"></i>Update Profile</button>
											</div>	
										</div>
										</form>
									</div>
								</div>
							</div>
						</div> 
						<!-- </form> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</body>
</html>

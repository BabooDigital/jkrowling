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
<body id="pageContent">
	<div class="lds-css ng-scope" style="display: none;"><div style="width:100%;height:100%" class="lds-eclipse"><img src="<?php echo base_url('public/img/splash_.png'); ?>" width="90" class="img-loading"><div></div><div></div><div></div><div></div><div></div></div></div>
	<?php $this->load->view('navbar/R_navbar'); ?>
	<div id="floating-btn">
		<a href="<?php echo site_url(); ?>create_mybook" class="floating-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></a>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div>
		<div class="babooid" align="center">
			<div class="row">
				<input type="hidden" id="iaiduui" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
			</div>
			<div class="profile">
				<div class="p-10 mt-10">
					<div class="profile_avatar">
					<div class="btn-setting" style="z-index: 9999;">
						<a href="<?php echo site_url(); ?>account/setting"><img src="<?php echo base_url('') ?>public/img/icon-tab/group_15.svg" width="23"></a>
					</div>
						<img alt="<?php echo $userdata['fullname']; ?>" class="rounded-circle ml-20" height="80" src="<?php if($userdata['prof_pict'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $userdata['prof_pict']; } ?>" style="border: .5px #7554bd solid;padding: 3px;" width="80">
						<br>
						<p class="label_name"><?php echo $userdata['fullname']; ?></p>
						<p class="profile_location"><?php echo $userdata['address']; ?></p>
						<p class="fs-14px quote"><?php echo $userdata['about_me']; ?></p>
						<hr>
						<div class="info">
							<img src="<?php echo base_url('') ?>public/img/icon-tab/book.svg"><b class="label_info">
								<?php echo $userdata['book_made']; ?></b>
								<p class="text-muted">Buku</p>
							</div>
							<div class="info">
								<img src="<?php echo base_url('') ?>public/img/icon-tab/followers.svg"><b
								class="label_info"> <?php echo $userdata['followers']; ?></b>
								<p class="text-muted">Pengikut</p>
							</div>
							<div class="info_last">
								<img src="<?php echo base_url('') ?>public/img/icon-tab/sale.svg"><b
								class="label_info"><?php echo $userdata['book_sold']; ?></b>
								<p class="text-muted">Terjual</p>
							</div>
							<br>
							<div class="profile_message">
								<a href="<?php echo site_url(); ?>account/edit" class="btn-profile"><img
									src="<?php echo base_url('') ?>public/img/assets/icon_edit.png" width="20"> Edit Profile
								</a>
								<a href="<?php echo site_url(); ?>pesan" class="btn-message"><img
									src="<?php echo base_url('') ?>public/img/icon-tab/message.svg" width="25">Pesan Masuk
								</a>
							</div>
							<br>
							<br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="babooid mb-60" style="overflow-y: hidden;overflow-x: hidden;">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div id="r_publishdata" class="w-100">
						<div class="loaderpubl mx-auto" style="display: none;"></div>

					</div>
					<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- JS -->

<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
</body>
</html>
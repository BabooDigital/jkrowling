<style>
#imageUpload
{
	display: none;
}

#profileImage
{
	cursor: pointer;
}

#profile-container {
	width: 100px;
	height: 100px;
	overflow: hidden;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	-o-border-radius: 50%;
	border-radius: 50%;
}

#profile-container img {
	width: 100px;
	height: 100px;
}
.btn-clear {
	background: none;
	border: none;
}
.right-posi {
	position: absolute;
	right: 30px;
}
.pininput {
    color: #fff;
	background: none;
    border: 2px #fff solid;
    border-radius: 50%;
    -webkit-text-security: disc;
}
.pininput:focus {
    border-color: #6450b3;
}
</style>
<?php 
	$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
	$appid = '196429547790304';
	if (strpos($base, 'stg.baboo.id') !== false) {
		$appid = '1677083049033942';
	} elseif (strpos($base, 'localhost/jkrowling') !== false || strpos($base, 'dev-baboo.co.id') !== false) {
		$appid = '196429547790304';
	} elseif (strpos($base, 'baboo.id') !== false || strpos($base, 'www.baboo.id') !== false) {
		$appid = '2093513617332249';
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
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
	<div class="bannerPopUp"></div>
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
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
					<div class="btn-setting" style="z-index: 500;position: absolute;right: 15px;">
						<a href="<?php echo site_url(); ?>account/setting"><img src="<?php echo base_url('') ?>public/img/icon-tab/group_15.svg" width="23"></a>
					</div>
					<div class="w-100 text-center">
						<div id="profile-container" class="mx-auto mb-10">
							<img id="profileImage" src="<?php if($userdata['prof_pict'] == null) {echo base_url('public/img/profile/blank-photo.jpg');}else{echo $userdata['prof_pict'];} ?>" style="object-fit: cover;" />
							</div>
							<input id="imageUpload" type="file" 
							name="profile_photo" placeholder="Photo" required="">
						</div>
						<p class="label_name"><?php echo $userdata['fullname']; ?></p>
						<p class="profile_location"><?php echo $userdata['address']; ?></p>
						<p class="fs-14px quote p-0"><?php echo $userdata['about_me']; ?></p>
						<?php $name = $this->session->userdata('userData'); if ($name['user_id'] == $userdata['user_id']): ?>
							<p class="fs-14px">( <?php echo $userdata['email']; ?> )</p>
						<?php endif ?>
						<hr>
						<div class="info">
							<img src="<?php echo base_url('') ?>public/img/icon-tab/book.svg"><b class="label_info">
								<?php echo $userdata['book_made']; ?></b>
								<p class="text-muted">Buku</p>
							</div>
							<div class="info">
								<img src="<?php echo base_url('') ?>public/img/icon-tab/followers.svg"><b
								class="label_info"> <?php echo $userdata['followers']; ?></b>
								<p class="text-muted">Teman</p>
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
								<a href="<?php echo site_url(); ?>message" class="btn-message"><img
									src="<?php echo base_url('') ?>public/img/icon-tab/message.svg" width="25">Pesan Masuk
								</a>
							</div>
							<br>
							<br>
						</div>
					</div>
				</div>
				<div class="bg-white pb-20">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="pt-5 pb-5 pl-10 pr-10" style="background-color: #7661ca;border-radius: 10px;">
									<?php $pin = $this->session->userdata('hasPIN'); if ($pin == 1) { ?>
									<p class="text-left"><img src="<?php echo base_url('public/img/assets/icon_wallet_white.png'); ?>" class="img-fluid" width="20"> <span class="text-white">Dompet</span> <button type="button" class="float-right btn-detdomp" data-toggle="modal" data-target="pinauth-modal" style="width: 20%;font-size: 13px;">Detail</button></p>
									<p class="text-left mt-15"><button class="btn-transparant text-white btnActive" style="font-size: 20px;font-weight: 800;">Rp <?php echo number_format($userdata['balance'] , 0, ',', '.'); ?></button></p>
									<?php }else{ ?>
									<p class="text-left"><img src="<?php echo base_url('public/img/assets/icon_wallet_white.png'); ?>" class="img-fluid" width="20"> <span class="text-white">Dompet</span></p>
									<p class="text-left mt-30"><button class="btn-transparant text-white btnActive activeDompet" style="font-size: 18px;">Aktifkan Sekarang ></button></p>
									<?php } ?>
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
<?php $pin = $this->session->userdata('hasPIN'); if ($pin == 1) { ?>
<?php $this->load->view('include/modal_pin'); ?>
<?php }else{ ?>
<?php } ?>
<!-- JS -->

<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
<script>
	var getHashDaft = window.location.hash;
	if (getHashDaft != "" && getHashDaft == "#PINauth") {
		$('#pinauth-modal').modal('toggle');
	}
	$(document).ready(function () {
		keyupPIN();
	});
</script>
	<?php echo $this->session->flashdata('fail_alert'); ?>
</body>
</html>
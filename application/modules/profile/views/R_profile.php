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
				<div class="profile_padding">
					<div class="btn-setting">
						<a href="<?php echo site_url(); ?>account/setting"><img src="<?php echo base_url('') ?>public/img/icon-tab/group_15.svg"></a>
					</div>
					<br>
					<div class="profile_avatar">
						<img alt="<?php echo $userdata['fullname']; ?>" class="rounded-circle ml-20" height="70" src="<?php if($userdata['prof_pict'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $userdata['prof_pict']; } ?>" style="border: .5px #7554bd solid;padding: 3px;" width="70">
						<br>
						<p class="label_name"><?php echo $userdata['fullname']; ?></p>
						<p class="profile_location">Jakarta , Indonesia</p>
						<p class="fs-14px quote">We Are Avalaible For Freelance Work. mail on</p>
						<span class="fs-14px quote">( <?php echo $userdata['email']; ?> )</span>
						<hr>
						<div class="info">
							<img src="<?php echo base_url('') ?>public/img/icon-tab/book.svg"><b class="label_info">
								<?php echo $userdata['book_made']; ?></b>
								<p>Buku</p>
							</div>
							<div class="info">
								<img src="<?php echo base_url('') ?>public/img/icon-tab/followers.svg"><b
								class="label_info"> <?php echo $userdata['followers']; ?></b>
								<p>Pengikut</p>
							</div>
							<div class="info_last">
								<img src="<?php echo base_url('') ?>public/img/icon-tab/sale.svg"><b
								class="label_info"><?php echo $userdata['book_sold']; ?></b>
								<p>Terjual</p>
							</div>
							<hr>
							<div class="profile_message">
								<a href="<?php echo site_url(); ?>account/edit" class="btn-profile"><img
									src="<?php echo base_url('') ?>public/img/icon-tab/add_follow.svg">Edit Profile
								</a>
								<button class="btn-message"><img
									src="<?php echo base_url('') ?>public/img/icon-tab/message.svg">Pesan Masuk
								</button>
							</div>
							<br>
							<br>
							<br>
							<div class="profile_balance">
								<button class="btn-details-balance">Details</button>
								<span class="label_balance"><img
									src="<?php echo base_url('') ?>public/img/icon-tab/group_14.svg"><b> Balance</b></span>
									<br>
									<p class="profile_nominal"><b>Rp 5.100.000</b></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="babooid" style="overflow-y: hidden;overflow-x: hidden;">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<main class="main-md">
						<input class="input-md" id="tab1" type="radio" name="tabs" checked>
						<label class="label-md ml-10" for="tab1">Buku</label>
						<input class="input-md" id="tab2" type="radio" name="tabs">
						<label class="label-md ml-10" for="tab2">Draft</label>
						<input class="input-md" id="tab3" type="radio" name="tabs">
						<section class="section-md" id="content1" style="background: #ebf0f4;">
							<div id="r_publishdata">
								<div class="loaderpubl mx-auto" style="display: none;"></div>

							</div>
						</section>
						<section class="section-md" id="content2" style="background: #ebf0f4;">
							<div id="r_draftdata">
								<div class="loaderdraft mx-auto" style="display: none;"></div>
								
							</div>
						</section>
					</main>
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

<body id="pageContent">

	<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
		<?php $this->load->view('navbar/R_navbar'); ?>	
	</nav>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div>	
		<div class="container babooid" align="center">
			<div class="row">
				<br>
				<div class="loader" style="display: none;"></div>
				<div class="profile">
					<div class="profile_padding">
						<div class="btn-setting">
							<a href="#"><img src="<?php echo base_url('') ?>public/img/icon-tab/group_15.svg"></a>
						</div>
						<br>
						<div class="profile_avatar">
							<img class="d-flex align-self-start rounded-circle" src="<?php if(@$s_book['author_avatar'] == NULL){
								echo base_url('public/img/profile/blank-photo.jpg');
							}else{
								echo $s_book['author_avatar']; } ?>" width="70" height="70" alt="Generic placeholder image">
								<br>
								<p class="label_name"><h4><b>Rizaldi</b></h4></p>
								<p class="profile_location">Jakarta , Indonesia</p>
								<p class="quote">We Are Avalaible For Freelance Work. mail on (Rizaldi354313@gmail.com)</p>
								<hr>
								<div class="info">
									<img src="<?php echo base_url('') ?>public/img/icon-tab/book.svg"><b class="label_info"> 5</b>
									<p>Buku</p>
								</div>
								<div class="info">
									<img src="<?php echo base_url('') ?>public/img/icon-tab/followers.svg"><b class="label_info"> 2.000K</b>
									<p>Pengikut</p>
								</div>
								<div class="info_last">
									<img src="<?php echo base_url('') ?>public/img/icon-tab/sale.svg"><b class="label_info">5</b>
									<p>Terjual</p>
								</div>
								<hr>
								<div class="profile_message">
									<button class="btn-profile"><img src="<?php echo base_url('') ?>public/img/icon-tab/add_follow.svg">Edit Profile</button>
									<button class="btn-message"><img src="<?php echo base_url('') ?>public/img/icon-tab/message.svg">Pesan Masuk</button>
								</div>
								<br>
								<br>
								<br>
								<div class="profile_balance">
									<button class="btn-details-balance">Details</button>
									<span class="label_balance"><img src="<?php echo base_url('') ?>public/img/icon-tab/group_14.svg"><b> Balance</b></span>
									<br>
									<p class="profile_nominal"><b>Rp 200.000.000.000.000</b></p>
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
						<label class="label-md" for="tab1">Buku</label>
						<input class="input-md" id="tab2" type="radio" name="tabs">
						<label class="label-md" for="tab2">Draft</label>
						<input class="input-md" id="tab3" type="radio" name="tabs">
						<section class="section-md" id="content1">
							<div class="cards" style="padding: 0 00px;">
								<div class="card-body p-0 p-20">
									<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
										<div class="media">
											<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
											<div class="media-body mt-5">
												<h5 class="card-title nametitle2">Marina Saraswatis</h5>
												<p class="text-muted" style="margin-top:-10px;"><small><span>Jakarta, Indonesia</span>
													<span class="ml-10">1 hours ago</span></small></p>
												</div>
											</div>
										</div>
										<div class="row" style="padding: 0px 10px 0px 10px;">
											<div class="media">
												<img src="<?php echo base_url(); ?>public/img/book-cover/cover_hori.png" style="width: 100%;height: 200px;">
											</div>
											<h5 style="padding-top:50px; font-weight: 500;"><b>Story of Diana</b></h5>
											<div style="margin-top:10px;">
												<a href="#" class="mr-10"><span style="font-size:12px;border: 1px #7554bd solid;border-radius: 25px;padding: 3px 10px;color: #7554bd;">FIKSI</span></a> <span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 290</span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> 12</span></p>
												<p style="font-size:16px; font-family: Roboto; margin-top:20px;	">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.
												</div>
											</div>
										</div>
										<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
											<div class="pull-right">
												<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="18"></a>
											</div>
											<div>
												<a href="#" class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" class="mr-5" width="27"></a>
												<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"></a>
											</div>
										</div>
									</div>
								</section>
								<section class="section-md" id="content2">
									<p>
										<div class="card mb-15" style="padding: 0 00px;">
										<div class="card-body p-0 p-20">
										<label style="float: right;color: red;">Draft</label>
											<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
												<div class="media">
													<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
													<div class="media-body mt-5">
														<h5 class="card-title nametitle2">Marina Saraswati</h5>
														<p class="text-muted" style="margin-top:-10px;"><small><span>Jakarta, Indonesia</span>
															<span class="ml-10">1 hours ago</span></small></p>
													</div>
												</div>
											</div>
											<div class="row" style="padding: 0px 10px 0px 10px;">
												<div style="float:left;width:40%;height: auto;">
								    				<img src="https://spark.adobe.com/images/landing/examples/how-to-book-cover.jpg" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5); height:100%;width: 100%;margin-left: -5px;">
								    			</div>
								    			 <div style="float: left;width:60%;height: auto;">
								                    <div style="padding: 10px;">
								                    	<b style="font-size: 16px;">Kite Runner - Powerfull Hunting</b>
										    			<div style="padding-top: 10px;"></div><span style="font-size:12px;border: 1px #7554bd solid;border-radius: 25px;padding: 3px 10px;color: #7554bd;">FIKSI</span>
										    			<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> 290</span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> 12</span></p>
										    			<div style="padding-top: 10px;"></div>
														<div id="content">
															<p style="font-size:16px; font-family: Roboto;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
														</div>
								                    </div>	
								                 </div>	
											</div>
										</div>
										<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
											<div class="pull-right">
												<button><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="18"> Edit</button>
											</div>
											<div>
												<a href="#" class="mr-20"><img src="<?php echo base_url(); ?>public/img/icon-tab/dustbin.svg" class="mr-5" width="27"></a>
											</div>
										</div>
									</div>
									</p>
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
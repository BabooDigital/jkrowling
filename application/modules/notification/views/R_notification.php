
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
		<div class="container bodymessage">
			<div class="paddingbook search_message">

			</div>
			<br>
			<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
				<div class="list-group">
					<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
						<div class="media">
							<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
							<div class="media-body mt-5">
								<span class="nametitle2">Marina Saraswati</span> <span class="text-muted fontkecil">Mulai mengikuti tulisan anda</span>
								<span class="button_follow">
									<img class="img_follow" src="<?php echo base_url(); ?>public/img/icon-tab/add_follow.svg">
								</span>
									<p class="text-muted fontkecil">1 hours ago</p></small></p>
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
								<span class="nametitle2">Marina Saraswati</span> <span class="text-muted fontkecil">Mulai mengikuti tulisan anda</span><span class="button_follow">
									<img class="img_follow" src="<?php echo base_url(); ?>public/img/icon-tab/add_follow.svg">
								</span>
									<p class="text-muted fontkecil">1 hours ago</p></small></p>
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
								<span class="nametitle2">Marina Saraswati</span> <span class="text-muted fontkecil">Mengomentari tulisan anda</span><span class="button_follow">
							</div>
						</div>
					</div>
					<div class="row" style="padding: 0px 10px 0px 10px;">
						<div class="media">
							<img src="<?php echo base_url(); ?>public/img/book-cover/cover_hori.png" style="width: 100%;">
						</div>
						<h5 style="padding-top:20px; font-weight: 500;"><b>Story of Diana</b></h5>
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

<body id="pageContent">
	<div class="lds-css ng-scope" style="display: none;"><div style="width:100%;height:100%" class="lds-eclipse"><img src="<?php echo base_url('public/img/splash_.png'); ?>" width="90" class="img-loading"><div></div><div></div><div></div><div></div><div></div></div></div>
		<?php $this->load->view('navbar/R_navbar'); ?>	
	<div id="floating-btn">
		<a href="<?php echo site_url(); ?>create_mybook" class="floating-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></a>
	</div>

	<div class="mt-130">
	<div class="">
		<ul class="list-unstyled">
			<?php foreach ($notification as $val_notif): ?>
			<?php if ($val_notif->notif_type->notif_type_id == 1): ?>
				<li class="media bg-white p-15" style="align-items: center;">
					<a href="#" style="display: flex;"><img alt="Follow you" class="mr-3 mt-10" height="30" src="<?php echo base_url('public/img/assets/notif_follow.png'); ?>" width="30"> <img alt="Generic placeholder image" class="mr-3 rounded-circle" height="50" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="50">
					<div class="media-body">
						<p><b><?php echo $val_notif->notif_user->fullname; ?></b> <span class="text-muted">mulai mengikuti tulisan anda</span></p>
						<p class="text-muted" style="font-size: 11px;">1 hours ago</p>
					</div></a>
					<div class="float-right">
						<a href="#"><img src="<?php echo base_url('public/img/icon-tab/add_follow.svg'); ?>" width="40"></a>
					</div>
				</li>
			<?php elseif ($val_notif->notif_type->notif_type_id == 2): ?>
				<li class="media bg-white p-15" style="align-items: center;">
					<a href="#" style="display: flex;">
					<div class="container">
						<div class="row mb-10">
							<img alt="Follow you" class="mr-3 mt-10" height="30" src="<?php echo base_url('public/img/assets/notif_comment.png'); ?>" width="30"> <img alt="Generic placeholder image" class="mr-3 rounded-circle" height="50" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="50">
							<div class="media-body">
								<p><b><?php echo $val_notif->notif_user->fullname; ?></b> <span class="text-muted">Mengomentari tulisan anda</span></p>
							</div>
						</div>
						<div class="row">
							<img src="http://placehold.it/1000x200" style="width: 100%;height: 150px;">
							<div class="mt-10 w-100">
								<h4><b>Story of Diana</b></h4>
								<p><span class="mr-20">Fiksi</span><span>Remaja</span> <span class="text-muted float-right" style="font-size: 11px;">1 hours ago</span></p>
							</div>
						</div>
					</div></a>
				</li>
			<?php elseif ($val_notif->notif_type->notif_type_id == 3): ?>
				<li class="media bg-white p-15" style="align-items: center;">
					<a href="#" style="display: flex;">
					<div class="container">
						<div class="row mb-10">
							<img alt="Follow you" class="mr-3 mt-10" height="30" src="<?php echo base_url('public/img/assets/notif_like.png'); ?>" width="30"> <img alt="Generic placeholder image" class="mr-3 rounded-circle" height="50" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="50">
							<div class="media-body">
								<p><b><?php echo $val_notif->notif_user->fullname; ?></b> <span class="text-muted">Menyukai tulisan anda</span></p>
							</div>
						</div>
						<div class="row">
							<img src="http://placehold.it/1000x200" style="width: 100%;height: 150px;">
							<div class="mt-10 w-100">
								<h4><b>Story of Diana</b></h4>
								<p><span class="mr-20">Fiksi</span><span>Remaja</span> <span class="text-muted float-right" style="font-size: 11px;">1 hours ago</span></p>
							</div>
						</div>
					</div></a>
				</li>
			<?php elseif ($val_notif->notif_type->notif_type_id == 4): ?>
				<li class="media bg-white p-15" style="align-items: center;">
					<a href="#" style="display: flex;"><!-- <img class="mr-3 rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="50" height="50" alt="Generic placeholder image"> -->
					<div class="media-body">
						<p>Buku anda <b>Story of My Life</b> <span class="text-muted">Telah diterbitkan.</span></p>
						<p class="text-muted" style="font-size: 11px;">1 hours ago</p>
					</div></a>
				</li>
			<?php endif ?>
			<?php endforeach ?>
		</ul>
	</div>
</div>
	<!-- JS -->

	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>
</body>
</html>
<style type="text/css">
.bg-read {
	background: #f7f7f7 !important;
}
img {
	object-fit: cover;
}
</style>
<body id="pageContent">
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
	<div class="bannerPopUp"></div>
	<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
	<div class="lds-css ng-scope" style="display: none;"><div style="width:100%;height:100%" class="lds-eclipse"><img src="<?php echo base_url('public/img/splash_.png'); ?>" width="90" class="img-loading"><div></div><div></div><div></div><div></div><div></div></div></div>
	<?php $this->load->view('navbar/R_navbar'); ?>	
	<div id="floating-btn">
		<a href="<?php echo site_url(); ?>create_mybook" class="floating-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></a>
	</div>

	<div class="mt-130">
		<div class="">
			<?php if (!empty($notification)) { ?>
			<ul class="list-unstyled mb-70">
				<?php foreach ($notification as $val_notif){ 
					if ($val_notif->notif_type->notif_type_id == 1){ ?>
					<li class="media <?php if($val_notif->notif_status == 'unread'){echo "bg-white";}else{ echo "bg-read";} ?> p-15" style="align-items: center;border-bottom: 1px #efefef solid;">
						<a class="notifclick" href="<?php echo site_url(); ?>profile/<?php echo $val_notif->notif_user->user_id; ?>-<?php echo url_title($val_notif->notif_user->fullname, 'dash', true); ?>" style="display: flex;" notifid="<?php echo $val_notif->notif_id; ?>"><img alt="Follow you" class="mr-3 mt-10" height="30" src="<?php echo base_url('public/img/assets/notif_follow.png'); ?>" width="30"> <img alt="<?php echo $val_notif->notif_user->fullname; ?>" class="mr-3 rounded-circle" height="50" src="<?php if ($val_notif->notif_user->prof_pict == null) {echo base_url('public/img/profile/blank-photo.jpg'); }else{echo $val_notif->notif_user->prof_pict; } ?>" width="50">
							<div class="media-body">
								<p><b><?php echo $val_notif->notif_user->fullname; ?></b> <span class="text-muted"><?php echo $val_notif->notif_text; ?></span></p>
								<p class="text-muted" style="font-size: 11px;"><?php echo $val_notif->notif_time; ?></p>
							</div></a>
							<!-- <div class="float-right">
								<a href="#"><img src="<?php echo base_url('public/img/icon-tab/add_follow.svg'); ?>" width="40"></a>
							</div> -->
						</li>
						<?php }elseif ($val_notif->notif_type->notif_type_id == 2){ ?>
						<li class="media <?php if($val_notif->notif_status == 'unread'){echo "bg-white";}else{ echo "bg-read";} ?> p-15" style="align-items: center;border-bottom: 1px #efefef solid;">
							<a class="notifclick" href="<?php echo site_url(); ?>book/<?php echo $val_notif->notif_book->book_id; ?>-<?php echo url_title($val_notif->notif_book->title_book, 'dash', true); ?>" style="display: flex;" notifid="<?php echo $val_notif->notif_id; ?>">
								<div class="container">
									<div class="row mb-10">
										<img alt="Comment you" class="mr-3 mt-10" height="30" src="<?php echo base_url('public/img/assets/notif_comment.png'); ?>" width="30"> <img alt="<?php echo $val_notif->notif_user->fullname; ?>" class="mr-3 rounded-circle" height="50" src="<?php if ($val_notif->notif_user->prof_pict == null) {echo base_url('public/img/profile/blank-photo.jpg'); }else{echo $val_notif->notif_user->prof_pict; } ?>" width="50">
										<div class="media-body">
											<p><b><?php echo $val_notif->notif_user->fullname; ?></b> <span class="text-muted"><?php echo $val_notif->notif_text; ?></span></p>
										</div>
									</div>
									<div class="row">
										<!-- <img src="http://placehold.it/1000x200" style="width: 100%;height: 150px;"> -->
										<div class="mt-10 w-100">
											<h4><b><?php echo $val_notif->notif_book->title_book; ?></b></h4>
											<p><span class="mr-20"><?php echo $val_notif->notif_book->book_genre->category_name; ?></span> <span class="text-muted float-right" style="font-size: 11px;"><?php echo $val_notif->notif_time; ?></span></p>
										</div>
									</div>
								</div></a>
							</li>
							<?php }elseif ($val_notif->notif_type->notif_type_id == 3){ ?>
							<li class="media <?php if($val_notif->notif_status == 'unread'){echo "bg-white";}else{ echo "bg-read";} ?> p-15" style="align-items: center;border-bottom: 1px #efefef solid;">
								<a class="notifclick" href="<?php echo site_url(); ?>book/<?php echo $val_notif->notif_book->book_id; ?>-<?php echo url_title($val_notif->notif_book->title_book, 'dash', true); ?>" style="display: flex;" notifid="<?php echo $val_notif->notif_id; ?>">
									<div class="container">
										<div class="row mb-10">
											<img alt="Like your book" class="mr-3 mt-10" height="30" src="<?php echo base_url('public/img/assets/notif_like.png'); ?>" width="30"> <img alt="<?php echo $val_notif->notif_user->fullname; ?>" class="mr-3 rounded-circle" height="50" src="<?php if ($val_notif->notif_user->prof_pict == null) {echo base_url('public/img/profile/blank-photo.jpg'); }else{echo $val_notif->notif_user->prof_pict; } ?>" width="50">
											<div class="media-body">
												<p><b><?php echo $val_notif->notif_user->fullname; ?> </b> <span class="text-muted"> <?php echo $val_notif->notif_text; ?></span></p>
											</div>
											<span class="text-muted float-right" style="font-size: 11px;"><?php echo $val_notif->notif_time; ?></span>
										</div>
										<!-- <div class="row">
											<img src="http://placehold.it/1000x200" style="width: 100%;height: 150px;">
											<div class="mt-10 w-100">
												<h4><b>Story of Diana</b></h4>
												<p><span class="mr-20">Fiksi</span><span>Remaja</span>  -->
												<!-- </p>
											</div>
										</div>  -->
									</div></a>
								</li>
								<?php }elseif ($val_notif->notif_type->notif_type_id == 4){ ?>
								<li class="media <?php if($val_notif->notif_status == 'unread'){echo "bg-white";}else{ echo "bg-read";} ?> p-15" style="align-items: center;border-bottom: 1px #efefef solid;">
									<a class="notifclick" href="<?php echo site_url(); ?>book/<?php echo $val_notif->notif_book->book_id; ?>-<?php echo url_title($val_notif->notif_book->title_book, 'dash', true); ?>" style="display: flex;" notifid="<?php echo $val_notif->notif_id; ?>">
										<!-- <img class="mr-3 rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="50" height="50" alt="<?php echo $val_notif->notif_user->fullname; ?>"> -->
										<div class="media-body">
											<p>Buku anda <b><?php echo $val_notif->notif_book->title_book; ?></b> <span class="text-muted"><?php echo $val_notif->notif_text; ?></span></p>
											<p class="text-muted" style="font-size: 11px;"><?php echo $val_notif->notif_time; ?></p>
										</div></a>
									</li>
									<?php }elseif ($val_notif->notif_type->notif_type_id == 5) { ?>
									<li class="media <?php if($val_notif->notif_status == 'unread'){echo "bg-white";}else{ echo "bg-read";} ?> p-15" style="align-items: center;border-bottom: 1px #efefef solid;">
									<a class="notifclick" href="<?php echo site_url('dompet'); ?>" style="display: flex;" notifid="<?php echo $val_notif->notif_id; ?>">
										<!-- <img class="mr-3 rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="50" height="50" alt="<?php echo $val_notif->notif_user->fullname; ?>"> -->
										<div class="media-body">
											<p><span class="text-muted"><?php echo ucfirst($val_notif->notif_text); ?></span></p>
											<p class="text-muted" style="font-size: 11px;"><?php echo $val_notif->notif_time; ?></p>
										</div></a>
									</li>
									<?php } } ?>
								</ul>
								<?php }else{ ?>
								<div class='container first_login mt-50'> <div class='row'> <div class='col-12 mx-auto' style='width: 85%;'> <div class='text-center mb-10 mr-50 mt-50'> <img src='<?php echo base_url('public/img/icon_notification.png'); ?>' width='190'> </div> <div class='text-center'> <h5><b>Tidak Aktivitas Pemberitahuan</b></h5> </div> </div> </div> </div>
								<?php } ?>
							</div>
						</div>
						<!-- JS -->

						<?php if (isset($js)): ?>
							<?php echo get_js($js) ?>
						<?php endif ?>
						<script type="text/javascript">
							$(document).on('click', '.notifclick', function() {
								var ntf = $(this).attr('notifid');
								$.ajax({
									url: 'updatentf',
									type: 'POST',
									dataType: '',
									data: {ntf: ntf},
								})
								.done(function(data) {

								})
								.fail(function() {
								})
								.always(function() {
								});
							});
						</script>
					</body>
					</html>
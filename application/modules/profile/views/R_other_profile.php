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
								<a href="<?php echo site_url(); ?>pesan" class="btn-profile"><img
									src="<?php echo base_url('') ?>public/img/icon-tab/icon_message.svg" width="20"> Kirim Pesan
								</a>
								<?php if($userdata['isFollow'] == false) { ?>
								<a href="javascript:void();" class="btn-message">
									<img src="<?php echo base_url('') ?>public/img/icon-tab/add_follow.svg" width="25">
									Follow
								</a>
								<?php }else { ?>
								<a href="javascript:void();" class="btn-message">
									Unfollow
								</a>
								<?php } ?>
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
				<div class="w-100">
					<?php foreach ($bookdata as $book) { ?>
					<div class='card mb-15 p-0'>
						<div class='card-body p-0 pl-30 pr-30 pt-15'>
							<div class='row mb-10 pl-15 pr-15'>
								<div class='media'>
									<img alt='<?php echo $book['author_name']; ?>' class='d-flex align-self-start mr-20 rounded-circle' height='50' src='<?php echo $book['author_avatar']; ?>' width='50'>
									<div class='media-body mt-5'>
										<h5 class='card-title nametitle2'><a href='javascript:void(0);' class="author_name"><?php echo $book['author_name']; ?></a></h5>
										<p class='text-muted' style='margin-top:-10px;'><small>
											<span><?php echo $book['publish_date']; ?></span></small></p>
										</div>
									</div>
								</div>
								<div class='media'>
									<a href='<?php echo site_url(); ?>book/<?php echo $book['book_id']; ?>-<?php echo url_title($book['title_book'], 'dash', true); ?>' class="segment" data-href="<?php echo $book['book_id']; ?>-<?php echo url_title($book['title_book'], 'dash', true); ?>"><img alt='<?php echo $book['title_book']; ?>' class='w-100 imgcover cover_image' src='<?php echo $book['cover_url']; ?>'></a>
								</div><a href='<?php echo site_url(); ?>book/<?php echo $book['book_id']; ?>-<?php echo url_title($book['title_book'], 'dash', true); ?>'>
									<h5 class='pt-20 w-100' style='font-weight: 700;'><b class="dbooktitle"><?php echo $book['title_book']; ?></b></h5></a>
									<div class='w-100'>
										<span class='mr-8' style='font-size: 12px;'><?php echo $book['category']; ?> &#8226;</span> <span class='text-muted' style='font-size: 11px;'>Dibaca <?php echo $book['view_count']; ?> kali</span>
										<p class='mt-10 textp' data-text="<?php echo substr($book['desc'],0,200); ?>"><?php echo substr($book['desc'],0,200); ?> ...</p>
									</div>
								</div>
								<div class='bg-white card-footer text-muted pr-30 pl-30' style='font-size: 0.8em;font-weight: bold;'>
									<div class='pull-right'>
										<div class='dropdown'>
											<button class='share-btn dropbtn' type='button' id='dropShare' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
												<img src='../public/img/assets/icon_share.svg' width='23'>
											</button>
											<div class='dropdown-menu' aria-labelledby='dropShare'>
												<a class='dropdown-item share-fb' href='javascript:void(0);' data-share='<?php echo $book['book_id']; ?>'><img src='../public/img/assets/fb-icon.svg' width='20'> Facebook</a>
											</div>
										</div>
									</div>
									<div>
										<a data-id='<?php echo $book['book_id']; ?>' href='javascript:void(0);' class="<?php if($book['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>"><img class='mr-20 loveicon' src='<?php if($book['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>' width='27'></a> <a href='<?php echo site_url(); ?>book/<?php echo $book['book_id']; ?>-<?php echo url_title($book['title_book'], 'dash', true); ?>#comments'><img class='mr-10' src='<?php echo base_url('public/img/assets/icon_comment.svg'); ?>' width='25'></a>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
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
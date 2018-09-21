<?php $this->load->view('navbar/D_navbar'); ?>
<div class="container mt-80">
	<div class="row mb-5">
		<div class="col-2"></div>
		<div class="col-8">
			<?php echo $this->load->view('ads/top_mid_ad'); ?>
		</div>
		<div class="col-2"></div>
	</div>
	<div class="row">
		<!-- Left Side -->
		<div class="col-3 tmlin">
			<div class="stickymenu">
				<!-- Penulis Minggu Ini -->
				<div class="side-card mb-15">
					<div class="card-header">
						Penulis minggu ini
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush" id="author_this_week">
							<?php foreach ($writter as $best_writter):
								$urlToUser = url_title($best_writter['author_name'], 'dash', true).'-'.$best_writter['author_id'];
							 ?>
							<?php if ($best_writter['avatar'] == "" || $best_writter == null): ?>
								<?php $img =  base_url().'public/img/profile/blank-photo.jpg'; ?>
							<?php else: ?>
								<?php $img = $best_writter['avatar']; ?>
							<?php endif ?>
							<?php $usD = $this->session->userdata('userData'); if ($best_writter['isFollow'] == false && $best_writter['author_id'] != $usD['user_id']): ?>
								<?php $follow = "<a href='#' data-follow='".$best_writter['author_id']."' class='addbutton followprofile'><img src='public/img/assets/icon_plus_purple.svg' width='20' class='mt-img'></a>"; ?>
							<?php else: ?>
								<?php $follow = ""; ?>
							<?php endif ?>
							<li class='media baboocontent'>
								<a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"><img class='d-flex mr-3 rounded-circle' src='<?php echo $img; ?>' width='50' height='50'></a>
								<div class='media-body mt-7'>
									<a class='' data-usr-prf='<?php echo $best_writter['author_id']; ?>' data-usr-name='<?php echo url_title($best_writter['author_name']); ?>' href='<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>'>
										<h5 class='mt-5 mb-1 nametitle'><?php echo $best_writter['author_name']; ?></h5>
									</a>
									<div class='pull-right baboocolor'><?php echo $follow; ?></div>
								</div>
							</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
                <div class="side-card mb-15" style="background: transparent;">
                    <div class="card-body p-0">
                    	<?php echo $this->load->view('ads/250_side_ad'); ?>
                    </div>
                </div>
			</div>
		</div>

		<!-- Mid Side -->
		<div class="col-6 mb-50">
            <div>
                <ul class="nav nav-pills nav-fill" id="myBtnContainer">
                    <li class="nav-item">
                        <a href="<?php echo site_url(); ?>" class="nav-link nav-btn_list nav-btn_link" >Semua</a>
                    </li>
                    <li class="nav-item dropdown nav-btn_dropdown">
                        <a href="?category=agama" class="nav-link nav-btn_list dropdown-toggle nav-btn_link btn-cat_select" dat-category="agama">Agama</a>
                        <div class="dropdown-menu">
                            <a href="?category=agama&sub=islam" class="dropdown-item btn-cat_select" dat-category="islam">Islam</a>
                            <a href="?category=agama&sub=kristen" class="dropdown-item btn-cat_select" dat-category="kristen">Kristen</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-btn_dropdown">
                        <a href="?category=pendidikan" class="nav-link nav-btn_list dropdown-toggle nav-btn_link btn-cat_select" dat-category="pendidikan">Pendidikan</a>
                        <div class="dropdown-menu">
                            <a href="?category=pendidikan&sub=journals" class="dropdown-item btn-cat_select" dat-category="journals">Jurnal</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="?category=politik" class="nav-link nav-btn_list nav-btn_link btn-cat_select" >Politik</a>
                    </li>
                </ul>
            </div>
			<div id="post-data" class="mt-15">
				<?php $this->load->view('data/D_Timeline_in', $home); ?>
			</div>
			<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
		</div>

		<!-- Right Side -->
		<div class="col-3 tmlin">
				<?php echo $this->load->view('ads/250_side_ad'); ?>
			<div class="stickymenu">
				<!-- <div class="card card-widget mb-15">
					<a href="<?php echo base_url('event') ?>">
						<img src="https://s3-us-west-2.amazonaws.com/s3.baboo.id/baboo-cover/hasil-web.png" style="width:100%;height: 100%;">
					</a>
				</div> -->
				<!-- Buku Populer -->
				<div class="side-card mb-15">
					<div class="card-header">
						Buku Populer
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush" id="best_book">
							<?php foreach ($best as $best_book):
                                $urlToUserPop = url_title($best_book['popular_author_name'], 'dash', true).'-'.$best_book['popular_author_id'];
                                $urlToBookPop = url_title($best_book['popular_book_title'], 'dash', true).'-'.$best_book['popular_book_id']; ?>
							<?php if ($best_book['popular_cover_url'] == null || $best_book['popular_cover_url'] == "Kosong" || $best_book['popular_cover_url'] == ""): ?>
								<?php $cover =  base_url()."public/img/blank_cover.png"; ?>
							<?php else: ?>
								<?php $cover =  $best_book['popular_cover_url']; ?>
							<?php endif ?>
							<li class="list-group-item">
								<div class="media">
									<div class="media-left mr-10">
										<a href="<?php echo $this->baboo_lib->urlToBook($urlToUserPop,$urlToBookPop); ?>"><img class="media-object" src="<?php echo $cover; ?>"  onerror="this.onerror=null;this.src='<?php echo base_url('public/img/blank_cover.png'); ?>';" width="60" height="80"></a>
									</div>
									<div class="media-body">
										<div>
											<h4 class="media-heading bold mt-10">
												<a href="<?php echo $this->baboo_lib->urlToBook($urlToUserPop,$urlToBookPop); ?>"><?php echo $best_book['popular_book_title']; ?></a>
											</h4>
											<p style="font-size: 10pt;">by <a class="profile" data-usr-prf="<?php echo $best_book['popular_author_id']; ?>" data-usr-name="<?php echo url_title($best_book['popular_author_name']); ?>" href="<?php echo $this->baboo_lib->urlToUser($urlToUserPop); ?>"><?php echo $best_book['popular_author_name']; ?></a></p>
										</div>
									</div>
								</div>
							</li>

							<?php endforeach ?>
						</ul>
					</div>
				</div>
				<!-- Buku Populer -->
			</div>
		</div>
	</div>
</div>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
<?php echo $this->session->flashdata('success_publish'); ?>
<?php if ($this->session->flashdata('is_follow_event')): ?>
	<script type="text/javascript">
		swal("Good job!", "Kamu Sukses Mengikuti Event!", "success");
	</script>
<?php endif ?>
<?php if ($this->session->flashdata('is_not_follow_event')): ?>
	<script type="text/javascript">
		swal("Maaf..", "Kamu Sudah Mengikuti Event!", "warning");
	</script>
<?php endif ?>

</body>
</html>

<?php foreach ($seeall_event as $s_book): ?>
	<div class="col-md-6 col-sm-12 col-xs-12 mb-20">
		<div class="card">
			<div class="card-body">
				<div class="media">
					<img class="align-self-start mr-3" src="<?php echo ($s_book['popular_cover_url'] != 'Kosong') ? ($s_book['popular_cover_url'] != null ? $s_book['popular_cover_url'] : base_url('public/img/icon-tab/empty-set.png')) : base_url('public/img/icon-tab/empty-set.png'); ?>" width="150" height="210" alt="Generic placeholder image">
					<div class="media-body">
						<!-- <h5 class="mt-0" style="color: #7661ca;">Top #1</h5> -->
						<h3 class="mt-0"><a class="book_link" href="<?php echo site_url('book/'.$s_book['popular_book_id']); ?>"><?php echo $s_book['popular_book_title']; ?></a></h3>
						<span class="mr-10" style="font-size: 12px;">Fiksi &#8226;</span>
						<span class="text-muted" style="font-size: 11px;">Dibaca <?php echo $s_book['popular_book_view'] ?> kali</span>
						<br>
						<div class="media mt-20">
							<img class="d-flex align-self-start mr-10 rounded-circle" src="<?php if($s_book['popular_author_avatar'] == NULL){
								echo base_url('public/img/profile/blank-photo.jpg');
							}else{
								echo $s_book['popular_author_avatar']; } ?>" width="50" height="50">
								<div class="media-body mt-5">
									<h5 class="card-title nametitle2"><a href="#" class="author_name menu-page" id="tab-page"><?php echo $s_book['popular_author_name']; ?></a></h5>
									<p class="text-muted" style="margin-top:-10px;"><small>
										<span><?php echo $s_book['popular_publish_date'] ?></span></small></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-12 text-muted" style="font-size: 13px;">
								<div class="pull-right"><span><b class="share_countys"><?php echo $s_book['popular_book_share']; ?></b> Bagikan </span></div>
								<div><span class="mr-30"><b class="like_countys"><?php echo $s_book['popular_book_like'] ?></b> Suka</span><span><b class="txtlike"><?php echo $s_book['popular_book_comment'] ?></b> Komentar</span></div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="pull-right">
							<?php  if (empty($this->session->userdata('userData'))) { ?>
							<a href="#" data-share="123" class="fs-14px share-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" class="mr-10" width="23"> </a>
							<?php }else { ?>
							<div class="dropdown">
								<button class="share-btn dropbtn fs-14px" type="button" id="dropShare" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="23" class="mr-10"> 
								</button>
								<div class="dropdown-menu" aria-labelledby="dropShare">
									<a class="dropdown-item share-fb" href="javascript:void(0);" data-share="<?php echo $s_book['book_id']; ?>"><img src="<?php echo base_url(); ?>public/img/assets/fb-icon.svg" width="20"> Facebook</a>
								</div>
							</div>
							<?php  } ?>
						</div>
						<div class="pull-left" style="display: flex;">
							<?php  if (empty($this->session->userdata('userData'))) { ?>
							<a data-id="12" href="<?php echo base_url('login') ?>" id="loveboo12" class="mr-30 fs-14px like"><img src="<?php echo base_url('public/img/assets/icon_love.svg'); ?>" class="mr-10 loveicon" width="27"></a>
							<?php }else { ?>
							<a data-id="<?php echo $s_book['popular_book_id']; ?>" href="javascript:void(0);" id="loveboo<?php echo $s_book['popular_book_id']; ?>" class="mr-30 fs-14px <?php if($s_book['popular_book_isLike'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>"><img src="<?php if($s_book['popular_book_isLike'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="mr-10 loveicon" width="27"> <span class="<?php if($s_book['popular_book_isLike'] == false){ echo 'txtlike'; }else{ echo 'txtunlike'; } ?>"><?php if($s_book['popular_book_isLike'] == false){ echo ''; }else{ echo ''; } ?></span></a>
							<?php  } ?>
							<?php  if (empty($this->session->userdata('userData'))) { ?>
							<a href="<?php echo base_url('login') ?>" id="commentboo" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> </a>
							<?php }else { ?>
							<a onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php
							echo $s_book['popular_book_id']; ?>
							-<?php echo url_title($s_book['popular_book_title'], 'dash', true); ?>#comment
							" id="commentboo" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> </a>
							<?php  } ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach ?>
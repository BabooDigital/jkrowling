<?php if (!empty($seeall_event)) {
foreach ($seeall_event as $s_book) {  ?>
<div class="col-6" style="background: blue;padding: 10px;width: 200px;">
	<div class="card mb-15" style="padding: 0 10px 10px;">
		<div class="card-body p-0 p-20">
			<div class="row mb-20 pb-10" style="border-bottom: 1px rgba(225, 225, 225, 0.28) solid;">
				<div class="media">
					<a href="#"><img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['popular_author_avatar'] == NULL){
						echo base_url('public/img/profile/blank-photo.jpg');
					}else{
						echo $s_book['popular_author_avatar']; } ?>" width="60" height="60" alt="<?php
						echo $s_book['popular_author_name']; ?>"></a>
						<div class="media-body mt-5">
							<a href="<?php echo site_url('profile/'.$s_book['author_id'].'-'.url_title($s_book['popular_author_name'])) ?>"><h5 class="card-title nametitle2"><?php
							echo $s_book['popular_author_name']; ?></h5></a>
							<p><small>
								<span><?php echo $s_book['popular_publish_date'] ?></span></small></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="media w-100">
							<div class="media-body">
								<input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $s_book['popular_book_id']; ?>">
								<input type="hidden" name="iaiduui" id="iaiduui" value="<?php $dat = $this->session->userdata('userData'); echo $dat['user_id']; ?>">
								<a href="<?php echo site_url(); ?>book/<?php
								echo $s_book['popular_book_id']; ?>
								-<?php echo url_title($s_book['popular_book_title'], 'dash', true); ?>
								">
								<input type="hidden" name="" class="dbooktitle" value="<?php echo $s_book['popular_book_title']; ?>">
								<?php if ($s_book['popular_cover_url'] != null): ?>
									<img class="effect-img d-flex align-self-start mr-20 float-left" src="<?php echo ($s_book['popular_cover_url'] != 'Kosong') ? ($s_book['popular_cover_url'] != null ? $s_book['popular_cover_url'] : base_url('public/img/icon-tab/empty-set.png')) : base_url('public/img/icon-tab/empty-set.png'); ?>" width="120" height="170" alt="<?php
									echo $s_book['popular_book_title']; ?>">
								<?php endif ?>
							</a>
							
							<h5 class="card-title nametitle3"><a onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php
							echo $s_book['popular_book_id']; ?>
							-<?php echo url_title($s_book['popular_book_title'], 'dash', true); ?>
							" id="book-link<?php
							echo $s_book['popular_book_id']; ?>"><?php
							echo $s_book['popular_book_title']; ?></a></h5>
							<p class="catbook"><a href="#" class="mr-20"><span class="btn-no-fill">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> <?php
							echo $s_book['popular_book_view']; ?></span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php
							echo $s_book['share_count']; ?></span></p>
							<p class="text-desc-in desc<?php
							echo $s_book['popular_book_id']; ?>"><span class="ptexts" style="font-family: 'Noto Serif', serif;"><?php
							echo $s_book['popular_book_title']; ?> </span><a class="segment" data-href="<?php
							echo $s_book['popular_book_id']; ?>-<?php echo url_title($s_book['popular_book_title'], 'dash', true); ?>" onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php echo $s_book['popular_book_id']; ?>-<?php echo url_title($s_book['popular_book_title'], 'dash', true); ?>" class="readmore">Lanjut</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;border-radius: 15px;">
			<div class="pull-right">
				<div class="dropdown">
					<button class="share-btn dropbtn fs-14px" type="button" id="dropShare" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="23" class="mr-10"> Bagikan
					</button>
					<div class="dropdown-menu" aria-labelledby="dropShare">
						<a class="dropdown-item share-fb" href="javascript:void(0);" data-share="<?php echo $s_book['popular_book_id']; ?>"><img src="<?php echo base_url(); ?>public/img/assets/fb-icon.svg" width="20"> Facebook</a>
					</div>
				</div>
			</div>
			<div>
				<a data-id="<?php echo $s_book['popular_book_id']; ?>" href="javascript:void(0);" id="loveboo<?php echo $s_book['popular_book_id']; ?>" class="mr-30 fs-14px <?php if($s_book['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>"><img src="<?php if($s_book['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="mr-10 loveicon" width="27"> <span class="<?php if($s_book['is_like'] == false){ echo 'txtlike'; }else{ echo 'txtunlike'; } ?>"><?php if($s_book['is_like'] == false){ echo 'Suka'; }else{ echo 'Batal Suka'; } ?></span></a>
				<a onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php
				echo $s_book['popular_book_id']; ?>
				-<?php echo url_title($s_book['popular_book_title'], 'dash', true); ?>#comment
				" id="commentboo" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>
			</div>
		</div>
	</div>
</div>
	<?php } }else {
	} ?>
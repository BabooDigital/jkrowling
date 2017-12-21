<?php if (!empty($home)) {
	foreach ($home as $s_book) {  ?>
	<div class="card mb-15" style="padding: 0 10px;">
		<div class="card-body p-0 p-20">
			<div class="row mb-30">
				<div class="media">
					<a href="#"><img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
						echo base_url('public/img/profile/blank-photo.jpg');
					}else{
						echo $s_book['author_avatar']; } ?>" width="60" height="60" alt="<?php
						echo $s_book['author_name']; ?>"></a>
						<div class="media-body mt-5">
							<a href="#"><h5 class="card-title nametitle2"><?php
							echo $s_book['author_name']; ?></h5></a>
							<p><small><span>Jakarta, Indonesia</span>
								<span class="ml-10"><?php echo $s_book['publish_date'] ?></span></small></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="media w-100">
							<div class="media-body">
								<input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $s_book['book_id']; ?>">
								<a href="<?php echo site_url(); ?>book/<?php
								echo $s_book['book_id']; ?>
								-<?php echo url_title($s_book['title_book'], 'dash', true); ?>
								">
								<img class="d-flex align-self-start mr-10 float-left" src="<?php
								echo $s_book['cover_url']; ?>" width="120" height="170" alt="<?php
								echo $s_book['title_book']; ?>">
							</a>
							<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>book/<?php
							echo $s_book['book_id']; ?>
							-<?php echo url_title($s_book['title_book'], 'dash', true); ?>
							"><?php
							echo $s_book['title_book']; ?></a></h5>
							<p class="catbook"><a href="#" class="mr-20"><span class="btn-no-fill">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> <?php
							echo $s_book['view_count']; ?></span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php
							echo $s_book['share_count']; ?></span></p>
							<p class="text-desc-in"><?php
							echo $s_book['desc']; ?> <a href="<?php echo site_url(); ?>book/<?php
							echo $s_book['book_id']; ?>
							-<?php echo url_title($s_book['title_book'], 'dash', true); ?>
							" class="readmore">Lanjut</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
			<div class="pull-right">
				<a href="#" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" class="mr-10" width="23"> Bagikan</a>
			</div>
			<div>
				<a href="javascript:void(0);" id="loveboo<?php echo $s_book['book_id']; ?>" class="mr-30 fs-14px <?php if($s_book['is_like'] == 'false'){ echo 'like'; }else{ echo 'unlike'; } ?>"><img src="<?php if($s_book['is_like'] == 'false'){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="mr-10 loveicon" width="27"> Suka</a>
				<a href="#" id="commentboo" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>
			</div>
		</div>
	</div>
	<?php } }else {
	} ?>
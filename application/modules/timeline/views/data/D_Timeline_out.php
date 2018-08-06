<?php if (!empty($home)) {
	foreach ($home['data'] as $s_book) { ?>
	<div class="col-md-6 mb-10 all fiksi" style="margin-right: -15px;">
		<div class="card cardsize" style="padding: 0 10px;">
			<div class="card-body p-0 p-20" style="overflow: hidden;">
				<div class="row mb-30">
					<div class="media w-100">
						<a href="<?php echo site_url('profile/'.$s_book['author_id'].''); ?>"><img alt="<?php
						echo $s_book['author_name']; ?>" class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
							echo base_url('public/img/profile/blank-photo.jpg');
						}else{
							echo $s_book['author_avatar']; } ?>" width="60" height="60"></a>
							<div class="media-body mt-5">
								<h5 class="card-title nametitle2"><a href="<?php echo site_url('profile/'.$s_book['author_id'].''); ?>"><?php
								echo $s_book['author_name']; ?></a></h5>
								<p><small><span class="ml-10"><?php echo $s_book['publish_date']; ?></span></small></p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="media w-100">
							<div class="media-body">
								<a href="<?php echo site_url(); ?>book/<?php
								echo $s_book['book_id']; ?>">
									<img alt="<?php
									echo $s_book['title_book']; ?>" class="d-flex align-self-start mr-10 float-left" src="<?php echo ($s_book['cover_url'] != null) ? $s_book['cover_url'] : base_url('public/img/blank_cover.png'); ?>" width="120" height="170">
								</a>
								<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>book/<?php
								echo $s_book['book_id']; ?>"><?php
								echo $s_book['title_book']; ?></a></h5>
								<p class="catbook mb-10"><a class="mr-20" href="#"><span class="btn-no-fill">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> <?php
								echo $s_book['view_count']; ?></span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php
								echo $s_book['share_count']; ?></span></p>
								<p class="text-desc-out"><?php
								echo $s_book['desc']; ?><a class="readmore" href="#"> Lanjut</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
					<div class="pull-right">
						<a href="#"><img class="mr-10 fs-14px" src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="27"> Bagikan</a>
					</div>
					<div>
						<a class="mr-30 fs-14px" href="#"><img class="mr-10" src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="27"> Suka</a> <a href="#"><img class="mr-10 fs-14px" src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="25"> Komentar</a>
					</div>
				</div>
			</div>
		</div>
		<?php } }else{
					} ?>
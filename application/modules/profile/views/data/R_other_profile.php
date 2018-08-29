	<?php if (!empty($bookdata)) {
		foreach ($bookdata as $book) { ?>
			<div class='card mb-15 p-0'>
				<div class='card-body p-0 pl-30 pr-30 pt-15'>
					<div class='row mb-10 pl-15 pr-15'>
						<div class='media'>
							<img alt='<?php echo $book['author_name']; ?>' class='d-flex align-self-start mr-20 rounded-circle' height='50' src='<?php echo $book['author_avatar']; ?>' width='50' onerror="this.onerror=null;this.src='<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>'">
							<div class='media-body mt-5'>
								<h5 class='card-title nametitle2'><a href='javascript:void(0);' class="author_name"><?php echo $book['author_name']; ?></a></h5>
								<p class='text-muted' style='margin-top:-10px;'><small>
									<span><?php echo $book['publish_date']; ?></span>
									<?php if ($book['latest_update'] == $book['publish_date']) { ?>
										<span></span>
										<?php }else{ ?>
											<span> • Diperbarui <?php echo $book['latest_update']; ?></span>
											<?php } ?>
										</small></p>
									</div>
								</div>
							</div>
							<div class='media'>
								<a href='<?php echo site_url(); ?>book/<?php echo $book['book_id']; ?>-<?php echo url_title($book['title_book'], 'dash', true); ?>' class="segment" data-href="<?php echo $book['book_id']; ?>"><img alt='<?php echo $book['title_book']; ?>' class='w-100 imgcover cover_image' src='<?php echo $book['cover_url']; ?>'></a>
							</div><a href='<?php echo site_url(); ?>book/<?php echo $book['book_id']; ?>-<?php echo url_title($book['title_book'], 'dash', true); ?>'>
								<h5 class='pt-20 w-100' style='font-weight: 700;'><b class="dbooktitle"><?php echo $book['title_book']; ?></b></h5></a>
								<div class='w-100'>
									<span class='mr-8' style='font-size: 12px;'><?php echo $book['category']; ?> &#8226;</span> <span class='text-muted' style='font-size: 11px;'>Dibaca <?php echo $book['view_count']; ?> kali</span>
									<p class='mt-10 textp' data-text="<?php echo substr($book['desc'],0,200); ?>"><?php echo substr($book['desc'],0,200); ?> ...</p>
								</div>
								<div class="row mb-5">
									<div class="col-12">
										<div class="mt-5 text-muted" style="font-size: 11px;"> <div class="pull-right"><span><b class="share_countys"><?php echo $book['share_count']; ?></b> Bagikan</span></div> <span class="mr-30"><b class="like_countys"><?php echo $book['like_count']; ?></b> Suka</span><span><b class="txtlike"><?php echo $book['comment_count']; ?></b> Komentar</span> </div>
									</div>
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
						<?php } }else { } ?>

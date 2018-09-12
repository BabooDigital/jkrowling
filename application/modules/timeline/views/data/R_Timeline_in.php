	<?php if (!empty($home['timeline'])) {
		foreach ($home['timeline'] as $s_book) { ?>

		<?php if ($s_book['image_url'] == "" || $s_book['image_url'] == null || $s_book['image_url'] == "Kosong"){ ?>
		<div class="card mb-15">
			<div class="card-body pl-20 pr-20 pt-20 pb-10">
				<div class="row mb-10 pl-10 pr-10">
					<div class="media">
						<img class="d-flex align-self-start mr-10 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
							echo base_url('public/img/profile/blank-photo.jpg');
						}else{
							echo $s_book['author_avatar']; } ?>" width="50" height="50" alt="<?php
							echo $s_book['author_name']; ?>">
							<div class="media-body mt-5">
								<h5 class="card-title nametitle2"><a href="<?php echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true)); ?>" class="author_name menu-page" id="tab-page"><?php
								echo $s_book['author_name']; ?></a></h5>
								<p class="text-muted" style="margin-top:-10px;"><small>
									<span><?php echo $s_book['publish_date']; ?></span>
									<?php if ($s_book['latest_update'] == $s_book['publish_date']) { ?>
									<span></span>
									<?php }else{ ?>
									<span> • Diperbarui <?php echo $s_book['latest_update']; ?></span>
									<?php } ?></small></p>
								</div>
							</div>
						</div>
						<a href="<?php if ((bool)$s_book['is_pdf'] == true) { echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); } ?>">
							<div class="row pl-10 pr-10">
								<h5 class="w-100" style="font-weight: 700;"><b><a href="<?php if ((bool)$s_book['is_pdf'] == true) { echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); } ?>" class="dbooktitle segment" data-href="<?php echo $s_book['book_id']; ?>"><?php echo $s_book['title_book']; ?></a></b></h5>
								<div class="w-100">
									<span class="mr-15" style="font-size: 12px;"><?php echo $s_book['category']; ?> &#8226; </span>

									<span style="font-size: 12px;">
										<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="20"> <?php
										echo $s_book['view_count']; ?> </span>
										<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="12"> <?php
										echo $s_book['share_count']; ?></span>
										<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="12"> <?php
										echo $s_book['like_count']; ?></span>
										<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="12"> <?php
										echo $s_book['comment_count']; ?></span>
									</span>

									<a href="<?php if ((bool)$s_book['is_pdf'] == true) { echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); } ?>" class="segment" data-href="<?php echo $s_book['book_id']; ?>">
										<p class="mt-10 text-justify textp" data-text="<?php echo substr($s_book['desc'],0,200); ?> ..."><?php echo substr($s_book['desc'],0,200); ?> ...</p>
									</a>
								</div>
							</div>
						</a>
					</div>
					<div class="bg-white card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
						<div class="pull-right">
							<a href="javascript:void(0);" data-share="<?php echo $s_book['book_id']; ?>" class="fs-14px share-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" class="mr-10" width="23"> </a>
						</div>
						<div>
							<a data-id="<?php echo $s_book['book_id']; ?>" href="javascript:void(0);" id="loveboo<?php echo $s_book['book_id']; ?>" class="mr-30 fs-14px <?php if($s_book['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>"><img src="<?php if($s_book['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="mr-10 loveicon" width="27"></a>
							<a href="#" id="commentboo" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> </a>
						</div>
					</div>
				</div>
				<?php }else{ ?>
				<a href="<?php if ((bool)$s_book['is_pdf'] == true) { echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); } ?>">
					<div class="card mb-15" style="padding: 0 00px;">
						<div class="card-body pl-20 pr-20 pt-20 pb-10">
							<div class="row mb-10 pl-10 pr-10">
								<div class="media">
									<img class="d-flex align-self-start mr-10 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
										echo base_url('public/img/profile/blank-photo.jpg');
									}else{
										echo $s_book['author_avatar']; } ?>" width="50" height="50" alt="<?php
										echo $s_book['author_name']; ?>">
										<div class="media-body mt-5">
											<h5 class="card-title nametitle2"><a href="<?php echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true)); ?>" class="author_name menu-page" id="tab-page"><?php
											echo $s_book['author_name']; ?></a></h5>
											<p class="text-muted" style="margin-top:-10px;"><small>
												<span><?php echo $s_book['publish_date']; ?></span>
												<?php if ($s_book['latest_update'] == $s_book['publish_date']) { ?>
												<span></span>
												<?php }else{ ?>
												<span> • Diperbarui <?php echo $s_book['latest_update']; ?></span>
												<?php } ?></small></p>
											</div>
										</div>
									</div>
									<a href="<?php if ((bool)$s_book['is_pdf'] == true) { echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); } ?>" data-href="<?php echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>" class="segment">
										<div class="row pl-10 pr-10">
											<div class="media">
												<img alt="<?php
												echo $s_book['title_book']; ?>" src="<?php if($s_book['cover_url'] == NULL){ echo "https://assets.dev-baboo.co.id/baboo-cover/default1.png"; }else{ echo $s_book['cover_url']; } ?>" class="w-100 imgcover cover_image">
											</div>
											<h5 class="pt-20 w-100" style="font-weight: 700;"><b><a href="<?php if ((bool)$s_book['is_pdf'] == true) { echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); } ?>" class="dbooktitle "><?php
											echo $s_book['title_book']; ?></a></b></h5>
											<div class="w-100">
												<span class="mr-8" style="font-size: 12px;"><?php echo $s_book['category']; ?> &#8226;</span>
												<span class="text-muted" style="font-size: 11px;">Dibaca <?php echo $s_book['view_count']; ?> kali</span>
												<a href="<?php if ((bool)$s_book['is_pdf'] == true) { echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); } ?>">
													<p class="mt-10 text-justify textp" data-text="<?php echo substr($s_book['desc'],0,200); ?> ..."><?php echo substr($s_book['desc'],0,200); ?> ...</p>
												</a>
											</div>
										</div>
									</a>
								</div>
								<div class="col-12 text-muted" style="font-size: 11px;">
									<div class="pull-right"><span><b class="share_countys"><?php echo $s_book['share_count']; ?></b> Bagikan</span></div>
									<div><span class="mr-30"><b class="like_countys"><?php echo $s_book['like_count']; ?></b> Suka</span><span><b class="txtlike"><?php echo $s_book['comment_count']; ?></b> Komentar</span></div>
								</div>
								<div class="bg-white card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
									<div class="pull-right">
										<div class="dropdown">
											<button class="share-btn dropbtn" type="button" id="dropShare" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="23">
											</button>
											<div class="dropdown-menu" aria-labelledby="dropShare">
												<a class="dropdown-item share-fb" href="javascript:void(0);" data-share="<?php echo $s_book['book_id']; ?>"><img src="<?php echo base_url(); ?>public/img/assets/fb-icon.svg" width="20"> Facebook</a>
											</div>
										</div>
									</div>
									<div>
										<a data-id="<?php echo $s_book['book_id']; ?>" href="javascript:void(0);" id="loveboo<?php echo $s_book['book_id']; ?>" class="mr-30 fs-14px <?php if($s_book['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>"><img src="<?php if($s_book['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="mr-10 loveicon" width="27"></a>
										<a href="javascript:void(0);"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"></a>
									</div>
								</div>
							</div>
						</a>
						<?php } ?>

						<?php
						if ($s_book['populars']['desc'] == 'Popular Writers') {
							echo "<label class='ml-10'><b>".$s_book['populars']['desc']."</b></label>";
							?>
							<div class="container bg-white p-15 mb-20">
								<div class="row">
									<?php foreach ($s_book['populars'] as $populars){ ?>
									<?php error_reporting(0); foreach ($populars as $pop){ ?>
									<div class='col-6 mb-10 pr-5 pl-5'>
										<div class='card pt-15 pb-15' style='border: solid 1px #e8ebec;border-radius: 10px !important;'>
											<div class='text-center'>
												<img class='rounded-circle' height='50' src='<?php echo $pop['popular_author_avatar']; ?>' alt='<?php echo $pop['popular_author_name']; ?>' style='object-fit:cover;' width='50'>
												<p class='nametitled'><a href='<?php echo site_url(); ?>penulis/<?php echo $pop['popular_author_id']; ?>-<?php echo url_title($pop['popular_author_name'], 'dash', true); ?>'><?php echo $pop['popular_author_name']; ?></a></p>
											</div>
											<div class='row'>
												<div class='col-6 text-center rborder pr-0'>
													<p style='display: inline-flex;'><img src='public/img/icon-tab/book.svg' width='25'> <span style='font-weight: bold;'><?php echo $pop['book_made']; ?></span></p>
													<h6>Buku</h6>
												</div>
												<div class='col-6 text-center pl-0'>
													<p style='display: inline-flex;'><img src='public/img/icon-tab/followers.svg' width='25'> <span style='font-weight: bold;'><?php echo $this->thousand_to_k->ConvertToK($pop['followers']); ?></span></p>
													<h6>Teman</h6>
												</div>
											</div>
											<div class='row mt-10'>
												<div class='col-12 text-center' style='height:30px;'>
													<?php if ($pop['popular_author_id'] != '1') { ?>
													<button type='button' class='btn-follow <?php if($pop['isFollow'] == true){echo 'unfollow-u';}else{echo 'follow-u';} ?>' data-follow='<?php echo $pop['popular_author_id']; ?>'><img src='public/img/icon-tab/add_follow.svg' width='25'> <span class='txtfollow'><?php if($pop['isFollow'] == true){echo 'Diikuti';}else{echo 'Ikuti';} ?></span></button>
													<?php }else{} ?>
												</div>
											</div>
										</div>
									</div>
									<?php } } ?>
								</div>
								<div class="row">
									<a href="<?php echo site_url(); ?>popular_writers" style="margin: auto;padding: 10px 0px;box-shadow: 0px 1px 2px #a5a5a5;border-radius: 35px;width: 100%;text-align: center;">Lihat Semua</a>
								</div>
							</div>
							<?php }else{
								if (!empty($s_book['populars']['desc'])) { echo "<label class='ml-10'><b>".$s_book['populars']['desc']."</b></label>"; }else{ echo "";}
								foreach ($s_book['populars'] as $populars){ ?>
								<div id="myWorkContent" class="bg-white mb-20" style="margin-top: -10px;">
									<?php error_reporting(0); foreach ($populars as $pop){ ?>
									<div id="insideDiv">
										<a id="tes" href="<?php if ((bool)$pop['is_pdf'] == true) { echo site_url('penulis/'.$pop['popular_author_id'].'-'.url_title($pop['popular_author_name'], 'dash', true).'/'.$pop['popular_book_id'].'-'.url_title($pop['popular_book_title'], 'dash', true).'/pdf'); }else{ echo site_url('penulis/'.$pop['popular_author_id'].'-'.url_title($pop['popular_author_name'], 'dash', true).'/'.$pop['popular_book_id'].'-'.url_title($pop['popular_book_title'], 'dash', true)); } ?>">
											<div class="col-12" style="height:auto;">
												<div>
													<img src="<?php if($pop['popular_cover_url'] == NULL){ echo 'https://assets.dev-baboo.co.id/baboo-cover/default3.png';
												}else{
													echo $pop['popular_cover_url']; } ?>" width="150" height="190" class="rounded" style="box-shadow: 0px 0px 10px rgba(76, 76, 76, 0.3);">
												</div>
												<div class="mt-10">
													<div id="title_book">
														<p style="font-size: 13px;font-weight: bold;"><?php if(strlen($pop['popular_book_title']) > 20){ $str =  substr($pop['popular_book_title'], 0, 18).'...'; echo $str; }else { echo $pop['popular_book_title']; }  ?></p>
													</div>
													<div id="author_book">
														<p style="font-size: 12px;"><img src="<?php  if($pop['popular_author_avatar'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg');
													}else{
														echo $pop['popular_author_avatar']; } ?>" width="20" height="20" class="rounded-circle"> <?php echo $pop['popular_author_name']; ?></p>
													</div>
												</div>
											</div>
										</a>
									</div>
									<?php } ?>
								</div>
								<?php }   }   } ?>
							</div>
							<?php } else{
							} ?>

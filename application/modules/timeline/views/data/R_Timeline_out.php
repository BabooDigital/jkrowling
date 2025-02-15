<?php if (!empty($home['data'])) {
	foreach ($home['data']['timeline'] as $s_book) {
        $urlToUser = url_title($s_book['author_name'], 'dash', true).'-'.$s_book['author_id'];
        $urlToBook = url_title($s_book['title_book'], 'dash', true).'-'.$s_book['book_id']; ?>
	<?php if ($s_book['image_url'] == "" || $s_book['image_url'] == null || $s_book['image_url'] == "Kosong"){ ?>
	<a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>">
		<div class="card mb-15" style="padding: 0 00px;">
			<div class="card-body p-0 p-20">
				<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
					<div class="media">
						<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
							echo base_url('public/img/profile/blank-photo.jpg');
						}else{
							echo $s_book['author_avatar']; } ?>" width="50" height="50" alt="Generic placeholder image">
							<div class="media-body mt-5">
								<h5 class="card-title nametitle2"><a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"><?php
								echo $s_book['author_name']; ?></a></h5>
								<p class="text-muted" style="margin-top:-10px;"><small>
									<span class=""><?php echo $s_book['publish_date']; ?></span></small></p>
								</div>
							</div>
						</div>
						<a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>">
							<div class="row" style="padding: 0px 10px 0px 10px;">
								<div class="media">
									<img alt="<?php
									echo $s_book['title_book']; ?>" src="<?php
									echo $s_book['cover_url']; ?>" class="w-100" height="200" style="">
								</div>
								<h5 class="pt-20 w-100" style="font-weight: 500;"><b><a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>"><?php
								echo $s_book['title_book']; ?></a></b></h5>
								<div style="margin-top:10px;">
									<a href="#" class="mr-10">
										<span style="font-size: 10px;border: 1px #7554bd solid;border-radius: 25px;padding: 0px 10px;color: #7554bd;">FIKSI</span>
									</a>
									<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg">  <?php echo $s_book['view_count']; ?></span>
									<span>
										<img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php echo $s_book['share_count']; ?>
									</span>
									<a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>" style="background: red;">
									<p class="mt-10 text-justify" style="font-size:16px; font-family: Roboto;"><?php echo substr($s_book['desc'],0,200); ?> ...</p>
								</a>
							</div>
						</div>
					</a>
				</div>
<!--				<div class="bg-white card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">-->
<!--					<div class="pull-right">-->
<!--						<a href=--><?php //echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); ?><!--"><img src="--><?php //echo base_url(); ?><!--public/img/assets/icon_share.svg" width="25"></a>-->
<!--					</div>-->
<!--					<div>-->
<!--						<a href=--><?php //echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); ?><!--" class="mr-20"><img src="--><?php //echo base_url(); ?><!--public/img/assets/icon_love.svg" class="mr-5" width="27"></a>-->
<!--						<a href=--><?php //echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); ?><!--"><img src="--><?php //echo base_url(); ?><!--public/img/assets/icon_comment.svg" class="mr-10" width="25"></a>-->
<!--					</div>-->
<!--				</div>-->
			</div>
		</a>
		<?php }else{ ?>
		<a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>">
			<div class="card mb-15" style="padding: 0 00px;">
				<div class="card-body p-0 pl-20 pr-20 pt-20 pb-10">
					<div class="row mb-10 pl-10 pr-10">
						<div class="media">
							<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
								echo base_url('public/img/profile/blank-photo.jpg');
							}else{
								echo $s_book['author_avatar']; } ?>" width="50" height="50" alt="Generic placeholder image">
								<div class="media-body mt-5">
									<h5 class="card-title nametitle2"><a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"><?php
									echo $s_book['author_name']; ?></a></h5>
									<p class="text-muted" style="margin-top:-10px;"><small>
										<span class=""><?php echo $s_book['publish_date']; ?></span></small></p>
									</div>
								</div>
							</div>
							<a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>">
								<div class="row pl-10 pr-10">
									<div class="media">
										<img alt="<?php
										echo $s_book['title_book']; ?>" src="<?php if($s_book['img_url'] == NULL){ echo "https://assets.dev-baboo.co.id/baboo-cover/default1.png"; }else{ echo $s_book['img_url']; } ?>" class="w-100 imgcover">
									</div>
									<h5 class="pt-20 w-100" style="font-weight: 700;"><b><a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>"><?php
									echo $s_book['title_book']; ?></a></b></h5>
									<div class="w-100">
										<span class="mr-8" style="font-size: 12px;"><?php echo $s_book['category']; ?> &#8226;</span>
										<span class="text-muted" style="font-size: 11px;">Dibaca <?php echo $s_book['view_count']; ?> kali</span>
										<a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>">
											<p class="mt-10 text-justify"><?php echo substr($s_book['desc'],0,200); ?> ...</p>
										</a>
									</div>
								</div>
							</a>
						</div>
						<div class="col-12 text-muted mb-20" style="font-size: 11px;">
							<div class="pull-right"><span><b><?php echo $s_book['share_count']; ?></b> Bagikan</span></div>
							<div><span class="mr-30"><b><?php echo $s_book['like_count']; ?></b> Suka</span><span><b><?php echo $s_book['comment_count']; ?></b> Komentar</span></div>
						</div>
<!--						<div class="bg-white card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">-->
<!--							<div class="pull-right">-->
<!--								<a href=--><?php //echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); ?><!--"><img src="--><?php //echo base_url(); ?><!--public/img/assets/icon_share.svg" width="23"></a>-->
<!--							</div>-->
<!--							<div>-->
<!--								<a href=--><?php //echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); ?><!--" class="mr-20"><img src="--><?php //echo base_url(); ?><!--public/img/assets/icon_love.svg" class="mr-5" width="27"></a>-->
<!--								<a href=--><?php //echo site_url('penulis/'.$s_book['author_id'].'-'.url_title($s_book['author_name'], 'dash', true).'/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); ?><!--"><img src="--><?php //echo base_url(); ?><!--public/img/assets/icon_comment.svg" class="mr-10" width="25"></a>-->
<!--							</div>-->
<!--						</div>-->
					</div>
				</a>
				<?php } ?>

					<?php if (!empty($s_book['populars']['desc'])) { echo "<label class='ml-10'><b>".$s_book['populars']['desc']."</b></label>"; }else{ echo "";}
					 foreach ($s_book['populars'] as $populars){ ?>
					<div id="myWorkContent" class="bg-white mb-20" style="margin-top: -10px;">
						<?php error_reporting(0); foreach ($populars as $pop){
                            $urlToUser = url_title($pop['popular_author_name'], 'dash', true).'-'.$pop['popular_author_id'];
                            ?>
						<div id="insideDiv">
							<a id="tes" href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>">
								<div class="col-12" style="height:auto;">
									<div>
										<img src="<?php if($pop['popular_cover_url'] == NULL){ echo 'https://assets.dev-baboo.co.id/baboo-cover/default3.png';
									}else{
										echo $pop['popular_cover_url']; } ?>" width="130" height="170" class="rounded" style="box-shadow: 0px 0px 10px rgba(76, 76, 76, 0.3);">
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
					<?php } } ?>
					<div class="ajax-load text-center" style="display: none;">
					</div>

				</div>
				<?php } else{

				} ?>

<?php if (!empty($home)) {
	foreach ($home['data'] as $s_book) { ?>

				<a href="<?php echo site_url(); ?>book/<?php echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>">
					<div class="card mb-15" style="padding: 0 00px;">
						<div class="card-body p-0 p-20">
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
								<div class="media">
									<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
										echo base_url('public/img/profile/blank-photo.jpg');
									}else{
										echo $s_book['author_avatar']; } ?>" width="50" height="50" alt="Generic placeholder image">
										<div class="media-body mt-5">
											<h5 class="card-title nametitle2"><a href="<?php echo site_url('profile/'.$s_book['author_id'].''); ?>"><?php
											echo $s_book['author_name']; ?></a></h5>
											<p class="text-muted" style="margin-top:-10px;"><small><span>Jakarta, Indonesia</span>
												<span class="ml-10"><?php echo $s_book['publish_date']; ?></span></small></p>
											</div>
										</div>
									</div>
									<a href="<?php echo site_url(); ?>book/<?php echo $s_book['book_id']; ?> - <?php echo url_title($s_book['title_book'], 'dash', true); ?>"> 
										<div class="row" style="padding: 0px 10px 0px 10px;">
											<div class="media">
												<img alt="<?php
												echo $s_book['title_book']; ?>" src="<?php
												echo $s_book['cover_url']; ?>" class="w-100" height="200" style="">
											</div>
											<h5 class="pt-20 w-100" style="font-weight: 500;"><b><a href="<?php echo site_url(); ?>book/<?php echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>"><?php
											echo $s_book['title_book']; ?></a></b></h5>
											<div style="margin-top:10px;">
												<a href="#" class="mr-10">
													<span style="font-size: 10px;border: 1px #7554bd solid;border-radius: 25px;padding: 0px 10px;color: #7554bd;">FIKSI</span>
												</a> 
												<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg">  <?php echo $s_book['view_count']; ?></span> 
												<span>
													<img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php echo $s_book['share_count']; ?>
												</span>
												<a href="<?php echo site_url(); ?>book/<?php
												echo $s_book['book_id']; ?>
												-<?php echo url_title($s_book['title_book'], 'dash', true); ?>" style="background: red;"> 
												<p class="mt-10" style="font-size:16px; font-family: Roboto;"><?php echo substr($s_book['desc'],0,200); ?> ...</p>
											</a>
										</div>
									</div>
								</a>
							</div>
							<div class="bg-white card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
								<div class="pull-right">
									<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="25"></a>
								</div>
								<div>
									<a href="#" class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" class="mr-5" width="27"></a>
									<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"></a>
								</div>
							</div>
						</div>
					</a>

				<?php 
				if ($s_book['populars']) {
					echo "<label class='ml-10'>Buku Populer</label>";
				} 
				?>
				<?php foreach ($s_book['populars'] as $populars){ ?>

					<div id="myWorkContent">
						<div id="insideDiv">
							<?php error_reporting(0); foreach ($populars as $pop){ ?>
							<a id="tes" href="assets/work/1.jpg">
								<div class="col-md-12" style="background-color:white;height:127px;width:250px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5);">
									<div style="padding-top: 13px;"></div>
									<div style="float:left;background-color:white;width:70px;height: 100px;">

										<img src="<?php if($pop['popular_cover_url'] == NULL){
											echo base_url('public/img/profile/blank-photo.jpg');
										}else{
											echo $pop['popular_cover_url']; } ?>" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5); height:100px;width: 70px;">
										</div>
										<div style="float:left;width:125px;height: auto;margin-left: 20px;">

											<div style="padding-top: 5px;">
												<div id="title_book">
													<b style="font-size: 14px;"><?php echo $pop['popular_book_title']; ?></b>
												</div>
												<br>
												<div id="author_book">
													<p style="font-size: 12px;">By : <?php echo $pop['popular_author_name']; ?></p>
												</div>
											</div>
										</div>

									</div>
								</a>
							<?php } ?>
						</div>
					</div>
				<?php } } ?>
				<div class="ajax-load text-center" style="display: none;">
					<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
				</div>

			</div>
			<?php } else{
				echo "<div class='container first_login mt-30'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'> <img src='".base_url('public/img/first_login.png')."' width='190'> </div> <div class='text-center'> <h4><b>Tentukan konten yang kamu suka!</b></h4> <p style='font-size: 12pt;'>Jangan buang-buang waktu dengan hal yg tidak kamu suka, yuk atur konten yg kamu suka.</p> <br> <a href='".site_url('selectcategory')."' class='btn btn-navdaftar'><span class='navdaftar'>Atur Sekarang</span></a> </div> </div> </div> </div> ";
			} ?>

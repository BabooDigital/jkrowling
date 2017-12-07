	<div class="container babooidin">
		<div class="row">
			<!-- Left Side -->
			<div class="col-md-3 tmlin">
				<div class="stickymenu">
					<!-- Penulis Minggu Ini -->
					<div class="card mb-15">
						<div class="card-header">
							Penulis minggu ini
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush" id="author_this_week">
							</ul>
						</div>
					</div>
					<!-- Penulis Minggu Ini -->

					<!-- Trending -->
					<div class="card mb-15">
						<div class="card-header">
							Trending
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<p><span class="bold"><a href="#">UI Interactions of the week</a></span>
										<span class="bold"><a href="#">#94</a></span>
										<span style="font-size: 10pt;">by <a href="#">Muzil</a></span></p>
									</li>
									<li class="list-group-item">
										<p><span class="bold"><a href="#">UI Interactions of the week</a></span>
											<span class="bold"><a href="#">#94</a></span>
											<span style="font-size: 10pt;">by <a href="#">Muzil</a></span></p>
										</li>
										<li class="list-group-item">
											<p><span class="bold"><a href="#">UI Interactions of the week</a></span>
												<span class="bold"><a href="#">#94</a></span>
												<span style="font-size: 10pt;">by <a href="#">Muzil</a></span></p>
											</li>
											<li class="list-group-item">
												<p><span class="bold"><a href="#">UI Interactions of the week</a></span>
													<span class="bold"><a href="#">#94</a></span>
													<span style="font-size: 10pt;">by <a href="#">Muzil</a></span></p>
												</li>
											</ul>
										</div>
									</div>
									<!-- Trending -->
								</div>
							</div>

							<!-- Mid Side -->
							<div class="col-md-6">
								<!-- Status -->
								<?php if (!empty($home)) {
									foreach ($home as $s_book) {  ?>
									<div class="card mb-15" style="padding: 0 10px;">
										<div class="card-body p-0 p-20">
											<div class="row mb-30">
												<div class="media">
													<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
														echo base_url('public/img/profile/blank-photo.jpg');
													}else{
														echo $s_book['author_avatar']; } ?>" width="60" height="60" alt="<?php
														echo $s_book['author_name']; ?>">
														<div class="media-body mt-5">
															<h5 class="card-title nametitle2"><?php
															echo $s_book['author_name']; ?></h5>
															<p><small><span>Jakarta, Indonesia</span>
																<span class="ml-10">1 hours ago</span></small></p>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="media w-100">
															<div class="media-body">
																<img class="d-flex align-self-start mr-10 float-left" src="<?php
																echo $s_book['cover_url']; ?>" width="120" height="170" alt="<?php
																echo $s_book['title_book']; ?>">
																<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>book/<?php
																echo $s_book['book_id']; ?>
																-<?php echo url_title($s_book['title_book'], 'dash', true); ?>
																"><?php
																echo $s_book['title_book']; ?></a></h5>
																<p class="catbook"><a href="#" class="mr-20"><span class="btn-no-fill">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> <?php
																echo $s_book['view_count']; ?></span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php
																echo $s_book['share_count']; ?></span></p>
																<p class="text-desc-in"><?php
																echo $s_book['desc']; ?> <a href="#" class="readmore">Lanjut</a>
															</p>
														</div>
													</div>
												</div>
											</div>
											<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
												<div class="pull-right">
													<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" class="mr-10" width="18"> Bagikan</a>
												</div>
												<div>
													<a href="#" class="mr-30"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" class="mr-10" width="27"> Suka</a>
													<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>
												</div>
											</div>
										</div>
										<?php } }else {
											echo "tak ada";
										} ?>
									</div>

									<!-- Right Side -->
									<div class="col-md-3 tmlin">
										<div class="stickymenu">
											<!-- Card Widget -->
											<div class="card card-widget mb-15">
												<div class="card-content">
													<p class="smalltitle">Tunggu apalagi?</p>
													<p class="fillcontent">Tuliskan semua ceritamu dan dapatkan banyak pembaca</p>											<form action="<?php echo site_url(); ?>createidbook" method="POST">
													<input type="hidden" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
													<button type="submit" class="btn btn-white" style="cursor: pointer;"><i class="fa fa-pencil-square-o"></i> Tulis Cerita</button>
												</form>
											</div>
										</div>
										<!-- Card Widget -->

										<!-- Buku Populer -->
										<div class="card mb-15">
											<div class="card-header">
												Buku Populer
											</div>
											<div class="card-body p-0">
												<ul class="list-group list-group-flush">
													<li class="list-group-item">
														<div class="media">
															<div class="media-left mr-10">
																<a href="#"><img class="media-object" src="https://placehold.it/60x80/6454bd"></a>
															</div>
															<div class="media-body">
																<div>
																	<h4 class="media-heading bold mt-10"><a href="#">Big Magic: Creative Living Beyon Fear</a></h4>
																	<p style="font-size: 10pt;">by <a href="#">Aditia Nugraha</a></p>
																</div>
															</div>
														</div>
													</li>
													<li class="list-group-item">
														<div class="media">
															<div class="media-left mr-10">
																<a href="#"><img class="media-object" src="https://placehold.it/60x80/c53949"></a>
															</div>
															<div class="media-body">
																<div>
																	<h4 class="media-heading bold mt-10"><a href="#">The Painter's Daughter</a></h4>
																	<p style="font-size: 10pt;">by <a href="#">Juli Kasi</a></p>
																</div>
															</div>
														</div>
													</li>
													<li class="list-group-item">
														<div class="media">
															<div class="media-left mr-10">
																<a href="#"><img class="media-object" src="https://placehold.it/60x80/e2a9c9"></a>
															</div>
															<div class="media-body">
																<div>
																	<h4 class="media-heading bold mt-10"><a href="#">The Painter's Daughter</a></h4>
																	<p style="font-size: 10pt;">by <a href="#">Juli Kasi</a></p>
																</div>
															</div>
														</div>
													</li>
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
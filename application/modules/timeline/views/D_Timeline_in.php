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
							<div class="col-md-6" id="post-data">
								<?php 
								$this->load->view('data/D_timeline_in', $home);
								?>
							</div>
							<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>

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
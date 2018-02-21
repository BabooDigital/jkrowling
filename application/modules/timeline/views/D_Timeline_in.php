<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11&appId=124081454991891';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php $this->load->view('navbar/D_navbar'); ?>	
	<div class="container babooidin">
		<div class="row">
			<!-- Left Side -->
			<div class="col-md-3 tmlin">
				<div class="stickymenu">
					<!-- Penulis Minggu Ini -->
					<div class="side-card mb-15">
						<div class="card-header">
							Penulis minggu ini
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush" id="author_this_week">
								<div class="loader" align="center" style="margin-left: auto;margin-right: auto;"></div>
							</ul>
						</div>
					</div>
					<!-- Penulis Minggu Ini -->

					<!-- Trending -->
					<div class="side-card mb-15">
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
								<!-- <span class="loader" style="display: none;margin-left: auto;margin-right: auto;"></span> -->
							</div>

							<!-- Right Side -->
							<div class="col-md-3 tmlin">
								<div class="stickymenu">
									<!-- Card Widget -->
									<div class="card card-widget mb-15">
										<div class="card-content">
											<p class="smalltitle">Tunggu apalagi?</p>
											<p class="fillcontent">Tuliskan semua ceritamu dan dapatkan banyak pembaca</p>											<form action="<?php echo site_url(); ?>createidbook" method="POST">
												<input type="hidden" id="iaiduui" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
												<button type="submit" class="btn btn-white" style="cursor: pointer;"><i class="fa fa-pencil-square-o"></i> Tulis Cerita</button>
											</form>
										</div>
									</div>
									<!-- Card Widget -->

									<!-- Buku Populer -->
									<div class="side-card mb-15">
										<div class="card-header">
											Buku Populer
										</div>
										<div class="card-body p-0">
											<ul class="list-group list-group-flush" id="best_book">
												<div class="loader" align="center" style="margin-left: auto;margin-right: auto;"></div>
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
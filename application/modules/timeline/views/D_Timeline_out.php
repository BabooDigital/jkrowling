
	<?php $this->load->view('navbar/D_navbar'); ?>	
<div class="mt-50 hidden-sm hidden-xs">
	<div class="slideboo">
		<div class="leftboo"></div>
		<div class="slidecontrols">
			<span id="slider-prev"></span> <span id="slider-next" style="padding-left: 40%;"></span>
		</div>
		<div style="width: 100%;height: auto;position: relative;">
			<?php $this->load->view('include/slide'); ?>
		</div>
	</div>

	<div class="container babooid">
		<div class="row">
			<div class="col-md-3 outleft">
				<div class="stickymenu">
					<!-- Penulis Minggu Ini -->
					<div class="card mb-15" style="background-color: transparent;border: none;">
						<div class="card-header" style="border: none;">
						</div>
						<!-- Iklan Penulis -->
						<div class="card-body p-0">
							<ul class="list-group list-group-flush">
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<ins class="adsbygoogle"
									     style="display:inline-block;width:300px;height:250px"
									     data-ad-client="ca-pub-4994852796413443"
									     data-ad-slot="7276054409"></ins>
									<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
							</ul>
						</div>
					</div>
					<div class="card mb-15" style="background-color: transparent;border: none;">
						<div class="card-header" style="border: none;">
							Penulis minggu ini
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-group-flush" id="author_this_week">
								<div class="loads-css ng-scope"><div style="width:20px;height:20px" class="lds-flickr"><div></div><div></div><div></div></div></div>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row mt-10 mb-10">
					<div class="col-md-3">
						<span class="bukupilihan">Buku Pilihan</span>
					</div>
					<div class="col-md-9">
						<ul class="catul">
							<li class="catli">
								<a class="btnfilter" data-filter="all" href="javascript:;">Semua Buku</a>
							</li>
							<li class="catli">
								<a class="btnfilter" data-filter="fiksi" href="javascript:;">Fiksi</a>
							</li>
							<li class="catli">
								<a class="btnfilter" data-filter="komik" href="javascript:;">Komik</a>
							</li>
							<li class="catli">
								<a class="btnfilter" data-filter="nonfiksi" href="javascript:;">Non Fiksi</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row" id="post-data">
					<?php 
						$this->load->view('data/D_timeline_out', $home);
					?>
				</div>
				<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			</div>
		</div>
	</div>
	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</div>
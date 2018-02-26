
<body id="pageContent" class="bodymessage">
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top" style="height:60px;">
			<div class="container bodymessage">
				<button style="background: none;border:none;">
					<i class="fa fa-arrow-left"></i> &nbsp;
				</button>

			</div>
		</nav>
	</div>
<br>
<br>
<div class="container bodymessage">
	<div class="row form_book">
		<div class="">
			<span class="title_book_form"><h4><b>Pesan Masuk
			<div class="loader" style="display: none;"></div>
		</div>
	</div>
</div>
<div class="container bodymessage">
	<div class="paddingbook search_message">
		<form class="">
			<input class="form-search search_message_form" type="text" placeholder="Cari pesan masuk" aria-label="Search">
		</form>
	</div>
	<br>
	<div class="card-library mb-15" style="height: auto;">
		<div class="list-group">
			<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
				<div class="media">
					<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
					<div class="media-body mt-5">
						<h5 class="card-title nametitle2">Marina Saraswati</h5>
						<p class="text-muted" style="margin-top:-10px;"><small><span>Hallo</span>
							<span class="ml-10">1 hours ago</span></small></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-library mb-15" style="height: auto;">
			<div class="list-group">
				<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
					<div class="media">
						<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
						<div class="media-body mt-5">
							<h5 class="card-title nametitle2">Marina Saraswati</h5>
							<p class="text-muted" style="margin-top:-10px;"><small><span>Terima Kasih Atas Saran nya..</span>
								<span class="ml-10">1 hours ago</span></small></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
	</body>
	</html>
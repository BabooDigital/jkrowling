<style type="text/css">
.card {
	border-radius: 0 !important;
}
</style>
<body id="pageContent">
	<div class="wrapper">
		<div class="lds-css ng-scope" style="display: none;">
			<div class="lds-eclipse" style="width:100%;height:100%">
				<img class="img-loading" src="<?php echo base_url('public/img/splash_.png'); ?>" width="90">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
		<div id="floating-btn">
			<a class="floating-btn" href="<?php echo site_url(); ?>create_mybook"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></a>
		</div>
		<?php $this->load->view('navbar/R_navbar'); ?>
		<div class="babooid" style="overflow-y: hidden;overflow-x: hidden;">
			<div class="row">
				<div class="col-12 mt-130" id="post-data">
					<!-- Status -->
					<?php 
					$this->load->view('data/R_Timeline_in', $home);
					?>
				</div>
				<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			</div>
		</div>
		<input type="hidden" id="iaiduui" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
	</div>
		<!-- JS -->
		<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</body>
</html>
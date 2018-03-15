<style type="text/css">
.card {
	border-radius: 0 !important;
}
</style>
<?php 
	$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
	$appid = '382931948848880';
	if (strpos($base, 'stg.baboo.id') !== false) {
		$appid = '1015515621929474';
	} elseif (strpos($base, 'localhost/jkrowling') !== false || strpos($base, 'dev-baboo.co.id') !== false) {
		$appid = '382931948848880';
	} elseif (strpos($base, 'baboo.id') !== false || strpos($base, 'www.baboo.id') !== false) {
		$appid = '142508586445900';
	}
	echo "<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=".$appid."';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>";
?>

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
					<?php if (!empty($home['event']['redirect']) || !empty($home['event']['image'])) { ?>
					<div class="card mb-15 bg-transparent" style="box-shadow: none;">
						<div class="card-body pt-5 pb-5 pr-10 pl-10">
							<a href="<?php echo $home['event']['redirect']; ?>">
								<img src="<?php echo $home['event']['image']; ?>" class="img-fluid">
							</a>
						</div>
					</div>
					<?php } else { } ?>
					<?php 
					$this->load->view('data/R_Timeline_in', $home);
					if ($home == null || $home == [] || empty($home)) {
						echo "<div class='container first_login mt-30'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'> <img src='".base_url('public/img/first_login.png')."' width='190'> </div> <div class='text-center'> <h4><b>Tentukan konten yang kamu suka!</b></h4> <p style='font-size: 12pt;'>Jangan buang-buang waktu dengan hal yg tidak kamu suka, yuk atur konten yg kamu suka.</p> <br> <a href='".site_url('selectcategory')."' class='btn btn-navdaftar'><span class='navdaftar'>Atur Sekarang</span></a> </div> </div> </div> </div> ";
					}
					?>
				</div>
				<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			</div>
		</div>
		<input type="hidden" id="iaiduui" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
	</div>
	<!-- JS -->
	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
	<?php if ($this->session->flashdata('is_follow_event')): ?>
		<script type="text/javascript">
			swal("Good job!", "Kamu Sukses Mengikuti Event!", "success");
		</script>
	<?php endif ?>
	<?php if ($this->session->flashdata('is_not_follow_event')): ?>
		<script type="text/javascript">
			swal("Maaf..", "Kamu Sudah Mengikuti Event!", "warning");
		</script>
	<?php endif ?>
</body>
</html>
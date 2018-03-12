<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?> <?php echo get_css($css) ?> <?php endif ?>
<style type="text/css">
#imageUpload
{
	display: none;
}

#profileImage
{
	cursor: pointer;
}

#profile-container {
	width: 100px;
	height: 100px;
	overflow: hidden;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	-o-border-radius: 50%;
	border-radius: 50%;
}

#profile-container img {
	width: 100px;
	height: 100px;
}
</style>
</head>
<script>
	var base_url = '<?php echo base_url(''); ?>';
</script>
<body class="bg-borr">
	<div class="wrapper">
		<nav class="navbar navbar-light bg-borr">
				<a href="<?php echo site_url(); ?>timeline" style="color: #333;"> <span style="font-size: 12pt;">Lewati</span> </a>
		</nav>

		<div class="container">
				<div class="row mt-20">
					<div class="col-12 mb-20">
						<h1 class="parent-title">Lengkapi Profile</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-12 mb-20">
						<input type="hidden" id="dat-id" value="<?php $aw = $this->session->userdata('userData'); echo $aw['user_id']; ?>">
					<div class="w-100 text-center">
						<div id="profile-container" class="mx-auto">
							<image id="profileImage" src="<?php base_url(); ?>public/img/profile/blank-photo.jpg" />
						</div>
						<input id="imageUpload" type="file" 
						name="profile_photo" placeholder="Photo" required="" capture>
						<img src="<?php base_url(); ?>public/img/assets/icon_plus_purple.svg" width="30" style="position: relative;bottom: 25px;left: 25px;">
					</div>
					</div>
				</div>
				<div class="row mb-20">
					<div class="col-12">
						<label class="label-fs">Domisili</label>
						<input type="text" class="w-100 frmProf" id="yourDomisili" >
					</div>
				</div>
				<div class="row mb-20">
					<div class="col-12">
						<label class="label-fs">Bio</label>
						<input type="text" class="w-100 frmProf" id="yourBio" value="">
					</div>
				</div>
		</div>

		<nav class="navbar navbar-light bg-borr fixed-bottom">
				
				<button type="button" class="mx-auto btnupdate-prof" dat-id="<?php $aw = $this->session->userdata('userData'); echo $aw['user_id']; ?>">Lanjutkan</button>
		</nav>
	</div>

<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</body>
</html>
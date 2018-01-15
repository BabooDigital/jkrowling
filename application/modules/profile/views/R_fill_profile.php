<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?> <?php echo get_css($css) ?> <?php endif ?>
</head>
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
	width: 300px;
	height: 300px;
	overflow: hidden;
	-webkit-border-radius: 50%;
	-moz-border-radius: 50%;
	-ms-border-radius: 50%;
	-o-border-radius: 50%;
	border-radius: 50%;
}

#profile-container img {
	width: 300px;
	height: 300px;
}
</style>
<body class="bg-borr">
	<div class="wrapper">
		<nav class="navbar navbar-light bg-borr pl-40 pr-40 pt-30 pb-30">
			<div class="container-fluid float-">
				<a href="<?php echo site_url(); ?>timeline" style="color: #333;"> <span style="font-size: 30pt;">Lewati</span> </a>
			</div>
		</nav>

		<div class="container-fluid">
			<div class="p-40">
				<div class="row">
					<div class="mb-100">
						<h1 class="parent-title">Lengkapi Profile</h1>
					</div>
				</div>
				<div class="row mb-100">
					<div class="w-100 text-center">
						<!-- <img src="http://placehold.it/300x300" class="rounded-circle"> -->
						<div id="profile-container" class="mx-auto">
							<image id="profileImage" src="<?php base_url(); ?>public/img/profile/blank-photo.jpg" />
						</div>
						<input id="imageUpload" type="file" 
						name="profile_photo" placeholder="Photo" required="" capture>
						<img src="<?php base_url(); ?>public/img/assets/icon_plus_purple.svg" width="70" style="position: relative;bottom: 80px;left: 80px;">
					</div>
				</div>
				<div class="row mb-20">
					<div class="w-100">
						<label class="label-fs">Domisili</label>
						<input type="text" class="w-100 frmProf" id="yourDomisili" >
					</div>
				</div>
				<div class="row mb-20">
					<div class="w-100">
						<label class="label-fs">Bio</label>
						<input type="text" class="w-100 frmProf" id="yourBio" value="">
					</div>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-light bg-borr fixed-bottom p-70">
			<div class="w-100">
				<a href="<?php echo site_url(); ?>selectcategory" class="mx-auto btnupdate-prof">Lanjutkan</a>
			</div>
		</nav>
	</div>

<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
<script>
	$("#profileImage").click(function(e) {
		$("#imageUpload").click();
	});

	function fasterPreview( uploader ) {
		if ( uploader.files && uploader.files[0] ){
			$('#profileImage').attr('src', 
				window.URL.createObjectURL(uploader.files[0]) );
		}
	}

	$("#imageUpload").change(function(){
		fasterPreview( this );
	});
</script>
</body>
</html>
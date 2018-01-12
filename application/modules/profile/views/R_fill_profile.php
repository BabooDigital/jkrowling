<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?> <?php echo get_css($css) ?> <?php endif ?>
</head>
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
						<img src="http://placehold.it/300x300" class="rounded-circle">
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
</body>
</html>
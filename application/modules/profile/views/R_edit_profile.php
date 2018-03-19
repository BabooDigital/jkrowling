<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>

	<style type="text/css">
	.login-input{
		font-size:14px;"
		color:#eee;
		font-family: 'Proxima Nova', Georgia, sans-serif;
		height: 50px;
		border:1px solid #d7d7d7;
		box-shadow: #eee 0px 0px 0px 1px;
	}

	input.login-input:focus{
		color:#7554bd;
		border-color:#7554bd;
		box-shadow: 0px 0px 1px 0px #7554bd;
		font-size:15.5px;
	}

	input.login-input{
		color:gray;
		box-shadow: 0px;
	}

	input-placeholder.login-input{
		color:gray;
	}
</style>
</head>
<body class="bg-borr">
	<div class="wrapper">
		<nav class="navbar navbar-light bg-borr">
			<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left fa-2x"></i> </button>
		</nav>

		<div class="container-fluid">
			<div class="p-40">
				<div class="row">
					<div class="mb-50">
						<h1 class="parent-title">Edit Profile</h1>
					</div>
				</div>
				<div class="row mb-20">
					<div class="w-100">
						<label class="label-fs">Nama Lengkap</label>
						<input type="text" class="w-100 frmProf" id="yourName" value="<?php echo $userData['fullname'] ?>">
					</div>
				</div>
				<div class="row mb-20">
					<div class="w-100">
						<label class="label-fs">Tanggal Lahir</label>
						<input type="date" class="w-100 frmProf" id="yourBirth" value="<?php echo $userData['date_of_birth'] ?>">
					</div>
				</div>
				<div class="row mb-20">
					<div class="w-100">
						<label class="label-fs">Alamat</label>
						<input type="text" class="w-100 frmProf" id="yourLoc" value="">
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

		<nav class="navbar navbar-light bg-borr fixed-bottom">
			<div class="container-fluid p-30">
				<button id="confEdit" class="mx-auto btnupdate-prof">Simpan</button>
			</div>
		</nav>
	</div>

	<link rel="canonical" href="http://amsul.ca/pickadate.js/">
	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
	<script>
		// $(function() {
		// 	$('#yourBirth').pickadate();
		// });
			
		var base_url = '<?php echo base_url(); ?>';
	</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
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
		<nav class="navbar navbar-light bg-borr pl-40 pr-40 pt-30 pb-30">
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
						<!-- <input type="text" class="w-100 frmProf" name="p_name"> -->
						<input type="text" id="yourBirth" data-max-year="2015" data-first-item="name" data-format="YYYY-MM-DD" data-template="YYYY MM DD" data-custom-class="form-control login-input" data-smart-days="true"> 
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

	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
	<script>
		$(function() {
			$('#yourBirth').combodate('method');
		});
	</script>
</body>
</html>
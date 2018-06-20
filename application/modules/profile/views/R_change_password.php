<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>

	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>

	<style type="text/css">
	.form-control {
		height: 50px;
	}
	.error {
		color: red;
	}
</style>
</head>
<body class="bg-white">
	<div class="wrapper">
		<nav class="navbar bg-white">
			<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> </button>
		</nav>

		<form id="changePassForm">
			<div class="container mt-20 mb-30">
				<div class="row mb-10">
					<div class="col-12">
						<h3 style="font-weight: 800;">Ubah Password</h3>
					</div>
				</div>
				<div class="row mb-10">
					<div class="col-12">
						<p>Password minimal 8 karakter dengan kombinasi angka dan huruf</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Password Sekarang">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="newpass" name="newpass" placeholder="Password Baru">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="confirmnewpass" name="confirmnewpass" placeholder="Konfirmasi Password Baru">
						</div>
					</div>
				</div>
			</div>

			<nav class="navbar bg-white fixed-bottom">
				<div class="container">
					<button type="submit" id="confEdit" class="mx-auto btnupdate-prof">Simpan</button>
				</div>
			</nav>
		</form>
	</div>

	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		var base_url = '<?php echo base_url(); ?>';
		
		$("#changePassForm").validate({
			ignore: [],
			rules: {
				oldpass: {
					required: true
				},
				newpass: {
					required: true,
					minlength: 8
				},
				confirmnewpass: {
					required: true,
					minlength: 8,
					equalTo: "#newpass"
				}
			},
			messages: {
				oldpass: {
					required: 'Mohon isi password lama mu..'
				},
				newpass: {
					required: 'Mohon isikan password baru mu..',
					minlength: 'Password minimal adalah 8 karakter..'
				},
				confirmnewpass: {
					required: 'Konfirmasi password wajib diisi..',
					equalTo: 'Password yang anda masukan tidak sama..'
				}
			},
			submitHandler: function(form) {
				var a = new FormData();
				/* Act on the event */
				a.append("old_password", $("#oldpass").val());
				if ($("#newpass").val() === $("#confirmnewpass").val()) {
					a.append("new_password", $("#newpass").val());
				}
				$.ajax({
					url: base_url+'auth/changepass',
					type: 'POST',
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					data: a,
					beforeSend: function () {
						swal({
							title: 'Mohon tunggu...',
							onOpen: () => {
								swal.showLoading()
							}
						});
					}
				})
				.done(function(data) {
					if (data.code == 200) {
						window.location = base_url+'timeline';
					}else {
						location.reload();
					}
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
				});
			}
		});

	</script>
	<?php echo $this->session->flashdata('fail_alert'); ?>
</body>
</html>
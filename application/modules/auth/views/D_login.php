<!DOCTYPE html>
<html>
<head>

	<title>Login Baboo - Baca buku online</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/page/login.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/simple-line-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/fonts/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/font-awesome.min.css">

	<?php echo $script_captcha; ?>

</head>
<!-- CSS -->
<?php
	error_reporting(0);
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$parts = parse_url($actual_link);
	parse_str($parts['query'], $query);
	if (!empty($query['b'])) {
		$this->session->set_userdata('bookRef', $query['b']);
	}else{	

}
?>

<body>
	<div class="container-fluid">
		<div class="row no-gutters">

			<!-- Left Side Content -->
			<div class="col-md-8 nopadding">
				<div class="left-side">
					<center>
						<img src="<?php echo base_url();?>public/img/front-image/logo_purple.png" class="img-fluid img-left center-content floating">
						<p class="text-img floating">Baca buku online Indonesia</p>
					</center>

				</div>
			</div>
			<!-- End Left Side Content -->

			<!-- Right Side Content -->
			<div class="col-md-4 nopadding">
				<div class="right-side">
					<div class="right-side-p">
						<div class="row">
							<div class="col-lg-12">
								<a href="<?php echo site_url(); ?>home" class="skip-text">Langsung Baca Buku</a>
							</div>

							<div class="col-lg-12">
								<p class="right-text">Lanjutkan dengan</p>
							</div>

							<div class="col-lg-6 col-md-12 col-xl-6">
								<button class="btn btn-block btn-sosmed" id="login_fb">
									<img src="<?php echo base_url();?>public/img/assets/fb-icon.svg" class="btn-img-sosmed"> <span class="btn-text-sosmed">Facebook</span>
								</button>
							</div>

							<div class="col-lg-6 col-md-12 col-xl-6">
								<button class="btn btn-block btn-sosmed" id="login_google">	
									<img src="<?php echo base_url();?>public/img/assets/google-icon.svg" class="btn-img-sosmed"> <span class="btn-text-sosmed">Google</span>
								</button>
							</div>

							<div class="col-lg-12" style="margin-top:55.1px;">
								<p style="font-size:15px;">Atau login menggunakan email</p>
							</div>

							<div class="col-lg-12">
								<form id="login-form" action="<?php echo site_url(); ?>auth/C_Login/postloginuser" method="POST">
									<div class="form-group">
										<input type="email" class="form-control login-input" id="yourEmail" name="emails" placeholder="Alamat Email" value="test123@babolotoh.id">
									</div>

									<div class="form-group">
										<input type="password" class="required password error  form-control login-input" id="yourPassword" name="passwords" placeholder="Password" value="123456">
									</div>
									<div class="form-group">
										<?php echo $captcha; ?>
									</div>
									<p class="text-right text-daftar">Belum punya akun ? <a  data-toggle="modal" data-target="#register-modal" href="#" class="link-daftar">Daftar disini</a></p>
									<div class="pull-right">
										<button type="submit" name="submit" class="btn btn-primary pull-right btn-login"><i class="icon-arrow-right"></i></button>	
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>	
				<!-- End Right Side Content -->

			</div>
		</div>
		<!-- Modal Register -->
		<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content" style="width: 105% !important;">
					<div class="modal-body">
						<div class="container">

							<div class="col-lg-12 col-xl-12">
								<img src="<?php echo base_url();?>public/img/logo_purple.png" style="height:50px; margin-top:36px;">
							</div>

							<div class="col-lg-12 col-xl-12">

								<p class="text-img-modal">Selamat datang di Baboo</p>

								<form id="form-register" action="<?php echo site_url(); ?>auth/C_Login/postregisteruser" method="POST">
									<div class="form-group">
										<input type="text" class="form-control login-input" placeholder="Nama Lengkap" name="name">
									</div>

									<div class="form-group">
										<input type="email" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Email" name="email">
									</div>

									<div class="form-group">
										<input type="password" class="form-control login-input" id="password" placeholder="Kata Sandi" name="password">
									</div>
									<div class="form-group">
										<input type="password" class="form-control login-input" id="retype_password" placeholder="Retype Password" name="retype_password">
									</div>
									<p style="font-size:12px; color:#676767;">Tanggal lahir</p>

									<div class="form-group">
										<input type="text" id="date" data-max-year="2015" data-first-item="name" data-format="YYYY-MM-DD" data-template="YYYY MM DD" data-custom-class="form-control login-input" data-smart-days="true" name="tgl_lahir"> 
									</div>

									<div class="row">
										<div class="col-lg-4 col-xl-4">
											<div class="form-group">
												<div class="form-check">
													<input class="badar-radio" type="radio" name="j_kelamin" id="maleGen" value="male" checked> 
													<span class="text-modal">Laki-laki</span>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="form-check">
													<input class="badar-radio" type="radio" name="j_kelamin" id="femaleGen" value="female"> 
													<span class="text-modal" style="margin-left:15px; font-size:12px;">Perempuan</span>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="form-check">
													<?php echo $captcha; ?>
												</div>
											</div>
										</div>
									</div>
									<center>
										<p class="text-daftar" style="text-align:center;">Dengan mengklik tombol daftar, anda setuju pada <a  data-toggle="modal" data-target="#register-modal" href="#" class="link-daftar"><b>Terms of Service</b></a></p>
									</center>
									<button type="submit" class="btn btn-signup btn-block"><b>Daftar</b></button>
								</div> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal Register -->

	<!-- Footer -->
	<div class="container">
		<ul style="position: absolute; bottom: 10px; left:20px;">
			<li class="footer-link"><a href="<?php echo site_url(); ?>login" class="footer-link">Masuk</a></li>
			<li class="footer-link m-l-20"><a data-toggle="modal" data-target="#register-modal" href="#" class="footer-link">Daftar</a></li>
			<li class="footer-link m-l-20"><a href="https://www.baboo.id/about.html" target="_blank" class="footer-link">Tentang Baboo</a></li>
			<li class="footer-link m-l-20"><a href="#" class="footer-link">Terms of Use</a></li>
			<li class="footer-link m-l-20"><a href="https://www.baboo.id/kebijakan.html" target="_blank" class="footer-link">Privacy &amp; Policy</a></li>
			<li class="footer-link m-l-20"><a href="#" class="footer-link">Baboo Carrier</a></li>
		</ul>
	</div>
	<!-- End Footer -->

	<!-- Javascript -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/tether.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/combodate.js"></script>
	<script src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
	<script src="<?php echo base_url();?>public/js/additional-methods.js"></script>

	<script type="text/javascript">
		$(function() {
			$('#date').combodate('method');
			firstItem: 'name'
		});
		$(document).ready(function() {
			var getHashDaft = window.location.hash;
			if (getHashDaft != "" && getHashDaft == "#btndaftar") {
				$('#register-modal').modal('toggle');
			}
			$("#login-form").validate({
				rules: {
					emails: {
						required: true,
						email: true
					},
					passwords: {
						required: true,
						minlength: 5
					}
				},
				messages: {
					emails: {
						required: 'Email harus di isi'
					},
					passwords: {
						required: 'Password harus di isi',
						minlength: 'Password minimal 5 karakter'
					}
				}
			});
			$("#form-register").validate({
				ignore: [],
				rules: {
					name: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					password: {
						required: true,
						minlength: 5
					},
					retype_password: {
						equalTo: "#password"
					},
					tgl_lahir: {
						required: true
					}
				},
				messages: {
					name: {
						required: 'Nama lengkap harus di isi'
					},
					email: {
						required: 'Email harus di isi',
						email   : 'Email harus valid'
					},
					password: {
						required: 'Password harus di isi',
						minlength: 'Password minimal 5 karakter'
					},
					retype_password: {
						equalTo: 'Retype Password Tidak sama',
					},
					tgl_lahir: {
						required: 'Tanggal lahir harus di isi',
					}
				}
			});
			$("#login_fb").on("click", function() {
				window.location.href = '<?php echo $authUrl; ?>';
			});
			$("#login_google").on("click", function() {
				window.location.href = '<?php echo $authUrlG; ?>';
			});
		});
	</script>

</body>
</html>
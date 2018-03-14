<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Login Baboo - Baca buku online</title>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/page/login.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/simple-line-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/fonts/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/font-awesome.min.css">

</head>
<style>
#inputemail-error, #inputpass-error{
	color: red;
}
.subtitle { 
	color: #000;font-size: 13pt;font-weight: 600;
}
.bg-greypale {
	background: #f5f8fa;
}
.modal-content {
	border :none;
}
.btntnc {
	border: none;
    border-radius: 35px;
    padding: 10px 50px;
    box-shadow: 0px 2px 5px 0px #999999;
    font-weight: 600;
}
.btn-diss {
    background: #dadada;
    color: #333;
}
.btn-acc {
    background: #7661ca;
    color: #fff;
}
.mb-50 {
	margin-bottom: 50px;
}
</style>
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
			<div class="col-lg-8 col-xl-9 nopadding">
				<div class="left-side d-none hidden-md-down">
					<center>
						<img src="<?php echo base_url();?>public/img/logo_purple.png" class="img-fluid img-left animated slideInDown center-content">
						<p class="text-img animated slideInDown" style="font-size:12px;">Masuk ke Baboo</p>
					</center>
				</div>
			</div>

			<div class="col-lg-4 col-xl-3 nopadding">
				<div class="right-side">
					<div class="right-side-p" style="margin-bottom: 30px;">
						<div class="row" style="margin-right:-32px; margin-left:-32px;">
							<div class="col-lg-12 col-xs-12 text-right" style="margin-top:20px;">
								<a href="<?php echo site_url();?>home" style="right: 10px; top:10px; color:grey;">Langsung Baca Buku</a>
							</div>

							<div class="col-lg-12 col-xl-12">
								<img  src="<?php echo base_url();?>public/img/logo_purple.png" style="height:54px; margin-top:0px;" class="animated slideInDown">
								<p class="text-img animated slideInDown" style="margin-top:2px; color:#222;">Masuk ke Baboo</p>
							</div>
							<div class="col-lg-12">
								<span class="right-text" style="margin-top:0px;">Lanjutkan dengan</span>
							</div>

							<div class="col-lg-6 col-6" style="padding-right:5px;">
								<button class="btn btn-sosmed" id="login_fb" style="width: 100%;">
									<img src="public/img/assets/fb-icon.svg" class="btn-img-sosmed"> <span class="btn-text-sosmed" style="font-size:13px;">Facebook</span>
								</button>
							</div>

							<div class="col-lg-6 col-6" style="padding-left:5px;">
								<button class="btn btn-sosmed" style="width: 100%;" id="login_google">	
									<img src="public/img/assets/google-icon.png" class="btn-img-sosmed"> <span class="btn-text-sosmed" style="font-size:13px;">Google</span>
								</button>
							</div>

							<div class="col-lg-12" style="margin-top:30.1px;">
								<p style="font-size:14px;">Atau login dengan email</p>
							</div>

							<div class="col-lg-12">
								<form id="login-form" action="<?php echo site_url(); ?>auth/C_Login/postloginuser" method="post" novalidate="novalidate">
									<div class="form-group">
										<input type="email" class="form-control login-input" id="inputemail" name="emails" aria-describedby="emailHelp" placeholder="Masukan alamat email" required>
									</div>

									<div class="form-group">
										<input type="password" class="form-control login-input" id="inputpass" name="passwords" placeholder="Masukan password" required>
									</div>

									<p class="text-right text-daftar">Belum punya akun ? <a  data-toggle="modal" data-target="#register-modal" href="#" class="link-daftar">Daftar disini</a></p>
									<div class="pull-right">
										<button type="submit" class="btn btn-primary pull-right btn-login"><i class="icon-arrow-right"></i></button>	
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>	
			</div>	
		</div>
		<!-- Modal -->
		<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="width: 100%; height: 100%; padding: 0; margin:0;">
				<div class="modal-content" style="height:100%; border-radius:0; color:#333; overflow:auto;">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" style="font-size:13px; 	font-family: 'Proxima Nova', Georgia, sans-serif; ">Daftar Nanti </span>
						</button>
						<div class="row">
							<div class="col-lg-12 col-xl-12">
								<img  src="<?php echo base_url();?>public/img/logo_purple.png" style="height:54px; margin-top:30px;" class="animated slideInDown">
								<p class="text-img animated slideInDown" style="margin-top:2px; color:#222; font-size:15px;">Selamat datang di baboo</6p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-xl-12">
									<form id="form-register">
										<div class="form-group">
											<input type="text" class="form-control login-input" placeholder="Nama Lengkap" name="name" id="yname">
										</div>

										<div class="form-group">
											<input type="email" class="form-control login-input" id="emailRegis" aria-describedby="emailHelp" placeholder="Alamat Email" name="email">
										</div>

										<div class="form-group">
											<input type="password" class="form-control login-input" id="passRegis" placeholder="Kata Sandi" name="password">
										</div>
										<p style="font-size:12px; color:#676767;">Tanggal lahir</p>

										<div class="form-group">
											<input type="text" id="date" data-max-year="2015" data-first-item="name" data-format="YYYY-MM-DD" data-template="DD MM YYYY" data-custom-class="form-control login-input" data-smart-days="true" name="tgl_lahir"> 
										</div>

										<div class="row" style="margin-top:10px;">
											<div class="col-6">
												<div class="form-group">
													<div class="form-check">
														<label class="form-check-label">
															<input class="form-check-input" type="radio" name="j_kelamin" id="exampleRadios1" value="pria" checked> 
															<span class="text-modal" style="margin-left:5px;">Laki-laki</span>
														</label>
													</div>
												</div>
											</div>

											<div class="col-6">
												<div class="form-group">
													<div class="form-check">
														<label class="form-check-label">
															<input class="form-check-input" type="radio" name="j_kelamin" id="exampleRadios2" value="wanita">
															<span class="text-modal" style="margin-left:10px;">Perempuan</span>
														</label>
													</div>
												</div>
											</div>
										</div>
										<button type="submit" class="btn btn-signup btn-block"><b>Daftar</b></button>
									</div> 
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="width: 100%; height: 100%; padding: 0; margin:0;">
				<div class="modal-content" style="height:100%; border-radius:0; color:#333; overflow:auto;">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" style="font-size:13px; 	font-family: 'Proxima Nova', Georgia, sans-serif; ">Daftar Nanti </span>
						</button>
						<div class="row">
							<div class="col-lg-12 col-xl-12">
								<img  src="<?php echo base_url();?>public/img/logo_purple.png" style="height:54px; margin-top:30px;" class="animated slideInDown">
								<p class="text-img animated slideInDown" style="margin-top:2px; color:#222; font-size:15px;">Selamat datang di baboo</6p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-xl-12">
									<form id="form-login" action="<?php echo site_url(); ?>auth/C_Login/postloginevent" method="POST">
								<div class="row">
									<div class="col-lg-12">
										<p class="right-text">Lanjutkan dengan</p>
									</div>

									<div class="col-lg-6 col-md-12 col-xl-6">
										<button class="btn btn-block btn-sosmed" id="login_fb_event">
											<img src="<?php echo base_url();?>public/img/assets/fb-icon.svg" class="btn-img-sosmed"> <span class="btn-text-sosmed">Facebook</span>
										</button>
									</div>

									<div class="col-lg-6 col-md-12 col-xl-6">
										<button class="btn btn-block btn-sosmed" id="login_google_event">	
											<img src="<?php echo base_url();?>public/img/assets/google-icon.svg" class="btn-img-sosmed"> <span class="btn-text-sosmed">Google</span>
										</button>
									</div>

									<div class="col-lg-12" style="margin-top:55.1px;">
										<p style="font-size:15px;">Atau login menggunakan email</p>
									</div>

									<div class="col-lg-12">
										<form id="login-form" action="<?php echo site_url(); ?>auth/C_Login/postloginevent" method="POST">
											<div class="form-group">
												<input type="email" class="form-control login-input" id="yourEmail" name="emails" placeholder="Alamat Email">
											</div>

											<div class="form-group">
												<input type="password" class="required password error  form-control login-input" id="yourPassword" name="passwords" placeholder="Password">
											</div>
											<p class="text-right text-daftar">Belum punya akun ? <a  data-toggle="modal" data-target="#register-modal" href="#" class="link-daftar">Daftar disini</a></p>
											<div class="pull-right">
												<button type="submit" name="submit" class="btn btn-primary pull-right btn-login"><i class="icon-arrow-right"></i></button>	
											</form>
										</div>

									</div>
								</div>
							</div> 
						</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('include/modal_tnc'); ?>

		<!-- Javascript -->
		<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/tether.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/moment.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/combodate.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>
		<script src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
		<script src="<?php echo base_url();?>public/js/additional-methods.js"></script>	
		<script src="<?php echo base_url();?>public/js/custom/auth.js"></script>
		<script> var base_url = '<?php echo base_url(); ?>'</script>	
		<?php echo $this->session->flashdata('login_alert');?>
		<script type="text/javascript">
			$("#login_fb").on("click",function() {
				window.location.href = '<?php echo $authUrl; ?>';
			});
			$("#login_google").on("click",function() {
				window.location.href = '<?php echo $authUrlG; ?>';
			});
		</script>
	</body>
	</html>
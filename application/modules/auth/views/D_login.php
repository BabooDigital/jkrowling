<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Login Baboo - Baca buku online</title>
</head>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/baboo.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/fonts/fonts.css">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- BODY -->
<body style="background-color: #fff;">
	<div class="container-fluid">
		<div class="row">

			<!-- LEFT SIDE -->
			<div class="col-md-6 col-lg-7 col-xl-8 padding-0">
				<div class="left-side hidden-md-down">
					<div class="side-content-l">
						<center>
							<img src="<?php echo base_url();?>public/img/logo_purple.png" class="img-logo-login img-fluid animated slideInUp" style="">
							<p class="welcome-message  animated slideInLeft" style="animation-duration: 2s;">Selamat  datang di baboo</p>
						</center>
					</div>
				</div>				
			</div>
			<!-- END LEFT SIDE -->

			<!-- RIGHT SIDE -->
			<div class="col-md-6 col-lg-5 col-xl-4 col-xs-12 col-sm-12 padding-0">
				<div class="right-side  hidden-md-down">
					<div class="side-content-r">
						<a class="pull-right register-link2" href="#">Langsung baca buku <i class="fa fa-arrow-right icon-langsung-baca" aria-hidden="true"></i></a>	
							<div style="margin-top:100px;">
								<p class="text-label-login">Lanjutkan dengan</p>
									<div class="social-login  hidden-xs-down hidden-sm-down">
										<div class="row">
											<div class="col-md-6">
												<button class="btn btn-facebook btn-block">
													<img src="<?php echo base_url();?>public/img/assets/combined-shape-copy.svg" class="Combined-Shape-Copy">
														<span class="btn-teks">Facebook</span>
												</button>
											</div>
											<div class="col-md-6">
												<button class="btn btn-google btn-block">
													<img src="<?php echo base_url();?>public/img/google-button.png" class="img-fluid img-button">
														<span class="btn-teks">Google</span>
												</button>
											</div>
										</div>
									</div>
							</div>
						<div class="row">
							<div class="col-lg-12">
								<p class="text-label-login">Atau login dengan email</p>

								<!-- FORM -->
								<form>
									<div class="form-group">
										<input oninvalid="this.setCustomValidity('Silahkan masukan email dengan benar, contoh : andi@baboo.id')" type="email" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
									</div>
									<div class="form-group">
										<input type="password" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
									</div>
										<p class="text-right register-link" style="margin-top:30px;">Belum punya akun? <a data-toggle="modal" data-target="#exampleModal" href="#" class="register-link2">Daftar disini</a></p>
										<button class="btn button-login pull-right" style="margin-top:10px;"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
								</form>
								<!-- END FORM -->

							</div>
						</div>
					</div>	
				</div>
			</div>
			<!-- END RIGHT SIDE -->


			<!-- RIGHT SIDE TAB -->
			<div class="col-md-8 offset-md-2 padding-0">
				<div class="right-side hidden-lg-up hidden-sm-down">
					<div class="side-content-r">
						<a class="pull-right register-link2" href="#">Langsung baca buku <i class="fa fa-arrow-right icon-langsung-baca" aria-hidden="true"></i></a>	
							<div style="margin-top:100px;">
								<center><img src="<?php echo base_url();?>public/img/logo_purple.png" style="height:100px;">
								<p class="welcome-message hidden-sm-down" style="font-size:16px;">Selamat datang di Baboo, Buat, Baca, Jual Buku Online</p>
								<p class="welcome-message hidden-md-up" style="font-size:16px;">Selamat datang di Baboo</p></center>
								<p class="text-label-login">Lanjutkan dengan</p>
									<div class="social-login  hidden-lg-up">
										<div class="row  hidden-sm-down">
											<div class="col-md-6">
												<button class="btn btn-facebook btn-block">
													<img src="<?php echo base_url();?>public/img/assets/combined-shape-copy.svg" class="Combined-Shape-Copy">
														<span class="btn-teks">Facebook</span>
												</button>
											</div>
											<div class="col-md-6">
												<button class="btn btn-google btn-block">
													<img src="<?php echo base_url();?>public/img/google-button.png" class="img-fluid img-button">
														<span class="btn-teks">Google</span>
												</button>
											</div>
										</div>
									</div>
							</div>
						<div class="row">
							<div class="col-lg-12">
								<p class="text-label-login">Atau login dengan email</p>

								<!-- FORM -->
								<form>
									<div class="form-group">
										<input oninvalid="this.setCustomValidity('Silahkan masukan email dengan benar, contoh : andi@baboo.id')" type="email" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
									</div>
									<div class="form-group">
										<input type="password" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
									</div>
										<p class="text-right register-link" style="margin-top:30px;">Belum punya akun? <a data-toggle="modal" data-target="#exampleModal" href="#" class="register-link2">Daftar disini</a></p>
										<button class="btn btn-daftar btn-block">Masuk</button>								</form>
								<!-- END FORM -->

							</div>
						</div>
					</div>	
				</div>
			</div>
			<!-- END RIGHT SIDE TAB-->

		</div>
	</div>
</body>
<!-- END BODY -->


<!-- Modal -->
<div class="modal animated  zoomIn " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="konten">
			<a class="pull-right register-link2"  data-dismiss="modal" href="#">Daftar nanti <i class="fa fa-times icon-langsung-baca" aria-hidden="true"></i></a>
			<img src="<?php echo base_url();?>public/img/logo_purple.png" style="height:50px; margin-top: 30px;">
			<p class="welcome-message" style="font-size:16px;">Selamat datang di Baboo</p>
			<form style="margin-top:30px;">
				<div class="form-group">
					<input type="text" class="form-control login-input" placeholder="Nama Lengkap">
				</div>

				<div class="form-group">
					<input oninvalid="this.setCustomValidity('Silahkan masukan email dengan benar, contoh : andi@baboo.id')" type="email" class="form-control login-input" placeholder="Email">
				</div>

				<div class="form-group">
					<input type="password" class="form-control login-input" placeholder="Buat Password">
				</div>

				<div class="form-group">
					<label style="font-size:12px; font-family: 'Proxima Nova', Georgia, sans-serif;">Tanggal Lahir</label>
					<div class="row">
						<div class="col-md-4">
							<select class="form-control login-input">
								<option>Tanggal</option>
							</select>
						</div>
						<div class="col-md-4">
							<select class="form-control login-input">
								<option>Bulan</option>
							</select>
						</div>
						<div class="col-md-4">
							<select class="form-control login-input">
								<option>Tahun</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:30px;">
					<div class="col-md-3">
						<div class="form-check">
						  <label class="form-check-label">
						    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
						    Laki-laki
						  </label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-check">
						  <label class="form-check-label">
						    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
						    Perempuan
						  </label>
						</div>
					</div>
				</div>
				<p style="margin-top:30px;" class="text-center register-link">Dengan mengklik tombol daftar, anda setuju pada <a href="#" class="register-link3"><b>Terms of Service</b></a></p>
				<button class="btn btn-daftar btn-block">Daftar</button>
			</form>
		</div>        
      </div>
    </div>
  </div>
</div>


<!-- Javascript -->
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/tether.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
</html>
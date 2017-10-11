<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Login Baboo - Baca buku online</title>
</head>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/page/login.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/simple-line-icons.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/fonts/fonts.css">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
	<div class="container-fluid">
		<div class="row no-gutters">
				<div class="col-lg-8 col-xl-9 nopadding">
		 			<div class="left-side">
		 				<center>
		 					<img src="<?php echo base_url();?>public/img/logo_purple.png" class="img-fluid img-left animated slideInDown center-content">
		 					<p class="text-img animated slideInDown">Selamat datang di Baboo</p>
		 				</center>
		 			</div>
		 		</div>

				<div class="col-lg-4 col-xl-3 nopadding">
		 			<div class="right-side">
		 				<div class="right-side-p">
		 						<div class="row">
		 							<div class="col-lg-12">
		 								<a href="#" class="skip-text">Langsung Baca Buku</a>
		 							</div>

		 							<div class="col-lg-12">
		 								<p class="right-text" style="margin-top:72.2px;">Lanjutkan dengan</p>
		 							</div>

		 							<div class="col-lg-6">
		 								<button class="btn btn-block btn-sosmed">
											<img src="public/img/assets/fb-icon.svg" class="btn-img-sosmed"> <span class="btn-text-sosmed">Facebook</span>
										</button>
		 							</div>

		 							<div class="col-lg-6">
		 								<button class="btn btn-block btn-sosmed">	
											<img src="public/img/assets/google-icon.png" class="btn-img-sosmed"> <span class="btn-text-sosmed">Google</span>
		 								</button>
		 							</div>

		 							<div class="col-lg-12" style="margin-top:55.1px;">
		 								<p style="font-size:14px;">Atau login dengan email</p>
		 							</div>

		 							<div class="col-lg-12">
										<form>
										  <div class="form-group">
										    <input type="email" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
										  </div>

										  <div class="form-group">
										    <input type="password" class="form-control login-input" id="exampleInputPassword1" placeholder="Password">
										  </div>
										  <p class="text-right text-daftar">Belum punya akun ? <a  data-toggle="modal" data-target="#myModal" href="#" class="link-daftar">Daftar disini</a></p>
										  <button type="submit" class="btn btn-primary pull-right btn-login"><i class="icon-arrow-right"></i></button>
										</form>
		 							</div>

		 						</div>
		 				</div>
		 			</div>
		 		</div>	
	 	</div>
	</div>
</body>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"> &times;</span>
      	</button>
      	<div class="row" style="margin-top:30px;">
      		<div class="col-lg-12 col-xl-12">
      			<center>
      				<img src="<?php echo base_url();?>public/img/logo_purple.png" style="height:80px;" class="animated slideInDown">
		 			<p class="text-img animated slideInDown">Daftar Baboo</p>
      			</center>
      		</div>
      	</div>
      	<div class="container">
		 	<div class="col-lg-12 col-xl-12">
				<form>
					<div class="form-group">
						<input type="text" class="form-control login-input" placeholder="Nama Lengkap">
					</div>

					<div class="form-group">
						<input type="email" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					</div>

					<div class="form-group">
						<input type="password" class="form-control login-input" id="exampleInputPassword1" placeholder="Password">
					</div>
					<p style="font-size:12px; color:#676767;">Tanggal lahir</p>

					<div class="row">
						<div class="col-lg-4 col-xl-4">
							<div class="form-group">
								<select class="form-control login-input">
									<option>Tanggal</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-xl-4">
							<div class="form-group">
								<select class="form-control login-input">
									<option>Bulan</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-xl-4">
							<div class="form-group">
								<select class="form-control login-input">
									<option>Tahun</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-lg-4 col-xl-4">
							<div class="form-group">
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked> 
								    <span class="text-modal">Laki-laki</span>
								  </label>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-xl-4">
							<div class="form-group">
								<div class="form-check">
								  <label class="form-check-label">
								    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
								    <span class="text-modal">Perempuan</span>
								  </label>
								</div>
							</div>
						</div>
					</div>
					<center>
						<p class="text-daftar" style="text-align:center;">Dengan mengklik tombol daftar, anda setuju pada <br><a  data-toggle="modal" data-target="#myModal" href="#" class="link-daftar"><b>Terms of Service</b></a></p>
					</center>
					<button class="btn btn-signup btn-block"><b>Daftar</b></button>
					</div> 
				</form>
		 	</div>

      	</div>
      </div>
    </div>
  </div>
</div>

<!-- Javascript -->
<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/tether.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
</html>
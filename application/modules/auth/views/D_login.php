<!DOCTYPE html>
<html>
<head>
	<title>Login Baboo - Baca buku online</title>
</head>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/page/login.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/simple-line-icons.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/fonts/fonts.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/sweetalert2.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<body>
	<div class="container-fluid">
		<div class="row no-gutters">

			<!-- Left Side Content -->
				<div class="col-lg-8 col-md-7 col-xl-9 nopadding">
		 			<div class="left-side">
		 				<center>
		 					<img src="<?php echo base_url();?>public/img/front-image/logo_purple.png" class="img-fluid img-left center-content floating">
		 					<p class="text-img floating">Baca buku online Indonesia</p>
		 				</center>

		 			</div>
		 		</div>
		 	<!-- End Left Side Content -->

		 	<!-- Right Side Content -->
				<div class="col-lg-4 col-md-5 col-xl-3 nopadding">
		 			<div class="right-side">
		 				<div class="right-side-p">
		 						<div class="row">
		 							<div class="col-lg-12">
		 								<a href="<?php echo site_url(); ?>timeline/C_timeline/Beranda" class="skip-text">Langsung Baca Buku</a>
		 							</div>

		 							<div class="col-lg-12">
		 								<p class="right-text">Lanjutkan dengan</p>
		 							</div>

		 							<div class="col-lg-6 col-md-12 col-xl-6">
		 								<button class="btn btn-block btn-sosmed">
											<img src="public/img/assets/fb-icon.svg" class="btn-img-sosmed"> <span class="btn-text-sosmed">Facebook</span>
										</button>
		 							</div>

		 							<div class="col-lg-6 col-md-12 col-xl-6">
		 								<button class="btn btn-block btn-sosmed">	
											<img src="public/img/assets/google-icon.svg" class="btn-img-sosmed"> <span class="btn-text-sosmed">Google</span>
		 								</button>
		 							</div>

		 							<div class="col-lg-12" style="margin-top:55.1px;">
		 								<p style="font-size:15px;">Atau login menggunakan email</p>
		 							</div>

		 							<div class="col-lg-12">
										<form id="login-form" action="asdsa.html" method="POST">
										  <div class="form-group">
										    <input type="email" class="form-control login-input" id="exampleInputPassword1" placeholder="Alamat Email">
										  </div>

										  <div class="form-group">
										    <input type="password" class="required password error  form-control login-input" id="exampleInputPassword1" placeholder="Password">
										  </div>

										  <p class="text-right text-daftar">Belum punya akun ? <a  data-toggle="modal" data-target="#myModal" href="#" class="link-daftar">Daftar disini</a></p>
										  <div class="pull-right">
										  <button type="submit" class="btn btn-primary pull-right btn-login"><i class="icon-arrow-right"></i></button>	
										</form>
		 							</div>

		 						</div>
		 				</div>
		 			</div>
		 		</div>	
		 	<!-- End Right Side Content -->

	 	</div>
	</div>
</body>

<!-- Modal Register -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 105% !important;">
      <div class="modal-body">
      	<div class="container">

      		<div class="col-lg-12 col-xl-12">
      			<img src="<?php echo base_url();?>public/img/logo_purple.png" style="height:50px; margin-top:36px;">
      		</div>

		 	<div class="col-lg-12 col-xl-12">

		 		<p class="text-img-modal">Selamat datang di Baboo</p>

				<form>
					<div class="form-group">
						<input type="text" class="form-control login-input" placeholder="Nama Lengkap">
					</div>

					<div class="form-group">
						<input type="email" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Email">
					</div>

					<div class="form-group">
						<input type="password" class="form-control login-input" id="exampleInputPassword1" placeholder="Kata Sandi">
					</div>
					<p style="font-size:12px; color:#676767;">Tanggal lahir</p>

					<div class="form-group">
						<input  type="text" id="date" data-max-year="2017" data-first-item="name" data-format="DD-MM-YYYY" data-template="D MMM YYYY" data-custom-class="form-control login-input" data-smart-days="true"> 
					</div>

					<div class="row">
						<div class="col-lg-4 col-xl-4">
							<div class="form-group">
								<div class="form-check">
								    <input class="badar-radio" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked> 
								    <span class="text-modal">Laki-laki</span>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-xl-6">
							<div class="form-group">
								<div class="form-check">
								    <input class="badar-radio" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"> 
								    <span class="text-modal" style="margin-left:15px; font-size:12px;">Perempuan</span>
								</div>
							</div>
						</div>

					</div>
					<center>
						<p class="text-daftar" style="text-align:center;">Dengan mengklik tombol daftar, anda setuju pada <a  data-toggle="modal" data-target="#myModal" href="#" class="link-daftar"><b>Terms of Service</b></a></p>
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
<!-- End Modal Register -->

<!-- Footer -->
<div class="container">
	<ul style="position: absolute; bottom: 10px; left:20px;">
  		<li class="footer-link"><a href="#" class="footer-link">Masuk</a></li>
  		<li class="footer-link m-l-20"><a href="#" class="footer-link">Daftar</a></li>
  		<li class="footer-link m-l-20"><a href="#" class="footer-link">Tentang Baboo</a></li>
  		<li class="footer-link m-l-20"><a href="#" class="footer-link">Terms of Use</a></li>
  		<li class="footer-link m-l-20"><a href="#" class="footer-link">Privacy & Policy</a></li>
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
<script src="<?php echo base_url();?>public./js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>public./js/additional-methods.js"></script>
<script type="text/javascript">
$(function(){
    $('#date').combodate('method');
    firstItem: 'name'	
});
</script>


<script>
$("#commentForm").validate();
</script>
<!-- End Java Script -->


<script type="text/javascript">
$(document).ready(function() {
$("#login-form").validate({

    errorPlacement: function(label, element) {
        label.addClass('errormsg');
        label.insertAfter(element);
    },
    wrapper: 'span',
    rules:{ nama:"required",
            umur:{required:true,number: true},      
            username:"required",
            password:{required: true,minlength:5},      
            cpassword:{required: true,equalTo: "#password"},
            email:{required:true,email:true},
            website:{required:true,url:true}
          },
    messages:{ 
            nama:{required:'Nama harus di isi'},
            umur:{
                required:'Umur harus di isi',
                number  :'Hanya boleh di isi Angka'},
            username: {
                required:'Username harus di isi'},
            password: {
                required :'Password harus di isi',
                minlength:'Password minimal 5 karakter'},
            cpassword: {
                required:'Ulangi Password harus di isi',
                equalTo :'Isinya harus sama dengan Password'},
            email: {
                required:'Email harus di isi',
                email   :'Email harus valid'},
            website: {
                required:'Website harus di isi',
                url     :'Alamat website harus valid'}
            },
     success: function(label) {
        label.text('<i class=""></i>').addClass('valid');}
    });
});
</script>

</html>
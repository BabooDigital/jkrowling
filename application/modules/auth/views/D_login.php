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


	<link href="<?php echo base_url('') ?>public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url('') ?>public/css/baboo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('') ?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('') ?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('') ?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('') ?>public/css/sweetalert2.min.css" rel="stylesheet" type="text/css">
	
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
	<div class="container-fluid p-0">
		<div class="row no-gutters">
			<!-- Left Side Content -->
			<div class="col-md-8" >
				<div class="left-side" style="padding: 50px;">
					<img src="<?php echo base_url();?>public/img/front-image/logo_purple.png" class="" width="150" height="auto">
					<br>
					<p class="text-img">Selamat Datang di Baboo</p>
					<center>
						<div class="slideboo" style="width: 100%;">
							<!-- <div class="leftboo"></div> -->
							<div class="slidecontrols">
								<span id="slider-prev" style="position: absolute; left: 5%;"></span>  
								<span id="slider-next" style="position: absolute; right: 5%;"></span>
							</div>
							<!-- SLIDE BABOO -->
							<div style="width: 100%; height: auto;position: relative;">
								<div class="slider_login">
									<div class="" style="padding-top: 15px">
										<img src="<?php echo base_url('public/img/slide/child.png') ?>" width="auto" height="350">
										<div class="" style="padding: 5% 0;color:black;">
											<p class="nulis">Nulis dan Baca Buku Jadi Lebih Asik</p>
											<p class="bisa">Sekarang kamu bisa nulis dan baca buku dengan smartphone kesayangan kamu</p>
										</div>
									</div>
									<div class="" style="padding-top: 15px">
										<img src="<?php echo base_url('public/img/slide/child2.svg') ?>" width="auto" height="350">
										<div class="" style="padding: 5% 0;color:black;">
											<p class="nulis">Hobi Nulismu Bisa Jadi Penghasilan</p>
											<p class="bisa">Kini saatnya kamu bisa mewujudkan mimpimu untuk menjadi penulis dan menghasilkan rewards</p>
										</div>
									</div>
									<div class="" style="padding-top: 15px">
										<img src="<?php echo base_url('public/img/slide/library.svg') ?>" width="auto" height="350">
										<div class="" style="padding: 5% 0;color:black;">
											<p class="nulis">Buat Perpustakaan Pribadi </p>
											<p class="bisa">Gak perlu lagi bingung ngatur buku dikamar, cukup di Baboo kamu bisa buat perpustakaan sendiri</p>
										</div>
									</div>
									<div class="" style="padding-top: 15px">
										<img src="<?php echo base_url('public/img/slide/status.svg') ?>" width="auto" height="350">
										<div class="" style="padding: 5% 0;color:black;">
											<p class="nulis">Udah Siap?</p>
											<p class="bisa">Udah gak jaman update status doang, sekarang kamu bisa berkarya lewat cerita dan imajinasi kreatifmu</p>
										</div>
									</div>
								</div>
							</div>
							<!-- END SLIDE BABOO -->
						</div>
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
								<?php 
									$attr= array('id' => 'login-form'); 
									echo form_open('auth/C_Login/postloginuser', $attr);
								?>
									<div class="form-group">
										<input type="email" class="form-control login-input" id="yourEmail" name="emails" placeholder="Alamat Email">
									</div>

									<div class="form-group">
										<input type="password" class="required password error  form-control login-input" id="yourPassword" name="passwords" placeholder="Password">
									</div>
									<p class="text-right text-daftar">Belum punya akun ? <a  data-toggle="modal" data-target="#register-modal" href="#" class="link-daftar">Daftar disini</a></p>
									<div class="pull-right">
										<button type="submit" name="submit" class="btn btn-primary pull-right btn-login"><i class="icon-arrow-right"></i></button>	
									<?php echo form_close(); ?>
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
							<div class="register_later">
								<a href="<?php echo site_url('') ?>">Daftar Nanti &nbsp;&nbsp;&nbsp; &#8658;</a>
							</div>
							<?php if ($this->session->flashdata('isRegistered')): ?>
								<div class="alert alert-warning">
									<strong>Warning!</strong> Email Sudah Digunakan.
								</div>
							<?php endif ?>
							<br><br>
							<div class="col-lg-12 col-xl-12">
								<img src="<?php echo base_url();?>public/img/logo_purple.png" style="height:50px;">
							</div>

							<div class="col-lg-12 col-xl-12">

								<p class="text-img-modal">Selamat datang di Baboo</p>

								<?php 
									$attr = array('id' => 'form-register'); 
									echo form_open('auth/C_Login/postregisteruser', $attr);
								?>
								
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
									</div>
									<center>
										<p class="text-daftar" style="text-align:center;">Dengan mengklik tombol daftar, anda setuju pada <a  data-toggle="modal" data-target="#tnc" href="#" class="link-daftar"><b>Terms of Service</b></a></p>
									</center>
									<button type="submit" class="btn btn-signup btn-block"><b>Daftar</b></button>
								</div> 
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal Register -->
	<!-- Modal Login -->
	<div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="width: 105% !important;">
				<div class="modal-body">
					<div class="container">
						<?php if ($this->session->flashdata('login_alert')): ?>
							<div class="alert alert-warning">
								<strong>Warning!</strong> Username atau password salah.
							</div>
						<?php endif ?>
						<div class="col-lg-12 col-xl-12">
							<img src="<?php echo base_url();?>public/img/logo_purple.png" style="height:50px; margin-top:36px;">
						</div>

						<div class="col-lg-12 col-xl-12">

							<p class="text-img-modal">Selamat datang di Baboo</p>

							
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
										<?php 
											$attr = array('id' => 'login-formevent');
											echo form_open('auth/C_Login/postloginevent', $attr);
										?>
										
											<div class="form-group">
												<input type="email" class="form-control login-input" id="yourEmailRe" name="emails" placeholder="Alamat Email">
											</div>

											<div class="form-group">
												<input type="password" class="required password error  form-control login-input" id="yourPasswordRe" name="passwords" placeholder="Password">
											</div>
											<p class="text-right text-daftar">Belum punya akun ? <a  data-toggle="modal" data-target="#register-modal" href="#" class="link-daftar">Daftar disini</a></p>
											<div class="pull-right">
												<button type="submit" name="submit" class="btn btn-primary pull-right btn-login"><i class="icon-arrow-right"></i></button>	
										<?php echo form_close(); ?>
										</div>

									</div>
								</div>
							</div> 
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="tnc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content" style="width: 105% !important;">
					<div class="">
					</div>
					<div class="modal-header">
						<b>Syarat & Ketentuan</b>
						<button type="button" data-dismiss="modal" class="close-btn">×</button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="col-12 text-justify mb-50" style="color: #000;">
								<p class="subtitle">A.Umum</p>
								<p>PT. Baboo Digital Indonesia adalah suatu perusahaan yang didirikan berdasarkan dan tunduk kepada hukum Republik Indonesia (“Baboo” atau “kami”).  Baboo mempunyai bisnis utama menjalankan situs marketplace yang bertindak sebagai jasa perantara dengan sistem user generated content untuk mempertemukan pembeli dan penjual secara online (“Layanan”) di situs Baboo dan situs-situs lainnya serta aplikasi mobile dari Layanan (“Situs”). Setiap rujukan terhadap Baboo dalam Syarat &amp; Ketentuan Umum ini, apabila relevan, adalah termasuk afiliasinya (perusahaan berdasarkan kendali dan kepemilikan bersama), sebagian ataupun seluruh karyawannya, termasuk para direksi dan komisarisnya.</p>
								<p>Situs dan Layanan ini disediakan kepada anda dengan tunduk kepada Syarat dan Ketentuan Umum ini.  Penggunaan istilah “anda” atau “pengguna” berarti setiap orang yang menggunakan atau mengakses Layanan atau Situs baik secara manual maupun melalui sistem otomatis, termasuk setiap orang yang melihat-lihat Layanan dan materi di dalamnya, memberikan komentar terhadap materi atau merespon terhadap iklan yang dipasang di dalam Situs.</p>
								<p>Dengan menggunakan Layanan, anda setuju untuk tunduk kepada Syarat dan Ketentuan Umum ini dan setiap syarat dan ketentuan serta petunjuk lain yang berlaku untuk Layanan, yang mungkin diubah atau diperbarui oleh Baboo dari waktu ke waktu atas kebijaksanaannya sendiri.</p>
								<p>Apabila anda tidak setuju atas Syarat &amp; Ketentuan Umum ini, kami mempersilakan anda untuk tidak melanjutkan penggunaan Layanan.</p>
								<p>Baboo dapat menyediakan terjemahan dari Syarat dan Ketentuan ini ke dalam Bahasa Asing. Anda memahami dan setuju bahwa meskipun Syarat dan Ketentuan ini telah diterjemahkan ke dalam Bahasa asing, apabila terjadi ketidakkonsistenan antara versi Bahasa Indonesia dengan terjemahan Bahasa asing maka yang berlaku adalah versi Bahasa Indonesia.</p>
								<p class="subtitle">B. Definisi</p>
								<p>Login adalah proses saat pengguna terdaftar melakukan upaya masuk dengan mengisi kolom email dan password, ataupun koneksi dengan jejaring sosial.</p>
								<p>Pengguna terdaftar/Member adalah seseorang, organisasi, atau badan hukum yang telah terdaftar di database Baboo.</p>
								<p>Pengguna tidak terdaftar/Non-member adalah seseorang, organisasi, atau badan hukum yang belum terdaftar di database Baboo termasuk setiap orang, organisasi, atau badan hukum yang melihat-lihat Layanan dan materi di dalamnya, memberikan komentar terhadap materi atau merespon terhadap iklan yang dipasang di dalam Situs.</p>
								<p>Pengguna adalah seseorang, organisasi, atau badan hukum, baik sebagai member ataupun non-member, yang berkunjung, melakukan transaksi pembayaran, ataupun menggunakan layanan lainnya di Baboo..</p>
								<p>Refund adalah kegiatan mengembalikan dana pengguna ke Akun Bank pengguna jika terjadi pembatalan transaksi.</p>
								<p>Transaksi adalah kegiatan melakukan pembayaran ataupun pembelian produk-produk yang tersedia di Baboo.</p>
								<p>Penerbit adalah pihak yang menerbitkan naskah penulis untuk dibuat menjadi buku, e-book, ataupun majalah</p>
								<p class="subtitle">C. Ketersediaan Buku dan harga</p>
								<p>Seluruh buku yang dapat dibeli di Baboo dianggap selalu tersedia di penerbit, kecuali jika penerbit menyatakan bahwa buku yang bersangkutan telah kosong. Baboo tidak dapat memberikan jaminan bahwa setiap pesanan member masih tersedia di penerbit.</p>
								<p>Harga yang anda lihat sebagai oleh pengguna adalah harga yang ditetapkan oleh pengunggah oleh karenanya harga dapat berubah sewaktu-waktu tanpa pemberitahuan terlebih dahulu.</p>
								<p class="subtitle">D. Pembayaran Transaksi</p>
								<p>Setiap transaksi pembelian yang dilakukan dianggap sah dan akan diproses setelah member menyelesaikan proses pembayaran hingga selesai. Transaksi pembayaran akan terproses secara otomatis jika member melakukan transfer dengan nilai dan tujuan rekening yang sesuai dengan yang tertera pada halaman pembayaran.</p>
								<p>Pada halaman pembayaran pengguna dapat memilih salah satu dari sistem pembayaran yang Baboo sediakan, diantaranya :</p>
								<ul>
									<li>Transfer Bank (Internet Banking)</li>
									<li>Virtual Account (ATM)</li>
									<li>Credit Card</li>
									<li>Doku Wallet</li>
									<li>Alfa Group</li>
								</ul>
								<p>Dengan Semua tujuan rekening ke Bank Mandiri - No. Rek: 157-000-5677-498&nbsp; atas nama PT.Baboo Digital Indonesia yang dikelola oleh pihak ketiga</p>
								<p class="subtitle">E. Keanggotaan</p>
								<p>Anda dapat memilih untuk menjadi pengguna terdaftar/member Baboo. Dengan mendaftarkan diri untuk menjadi member dan kemudian melakukan login di Baboo, pengguna terdaftar dapat memperoleh akses untuk fitur-fitur berikut ini, yaitu:</p>
								<ol>
									<li>Melakukan transaksi pembelian untuk buku lokal ataupun buku impor yang tersedia di Baboo</li>
									<li>Mengikuti kegiatan promo yang sedang berlangsung</li>
									<li>Mengakses histori transaksi untuk melihat catatan seluruh transaksi yang pernah dilakukan</li>
									<li>Melakukan perubahan password</li>
									<li>Mendapatkan email bukti transaksi setiap melakukan transaksi pembayaran</li>
									<li>Memilih buku favorit member</li>
									<li>Memilih koleksi buku member</li>
									<li>Menulis testimonial</li>
									<li>Mendaftar jadi penulis dan menjual hasil buku</li>
								</ol>
								<p class="subtitle">F. Batasan Tanggung Jawab</p>
								<p>Baboo tidak bertanggung jawab atas kebenaran informasi, gambar dan keterangan, termasuk namun tidak terbatas pada perincian mengenai judul iklan, deskripsi, harga, alamat, nomor telepon yang diberikan oleh Pengunggah.Anda disarankan untuk berhubungan langsung dengan Pengunggah untuk memastikan informasi yang dicari.</p>
								<p>Setiap informasi yang dibuat oleh Pengunggah di Situs mengenai perusahaan, perorangan atau badan lainnya, dan/atau mengenai produk atau layanan mereka, bukan merupakan bentuk dukungan atau sokongan, ataupun mengimplikasikan dukungan atau sokongan, terhadap kualitas atau kelayakan&nbsp; dari perorangan, perusahaan atau badan tersebut, atau terhadap layanan atau produknya. Tanggung jawab isi dan/atau materi iklan yang dipasang oleh Pengunggah (&ldquo;Materi&rdquo;) merupakan tanggung jawab sepenuhnya dari Pengunggah.</p>
								<p>Baboo tidak memiliki hak milik atas iklan yang dipasang oleh pengguna,</p>
								<p>Informasi, gambar dan keterangan lainnya yang terdapat atau diterbitkan dalam Situs ini juga dapat mengandung ketidakakuratan atau kesalahan tipografis. Para Pengunggah mungkin akan melakukan perubahan atau perbaikan, dan/atau memperbarui informasi yang tertera di dalam Situs dari waktu ke waktu. Baboo tidak menanggung kewajiban untuk memperbaharui Materi yang telah menjadi kadaluwarsa atau tidak akurat.</p>
								<p>Baboo tidak bertanggung jawab atas semua jaminan dan kondisi, termasuk segala implikasi dari jaminan, kualitas, kelayakan atas informasi yang disampaikan Pengunggah. Dalam keadaan apapun, Baboo tidak bertanggung jawab atas kerugian, baik khusus, langsung, tidak langsung ataupun yang bersifat konsekuensial, maupun kerugian atau kerusakan apapun sebagai akibat dari kerugian atas pemakaian, data atau keuntungan, baik dalam tindakan perikatan, kelalaian atau tindakan kesalahan lainnya, yang muncul dari atau berkaitan dengan penggunaan atau kinerja dari informasi dan/atau gambar yang disediakan oleh Pengunggah.</p>
								<p>Baboo tidak bertanggung jawab atas akibat langsung atau tidak langsung dari keputusan pengguna/calon pembeli dalam mengajukan penawaran atau tidak mengajukan penawaran kepada Pengunggah, melakukan jual beli atau tidak melakukan jual beli dengan Pengunggah.</p>
								<p>Baboo tidak bertanggung jawab atau berkewajiban atas penyerahan barang atau jasa, termasuk kepatuhan pembeli dan Pengunggah dengan ketentuan perundang-undangan yang berlaku di Republik Indonesia baik dalam hal penawaran ataupun penjualan barang dan jasa ataupun transaksi lainnya.</p>
								<p>Baboo tidak bertanggung jawab dan tidak berkewajiban terhadap Layanan yang tidak tersedia untuk sementara waktu sehubungan dengan masalah teknis yang berada di luar kendali kami.</p>
								<p>Melalui Layanan, anda dapat terhubung ke situs-situs web lain yang tidak berada di bawah kontrol kami. Penyertaan suatu tautan (hyperlink) bukan berarti merupakan rekomendasi atau dukungan atas pandangan yang ditegaskan di dalam tautan (hyperlink) tersebut. Setiap upaya dilakukan untuk menjaga agar Layanan tetap berjalan lancar.</p>
								<p>Layanan yang diberikan Baboo adalah &ldquo;sebagaimana adanya&rdquo;, "dengan segala kekurangan", dan "sebagaimana tersedia" tanpa jaminan apapun juga.Baboo dengan tegas menolak setiap jaminan mengenai keamanan, keandalan, dan pelaksanaan kegiatan-kegiatan yang dilakukan oleh para pengguna di Layanan dan jaminan atau ketentuan mengenai tidak ada pelanggaran, dapat diperdagangkan dan kelayakan untuk suatu tujuan tertentu. Dalam hal apapun Baboo tidak berkewajiban atas suatu kerugian langsung, khusus, tidak langsung, yang merupakan contoh atau yang dapat dihukum, baik dalam suatu perikatan, perbuatan melawan hukum atau teori hukum lain, sekalipun kami telah diberitahu tentang kemungkinan kerugian tersebut.</p>
								<p>Pengguna memahami dan menyetujui bahwa penggunaan dan pelaksanaan kegiatan sehubungan dengan Situs dan Layanan oleh pengguna adalah atas kebijakan dan risiko pengguna sendiri dan bahwa pengguna sendiri bertanggung jawab penuh atas materi pengguna,dan/atau atas kerusakan/kehilangan atas sistem elektronik anda dan/atau atas kerusakan/kehilangan atas informasi elektronik yang mungkin saja diakibatkan oleh pelaksanaan kegiatan tersebut.</p>
								<p>Pengguna secara khusus mengakui bahwa Baboo tidak akan bertanggung jawab atas Materi atau tindakan pencemaran nama baik, tindakan yang melanggar, atau tindakan yang melawan hukumapapun dari pihak ketiga manapun yang berhubungan dengan Baboo dan Layanan ini. Segala resiko atas kerugian atau kerusakan dari hal-hal tersebut adalah seluruhnya tanggung jawab pengguna.</p>
								<p>Pengguna setuju untuk melepaskan, membela dan membebaskan Baboo, perusahaan terafiliasinya dan para direkturnya, komisarisnya, pejabatnya, karyawannya dan agennya dari dan terhadap suatu dan semua tuntutan, kewajiban, kerugian dan biaya (termasuk biaya hukum, penggantian kerusakan dan jumlah penyelesaian yang wajar) yang timbul dari atau berkaitan dengan atau yang mungkin timbul dari penggunaan dan/atau pengaksesan Layanan; pelanggaran atas suatu syarat yang termasuk namun tidak terbatas pada Syarat &amp; Ketentuan Umum ini, Kebijakan Privasi dan Larangan Iklan oleh pengguna; pelanggaran terhadap suatu hak pihak ketiga manapun, termasuk namun tidak terbatas pada hak atas kekayaan intelektual, aset baik yang berupa harta bergerak ataupun harta tidak bergerak, hak privasi; dan/atau tuntutan apapun sehubungan dengan Materi pengguna yang menyebabkan kerugian terhadap pihak ketiga. Dalam hal ini Baboo juga dapat turut serta dalam suatu pembelaan bersama dengan penasihat hukum pilihannya.</p>
								<p class="subtitle">G. Keterangan Isi/Materi Layanan</p>
								<p>Materi yang ditayangkan di Layanan disediakan tanpa ketentuan atau jaminan apapun dalam hal isi, materi dan ketepatannya. Sejauh diijinkan oleh hukum yang berlaku di Republik Indonesia, Baboo dengan ini secara tegas mengecualikan:</p>
								<p>Semua ketentuan, jaminan dan syarat lain yang dapat dinyatakan secara langsung maupun tidak langsung oleh undang-undang sebagai isi, materi dan ketepatannya; dan</p>
								<p>Kewajiban atas kehilangan atau kerugian langsung, tidak langsung atau yang merupakan akibat yang ditanggung oleh pengguna dalam hubungannya dengan Layanan atau dalam hubungannya dengan penggunaan, ketidakmampuan menggunakan, atau akibat dari penggunaan Layanan, setiap situs web yang terkait dengannya dan setiap materi yang ditempatkan padanya.</p>
								<p>Materi yang ditayangkan di Layanan adalah semata-mata untuk informasi guna membangun hubungan antara Pengunggah dengan pengguna Layanan lainnya serta membantu pengguna Layanan untuk memutuskan mengajukan penawaran atau tidak mengajukan penawaran untuk barang atau jasa yang ditawarkan oleh Pengunggah di Layanan.</p>
								<p>Apabila sebagai pengguna anda menggunakan informasi yang ada pada Layanan untuk kepentingan selain daripada yang dinyatakan pada paragraf di atas, maka kami dapat membatasi akses anda terhadap Layanan serta mengambil langkah hukum yang diperlukan atas tindakan anda.</p>
								<p class="subtitle">H. Pelaksanaan Aktivitas</p>
								<p>Pelaksanaan aktivitas akses ke Layanan tersedia untuk umum, walaupun begitu untuk memasang iklan anda diwajibkan untuk menjadi pengguna terdaftar, untuk setiap pengguna terdaftar hanya dapat mendaftarkan 1 (satu) nomor telepon dan nomor telepon tersebut harus sama dengan nomor telepon pada profile Anda.</p>
								<p>Baboo berhak menarik dan/atau mengubah Layanan yang disediakan tanpa pemberitahuan terlebih dahulu. Dari waktu ke waktu, Baboo dapat membatasi akses ke beberapa bagian dari situs dan/atau keseluruhan dari Layanan kepada pengguna.</p>
								<p>Apabila pengguna memilih atau diberi password (kode identifikasi pengguna) atau bagian informasi lainnya sebagai bagian dari prosedur keamanan Layanan, maka pengguna wajib menjaga kerahasiaan informasi tersebut dan tidak diperbolehkan mengungkapkannya kepada pihak ketiga.</p>
								<p>Baboo berhak mematikan fungsi password (kode identifikasi pengguna), terlepas apakah dipilih oleh pengguna atau ditentukan oleh Baboo dalam keadaan apapun dan dalam waktu kapanpun.</p>
								<p>Sebagai pengguna terdaftar, anda dapat kami berikan suatu tanda khusus termasuk namun tidak terbatas pada tujuan memvalidasi kebenaran informasi yang anda berikan kepada kami. Validasi ini bersifat gratis, tidak wajib dan tidak dikenakan biaya apapun akan tetapi anda diharapkan untuk berpartisipasi dalam kegiatan ini. Setelah kami memvalidasi kebenaran informasi yang anda berikan, kami akan memberikan tanda khusus di akun anda yang berlaku selama kami pandang patut, oleh karena itu kami harap anda secara berkala dapat melakukan validasi ulang pada saat sistem kami memintanya. Berkenaan dengan tanda khusus tersebut kami juga dapat mengubah, menghapus, ataupun menambahkan tanda khusus tersebut. Tentunya apabila anda melakukan pelanggaran pada sebagaian atau seluruh ketentuan yang anda di Baboo tanda tersebut dapat kami hilangkan dari akun anda.</p>
								<p>Pemberian tanda khusus terhadap pengguna maupun iklan yang dipasang oleh pengguna bukan merupakan bentuk dukungan, rekomendasi maupun pendapat dari Baboo terhadap pengguna, barang/jasa yang diitawarkan, serta bagaimana pengguna mengekspresikan barang/jasa yang mereka tawarkan.</p>
								<p>Jam operasional Baboo adalah dari hari Senin hingga Jumat dari pukul 09:00 WIB hingga 17:00 WIB. Seluruh order dan pertanyaan yang masuk selama hari Sabtu, Minggu, serta libur hari besar akan diproses pada hari dan jam kerja terdekat berikutnya.</p>
								<p class="subtitle">I. Perubahan Layanan</p>
								<p>Baboo berhak memperbarui dan/atau mengubah tampilan dan/atau Layanan dan/atau isi Layanan secara rutin dan setiap saat, demi memberi pelayanan yang lebih baik kepada setiap penggunanya.</p>
								<p>Apabila dibutuhkan, Baboo dapat menangguhkan akses ke Layanan, atau menutupnya untuk sementara waktu untuk jangka waktu yang tidak tertentu.</p>
								<p>Berkenaan dengan informasi mengenai pengguna dan kunjungan pengguna ke Layanan, Baboo berhak mengolah informasi mengenai pengguna sesuai dengan kebijakan yang tercantum di dalam Kebijakan Privasi. Dengan menggunakan Layanan, pengguna setuju atas pemrosesan tersebut dan menjamin semua data yang diberikan adalah benar.</p>
								<p class="subtitle">J. Mengunggah Materi ke Layanan</p>
								<p>Anda mengakui dan setuju bahwa anda bertanggung jawab atas Materi yang anda pasang, transmisikan melalui maupun tautkan kepada Layanan dan setiap konsekuensi yang timbul dari tindakan tersebut.&nbsp;&nbsp; Secara khusus anda bertanggung jawab atas setiap Materi yang anda unggah seperi email atau yang anda sediakan melalui Layanan atau Situs.&nbsp; Sehubungan dengan Materi yang dipasang, ditransmisikan melalui maupun tautkan kepada Layanan oleh anda, anda menyatakan secara tegas bahwa: (i) anda mempunyai dan akan tetap mempunyai hak atas Materi tersebut selama Materi tersebut masih tersedia di Layanan atau Situs; anda mempunyai ijin, hak dan persetujuan untuk menggunakan Materi tersebut dan memberikan kewenangan kepada Baboo untuk menggunakan Materi tersebut di dalam Layanan atau Situs atau untuk kepentingan promosi Baboo atau untuk kepentingan lainnya sepanjang tidak bertentangan dengan Undang-Undang dan Syarat dan Ketentuan Umum ini; dan (ii) anda mempunyai persetujuan tertulis, pelepasan dan/atau ijin dari setiap dan seluruh individu yang dapat diidentifikasi maupun usaha yang terdapat di dalam Materi untuk menggunakan nama atau kemiripan dari setiap dan seluruh individu dan usaha tersebut di dalam Layanan atau Situs sesuai dengan Syarat dan Ketentuan Umum ini. anda tetap memiliki hak milik atas setiap Materi; namun dengan memasukkan Materi ke dalam Layanan, anda memberikan hak yang tidak dapat dibatalkan, tidak dapat dicabut kembali, berlaku terus menerus, di seluruh dunia, tidak ekslusif, bebas royalty dan dapat disublisensikan, dapat dipindahkan, untuk menggunakan, mereproduksi, mendistribusikan, membuat pekerjaan derivatif, memasang dan menampilkan Materi sehubungan dengan Layanan dan usaha Baboo, termasuk namun tidak terbatas pada tujuan promosi dan redistribusi sebagian maupun seluruh dari Layanan dan Materi yang terdapat di dalamnya.&nbsp; Hak-hak ini diperlukan oleh Baboo untuk dapat menyediakan Layanan dan memasang Materi anda.&nbsp;&nbsp; Selanjutnya, dengan memasang Materi ke dalam area publik di dalam Layanan, anda setuju untuk dan dengan ini memberikan kepada Baboo seluruh hak yang diperlukan untuk melarang atau memperbolehkan pengumpulan, pemasangan, penyalinan, duplikasi, reproduksi atau eksploitasi Materi di dalam Layanan oleh pihak manapun untuk tujuan apapun.&nbsp; Anda juga dengan ini memberikan kepada setiap pengguna Layanan dan Situs sebuah hak non-ekslusif untuk mengakses Materi anda melalui Layanan atau Situs.&nbsp; Hak ini akan tetap berlaku dan dengan segera berakhir pada saat anda atau Baboo menghapus atau menarik Materi dari Situs.</p>
								<p>Baboo dapat memberlakukan batasan-batasan terhadap sebagian atau seluruh aktivitas anda atau mengenakan biaya terhadap iklan yang dipasang oleh pengguna di dalam bagian-bagian tertentu dari Layanan</p>
								<p>Baboo berhak untuk menghapus setiap isi, materi atau bagian lain dari iklan, baik sebagian maupun keseluruhan, yang dipasang pengguna di Layanan atau Situs tanpa pemberitahuan terlebih dahulu kepada pengguna. Hal ini termasuk tapi tidak terbatas apabila iklan tersebut mengandung isi, materi atau bagian yang bersifat sensitif, ofensif, dapat memicu kebencian, mencemarkan nama baik, memuat materi yang memicu perpecahan suku, agama, ras, antar golongan, pornografi, perjudian, ataupun bertentangan dengan norma etika kesusilaan dan hukum yang berlaku di Republik Indonesia serta tidak sesuai dengan aturan yang berlaku di Layanan.</p>
								<p class="subtitle">K.Tautan (hyperlink) dari Layanan</p>
								<p>Layanan dapat mengandung tautan (hyperlink) ke situs dan/atau sumber daya lain yang disediakan oleh pihak ketiga, dimana Baboo menegaskan bahwa tautan (hyperlink) tersebut disediakan hanya sebagai informasi bagi pengguna. Baboo melepaskan diri dari kewajiban untuk mengontrol isi dari situs dan/atau sumber daya yang terjadi karena tautan (hyperlink) yang ada di Layanan.</p>
								<p>Baboo tidak bertanggung jawab atas kehilangan dan/atau kerugian yang dapat timbul akibat penggunaan Layanan.</p>
								<p class="subtitle">L. Hubungan dengan Pihak Ketiga</p>
								<p>Anda mengakui dan setuju bahwa Baboo tidak akan bertanggung jawab atas interaksi anda dengan pihak ketiga di dalam Situs maupun melalui Layanan. Hal ini termasuk, namun tidak terbatas pada, pembayaran dan pengiriman barang dan jasa, serta syarat, kondisi, jaminan atau pernyataan lain yang terkait dengan interaksi antara anda dengan pihak ketiga.&nbsp; Hubungan ini adalah antara anda dengan pihak ketiga tersebut. Anda mengakui dan setuju bahwa Baboo tidak akan bertanggung jawab atas setiap kerugian atau kerusakan yang timbul dari hubungan atau interaksi tersebut. Dalam hal terjadi perselisihan antara pengguna dengan pihak ketiga, anda mengerti dan setuju bahwa Baboo tidak bertanggung jawab untuk melibatkan diri dalam perselisihan tersebut dan anda dengan ini membebaskan Baboo, karyawannya, petugasnya dan agennya dari setiap tuntutan dan kerugian yang timbul dalam bentuk apapun sehubungan dengan Layanan kami.</p>
								<p class="subtitle">M. Yurisdiksi dan Hukum yang Berlaku</p>
								<p>Syarat &amp; Ketentuan Umum ini, Kebijakan Privasi dan Larangan Iklan serta hubungan pengguna dengan Baboo tunduk, diatur dan patuh menurut hukum Republik Indonesia, dan pengguna sepakat untuk terikat pada yurisdiksi hukum Republik Indonesia.</p>
								<p>Apabila terjadi perselisihan dalam penafsiran dan pelaksanaan Syarat &amp; Ketentuan Umum ini,Kebijakan Privasi dan Larangan Iklan, para pihak sepakat untuk menyelesaikannya secara musyawarah untuk mufakat.</p>
								<p class="subtitle">N. Perubahan-Perubahan</p>
								<p>Pengguna diharapkan untuk memeriksa halaman ini dari waktu ke waktu untuk memperhatikan setiap perubahan, karena hal tersebut mengikat pengguna.</p>
								<p>Sebagian dari ketentuan yang terdapat dalam Syarat &amp; Ketentuan Umum ini dapat digantikan oleh ketentuan-ketentuan atau pemberitahuan lain yang dipublikasi di bagian lain Layanan.</p>
								<p class="subtitle">O. Lain-Lain</p>
								<p>Dengan menjadi pengguna Layanan, anda dapat memilih apakah anda berkeinginan untuk menerima informasi-informasi terkait Layanan, penggunaanya, serta hal-hal lain sehubungan dengan penggunaan akun anda, adapun informasi-informasi tersebut akan kami kirimkan atas dasar itikad baik melalui notifikasi baik berupa email ataupun notifikasi aplikasi ataupun bentuk-bentuk lain. Jika anda memilih untuk tidak menerima informasi, anda dapat memberitahu kami dengan menghubungi customer service kami.</p>
								<p>Apabila pengguna memiliki hal lain yang ingin disampaikan atau komentar maupun keprihatinan mengenai materi yang tampak di Situs dan Layanan silakan hubungi customer service kami</p>
								<p class="subtitle">Terima kasih atas kunjungan anda ke Situs dan Layanan kami. </p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn-acc-tnc">Setuju</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END Modal Login -->
	<!-- Footer -->
	<footer style="bottom: 0;padding: 0;margin: 0;"> 
		<div class="container">
			<ul style="position: absolute; left:20px;">
				<li class="footer-link"><a href="<?php echo site_url(); ?>login" class="footer-link">Masuk</a></li>
				<li class="footer-link m-l-20"><a data-toggle="modal" data-target="#register-modal" href="#" class="footer-link">Daftar</a></li>
				<li class="footer-link m-l-20"><a href="https://www.baboo.id/about.html" target="_blank" class="footer-link">Tentang Baboo</a></li>
				<li class="footer-link m-l-20"><a href="#" class="footer-link">Terms of Use</a></li>
				<li class="footer-link m-l-20"><a href="https://www.baboo.id/kebijakan.html" target="_blank" class="footer-link">Privacy &amp; Policy</a></li>
				<li class="footer-link m-l-20"><a href="#" class="footer-link">Baboo Carrier</a></li>
			</ul>
		</div>
	</footer>
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
	<script src="<?php echo base_url();?>public/js/sweetalert2.all.min.js"></script>

	<script src="<?php echo base_url('') ?>public/js/jquery.bxslider.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('') ?>public/js/baboo.js" type="text/javascript"></script>
	<script src="<?php echo base_url('') ?>public/js/jquery.sticky-kit.min.js" type="text/javascript"></script>


	<script type="text/javascript">
		var base_url = "<?php echo base_url() ?>";
		$(function() {
			$('#date').combodate('method');
			firstItem: 'name'
		});
		$(document).ready(function() {
			var getHashDaft = window.location.hash;
			if (getHashDaft != "" && getHashDaft == "#btndaftar") {
				$('#register-modal').modal('toggle');
			}
			if (getHashDaft != "" && getHashDaft == "#event") {
				$('#event-modal').modal({backdrop: 'static', keyboard: false});
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
			$("#login-formevent").validate({
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
			$("#login_fb_event").on("click", function() {
				window.location.href = '<?php echo base_url('facebook_event'); ?>';
			});
			$("#login_google_event").on("click", function() {
				window.location.href = '<?php echo base_url('google_event'); ?>';
			// console.log("a");
		});
		});
	</script>
	<?php echo $this->session->flashdata('login_alert');?>

</body>
</html>
<?php 
if ($this->agent->mobile()) {
	$this->load->view('navbar/R_navbar');
}else{
	$this->load->view('navbar/D_navbar');
}
?>
<div class="container mb-30">
	<div class="row">
		<div class="col-md-2 hidden-sm-down"></div>
		<div class="col-md-8 col-sm-12 mt-100 p-0 toppane">
			<div>
				<img src="<?php echo $event['event_banner']; ?>" class="img-fluid" alt="Event Banner">
				<div class="ikutPosi">
					<a href="<?php echo ($this->session->userdata('userData') ? base_url().'follow_event' : base_url().'login#event') ?>" class="btnIkut">Ikut Lomba</a>
				</div>
				<!-- <div class="howPosi">
					<a href="#" class="btnTop btnRegis">Daftar / Masuk</a>
					<a href="#" class="btnTop btnHowto">Cara Mengikuti</a>
					<a href="#" class="btnTop btnTnc">Syarat &amp; Ketentuan</a>
				</div> -->
			</div>
		</div>
		<div class="col-md-2 hidden-sm-down"></div>
	</div>
	
	<!-- <div class="row">
		<div class="col-md-2 hidden-sm-down"></div>
		<div class="col-md-8 col-sm-12">
			<p class="title_ mt-40">Peserta Lomba</p>
			<div class="card mt-10">
				<div class="card-body">
					<div class="row participant_event">

					</div>
				</div>
			</div>
			<p class="mt-15">
				<a href="#" class="seePeserta">Lihat semua</a>
			</p>
		</div>
		<div class="col-md-2 hidden-sm-down"></div>
	</div>

	<div class="row">
		<div class="col-md-2 hidden-sm-down"></div>
		<div class="col-md-8 col-sm-12">
			<p class="title_ mt-40">Pemenang Event</p>
			<div class="row">
				<div class="col-6">
					<div class="card mt-10">
						<div class="card-body">
							<div class="thumbnail">
								<div>
									<img alt="100%x200" class="rounded-circle img-fluid img-pesertacir" src="<?php echo base_url('public/img/profile/blank-photo.jpg') ?>">
								</div>
								<div class="caption"> 
									<h5 align="center">
										<b>Sweeta Kartika</b>
									</h5> 
									<h4 align="center">Pemenang #1</h4>
									<p></p> <p></p>
								</div> 
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2 hidden-sm-down"></div>
	</div> -->
</div>
<?php if ($this->session->userdata('isLogin')): ?>
	<script type="text/javascript">
		var event = 'bestBookEvent';
		var follow_event = true;
	</script>
<?php else: ?>
	<script type="text/javascript">
		var event = 'bestBookHome';
		var follow_event = false;
	</script>
<?php endif ?>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>

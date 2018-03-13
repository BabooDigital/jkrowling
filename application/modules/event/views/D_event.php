<?php 
if ($this->agent->mobile()) {
	$this->load->view('navbar/R_navbar');
}else{
	$this->load->view('navbar/D_navbar');
}
?>	
<style type="text/css">
img {
	display: block;
	margin: 0 auto;
}
</style>
<div class="container babooidin">
	<div class="row">
		<div class="col-12 content-white text-center p-50">
			<div class="row">
				<div class="col-1">
					
				</div>
				<div class="col-12">
					<div class="media">
						<img src="<?php echo $event['data']['image']; ?>" class="img-fluid">
					</div>
					<br>
					<div class="float-left"><b>Peserta Lomba</b></div>
					<div class="follow-right">
						<a class="btn-follow" href="<?php echo ($this->session->userdata('userData') ? base_url().'timeline' : base_url().'login#event') ?>" id="btndaftar"><span class="navdaftar">Ikuti Event</span></a>
					</div>
					<br><br>
					<div align="left">
						<div class="row participant_event">
							
						</div>
						<br>
						<a class="btn-follow" href=""><span class="navdaftar">Lihat Semua</span></a>
					</div>
					<br><br><br>
					<div class="float-left"><b>Pemenang Event</b></div>
					<br><br>
					<div align="left">
						<div class="row best_book_event">
							<div class="col-sm-6 col-md-4"> 
								<div class="thumbnail"> 
									<img alt="100%x200" class="rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg') ?>" style="height: 200px; width: 100%; display: block;border-radius:10px;box-shadow: 0px 2px 3px #818181;"> 
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
				<div class="col-1">
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php if ($this->session->userdata('isLogin')): ?>
	<script type="text/javascript">
		var event = 'bestBookEvent';
	</script>
<?php else: ?>
	<script type="text/javascript">
		var event = 'bestBookHome';
	</script>
<?php endif ?>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>

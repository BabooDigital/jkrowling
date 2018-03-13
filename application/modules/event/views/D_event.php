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
				<div class="col-2">
					
				</div>
				<div class="col-8">
					<div class="media">
						<img src="<?php echo base_url('public/img/event/event1.png'); ?>" class="img-fluid">
					</div>
					<br>
					<div class="follow-right">
						<a class="btn-follow" href="<?php echo ($this->session->userdata('userData') ? base_url().'timeline' : base_url().'login#event') ?>" id="btndaftar"><span class="navdaftar">Ikuti Event</span></a>
					</div>
					<br><br>
					<div align="left">
						<div class="row best_book_event">
							
						</div>
					</div>
				</div>
				<div class="col-2">
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>

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
		<?php  if (empty($this->session->userdata('userData'))) { ?>
		<div class="col-md-8 col-sm-12 mt-70 p-0">
		<?php }else { ?>
		<div class="col-md-8 col-sm-12 mt-130 p-0">
		<?php  } ?>
			<div>
				<img src="<?php echo $event['event_banner']; ?>" class="img-fluid" alt="Event Banner">
				<div class="ikutPosi">
					<a href="<?php echo ($this->session->userdata('userData') ? base_url().'follow_event' : base_url().'login#event') ?>" class="btnIkut follow_event">Ikut Lomba</a>
				</div>
			</div>
		</div>
		<div class="col-md-2 hidden-sm-down"></div>
	</div>
</div>
<div class="modal fade" id="follow-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="width: 100% !important;height: 700px;">
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
							<div class="row">
								<div class="col-lg-12" style="margin-top:55.1px;">
									<p class="text-img-modal"><h3><b>Formulir Lomba</b></h3></p>
									<br>
								</div>
								
								<div class="col-lg-12">
									<form id="follow-formevent">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control login-input" id="yourEmailRe" name="email" placeholder="Alamat Email" value="<?php echo $this->session->userdata('userData')['email']; ?>" disabled>
										</div>

										<div class="form-group">
											<label>No. HP</label>
											<input type="number" class="required nohp error form-control login-input" id="nohp" name="nohp" placeholder="No. HP">
										</div>
										<div class="form-group">
											<input type="checkbox" name="accept_event">&nbsp;&nbsp;&nbsp;<span class="text-left text-daftar">Saya sudah membaca dan menyetujui seluruh persyaratan lomba</span>
										</div>
										<div class="form-group">
											<div class="pull-left">
												<button type="submit" name="submit" class="btn btn-primary pull-right btn-login ikuti-lomba"><i class="icon-arrow-right"></i>Ikuti Event</button>
											</div>	
										</div>
										</form>
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
	<script type="text/javascript">
		var getHashDaft = window.location.hash;
		if (getHashDaft != "" && getHashDaft == "#follow_event") {
			$('#follow-modal').modal({backdrop: 'static', keyboard: false});
		}
	</script>

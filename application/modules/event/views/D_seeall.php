<?php 
if ($this->agent->mobile()) {
	$this->load->view('navbar/R_navbar');
}else{
	$this->load->view('navbar/D_navbar');
}
?>

<div class="container mb-30">
	<div class="row">
		<div class="col-2 hidden-sm-down"></div>
		<?php  if (empty($this->session->userdata('userData'))) { ?>
		<div class="col-12 col-sm-12 mt-70 p-0" style="background: white;">
			<?php }else { ?>
			<div class="col-12 col-sm-12 mt-130 p-0" style="background: white;">
				<?php  } ?>
				<div>
					<div class="ikutPosi">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-2 hidden-sm-down"></div>
					<div class="col-8 col-sm-12">
						<span class="title_ mt-40">Peserta Lomba</span>
						<div class="pull-right">
							<div class="dropdown">
								<button class="share-btn dropbtn fs-14px" type="button" id="dropShare" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Posisi tertinggi
								</button>
								<div class="dropdown-menu" aria-labelledby="dropShare">
									
								</div>
							</div>
						</div>
						<div class="card mt-10" style="width: 100%;background: red;">
							<div class="card-body">
								<div class="row">
										<?php $this->load->view('data/D_seeall'); ?>
								</div>
								<!-- <div class="row participant_event_all"> -->
								<!-- </div> -->
							</div>
						</div>
						<p class="mt-15">
						</p>
					</div>
					<div class="col-2 hidden-sm-down"></div>
				</div>
				<div class="row">
					<div class="col-2 hidden-sm-down"></div>
					<div class="col-8 col-sm-12">
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
					<div class="col-2 hidden-sm-down"></div>
				</div>
			</div>
			<div class="col-2 hidden-sm-down"></div>
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
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
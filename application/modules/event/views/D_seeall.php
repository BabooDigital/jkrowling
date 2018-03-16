<?php 
if ($this->agent->mobile()) {
	$this->load->view('navbar/R_navbar');
}else{
	$this->load->view('navbar/D_navbar');
}
?>

<div class="container mt-100">
	<div class="row">
		<div class="col-12">
			<p class="title_">Peserta Lomba</p>
		</div>
	</div>
	<div class="row">
		<div class="col-6 mb-20">
			<div class="card">
				<div class="card-body">
					<div class="media">
						<img class="align-self-start mr-3" src="http://placehold.it/300x300" width="150" height="210" alt="Generic placeholder image">
						<div class="media-body">
							<h5 class="mt-0" style="color: #7661ca;">Top #1</h5>
							<h3 class="mt-0">The Kite Runner - Powerfull Hunting</h3>
							<span class="mr-10" style="font-size: 12px;">Fiksi &#8226;</span>
							<span class="text-muted" style="font-size: 11px;">Dibaca 123 kali</span>
							<div class="media mt-20">
								<img class="d-flex align-self-start mr-10 rounded-circle" src="http://placehold.it/300x300" width="50" height="50">
								<div class="media-body mt-5">
									<h5 class="card-title nametitle2"><a href="#" class="author_name menu-page" id="tab-page">Aditia</a></h5>
									<p class="text-muted" style="margin-top:-10px;"><small>
										<span>10 Januari 2018</span></small></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-10">
							<div class="col-12 text-muted" style="font-size: 13px;">
								<div class="pull-right"><span><b class="share_countys">123</b> Bagikan</span></div>
								<div><span class="mr-30"><b class="like_countys">123</b> Suka</span><span><b class="txtlike">123</b> Komentar</span></div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="pull-right">
							<a href="javascript:void(0);" data-share="123" class="fs-14px share-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" class="mr-10" width="23"> </a>
						</div>
						<div class="pull-left" style="display: flex;">
							<a data-id="12" href="javascript:void(0);" id="loveboo12" class="mr-30 fs-14px like"><img src="<?php echo base_url('public/img/assets/icon_love.svg'); ?>" class="mr-10 loveicon" width="27"></a>
						<a href="#" id="commentboo" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- <div class="container mb-30">
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
							</div>
						</div>
						<p class="mt-15">
						</p>
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
				</div>
			</div>
		</div>
	</div>
</div> -->
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
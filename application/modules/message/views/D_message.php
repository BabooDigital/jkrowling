<?php $this->load->view('navbar/D_navbar'); ?>
<div class="container babooidin">	
	<div class="row">
		<!-- Left Side -->
		<div class="col-md-4">
			<div class="">
				<div class="card mb-15">
					<div class="text-left pr-20 pl-20">
						<div class="col-md-12" style="padding: 10px;">
							Pesan Masuk
							<button type="submit" class="create-msg" style="cursor: pointer;height: 33px;"><span><i class="fa fa-pencil-square-o"></i> Pesan Baru</span></button>
							<hr>
							<form class="form-inline">
								<input aria-label="Search" class="search-msg form-control" placeholder="Cari Pesan" type="search">
							</form>
							<hr>
						</div>
					</div>
					<div class="list-group">
						<a class="list-group-item list-group-item-action flex-column align-items-start btn_notif_follow" id="btn_notif_follow"> 
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> 
									<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="48" alt="Generic placeholder image"> 	
									<div class="media-body mt-5"> <span class="nametitle2">Rizaldi</span> <br> <span class="text-muted fontkecil">Oi bang...</span><span class="button_follow"><p class="text-muted fontkecil">1 hours ago</p></small></p> 
									</div>
								</div>
							</div> 
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> 
								<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="48" alt="Generic placeholder image"> 	
								<div class="media-body mt-5"> <span class="nametitle2">Cewe Gw</span> <br> <span class="text-muted fontkecil">Oi bre...</span><span class="button_follow"><p class="text-muted fontkecil">1 hours ago</p></small></p> 
								</div>
							</div>
						</div>
						</a>
						<a class="list-group-item list-group-item-action flex-column align-items-start btn_notif_follow" id="btn_notif_follow"> 
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> 
									<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="48" alt="Generic placeholder image"> 	
									<div class="media-body mt-5"> <span class="nametitle2">Rizaldi</span> <br> <span class="text-muted fontkecil">Oi bang...</span><span class="button_follow"><p class="text-muted fontkecil">1 hours ago</p></small></p> 
									</div>
								</div>
							</div> 
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> 
								<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="48" alt="Generic placeholder image"> 	
								<div class="media-body mt-5"> <span class="nametitle2">Cewe Gw</span> <br> <span class="text-muted fontkecil">Oi bre...</span><span class="button_follow"><p class="text-muted fontkecil">1 hours ago</p></small></p> 
								</div>
							</div>
						</div>
						</a>
						<a class="list-group-item list-group-item-action flex-column align-items-start btn_notif_follow" id="btn_notif_follow"> 
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> 
									<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="48" alt="Generic placeholder image"> 	
									<div class="media-body mt-5"> <span class="nametitle2">Rizaldi</span> <br> <span class="text-muted fontkecil">Oi bang...</span><span class="button_follow"><p class="text-muted fontkecil">1 hours ago</p></small></p> 
									</div>
								</div>
							</div> 
						</a>
						<a href="#" class="list-group-item list-group-item-action">
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;"> <div class="media" style="width: 100%;"> 
								<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>" width="48" alt="Generic placeholder image"> 	
								<div class="media-body mt-5"> <span class="nametitle2">Cewe Gw</span> <br> <span class="text-muted fontkecil">Oi bre...</span><span class="button_follow"><p class="text-muted fontkecil">1 hours ago</p></small></p> 
								</div>
							</div>
						</div>
						</a>
				</div>
			</div><!-- Trending -->
		</div>
	</div>
	<div class="col-md-8 tmlin">
		<div class="">
			<!-- Buku Populer -->
			<div class="card mb-15">
				<div class="card-header">
					Rizaldi
				</div>
				<div class="card-body p-0 rowchat">
					<ul class="list-group list-group-flush" id="latestreadbook">

					</ul>
					<br>
					<div class="text-left p-10 chatleft">
						<p class="txtchatleft">Tetx</p>
					</div>
					<div class="text-right p-10 chatright">
						<p class="txtchatright">text right</p>
					</div>
					<div class="text-left p-10 chatleft">
						<p class="txtchatleft">Tetx</p>
					</div>
					<div class="text-right p-10 chatright">
						<p class="txtchatright">text right</p>
					</div>
					<div class="text-left p-10 chatleft">
						<p class="txtchatleft">Tetx</p>
					</div>
					<div class="text-right p-10 chatright">
						<p class="txtchatright">text right</p>
					</div>
					<div class="text-right p-10 chatright">
						<p class="txtchatright">text right</p>
					</div>
					<div class="text-right p-10 chatright">
						<p class="txtchatright">text right</p>
					</div>
					<div class="text-right p-10 chatright">
						<p class="txtchatright">text right</p>
					</div>
					
				</div>
				<div class="card-header">
					<input type="text" name="input_msg" class="form-msg" placeholder="Tulis pesan disini">
					<button type="submit" name="submit" value="submit" class="submit-msg">
						
					</button>
				</div>
			</div><!-- Buku Populer -->
		</div>
	</div>
</div>
</div>
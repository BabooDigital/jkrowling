	<?php $this->load->view('navbar/D_navbar'); ?>	
<style type="text/css">
	button {
		cursor: pointer;
	}
	.nav-tabs {
		border: none;
	}
	.arrowdraft {
		padding: 10px;
		border: 2px #da0707 solid;
	}
	.nav-pills .nav-link.active, .show>.nav-pills .nav-link {
		background-color: #7554bd !important;
		border-radius: 40px;
		padding: 5px 40px !important;
	}
	.btn-edprof {
		background: none;
	    width: 45%;
	    border-radius: 40px;
	    border: solid 1px #797979;
	}
</style>
<div class="container babooidin">	
	<div class="row">
		<!-- Left Side -->
		<div class="col-md-3">
			<div class="">
				<div class="card mb-15">
					<div class="text-center pr-10 pl-10 pt-20">
						<div class="card-body p-0">
							<input type="hidden" id="iaiduui" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
							<img alt="<?php echo $userdata['name']; ?>" class="rounded-circle p-5" height="100" src="<?php if($userdata['prof_pict'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $userdata['prof_pict']; } ?>" style="border: .5px #7554bd solid;" width="100">
							<p class="mt-10"><b><?php echo $userdata['name']; ?></b></p>
							<p>Jakarta, Indonesia</p>
							<div class="quote">
								<p>Kita memang gila, tak pernah berfikir. Bila dirasakan, pasti banyak kurang.</p>
								<p>( <?php echo $userdata['email']; ?> )</p>
							</div>
							<div class="mb-20">
								<button class="btn-edprof p-5 fs-12px mr-10">Edit Profile</button> <button class="btn-edprof p-5 fs-12px">Pesan Masuk</button>
							</div>
							<hr>
							<div>
								<button class="btn-details-balance">Topup</button> <span class="label_balance"><b>Balance</b></span><br>
								<br>
								<p class="profile_nominal"><b>Rp <?php echo $userdata['balance']; ?></b></p>
							</div><br>
							<br>
							<hr>
							<!-- <div class="penghargaan">
                                        <label><b>Penghargaan</b></label>
                                    </div> -->
							<div class="penghargaan">
								<label><b>Statistik</b></label>
							</div>
							<div class="dbooksociallist">
								<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_books.svg" width="27">
								<p class="mt-5"><?php echo $userdata['book_made']; ?></p></a>
							</div>
							<div class="dbooksociallist">
								<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_follower.svg" width="27">
								<p class="mt-5"><?php echo $userdata['followers']; ?></p></a>
							</div>
							<div class="dbooksociallist">
								<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_liker.svg" width="27">
								<p class="mt-5"><?php echo $userdata['ppl_like']; ?></p></a>
							</div>
							<div class="dbooksociallist">
								<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_soldbook.svg" width="27">
								<p class="mt-5"><?php echo $userdata['book_sold']; ?></p></a>
							</div><br>
							<div class="mt-100 mb-20" style="background: #fcfbff;padding: 15px;">
								<p><small>Buku Terjual</small></p>
								<p style="font-size: 25px;color: #7a5abf;font-weight: 700;">Rp. 25.500.000</p>
							</div>
						</div>
					</div>
				</div><!-- Trending -->
			</div>
		</div><!-- Mid Side -->
		<div class="col-md-6" id="post-data">
			<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			  <li class="nav-item mr-50">
			    <a class="nav-link mt-5 active" id="pills-publish-tab" data-toggle="pill" href="#pills-publish" role="tab" aria-controls="pills-publish" aria-selected="true">Publish</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link mt-5" id="pills-draft-tab" data-toggle="pill" href="#pills-draft" role="tab" aria-controls="pills-draft" aria-selected="false">Draft</a>
			  </li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-publish" role="tabpanel" aria-labelledby="pills-publish-tab">
					<div id="publishdata">
						
					</div>
				</div>
				<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
			<div class="tab-pane fade" id="pills-draft" role="tabpanel" aria-labelledby="pills-draft-tab">
				<div id="draftdata">
					
				</div>
			</div>
			</div>
		</div><!-- Right Side -->
		<div class="col-md-3 tmlin">
			<div class="">
				<!-- Buku Populer -->
				<div class="card mb-15">
					<div class="card-header">
						Terakhir Dibaca
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush" id="latestreadbook">
							
						</ul>
						<div class="text-center p-20">
							<a href="#" style="border-radius: 4px;border: 1px #dedede solid;display:  block;" class="p-10">Lihat Semua</a>
						</div>
					</div>
				</div><!-- Buku Populer -->
			</div>
		</div>
	</div>
</div>
<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<title><?php echo $judul; ?></title>
	<?php if (isset($css)): ?><?php echo get_css($css) ?><?php endif ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1 p-0 w-100" style="height: auto;background-color: #5a5a5a;">
				<div class="text-center stickymenu">
					<div aria-orientation="vertical" class="nav flex-column nav-pills creatcovermenu" id="v-pills-tab" role="tablist">
						<a aria-controls="v-pills-home" aria-selected="true" class="nav-link bor-rad0 active" data-toggle="pill" href="#v-pills-home" id="v-pills-home-tab" role="tab"><img src="<?php echo base_url(); ?>public/img/assets/tt.svg"></a> <a aria-controls="v-pills-profile" aria-selected="false" class="nav-link bor-rad0" data-toggle="pill" href="#v-pills-profile" id="v-pills-profile-tab" role="tab"><img src="<?php echo base_url(); ?>public/img/assets/font-fam.svg"></a> <a aria-controls="v-pills-messages" aria-selected="false" class="nav-link bor-rad0" data-toggle="pill" href="#v-pills-messages" id="v-pills-messages-tab" role="tab"><img src="<?php echo base_url(); ?>public/img/assets/alignment.svg"></a> <a aria-controls="v-pills-settings" aria-selected="false" class="nav-link bor-rad0" data-toggle="pill" href="#v-pills-settings" id="v-pills-settings-tab" role="tab"><img src="<?php echo base_url(); ?>public/img/assets/bc.svg"></a>
					</div>
				</div>
			</div><input name="iaiduui" type="hidden" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
			<div class="col-md-3 w-100" style="height: auto;background-color: #4d4c4c;">
				<div class="stickymenu">
					<div class="tab-content" id="v-pills-tabContent">
						<div aria-labelledby="v-pills-home-tab" class="tab-pane fade show active" id="v-pills-home" role="tabpanel">
							<div class="row">
								<div class="col-md-12">
									<div class="mt-30 judulbookcover">
										<input class="w-100" id="cover_title" name="cover_title" placeholder="Tulis Judul Buku Disini" type="text">
									</div>
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-size1"><span class="txtselectstyle">H1</span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-size2"><span class="txtselectstyle">H2</span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-size3"><span class="txtselectstyle">H3</span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-size4"><span class="txtselectstyle">H4</span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-size5"><span class="txtselectstyle">H5</span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-size6"><span class="txtselectstyle">H6</span></button>
								</div>
							</div><br>
							<span class="text-white">Font Color</span>
							<hr>
							<div class="row">
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #ef4d48;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #4990e2;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #f6a623;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #8b572a;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #44c1c0;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #9b9b9b;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #962a39;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #ef4d48;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #b44aca;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #2ecc71;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #ffffff;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 txtcolorlist">
									<button class="w-100 colortxt" style="background: #000000;border: none;height: 80px;"></button>
								</div>
							</div>
						</div>
						<div aria-labelledby="v-pills-profile-tab" class="tab-pane fade" id="v-pills-profile" role="tabpanel">
							<div class="row mt-10">
								<div class="col-md-6 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-font1"><span class="txtselectstyle font-select1">Judul</span></button>
								</div>
								<div class="col-md-6 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-font2"><span class="txtselectstyle font-select2">Judul</span></button>
								</div>
								<div class="col-md-6 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-font3"><span class="txtselectstyle font-select3">Judul</span></button>
								</div>
								<div class="col-md-6 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-font4"><span class="txtselectstyle font-select4">Judul</span></button>
								</div>
								<div class="col-md-6 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle" id="txt-font5"><span class="txtselectstyle font-select5">Judul</span></button>
								</div>
							</div>
						</div>
						<div aria-labelledby="v-pills-messages-tab" class="tab-pane fade" id="v-pills-messages" role="tabpanel">
							<div class="row mt-10">
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle" id="a-topleft"><img src="<?php echo base_url(); ?>public/img/assets/a-left.svg"></i></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle" id="a-topmid"><img src="<?php echo base_url(); ?>public/img/assets/a-center.svg"></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle" id="a-topright"><img src="<?php echo base_url(); ?>public/img/assets/a-right.svg"></button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle" id="a-centerleft"><img src="<?php echo base_url(); ?>public/img/assets/a-left.svg"></i></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle" id="a-centermid"><img src="<?php echo base_url(); ?>public/img/assets/a-center.svg"></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle" id="a-centerright"><img src="<?php echo base_url(); ?>public/img/assets/a-right.svg"></button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle" id="a-botleft"><img src="<?php echo base_url(); ?>public/img/assets/a-left.svg"></i></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle" id="a-botmid"><img src="<?php echo base_url(); ?>public/img/assets/a-center.svg"></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle" id="a-botright"><img src="<?php echo base_url(); ?>public/img/assets/a-right.svg"></button>
								</div>
							</div>
						</div>
						<div aria-labelledby="v-pills-settings-tab" class="tab-pane fade" id="v-pills-settings" role="tabpanel">
							<div class="row mt-10">
								<div class="col-md-12 uploadcoverimg">
									<input accept="image/*" id="uploadcover" name="uploadcover" onchange="tampilkanPreview(this,'bg-cover')" type="file">
									<hr>
									<span style="font-size: 14px;color: #ffffff;">Atau pilih background warna di bawah</span>
								</div>
							</div>
							<div class="row mt-10">
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #ef4d48;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #4990e2;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #f6a623;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #8b572a;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #44c1c0;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #9b9b9b;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #962a39;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #ef4d48;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #b44aca;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #2ecc71;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #ffffff;border: none;height: 80px;"></button>
								</div>
								<div class="pr-5 pl-5 pb-5 colorlist">
									<button class="w-100 colorbg" style="background: #000000;border: none;height: 80px;"></button>
								</div>
								<hr>
							</div>
							<div class="row mt-20">
								<div class="col-md-12">
									<!-- <button class="w-50" style="background-color: #b44aca;border: none;height: 70px;float: left;"></button>
                                                <button style="background-color: #282828;border: none;height: 70px;width: 40px;float: left;"></button> -->
									<input class="form-control" id="mycp" type="text"> <a>Ubah</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 w-100" style="height: auto;background-color: #fff;">
				<form action="#" enctype="multipart/form-data" id="form_book" method="post" name="form_book">
					<div class="row mt-20">
						<div class="col-md-8">
							<span style="font-size: 15px;font-weight: 600;text-align: left;">Buat Cover Buku</span>
						</div>
						<div class="col-md-4">
							<a class="mr-30 backbtn" href="#" style="font-size: 15px;font-weight: bold;">Batal</a> 
							 <input class="btnbeliskrg" id="done-cover" type="button" value="Done">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="mt-20">
								<div id="yourcoverimage">
									<img id="bg-cover">
									<div id="coverCreation">
										<span class="txt-h3" id="parenttxttitle"><span id="textcolor"><span id="texttitle"><span id="txtfontfam"></span></span></span></span>
									</div>
									<div class="baboo-cover"></div>
								</div><br>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
</body>
</html>
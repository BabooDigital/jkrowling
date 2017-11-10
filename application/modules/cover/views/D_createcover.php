<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

	<title><?php echo $judul; ?></title>

	<?php if (isset($css)): ?>
		<?php echo get_css($css) ?>
	<?php endif ?>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1 p-0" style="height: auto;background-color: #5a5a5a;">
				<div class="text-center">
					<div class="nav flex-column nav-pills creatcovermenu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link bor-rad0 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-text-height"></i></a>
						<a class="nav-link bor-rad0" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-font"></i></a>
						<a class="nav-link bor-rad0" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-align-center"></i></a>
						<a class="nav-link bor-rad0" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-picture-o"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-3" style="height: auto;background-color: #4d4c4c;">
				<div class="">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<div class="col-md-12">
									<div class="mt-30 judulbookcover">
										<input type="text" name="judul" class="w-100" placeholder="Tulis Judul Buku Disini">
									</div>
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle"><span class="txtselectstyle">H1</span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle"><span class="txtselectstyle">H2</span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle"><span class="txtselectstyle">H3</span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle"><span class="txtselectstyle">H4</span></button>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
							<div class="row mt-10">
								<div class="col-md-6 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle"><span class="txtselectstyle font-select1">Judul</span></button>
								</div>
								<div class="col-md-6 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle"><span class="txtselectstyle font-select2">Judul</span></button>
								</div>
								<div class="col-md-6 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle"><span class="txtselectstyle font-select3">Judul</span></button>
								</div>
								<div class="col-md-6 pl-10 pr-10 mb-15">
									<button class="w-100 p-20 btnselectstyle"><span class="txtselectstyle font-select4">Judul</span></button>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
							<div class="row mt-10">
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle"><span class="txtselectstyle" style="position: relative;bottom: 25px;right: 10px;"><i class="fa fa-align-left fa-2x" aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle"><span class="txtselectstyle" style="position: relative;bottom: 25px;"><i class="fa fa-align-center fa-2x" aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle"><span class="txtselectstyle" style="position: relative;bottom: 25px;left: 10px;"><i class="fa fa-align-right fa-2x" aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle"><span class="txtselectstyle" style="position: relative;right: 10px;"><i class="fa fa-align-left fa-2x" aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle"><span class="txtselectstyle"><i class="fa fa-align-center fa-2x" aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle"><span class="txtselectstyle" style="position: relative;left: 10px;"><i class="fa fa-align-right fa-2x" aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle"><span class="txtselectstyle" style="position: relative;top: 25px;right: 10px;"><i class="fa fa-align-left fa-2x" aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle"><span class="txtselectstyle" style="position: relative;top: 25px;"><i class="fa fa-align-center fa-2x" aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-4 pl-10 pr-10 mb-15">
									<button class="w-100 pt-30 pb-30 btnselectstyle"><span class="txtselectstyle" style="position: relative;top: 25px;left: 10px;"><i class="fa fa-align-right fa-2x" aria-hidden="true"></i></span></button>
								</div>
							</div></div>
							<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
								<div class="row mt-10">
									<div class="col-md-12 uploadcoverimg">
										<input type="file" name="uploadcover">
										<hr>
										<span style="font-size: 14px;color: #ffffff;">Atau pilih background warna di bawah</span>
									</div>
								</div>
								<div class="row mt-10">
									<div class="pr-5 pl-5 pb-5 colorlist">
										<button class="w-100" style="background-color: #ef4d48;border: none;height: 80px;"></button>
									</div>
									<div class="pr-5 pl-5 pb-5 colorlist">
										<button class="w-100" style="background-color: #4990e2;border: none;height: 80px;"></button>
									</div>
									<div class="pr-5 pl-5 pb-5 colorlist">
										<button class="w-100" style="background-color: #f6a623;border: none;height: 80px;"></button>									</div>
										<div class="pr-5 pl-5 pb-5 colorlist">
											<button class="w-100" style="background-color: #8b572a;border: none;height: 80px;"></button>
										</div>
										<div class="pr-5 pl-5 pb-5 colorlist">
											<button class="w-100" style="background-color: #44c1c0;border: none;height: 80px;"></button>
										</div>
										<div class="pr-5 pl-5 pb-5 colorlist">
											<button class="w-100" style="background-color: #9b9b9b;border: none;height: 80px;"></button>
										</div>
										<div class="pr-5 pl-5 pb-5 colorlist">
											<button class="w-100" style="background-color: #962a39;border: none;height: 80px;"></button>
										</div>
										<div class="pr-5 pl-5 pb-5 colorlist">
											<button class="w-100" style="background-color: #ef4d48;border: none;height: 80px;"></button>
										</div>
										<div class="pr-5 pl-5 pb-5 colorlist">
											<button class="w-100" style="background-color: #b44aca;border: none;height: 80px;"></button>
										</div>
										<div class="pr-5 pl-5 pb-5 colorlist">
											<button class="w-100" style="background: linear-gradient(217deg, #b4ed50, #429321);border: none;height: 80px;"></button>
										</div>
										<div class="pr-5 pl-5 pb-5 colorlist">
											<button class="w-100" style="background: linear-gradient(216deg, #f03e3e, #f76b1c);border: none;height: 80px;"></button>
										</div>
										<div class="pr-5 pl-5 pb-5 colorlist">
											<button class="w-100" style="background-color: #000000;border: none;height: 80px;"></button>
										</div>

										<hr>
									</div>

									<div class="row mt-20">
										<div class="col-md-12">
											<button class="w-50" style="background-color: #b44aca;border: none;height: 70px;float: left;"></button>
											<button style="background-color: #282828;border: none;height: 70px;width: 40px;float: left;"></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-8" style="height: 100vh;background-color: #fff;">
						<div class="row mt-20">
							<div class="col-md-8">
								<span style="font-size: 15px;font-weight: 600;text-align: left;">Buat Cover Buku</span>
							</div>
							<div class="col-md-4">
								<a class="mr-30 backbtn" href="#" style="font-size: 15px;font-weight: bold;">Batal</a>
								<button type="submit" class="btnbeliskrg" href="#" style="padding: 5px 30px;border: none;"><span style="font-size: 15px;color: #fff;font-weight: 600;"><i class="fa fa-check" aria-hidden="true"></i> Done</span></button>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="mt-50" style="">
									<div class="covercanvas">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php if (isset($js)): ?>
				<?php echo get_js($js) ?>
			<?php endif ?>
		</body>
		</html>
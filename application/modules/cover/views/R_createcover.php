<style type="text/css">
#draggable {
	width: 100px;
	height: 100px;
	background: transparent;
}
</style>
<body id="pageContent">
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
			<div class="container">
				<form class="navbar-brande backbtn">
					<i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> 
				</form>
				<!-- <form class="form-inline"> -->
					<button class="btn-transparant" id="cover_finish"><span>Selesai</span> &nbsp;&nbsp;<img src="<?php echo base_url() ?>public/img/icon-nav/publish.png" width="30" height="30"></button> 
					<!-- <label for="toggle-right" class="profile-toggle"><b>+</b></label> -->
				<!-- </form> -->
	</div>
</nav>
</div>
<div class="container margin_cover">
	<!-- <div class="row"> -->
		<!-- <div class="input-group paddingparagraph"> -->
			<div class="yourimage" style="">
				<div class="coverCreationmr">
					<div class="draggable" id="draggable">
						<input class="input-cover" id="title_book" type="text" name="">
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer class="navbar navbar-expand-lg fixed-bottom baboonav" id="not-color">
		<div class="container" style="border-bottom: solid .5px #d2d2d2;">
			<div class="container mt-20 mb-20">
				<div class="tabmenucreate text-center" align="center">
					<button onclick="showHide('gallery')" class="btn-transparant"><img src="<?php echo base_url('') ?>/public/img/icon-tab/gallery.svg" width="30"></button>
					<button onclick="showHide('txt')" class="btn-transparant"><img src="<?php echo base_url('') ?>/public/img/icon-tab/tt.png" width="30"></button>
				</div>
			</div>
		</div>
		<div class="container mt-10">
			<div class="container babooid">
				<div class="row gallery">
					<div id="myWorkContent">
						<div id="insideDiv">
							<a id="tes" href="assets/work/1.jpg">
								<div class="col-md-3 colordiv" style="">
									<center>
										<span id="buttonfiles" class="icon-btn" ><img src="<?php echo base_url() ?>/public/img/icon-tab/group_3.svg"><div style="">Upload</div></span>
									</center>
								</div>
							</a>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #ef4d48; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #4990e2; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #f6a623; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #8b572a; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #44c1c0; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #9b9b9b; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #962a39; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #ef4d48; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #b44aca; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #2ecc71; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #2c3e50; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
							<div id="tes" class=" colordivs" >
								<button class="colorbgmr" style="background: #000000; padding: 5px;width: 50px;height: 50px;"></button>
							</div>
						</div>
					</div>
				</div>
				<div class="row txt" style="display: none;">
					<div id="myWorkContent">
						<div id="insideDiv" class="tab_txt_menu mt-15 mb-30" style="display: none;">
							<select class="select-text" id="font-size">
								<option value="10px">10px</option>
								<option value="12px">12px</option>
								<option value="14px">14px</option>
								<option value="18px">18px</option>
								<option value="20px">20px</option>
								<option value="24px">24px</option>
								<option value="30px">30px</option>
								<option value="36px">36px</option>
								<option value="48px">48px</option>
							</select>
							<select class="select-text" id="font-style">
								<option value="setfont1" class="setfont1">Cursive</option>
								<option value="setfont2" class="setfont2">Roboto</option>
								<option value="setfont3" class="setfont3">Source Sans Pro</option>
							</select>
							<button class="font-text btn-transparant" id="bold-text"><b>B</b></button>
							<button class="font-text btn-transparant" id="italic-text"><i>I</i></button>
							<span class="font-text"></span>
							<button class="btn-color"></button>
							<select name="select" class="btn-transparant">
							</select>
							<!-- <button onclick="appendToCover()" class="btn-transparant"><img src="<?php echo base_url('') ?>/public/img/icon-tab/tt.png" width="30"></button> -->
						</div>
						<div id="insideDiv" class="tab_txt p-15 text-center" style="width: 100% !important;">
							<button onclick="appendToCover()" class="btn-transparant"><img src="<?php echo base_url('') ?>/public/img/icon-tab/text.svg" width="40"></button>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<nav class="navbar navbar-expand-lg fixed-bottom baboonav" style="display: none;" id="color-show">
			<div class="container mt-10 mb-10">
				<a href="#" style="position: relative;left: 73%;font-weight: bold;">Simpan <span class="ml-15">></span></a>
			</div>
			<div style="" class="container mt-15 mb-15">
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #000000; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #f5f8fa; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #f8e71c; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #8b572a; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #7ed321; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #ef4d48; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #f5a623; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #9013fe; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #4a90e2; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #50e3c2; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #xa25d5d; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #4a4a4a; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #9b9b9b; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #44c1c0; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
				<div id="tes" class="colordivs mr-5 mb-10" >
					<button class="colorfontmr" style="border:none;border-radius: 5px;background: #00adef; padding: 5px;width: 60px;height: 60px;"></button>
				</div>
			</div>
		</nav>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
	</body>
	</html>
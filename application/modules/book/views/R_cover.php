<style>
.switch {
	position: relative;
	display: inline-block;
	width: 50px;
	height: 25px;
}

.switch input {display:none;}

.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #c7c7c7;
	-webkit-transition: .4s;
	transition: .4s;
}

.slider:before {
	position: absolute;
	content: "";
	height: 26px;
	width: 26px;
	left: 0px;
	bottom: 0px;
	background-color: #7661ca;
	-webkit-transition: .4s;
	transition: .4s;
}

input:checked + .slider {
	background-color: #fff;
}

input:focus + .slider {
	box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
	-webkit-transform: translateX(26px);
	-ms-transform: translateX(26px);
	transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
	border-radius: 35px;box-shadow: 0px 0px 4px #527661ca;
}

.slider.round:before {
	border-radius: 50%;
}
.ainfo {
	font-size: 11pt;
	text-decoration: underline;
	color: #7554bd;
}


.checkbox label:after {
	content: '';
	display: table;
	clear: both;
}

.checkbox .cr {
	position: relative;
	display: inline-block;
	border: 1px solid #7661ca;
	border-radius: .25em;
	width: 1.3em;
	height: 1.3em;
	float: left;
	margin-right: .5em;
}

.checkbox .cr .cr-icon {
	position: absolute;
	font-size: .8em;
	line-height: 0;
	top: 50%;
	left: 20%;
}

.checkbox label input[type="checkbox"] {
	display: none;
}

.checkbox label input[type="checkbox"]+.cr>.cr-icon {
	opacity: 0;
}

.checkbox label input[type="checkbox"]:checked+.cr>.cr-icon {
	opacity: 1;
}
.subtitle { 
	color: #000;font-size: 13pt;font-weight: 600;
}
.bg-greypale {
	background: #f5f8fa;
}
.modal-content {
	border :none;
}
.btntnc {
	border: none;
	border-radius: 35px;
	padding: 10px 50px;
	box-shadow: 0px 2px 5px 0px #999999;
	font-weight: 600;
}
.btn-diss {
	background: #dadada;
	color: #333;
}
.btns {
	background: none;
	border: none;
}
.btn-acc {
	background: #7661ca;
	color: #fff;
}
.swal2-contentwrapper {
	margin-top: 15px;
}input[type='file'] {
  opacity:0    
}
</style>
<?php
error_reporting(0);
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($actual_link);
$uri = $this->uri->segment(2);
$string = preg_replace('/\s+/', '', $uri);
parse_str($parts['query'], $query);
$dat = array(
	'bid' => $string,
	'param' => $query['stat']
);
if (!empty($query['stat'])) {	
	$this->session->set_userdata('editPub', $dat);
}else {		

}	
?>
<body id="pageContent">
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
			<div class="container">
				<form class="navbar-brande">
					<a href="javascript:history.back()">
						<i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> 
					</a>
				</form>
				<form class="form-inline">
					<!-- <button class="btn-transparant"><span>Selesai</span> &nbsp;&nbsp;<img src="<?php echo base_url() ?>public/img/icon-nav/publish.png" width="30" height="30"></button>  -->
					<!-- <label for="toggle-right" class="profile-toggle"><b>+</b></label> -->
				</form>
			</div>
		</nav>
	</div>
	<div class="container margin_cover">
		<div class="text-center">
			<div class="coverprev" align="center" style="height: 230px;">
				<input type="hidden" id="uri" value="<?php echo $this->uri->segment(2); ?>">
				<?php $sess = $this->session->userdata('editPub'); if (!empty($sess)) { ?>
				<p><img width="160" height="222" id="previews" src="<?php $src = $book['book_info']['cover_url']; if(!empty($src)){  echo $src; }else{
					echo base_url()."public/img/assets/def_prev.png";
				} ?>" style="object-fit: cover;"></p>
				<input type="hidden" name="cover_name" id="cover_name" accept="image/*"  value="<?php $src = $book['book_info']['cover_url']; if($src != NULL){  echo $src; }else{ echo ""; } ?>">
				<input type="hidden" name="cover_file" id="cover_file" accept="image/*" value="<?php $src = $book['book_info']['cover_url']; if($src != NULL){  echo $src; }else{ echo ""; } ?>">
				<input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'previews')" name="file_cover" value="<?php $src = $book['book_info']['cover_url']; if(!empty($src)){  echo $src; }else{ echo ""; } ?>">
				<?php }else{ ?>
				<p><img width="160" height="222" id="previews" src="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{
					echo base_url()."public/img/assets/def_prev.png";
				} ?>" style="object-fit: cover;"></p>
				<input type="hidden" name="cover_name" id="cover_name" accept="image/*"  value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo ""; } ?>">
				<input type="hidden" name="cover_file" id="cover_file" accept="image/*">
				<input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'previews')" name="file_cover" value="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{ echo ""; } ?>">
				<?php } ?>
			</div>
			<div class="min_padding">
				<p style="font-size: 16px;">Atau
					<input type="button" style="background: transparent; color: #b448cc;border: 0;cursor: pointer;" onclick="window.location.href = '<?php echo site_url('create_cover'); ?>';" value="Buat Disini" />
					<!-- <a href="<?php echo site_url(); ?>create_cover" style="color: #b448cc;"><b>Buat Di Sini</b></a></p> -->
				</div>
			</div>
			<div class="mt-40">
				<div class="form-group">
					<?php $sess = $this->session->userdata('editPub'); if (!empty($sess) || $sess != null) { ?>
					<select class="form-control catselect" id="category_ids" name="category_id" required>
						<option value="<?php echo $book['category']['category_id']; ?>">-- <?php echo $book['category']['category_name']; ?> --</option>
						<?php foreach ($category as $cat) { ?>
						<option value="<?php echo $cat['category_id'] ?>"><?php echo $cat['category_name'] ?></option>
						<?php } ?>
					</select>
					<?php }else{ ?>
					<select class="form-control catselect" id="category_ids" name="category_id" required>
						<option value="">Kategori Buku</option>
						<?php foreach ($category as $cat) { ?>
						<option value="<?php echo $cat['category_id'] ?>"><?php echo $cat['category_name'] ?></option>
						<?php } ?>
					</select>
					<?php } ?>
				</div>
			</div>
			<div class="mt-20">
				<div class="form-group">
					<label style="font-size: 14pt;">Jual Buku? <a href="javascript:void(0);" class="ainfo ml-15">Info Lengkap</a></label>
					<label class="switch float-right" style="display: none;">
						<input type="checkbox" id="showOpt" data-toggle='collapse' data-target='#priceSet' class="priceCheck">
						<span class="slider round"></span>
					</label>
					<div class="container bg-white collapse" id='priceSet'>
						<div class="row" style="width: 110%;">
							<div class="form-group col-4">
								<label style="color: #fff;">l</label>
								<select id="inputCurrency" class="form-control">
									<option selected>Rp</option>
								</select>
							</div>
							<div class="form-group col-8">
								<label class="text-muted">Harga Buku Lengkap</label>
								<input type="number" class="form-control" id="inputprice" placeholder="60000">
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<label class="text-muted fs-10">PPN 10%</label>
							</div>
							<div class="col-8">
								<label class="text-muted fs-10-right"><b style="display: none;" id="rp">Rp</b> <b id="ppn">-</b></label>
							</div>
							<div class="col-4">
								<label class="text-muted fs-10">Payment Fee</label>
							</div>
							<div class="col-8">
								<label class="text-muted fs-10-right"> <b style="display: none;" id="rp_fee">Rp</b> <b id="payment_fee">-</b></label>
							</div>
						</div>
						<hr class="mt-5 mb-5">
						<div class="row">
							<div class="col-6">
								<label class="text-muted fs-10" style="font-size: 16px;">Harga Jual Buku</label>
							</div>
							<div class="col-6">
								<label class="text-muted fs-10-right" style="font-size: 16px;"> <b style="display: none;" id="rp_total">Rp</b> <b id="total">0</b></label>
							</div>
						</div>
						<div class="row mt-20" style="width: 110%;">
							<div class="form-group col-8">
								<?php if ((bool)$book['book_info']['is_pdf'] == true) {
									echo "<label class='text-muted'>Mulai Jual Pada Halaman</label>";
								}else{
									echo "<label class='text-muted'>Mulai Jual Pada Chapter</label>";
								} ?>
								
								<input type="number" name="start_chapter" class="input-range start_chapter" id="addormin" style="width: 100%;background: none;">
							</div>
							<div class="col-2" style="margin-left: -15px;">
								<label style="color: #fff;">min</label>
								<button type="button" class="btn-transparant value-control addmin" data-action="minus" data-targets="addormin"><img src="<?php echo base_url('public/img/assets/icon_minch_active.png'); ?>" width="35"></button>
								<!-- <span class="input-group-btn"><button class="btn-transparant value-control addmin" data-action="minus" data-targets="font-size"><img src="<?php echo base_url('public/img/assets/icon_minch_active.png'); ?>" width="35"></button></span> -->
							</div>
							<div class="col-2">
								<label style="color: #fff;">min</label>
								<button type="button" class="btn-transparant value-control addplus" data-action="plus" data-targets="addormin"><img src="<?php echo base_url('public/img/assets/icon_plusch_active.png'); ?>" width="35"></button>
								<!-- <span class="input-group-btn"><button class="btn-transparant value-control addplus" data-action="plus" data-targets="font-size"><img src="<?php echo base_url('public/img/assets/icon_plusch_active.png'); ?>" width="35"></button></span> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="count_chapter" id="count_chapter" value="" class="w-100" placeholder="Count Chapter" required="">
			<input type="hidden" name="count_chapter_plus_minus" id="count_chapter_plus_minus" value="" class="w-100" placeholder="Count Chapter" required="">
			<input type="hidden" name="minim_chapter" id="minim_chapter" value="" class="w-100" placeholder="Count Chapter" required="">
			<div class="mt-20">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="" class="checktnc" name="ischecked">
						<span class="cr"><i class="cr-icon fa fa-check"></i></span>
						<a href="javascript:void(0);" class="tncModal" style="color: #7554bd;">Term of Service</a>
					</label>
				</div>
			</div>
		</div>
		<footer class="navbar navbar-expand-lg fixed-bottom" style="height:60px;background: #f3f5f7;">
			<input type="hidden" id="what" value="<?php $pin = $this->session->userdata('hasPIN'); if ($pin == 1) {echo 'true';}else{echo 'false';}  ?>">
			<div class="container">
				<button type='button' class='btn-publish' id='publish_book'>Publish</button>
				<button type='button' class='btn-publish' id='setpin_publish' style="display: none;">Publish</button>
			</div>
		</footer>

		<?php $this->load->view('include/modal_tnc'); ?>

		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
		<script>
			check_sell();
			checkingPIN();
			$(document).on('click','.tncModal',function(){
				$('#tnc-modal').modal('show');
				$(document).on('click', '.btn-acc', function() {
					$('.checktnc').prop('checked', true);
					$('#tnc-modal').modal('hide');
				});
				$(document).on('click', '.btn-diss', function() {
					$('.checktnc').prop('checked', false);
					$('#tnc-modal').modal('hide');
				});
			});
			$(document).on('click', '#showOpt', function() {
				var sellbtn = $('#showOpt:checkbox:checked');
				var pin = $('#what').val();
				if (sellbtn.length == 0 && pin == 'false') {
					$('#publish_book').show();
					$('#setpin_publish').hide();
				}else if (sellbtn.length == 1 && pin == 'true'){
					$('#publish_book').show();
					$('#setpin_publish').hide();
				}else if (sellbtn.length == 0 && pin == 'true'){
					$('#publish_book').show();
					$('#setpin_publish').hide();
				}else{
					$('#publish_book').hide();
					$('#setpin_publish').show();
				}
			});
			$(document).on('click','.value-control',function(){
				var action = $(this).attr('data-action');
				var target = $(this).attr('data-targets');
				var value  = parseFloat($('[id="'+target+'"]').val());
				if ( action == "plus") {
					if (value == $("#count_chapter_plus_minus").val()) {
						value;
					}else{
						value++;
					}
				}
				if ( action == "minus") {
					if (value <= $("#minim_chapter").val()) {
						// if (value < 2) {
							value;
						}else{
							value--;
						}
					// }
				}
				$('[id="'+target+'"]').val(value);
			});
			$(document).on('click','.ainfo',function(){
				swal({
					title: 'Info Penjualan Buku',
					html:
					'<div class="text-left" style="font-size:12pt;"><span class="mb-5">Fitur penjualan buku akan aktif jika tulisan anda sudah memenuhi kriteria dibawah ini</span>' +
					'<ul>' +
					'<li>Buku bisa dijual apabila penulis sudah menulis 5 chapter dan memenuhi 6000 karakter</li>' +
					'<li>Minimal chapter yang dijual adalah 3 chapter dan minimal chapter yang digratiskan adalah 2 chapter</li>' +
					'<li>Penulis bisa menjual di chapter ke 3 dari total 5 chapter, dengan kata lain 2 chapter pertama adalah gratis dan 3 chapter berikut yang dijual/berbayar. Misal : Penulis sudah menulis 5 chapter dengan 6000 karakter, maka penulis bisa menjual buku tersebut dari chapter ke 3 (chapter yang dijual adalah chapter 3, 4 dan 5) dan chapter 1 dan 2 adalah chapter yang gratis.</li>' +
					'<ul><div>',
					showCloseButton: true,
					showCancelButton: false, // There won't be any cancel button
					showConfirmButton: false // There won't be any confirm button
				})
			});
		</script>
	</body>
	</html>
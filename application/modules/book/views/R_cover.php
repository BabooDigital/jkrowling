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
</style>
<body id="pageContent">
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
			<div class="container">
				<form class="navbar-brande">
					<a href="<?php echo site_url(); ?>listchapter/<?php echo $this->uri->segment(2); ?>">
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
				<p><img width="160" height="222" id="previews" src="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{
					echo base_url()."public/img/assets/def_prev.png";
				} ?>" style="object-fit: cover;"></p>
				<input type="hidden" name="cover_name" id="cover_name" accept="image/*"  value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo ""; } ?>">
				<input type="hidden" name="cover_file" id="cover_file" accept="image/*">
				<input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'previews')" name="file_cover" value="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{ echo ""; } ?>">
			</div>
			<div class="min_padding">
				<p style="font-size: 16px;">Atau
					<input type="button" style="background: transparent; color: #b448cc;border: 0;cursor: pointer;" onclick="window.location.href = '<?php echo site_url('create_cover'); ?>';" value="Buat Disini" />
					<!-- <a href="<?php echo site_url(); ?>create_cover" style="color: #b448cc;"><b>Buat Di Sini</b></a></p> -->
				</div>
			</div>
			<div class="mt-40">
				<div class="form-group">
					<select class="form-control catselect" id="category_ids" name="category_id" required>
						<option value="">Kategori Buku</option>
					</select>
				</div>
			</div>
			<div class="mt-20">
				<div class="form-group">
					<label style="font-size: 14pt;">Jual Buku? <a href="#" class="ainfo ml-15">Info Lengkap</a></label>
					<!-- <label class="switch float-right">
						<input type="checkbox" id="showOpt" data-toggle='collapse' data-target='#collapsediv1'>
						<span class="slider round"></span>
					</label> -->
					<div class="container bg-white collapse" id='collapsediv1'>
						<div class="row" style="width: 110%;">
							<div class="form-group col-4">
								<label style="color: #fff;">l</label>
								<select id="inputCurrency" class="form-control">
									<option selected>Rp</option>
									<option>$</option>
								</select>
							</div>
							<div class="form-group col-8">
								<label class="text-muted">Harga Buku Lengkap</label>
								<input type="number" class="form-control" id="inputAddress" placeholder="60000">
							</div>
						</div>
						<div class="row" style="width: 110%;">
							<div class="form-group col-8">
								<label class="text-muted">Mulai Jual Pada Chapter</label>
								<input type="number" value="3" min="3" class="form-control chaptermin" id="font-size">
							</div>
							<div class="col-2" style="margin-left: -15px;">
								<label style="color: #fff;">min</label>
								<span class="input-group-btn"><button class="btn-transparant value-control addmin" data-action="minus" data-target="font-size"><img src="<?php echo base_url('public/img/assets/icon_minch_active.png'); ?>" width="35"></button></span>
							</div>
							<div class="col-2">
								<label style="color: #fff;">min</label>
								<span class="input-group-btn"><button class="btn-transparant value-control addplus" data-action="plus" data-target="font-size"><img src="<?php echo base_url('public/img/assets/icon_plusch_active.png'); ?>" width="35"></button></span>
							</div>
						</div>
					</div>
				</div>
			</div>
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
			<div class="container">
				<button class="btn-publish" id="publish_book">Publish</button> 
			</div>
		</footer>

		<?php $this->load->view('include/modal_tnc'); ?>

		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
		<script>
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
			$(document).on('click','.value-control',function(){
				var action = $(this).attr('data-action')
				var target = $(this).attr('data-target')
				var value  = parseFloat($('[id="'+target+'"]').val());
				if ( action == "plus" ) {
					value++;
				}
				if ( action == "minus" ) {
					value--;
				}
				$('[id="'+target+'"]').val(value);
			});
		</script>
	</body>
	</html>
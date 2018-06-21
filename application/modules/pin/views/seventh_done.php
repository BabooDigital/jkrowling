<body>
	<div class="container h-100">
		<div class="text-center layer-center">
			<div class="row">
				<div class="col-12">
					<img src="<?php echo base_url('public/img/assets/icon_done_check.png'); ?>" width="70" class="img-fluid">
				</div>
			</div>
			<div class="row mt-15">
				<div class="col-12">
					<span class="text-head "><b>Sukses</b></span>
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-12">
					<p class=" text-p">Data berhasil disimpan, kamu dapat mengakses hasil penjulanmu pada halaman profile.</p>
				</div>
			</div>
			<div class="row mt-10">
				<div class="col-12">
					<?php
					$ad = $this->session->userdata('pinPub');
					if (empty($ad)) {
					 	echo "<button type='button' class='btn-ok-purp'>OK</button>";
					 }else{
					 	echo "<a href='".site_url('cover/'.$ad['b'])."' class='btn-ok-purp pl-50 pr-50 pt-5 pb-5'>OK</a>";
					 }
					?>
					
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function () {
			$('.btn-ok-purp').click(function () {
				window.location = base_url+'timeline';
			});
		});

	</script>
</body>
</html>
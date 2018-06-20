<?php 
echo "<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=".APPID_FB."';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";

if ($this->agent->mobile()) {
	$this->load->view('navbar/R_navbar');
}else{
	$this->load->view('navbar/D_navbar');
}
?>

<div class="container mt-120">
	<div class="row mb-20">
		<div class="col-12">
			<p class="title_">Peserta Lomba</p>
		</div>
	</div>
	<div class="row" id="post-data">
		<?php $this->load->view('data/D_seeall'); ?>	
	</div>
		<center>
			<div class="loader" id="loader_scroll" style="display: none;"></div>
		</center>
	</div>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
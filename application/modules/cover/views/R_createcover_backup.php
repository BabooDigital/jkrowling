
<body id="pageContent">
<input type="checkbox" id="toggle-right">
<div class="page-wrap">
	<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
		<div class="container">
			<form class="navbar-brande">
				<i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> 
			</form>
		</div>
	</nav>
</div>
<br>
<br>
<br>
<div class="container">
<div class="card-library" style="padding: 0 00px;height: 350px;border:solid 1px #000;overflow-x: scroll;overflow-y: scroll;">
	
</div>
</div>
<footer class="navbar navbar-expand-lg fixed-bottom baboonav" style="height:150px;">
<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
	<div class="list-group">
	    <div class="row mb-10" style="padding: 0px 10px 0px 10px;">
			<div class="media">
				<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
				<div class="media-body mt-5">
					<h5 class="card-title nametitle2">Marina Saraswati</h5>
					<p class="text-muted" style="margin-top:-10px;"><small><span>Hallo</span>
						<span class="ml-10">1 hours ago</span></small></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card-library mb-15" style="padding: 0 00px;height: auto;">
	<div class="list-group">
	    <div class="row mb-10" style="padding: 0px 10px 0px 10px;">
			<div class="media">
				<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php echo base_url(); ?>public/img/profile/pp_wanita2.png" width="48" alt="Generic placeholder image">
				<div class="media-body mt-5">
					<h5 class="card-title nametitle2">Marina Saraswati</h5>
					<p class="text-muted" style="margin-top:-10px;"><small><span>Terima Kasih Atas Saran nya..</span>
						<span class="ml-10">1 hours ago</span></small></p>
				</div>
			</div>
		</div>
	</div>
</div>
</footer>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
</body>
</html>
<?php 
$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
$appid = '196429547790304';
if (strpos($base, 'stg.baboo.id') !== false) {
	$appid = '1677083049033942';
} elseif (strpos($base, 'localhost/jkrowling') !== false || strpos($base, 'dev-baboo.co.id') !== false) {
	$appid = '196429547790304';
} elseif (strpos($base, 'baboo.id') !== false || strpos($base, 'www.baboo.id') !== false) {
	$appid = '2093513617332249';
}
echo "<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=".$appid."';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";
?>
<?php $this->load->view('navbar/D_navbar'); ?>	
<div class="container babooidin">
	<div class="row">
		<!-- Left Side -->
		<div class="col-md-3 tmlin">
			<div class="stickymenu">
				<!-- Penulis Minggu Ini -->
				<div class="side-card mb-15">
					<div class="card-header">
						Penulis minggu ini
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush" id="author_this_week">
							<div class="loads-css ng-scope"><div style="width:20px;height:20px" class="lds-flickr"><div></div><div></div><div></div></div></div>
						</ul>
					</div>
				</div>
				<div class="side-card mb-15" style="background: transparent;">
					<div class="card-body p-0">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<ins class="adsbygoogle"
							     style="display:inline-block;width:300px;height:250px"
							     data-ad-client="ca-pub-4994852796413443"
							     data-ad-slot="7276054409"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>
				<!-- Trending -->
			</div>
		</div>

		<!-- Mid Side -->
		<div class="col-md-6" id="post-data">
			<?php 
			$this->load->view('data/D_timeline_in', $home);
			?>
			<!-- <span class="loader" style="display: none;margin-left: auto;margin-right: auto;"></span> -->
		</div>

		<!-- Right Side -->
		<div class="col-md-3 tmlin">
			<div class="stickymenu">
				<!-- Card Widget -->
				<div class="card card-widget mb-15">
					<a href="<?php echo base_url('event') ?>">
						<img src="https://s3-us-west-2.amazonaws.com/s3.baboo.id/baboo-cover/hasil-web.png" style="width:100%;height: 100%;">
					</a>
				</div>
				<!-- Card Widget -->

				<!-- Buku Populer -->
				<div class="side-card mb-15">
					<div class="card-header">
						Buku Populer
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush" id="best_book">
							<div class="loads-css ng-scope"><div style="width:20px;height:20px" class="lds-flickr"><div></div><div></div><div></div></div></div>
						</ul>
					</div>
				</div>
				<!-- Buku Populer -->
			</div>
		</div>
	</div>
</div>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
<?php echo $this->session->flashdata('success_publish'); ?>
<?php if ($this->session->flashdata('is_follow_event')): ?>
	<script type="text/javascript">
		swal("Good job!", "Kamu Sukses Mengikuti Event!", "success");
	</script>
<?php endif ?>
<?php if ($this->session->flashdata('is_not_follow_event')): ?>
	<script type="text/javascript">
		swal("Maaf..", "Kamu Sudah Mengikuti Event!", "warning");
	</script>
<?php endif ?>>
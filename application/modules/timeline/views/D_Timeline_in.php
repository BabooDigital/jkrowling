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
		<div class="col-3 tmlin">
			<div class="stickymenu">
				<!-- Penulis Minggu Ini -->
				<div class="side-card mb-15">
					<div class="card-header">
						Penulis minggu ini
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush" id="author_this_week">
							<?php foreach ($writter as $best_writter): ?>
							<?php if ($best_writter['avatar'] == "" || $best_writter == null): ?>
								<?php $img =  base_url().'public/img/profile/blank-photo.jpg'; ?>
							<?php else: ?>
								<?php $img = $best_writter['avatar']; ?>
							<?php endif ?>
							<?php if ($best_writter['isFollow'] == false): ?>
								<?php $follow = "<a href='#' data-follow='".$best_writter['author_id']."' class='addbutton followprofile'><img src='public/img/assets/icon_plus_purple.svg' width='20' class='mt-img'></a>"; ?>
							<?php else: ?>
								<?php $follow = ""; ?>
							<?php endif ?>
							<li class='media baboocontent'>
								<img class='d-flex mr-3 rounded-circle' src='<?php echo $img; ?>' width='50' height='50'><div class='media-body mt-7'>
									<a class='profile' data-usr-prf='<?php echo $best_writter['author_id']; ?>' data-usr-name='<?php echo url_title($best_writter['author_name']); ?>' href='profile/<?php echo url_title($best_writter['author_name']); ?>'>
										<h5 class='mt-0 mb-1 nametitle'><?php echo $best_writter['author_name']; ?></h5>
									</a>
									<div class='pull-right baboocolor'><?php echo $follow; ?></div>
								</div>
							</li>
							<?php endforeach ?>
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
			</div>
		</div>

		<!-- Mid Side -->
		<div class="col-6 mb-50">
			<div id="post-data">
				<?php $this->load->view('data/D_timeline_in', $home); ?>
			</div>
			<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
		</div>

		<!-- Right Side -->
		<div class="col-3 tmlin">
			<div class="stickymenu">
				<div class="card card-widget mb-15">
					<a href="<?php echo base_url('event') ?>">
						<img src="https://s3-us-west-2.amazonaws.com/s3.baboo.id/baboo-cover/hasil-web.png" style="width:100%;height: 100%;">
					</a>
				</div>
				<!-- Buku Populer -->
				<div class="side-card mb-15">
					<div class="card-header">
						Buku Populer
					</div>
					<div class="card-body p-0">
						<ul class="list-group list-group-flush" id="best_book">
							<?php foreach ($best as $best_book): ?>
							<?php if ($best_book['popular_cover_url'] == null || $best_book['popular_cover_url'] == "Kosong" || $best_book['popular_cover_url'] == ""): ?>
								<?php $cover =  base_url()."public/img/blank_cover.png"; ?>
							<?php else: ?>
								<?php $cover =  $best_book['popular_cover_url']; ?>
							<?php endif ?>
							<li class="list-group-item">
								<div class="media">
									<div class="media-left mr-10">
										<a href="#"><img class="media-object" src="<?php echo $cover; ?>" width="60" height="80"></a>
									</div>
									<div class="media-body">
										<div>
											<h4 class="media-heading bold mt-10">
												<a href="book/<?php
								echo $best_book['popular_book_id']; ?>
								-<?php echo url_title($best_book['popular_book_title'], 'dash', true); ?>"><?php echo $best_book['popular_book_title'] ?></a>
											</h4>
											<p style="font-size: 10pt;">by <a class="profile" data-usr-prf="<?php echo $best_book['popular_author_id']; ?>" data-usr-name="<?php echo url_title($best_book['popular_author_name']); ?>" href="profile/<?php echo url_title($best_book['popular_author_name']); ?>"><?php echo $best_book['popular_author_name']; ?></a></p>
										</div>
									</div>
								</div>
							</li>

							<?php endforeach ?>
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

</body>
</html>
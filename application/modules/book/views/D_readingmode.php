<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<title><?php echo $title; ?></title>
	<?php if (isset($css)): ?><?php echo get_css($css) ?><?php endif ?>

	<script type="text/javascript">
		var base_url = '<?php echo base_url() ?>';
	</script>
</head>
<body>
	<div class="container-fluid mb-40">
		<div class="row">
			<div class="col-md-2 bg-dark"></div>
			<div class="col-md-8 bg-white">
				<div id="readingModeContent">
					<div class="card p-30" style="border-radius: 0;border: none;">
						<div class="card-body" style="padding-bottom:200px;">
							<div class="media">
							<img class="d-flex align-self-start mr-20 rounded-circle" width="50" height="50" src="
							<?php if($detail_book['data']['author']['avatar'] == NULL){
								echo base_url('public/img/profile/blank-photo.jpg');
							}else{
								echo $detail_book['data']['author']['avatar']; } ?>" alt="<?php echo $detail_book['data']['author']['author_name']; ?>">
								<div class="media-body">
									<h5 class="nametitle2 author_name"><?php echo $detail_book['data']['author']['author_name']; ?></h5>
									<p><small><span>Jakarta, Indonesia</span></small></p>
									<a href="#" data-follow="<?php echo $detail_book['data']['book_info']['book_id']; ?>" class="btn-no-fill dbookfollowbtn ml-20 <?php if ($detail_book['data']['author']['isFollow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow"><?php if ($detail_book['data']['author']['isFollow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a>
								</div>
							</div>
							<div id="post-data">
									<?php $this->load->view('data/D_readingmode'); ?>
							</div>
							<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
							
							<div class="mt-10">
								<div class="bg-white p-10">
									<p></p>
									<div class="row">
										<div class="col-md-3">
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					<nav id="cobamenu" class="navbar navbar-expand-lg navbar-light bg-white fixed-bottom box-shadow-navbar">
						<input type="hidden" value="post-0" />	
						<div class="container-fluid pt-5 pb-5">
							<div id="buatappend" class="col-md-2">
							</div>
							<div class="col-md-8">
								<ul class="navbar-nav pull-right">
									<li class="nav-item"><span class="text-muted"><strong id="chapter_number">Description</strong></span></li>
								</ul>
								<ul class="navbar-nav">
									<li class="nav-item">
										<a data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo" class="fs-14px <?php if($detail_book['data']['book_info']['is_like'] == 'false'){ echo 'like'; }else{ echo 'unlike'; } ?>">
											<img src="<?php if($detail_book['data']['book_info']['is_like'] == 'false'){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="loveicon" width="30">
										</a>
									</li>
									<li class="nav-item ml-20">
										<?php 
											$url = base_url(uri_string());
											$replace = str_replace("/read", "#comment", $url);
										?>
										<a href="<?php echo $replace; ?>"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="25"></a>
									</li>
								</ul>
							</div>
							<div class="col-md-2"></div>
						</div>
						<div class="progress navprogress">
							<!-- <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar" role="progressbar" style="width: 80%;"></div> -->
						</div>
					</nav>
					<script type="text/javascript">
						var count_data = '<?php echo $detailChapter; ?>';
					</script>
					<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
				</div>
			</div>
			<div class="col-md-2 bg-dark">
				<div style="position: fixed;">
					<a onclick="showLoading()" href="javascript:void(0);" class="backbtn" style="font-size: 14pt;color: #fff;">&#88;</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<title><?php echo $judul; ?></title><?php if (isset($css)): ?><?php echo get_css($css) ?><?php endif ?>
</head>
<body>
	<div class="container-fluid mb-40">
		<div class="row">
			<div class="col-md-2 bg-dark"></div>
			<div class="col-md-8 bg-white">
				<div id="readingModeContent">
					<div class="card p-30" style="border-radius: 0;border: none;">
						<div class="card-body">
							<div class="media">
							<img class="d-flex align-self-start mr-20 rounded-circle" width="50" height="50" src="
							<?php if($detail_book['data']['author']['avatar'] == NULL){
								echo base_url('public/img/profile/blank-photo.jpg');
							}else{
								echo $detail_book['data']['author']['avatar']; } ?>" alt="<?php echo $detail_book['data']['author']['author_name']; ?>">
								<div class="media-body">
									<h5 class="nametitle2 author_name"><?php echo $detail_book['data']['author']['author_name']; ?></h5>
									<p><small><span>Jakarta, Indonesia</span></small></p>
									<a href="#" data-follow="<?php echo $detail_book['data']['book_info']['book_id']; ?>" class="btn-no-fill dbookfollowbtn ml-20 <?php if ($detail_book['data']['author']['is_follow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow"><?php if ($detail_book['data']['author']['is_follow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a>
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
											<!-- <div class="border border-top-0 border-left-0 border-bottom-0"> -->
												<!-- <h1 style="font-size: 5.5rem;"><strong></strong></h1> -->
											<!-- </div> -->
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-bottom box-shadow-navbar">
						<div class="container-fluid pt-5 pb-5">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<ul class="navbar-nav pull-right">
									<li class="nav-item"><span class="text-muted"><strong id="chapter_number">Description</strong></span></li>
								</ul>
								<ul class="navbar-nav">
									<li class="nav-item">
										<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="30"></a>
									</li>
									<li class="nav-item ml-20">
										<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="25"></a>
									</li>
								</ul>
							</div>
							<div class="col-md-2"></div>
						</div>
						<div class="progress navprogress">
							<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="25" class="progress-bar" role="progressbar" style="width: 25%;"></div>
						</div>
					</nav>
					<script type="text/javascript">
						var count_data = '<?php echo $detailChapter; ?>' + 1;
					</script>
					<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
				</div>
			</div>
			<div class="col-md-2 bg-dark">
				<div style="position: fixed;">
					<a href="javascript:void(0);" class="backbtn" style="font-size: 14pt;color: #fff;">&#88;</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
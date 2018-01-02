<?php if (!empty($home)) {
foreach ($home as $s_book) { ?>

<?php if ($s_book['image_url'] == "" || $s_book['image_url'] == null): ?>
<div class="card mb-15" style="padding: 0 00px;">
<div class="card-body p-0 p-20">
<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
<div class="media">
	<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
		echo base_url('public/img/profile/blank-photo.jpg');
	}else{
		echo $s_book['author_avatar']; } ?>" width="70" height="70" alt="Generic placeholder image">
		<div class="media-body mt-5">
			<h5 class="card-title nametitle2"><a href="<?php echo site_url('profile/'.$s_book['author_id'].''); ?>"><?php
			echo $s_book['author_name']; ?></a></h5>
			<p class="text-muted" style="margin-top:-10px;"><small><span>Jakarta, Indonesia</span>
				<span class="ml-10"><?php echo $s_book['publish_date']; ?></span></small></p>
			</div>
		</div>
	</div>
	<a href="<?php echo site_url(); ?>book/<?php echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>"> 
	<div class="row">
		<div class="media w-100">
			<div class="media-body">
			<img alt="<?php
				echo $s_book['title_book']; ?>" class="d-flex align-self-start mr-10 float-left" src="<?php
			echo $s_book['cover_url']; ?>" width="120" height="170">
				<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>book/<?php echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>"><?php
				echo $s_book['title_book']; ?></a></h5>
				<p class="catbook mb-10"><a class="mr-20" href="#"><span class="btn-no-fill">FIKSI</span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> <?php
				echo $s_book['view_count']; ?></span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php
				echo $s_book['share_count']; ?></span></p>
				<p class="text-desc-out"><?php
				echo $s_book['desc']; ?><a class="readmore" href="#"> Lanjut</a></p>
			</div>
		</div>
	</div>
	</a>
</div>
<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
	<div class="pull-right">
		<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="18"></a>
	</div>
	<div>
		<a href="#" class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" class="mr-5" width="27"></a>
		<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"></a>
	</div>
</div>
</div>
<?php else: ?>
<a href="">
<div class="card mb-15" style="padding: 0 00px;">
<div class="card-body p-0 p-20">
	<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
		<div class="media">
			<img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
				echo base_url('public/img/profile/blank-photo.jpg');
			}else{
				echo $s_book['author_avatar']; } ?>" width="70" height="70" alt="Generic placeholder image">
				<div class="media-body mt-5">
					<h5 class="card-title nametitle2"><a href="<?php echo site_url('profile/'.$s_book['author_id'].''); ?>"><?php
					echo $s_book['author_name']; ?></a></h5>
					<p class="text-muted" style="margin-top:-10px;"><small><span>Jakarta, Indonesia</span>
						<span class="ml-10"><?php echo $s_book['publish_date']; ?></span></small></p>
					</div>
				</div>
			</div>
			<a href="<?php echo site_url(); ?>book/<?php echo $s_book['book_id']; ?> - <?php echo url_title($s_book['title_book'], 'dash', true); ?>"> 
			<div class="row" style="padding: 0px 10px 0px 10px;">
				<div class="media">
					<img alt="<?php
					echo $s_book['title_book']; ?>" src="<?php
					echo $s_book['image_url']; ?>" style="position: relative; width: 100%;height: 150px; -webkit-filter: blur(5px);">
					<img alt="<?php
					echo $s_book['title_book']; ?>" src="<?php
					echo $s_book['image_url']; ?>" style="position: absolute;height: 150px;margin-left: auto;margin-right: auto;left: 0;right: 0;">
				</div>
				<h5 style="padding-top:50px; font-weight: 500;"><b><a href="<?php echo site_url(); ?>book/<?php echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>"><?php
				echo $s_book['title_book']; ?></a></b></h5>
				<div style="margin-top:10px;">
					<a href="#" class="mr-10">
						<span style="font-size:12px;border: 1px #7554bd solid;border-radius: 25px;padding: 3px 10px;color: #7554bd;">FIKSI</span>
					</a> 
					<span class="mr-10"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg">  <?php echo $s_book['view_count']; ?></span> 
					<span>
						<img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php echo $s_book['share_count']; ?>
					</span>
					<a href="<?php echo site_url(); ?>book/<?php
																echo $s_book['book_id']; ?>
																-<?php echo url_title($s_book['title_book'], 'dash', true); ?>" style="background: red;"> 
							<p style="font-size:16px; font-family: Roboto; margin-top:20px;	"><?php echo substr($s_book['desc'],0,200); ?> ...</p>
					</a>
				</div>
			</div>
			</a>
		</div>
		<div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;">
			<div class="pull-right">
				<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="18"></a>
			</div>
			<div>
				<a href="#" class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" class="mr-5" width="27"></a>
				<a href="#"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"></a>
			</div>
		</div>
	</div>
</a>
<?php endif ?>

<?php 
	if ($s_book['populars']) {
		echo "<label>Buku Populer</label>";
	} 
?>
<?php foreach ($s_book['populars'] as $populars): ?>

	<div id="myWorkContent">
		<div id="insideDiv">
			<!-- <?php print_r($populars); ?> -->
			<?php error_reporting(0); foreach ($populars as $pop): ?>
			<a id="tes" href="assets/work/1.jpg">
				<div class="col-md-12" style="background-color:white;height:127px;width:250px;box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5);">
					<div style="padding-top: 13px;"></div>
					<div style="float:left;background-color:white;width:70px;height: 100px;">

						<img src="<?php if($pop['popular_cover_url'] == NULL){
							echo base_url('public/img/profile/blank-photo.jpg');
						}else{
							echo $pop['popular_cover_url']; } ?>" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5); height:100px;width: 70px;">
						</div>
						<div style="float:left;width:125px;height: auto;margin-left: 20px;">

							<div style="padding-top: 5px;">
								<div id="title_book">
									<b style="font-size: 14px;"><?php echo $pop['popular_book_title']; ?></b>
								</div>
								<br>
								<div id="author_book">
									<p style="font-size: 12px;">By : <?php echo $pop['popular_author_name']; ?></p>
								</div>
							</div>
						</div>

					</div>
				</a>
			<?php endforeach ?>
		</div>
	</div>
<?php endforeach ?>
<?php } ?>
<div class="ajax-load text-center" style="display: none;">
	<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
</div>

<?php }else{
	echo "tak ada";
} ?>
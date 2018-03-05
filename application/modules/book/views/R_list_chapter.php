
<body id="pageContent">
	<input type="hidden" name="book_id" id="book_id" value="<?php echo $book_id; ?>">
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:55px;background: #fcfcff;">
			<div class="container">
				<a href="javascript:void(0);" class="clear-btn backlink" id="backlinks" ><i class="fa fa-arrow-left"></i> </a>
				<form class="form-inline" method="post" action="<?php echo site_url('cover/'.$this->uri->segment(2).'') ?>">
					<button type="submit" class="btn-transparant" id="publish_chapter"><img src="<?php echo base_url() ?>public/img/assets/icon_publish.png" width="25"> <span style="color: #7554bd;font-size: 14px;">Publish</span></button>
				</form>
			</div>
		</nav>
	</div>
	<br>
	<br>
	<br>
	<div class="container mb-80">
		<div class="row p-10">
			<h2><b><?php echo $title_book; ?></b></h2>
			<hr>
			<div class="list-group group-full">
				<?php foreach ($list_chapter['chapter'] as $chapter_list) {
					$array = (array)$chapter_list; ?>
					<div class="list-group-item list-group-item-action flex-column align-items-start bg-transparent listChapt">
						<div class="listOverlay overlayOpt">
							<div class="backdropOverlay">
								<div class="btnPositionList">
									<button type="button" chId="<?php echo $array['chapter_id']; ?>" id="editCh" class="btnSlct editCh">Edit</button>
									<button type="button" chId="<?php echo $array['chapter_id']; ?>" id="delCh" class="btnSlct delCh">Hapus</button></div>
								</div>
							</div>
							<div class="d-flex w-100 justify-content-between">
								<h5 class="mb-1"><b><?php echo $array['chapter_title']; ?></b></h5>
							</div>
							<small><?php echo $array['desc']; ?></small>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<nav class="navbar navbar-expand-lg fixed-bottom" style="height:60px;">
				<div class="container">
					<form style="width: 100%;" method="post" action="<?php echo site_url('chapter') ?>">
						<input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
						<button class="btn-publish" type="submit">Tambah Cerita Baru</button> 
					</form>
				</div>
			</nav>
			<?php if (isset($js)): ?>
				<?php echo get_js($js) ?>
			<?php endif ?>

		</body>
		</html>
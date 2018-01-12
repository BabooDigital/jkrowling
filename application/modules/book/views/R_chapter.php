<style type="text/css">
.fr-box {
	width: 100% !important;
}
</style>
<body id="pageContent">
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
			<div class="container">
				<!-- <form method="post" action="<?php echo site_url('savechapter') ?>" class="navbar-brande"> -->
					<a href="javascript:void(0);" class="clear-btn backlink" ><i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> </a>
				<!-- </form> -->
				<!-- <form class="form-inline" method="post" action="<?php echo site_url('cover') ?>"> -->
					<input type="hidden" name="book_id" id="book_id" value="<?php echo $book_id; ?>">
					<!-- <input type="hidden" name="chapter_title" id="chapter_title"> -->
					<!-- <input type="text" name="paragraph" id="paragraph"> -->
					<!-- <textarea style="display: none;" name="paragraph" id="paragraph"></textarea> -->
					<button class="btn-transparant" id="publish_chapter"><span>Publish</span> &nbsp;&nbsp;<img src="<?php echo base_url() ?>public/img/icon-nav/publish.png" width="30" height="30"></button>
					<!-- </form> -->
				</div>
			</nav>
		</div>
		<br>
		<br>
		<div class="container">
			<div class="row form_book">
				<div class="input-group paddingbook">
					<input type="text" name="chapter_title" id="chapter_title_out" class="title_book_form" style="text-align: left;" placeholder="Judul Cerita" value="">
					<div class="loader" style="display: none;"></div>
				</div>
				<div class="input-group paddingparagraph">
					<textarea id="paragraph_book" class="paragraph" name="paragraph_book"></textarea>
				</div>
			</div>
		</div>
		<nav class=" navbar-light fixed-bottom p-20" style="background: #f5f8fa;">
			<a class="navbar-brand" href="#">
				<img src="<?php echo base_url(); ?>public/img/icon-nav/publish.png" width="30" height="30" class="d-inline-block align-top" alt="">
				Simpan ke Draft
			</a>
			<div>
				<button type="submit" class="floating-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></button>
			</div>
		</nav>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>

	</body>
	</html>
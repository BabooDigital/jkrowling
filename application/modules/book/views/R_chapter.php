<style type="text/css">
.fr-box {
	width: 100% !important;
}
</style>
<body id="pageContent">
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:55px;background: #fcfcff;">
			<div class="container">
				<a href="javascript:void(0);" class="clear-btn backlink" id="backlinks" ><i class="fa fa-arrow-left"></i> </a>
				<input type="hidden" name="book_id" id="book_id" value="<?php echo $book_id; ?>">
				<button class="btn-transparant" id="publish_chapter"><img src="<?php echo base_url() ?>public/img/assets/icon_publish.png" width="25"> <span style="color: #7554bd;font-size: 14px;">Publish</span></button>
			</div>
		</nav>
	</div>
	<br>
	<br>
	<div class="container">
		<div class="row p-20">
			<div class="input-group paddingbook">
				<input type="text" name="chapter_title" id="chapter_title_out" class="title_book_form" style="text-align: left;" placeholder="Chapter">
				<div class="loader" style="display: none;"></div>
			</div>
			<div class="input-group paddingparagraph">
				<textarea id="paragraph_book" class="paragraph" name="paragraph_book"></textarea>
			</div>
		</div>
	</div>
	<nav class=" navbar-light fixed-bottom p-20" style="background: #f5f8fa;">
		<button class="navbar-brand btn-transparant" id="saveChapt">
			<img src="<?php echo base_url(); ?>public/img/assets/icon_save.png" width="30" height="30" class="d-inline-block align-top" alt="Save to Draft?">
			Simpan ke Draft
		</button>
		<div>
			<button type="button" id="addSome" class="floating-btn" style="background: #7554bd;"><img src="<?php echo base_url(); ?>public/img/assets/icon_plus.png"></button>
		</div>
	</nav>
	<div id="snackbar">Data chapter ini berhasil tersimpan.</div>

	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>

</body>
</html>
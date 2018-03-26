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
				<input type="hidden" name="book_id" id="book_id" value="<?php $uri = $this->session->userdata('idBook_'); echo  $uri; ?>">
				<button class="btn-transparant" id="publish_chapter"><img src="<?php echo base_url() ?>public/img/assets/icon_publish.png" width="25"> <span style="color: #7554bd;font-size: 14px;">Publish</span></button>
			</div>
		</nav>
	</div>
	<br>
	<br>
	<div class="container">
		<div class="row p-20">
				<input type="hidden" name="chapter_id" id="chapter_id" value="<?php echo $this->uri->segment(2); ?>">
			<div class="input-group paddingbook">
				<input type="text" name="chapter_title" id="chapter_title_out" class="title_book_form" style="text-align: left;" placeholder="Judul Chapter" value="<?php echo $chapter->chapter_title; ?>">
				<div class="loader" style="display: none;"></div>
			</div>
			<div class="input-group paddingparagraph">
				<textarea id="paragraph_book" class="paragraph" name="paragraph_book"><?php echo $chapter->chapter_paragraph; ?></textarea>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg fixed-bottom" style="height:60px;">
				<div class="container">
						<button class="btn-publish" type="button" id="saveEdit">Simpan Perubahan</button> 
				</div>
			</nav>
	<!-- <div id="snackbar">Data chapter ini berhasil tersimpan.</div> -->

	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>
	<script type="text/javascript">
		var chid = '<?php echo $this->uri->segment(2); ?>'
	</script>

</body>
</html>
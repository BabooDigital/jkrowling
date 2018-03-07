
<body id="pageContent">
	<nav class="navbar navbar-expand-lg fixed-top" style="height:60px;background: #fcfcff;">
		<div class="container">
			<form class="navbar-brande">
				<button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> </button>
			</form>
			<form class="form-inline" action="<?php echo site_url('chapter') ?>" method="post">
				<input type="hidden" name="title_book" id="title_book">
				<button class="btn-transparant" type="submit"><img src="<?php echo base_url() ?>public/img/icon-nav/publish.png" width="18" class="mb-1"> &nbsp;<span style="color: #7554bd;">Next</span></button> 
			</form>
		</div>
	</nav>
	<br>
	<br>
	<div class="form_book_title" align="center">
		<h5>Judul</h5>
		<br>
		<textarea type="text" name="title_book_out" id="title_book_out" class="title_book_form autoExpand" data-min-rows='3' placeholder="Judul Buku"> </textarea>
	</div>

	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
	<?php endif ?>
	<script type="text/javascript">
	// Applied globally on all textareas with the "autoExpand" class
	$(document)
	.one('focus.autoExpand', 'textarea.autoExpand', function(){
		var savedValue = this.value;
		this.value = '';
		this.baseScrollHeight = this.scrollHeight;
		this.value = savedValue;
	})
	.on('input.autoExpand', 'textarea.autoExpand', function(){
		var minRows = this.getAttribute('data-min-rows')|0, rows;
		this.rows = minRows;
		rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
		this.rows = minRows + rows;
	});
</script>
</body>
</html>
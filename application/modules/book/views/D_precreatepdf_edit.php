<style>
textarea::-webkit-input-placeholder {
	color: #e5e5e5;
}

textarea:-moz-placeholder { /* Firefox 18- */
	color: #e5e5e5;  
}

textarea::-moz-placeholder {  /* Firefox 19+ */
	color: #e5e5e5;  
}

textarea:-ms-input-placeholder {
	color: #e5e5e5;  
}
.desc::-webkit-input-placeholder {
	color: #e5e5e5;
	font-size: 12pt;
}

.desc:-moz-placeholder { /* Firefox 18- */
	color: #e5e5e5;
	font-size: 12pt;  
}

.desc::-moz-placeholder {  /* Firefox 19+ */
	color: #e5e5e5;
	font-size: 12pt;  
}

.desc:-ms-input-placeholder {
	color: #e5e5e5;
	font-size: 12pt;  
}
</style>
<body id="pageContent" style="background-color: #edf0f3;">
	<nav class="navbar navbar-expand-lg fixed-top" style="height:60px;background: #fff;">
		<div class="container">
			<form class="navbar-brande">
				<button type="button" class="clear-btn" onclick="history.go(-1)" style="cursor: pointer;"><i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> </button>
			</form>
			<center><strong>Upload PDF</strong></center>
			<form class="form-inline">
				<a href="javascript:void(0);" class="btn-transparant" id="post-prepdf" style="color: #7554bd;"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;<span>Lanjut</span></a> 
			</form>
		</div>
	</nav>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="mt-20 pt-15 pl-10">
					<h2 for="title_book_out">Judul Buku</h2>
					<br>
					<textarea type="text" name="title_book_out" id="judul_buku" class="title_book_form text-left" data-min-rows='3' placeholder="Tulis di sini" style="width: 100%"><?php echo $desc['data']['title']; ?></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="mt-10 pt-15 pl-10">
					<h2 for="title_book_out">Deskripsi</h2>
					<br>
					<textarea type="text" name="title_book_out" id="isi_buku" class="title_book_form autoExpand text-left desc" data-min-rows='3' placeholder="Minimal 150 karakter" style="font-size: 12pt !important;width: 100%;"><?php echo $desc['data']['description']; ?></textarea>
				</div>
			</div>
		</div>
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
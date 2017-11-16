
<body id="pageContent">

<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
<div class="container">
	<form class="navbar-brande">
		<i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> 
	</form>

	<form class="form-inline">
		<button class="btn-transparant"><span>Publish</span> &nbsp;&nbsp;<img src="<?php echo base_url() ?>public/img/icon-nav/publish.png" width="30" height="30"></button> 
	</form>
</div>
</nav>
<br>
<br>
<div class="container">
	<div class="row form_book">
		<div class="input-group paddingbook">
			<input type="text" name="title_book" class="title_book_form" placeholder="Judul Buku">
			<div class="loader" style="display: none;"></div>
		</div>
		<div class="input-group">
			<select class="selectbook">
				<option value="">Kategori Buku</option>
				<option value="">Kategori Buku</option>
				<option value="">Kategori Buku</option>
			</select>
			&nbsp;&nbsp;&nbsp;
			<select class="selectbook">
				<option value="">Jenis Buku</option>
				<option value="">Jenis Buku</option>
				<option value="">Jenis Buku</option>
			</select>
		</div>
		<div class="input-group paddingparagraph">
			<textarea id="paragraph_book"></textarea>
		</div>
	</div>
</div>
<footer class="navbar navbar-expand-lg fixed-bottom baboonav" style="height:60px;">
<div class="container">
	<form class="navbar-brande">
		<span>Simpan Ke draft</span> 
	</form>

	<form class="form-inline">
		<div id="floating-btn">
			<a href="<?php echo site_url('create_book') ?>" class="floating-btn">+</a>
		</div>
	</form>
</div>
</footer>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
</body>
</html>
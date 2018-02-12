
<div id="post-<?php echo (int)$id_chapter; ?>" class="mauboleh" style="line-height:30px;">
<?php if ($detail_book['data']['chapter']['chapter_free'] == 'true'): ?>
	<br>
	<br>
	<br>
	<h4 class="dbooktitlebook" > <?php
		if ($id_chapter == null || $id_chapter == '' || $id_chapter == 0) {
			echo "Judul Buku";
			$data = $detail_book['data']['book_info']['title_book'];
		}else{
			echo "Chapter ".$id_chapter;
			$data = $detail_book['data']['book_info']['title_book'];
		}
	?> : <?php echo $data; ?></h4>
	<?php 
	foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
		$data .= $book['paragraph_text'];
	}
		echo $data;
	?>
</div>
<div id="read">
<?php else: ?>
<?php if ($detail_book['data']['book_info']['is_free'] == "false"): ?>
	<div>
	<p class="modallimitbook">Kamu baru saja selesai membaca batas gratis buku ini, untuk membaca bab lainnya silahkan beli buku ini lalu lanjutkan membaca.</p>
</div>
<hr>
<div class="media">
	<img alt="Book Cover" class="mr-3" src="<?php echo base_url(); ?>public/img/book-cover/kite-runner.png" width="150">
	<div class="media-body mt-10">
		<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>book">Story Of Drama</a></h5>
		<div class="mt-20 mb-50">
			<div class="col-md-10">
				<div class="dbooksociallistmodal">
					<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> 290</span></a>
				</div>
				<div class="dbooksociallistmodal">
					<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> 45</span></a>
				</div>
				<div class="dbooksociallistmodal">
					<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="16"> 290</span></a>
				</div>
				<div class="dbooksociallistmodal">
					<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> 8</span></a>
				</div>
				<div class="dbooksociallistmodal">
					<a href="#"><span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_have.svg" width="20"> 8</span></a>
				</div>
			</div>
		</div>
		<div>
			<h3><strong>Rp 45.000</strong></h3>
		</div>
		<div class="mt-40">
			<a class="btnbeliskrg" href="#"><span class="txtbtnbeliskrg">Beli Sekarang</span></a>
		</div>
	</div>
<?php endif ?>
</div>
<?php endif ?>
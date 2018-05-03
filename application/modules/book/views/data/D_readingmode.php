
<div id="post-<?php echo (int)$id_chapter; ?>" class="mauboleh" style="line-height:30px;">
<?php if ($detail_book['data']['chapter']['chapter_free'] == 'true'): ?>
	<br>
	<br>
	<br>
	<h4 class="dbooktitlebook" > <?php
		if ($id_chapter == null || $id_chapter == '' || $id_chapter == 0) {
			$data = $detail_book['data']['book_info']['title_book'];
		}else{
			$data = $detail_book['data']['chapter']['chapter_title'];
		}
	?> <?php echo $data; ?></h4>
	<?php

	$data_book = ''; 
	foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
		$data_book .= "<div id='detailStyle'>".$book['paragraph_text']."</div>";
	}
		echo $data_book;
	?>
</div>
<div id="read">
<?php else: ?>
<?php if ($detail_book['data']['book_info']['is_free'] == false): ?>
	<div>
	<p class="modallimitbook">Kamu baru saja selesai membaca batas gratis buku ini, untuk membaca bab lainnya silahkan beli buku ini lalu lanjutkan membaca.</p>
</div>
<hr>
<div class="media">
	<img alt="Book Cover" class="mr-3" src="<?php echo ($detail_book['data']['book_info']['cover_url'] != 'Kosong') ? ($detail_book['data']['book_info']['cover_url'] != null ? $detail_book['data']['book_info']['cover_url'] : base_url('public/img/profile/blank-photo.jpg')) : base_url('public/img/profile/blank-photo.jpg'); ?>" width="150">
	<div class="media-body mt-10">
		<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>book/<?php
								echo $detail_book['data']['book_info']['book_id']; ?>
								-<?php echo url_title($detail_book['data']['book_info']['title_book'], 'dash', true); ?>"><?php echo $detail_book['data']['book_info']['title_book']; ?></a></h5>
		<div class="mt-20 mb-50">
			<div class="col-md-10">
				<!-- <div class="dbooksociallistmodal">
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
				</div> -->
			</div>
		</div>
		<div>
			<h3><strong>Rp <?php echo number_format($detail_book['data']['book_info']['book_price'],2,",","."); ?></strong></h3>
		</div>
		<div class="mt-40">
			<a class="btnbeliskrg btn-buy" data-toggle="modal" data-target="#buymodal" href="#"><span class="txtbtnbeliskrg">Beli Sekarang</span></a>
		</div>
	</div>
<?php endif ?>
</div>
<?php endif ?>
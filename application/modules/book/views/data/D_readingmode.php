<?php if ((bool) $detail_book['data']['book_info']['is_pdf'] == false) { ?>
	<div id="post-<?php echo (int)$id_chapter; ?>" class="mauboleh text-justify mt-20" style="line-height:30px;">
	<?php }else{ ?>
		<div id="post-<?php echo (int)$id_chapter; ?>" class="mauboleh" style="">
		<?php } ?>
	<?php if ((bool) $detail_book['data']['book_info']['is_pdf'] == true) { ?>
		<div class="loader mx-auto" style="display: none;"></div>
		<div id='pdf-viewer'> </div>
		<?php $usDat = $this->session->userdata('userData'); if ((bool) $detail_book['data']['book_info']['is_bought'] == false && (bool) $detail_book['data']['book_info']['is_free'] == false && $usDat['user_id'] != $detail_book['data']['author']['author_id']) { ?>
			<div class="container">
				<div class="row">
					<div class="col-3"></div>
					<div class="col-6">
						<div style="background:transparent;" class="list-group-item mt-15" id="list_chapters"><a class="" id=""><p>Versi buku full</p><span style="color:#7554bd">Rp <?php echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?></span></a><button style="float:right;margin-top: -15px;" class="btn-buy" data-toggle="modal" data-target="#buymodal">Beli</button></div>
					</div>
					<div class="col-3"></div>
				</div>
			</div>
		<?php } ?>
	<?php }else{ ?>
		<?php if ($detail_book['data']['chapter']['chapter_free'] == 'true'): ?>

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
	<!-- <div id="read"> -->
		<?php else: ?>
			<?php if ($detail_book['data']['book_info']['is_free'] == false): ?>
				<div class="stops" style="display: none;">
				<br>
				<br>
					<div>
						<p class="modallimitbook">Kamu baru saja selesai membaca batas gratis buku ini, untuk membaca bab lainnya silahkan beli buku ini lalu lanjutkan membaca.</p>
					</div>
					<!-- </div> -->
					<hr>
					<div class="media">
						<img alt="Book Cover" class="mr-3" src="<?php echo ($detail_book['data']['book_info']['cover_url'] != 'Kosong') ? ($detail_book['data']['book_info']['cover_url'] != null ? $detail_book['data']['book_info']['cover_url'] : base_url('public/img/profile/blank-photo.jpg')) : base_url('public/img/profile/blank-photo.jpg'); ?>" width="150">
						<div class="media-body mt-10">
							<h5 class="card-title nametitle3"><a href="<?php echo site_url(); ?>book/<?php
							echo $detail_book['data']['book_info']['book_id']; ?>
							-<?php echo url_title($detail_book['data']['book_info']['title_book'], 'dash', true); ?>"><?php echo $detail_book['data']['book_info']['title_book']; ?></a></h5>
							<div class="mt-20 mb-50">
								<div class="col-md-10">
								</div>
							</div>
							<div>
								<h3><strong>Rp <?php echo number_format($detail_book['data']['book_info']['book_price'],2,",","."); ?></strong></h3>
							</div>
							<div class="mt-40">
								<a class="btnbeliskrg btn-buy" data-toggle="modal" data-target="#buymodal" href="#"><span class="txtbtnbeliskrg">Beli Sekarang</span></a>
							</div>
						</div>
					</div>
				</div>
			<?php  endif ?>
			<?php endif ?>
	<?php } ?>
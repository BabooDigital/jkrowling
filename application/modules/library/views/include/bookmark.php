<?php if ($bookmark['code'] == 404): ?>
<div class="col-md-12" align="center">
	<div id="myWorkContent">
		<div class='container first_login mt-30'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'> <img src='<?php echo base_url('') ?>public/img/icon_draft_blank.png' width='190'> </div> <div class='text-center'> <h4><b></b></h4> <p style='font-size: 12pt;'>Yuk cari buku yg kamu suka <br> dan jadikan bookmark koleksi buku kamu</p></div> 
		<a href="<?php echo site_url('timeline') ?>" ><button class="search-now">Cari Sekarang</button></a>
	</div> </div> </div>
	</div>
</div>	
<?php else: ?>
<?php foreach ($bookmark['data'] as $book) { ?>
<div class="col-3">
	<div id="myWorkContent">
		<div id="insideDivTerakhirDilihat">
			<div class="terakhir_dilihat">
				<div class="terakhir_dilihat_sub1a w-100">
					<a href="<?php echo site_url(); ?>book/<?php echo $book['book_id']; ?>-<?php echo url_title($book['title_book'], 'dash', true); ?>">
						<img src="<?php echo $book['cover_url']; ?>" width="130" height="170" class="terakhir_dilihat_imgs">
						<div class="terakhir_dilihat_sub2">
							<div id="title_book">
								<b class="font_title_terakhir_dilihat"><?php echo $book['title_book']; ?></b>
							</div>
							<div id="author_book">
								<p class="terakhir_dilihat_by">by <?php echo $book['author_name']; ?></p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php endif ?>
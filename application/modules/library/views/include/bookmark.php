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
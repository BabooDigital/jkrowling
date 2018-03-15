<?php foreach ($slide['data'] as $key => $slide_show): ?>
	<div class="<?php echo ($key%2==0) ? 'rpinkslidebg' : 'rblueslidebg'; ?>">
		<div style="padding:5%;">
			<div class="media" >
				<img class="d-flex mr-3" src="<?php echo ($slide_show['cover_url'] != null) ? $slide_show['cover_url'] : base_url('public/img/icon-tab/empty-set.png'); ?>" alt="<?php
				echo $slide_show['title_book']; ?>" width="140" height="200" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5);">
				<div class="media-body mt-10 pinkslide" style="padding: 1% 0;text-align: left;">
					<h6 class="mt-0"><b><?php echo substr($slide_show['title_book'],0,7); ?>...</b></h6>
					<p style="font-size:16px;">by <?php echo $slide_show['author_name']; ?></p>
					<p style="font-size:12px;"><?php echo substr($slide_show['desc'],0,40); ?> ..."><?php echo substr($slide_show['desc'],0,40); ?> ...</p>
					<div class="mt-20"><a href="<?php echo site_url(); ?>book/<?php echo $slide_show['book_id']; ?>-<?php echo url_title($slide_show['title_book'], 'dash', true); ?>" class="btnbooreadmr" style="padding: 7px 25px;
					"><span style="">Baca Buku</span></a></div>	
				</div>
			</div>								
		</div>
	</div>
<?php endforeach ?>
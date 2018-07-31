<?php foreach ($slide['data'] as $key => $slide_show): ?>
	<div class="<?php echo ($key%2==0) ? 'rpinkslidebg' : 'rblueslidebg'; ?>">
		<div style="padding:5%;">
			<div class="media" >
				<a href="<?php if ((bool)$slide_show['is_pdf'] == true) { echo site_url('book/'.$slide_show['book_id'].'-'.url_title($slide_show['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('book/'.$slide_show['book_id'].'-'.url_title($slide_show['title_book'], 'dash', true)); } ?>"><img class="d-flex rounded mr-3" src="<?php echo ($slide_show['cover_url'] != null) ? $slide_show['cover_url'] : base_url('public/img/blank_cover.png'); ?>" alt="<?php
				echo $slide_show['title_book']; ?>" width="140" height="200" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5);"></a>
				<div class="media-body mt-10 pinkslide" style="padding: 1% 0;text-align: left;">
					<a href="<?php if ((bool)$slide_show['is_pdf'] == true) { echo site_url('book/'.$slide_show['book_id'].'-'.url_title($slide_show['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('book/'.$slide_show['book_id'].'-'.url_title($slide_show['title_book'], 'dash', true)); } ?>"><h6 class="mt-0"><b><?php echo substr($slide_show['title_book'],0,20); ?></b></h6></a>
					<p style="font-size:16px;">by <a href="javascript:void(0);"><?php echo $slide_show['author_name']; ?></a></p>
					<p style="font-size:12px;height:80px;max-height: 80px;overflow: hidden;font-size: 12px;"><?php echo substr($slide_show['desc'],0,200); ?></p>
					<div class="mt-20"><a href="<?php if ((bool)$slide_show['is_pdf'] == true) { echo site_url('book/'.$slide_show['book_id'].'-'.url_title($slide_show['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('book/'.$slide_show['book_id'].'-'.url_title($slide_show['title_book'], 'dash', true)); } ?>" class="btnbooreadmr" style="padding: 10px 40px;
					"><span style="">Baca Buku</span></a></div>	
				</div>
			</div>								
		</div>
	</div>
<?php endforeach ?>
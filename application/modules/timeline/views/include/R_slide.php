<?php foreach ($slide['data'] as $key => $slide_show): ?>
	<div class="<?php echo ($key%2==0) ? 'rpinkslidebg' : 'rblueslidebg'; ?>">
			<div style="padding:5%;">
				<div class="media">
					<img class="d-flex mr-3" src="<?php echo ($slide_show['popular_cover_url'] != null) ? $slide_show['popular_cover_url'] : base_url('public/img/icon-tab/empty-set.png'); ?>" alt="<?php
					echo $slide_show['title_book']; ?>" width="100" height="150" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5);">
					<div class="media-body pinkslide">
						<h6 class="mt-0" style="height: 20px;overflow: hidden;"><b><?php if(strlen($slide_show['popular_book_title']) > 15){ $str =  substr($slide_show['popular_book_title'], 0, 13).'...'; echo ucfirst(strtolower($str)); }else { echo ucfirst(strtolower($slide_show['popular_book_title'])); }  ?></b></h6>
						<p class="mb-10" style="font-size:14px;">by <?php echo $slide_show['popular_author_name']; ?></p>
						<p style="font-size:12px;height: 80px;overflow: hidden;"><?php echo substr($slide_show['popular_book_desc'], 0, 80).'...'; ?></p>
						<div><a href="<?php echo site_url(); ?>book/<?php echo $slide_show['popular_book_id']; ?>" class="btnbooreadmr"><span style="">Baca Buku</span></a></div>	
					</div>
				</div>								
			</div>
	</div>
<?php endforeach ?>
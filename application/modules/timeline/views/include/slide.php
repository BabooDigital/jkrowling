<div class="slider6" id="slide_show" style="left: 11% !important; height: 500px;">
<?php foreach ($slide['data'] as $key => $slide_show): ?>
		<div class="slide">
			<div class="<?php echo ($key%2==0) ? 'pinkslidebg' : 'blueslidebg'; ?>">
				<div class="media">
					<img alt="<?php
					echo $slide_show['title_book']; ?>" class="d-flex mr-10" src="<?php echo ($slide_show['popular_cover_url'] != null) ? $slide_show['popular_cover_url'] : base_url('public/img/icon-tab/empty-set.png'); ?>" width="160" height="245">
					<div class="media-body mt-10 blueslide" style="padding: 5% 0;">
						<h4 class="mt-0"><b><?php echo $slide_show['popular_book_title']; ?></b></h4>
						<p class="authorslide"></p>
						<p>By : <?php echo $slide_show['popular_author_name']; ?></p>
						<br>
						<p><?php echo substr($slide_show['popular_book_desc'], 0, 110).'...'; ?></p>
						<div class="mt-20"><a href="#" class="btnbooread"><span style="">Baca Buku</span></a></div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>

<div class="rightboo">
	<div class="inrightboo">
		<div class="contenttextslider">
			<div class="sidetextslide">	
				<p style="position: relative; text-align: right; right: 10%;"><span style="font-size: 100%;">Kamu suka nulis cerpen? atau buku?</span> <span class="textinboo">Gabung bersama Baboo dan dapatkan penghasilan dari hobimu</span> <span class="mt-10" style=" font-size: 100%;"><a href="#" style=" color: #fff;">Mulai Gabung <i class="fa fa-arrow-right ml-10"></i></a></span></p>
			</div>
		</div>
	</div><img src="<?php echo base_url(); ?>public/img/assets/back-slide.jpg" style="opacity: 0.1;width: 100%;"></div>
</div>
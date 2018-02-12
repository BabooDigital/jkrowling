<?php foreach ($slide['data'] as $key => $slide_show): ?>
<div class="<?php echo ($key%2==0) ? 'rpinkslidebg' : 'rblueslidebg'; ?>">
	<div style="padding:5%;">
		<div class="media">
			<img class="d-flex mr-3" src="<?php echo ($slide_show['popular_cover_url'] != null) ? $slide_show['popular_cover_url'] : base_url('public/img/icon-tab/empty-set.png'); ?>" alt="<?php
						echo $slide_show['title_book']; ?>" width="100" height="150" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5);">
			<div class="media-body mt-10 pinkslide" style="padding: 1% 0;">
				<h6 class="mt-0"><b><?php echo $slide_show['popular_book_title']; ?></b></h6>
				<p style="font-size:16px;">by Khaled Hosseini</p>
				<p style="font-size:12px;">Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang...</p>
				<div class="mt-20"><a href="#" class="btnbooreadmr"><span style="">Baca Buku</span></a></div>	
			</div>
		</div>								
	</div>
</div>
<?php endforeach ?>


			<!-- <div style="background-color: #7db6d0;">
				<div style="padding:5%;">
					<div class="media">
						<img class="d-flex mr-3" src="https://spark.adobe.com/images/landing/examples/how-to-book-cover.jpg" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5); height:150px;">
						<div class="media-body mt-10 blueslide" style="padding: 5% 0;">
							<h6 class="mt-0"><b>Kite Runner</b></h6>
							<p style="font-size:10px;">by Khaled Hosseini</p>
							<p style="font-size:8px;">Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang...</p>
						</div>
					</div>								
				</div>
			</div>
			<div style="background-color: #edb6c1;">
				<div style="padding:5%;">
					<div class="media">
						<img class="d-flex mr-3" src="https://spark.adobe.com/images/landing/examples/how-to-book-cover.jpg" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5); height:150px;">
						<div class="media-body mt-10 pinkslide" style="padding: 5% 0;">
							<h6 class="mt-0"><b>Kite Runner</b></h6>
							<p style="font-size:10px;">by Khaled Hosseini</p>
							<p style="font-size:8px;">Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang...</p>
						</div>
					</div>								
				</div>
			</div>
			<div style="background-color: #7db6d0;">
				<div style="padding:5%;">
					<div class="media">
						<img class="d-flex mr-3" src="https://spark.adobe.com/images/landing/examples/how-to-book-cover.jpg" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5); height:150px;">
						<div class="media-body mt-10 blueslide" style="padding: 5% 0;">
							<h6 class="mt-0"><b>Kite Runner</b></h6>
							<p style="font-size:10px;">by Khaled Hosseini</p>
							<p style="font-size:8px;">Aku tahu ribuan kalimat kau tulis untuk memberi tanda bahwa kamu selalu sabar menungguku, yang...</p>
						</div>
					</div>								
				</div>
			</div> -->
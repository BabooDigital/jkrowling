<h4 id="<?php echo $id_chapter_asli; ?>" class="book-title chapter" style="font-weight: 600;"> <?php
//	if ($id_chapter == null || $id_chapter == '' || $id_chapter == 0) {
//		$data = $detail_book['data']['book_info']['title_book'];
//	}else{
		$data = $detail_book['data']['chapter']['chapter_title'];
//	}

?> <?php echo $data; ?></h4>
<br>
<div id="parentparaph">
	<?php
	$data_book = '';
foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
	$text = strip_tags($book['paragraph_text']);
	$count = $book['comment_count'];
	if ($count == 0) { $view_count = '+'; }else{ $view_count = $count;}
	$data_book .= "<div id='detailStyle' class='textp parap-desk mb-10'>".$book['paragraph_text']."</div>";
}
	print_r($data_book);
?>
</div>

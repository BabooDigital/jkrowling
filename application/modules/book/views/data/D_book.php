<br>
<h4 id="<?php echo $id_chapter_asli; ?>" class="book-title chapter"> <?php
	if ($id_chapter == null || $id_chapter == '' || $id_chapter == 0) {
		echo "Judul Buku";
	}else{
		echo "Chapter ".$id_chapter;
	}

?> : <?php print_r($detail_book['data']['chapter']['chapter_title']); ?></h4>
<div id="parentparaph">
	<?php 
foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
	$text = strip_tags($book['paragraph_text']);
	$count = $book['comment_count'];
	if ($count == 0) { $view_count = '+'; }else{ $view_count = $count;}
	$data .= "<div style='font-family: cursive;'>".$book['paragraph_text']."</div>";
}
	echo $data;
?>
</div>
<br>
<h4 id="<?php echo $id_chapter_asli; ?>"> <?php
	if ($id_chapter == null || $id_chapter == '' || $id_chapter == 0) {
		echo "Judul Buku";
	}else{
		echo "Chapter ".$id_chapter;
	}

?> : <?php print_r($detail_book['data']['chapter']['chapter_title']); ?></h4>
<div id="parentparaph">
	<?php 
foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
	$data .= $book['paragraph_text'];
}
	echo $data;
?>
</div>
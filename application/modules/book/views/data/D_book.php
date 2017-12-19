<br>
<h2 id="">Chapter <?php echo count($detail_book['data']['chapter']); ?> : <?php print_r($detail_book['data']['chapter']['chapter_title']); ?></h2>
<?php 
foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
	$data .= $book['paragraph_text'];
}
	echo $data;
?>
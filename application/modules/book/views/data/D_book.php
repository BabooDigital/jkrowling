<h2 id="">Chapter : <?php print_r($detail_book['data']['chapter']['chapter_title']); ?></h2>
<?php 
foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
	$data .= $book['paragraph_text'];
}
	echo $data;
?>
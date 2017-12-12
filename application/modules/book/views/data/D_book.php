<?php 
foreach ($detail_book['data']['content'] as $book) {
	$data .= $book['paragraph_text'];
}
	echo $data;
?>
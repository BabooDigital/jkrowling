<br>
<h4 id="<?php echo $id_chapter_asli; ?>" class="book-title"> <?php
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
	$data .= "<div class='mb-20 textp' data-id-p='".$book['paragraph_id']."' data-text='".$text."'>".$book['paragraph_text']."<button type='button' data-p-id='".$book['paragraph_id']."' data-toggle='modal' id='comm_p' data-target='#myModal2' class='btncompar comment-marker on-inline-comments-modal' for='toggle-right'><span class='num-comment'>".$view_count."</span><span  aria-hidden='true' style='font-size:28px;'><img src='".base_url('public/img/assets/icon_comment.svg')."'></span></button></div>";
}
	echo $data;
?>
</div>
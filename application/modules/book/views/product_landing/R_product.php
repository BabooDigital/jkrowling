<?php
echo $this->load->view('navbar/R_navbar');

$data_paragraph = '';
$urlToUser = url_title($author['author_name'], 'dash', TRUE).'-'.$author['author_id'];
$urlToBook = url_title($book['title_book'], 'dash', TRUE).'-'.$book['book_id'];
foreach ($chapter['paragraphs'] as $ch) {
    $text = strip_tags($ch['paragraph_text']);
    $parap = substr($text, 0, 100).' ';
    $data_paragraph .= $parap;
}

if ($book['cover_url'] == null || $book['cover_url'] == "") {
    $cover =  base_url()."public/img/blank_cover.png";
}else{
    $cover =  $book['cover_url'];
}

if ($author['avatar'] == null || $author['avatar'] == "") {
    $avatar =  base_url()."public/img/blank_cover.png";
}else{
    $avatar =  $author['avatar'];
}

if ((bool)$book['is_free'] == true) {
    $d_none = "display:none;";
    $price_txt = 'Gratis';
    $price_before_discount = "";
    $btn_buy_type = "<a href='".$this->baboo_lib->urlToBook($urlToUser, $urlToBook)."/read' class='product-product_buybtn'><img src='".base_url('public/img/assets/product/c-product_readnow.png')."' class='img-fluid w-50 product-product_buybtn_img'></a>";
}else{
    $d_none = "display:block;";
    $price_txt = "Rp. ".$book['book_price'];
    $price_before_discount = "<span class='product-product_price_discount hidden' style=''>".$price_txt."</span>";
    $btn_buy_type = "<a href='#' class='product-product_buybtn'><img src='".base_url('public/img/assets/product/c-product_buynow.png')."' class='img-fluid w-50 product-product_buybtn_img'></a>";
}
?>
<!--<div class="container mt-80 mb-80">-->
<!--    <div class="row">-->
<!--        <div class="col-12">-->
            <div class="product-product_left_container mt-110">
                <img src="<?php echo base_url('public/img/assets/product/bg-product_purple.png'); ?>" class="img-fluid w-100">
                <div class="row product-product_left_row">
                    <div class="col-5">
                        <div class="row">
                            <div class="col-12">
                                <img src="<?php echo $cover; ?>" class="effect-img w-90-product">
                                <div class="row mt-10 text-center mx-auto">
                                    <div class="col-12">
                                        <div class="product-product_icon_img">
                                            <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> <span id="viewcount"><?php echo $book['view_count']; ?></span></span>
                                        </div>
                                        <div class="product-product_icon_img">
                                            <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> <span id="commentcount"><?php echo $book['book_comment_count']; ?></span></span>
                                        </div>
                                        <div class="product-product_icon_img">
                                            <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> <span id="sharecount"><?php echo $book['share_count']; ?></span></span>
                                        </div>
                                    </div>
                                </div>
                                <!--                                <div class="row mt-10">-->
                                <!--                                    <div class="col-12">-->
                                <!--                                        <a href="#" class=""><img src="--><?php //echo base_url('public/img/assets/product/c-product_morebtn.png'); ?><!--" class="img-fluid w-50 product-product_morebtn"></a>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-7 pt-30">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-white" style="max-height: 45px;overflow-y: scroll;"><?php echo $book['title_book']; ?></h1>
<!--                                <div class="">-->
                                    <!--                                    <div class="product-product_rating product-rating float-left">-->
                                    <!--                                        <div class="product-rating product-rating_container">-->
                                    <!--                                            <div class="product-rating__bg">-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                            </div>-->
                                    <!--                                            <div class="product-rating__fg" style="width: 65%;">-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                                <span class="fa fa-star"></span>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <!--                                    <div class="float-left ml-15">-->
                                    <!--                                        <p class="fs-14px" style="color: #b7c3d0;"><span>300</span> Ulasan</p>-->
                                    <!--                                    </div>-->
<!--                                </div>-->
                                <div style="<?php echo $d_none; ?>">
                                    <img src="<?php echo base_url('public/img/assets/product/c-product_discount.png'); ?>" class="img-fluid w-15 product-product_discount" style="">
                                    <p class="product-product_discount_sale"><span class="product-product_discount_num">10%</span> <span class="product-product_discount_txt">DISCOUNT</span></p>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row ml-40">
                            <p class="product-product_price ml-15"> <?php echo $price_before_discount; ?> <span class="product-product_price_primary"><?php echo $price_txt; ?></span></p>
                        </div>
                        <div class="row ml-40">
                            <div style="">
                                <?php echo $btn_buy_type; ?>
                            </div>
                        </div>
                        <div class="row float-right" style="<?php echo $d_none; ?>">
                            <div>
                                <p class="product-product_count_title">Sisa Waktu Diskon</p>
                                <p class="product-product_count_numb">02 : 05</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="product-product_chapter_count text-white"><?php echo $book['chapter_allcount']; ?> Chapter</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="productTab" role="tablist">
                        <!--                        <li class="nav-item">-->
                        <!--                            <a class="nav-links active mr-5" id="book-tab" data-toggle="tab" href="#booktab" role="tab" aria-controls="booktab" aria-selected="true">Buku</a>-->
                        <!--                        </li>-->
                        <li class="nav-item">
                            <a class="nav-links mr-5" id="review-tab" data-toggle="tab" href="#reviewtab" role="tab" aria-controls="reviewtab" aria-selected="false">Komentar</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <!--                        <div class="tab-pane bg-white active" id="booktab" role="tabpanel" aria-labelledby="book-tab">Buku</div>-->
                        <div class="tab-pane bg-white active" id="reviewtab" role="tabpanel" aria-labelledby="review-tab">
                            <div class="pt-15 pb-15 pl-30 pr-30">
                                <ul class="list-unstyled">
                                    <?php if (!empty($comment)){
                                        foreach ($comment as $comm){
                                            $urlToUser = url_title($comm['comment_user_name'], 'dash', true).'-'.$comm['comment_user_id']; ?>
                                            <li class="media mb-10 product-list-ui_item" data-comment="<?php echo $comm['comment_id'];?>">
                                                <!--                                                <div class="product-avatar mr-10">-->
                                                <img src="<?php echo $comm['comment_user_avatar'];?>" alt="<?php echo $comm['comment_user_name'];?>" class="product-avatar__image rounded-circle mr-10" width="36" height="36">
                                                <!--                                                </div>-->
                                                <div class="media-body">
                                                    <div>
                                                        <div class="" style="display: -webkit-box;color: #bbb !important;">
                                                            <!--                                                    <div class="product-product_rating product-rating float-left">-->
                                                            <!--                                                        <div class="product-rating product-rating_container">-->
                                                            <!--                                                            <div class="product-rating__bg">-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                            </div>-->
                                                            <!--                                                            <div class="product-rating__fg" style="width: 65%;">-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                                <span class="fa fa-star"></span>-->
                                                            <!--                                                            </div>-->
                                                            <!--                                                        </div>-->
                                                            <!--                                                    </div>-->
                                                        </div>
                                                        <div class="" style="display: -webkit-box;color: #bbb !important;">
                                                            <span class="d-inline-block">Oleh <a title="" class="product-link-rd d-inline-block" href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>" data-id="<?php echo $comm['comment_user_id'];?>"><?php echo $comm['comment_user_name'];?></a>, </span>
                                                            <span class="d-inline-block"><?php echo $comm['comment_date'];?></span>
                                                        </div>
                                                        <!--                                                <p class="mt-10 font-weight-bold">Review Title</p>-->
                                                    </div>
                                                    <p class="" style="word-break: break-word !important;"><?php echo $comm['comment_text'];?></p>

                                                    <?php if (!empty($comm['comment_reply_data'])){
                                                        foreach ($comm['comment_reply_data'] as $commRep){
                                                            $urlToUser = url_title($commRep['comment_user_name'], 'dash', true).'-'.$commRep['comment_user_id']; ?>
                                                            <div class="data-reply mt-5" data-reply="<?php echo $commRep['comment_id']; ?>">
                                                                <div class="">
                                                                    <img src="<?php echo $commRep['comment_user_avatar']; ?>" width="20" height="20" class="rounded-circle fitcover">
                                                                    <a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>" class="ml-10" style="font-weight: 600;"><?php $name = explode(' ', $commRep['comment_user_name'], 2); echo $name['0']; ?></a>
                                                                    <span class="ml-10 commenttxt"><?php echo $commRep['comment_text']; ?></span>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    } ?>
                                                </div>
                                            </li>
                                        <?php }
                                    }else{
                                        echo "<p>Belum ada komentar.</p>";
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
<script>
    $(function () {

    });
</script>
</body>
</html>

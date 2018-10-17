<?php
echo $this->load->view('navbar/D_navbar');

$usD = $this->session->userdata('userData');

$data_paragraph = '';
if ($detail_book['data']['book_info']['book_type'] == 3){
    echo "<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>";
    $data_paragraph = $detail_book['data']['book_info']['desc'];
    $txt_chp = 'ePUB File';
}elseif ($detail_book['data']['book_info']['book_type'] == 2){
    $data_paragraph = $detail_book['data']['book_info']['desc'];
    $txt_chp = $detail_book['data']['book_info']['chapter_allcount'].' Halaman';
}else {
    foreach ($detail_book['data']['chapter']['paragraphs'] as $ch) {
        $text = strip_tags($ch['paragraph_text']);
        $parap = substr($text, 0, 20).' ';
        $data_paragraph .= $parap;
    }
    $txt_chp = $detail_book['data']['book_info']['chapter_allcount'].' Chapter';
}

if ($this->session->userdata('isLogin') == 200){
    $btn_comment = "<button class='post-comment' type='button' style='background: none;border: none;'><img src='".base_url('public/img/assets/icon_sendcomm.png')."' width='43' height='43'></button>";
    $txt_blank_comm = "Belum ada komentar...";
}else{
    $btn_comment = "<a href='".site_url('login')."' class='ml-10' style='background: none;border: none;'><img src='".base_url('public/img/assets/icon_sendcomm.png')."' width='43' height='43'></a>";
    $txt_blank_comm = "Masuk untuk melihat komentar...";
}

$urlToUser = url_title($detail_book['data']['author']['author_name'], 'dash', TRUE).'-'.$detail_book['data']['author']['author_id'];
$urlToBook = url_title($detail_book['data']['book_info']['title_book'], 'dash', TRUE).'-'.$detail_book['data']['book_info']['book_id'];


if ($detail_book['data']['book_info']['cover_url'] == null || $detail_book['data']['book_info']['cover_url'] == "") {
    $cover =  base_url()."public/img/blank_cover.png";
}else{
    $cover =  $detail_book['data']['book_info']['cover_url'];
}

if ($detail_book['data']['author']['avatar'] == null || $detail_book['data']['author']['avatar'] == "") {
    $avatar =  base_url()."public/img/profile/blank-photo.jpg";
}else{
    $avatar =  $detail_book['data']['author']['avatar'];
}

if ($detail_book['data']['book_info']['status_payment'] == 'pending') {
    $statusp = 'pend';
}else{
    $statusp = 'done';
}

if ((bool)$detail_book['data']['book_info']['is_free'] == true) {
    $d_none = "display:none;";
    $price_txt = 'Gratis';
    $price_before_discount = "";
    $btn_buy_type = "<a href='#booktab' class='c-product_buybtn'><img src='".base_url('public/img/assets/product/c-product_readnow.png')."' class='img-fluid w-50 c-product_buybtn_img'></a>";
}else{
    $d_none = "display:block;";
    $price_txt = "Rp ".number_format($detail_book['data']['book_info']['book_price'],0, ',', '.');
    $price_before_discount = "<span class='c-product_price_discount hidden' style=''>".$price_txt."</span>";
    $btn_buy_type = "<a href='#' class='c-product_buybtn buyfullbook'  stats-book='".$statusp."'><img src='".base_url('public/img/assets/product/c-product_buynow.png')."' class='img-fluid w-50 c-product_buybtn_img'></a>";

    if ($detail_book['data']['author']['author_id'] == $usD['user_id']){
        $btn_buy_type = "<a href='#booktab' class='c-product_buybtn'><img src='".base_url('public/img/assets/product/c-product_readnow.png')."' class='img-fluid w-50 c-product_buybtn_img'></a>";
    }
}

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$shareLinkUrl = 'https://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
?>

<div class="container mt-80 mb-80">
    <input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $detail_book['data']['book_info']['book_id']; ?>">

    <div class="row">
        <nav aria-label="breadcrumb">
            <?php
            $uri2 = $this->uri->segment(2);
            $urii2 = explode("-", $uri2);
            $uriii2 = array_pop($urii2);
            $uriiiii2 = implode(' ', $urii2);

            $uri3 = $this->uri->segment(3);
            $urii3 = explode("-", $uri3);
            $uriii3 = array_pop($urii3);
            $uriiiii3 = implode(' ', $urii3);

            $this->breadcumb_lib->add('Timeline', base_url());
            $this->breadcumb_lib->add('Penulis', base_url('penulis'));
            $this->breadcumb_lib->add(ucwords($uriiiii2), base_url('penulis/'.$uri2));
            $this->breadcumb_lib->add(ucwords($uriiiii3), base_url('penulis/'.$uri2.'/'.$uri3));
            echo $this->breadcumb_lib->render();
            ?>
        </nav>
    </div>

    <div class="row">
        <div class="col-9">
            <div class="c-product_left_container">
                <img src="<?php echo base_url('public/img/assets/product/bg-product_purple.png'); ?>" class="img-fluid w-100">
                <div class="row c-product_left_row">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-12">
                                <img src="<?php echo $cover; ?>" class="effect-img w-90-product cover_image" width="190" height="250">
                                <div class="row mt-10 text-center mx-auto">
                                    <div class="col-12">
                                        <div class="c-product_icon_img">
                                            <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> <span id="viewcount"><?php echo $detail_book['data']['book_info']['view_count']; ?></span></span>
                                        </div>
                                        <div class="c-product_icon_img">
                                            <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> <span id="commentcount"><?php echo $detail_book['data']['book_info']['book_comment_count']; ?></span></span>
                                        </div>
                                        <div class="c-product_icon_img">
                                            <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> <span id="sharecount"><?php echo $detail_book['data']['book_info']['share_count']; ?></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-12">
                                        <p class="c-product_desc"><?php if (!empty($data_paragraph)){ echo $data_paragraph; }else{ echo "Deskripsi buku ini belum dibuat"; } ?></p>
                                    </div>
                                </div>
                                <!--                                <div class="row mt-10">-->
                                <!--                                    <div class="col-12">-->
                                <!--                                        <a href="#" class=""><img src="--><?php //echo base_url('public/img/assets/product/c-product_morebtn.png'); ?><!--" class="img-fluid w-50 c-product_morebtn"></a>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-8 pt-30">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-white book-title_name ml-5" style="font-size: 35px;"><?php echo $detail_book['data']['book_info']['title_book']; ?></h1>
                                <div class="">
                                    <div class="c-product_rating c-rating float-left">
                                        <div class="c-rating c-rating_container">
                                            <div class="c-rating__bg">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <div class="c-rating__fg" style="width: 0%;">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-left ml-15">
                                        <p class="fs-14px" style="color: #b7c3d0;"><span><?php echo $detail_book['data']['book_info']['book_comment_count']; ?></span> Komentar</p>
                                    </div>
                                    <div class="float-right">
                                        <p class="fs-14px" style="color: #b7c3d0;">Rilis pada, <span><?php echo $detail_book['data']['book_info']['publish_date']; ?></span></p>
                                    </div>
                                </div>
                                <!--                                <div style="--><?php //echo $d_none; ?><!--">-->
                                <!--                                    <img src="--><?php //echo base_url('public/img/assets/product/c-product_discount.png'); ?><!--" class="img-fluid w-15 c-product_discount" style="">-->
                                <!--                                    <p class="c-product_discount_sale"><span class="c-product_discount_num">10%</span> <span class="c-product_discount_txt">DISCOUNT</span></p>-->
                                <!--                                </div>-->
                                <hr class="mt-40">
                            </div>
                        </div>
                        <div class="row ml-40">
                            <p class="c-product_price ml-15">
                                <?php //echo $price_before_discount; ?>
                                <span class="c-product_price_primary"><?php echo $price_txt; ?></span></p>
                        </div>
                        <div class="row ml-40">
                            <div style="">
                                <?php echo $btn_buy_type; ?>
                            </div>
                        </div>
                        <!--                        <div class="row float-right" style="--><?php //echo $d_none; ?><!--">-->
                        <!--                            <div>-->
                        <!--                                <p class="c-product_count_title">Sisa Waktu Diskon</p>-->
                        <!--                                <p class="c-product_count_numb">02 : 05</p>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>
                </div>
                <div>
                    <p class="c-product_chapter_count text-white"><?php echo $txt_chp; ?></p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="productTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-links active mr-5" id="book-tab" data-toggle="tab" href="#booktab" role="tab" aria-controls="booktab" aria-selected="true">Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-links mr-5" id="review-tab" data-toggle="tab" href="#reviewtab" role="tab" aria-controls="reviewtab" aria-selected="false">(<?php echo $detail_book['data']['book_info']['book_comment_count']; ?>) Komentar</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane bg-white active" id="booktab" role="tabpanel" aria-labelledby="book-tab">

                            <div class="container">
                                <div class="row p-10">

                                    <?php if ($detail_book['data']['book_info']['book_type'] == 1){
                                        $this->load->view('D_book_write', $detail_book);
                                    }else if ($detail_book['data']['book_info']['book_type'] == 2){
                                        $this->load->view('D_book_pdf', $detail_book);
                                    }else if ($detail_book['data']['book_info']['book_type'] == 3){
                                        $this->load->view('D_book_epub', $detail_book);
                                    } ?>

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane bg-white" id="reviewtab" role="tabpanel" aria-labelledby="review-tab">
                            <div class="pt-15 pb-15 pl-30 pr-30">
                                <ul class="list-unstyled">
                                    <?php if (!empty($comment)){
                                        foreach ($comment as $comm){
                                            $urlToUser = url_title($comm['comment_user_name'], 'dash', true).'-'.$comm['comment_user_id']; ?>
                                            <li class="media mb-10 c-list-ui_item" data-comment="<?php echo $comm['comment_id'];?>">
                                                <!--                                                <div class="c-avatar mr-10">-->
                                                <img src="<?php echo $comm['comment_user_avatar'];?>" alt="<?php echo $comm['comment_user_name'];?>" class="c-avatar__image rounded-circle mr-10" width="36" height="36">
                                                <!--                                                </div>-->
                                                <div class="media-body">
                                                    <div>
                                                        <div class="" style="display: -webkit-box;color: #bbb !important;">
                                                            <div class="c-product_rating c-rating float-left">
                                                                <div class="c-rating c-rating_container">
                                                                    <div class="c-rating__bg">
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    </div>
                                                                    <div class="c-rating__fg" style="width: 0%;">
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="" style="display: -webkit-box;color: #bbb !important;">
                                                            <span class="d-inline-block">Oleh <a title="" class="c-link-rd d-inline-block" href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>" data-id="<?php echo $comm['comment_user_id'];?>"><?php echo $comm['comment_user_name'];?></a>, </span>
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
                                        echo "<p>".$txt_blank_comm."</p>";
                                    } ?>
                                </ul>
                                <textarea class="frmcomment commentform mention" id="comments" placeholder="Tulis komentarmu disini..." type="text" style="width:100%;height: 45px;"></textarea>
                                <div id="btn-com">
                                    <?php echo $btn_comment; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <p class="h2 mt-15 c-txt_headside">Penulis</p>
            <div class="row mb-15 mt-15">
                <div class="media">
                    <div class="c-avatar c-avatar_author_detail mr-10">
                        <img src="<?php echo $avatar; ?>" alt="<?php echo $detail_book['data']['author']['author_name']; ?>" class="c-avatar__image rounded-circle" width="50" height="50">
                    </div>
                    <div class="media-body">
                        <a href="<?php echo $this->baboo_lib->urlToBook($urlToUser); ?>">
                            <p class="h6 mt-10 font-weight-bold mt-0 author_name"><?php echo $detail_book['data']['author']['author_name']; ?></p>
                        </a>
                        <div>
                            <?php if ($usD['user_id'] == $detail_book['data']['author']['author_id']) { ?>
                                <div></div>
                            <?php }else{ ?>
                                <a href="javascript:void(0)" data-follow="<?php echo $detail_book['data']['author']['author_id']; ?>" class="btn-no-fill ml-20 <?php if ((bool)$detail_book['data']['author']['isFollow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow"><?php if ($detail_book['data']['author']['isFollow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-15 mt-15">
                <div class="col-12">
                    <span class="text-muted d-block w-100">Share</span>
                    <div class="d-block w-100">
                        <ul class="p-0" style="margin: 0px 0px 18px 0px;">
                            <li style="margin: 0px 6px 0px 0px;width: 42px;display: inline-block;padding: 0;">
                                <a href="#" class="c-btn share-fb c-btn--tiny d-block w-100"><i class="fa fa-facebook-f c-btn_socmed_fb"></i></a>
                            </li>
                            <li style="margin: 0px 6px 0px 0px;width: 42px;display: inline-block;padding: 0;">
                                <a href="https://twitter.com/home?status=<?php echo $shareLinkUrl; ?>" class="c-btn c-btn--tiny d-block w-100"><i class="fa fa-twitter c-btn_socmed_twit"></i></a>
                            </li>
                            <li style="margin: 0px 6px 0px 0px;width: 42px;display: inline-block;padding: 0;">
                                <a href="https://plus.google.com/share?url=<?php echo $shareLinkUrl; ?>" class="c-btn c-btn--tiny d-block w-100"><i class="fa fa-google-plus-official c-btn_socmed_gplus"></i></a>
                            </li>
                            <li style="margin: 0px 6px 0px 0px;width: 42px;display: inline-block;padding: 0;">
                                <a href="https://pinterest.com/pin/create/button/?url=<?php echo $shareLinkUrl; ?>&media=<?php echo $cover; ?>&description=By : <?php echo $detail_book['data']['author']['author_name']; ?>" class="c-btn c-btn--tiny d-block w-100"><i class="fa fa-pinterest-square c-btn_socmed_pinterest"></i></a>
                            </li>
                            <li style="margin: 0px 6px 0px 0px;width: 42px;display: inline-block;padding: 0;">
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $shareLinkUrl; ?>&title=<?php echo $detail_book['data']['book_info']['title_book']; ?>&summary=By%20%3A%20<?php echo $detail_book['data']['author']['author_name']; ?>&source=baboo.id" class="c-btn c-btn--tiny d-block w-100"><i class="fa fa-linkedin-square c-btn_socmed_linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="stickymenu">
                <div class="row mb-15 mt-15">
                    <div class="col-12">
                        <div class="side-card w-100">
                            <div class="card-header">
                                Penulis minggu ini
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush" id="author_this_week">
                                    <?php if (!empty($best_writter)){
                                        foreach ($best_writter as $writer){
                                            $urlToUser = url_title($writer['author_name'], 'dash', true).'-'.$writer['author_id'];
                                            if ($writer['avatar'] == "" || $writer == null){
                                                $prof_pict =  base_url().'public/img/profile/blank-photo.jpg';
                                            }else{
                                                $prof_pict = $writer['avatar'];
                                            }
//                                        if ($writer['isFollow'] == false && $writer['author_id'] != $usD['user_id']) {
//                                            $follow = "<a href='javascript:void(0);' data-follow='".$writer['author_id']."' class='addbutton followprofile follow-u'><img src='".base_url('public/img/assets/icon_plus_purple.svg')."' width='20' class='mt-img'></a>";
//                                        }else{
//                                            $follow = "";
//                                        } ?>
                                            <li class="media baboocontent">
                                                <a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"><img class="d-flex mr-3 rounded-circle" src="<?php echo $prof_pict; ?>" width="50" height="50"></a>
                                                <div class="media-body mt-7">
                                                    <a class="" href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>">
                                                        <span class="h5 mt-5 mb-1 nametitle"><?php echo $writer['author_name']; ?></span>
                                                    </a>
                                                    <!--                                                <div class="pull-right baboocolor">--><?php //echo $follow; ?><!--</div>-->
                                                </div>
                                            </li>
                                        <?php }
                                    }else{

                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-15 mt-15">
                    <div class="col-12">
                        <div class="side-card w-100">
                            <div class="card-header">
                                Buku Populer
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush" id="best_book">
                                    <?php if (!empty($best_book)){
                                        foreach ($best_book as $_book){
                                            $urlToUserPop = url_title($_book['popular_author_name'], 'dash', true).'-'.$_book['popular_author_id'];
                                            $urlToBookPop = url_title($_book['popular_book_title'], 'dash', true).'-'.$_book['popular_book_id'];
                                            if ($_book['popular_cover_url'] == null || $_book['popular_cover_url'] == ""){
                                                $cover =  base_url()."public/img/blank_cover.png";
                                            }else{
                                                $cover =  $_book['popular_cover_url'];
                                            }
                                            ?>
                                            <li class="list-group-item">
                                                <div class="media">
                                                    <div class="media-left mr-10">
                                                        <a href="<?php echo $this->baboo_lib->urlToBook($urlToUserPop,$urlToBookPop); ?>"><img class="media-object rounded" src="<?php echo $cover; ?>" onerror="this.onerror=null;this.src='<?php echo base_url("public/img/blank_cover.png"); ?>';" width="60" height="80"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div>
                                                            <p class="media-heading bold mt-10">
                                                                <a href="<?php echo $this->baboo_lib->urlToBook($urlToUserPop,$urlToBookPop); ?>"><?php echo $_book['popular_book_title']; ?></a>
                                                            </p>
                                                            <p style="font-size: 10pt;">by <a class="profile" href="<?php echo $this->baboo_lib->urlToUser($urlToUserPop); ?>"><?php echo $_book['popular_author_name']; ?></a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="buymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php $this->load->view('data/D_paybook'); ?>
</div>
</div>
<!-- modal -->
<?php if ($this->session->flashdata('popup_status_payment')): ?>
    <div class="modal fade" id="notifpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php $this->load->view('data/D_notifpayment'); ?>
    </div>
<?php endif ?>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
<?php
// JS BODY
if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
<script type="text/javascript">
    var segment = '<?php echo $this->uri->segment(3); ?>';
    var count_data = '<?php echo $detailChapter; ?>';
    var userdata = '<?php echo $usD['user_id']; ?>';
    var userbook = '<?php echo $detail_book['data']['author']['author_id']; ?>';
    var full_url = '<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>';
    <?php if ($detail_book['data']['book_info']['book_type'] != 1) { ?>
    var desc = $('.desc_pdf').text();
    <?php }else{ ?>
    var desc = "<?php foreach ($detail_book['data']['chapter']['paragraphs'] as $b) {$text = strip_tags($b['paragraph_text']); $datas .= "<div  class='mb-15 textp' id='detailStyle' data-id-p='".$b['paragraph_id']."'>".ucfirst($b['paragraph_text'])."</div>"; } $st1 = strip_tags($datas); $st2 = str_replace('"', '', $st1); if (strlen($st2) > 200) echo $st2 = substr($st2, 0, 200) . '...'; ?>";
    <?php } ?>
</script>
<script src='https://podio.github.io/jquery-mentions-input/lib/jquery.events.input.js' type='text/javascript'></script>
<script src='https://podio.github.io/jquery-mentions-input/lib/jquery.elastic.js' type='text/javascript'></script>
<?php if ($detail_book['data']['book_info']['book_type'] == 2) { ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.worker.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script>
    <script>getBooks();
        window.onload = function() {document.addEventListener("contextmenu", function(e){e.preventDefault(); }, false); document.addEventListener("keydown", function(e) {if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {disabledEvent(e); } if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {disabledEvent(e); } if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {disabledEvent(e); } if (e.ctrlKey && e.keyCode == 85) {disabledEvent(e); } if (event.keyCode == 123) {disabledEvent(e); } if (e.ctrlKey && e.keyCode == 65) {disabledEvent(e); } if (e.ctrlKey && e.keyCode == 67) {disabledEvent(e); } if (e.ctrlKey) {disabledEvent(e); } }, false); function disabledEvent(e){if (e.stopPropagation){e.stopPropagation(); } else if (window.event){window.event.cancelBubble = true; } e.preventDefault(); return false; } }; </script>
<?php }else if ($detail_book['data']['book_info']['book_type'] == 3){ ?>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/polyfills/babel-polyfill.min.js'); ?>";></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/polyfills/fetch.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/polyfills/pep.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/libs/sanitize-html.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/libs/jszip.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/libs/epub.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/epub_detail_book.js'); ?>"></script>
    <script>
        detailEPUB();
    </script>
<?php }else {}?>
</body>
</html>

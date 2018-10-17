<style>
    /* ----- MODAL STYLE ----- */
    .modal-content {
        border-radius: 0;
        border: none;
        min-height: 100vh;
        background: #f5f8fa;
    }

    .modal-header {
        border-bottom: none;
        background-color: #f5f8fa;
    }

    .closes {
        background: none;
        font-size: 2rem;
        line-height: 1;
        opacity: .5;
        border: none;
        position: absolute;
        right: 10px;
    }
    .list-group-item.disabled, .list-group-item:disabled {
        background: none;
    }
    .right-posi {
        right: 10px !important;
    }
    .show {
        display: inline;
    }
    .textp > p {
        text-indent: 10%;
    }
    .modal-backdrop ~ .modal-backdrop
    {
        z-index : 1051 ;
    }
    .modal-backdrop ~ .modal-backdrop ~ .modal-backdrop
    {
        z-index : 1052 ;
    }
    .modal-backdrop ~ .modal-backdrop ~ .modal-backdrop ~ .modal-backdrop
    {
        z-index : 1053 ;
    }
</style>
<?php
echo $this->load->view('navbar/R_navbar');

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
        $parap = substr($text, 0, 100).' ';
        $data_paragraph .= $parap;
    }
    $txt_chp = $detail_book['data']['book_info']['chapter_allcount'].' Chapter';
}

if ($this->session->userdata('isLogin') == 200){
    $container_mt = "<div class='mt-120 mb-80'>";
    $btn_comment = "<button class='post-comment' type='button' style='background: none;border: none;'><img src='".base_url('public/img/assets/icon_sendcomm.png')."' width='43' height='43'></button>";
    $txt_blank_comm = "Belum ada komentar...";
}else{
    $container_mt = "<div class='mt-50 mb-70'>";
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
    $avatar =  base_url()."public/img/blank_cover.png";
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
    $btn_buy_type = "<a href='".$this->baboo_lib->urlToBook($urlToUser, $urlToBook)."?action=read' class='product-product_buybtn'><img src='".base_url('public/img/assets/product/c-product_readnow.png')."' class='img-fluid w-75 product-product_buybtn_img'></a>";
}else{
    $d_none = "display:block;";
    $price_txt = "Rp ".number_format($detail_book['data']['book_info']['book_price'],0, ',', '.');
    $price_before_discount = "<span class='product-product_price_discount hidden' style=''>".$price_txt."</span>";
    $btn_buy_type = "<a href='#' class='product-product_buybtn buyfullbook' stats-book='".$statusp."'><img src='".base_url('public/img/assets/product/c-product_buynow.png')."' class='img-fluid w-75 product-product_buybtn_img'></a>";

    if ($detail_book['data']['author']['author_id'] == $usD['user_id']){
        $btn_buy_type = "<a href='".$this->baboo_lib->urlToBook($urlToUser, $urlToBook)."?action=read' class='product-product_buybtn'><img src='".base_url('public/img/assets/product/c-product_readnow.png')."' class='img-fluid w-75 product-product_buybtn_img'></a>";
    }
}

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$shareLinkUrl = 'https://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
?>
<input id="iaidubi" name="iaidubi" type="hidden" value="<?php echo $detail_book['data']['book_info']['book_id']; ?>"> <input id="iaiduui" name="iaiduui" type="hidden" value="<?php $dat = $this->session->userdata('userData'); echo $dat['user_id']; ?>">
<?php echo $container_mt; ?>

<!--    <div class="container-fluid">-->
<!--    <div class="row">-->
<!--        <div class="col-12">-->
<div class="product-product_left_container">
    <img src="<?php echo base_url('public/img/assets/product/bg-product_purple.png'); ?>" class="img-fluid w-100">
    <div class="container-fluid">
        <div class="row product-product_left_row">
            <div class="col-5">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo $cover; ?>" alt="" width="120" height="170" class="effect-img">
                    </div>
                </div>
            </div>
            <div class="col-7 pt-20">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-white product_heading-title"><?php echo $detail_book['data']['book_info']['title_book']; ?></h1>

                        <hr style="border-top: 2px solid #ffffff8f;">
                    </div>
                </div>
                <div class="row ml-10">
                    <div class="" style="position: relative;bottom: 10px;">
                        <div class="product-product_rating product-rating float-left">
                            <div class="product-rating product-rating_container">
                                <div class="product-rating__bg">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="product-rating__fg" style="width: 0%;">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                        </div>
                        <div class="float-left ml-15">
                            <p class="fs-12px" style="color: #b7c3d0;">
                                <span><?php echo $detail_book['data']['book_info']['book_comment_count']; ?></span> Komentar</p>
                        </div>
                    </div>

                    <p class="product-product_price" style="position: relative;bottom: 15px;">
                        <!--                            --><?php //echo $price_before_discount; ?><!-- -->
                        <span class="product-product_price_primary">
                                <?php echo $price_txt; ?>
                            </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <p class="product-product_chapter_count text-white"><?php echo $txt_chp; ?></p>
    </div>
</div>

<!--            <div class="row">-->
<div class="">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div>
                <p class="h4 font-weight-bold">Penulis</p>
                <div class="row mb-15 mt-15">
                    <div class="col-12">
                        <div class="media">
                            <div class="product-avatar product-avatar_author_detail mr-10">
                                <img src="<?php echo $avatar; ?>" alt="<?php echo $detail_book['data']['author']['author_name']; ?>" class="product-avatar__image rounded-circle" width="80" height="80">
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
                </div>
            </div>
        </li>
        <li class="list-group-item">
            <div>
                <p class="h4 font-weight-bold">Deskripsi</p>
                <div>
                    <p class="text-justify"><?php echo $data_paragraph; ?></p>

                    <div class="text-center mt-20">
                        <a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook).'?action=read'; ?>" style="background-color: #f7f3ff;border: solid 1px #7554bd;color: #8264c4;border-radius: 35px;padding: 5px 50px;">Baca Cerita</a>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <div class="product-product_icon_img">
                                    <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="15"> <span id="lovecount"><?php echo $this->baboo_lib->convertToK($detail_book['data']['book_info']['like_count']); ?></span></span>
                                </div>
                                <div class="product-product_icon_img">
                                    <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> <span id="viewcount"><?php echo $this->baboo_lib->convertToK($detail_book['data']['book_info']['view_count']); ?></span></span>
                                </div>
                                <div class="product-product_icon_img">
                                    <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> <span id="commentcount"><?php echo $this->baboo_lib->convertToK($detail_book['data']['book_info']['book_comment_count']); ?></span></span>
                                </div>
                                <div class="product-product_icon_img">
                                    <span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> <span id="sharecount"><?php echo $this->baboo_lib->convertToK($detail_book['data']['book_info']['share_count']); ?></span></span>
                                </div>
                            </div>

                            <div class="d-block w-100 mt-40 text-center">
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

                            <?php if ($detail_book['data']['book_info']['book_type'] == 1 || $detail_book['data']['book_info']['book_type'] == 3){ ?>
                                <div style="text-align: center;border: 1px #dadada57 solid;border-radius: 10px;
">
                                    <a class="" data-toggle="collapse" href="#listChapterProd" role="button" aria-expanded="false" aria-controls="listChapterProd">
                                        <i>Daftar Chapter</i>
                                    </a>
                                    <div class="collapse" id="listChapterProd">
                                        <div class="card card-body">
                                            <ol>
                                                <?php foreach($chapt_data as $ch){ ?>
                                                    <li><h2 class="h5"><?php echo $ch['chapter_title']; ?></h2></li>
                                                <?php } ?>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{} ?>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

<div class="bg-white mt-15 pt-10 pb-10 pr-15 pl-15">
    <p class="h4 font-weight-bold mb-10">Buku Populer</p>
    <div class="product-scrolling_wrapper">
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
                <div class="product-scrolling_card">
                    <a id="card_popular_book" href="<?php echo $this->baboo_lib->urlToBook($urlToUserPop,$urlToBookPop); ?>">
                        <div class="col-12" style="height:auto;">
                            <div>
                                <img src="<?php echo $cover; ?>" width="150" height="190" class="rounded" style="box-shadow: 0px 0px 10px rgba(76, 76, 76, 0.3);">
                            </div>
                            <div class="mt-10">
                                <div id="title_book">
                                    <p style="font-size: 13px;font-weight: bold;"><?php echo $_book['popular_book_title']; ?></p>
                                </div>
                                <div id="author_book">
                                    <p style="font-size: 12px;">
                                        <!--                                            <img src="--><?php //echo $_book['popular_book_cover']; ?><!--" width="20" height="20" class="rounded-circle mr-5">-->
                                        <?php echo $_book['popular_author_name']; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php }
        } ?>
    </div>
</div>

<div class="bg-white mt-15 pt-10 pb-10 pr-15 pl-15">
    <p class="h4 font-weight-bold mb-10">Penulis Populer</p>
    <div class="product-scrolling_wrapper">
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
                <div class="product-scrolling_card pl-5 pr-5">
                    <div class="card pt-15 pb-15 pr-20 pl-20" style="border: solid 1px #e8ebec;border-radius: 10px !important;">
                        <div class="text-center">
                            <img class="rounded-circle" height="50" src="<?php echo $prof_pict; ?>" alt="<?php echo $writer['author_name']; ?>" style="object-fit:cover;" width="50">
                            <p class="nametitled"><a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"><?php echo $writer['author_name']; ?></a></p>
                        </div>
                        <div class="row">
                            <!--                                <div class="col-6 text-center rborder pl-5 pr-5">-->
                            <!--                                    <p style="display: inline-flex;"><img src="--><?php //echo base_url('public/img/icon-tab/book.svg'); ?><!--" width="25"> <span style="font-weight: bold;">21</span></p>-->
                            <!--                                    <p>Buku</p>-->
                            <!--                                </div>-->
                            <div class="col-12 text-center pl-5 pr-5">
                                <p style="display: inline-flex;"><img src="<?php echo base_url('public/img/icon-tab/followers.svg'); ?>" width="25"> <span style="font-weight: bold;"><?php echo $this->baboo_lib->convertToK($writer['followers']); ?></span></p>
                                <p>Teman</p>
                            </div>
                        </div>
                        <!--                            <div class="row mt-10">-->
                        <!--                                <div class="col-12 text-center" style="height:30px;">-->
                        <!--                                    <button type="button" class="btn-follow follow-u" data-follow="--><?php //echo $writer['author_id']; ?><!--"><img src="public/img/icon-tab/add_follow.svg" width="25"> <span class="txtfollow">Ikuti</span></button>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                    </div>
                </div>
            <?php }
        }else{

        } ?>
    </div>
</div>

<div class="bg-white mt-15 pt-10 pb-10 pr-15 pl-15">
    <p class="h4 font-weight-bold"><?php echo $detail_book['data']['book_info']['book_comment_count']; ?> Komentar</p>
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
    <div id="btn-com"><button class="Rpost-comment" type="button" style="background: none;border: none;"><img src="<?php echo base_url('public/img/assets/icon_sendcomm.png'); ?>" width="43" height="43"></button></div>
</div>

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

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<nav class="navbar fixed-bottom navbar-light bg-transparent">
    <?php echo $btn_buy_type; ?>
</nav>
</div>

<?php if ($this->session->flashdata('popup_status_payment')): ?>
    <div class="modal fade" id="notifpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php $this->load->view('include/modal_pending'); ?>
    </div>
<?php endif ?>

<?php $this->load->view('include/modal_checkout', $detail_book); ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
<script src='https://podio.github.io/jquery-mentions-input/lib/jquery.events.input.js' type='text/javascript'></script>
<script src='https://podio.github.io/jquery-mentions-input/lib/jquery.elastic.js' type='text/javascript'></script>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if ((bool)$detail_book['data']['book_info']['is_free'] == false) { ?>
        $("#notifpayment").modal('show');
        buyBook();
        <?php } ?>
        var getHashDaft = window.location.hash;
        if (getHashDaft != "" && getHashDaft == "#buynow") {
            $('.buyfullbook').click();
        }
    });

    var segment = '<?php echo $this->uri->segment(3); ?>';
    var userdata = '<?php $usDat = $this->session->userdata('userData'); echo $usDat['user_id']; ?>';
    var userbook = '<?php echo $detail_book['data']['author']['author_id']; ?>';
    var author = '<?php echo $detail_book['data']['author']['author_name']; ?>';
    <?php if ($detail_book['data']['book_info']['book_type'] != 1) { ?>
    var desc = $('.desc_pdf').text();
    <?php }else{ ?>
    var desc = "<?php $st1 = strip_tags($datas); $st2 = str_replace('"', '', $st1); if (strlen($st2) > 200) echo $st2 = substr($st2, 0, 200) . '...';  ?>";
    <?php } ?>


    <?php if (empty($this->uri->segment(5))) {
        echo "var link_url = '".BASE_URL_WEB."penulis/".$this->uri->segment(2)."/".$this->uri->segment(3)."';";
    }else{
        echo "var link_url = '".BASE_URL_WEB."penulis/".$this->uri->segment(2)."/".$this->uri->segment(3)."/chapter/".$cid."';";
    } ?>
    var chapter_title = '<?php echo $detail_book['data']['chapter']['chapter_title']; ?>';
</script>
</body>
</html>

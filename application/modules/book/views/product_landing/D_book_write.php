<?php
if($detail_book['data']['book_info']['is_like'] == false){
    $img_love = base_url('public/img/assets/icon_love.svg');
    $txt_love = "Suka";
    $cls_love = "like";
}else{
    $img_love = base_url('public/img/assets/love_active.svg');
    $txt_love = "Disukai";
    $cls_love = "unlike";
}
?>

<div class="col-4">
    <div class="stickymenu">
        <div class="subchapter mb-10">
            <a onclick="showLoading()" href="<?php echo site_url('penulis/'.url_title($detail_book['data']['author']['author_name'], 'dash', true).'-'.$detail_book['data']['author']['author_id'].'/'.url_title($detail_book['data']['book_info']['title_book'], 'dash', true).'-'.$detail_book['data']['book_info']['book_id']); ?>/reading-mode">
                <div class="p-5 text-center">
                    <img src="<?php echo base_url(); ?>public/img/assets/read-mode.svg" width="45">
                    <p class="bold11px">Mode Baca</p>
                </div>
                <div class="p-5 text-center">
                    <a data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo" class="fs-14px <?php $cls_love; ?>">
                        <img src="<?php echo $img_love; ?>" class="loveicon" width="40">
                        <p class="bold11px"><?php echo $txt_love; ?></p>
                    </a>
                </div>
            </a>
        </div>

        <div class="subchapter">
            <div class="text-center text-muted p-10">
                <b>Bagian Cerita</b>
            </div>
            <ul class="list-group list-group-flush" id="list_chapter">

            </ul>
        </div>
    </div>
</div>

<div class="col-8" id="pdfview">
    <div class="subchapter">
        <div class="card book-content">
            <div class="card-body p-0">

                <div id="appentoContent">
                    <br>
                    <div id="post-data">
                        <?php $this->load->view('data/D_book'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div class="col-4">-->
<!--    <div class="subchapter stickymenu">-->
<!--        -->
<!--            <span style="font-size: 15pt;font-weight: 600;">Deskripsi Cerita</span></div>-->
<!--        <div class="text-justify desc_pdf">--><?php //echo $detail_book['data']['book_info']['desc']; ?><!--</div>-->
<!--        --><?php //$usDat = $this->session->userdata('userData'); if ((bool)$detail_book['data']['book_info']['is_free'] == true || $usDat['user_id'] == $detail_book['data']['author']['author_id']) { ?>
<!--            <div></div>-->
<!--        --><?php //}else{ ?>
<!--            <div style="background:transparent;" class="list-group-item mt-15"><a class="" id=""><p style="font-size:10px;">Versi buku full</p><span style="color:#7554bd">Rp --><?php //echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?><!--</span></a><button style="float:right;margin-top: -15px;cursor: pointer;" class="btn-buy buyfullbook" stats-book='--><?php //echo $statusp; ?><!--'>Beli</button></div>-->
<!--        --><?php //} ?>
<!--    </div>-->
<!--</div>-->

<div class="col-12" id="pdfview">
    <?php
    if ($detail_book['data']['book_info']['status_payment'] == 'pending') {
        $statusp = 'pend';
    }else{
        $statusp = 'done';
    }

    function incrementalHash($len = 5){$charset = "0123456789abcdefghijklmnopqrstuvwxyz"; $base = strlen($charset); $result = ''; $now = explode(' ', microtime())[1]; while ($now >= $base){$i = $now % $base; $result = $charset[$i] . $result; $now /= $base; } return substr($result, -5); }
    $generateDate = $detail_book['data']['book_info']['epoch_time'];
    $datapassword = 'ID#' . $detail_book['data']['book_info']['book_id'] . '#' . $detail_book['data']['book_info']['title_book'] . '#' . strtotime($generateDate);
    $password = hash_hmac('sha512', $datapassword, strtotime($generateDate)).incrementalHash(); ?>
    <div class="mb-10 text-center">
        <div class="spadding" dat-cpss="<?php echo $password; ?>"></div>

        <div class="p-5" style="border: 1px #edf0f3 solid;">
            <div class="card book-content">
                <div class="card-body p-0">
                    <div id='pdf-viewer'> </div>
                    <?php $usDat = $this->session->userdata('userData'); if ((bool) $detail_book['data']['book_info']['is_bought'] == false && (bool) $detail_book['data']['book_info']['is_free'] == false && $usDat['user_id'] != $detail_book['data']['author']['author_id']) { ?>
                        <div style="background:transparent;" class="list-group-item mt-15"><a class="" id=""><p>Versi buku full</p><span style="color:#7554bd">Rp <?php echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?></span></a><button style="float:right;margin-top: -15px;cursor: pointer;" class="btn-buy buyfullbook" stats-book='<?php echo $statusp; ?>'>Beli</button></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

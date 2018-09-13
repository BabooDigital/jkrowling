<div class="modal fade" id="modal-checkout" tabindex="-1" role="dialog" aria-labelledby="modal-checkoutLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="lds-css ng-scope" style="display: none;">
          <div class="lds-eclipse" style="width:100%;height:100%">
            <img class="img-loading" src="<?php echo base_url('public/img/splash_.png'); ?>" width="90">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      <div class="modal-header">
        <button type="button" class="closes" data-dismiss="modal" aria-label="Close" style="height: 45px;left: 0;right: none;">
          <span aria-hidden="true" style="font-size: 20px;"><i class="fa fa-arrow-left"></i></span>
        </button>
      </div>
      <div class="modal-body pl-0 pr-0">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <span style="font-size: 25px;font-weight: 800;">Versi Lengkap</span>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <p class="mt-15" style="line-height: 20px;font-size: 15px;">Kamu baru saja selesai membaca batas gratis buku ini, untuk membaca cerita selanjutnya silahkan lakukan pembelian buku.</p>
            </div>
          </div>
        </div>
        <div class="container-fluid bg-white mt-10">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body pl-0 pr-0">
                  <div class="media">
                    <img class="align-self-start mr-10" id="ccoverb" src="<?php if(!empty($detail_book['data']['book_info']['cover_url'])){echo $detail_book['data']['book_info']['cover_url'];}else{echo base_url('public/img/blank_cover.png');} ?>" width="110" height="170" alt="" style="object-fit: cover;box-shadow: 0px 0px 4px #abababc7;">
                    <div class="media-body">
                      <div>
                        <h3 class="mt-0 font-weight-bold" id="ctitleb" style="font-size: 20px;"><?php echo $detail_book['data']['book_info']['title_book']; ?></h3>
                      </div>
                      <span class="mr-5" style="font-size: 12px;" id="ccatb"><?php echo $detail_book['data']['category']['category_name']; ?></span>
                      <span class="text-muted mr-5" style="font-size: 12px;"><img src="<?php echo base_url('public/img/assets/icon_view.svg'); ?>" width="21"> <span id="cviewb"><?php echo $detail_book['data']['book_info']['view_count']; ?></span></span> <span class="text-muted" style="font-size: 12px;"><img src="<?php echo base_url('public/img/assets/icon_share.svg'); ?>" width="11"> <span id="cshareb"><?php echo $detail_book['data']['book_info']['share_count']; ?></span></span>
                      <br>
                      <div class="media mt-20">
                        <img class="d-flex align-self-start mr-5 rounded-circle" id="cauthorb" src="<?php if(!empty($detail_book['data']['author']['avatar'])){echo $detail_book['data']['author']['avatar'];}else{echo base_url('public/img/profile/blank-photo.jpg');} ?>" width="40" height="40">
                        <div class="media-body">
                          <span class="card-title">by <a href="<?php echo site_url('penulis/'.$detail_book['author']['author_id'].'-'.url_title($detail_book['author']['author_name'], 'dash', true)); ?>" class="author_names menu-page" id="tab-page"> <b id="cauthnameb"><?php echo $detail_book['data']['author']['author_name']; ?></b></a></span>
                          <!-- <p class="text-muted" style="margin-top:-5px;"><small>Jakarta, Indonesia</small></p> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container mt-20">
            <div class="row">
              <div class="col-12">
                <p><span>Harga Buku</span> <span class="float-right" style="font-weight: 600;">Rp. <span id="chargab"><?php echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?></span></span></p>
              <hr>
              </div>
              <div class="col-12">
                <p><span>Total Pembayaran</span> <span class="float-right"  style="font-weight: 900;">Rp. <span id="ctotb"><?php echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?></span></span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-publish" id="buy-btn" b-id="">Lanjutkan Bayar</button>
            <form id="payment-form" method="post" action="<?=site_url()?>pay_book/finish" style="display: none;">
              <input type="hidden" name="result_type" id="result-type" value=""></div>
              <input type="hidden" name="result_data" id="result-data" value=""></div>
            </form>
        </div>
      </div>
    </div>
  </div>

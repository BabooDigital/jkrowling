<footer class="pb-10 baboonav">
    <div class="container">
        <div class="row pb-0 foot-row">
            <div class="col-6">
                <div class="float-left mr-10 mt-5">
                    <a href="<?php echo site_url(''); ?>">
                        <img src="<?php echo base_url('public/img/logo_purple.png'); ?>" width="100">
                    </a>
                </div>
                <div class="mt-15">
                    <p class="foot-fs_17 text-dark">Make Money from Writing.</p>
                </div>
            </div>
            <div class="col-6 text-right">
                <div>
                    <span></span>
                </div>
            </div>
        </div>
        <hr class="mt-10 mb-20">
        <div class="row">
            <div class="col-4">
                <p class="foot-fs_17_grey">Tentang Baboo</p>
                <p class="fs-12px text-justify" style="color: #484848;">Penyedia platform untuk menghubungkan penulis, pembaca, dan penerbit seperti media sosial. Menggunakan aplikasi mobile dan aplikasi desktop web eksklusif kami, kami ingin memanfaatkan pasar sebagai salah satu ekosistem buku terbesar yang menghubungkan penulis, penerbit, dan pembaca.
                </p>


                <div class="d-block mt-15">
                    <span class="foot-fs_17_grey">Ikuti Kami</span>
                    <ul class="p-0 mt-5">
                        <li class="foot-list_li">
                            <a target="_blank" href="https://www.facebook.com/baboodigital/" class="c-btn c-btn--tiny d-block w-100 rounded bg-white"><i class="fa fa-facebook-f c-btn_socmed_fb"></i></a>
                        </li>
                        <li class="foot-list_li">
                            <a target="_blank" href="https://twitter.com/baboo_id" class="c-btn c-btn--tiny d-block w-100 rounded bg-white"><i class="fa fa-twitter c-btn_socmed_twit"></i></a>
                        </li>
                        <li class="foot-list_li">
                            <a target="_blank" href="https://plus.google.com/106535919547018503020" class="c-btn c-btn--tiny d-block w-100 rounded bg-white"><i class="fa fa-google-plus-official c-btn_socmed_gplus"></i></a>
                        </li>
                        <li class="foot-list_li">
                            <a target="_blank" href="https://www.instagram.com/baboo_id/" class="c-btn c-btn--tiny d-block w-100 rounded bg-white"><i class="fa fa-instagram c-btn_socmed_instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-4">
                <p class="foot-fs_17_grey">Bantuan</p>
                <p class="fs-12px text-justify" style="color: #484848;">Hubungi customer service kami jika menemukan kesulitan.</p>
                <div>
                    <ul class="pl-0" style="list-style-type: none;">
                        <li class="mb-5">
                            <i class="fa fa-map-marker text-muted" aria-hidden="true" style="font-size: 20px;"></i>
                            <span class="fs-12px font-weight-bold ml-15">PT. Baboo Digital Indonesia</span>
                            <span class="d-block fs-12px ml-30">Jl. Margonda Raya No. 450, Pondok Cina</span>
                            <span class="d-block fs-12px ml-30">Beji, Kota Depok</span>
                            <span class="d-block fs-12px ml-30">Jawa Barat - 16424</span>
                        </li>
                        <li class="mb-5">
                            <i class="fa fa-phone-square text-muted" aria-hidden="true" style="font-size: 18px;"></i>
                            <a href="tel:+622129120827" class="fs-12px font-weight-bold ml-10" style="border-bottom: dotted 1px #999;">( 021 ) 29120827</a>
                        </li>
                        <li class="mb-5">
                            <i class="fa fa-envelope text-muted" aria-hidden="true"></i>
                            <a href="mailto:cust.service@baboo.id" class="fs-12px font-weight-bold ml-10" style="border-bottom: dotted 1px #999;">cust.service@baboo.id</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-2">
                <p class="foot-fs_17_grey">Pintasan</p>
                <div class="d-block">
                    <ul class="p-0" style="list-style-type: none;">
                        <?php if($this->session->userdata('isLogin') == 200){ ?>
                            <li><a href="<?php echo site_url('library'); ?>">Library</a></li>
                            <li><a href="<?php echo site_url('message'); ?>">Pesan</a></li>
                        <?php }else{ ?>
                            <li><a href="<?php echo site_url('login'); ?>">Masuk</a></li>
                            <li><a href="<?php echo site_url('login#btndaftar'); ?>">Daftar</a></li>
                        <?php } ?>
                        <li><a href="<?php echo site_url('penulis'); ?>">Para Penulis</a></li>
                        <li><a href="<?php echo site_url('tnc'); ?>">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-2">
                <!--                <p class="foot-fs_17_grey">Temukan Aplikasi Baboo</p>-->
                <div class="d-block">
                    <!--                    <ul class="p-0 mt-10">-->
                    <!--                        <li class="foot-list_li_download_app">-->
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=id.android.baboo" class="" title="Saat ini Aplikasi tersedia di Playstore">
                        <img class="rounded w-100" src="<?php echo base_url('public/img/assets/google_play.png'); ?>" alt="Find on Playstore">
                    </a>
                    <!--                        </li>-->
                    <!--                        <li class="foot-list_li_download_app">-->
                    <a href="javascript:void(0);" class="" title="Untuk saat ini Aplikasi Belum tersedia di Apple Store">
                        <img class="rounded mt-10 w-100" src="<?php echo base_url('public/img/assets/app_store.png'); ?>" alt="Find on Appstore">
                    </a>
                    <!--                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
        <hr class="mt-20 mb-10">
        <div class="row">
            <div class="col-12">
                <p class="fs-12px text-muted">© 2018 Hak Cipta Terpelihara PT Baboo Digital Indonesia, Baboo.id.</p>
            </div>
        </div>
    </div>
</footer>

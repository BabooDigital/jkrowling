<style type="text/css">
    .terakhir_dilihat_imgs {
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5);
        width: 100%;
    }

    .modal.right.fade .modal-dialog {
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }

    .modal.right.fade.in .modal-dialog {
        right: 0;
    }
    .modal-backdrop
    {
        opacity:0.5 !important;
    }
    .slick-list {
        border-radius: 10px;
        box-shadow: 0px 0px 4px rgba(55, 111, 111, 0.4);
    }
</style>
<?php $this->load->view('navbar/D_navbar'); ?>
<div class="container">
    <!-- <div class="row"> -->
    <div class="paddingslide">
        <div class="row">
            <div class="col-md-9">
                <h4><b>Terakhir Dibaca</b></h4>
                <div class="your-class">
                    <?php $this->load->view('include/slide'); ?>
                </div>
                <br>
                <h4><b>Koleksi Buku</b></h4>
                <div class="container" align="center">
                    <div class="row">
                        <?php $this->load->view('include/collection'); ?>
                    </div>
                </div>
                <br>
                <h4><b>Bookmark Buku</b></h4>
                <div class="container" align="center">
                    <div class="row">
                        <?php $this->load->view('include/bookmark'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div style="margin-bottom: 30px;"></div>
                <?php if ($transaction['code'] == 404): ?>
                    <div></div>
                <?php else: ?>
                    <div class="mb-15">
                        <a data-toggle="modal" href="#list_trans">
                            <div style="position: relative;text-align: center; color: white;">
                                <img class="img-fluid w-100" src="<?php echo base_url('public/img/bg_peding_desk.svg'); ?>">
                                <div class="lefttop-inf">
                                    <div class="text-left">
                                        <span class="text-white fs18px">Pembelian <span class="badge badge-pill badge-light" style="color: #5d9bb8;"><?php echo count($transaction['data']); ?></span></span>
                                    </div>
                                </div>
                                <div class="leftbot-inf">
                                    <div class="text-left">
                                        <p class="text-white"><span class="pendbook-lib"><?php $end = end($transaction['data']); echo $end['title_book']; ?></span><span class="text-light d-block pendtext-lib">Menunggu Proses Pembayaran . . .</span></p>
                                    </div>
                                </div><span class="badge" style="position: absolute; right: 5%; bottom: 40%;">Details <i class="fa fa-chevron-right"></i></span>
                            </div>
                        </a>
                        <div class="loader mx-auto mt-10" style="display: none;"></div>
                    </div>
                <?php endif ?>
                <div class="card mb-15">
                    <div class="card-header">
                        Buku Populer
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush" id="best_book">
                            <?php foreach ($best['data'] as $best_book):
                                $urlToUser = url_title($best_book['popular_author_name'], 'dash', true).'-'.$best_book['popular_author_id'];
                                $urlToBook = url_title($best_book['popular_book_title'], 'dash', true).'-'.$best_book['popular_book_id']; ?>
                                <?php if ($best_book['popular_cover_url'] == null || $best_book['popular_cover_url'] == "Kosong" || $best_book['popular_cover_url'] == ""): ?>
                                    <?php $cover =  base_url()."public/img/blank_cover.png"; ?>
                                <?php else: ?>
                                    <?php $cover =  $best_book['popular_cover_url']; ?>
                                <?php endif ?>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left mr-10">
                                            <a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>"><img class="media-object rounded" src="<?php echo $cover; ?>" width="60" height="80" onerror="this.onerror=null;this.src='./public/img/blank_cover.png';" ></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading bold mt-10">
                                                <a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>"><?php echo $best_book['popular_book_title'] ?></a>
                                            </h4>
                                            <p style="font-size: 10pt;">by <a class="profile" data-usr-prf="<?php echo $best_book['popular_author_id']; ?>" data-usr-name="<?php echo url_title($best_book['popular_author_name']); ?>" href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"><?php echo $best_book['popular_author_name']; ?></a></p>
                                        </div>
                                    </div>
                                </li>

                            <?php endforeach ?>
                        </ul>
                    </div>
                </div><!-- Buku Populer -->
            </div>
        </div>
    </div>
    <div class="mt-30">
        <div class="col-12 text-center">
            <?php echo $this->load->view('ads/top_mid_ad'); ?>
        </div>
    </div>
</div>
<div class="modal fade" id="list_trans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 105% !important;">
            <div class="">
            </div>
            <div class="modal-header">
                <b>Daftar Pembelian</b>
                <button type="button" data-dismiss="modal" class="close-btn">×</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="col-12 text-justify mb-50" style="color: #000;">
                        <?php foreach ($transaction['data'] as $trans): ?>
                            <div class="listpend" style="border-bottom: .5px #c3c3c3 solid;">
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <div class="media">
                                            <img class="mr-3" src="<?php echo $trans['cover_url'] ?>" width="50" height="70" alt="<?php echo $trans['title_book']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('public/img/blank_cover.png'); ?>';"  style="object-fit: cover;">
                                            <div class="media-body">
                                                <div class="pull-right">
                                                    <div class="dropdown">
                                                        <button class="share-btn dropbtn fs-14px" type="button" id="dropOption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropOption">
                                                            <a class="dropdown-item cancel-trans" href="javascript:void(0);" data-cancel="<?php echo $trans['order_id']; ?>">Batalkan Transaksi</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="mt-0" style="width: 90%;"><?php if(strlen($trans['title_book']) > 55){ $str =  substr($trans['title_book'], 0, 50).'...'; echo ucfirst(strtolower($str)); }else { echo ucfirst(strtolower($trans['title_book'])); }  ?></h5>
                                                <span style="font-size: 15pt;">Rp <?php echo number_format($trans['gross_amount'],0,",","."); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($trans['payment_type'] == "echannel" || $trans['payment_type'] == "bank_transfer"){ ?>
                                    <div class="row">
                                        <div class="col-8">
                                            <p><span>Bank Transfer:</span><span class="d-block font-weight-bold" style="text-transform: uppercase;"><?php echo $trans['bank'] ?> - <?php echo $trans['va_numbers']; ?></span></p>
                                        </div>
                                        <div class="col-4">
                                            <a href="<?php echo $trans['pdf_url']; ?>" target="_blank" class="float-right">Details ></a>
                                        </div>
                                    </div>
                                    <div class="row mb-10">
                                        <div class="col-12">
                                            <span class="text-muted"><?php echo $trans['transaction_desc']; ?></span>
                                        </div>
                                    </div>
                                <?php }else if ($trans['payment_type'] == "credit_card") { ?>
                                    <div class="row">
                                        <div class="col-8">
                                            <p><span>Kartu Kredit:</span><span class="d-block font-weight-bold" style="text-transform: uppercase;"><?php echo $trans['bank'] ?></span></p>
                                        </div>
                                        <div class="col-4">
                                            <a href="#" class="float-right">Details ></a>
                                        </div>
                                    </div>
                                    <div class="row mb-10">
                                        <div class="col-12">
                                            <span class="text-muted"><?php echo $trans['transaction_desc']; ?></span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="detail_transaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 150% !important;right: 25%;">
            <div class="">
            </div>
            <div class="modal-header">
                <b>Menunggu Pembayaran</b>
                <button type="button" data-dismiss="modal" class="close-btn">×</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">

                        <div class="col-12 text-justify mb-50" style="color: #000;">
                            <p>Mohon segera selesaikan pembayaran sebelum batas waktu dengan detail berikut</p>
                            <br>
                            <div class="countdown pdf_url" style="height: 500px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('footer/D_footer'); ?>

<!-- JS -->
<!-- Javascript -->
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/tether.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/umd/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js">
</script>
<script src="https://cdn.rawgit.com/leafo/sticky-kit/v1.1.2/jquery.sticky-kit.js">
</script>
<script src="<?php echo base_url(); ?>public/js/baboo.js">
</script>
<script src="<?php echo base_url(); ?>public/js/slick.js">
</script>
<script type="text/javascript">
    var user = '<?php echo $this->session->userdata('userData')['user_id']; ?>';
</script>
<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
<script type="text/javascript">
    cancel_transaction();
    $('.your-class').slick({
        centerMode: true,
        centerPadding: '200px',
        slidesToShow: 1,
        nextSelector: '.nextbtn',
        prevSelector: '.prevbtn',

        prevArrow:"<i class='fa fa-chevron-left contslider slidebtn prevbtn mt-20 text-dark' style='width:47px;cursor:pointer;'></i>",
        nextArrow:"<i class='fa fa-chevron-right contslider slidebtn nextbtn mt-20 text-dark' style='width:47px;cursor:pointer;'></i>",
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '110px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1,
                }
            }
        ]
    });

    function funcDropdown() {
        document.getElementById("myDropdown").classList.toggle("showss")
    }
</script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $title; ?></title><!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css"
    rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/baboo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>public/css/slick.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>public/css/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css">
    <script>
        var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
    </script>

</head>
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
</style>
<body>
    <?php $this->load->view('navbar/D_navbar'); ?>
    <div class="container">
        <!-- <div class="row"> -->
            <div class="paddingslide">
                <div class="row">
                    <div class="col-md-9">
                        <h4 align="left"><b>Terakhir Dibaca</b></h4>
                        <div class="your-class">
                            <?php $this->load->view('include/slide'); ?>
                        </div>
                        <br>
                        <h4 align="left"><b>Koleksi Buku</b></h4>
                        <div class="container" align="center">
                            <div class="row">
                                <?php $this->load->view('include/collection'); ?>
                            </div>
                        </div>
                        <br>
                        <h4 align="left"><b>Bookmark Buku</b></h4>
                        <div class="container" align="center">
                            <div class="row">
                                <?php $this->load->view('include/bookmark'); ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($transaction['code'] == 404): ?>
                        <div class="col-md-3">
                            <div class="">
                                <div class="card mb-15">
                                    <div class="card-header">
                                        Buku Populer
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush" id="best_book">
                                            <?php foreach ($best['data'] as $best_book): ?>
                                                <?php if ($best_book['popular_cover_url'] == null || $best_book['popular_cover_url'] == "Kosong" || $best_book['popular_cover_url'] == ""): ?>
                                                    <?php $cover =  base_url()."public/img/blank_cover.png"; ?>
                                                    <?php else: ?>
                                                        <?php $cover =  $best_book['popular_cover_url']; ?>
                                                    <?php endif ?>
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="media-left mr-10">
                                                                <a href="#"><img class="media-object" src="<?php echo $cover; ?>" width="60" height="80"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div>
                                                                    <h4 class="media-heading bold mt-10">
                                                                        <a href="book/<?php
                                                                        echo $best_book['popular_book_id']; ?>
                                                                        -<?php echo url_title($best_book['popular_book_title'], 'dash', true); ?>"><?php echo $best_book['popular_book_title'] ?></a>
                                                                    </h4>
                                                                    <p style="font-size: 10pt;">by <a class="profile" data-usr-prf="<?php echo $best_book['popular_author_id']; ?>" data-usr-name="<?php echo url_title($best_book['popular_author_name']); ?>" href="profile/<?php echo url_title($best_book['popular_author_name']); ?>"><?php echo $best_book['popular_author_name']; ?></a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                <?php endforeach ?>
                                            </ul>
                                    </div>
                                </div><!-- Buku Populer -->
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-md-3">
                            <h4 align="left"><b>Pembelian</b></h4>
                            <div class="">
                                <a data-toggle="modal" href="#list_trans">
                                    <div class="statuspembelian" style="height: 245px;">
                                        <div class="textpembelian">
                                            <span class="">Pembelian</span><span id="transaction_box_counter"><?php echo count($transaction['data']); ?></span>
                                            <span class="" style="float: right;"><img src="<?php echo base_url('public/img/assets/shape.svg') ?>"></span>
                                        </div>
                                        <br><br>
                                        <div class="textpembelian">
                                            <span class="" style="font-size: 20px;font-weight: bold;"><?php $end = end($transaction['data']); echo $end['title_book']; ?></span>
                                            <br>
                                            <p class="fontkecil">Menunggu proses pembayaran</p>
                                            <br><br><br>
                                            <p class="" style="float: right;">More</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="loader mx-auto mt-10" style="display: none;"></div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <?php if ($transaction['code'] == 200){
                $paddingslide = 'paddingslide';
            }else{
                $paddingslide = '';
            }
            ?>
            <div class="<?php echo $paddingslide; ?>">
                <div class="row">
                    <div class="col-md-9">
                        

                    </div>
                    <?php if ($transaction['code'] == 200): ?>
                        <div class="col-md-3">
                            <div class="">
                                <div class="card mb-15">
                                    <div class="card-header">
                                        Buku Populer
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush" id="best_book_library">

                                        </ul>
                                    </div>
                                </div><!-- Buku Populer -->
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="paddingslide">
                <div class="col-md-9">
                    
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
                                                    <img class="mr-3" src="<?php echo $trans['cover_url'] ?>" width="50" height="70" alt="<?php echo $trans['title_book']; ?>" style="object-fit: cover;">
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

                    prevArrow:"<i class='fa fa-chevron-left contslider slidebtn prevbtn mt-20' style='width:47px;'></i>",
                    nextArrow:"<i class='fa fa-chevron-right contslider slidebtn nextbtn mt-20' style='width:47px;'></i>",
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


            </script>
        </body>
        </html>
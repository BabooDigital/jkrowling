<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 25px;
    }

    .switch input {display:none;}

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #c7c7c7;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 0px;
        bottom: 0px;
        background-color: #7661ca;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #fff;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 35px;box-shadow: 0px 0px 4px #527661ca;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    .ainfo {
        font-size: 11pt;
        text-decoration: underline;
        color: #7554bd;
    }


    .checkbox label:after {
        content: '';
        display: table;
        clear: both;
    }

    .checkbox .cr {
        position: relative;
        display: inline-block;
        border: 1px solid #7661ca;
        border-radius: .25em;
        width: 1.3em;
        height: 1.3em;
        float: left;
        margin-right: .5em;
    }

    .checkbox .cr .cr-icon {
        position: absolute;
        font-size: .8em;
        line-height: 0;
        top: 50%;
        left: 20%;
    }

    .checkbox label input[type="checkbox"] {
        display: none;
    }

    .checkbox label input[type="checkbox"]+.cr>.cr-icon {
        opacity: 0;
    }

    .checkbox label input[type="checkbox"]:checked+.cr>.cr-icon {
        opacity: 1;
    }
    .subtitle {
        color: #000;font-size: 13pt;font-weight: 600;
    }
    .bg-greypale {
        background: #f5f8fa;
    }
    .modal-content {
        border :none;
    }
    .btntnc {
        border: none;
        border-radius: 35px;
        padding: 10px 50px;
        box-shadow: 0px 2px 5px 0px #999999;
        font-weight: 600;
    }
    .btn-diss {
        background: #dadada;
        color: #333;
    }
    .btns {
        background: none;
        border: none;
    }
    .btn-acc {
        background: #7661ca;
        color: #fff;
    }
    .swal2-contentwrapper {
        margin-top: 15px;
    }input[type='file'] {
         opacity:0
     }
    button{
        cursor: pointer;
    }
    .bg-select-epub {
        background: #fafafa;
        padding: 30px;
        border: 1px solid #d5d5d5;
        border-radius: 5px;
    }
    .btn-select-epub {
        background:  #ffffff;
        border: 1px solid #c3c3c3;
        border-radius:  35px;
        padding: 15px;
        font-weight: 600;
        position:  relative;
        left: 130px;
    }
    .custom-file-upload {
        background: #fff;
        padding: 15px;
        border-radius: 35px;
        border: 1px #d5d5d5 solid;
        cursor: pointer;
    }
    .custom-file-label {
        font-size: 15pt;
        font-weight: 600;
    }
</style>
<?php
error_reporting(0);
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($actual_link);
$uri = $this->uri->segment(2);
$string = preg_replace('/\s+/', '', $uri);
parse_str($parts['query'], $query);
$dat = array(
    'bid' => $string,
    'param' => $query['stat'],
    'type' => $this->uri->segment(3)
);
if (!empty($query['stat'])) {
    $this->session->set_userdata('editPub', $dat);
}else {

}
?>
<body id="pageContent">
<input type="checkbox" id="toggle-right">
<div class="page-wrap">
    <nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
        <div class="container">
            <form class="navbar-brande">
                <a href="javascript:history.back()">
                    <i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span>
                </a>
            </form>
            <form class="form-inline">
                <!-- <button class="btn-transparant"><span>Selesai</span> &nbsp;&nbsp;<img src="<?php echo base_url() ?>public/img/icon-nav/publish.png" width="30" height="30"></button>  -->
                <!-- <label for="toggle-right" class="profile-toggle"><b>+</b></label> -->
                <input type="hidden" id="what" value="<?php $pin = $this->session->userdata('hasPIN'); if ($pin == 1) {echo 'true';}else{echo 'false';}  ?>">
                <div class="container">
                    <?php $uri_v = $this->uri->segment(3); if($uri_v == 'epub') { $pub = 'publish_book_epub'; } else { $pub = 'publish_book'; } ?>
                    <button type='button' class='btn-publish' id='<?php echo $pub; ?>'>Publish</button>
                    <button type='button' class='btn-publish' id='setpin_publish' style="display: none;">Publish</button>
                </div>
            </form>
        </div>
    </nav>
</div>
<div class="container margin_cover">
    <div class="text-center">
        <div class="coverprev" align="center" style="height: 230px;">
            <input type="hidden" id="uri" value="<?php echo $this->uri->segment(2); ?>">
            <?php $sess = $this->session->userdata('editPub'); if (!empty($sess)) { ?>
                <p><img width="160" height="222" id="previews" src="<?php $src = $book['book_info']['cover_url']; if(!empty($src)){  echo $src; }else{
                        echo base_url()."public/img/assets/def_prev.png";
                    } ?>" style="object-fit: cover;"></p>
                <input type="hidden" name="cover_name" id="cover_name" accept="image/*"  value="<?php $src = $book['book_info']['cover_url']; if($src != NULL){  echo $src; }else{ echo ""; } ?>">
                <input type="hidden" name="cover_file" id="cover_file" accept="image/*" value="<?php $src = $book['book_info']['cover_url']; if($src != NULL){  echo $src; }else{ echo ""; } ?>">
                <input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'previews')" name="file_cover" value="<?php $src = $book['book_info']['cover_url']; if(!empty($src)){  echo $src; }else{ echo ""; } ?>">
            <?php }else{ ?>
                <p><img width="160" height="222" id="previews" src="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{
                        echo base_url()."public/img/assets/def_prev.png";
                    } ?>" style="object-fit: cover;"></p>
                <input type="hidden" name="cover_name" id="cover_name" accept="image/*"  value="<?php $src = $this->session->userdata('dataCover'); if($src != NULL){  echo $src['asset_url']; }else{ echo ""; } ?>">
                <input type="hidden" name="cover_file" id="cover_file" accept="image/*">
                <input type="file" id="file_cover" accept="image/*" onchange="tampilkanPreview(this,'previews')" name="file_cover" value="<?php $src = $this->session->userdata('dataCover'); if(!empty($src)){  echo $src['asset_url']; }else{ echo ""; } ?>">
            <?php } ?>
        </div>
        <div class="min_padding">
            <p style="font-size: 16px;">Atau
                <input type="button" style="background: transparent; color: #b448cc;border: 0;cursor: pointer;" onclick="window.location.href = '<?php echo site_url('create_cover'); ?>';" value="Buat Disini" />
        </div>
    </div>
    <div class="mt-40">
        <div class="form-group">
            <?php $sess = $this->session->userdata('editPub'); if (!empty($sess) || $sess != null) { ?>
                <select class="form-control catselect" id="category_ids" name="category_id" required>
                    <option value="<?php echo $book['category']['category_id']; ?>">-- <?php echo $book['category']['category_name']; ?> --</option>
                    <?php foreach ($category as $cat) { ?>
                        <option value="<?php echo $cat['category_id'] ?>"><?php echo $cat['category_name'] ?></option>
                    <?php } ?>
                </select>
            <?php }else{ ?>
                <select class="form-control catselect" id="category_ids" name="category_id" required>
                    <option value="">Kategori Buku</option>
                    <?php foreach ($category as $cat) { ?>
                        <option value="<?php echo $cat['category_id'] ?>"><?php echo $cat['category_name'] ?></option>
                    <?php } ?>
                </select>
            <?php } ?>
        </div>
    </div>
    <div class="mt-20">
        <div class="form-group">
            <label style="font-size: 14pt;">Jual Buku? <a href="javascript:void(0);" class="ainfo ml-15">Info Lengkap</a></label>
            <label class="switch float-right" style="display: none;">
                <input type="checkbox" id="showOpt" data-toggle='collapse' data-target='#priceSet' class="priceCheck">
                <span class="slider round"></span>
            </label>
            <?php if (empty($uri_v) || $uri_v == 'pdf'){ ?>
                <div class="container bg-white collapse pb-10" id='priceSet'>
                    <div class="row" style="width: 110%;">
                        <div class="form-group col-4">
                            <label style="color: #fff;">l</label>
                            <select id="inputCurrency" class="form-control">
                                <option selected>Rp</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label class="text-muted">Harga Buku Lengkap</label>
                            <input type="number" class="form-control" id="inputprice" placeholder="( Contoh : 15000 )">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="text-muted fs-10">Penulis (<span id="writen1"></span>)</label>
                        </div>
                        <div class="col-8">
                            <label class="text-muted fs-10-right"><b style="display: none;" id="rp2">Rp</b> <b id="writen-earn">-</b></label>
                        </div>
                        <div class="col-4">
                            <label class="text-muted fs-10">Baboo (<span id="baboo1"></span>)</label>
                        </div>
                        <div class="col-8">
                            <label class="text-muted fs-10-right"> <b style="display: none;" id="rp_fee2">Rp</b> <b id="baboo-earn">-</b></label>
                        </div>
                    </div>
                    <hr class="mt-5 mb-5">
                    <div class="row">
                        <div class="col-4">
                            <label class="text-muted fs-10">+ Pph 21 (<span id="fee1"></span>)</label>
                        </div>
                        <div class="col-8">
                            <label class="text-muted fs-10-right"><b style="display: none;" id="rp">Rp</b> <b id="ppn">-</b></label>
                        </div>
                        <div class="col-4">
                            <label class="text-muted fs-10">+ Biaya Transaksi</label>
                        </div>
                        <div class="col-8">
                            <label class="text-muted fs-10-right"> <b style="display: none;" id="rp_fee">Rp</b> <b id="payment_fee">-</b></label>
                        </div>
                    </div>
                    <hr class="mt-5 mb-5">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-muted fs-10" style="font-size: 16px;">Harga Jual Buku</label>
                        </div>
                        <div class="col-6">
                            <label class="text-muted fs-10-right" style="font-size: 16px;"> <b style="display: none;" id="rp_total">Rp</b> <b id="total">0</b></label>
                        </div>
                    </div>
                    <div class="row mt-20" style="width: 110%;">
                        <div class="form-group col-8">
                            <?php if ((bool)$book['book_info']['is_pdf'] == true) {
                                echo "<label class='text-muted'>Mulai Jual Pada Halaman</label>";
                            }else{
                                echo "<label class='text-muted'>Mulai Jual Pada Chapter</label>";
                            } ?>
                            <input type="number" name="start_chapter_pdf" class="input-range start_chapter_pdf" id="addormin" style="width: 100%;background: none;" readonly value="">
                            <input type="hidden" class="pdfcheck" value="true">
                        </div>
                        <div class="col-2" style="margin-left: -15px;">
                            <label style="color: #fff;">min</label>
                            <!-- <button type="button" class="btn-transparant value-control addmin" data-action="minus" data-targets="addormin"><img src="<?php echo base_url('public/img/assets/icon_minch_active.png'); ?>" width="35"></button> -->
                            <button class="ml-20 btn-transparant value-control addmin" data-action="minus" data-target="start_chapter_pdf" style="cursor: pointer;"><img src="<?php echo base_url('public/img/assets/icon_minch_active.png'); ?>" width="35"></button>
                        </div>
                        <div class="col-2">
                            <label style="color: #fff;">min</label>
                            <!-- <button type="button" class="btn-transparant value-control addplus" data-action="plus" data-targets="addormin"><img src="<?php echo base_url('public/img/assets/icon_plusch_active.png'); ?>" width="35"></button> -->
                            <button class="ml-10 btn-transparant value-control addplus" data-action="plus" data-target="start_chapter_pdf" style="cursor: pointer;"><img src="<?php echo base_url('public/img/assets/icon_plusch_active.png'); ?>" width="35"></button>
                        </div>
                    </div>
                </div>
            <?php }else if($uri_v == 'epub'){ ?>
                <div class="container bg-white collapse pb-10" id='priceSet'>
                    <div class="row" style="width: 110%;">
                        <div class="form-group col-4">
                            <label style="color: #fff;">l</label>
                            <select id="inputCurrency" class="form-control">
                                <option selected>Rp</option>
                            </select>
                        </div>
                        <div class="form-group col-7">
                            <label class="text-muted">Harga Buku Lengkap</label>
                            <input type="number" class="form-control" id="inputprice" placeholder="( Contoh : 15000 )">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="text-muted fs-10">Penulis (<span id="writen1"></span>)</label>
                        </div>
                        <div class="col-8">
                            <label class="text-muted fs-10-right"><b style="display: none;" id="rp2">Rp</b> <b id="writen-earn">-</b></label>
                        </div>
                        <div class="col-4">
                            <label class="text-muted fs-10">Baboo (<span id="baboo1"></span>)</label>
                        </div>
                        <div class="col-8">
                            <label class="text-muted fs-10-right"> <b style="display: none;" id="rp_fee2">Rp</b> <b id="baboo-earn">-</b></label>
                        </div>
                    </div>
                    <hr class="mt-5 mb-5">
                    <div class="row">
                        <div class="col-4">
                            <label class="text-muted fs-10">+ Pph 21 (<span id="fee1"></span>)</label>
                        </div>
                        <div class="col-8">
                            <label class="text-muted fs-10-right"><b style="display: none;" id="rp">Rp</b> <b id="ppn">-</b></label>
                        </div>
                        <div class="col-4">
                            <label class="text-muted fs-10">+ Biaya Transaksi</label>
                        </div>
                        <div class="col-8">
                            <label class="text-muted fs-10-right"> <b style="display: none;" id="rp_fee">Rp</b> <b id="payment_fee">-</b></label>
                        </div>
                    </div>
                    <hr class="mt-5 mb-5">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-muted fs-10" style="font-size: 16px;">Harga Jual Buku</label>
                        </div>
                        <div class="col-6">
                            <label class="text-muted fs-10-right" style="font-size: 16px;"> <b style="display: none;" id="rp_total">Rp</b> <b id="total">0</b></label>
                        </div>
                    </div>
                    <div class="row mt-20 justify-content-md-center" style="">
                        <div class="col-6 text-center">
                            <p>Buku Veri Gratis</p>
                            <div class="bg-select-epub">
                                <p>
                                    <label id="file-name" class="custom-file-label"></label>
                                </p>
                                <label for="file-to-upload" class="custom-file-upload">
                                    Upload File .ePub
                                </label>
                                <input id="file-to-upload" name='upload_cont_img' type="file" style="display:none;" accept="application/epub+zip">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="mt-20">
        <div class="form-group">
            <label style="font-size: 14pt;">Jadwalkan Penerbitan?</label>
            <label class="switch float-right" style="display: none;">
                <input type="checkbox" id="showOptPub" data-toggle='collapse' data-target='#publishSet' class="publishCheck">
                <span class="slider round"></span>
            </label>
            <div class="container bg-white collapse p-10" id='publishSet'>
                <div class="row" style="width: 110%;">
                    <div class="form-group col-6">
                        <label class="text-muted">Tentukan Tanggal</label>
                        <input type="text" class="form-control" id="date_pub" data-format="YYYY-MM-DD" data-template="YYYY MMMM DD" name="date_pub">

                    </div>
                    <div class="form-group col-5">
                        <label class="text-muted">Tentukan Waktu</label>
                        <input type="text" id="time_pub" data-format="HH:mm" data-template="HH : mm" name="time_pub" value="00:00">
                    </div>
                </div>
                <div class="row" style="width: 110%;">

                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="count_chapter" id="count_chapter" value="" class="w-100" placeholder="Count Chapter" required="">
    <input type="hidden" name="count_chapter_plus_minus" id="count_chapter_plus_minus" value="" class="w-100" placeholder="Count Chapter" required="">
    <input type="hidden" name="minim_chapter" id="minim_chapter" value="" class="w-100" placeholder="Count Chapter" required="">
    <div class="mt-20">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="" class="checktnc" name="ischecked">
                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                <a href="javascript:void(0);" class="tncModal" style="color: #7554bd;">Term of Service</a>
            </label>
        </div>
    </div>
</div>
<!-- <footer class="navbar navbar-expand-lg fixed-bottom" style="height:60px;background: #f3f5f7;">

</footer> -->

<?php $this->load->view('include/modal_tnc'); ?>

<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
<script>
    $("#file-to-upload").change(function(){
        $("#file-name").text(this.files[0].name);
        $(".custom-file-upload").text('Ganti File');
    });
    $(function(){
        $('#date_pub').combodate({
            firstItem: 'name',
            minYear: 2018,
            maxYear: 2020,
            yearDescending: false
        });
        $('#time_pub').combodate({
            firstItem: 'name', //show 'hour' and 'minute' string at first item of dropdown
            minuteStep: 1
        });
    });
    $('#inputprice').number(true);
    check_sell();
    checkingPIN();
    var type_ = '<?php echo $uri_v; ?>';
    $(document).on('click','.tncModal',function(){
        $('#tnc-modal').modal('show');
        $(document).on('click', '.btn-acc', function() {
            $('.checktnc').prop('checked', true);
            $('#tnc-modal').modal('hide');
        });
        $(document).on('click', '.btn-diss', function() {
            $('.checktnc').prop('checked', false);
            $('#tnc-modal').modal('hide');
        });
    });
    $(document).on('click', '#showOpt', function() {
        var sellbtn = $('#showOpt:checkbox:checked');
        var pin = $('#what').val();
        if (sellbtn.length == 0 && pin == 'false') {
            $('#publish_book').show();
            $('#publish_book_epub').show();
            $('#setpin_publish').hide();
        }else if (sellbtn.length == 1 && pin == 'true'){
            $('#publish_book').show();
            $('#publish_book_epub').show();
            $('#setpin_publish').hide();
        }else if (sellbtn.length == 0 && pin == 'true'){
            $('#publish_book').show();
            $('#publish_book_epub').show();
            $('#setpin_publish').hide();
        }else{
            $('#publish_book').hide();
            $('#publish_book_epub').hide();
            $('#setpin_publish').show();
        }
    });
    $('.addplus').click(function(e){
        e.preventDefault();
        fieldName = $(this).attr('data-target');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        var jum = $("#count_chapter_plus_minus").val();
        if (!isNaN(currentVal)) {
            if (currentVal < jum)
            {
                $('input[name='+fieldName+']').val(currentVal + 1);
                $('.addmin').removeAttr('style');
            }
            else
            {
                $('.addplus').css('cursor','not-allowed');
            }
        } else {
            $('input[name='+fieldName+']').val(1);

        }
    });
    $(".addmin").click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-target');
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        if (!isNaN(currentVal) && currentVal > $('#minim_chapter').val()) {
            $('input[name='+fieldName+']').val(currentVal - 1);
            $('.addplus').removeAttr('style');
        } else {
            $('input[name='+fieldName+']').val($('#minim_chapter').val());
            $('.addmin').css('cursor','not-allowed');
        }
    });
    $(document).on('click','.ainfo',function(){
        swal({
            title: 'Info Penjualan Buku',
            html:
            '<div class="text-left" style="font-size:12pt;"><span class="mb-5">Fitur penjualan buku akan aktif jika tulisan anda sudah memenuhi kriteria dibawah ini</span>' +
            '<ul>' +
            '<li>Buku bisa dijual apabila penulis sudah menulis 5 chapter dan memenuhi 6000 karakter</li>' +
            '<li>Minimal chapter yang dijual adalah 3 chapter dan minimal chapter yang digratiskan adalah 2 chapter</li>' +
            '<li>Penulis bisa menjual di chapter ke 3 dari total 5 chapter, dengan kata lain 2 chapter pertama adalah gratis dan 3 chapter berikut yang dijual/berbayar. Misal : Penulis sudah menulis 5 chapter dengan 6000 karakter, maka penulis bisa menjual buku tersebut dari chapter ke 3 (chapter yang dijual adalah chapter 3, 4 dan 5) dan chapter 1 dan 2 adalah chapter yang gratis.</li>' +
            '<ul><div>',
            showCloseButton: true,
            showCancelButton: false, // There won't be any cancel button
            showConfirmButton: false // There won't be any confirm button
        })
    });
</script>
</body>
</html>

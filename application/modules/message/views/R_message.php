<style type="text/css">

    /*Right*/
    .modal.right.fade .modal-dialog {
        /*right: -435px;*/
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }

    .modal.right.fade.in .modal-dialog {
        right: 0;
    }

    .modal-backdrop {
        opacity: 0.5 !important;
    }

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
    .modal-header > h4{
        position:relative;
        left:13.5%;
        padding-top:10px;
    }
    .modal-body{
        overflow-y: auto;
    }
    .closes {
        background: none;
        font-size: 15px;
        line-height: 1;
        opacity: .5;
        border: none;
        position: absolute;
    }
</style>
<body id="pageContent" class="bodymessage">
<input type="checkbox" id="toggle-right">
<div class="page-wrap">
    <nav class="navbar navbar-expand-lg fixed-top" style="height:60px;">
        <div class="container bodymessage">
            <button style="background: none;border:none;">
                <i class="fa fa-arrow-left"></i> &nbsp;
            </button>

        </div>
    </nav>
</div>
<br/>
<br/>
<div class="container bodymessage">
    <div class="row form_book">
        <div class="">
            <span class="title_book_form"><h4><b>Pesan Masuk</b></h4></span>
            <div class="loader" style="display: none;"></div>
        </div>
    </div>
</div>
<div class="container bodymessage">
    <div class="paddingbook search_message">
        <form class="">
            <input id="search_user" class="form-search search_message_form" type="text" placeholder="Cari pesan masuk"
                   aria-label="Search">
        </form>
    </div>
    <br/>
    <?php if (isset($listMessage) && !empty($listMessage)) { ?>
        <?php foreach ($listMessage as $messv) { ?>
            <div class="card-library mb-15 message-user" data-usr-msg="<?php echo $messv["user_id"]; ?>"
                 data-usr-name ="<?php echo $messv["fullname"]; ?>" style="height: auto;">
                <div class="list-group">
                    <div class="row mb-10" style="padding: 0px 10px 0px 10px;">
                        <div class="media">
                            <img class="d-flex align-self-start mr-20 rounded-circle"
                                 src="<?php if (empty($messv["prof_pict"])) {
                                     echo base_url(); ?>public/img/profile/pp_wanita2.png<?php } else {
                                     echo $messv["prof_pict"];
                                 } ?>" width="48" alt="Generic placeholder image">
                            <div class="media-body mt-5">
                                <h5 class="card-title nametitle2"><?php echo $messv["fullname"]; ?></h5>
                                <p class="text-muted" style="margin-top:-10px;">
                                    <small>
                                        <span><?php echo (strlen($messv["user_latest_message"]) >= 20) ? substr($messv["user_latest_message"], 0, 20) : $messv["user_latest_message"] . '...'; ?></span>
                                        <span class="ml-10"><?php echo $messv["user_chat_time"]; ?></span></small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-white">
                <button type="button" class="closes" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                </button>
            </div>

            <div class="modal-body">
            </div>
            <nav class="navbar navbar-light fixed-bottom  bg-white">
                <span class="w-100 mb-20">
                    <input id="pmessageas" placeholder="Tulis sesuatu.." type="text" class="frmcomment commentform"
                           style="width: 80%;height: 45px;">
                    <a href="javascript:void(0)" id="postMessage" class="btn Rpost-message-parap"
                       data-p-id="390">Kirim</a>
                </span>
            </nav>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
</body>
</html>
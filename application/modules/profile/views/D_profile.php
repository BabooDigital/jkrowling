<?php $this->load->view('navbar/D_navbar'); ?>
<style type="text/css">
    button {
        cursor: pointer;
    }
    .nav-tabs {
        border: none;
    }
    .arrowdraft {
        padding: 10px;
        border: 2px #da0707 solid;
    }
    .nav-pills .nav-link.active, .show>.nav-pills .nav-link {
        background-color: #7554bd !important;
        border-radius: 40px;
        padding: 5px 40px !important;
    }
    .btn-edprof {
        background: none;
        width: 45%;
        border-radius: 40px;
        border: solid 1px #797979;
        padding: 5px 20px;
    }
    .dropdown-toggle::after {
        display:none
    }
    /* M E S S A G E S */

    .chat {
        list-style: none;
        background: none;
        margin: 0;
        padding: 0 0 50px 0;
        margin-bottom: 10px;
    }
    .chat li {
        padding: 0.5rem;
        overflow: hidden;
        display: flex;
    }
    .chat .avatar {
        width: 40px;
        height: 40px;
        position: relative;
        display: block;
        z-index: 2;
        border-radius: 100%;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        -ms-border-radius: 100%;
        background-color: rgba(255,255,255,0.9);
    }
    .chat .avatar img {
        width: 40px;
        height: 40px;
        border-radius: 100%;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        -ms-border-radius: 100%;
        background-color: rgba(255,255,255,0.9);
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }
    .chat .day {
        position: relative;
        display: block;
        text-align: center;
        color: #c0c0c0;
        height: 20px;
        text-shadow: 7px 0px 0px #e5e5e5, 6px 0px 0px #e5e5e5, 5px 0px 0px #e5e5e5, 4px 0px 0px #e5e5e5, 3px 0px 0px #e5e5e5, 2px 0px 0px #e5e5e5, 1px 0px 0px #e5e5e5, 1px 0px 0px #e5e5e5, 0px 0px 0px #e5e5e5, -1px 0px 0px #e5e5e5, -2px 0px 0px #e5e5e5, -3px 0px 0px #e5e5e5, -4px 0px 0px #e5e5e5, -5px 0px 0px #e5e5e5, -6px 0px 0px #e5e5e5, -7px 0px 0px #e5e5e5;
        box-shadow: inset 20px 0px 0px #e5e5e5, inset -20px 0px 0px #e5e5e5, inset 0px -2px 0px #d7d7d7;
        line-height: 38px;
        margin-top: 5px;
        margin-bottom: 20px;
        cursor: default;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .other .msg .msg-self {
        order: 1;
        border-top-left-radius: 0px;
        box-shadow: -1px 2px 0px #D4D4D4;
    }
    .other:before {
        content: "";
        position: relative;
        top: 0px;
        right: 0px;
        left: 40px;
        width: 0px;
        height: 0px;
        border: 5px solid #fff;
        border-left-color: transparent;
        border-bottom-color: transparent;
    }

    .self {
        justify-content: flex-end;
        align-items: flex-end;
    }
    .self .msg .msg-self {
        order: 1;
        border-bottom-right-radius: 0px;
        box-shadow: 1px 2px 0px #D4D4D4;
    }
    .self .avatar {
        order: 2;
    }
    .self .avatar:after {
        content: "";
        position: relative;
        display: inline-block;
        bottom: 19px;
        right: 0px;
        width: 0px;
        height: 0px;
        border: 5px solid #fff;
        border-right-color: transparent;
        border-top-color: transparent;
        box-shadow: 0px 2px 0px #D4D4D4;
    }

    .msg {
        background: #ebf2ff;
        min-width: 50px;
        padding: 10px;
        border-radius: 2px;
        box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.07);
    }
    .msg-self {

        background: #f1f1f1f1;
        min-width: 50px;
        padding: 10px;
        border-radius: 2px;
        box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.07);
    }
    .msg .msg-self p {
        font-size: 1rem;
        margin: 0 0 0.2rem 0;
        color: #333;
    }
    .msg .msg-self span {
        font-size: 8pt;
    }
    .msg .msg-self img {
        position: relative;
        display: block;
        width: 450px;
        border-radius: 5px;
        box-shadow: 0px 0px 3px #eee;
        transition: all .4s cubic-bezier(0.565, -0.260, 0.255, 1.410);
        cursor: default;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }
    @media screen and (max-width: 800px) {
        .msg .msg-self img {
            width: 300px;
        }
    }
    @media screen and (max-width: 550px) {
        .msg .msg-self img {
            width: 200px;
        }
    }

    @-webikt-keyframes pulse {
        from { opacity: 0; }
        to { opacity: 0.5; }
    }

    .closes {
        background: none;
        border: none;
        font-size: 14pt;
    }
</style>
<div class="container babooidin">
    <div class="row">
        <!-- Left Side -->
        <div class="col-md-3">
            <div class="stickymenu">
                <div class="card mb-15">
                    <div class="text-center pr-10 pl-10 pt-20">
                        <div class="card-body p-0 mb-20">
                            <input type="hidden" id="iaiduui" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
                            <img alt="<?php echo $userdata['name']; ?>" class="rounded-circle p-5" height="100" src="<?php if($userdata['prof_pict'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $userdata['prof_pict']; } ?>" style="border: .5px #7554bd solid;" width="100" onerror="this.onerror=null;this.src='<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>'">
                            <p class="mt-10">
                                <b><?php echo $userdata['fullname']; ?></b>
                            </p>
                            <p style="font-size: 15px;">
                                <?php echo $userdata['address']; ?>
                            </p>
                            <div class="quote">
                                <p>
                                    <?php echo $userdata['about_me']; ?>
                                </p>
                            </div>
                            <div class="mb-20">
                                <?php if (!$this->uri->segment(2)): ?>
                                    <a data-toggle="modal" data-target="#edit-profile" href="#" class="btn-edprof fs-12px mr-10">Edit Profile</a> <a href="<?php echo site_url('message'); ?>" class="btn-edprof fs-12px">Message</a>
                                <?php else: ?>
                                    <a href="javascript:void(0);" class="btn-edprof fs-12px mr-10 message-user" data-usr-msg="<?php echo $userdata["user_id"]; ?>" data-usr-name ="<?php echo $userdata["fullname"]; ?>">Kirim Pesan
                                    </a>
                                    <a href="#" data-follow="<?php echo $userdata['user_id']; ?>" class="btn-edprof fs-12px <?php if ($userdata['isFollow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class=" txtfollow"><?php if ($userdata['isFollow'] == false) { echo "Ikuti"; }else{ echo "Diikuti"; } ?></span></a>
                                    <input type="hidden" name="iaiduui" id="iaiduui" value="<?php $dat = $this->session->userdata('userData'); echo $dat['user_id']; ?>">
                                <?php endif ?>
                            </div>
                            <hr>
                            <?php if (!$this->uri->segment(2)): ?>
                                <div class="penghargaan">
                                    <div class="pt-5 pb-5 pl-10 pr-10" style="background-color: #7661ca;border-radius: 10px;width: 110%;">
                                        <?php $pin = $userdata['has_pin']; if ($pin == 1 || $pin != false) { ?>
                                            <p class="text-left"><img src="<?php echo base_url('public/img/assets/icon_wallet_white.png'); ?>" class="img-fluid" width="20"> <span class="text-white">Dompet</span> <button type="button" class="float-right detail-wallet" data-toggle="modal" data-target="pinauth-modal" style="width: 30%;font-size: 13px;">Detail</button></p>
                                            <p class="text-left mt-15"><button class="btn-transparant text-white btnActive" style="font-size: 20px;font-weight: 800;">Rp <?php echo number_format($userdata['balance'] , 0, ',', '.'); ?></button></p>
                                        <?php }else{ ?>
                                            <p class="text-left"><img src="<?php echo base_url('public/img/assets/icon_wallet_white.png'); ?>" class="img-fluid" width="20"> <span class="text-white">Dompet</span></p>
                                            <p class="text-left mt-30"><button class="btn-transparant text-white btnActive activeWallet" style="font-size: 18px;">Aktifkan Sekarang ˃</button></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endif ?>
                            <div class="penghargaan">
                                <label><b>Statistik</b></label>
                            </div>
                            <div class="dbooksociallist">
									<span data-toggle="tooltip" data-placement="bottom" title="<?php echo $userdata['book_made']; ?> Buku telah dibuat"><img src="<?php echo base_url(); ?>public/img/assets/icon_books.svg" width="27">
										<p class="mt-5"><?php echo $this->thousand_to_k->ConvertToK($userdata['book_made']); ?></p></span>
                            </div>
                            <div class="dbooksociallist">
                                <a href="#" class="view-friends" data-toggle="modal" data-target="#view-friends" data-placement="bottom" title="<?php echo $userdata['followers']; ?> Teman"><img src="<?php echo base_url(); ?>public/img/assets/icon_follower.svg" width="27">
                                    <p class="mt-5"><?php echo $this->thousand_to_k->ConvertToK($userdata['followers']); ?></p></a>
                            </div>
                            <div class="dbooksociallist">
											<span data-toggle="tooltip" data-placement="bottom" title="<?php echo $userdata['ppl_like']; ?> Suka"><img src="<?php echo base_url(); ?>public/img/assets/icon_liker.svg" width="27">
												<p class="mt-5"><?php echo $this->thousand_to_k->ConvertToK($userdata['ppl_like']); ?></p></span>
                            </div>
                            <div class="dbooksociallist">
												<span data-toggle="tooltip" data-placement="bottom" title="<?php echo $userdata['book_sold']; ?> Buku Terjual"><img src="<?php echo base_url(); ?>public/img/assets/icon_soldbook.svg" width="27">
													<p class="mt-5"><?php echo $this->thousand_to_k->ConvertToK($userdata['book_sold']); ?></p></span>
                            </div><br><br><br>
                        </div>
                    </div>
                </div><!-- Trending -->
                <div class="mb-15" style="">
                    <div class="p-0">
                        <?php echo $this->load->view('ads/250_side_ad'); ?>
                    </div>
                </div>
            </div>
        </div><!-- Mid Side -->
        <?php if (!$this->uri->segment(2)): ?>
            <div class="col-md-6" id="post-data">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item mr-50">
                        <a class="nav-link mt-5 active" id="pills-publish-tab" data-toggle="pill" href="#pills-publish" role="tab" aria-controls="pills-publish" aria-selected="true">Publish</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mt-5" id="pills-draft-tab" data-toggle="pill" href="#pills-draft" role="tab" aria-controls="pills-draft" aria-selected="false">Draft</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-publish" role="tabpanel" aria-labelledby="pills-publish-tab">
                        <div id="publishdata" class="w-100">
                            <?php echo $this->load->view('data/D_profile', $bookdata);
                            if ($bookdata == null || $bookdata == [] || empty($bookdata)) {
                                echo "<div class='container first_login mt-30'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'><img src='".base_url('public/img/icon_draft_blank.png')."' width='190'></div> <div class='text-center'> <h4><b>Tentukan konten yang kamu suka!</b></h4> <p style='font-size: 12pt;'>Belum ada buku yg kamu publish</p> </div> </div> </div> </div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-draft" role="tabpanel" aria-labelledby="pills-draft-tab">
                        <?php if (!empty($draftdata)) {
                            foreach ($draftdata as $d_book) {
                                if ((bool)$d_book['is_pdf'] == true) {
                                    $edit_url = site_url('upload_mypdf/'.$d_book['book_id'].'?stat=draft');
                                }else{
                                    $edit_url = site_url('my_book/'.$d_book['book_id'].'?stat=draft');
                                } ?>
                                <div class="card mb-20">
                                    <div class="card-header bg-white">
                                        <?php if ($d_book['status_publish']['status_id'] == 1 ) { ?>
                                            <span><img src='public/img/assets/icon_clock.svg' width='20'> <?php echo $d_book['latest_update']; ?></span>
                                            <span class='float-right'><img src="<?php echo base_url('public/img/assets/icon_stat_draft.png'); ?>"></span>
                                        <?php }else if ($d_book['status_publish']['status_id'] == 3) { ?>
                                            <span><img src='public/img/assets/icon_clock.svg' width='20'> Terbit <?php echo date("d M Y", strtotime($d_book['publish_date'])); ?></span>
                                            <span class='float-right'><img src="<?php echo base_url('public/img/assets/icon_stat_revisi.png'); ?>"></span>
                                        <?php } ?>
                                    </div>
                                    <div class="card-body">
                                        <img alt="<?php echo $d_book['title_book']; ?>" class="d-flex align-self-start mr-10 float-left rounded" height="170" src="<?php echo ($d_book['cover_url'] != 'Kosong') ? ($d_book['cover_url'] != null ? $d_book['cover_url'] : base_url('public/img/blank_cover.png')) : base_url('public/img/blank_cover.png'); ?>" width="120">
                                        <h4 class="card-title nametitle3"><span class="titlebooks"><?php echo $d_book['title_book']; ?></span></h4>
                                        <p class="catbook mb-10"><span class="btn-no-fill"><?php echo $d_book['category']; ?></span></p>
                                        <p class="text-desc-in"><?php echo $d_book['desc']; ?></p>
                                    </div>
                                    <div class="card-footer text-muted bg-white" style="font-size: 0.8em;font-weight: bold;">
                                        <div class="pull-right" style="margin-top: 3px;">
                                            <a class="mr-10 fs-14px mb-5" href="<?php echo $edit_url; ?>" style="border: 1px #333 solid;border-radius: 40px;padding: 8px 25px;"><img src="<?php echo base_url('public/img/assets/icon_pen.svg'); ?>" width="23"> Edit</a>
                                        </div>
                                        <div>
                                            <button class="clear-btn deldraft" type="button" draft-id="<?php echo $d_book['book_id']; ?>"><img src="<?php echo base_url('public/img/icon-tab/dustbin.svg'); ?>" width="20"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php } }else { } ?>
                    </div>
                    <div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
                </div>
            </div>
            <!-- Right Side -->
        <?php else: ?>
            <div class="col-md-6" id="post-data">

                <?php echo $this->load->view('data/D_profile', $bookdata);
                if ($bookdata == null || $bookdata == [] || empty($bookdata)) {
                    echo "<div class='container first_login mt-30'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'><img src='".base_url('public/img/icon_draft_blank.png')."' width='190'></div> <div class='text-center'> <h4><b>Tentukan konten yang kamu suka!</b></h4> <p style='font-size: 12pt;'>Belum ada buku yg kamu publish</p> </div> </div> </div> </div>";
                }
                ?>
            </div><!-- Right Side -->
        <?php endif ?>
        <div class="col-md-3 tmlin">
            <div class="stickymenu">
                <!-- Buku Populer -->
                <div class="card mb-15">
                    <div class="card-header">
                        Terakhir Dibaca
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <?php if (!empty($latestread)) {
                                foreach ($latestread as $l_book) { ?>
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left mr-10">
                                                <a href="<?php if ((bool)$l_book['is_pdf'] == true) { echo site_url('book/'.$l_book['book_id'].'-'.url_title($l_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('book/'.$l_book['book_id'].'-'.url_title($l_book['title_book'], 'dash', true)); } ?>"><img class="media-object rounded" height="80" src="<?php echo ($l_book['cover_url'] != 'Kosong') ? ($l_book['cover_url'] != null ? $l_book['cover_url'] : base_url('public/img/blank_cover.png')) : base_url('public/img/blank_cover.png'); ?>" onerror="this.onerror=null;this.src='<?php echo base_url('public/img/blank_cover.png'); ?>';" width="60" style="object-fit: cover;"></a>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <h4 class="media-heading bold mt-10"><a href="<?php if ((bool)$l_book['is_pdf'] == true) { echo site_url('book/'.$l_book['book_id'].'-'.url_title($l_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('book/'.$l_book['book_id'].'-'.url_title($l_book['title_book'], 'dash', true)); } ?>"><?php echo $l_book['title_book']; ?></a></h4>
                                                    <p style="font-size: 10pt;">by <a href="<?php echo site_url('profile/'.$l_book['author_id'].'-'.url_title($l_book['author_name'], 'dash', true)); ?>"><?php echo $l_book['author_name']; ?></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } }else { } ?>
                        </ul>
                    </div>
                </div><!-- Buku Populer -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 105% !important;height: 800px;">
            <div class="modal-body">
                <div class="container">
                    <div class="alert alert-success" id="alert_success" style="display: none;">
                        <strong>Success!</strong> Data Updated.
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <img src="<?php echo base_url();?>public/img/logo_purple.png" style="height:50px; margin-top:36px;">
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-lg-12" style="margin-top:55.1px;">
                                <p class="text-img-modal"><h3><b>Edit Profile</b></h3></p>
                                <br>
                            </div>
                            <div class="col-lg-12">
                                <!-- <form id="profile-edit"> -->
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="w-100 frmProf" id="yourName" value="<?php echo $userdata['fullname'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="w-100 frmProf" id="yourBirth" value="<?php echo $userdata['date_of_birth'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="w-100 frmProf" id="yourLoc" value="<?php echo $userdata['address'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Bio</label>
                                    <input type="text" class="w-100 frmProf" id="yourBio" value="<?php echo $userdata['about_me'] ?>">
                                </div>
                                <div class="form-group">
                                    <div class="pull-left">
                                        <button type="submit" name="submit" class="btn btn-primary pull-right btn-login ikuti-lomba"><i class="icon-arrow-right"></i>Update Profile</button>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="wallet-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="height: ">
        <div class="modal-content" style="width: 440px !important; left: 10%;">
            <button type="button" class="closes btn-clear" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="position: absolute;right: -30px;color: #fff;font-size: 30px;"><i class="fa fa-times"></i></span>
            </button>
            <div class="modal-body" style="height: 670px;">
                <iframe id="targetFrame" width="100%" height="100%" scrolling="NO" frameborder="0" src="<?php echo site_url('pin-dompet');?>"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="modal right fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border:none !important;">

            <div class="modal-header bg-white">
                <button type="button" class="closes btn-clear" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                </button>
            </div>

            <div class="modal-body bg-white mb-10" style="min-height: 400px;">
                <div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
            </div>
            <div class="modal-footer navbar navbar-light fixed-bottom  bg-white">
							<span class="w-100 mt-10 mb-10">
								<input id="pmessageas" placeholder="Tulis sesuatu.." type="text" class="frmcomment commentform" style="width: 80%;height: 45px;">
								<a href="javascript:void(0)" id="postMessage" class="btn Rpost-message-parap" data-p-id="<?php echo $userdata['user_id']; ?>" style="font-size: 12pt;border-radius: 30px;padding: 8px 20px;background-color: #7554bd;color: #fff;">Kirim</a>
							</span>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<div class="modal fade" id="view-friends" tabindex="-1" role="dialog" aria-labelledby="view-friendsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="view-friendsLabel">Semua Teman <strong>(<?php echo $userdata['followers']; ?>)</strong></h5><button type="button" class="closes" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <?php error_reporting(0); foreach ($followers as $fol){ ?>
                            <div class='col-6 mb-10 pr-5 pl-5'>
                                <div class='card pt-15 pb-15' style='border: solid 1px #e8ebec;border-radius: 10px !important;'>
                                    <div class='text-center'>
                                        <img class='rounded-circle' height='50' src='<?php echo $fol['prof_pict']; ?>' alt='<?php echo $fol['fullname']; ?>' style='object-fit:cover;' width='50' onerror="this.onerror=null;this.src='<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>';">
                                        <p class='nametitled'><a href='<?php echo site_url(); ?>profile/<?php echo $fol['user_id']; ?>-<?php echo url_title($fol['fullname'], 'dash', true); ?>'><?php echo $fol['fullname']; ?></a></p>
                                    </div>
                                    <div class='row'>
                                        <div class='col-6 text-center rborder pr-0'>
                                            <p style='display: inline-flex;'><img src='<?php echo base_url("public/img/icon-tab/book.svg") ?>' width='25'> <span style='font-weight: bold;'><?php echo $fol['book_made']; ?></span></p>
                                            <h6>Buku</h6>
                                        </div>
                                        <div class='col-6 text-center pl-0'>
                                            <p style='display: inline-flex;'><img src='<?php echo base_url("public/img/icon-tab/followers.svg") ?>' width='25'> <span style='font-weight: bold;'><?php echo $this->thousand_to_k->ConvertToK($fol['followers']); ?></span></p>
                                            <h6>Teman</h6>
                                        </div>
                                    </div>
                                    <div class='row mt-10'>
                                        <div class='col-12 text-center' style='height:30px;'>
                                            <?php if ($fol['user_id'] != '1') { ?>
                                                <button type='button' class='btn-follow pt-5 pb-5 pl-20 pr-20 <?php if((bool)$fol['isFollow'] == true){echo 'unfollow-u';}else{echo 'follow-u';} ?>' data-follow='<?php echo $fol['user_id']; ?>'><img src='<?php echo base_url("public/img/icon-tab/add_follow.svg") ?>' width='25'> <span class='txtfollow'><?php if($fol['isFollow'] == true){echo 'Diikuti';}else{echo 'Ikuti';} ?></span></button>
                                            <?php }else{} ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php if (empty($this->uri->segment(2))){$url = 'all-friends';}else{$url = 'profile/'.$this->uri->segment(2).'/all-friends';} if (count($followers) == 20){ ?>
                <div class="modal-footer">
                    <a href="<?php echo site_url($url); ?>" class="mx-auto text-white rounded" style="background: #482d8e;padding: 10px 80px;">Lihat Semua</a>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<?php $pin = $userdata['has_pin']; if ($pin == 1) { ?>
    <?php $this->load->view('include/modal_pin'); ?>
<?php }else{ ?>
<?php } ?>
<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
<script src="<?php echo base_url();?>public/js/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $(document).on("click", "#postMessage", function () {
        var ab = $(this),
            b = new FormData,
            message = ab.siblings("#pmessageas").val(),
            fullname = $("#paltui").attr("data-pname"),
            prof_pict = $("#paltui").attr("data-pimage");
        c = "<li class='self'> <div class='avatar'><img class='d-flex align-self-start mr-20 rounded-circle'src='" + prof_pict + "' width='48' height='48' alt='" + fullname + "' draggable='false'></div> <div class='msg msg-self'> <p>" + message + "</p> <span class='pull-right text-muted'>Just Now</span></small> </div> </li>";
        $(".chat").append(c);
        b.append("user_to", $("#iuswithid").val());
        b.append("message", ab.siblings("#pmessageas").val());
        b.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url + "send_message",
            type: "POST",
            dataType: "JSON",
            cache: !1,
            contentType: !1,
            processData: !1,
            data: b
        }).done(function (a) {
            ab.siblings("#pmessageas").val("");
        }).fail(function () {
            console.log("error")
        }).always(function () {
        })
    });

    $(document).on("click",
        ".message-user",
        function (e) {
            e.preventDefault();
            var boo = $(this);
            var usr_with = boo.attr("data-usr-msg");
            var b = base_url + "detail_messages/" + usr_with;
            if (null == usr_with || "" == usr_with){

            }
            else {
                $('#msgModal').modal('show').find('.modal-body').load(b);
                var bahtml = "<button type='button' class='closes btn-clear' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'><i class='fa fa-arrow-left'></i></span></button><h4><b>" + boo.attr("data-usr-name") + "</b></h4>";
                $('#msgModal').find('.modal-header').html(bahtml);
                $.ajaxSetup({cache: false});
            }
        });
    $(document).on('click', '.btn_list_msg', function(event) {
        event.preventDefault();
        var boo = $(this);
        var usr_with = boo.attr("data-usr-msg");
        var usr_name = boo.attr("data-usr-name");
        var formdata = new FormData();

        formdata.append("user_msg", usr_with);
        formdata.append("csrf_test_name", csrf_value);
        var url = base_url+'message/'+convertToSlug(usr_name);
        var form = $('<form action="' + url + '" method="post">' +
            '<input type="hidden" name="' + csrf_name + '" value="' + csrf_value + '" />' +
            '<input type="hidden" name="usr_msg" value="' + usr_with + '" />' +
            '<input type="hidden" name="usr_name" value="' + usr_name + '" />' +
            '</form>');
        $(boo).append(form);
        form.submit();
    });
    $( "#submit_msg" ).submit(function(event) {
        event.preventDefault();
        var msg = $(".input_msg").val();
        var usr_input = $(".input_usr").val();
        $(".msg_view").append('<div class="text-right p-10 chatright"> <p class="txtchatright msg_view">'+msg+'</p> </div>');
        $(".input_msg").val('');

        var formdata = new FormData();
        formdata.append('message', msg);
        formdata.append('user_to', usr_input);
        formdata.append("csrf_test_name", csrf_value);
        $.ajax({
            url: base_url+'send_message',
            cache: false,
            type: "POST",
            contentType: false,
            processData: false,
            data: formdata
        })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
    });

    function loadMessage() {
        $.ajax({
            url: base_url + "detailMessage",
            type: "POST",
            dataType: "json",
            data: {csrf_test_name: csrf_value},
            beforeSend: function () {

            },
        }).done(function (b) {
            var d = 0;
            $.each(b, function (f, g) {
                "unread" == g.notif_status && d++
            });
            $("#noti_Counter").css({
                opacity: 0
            }).text(d).css({
                top: "-10px",
                opacity: 1
            })
        }).fail(function () {
            console.log("error")
        }).always(function () {
        })
    }
</script>
</body>
</html>

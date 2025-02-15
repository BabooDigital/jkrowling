<nav class="navbar navbar-expand-lg fixed-top baboonav">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url(); ?>"><img alt="Baboo Main Logo" src="<?php echo base_url(); ?>public/img/logo_purple.png" width="100"></a>

        <div>
            <form class="form-inline my-2 my-lg-0" method="get">
                <input autocomplete="off" aria-label="Search" class="search-form form-control search_bbo" name="search_bbo" placeholder="Cari di baboo" type="search" style="background: url('<?php echo base_url('public/img/search.png') ?>') no-repeat right;background-size: 18px;background-position: 95% 50%;">
                <ul class="dropdown-search search_result_bbo hide">
                </ul>
            </form>
        </div>

        <?php if ($this->session->userdata('isLogin') != 200) { ?>

            <div class="pull-right">
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars fa-border"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item mr-30">
                            <a class="nav-link btn-navmasuk" href="<?php echo site_url(); ?>login">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <div class=" nav-link">
                                <a class="btn-navdaftar" href="<?php echo site_url(); ?>login#btndaftar" id="btndaftar"><span class="navdaftar">Daftar</span></a></div>
                        </li>
                    </ul>
                </div>
            </div>

        <?php }else { ?>

            <input type="hidden" id="uid_sess" value="<?php $sess = $this->session->userdata('userData'); echo $sess['user_id']; ?>">
            <input type="hidden" id="name_sess" value="<?php echo $sess['fullname']; ?>">
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars fa-border"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav text-center" style="margin-bottom: -8px;">
                    <li class="nav-item active mt-7">
                        <a class="nav-link  <?php if ($this->uri->segment('1') == '') { echo 'boo-menu-des-active'; }else { echo 'boo-menu-des'; } ?>" href="<?php echo site_url(); ?>"><img src="<?php if ($this->uri->segment('1') == '') { echo base_url('public/img/icon-tab/feed_icon_active.svg'); }else { echo base_url('public/img/icon-tab/feed_icon.svg'); } ?>" height="27"><p class="fs-12px">Explore</p></a>
                    </li>
                    <li class="nav-item mt-7 transaction_container">
                        <div id="transaction_counter" style="top: -10px;cursor: pointer;" title="Ada transaksi pembayaran yang harus kamu bayar"></div>
                        <a class="nav-link <?php if ($this->uri->segment('1') == 'library') { echo 'boo-menu-des-active'; }else { echo 'boo-menu-des'; } ?>" href="<?php echo site_url('library') ?>"><img src="<?php if ($this->uri->segment('1') == 'library') { echo base_url('public/img/icon-tab/library_icon_active.svg'); }else { echo base_url('public/img/icon-tab/library_icon.svg'); } ?>" height="27"><p class="fs-12px">Library</p></a>
                    </li>
                    <li class="nav-item mt-7 noti_Container">
                        <div id="noti_Counter" style="top: -10px;cursor: pointer;" title="Kamu memiliki pemberitahuan baru"></div>
                        <a id="noti_Button" class="nav-link <?php if ($this->uri->segment('1') == 'notification') { echo 'boo-menu-des-active'; }else { echo 'boo-menu-des'; } ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="<?php echo site_url(); ?>public/img/icon-tab/notif_icon.svg" height="27"><p class="fs-12px">Activity</p></a>
                        <div id="notifications">
                            <p class="h5">Pemberitahuan</p>
                            <hr class="mt-10 mb-10">
                            <div class="list-group" id="notification" style="max-height: 430px;overflow: scroll;">
                                <div class="loads-css ng-scope mx-auto"><div style="width:20px;height:20px" class="lds-flickr notif-flickr"><div></div><div></div><div></div></div></div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mt-7">
                        <a class="nav-link <?php if ($this->uri->segment('1') == 'message') { echo 'boo-menu-des-active'; }else { echo 'boo-menu-des'; } ?>" href="<?php echo site_url('message') ?>"><img src="<?php if ($this->uri->segment('1') == 'message') { echo base_url('public/img/icon-tab/message_active.svg'); }else { echo base_url('public/img/icon-tab/message.svg'); } ?>" height="27"><p class="fs-12px">Pesan</p></a>
                    </li>
                    <li class="nav-item mt-5 ml-100 mr-30">
                        <button type="button" class="nav-link btn-newstory" style="cursor: pointer;height: 33px;" data-toggle="modal" data-target="#optionModal"><span><i class="fa fa-pencil-square-o"></i> Tulis Cerita</span></button>
                    </li>
                    <li class="nav-item">
                        <div class="media" style="margin-top: 6px;margin-bottom: -8px;">
                            <a href="<?php echo site_url('profile'); ?>">
                                <?php if ($this->session->userdata('userData')) {
                                    $img = $this->session->userdata('userData'); ?>
                                    <img alt="<?php echo $img['fullname']; ?>" class="d-flex mr-2 rounded-circle" src="<?php if ($img['prof_pict'] == NULL){
                                        echo base_url('public/img/profile/blank-photo.jpg');
                                    }else{
                                        echo $img['prof_pict'];
                                    } ?>" id="profpict" width="40" height="40">
                                <?php } ?>
                            </a>
                            <div class="media-body">
                                <p style="font-weight: bold;"><a href="<?php echo site_url('profile'); ?>" style="font-size: 11pt;"><b id="profname"><?php if ($this->session->userdata('userData')){
                                                $name = $this->session->userdata('userData'); $n = $name['fullname']; $m = explode(' ', $n); echo $m[0]; ?>
                                            <?php } ?></b></a> <span style="display: block;font-size: 8pt;">Online</span></p>
                                <div class="boodropdown">
											<span style="display: block;font-size: 10pt;"><button class="btnsidecaret" onclick="funcDropdown()"><span style="display: block;font-size: 7pt;"><i class="fa fa-angle-down"></i></span>
												<div class="dropdown-content" id="myDropdown">
													<a href="<?php echo site_url(); ?>logout">Keluar</a>
												</div></button></span>
                                </div>
                                <p></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</nav>

<div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="top: 30%;">
        <div class="modal-content" style="border-radius: 35px;height: auto !important;">
            <div class="modal-body" style="padding: 40px 60px;">
                <div class="container">
                    <div class="row">
                        <div class="col-4 text-center">
                            <form action="<?php echo site_url(); ?>createidbook" method="POST">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <button type="submit" class="btnsidecaret" title="Tuliskan buku mu disini..">
                                    <img src="<?php echo base_url('public/img/icon-tab/icon_pen_write.svg'); ?>" width="70">
                                </button>
                            </form>
                            <p class="mt-10 p-select-create">Tulis Buku</p>
                        </div>
                        <div class="col-4 text-center">
                            <button type="button" onclick="location.href=base_url+'upload_mypdf?from=nav_header';" id="btn-pdf-new" class="btnsidecaret" title="Upload cerita mu dalam bentuk PDF File..">
                                <img src="<?php echo base_url('public/img/icon-tab/icon_pdf_write.svg'); ?>" width="70">
                            </button>
                            <p class="mt-10 ml-5 p-select-create">Upload PDF</p>
                        </div>
                        <div class="col-4 text-center">
                            <button type="button" onclick="location.href=base_url+'upload_myepub?from=nav_header';" id="btn-pdf-new" class="btnsidecaret" title="Upload cerita mu dalam bentuk ePub File..">
                                <img src="<?php echo base_url('public/img/icon-tab/icon_epub_write.svg'); ?>" width="70">
                            </button>
                            <p class="mt-10 ml-5 p-select-create">Upload ePub</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

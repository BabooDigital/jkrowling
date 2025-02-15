<?php if (!empty($bookdata)) {
    foreach ($bookdata as $s_book) {
        $urlToUser = url_title($s_book['author_name'], 'dash', true).'-'.$s_book['author_id'];
        $urlToBook = url_title($s_book['title_book'], 'dash', true).'-'.$s_book['book_id']; ?>
        <div class="card mb-15">
            <div class="card-body pt-10 pb-20 pl-30 pr-30">
                <div class="row mb-20 pb-10" style="border-bottom: 1px rgba(225, 225, 225, 0.28) solid;">
                    <div class="media">
                        <a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"><img class="d-flex align-self-start mr-20 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
                                echo base_url('public/img/profile/blank-photo.jpg');
                            }else{
                                echo $s_book['author_avatar']; } ?>" width="50" height="50" alt="<?php
                            echo $s_book['author_name']; ?>"></a>
                        <div class="media-body mt-5">
                            <a data-usr-prf="<?php echo $s_book['author_id']; ?>" data-usr-name="<?php echo url_title($s_book['author_name'], 'dash', true); ?>" href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>" class=""><span class="nametitle2 mb-0 d-block"><?php
                                    echo $s_book['author_name']; ?></span></a>
                            <small>
                                <span><?php echo $s_book['publish_date'] ?></span></small>
                        </div>
                    </div>
                    <?php if (!$this->uri->segment(2)) { ?>
                        <div class="dropdown right-posi">
                            <button class="btn btn-transparent dropdown-toggle float-right" data-toggle="dropdown" type="button"><span class="float-right"><img src="<?php echo base_url('public/img/assets/caret.svg'); ?>"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="drpdwn-caret">
                                    <a href="javascript:void(0);" onclick="editBook(<?php echo $s_book['book_id']; ?>,<?php if($s_book['book_type'] == 2){ echo "'pdf'"; }elseif($s_book['book_type'] == 3){ echo "'epub'"; }else { echo "'false'"; }; ?>)">Edit Buku</a>
                                </li>
                                <li class="drpdwn-caret">
                                    <a href="javascript:void(0);" onclick="deleteBook(<?php echo $s_book['book_id']; ?>)">Hapus Buku</a>
                                </li>
                                <li class="drpdwn-caret">
                                    <a href="javascript:void(0);" onclick="archiveBook(<?php echo $s_book['book_id']; ?>)">Arsipkan (Unpublish)</a>
                                </li>
                            </ul>
                        </div>
                    <?php }else{ ?>
                        <div></div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="media w-100">
                        <div class="media-body">
                            <a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>">
                                <img alt="<?php echo $s_book['title_book']; ?>" class="effect-img d-flex align-self-start mr-20 mb-5 float-left rounded" height="170" src="<?php echo ($s_book['cover_url'] != 'Kosong') ? ($s_book['cover_url'] != null ? $s_book['cover_url'] : base_url('public/img/blank_cover.png')) : base_url('public/img/blank_cover.png'); ?>" width="120" onerror="this.onerror=null;this.src='<?php echo base_url('public/img/blank_cover.png'); ?>';">
                            </a>
                            <span class="card-title nametitle3">
                                <a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>"><h2  class="font-weight-bold" style="font-size: 25px;"><?php echo $s_book['title_book']; ?></h2></a></span>
                            <input type="hidden" name="" class="dbooktitle" value="<?php echo $s_book['title_book']; ?>">
                            <span class="nametitle2" style="display: none;"><?php echo $s_book['author_name']; ?></span>
                            <p class="catbook mt-10 mb-10"><a class="mr-20" href="#"><span class="btn-no-fill"><?php                                        echo $s_book['category']; ?></span></a> <span class="mr-20"><img src="<?php echo base_url('public/img/assets/icon_view.svg'); ?>"> <?php echo $s_book['view_count']; ?></span>
                                <span><img src="<?php echo base_url('public/img/assets/icon_share.svg'); ?>">  <?php echo $s_book['share_count']; ?></span></p>
                            <p class="text-desc-in ptexts text-justify"><?php
                                echo $s_book['desc']; ?> <a class="segment readmore" data-href="<?php
                                echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>" onclick="showLoading()" href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>">Baca</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                <div class="pull-right">
                    <div class="dropdown">
                        <button class="share-btn dropbtn fs-14px" type="button" id="dropShare" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="23" class="mr-10"> Bagikan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropShare">
                            <a class="dropdown-item share-fb" href="javascript:void(0);" data-share="<?php echo $s_book['book_id']; ?>"><img src="<?php echo base_url(); ?>public/img/assets/fb-icon.svg" width="20"> Facebook</a>
                        </div>
                    </div>
                </div>
                <div>
                    <a data-id="<?php echo $s_book['book_id']; ?>" href="javascript:void(0);" id="loveboo<?php echo $s_book['book_id']; ?>" class="mr-30 fs-14px <?php if((bool)$s_book['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>"><img src="<?php if((bool)$s_book['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="mr-10 loveicon" width="27"> <span class="<?php if((bool)$s_book['is_like'] == false){ echo 'txtlike'; }else{ echo 'txtunlike'; } ?>"><?php if((bool)$s_book['is_like'] == false){ echo 'Suka'; }else{ echo 'Batal Suka'; } ?></span></a>
                    <a onclick="showLoading()" href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>#comment" id="commentboo" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>
                </div>
            </div>
        </div>
    <?php } }else { } ?>

<?php if (!empty($bookdata)) {
    foreach ($bookdata as $s_book) { ?>
        <div class="card mb-15">
            <div class="card-body pt-20 pb-20 pl-30 pr-30">
                <div class="row">
                    <div class="media w-100">
                        <div class="media-body">
                            <a href="<?php if ((bool)$s_book['is_pdf'] == true) { echo site_url('book/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('book/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); } ?>"><img alt="<?php echo $s_book['title_book']; ?>" class="effect-img d-flex align-self-start mr-10 float-left rounded" height="170" src="<?php echo ($s_book['cover_url'] != 'Kosong') ? ($s_book['cover_url'] != null ? $s_book['cover_url'] : base_url('public/img/blank_cover.png')) : base_url('public/img/blank_cover.png'); ?>" width="120" onerror="this.onerror=null;this.src='<?php echo base_url('public/img/blank_cover.png'); ?>';"></a> <span class="card-title nametitle3"><a href="<?php if ((bool)$s_book['is_pdf'] == true) { echo site_url('book/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true).'/pdf'); }else{ echo site_url('book/'.$s_book['book_id'].'-'.url_title($s_book['title_book'], 'dash', true)); } ?>"><?php echo $s_book['title_book']; ?></a></span>
                            <input type="hidden" name="" class="dbooktitle" value="<?php echo $s_book['title_book']; ?>">
                            <span class="nametitle2" style="display: none;"><?php echo $s_book['author_name']; ?></span>
                            <?php if (!$this->uri->segment(2)) { ?>
                                <div class="dropdown float-right">
                                    <button class="btn btn-transparent dropdown-toggle float-right" data-toggle="dropdown" type="button"><span class="float-right"><img src="<?php echo base_url('public/img/assets/caret.svg'); ?>"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li class="drpdwn-caret">
                                            <a href="javascript:void(0);" onclick="editBook(<?php echo $s_book['book_id']; ?>,<?php if((bool)$s_book['is_pdf'] == TRUE){ echo "true"; }else { echo "false"; } ?>)">Edit Buku</a>
                                        </li>
                                        <li class="drpdwn-caret">
                                            <a href="javascript:void(0);" onclick="deleteBook(<?php echo $s_book['book_id']; ?>)">Hapus Buku</a>
                                        </li>
                                    </ul>
                                </div>
                            <?php }else{ ?>
                                <div></div>
                            <?php } ?>
                            <br>
                            <br>
                            <p class="catbook"><a class="mr-20" href="#"><span class="btn-no-fill"><?php
                                        echo $s_book['category']; ?></span></a> <span class="mr-20"><img src="<?php echo base_url('public/img/assets/icon_view.svg'); ?>"> <?php echo $s_book['view_count']; ?></span>
                                <span><img src="<?php echo base_url('public/img/assets/icon_share.svg'); ?>">  <?php echo $s_book['share_count']; ?></span></p>
                            <p class="text-desc-in ptexts"><?php
                                echo $s_book['desc']; ?> <a class="segment readmore" data-href="<?php
                                echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>" onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php echo $s_book['book_id']; ?>-<?php echo url_title($s_book['title_book'], 'dash', true); ?>">Lanjut</a></p>
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
                    <a onclick="showLoading()" href="<?php echo site_url(); ?>book/<?php
                    echo $s_book['book_id']; ?>
					-<?php echo url_title($s_book['title_book'], 'dash', true); ?>#comment
					" id="commentboo" class="fs-14px"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>
                </div>
            </div>
        </div>
    <?php } }else { } ?>

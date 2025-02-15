<?php if (!empty($list_content)) {
    foreach ($list_content as $s_book) {
        $urlToUser = url_title($s_book['author_name'], 'dash', true).'-'.$s_book['author_id'];
        $urlToBook = url_title($s_book['title_book'], 'dash', true).'-'.$s_book['book_id']; ?>
        <div class="col-md-6">
            <div class="card mb-15" style="padding: 0 10px 10px;">
                <div class="card-body p-0 p-20">
                    <div class="row mb-15 pb-10" style="border-bottom: 1px rgba(225, 225, 225, 0.28) solid;">
                        <div class="media">
                            <a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"><img class="d-flex align-self-start mr-10 rounded-circle" src="<?php if($s_book['author_avatar'] == NULL){
                                    echo base_url('public/img/profile/blank-photo.jpg');
                                }else{
                                    echo $s_book['author_avatar']; } ?>" width="50" height="50" alt="<?php
                                echo $s_book['author_name']; ?>" onerror="this.onerror=null;this.src='<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>';"></a>
                            <div class="media-body mt-5">
                                <a data-usr-prf="<?php echo $s_book['author_id']; ?>" data-usr-name="<?php echo url_title($s_book['author_name'], 'dash', true); ?>" href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>" class=""><h5 class="nametitle2 profile mb-0"><?php
                                        echo $s_book['author_name']; ?></h5></a>
                                <small>
                                    <span><?php echo $s_book['publish_date'] ?></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="media w-100">
                            <div class="media-body">
                                <input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $s_book['book_id']; ?>">
                                <input type="hidden" name="iaiduui" id="iaiduui" value="<?php $dat = $this->session->userdata('userData'); echo $dat['user_id']; ?>">
                                <a href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>">
                                    <input type="hidden" name="" class="dbooktitle" value="<?php echo $s_book['title_book']; ?>">
                                    <?php if ($s_book['cover_url'] != null): ?>
                                        <img class="effect-img d-flex align-self-start mr-20 float-left" src="<?php echo ($s_book['cover_url'] != 'Kosong') ? ($s_book['cover_url'] != null ? $s_book['cover_url'] : base_url('public/img/blank_cover.png')) : base_url('public/img/blank_cover.png'); ?>" width="120" height="170" alt="<?php
                                        echo $s_book['title_book']; ?>">
                                    <?php endif ?>
                                </a>

                                <h5 class="card-title nametitle3"><a onclick="showLoading()" href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>" id="book-link<?php
                                    echo $s_book['book_id']; ?>"><?php
                                        echo $s_book['title_book']; ?></a></h5>
                                <p class="catbook"><a href="#" class="mr-20"><span class="btn-no-fill"><?php
                                            echo $s_book['category']; ?></span></a> <span class="mr-20"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg"> <?php
                                        echo $s_book['view_count']; ?></span> <span><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg"> <?php
                                        echo $s_book['share_count']; ?></span></p>
                                <p class="text-desc-in text-justify desc<?php
                                echo $s_book['book_id']; ?>"><?php
                                    echo $s_book['desc']; ?> <a class="segment" onclick="showLoading()" href="<?php echo $this->baboo_lib->urlToBook($urlToUser, $urlToBook); ?>" class="readmore" style="color:#7554bd;">Baca</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                        <div class="card-footer text-muted" style="font-size: 0.8em;font-weight: bold;border-radius: 15px;">-->
                <!--                            <div class="pull-right">-->
                <!--                                <div class="dropdown">-->
                <!--                                    <button data-share="--><?php //echo $s_book['book_id']; ?><!--" class="fs-14px share-btn dropdown-toggle dropbtn" onclick="shareBtn()"><img src="--><?php //echo base_url(); ?><!--public/img/assets/icon_share.svg" class="mr-10" width="23" data-toggle="dropdown"> Bagikan-->
                <!--                                        <span class="caret"></span>-->
                <!--                                    </button>-->
                <!--                                    <div id="dropdownShare" class="dropdown-content">-->
                <!--                                        <a href="javascript:void(0);" class="share-fb">Facebook</a>-->
                <!--                                        <a href="#about">Twitter</a>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                            <div>-->
                <!--                                <a data-id="--><?php //echo $s_book['book_id']; ?><!--" href="javascript:void(0);" id="loveboo--><?php //echo $s_book['book_id']; ?><!--" class="mr-30 fs-14px --><?php //if($s_book['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?><!--"><img src="--><?php //if($s_book['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?><!--" class="mr-10 loveicon" width="27"> <span class="--><?php //if($s_book['is_like'] == false){ echo 'txtlike'; }else{ echo 'txtunlike'; } ?><!--">--><?php //if($s_book['is_like'] == false){ echo 'Suka'; }else{ echo 'Batal Suka'; } ?><!--</span></a>-->
                <!--                                <a onclick="showLoading()" href="--><?php //echo site_url(); ?><!--book/--><?php
                //                                echo $s_book['book_id']; ?>
                <!--						---><?php //echo url_title($s_book['title_book'], 'dash', true); ?><!--#comment-->
                <!--						" id="commentboo" class="fs-14px"><img src="--><?php //echo base_url(); ?><!--public/img/assets/icon_comment.svg" class="mr-10" width="25"> Komentar</a>-->
                <!--                            </div>-->
                <!--                        </div>-->
            </div>
        </div>
    <?php } }else {
} ?>

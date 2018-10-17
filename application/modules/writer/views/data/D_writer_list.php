<?php
foreach ($userlist as $usr){
    $urlToUser = url_title($usr['fullname'], 'dash', true).'-'.$usr['user_id'];
    if ($usr['prof_pict'] == null || $usr['prof_pict'] == "") {
        $avatar =  base_url()."public/img/profile/blank-photo.jpg";
    }else{
        $avatar =  $usr['prof_pict'];
    } ?>
    <div class="col-md-4 mb-20">
        <div class="media bg-white writer-media-border">
            <div class="media-first text-center p-10 mt-5" style="width: 48%;">
                <a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>">
                    <img src="<?php echo $avatar; ?>" width="60" height="60" class="rounded-circle mb-10 obj-fit-cover" onerror="this.onerror=null;this.src='<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>';" alt="<?php echo $usr['fullname']; ?>">
                </a>
                <span style="display: block;font-weight: bold;">
                    <a href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>"><?php echo $usr['fullname']; ?></a>
                                    </span>
            </div>
            <div class="media-body writer-body-foll">
                <div class="row">
                    <div class="col-6 text-center">
                        <span style="display: inline-flex;"><img src="<?php echo base_url('public/img/icon-tab/book.svg');?>" width="30"> <span style="font-size: 12pt;"><?php echo $this->baboo_lib->ConvertToK($usr['book_made']); ?></span></span>
                        <span>Buku</span>
                    </div>
                    <div class="col-6 text-center">
                        <span style="display: inline-flex;"><img src="<?php echo base_url('public/img/icon-tab/followers.svg');?>" width="30"> <span style="font-size: 12pt;"><?php echo $this->baboo_lib->ConvertToK($usr['followers']); ?></span></span>
                        <span>Pengikut</span>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-12 text-center mb-20">
                        <?php if ((bool)$usr['isFollow'] == true){ $f_stat = "Diikuti"; $f_class = "unfollow-u"; }else{ $f_stat = "Ikuti"; $f_class = "follow-u"; } $sess_data = $this->session->userdata('userData'); if ($usr['user_id'] == '1' || $usr['user_id'] == $sess_data['user_id']){ echo "<div style='height: 15px;'></div>"; }else{ ?>
                            <button class="writer-btnfollow-f <?php echo $f_class; ?>" data-follow="<?php echo $usr['user_id'] ?>"><img src="<?php echo site_url(); ?>public/img/icon-tab/add_follow.svg" width="30"> <span class="txtfollow"><?php echo $f_stat; ?></span></button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

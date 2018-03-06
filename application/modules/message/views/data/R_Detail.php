<div class="container bodymessage">
    <div class="row form_book">
        <div class="">
            <span class="hidden-lg hidden-md hidden-sm hidden-xs" ><input type="hidden" id="paltui" <?php $dat = $this->session->userdata('userData'); echo "data-pname='".$dat['fullname']."' data-pimage='".$dat['prof_pict']."'"; ?> /></span>
            <?php if($userWith && !empty($userWith)){ ?>
            <span class="hidden-lg hidden-md hidden-sm hidden-xs"><input type="hidden" id="iuswithid" value="<?php echo $userWith["user_id"]; ?>" /></span>
            <?php } ?>
            <div class="loader" style="display: none;"></div>
        </div>
    </div>
</div>
<div id="message_container" class="container bodymessage">
    <?php if (isset($listMessage) && !empty($listMessage)) { ?>
        <?php foreach ($listMessage as $messv) { ?>
            <div class="card-library mb-15"
                 style="height: auto;">
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
                                        <span><?php echo (strlen($messv["message"]) >= 20) ? substr($messv["message"], 0, 20). '...' : $messv["message"] ; ?></span>
                                        <span class="ml-10"><?php echo $messv["chat_time"]; ?></span></small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
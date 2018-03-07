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
<div id="message_container" class="bodymessage">
    <?php $me = $this->session->userdata('userData');
    if (isset($listMessage) && !empty($listMessage)) { ?> 
    <ol class="chat">
        <?php foreach ($listMessage as $messv) { ?>
        <?php if ($me['user_id'] == $messv['user_id']) { ?>
        <li class="self">
            <div class="avatar"><img class="d-flex align-self-start mr-20 rounded-circle"
               src="<?php if (empty($messv["prof_pict"])) {
                   echo base_url(); ?>public/img/profile/pp_wanita2.png<?php } else {
                       echo $messv["prof_pict"];
                   } ?>" width="48" height="48" alt="<?php echo $messv["fullname"]; ?>" draggable="false"></div>
                   <div class="msg msg-self">
                    <p><?php echo $messv["message"]; ?></p>
                    <span class="pull-right text-muted"><?php echo $messv["chat_time"]; ?></span></small>
                </div>
            </li>
            <?php }else { ?>
            <li class="other">
                <div class="avatar"><img class="d-flex align-self-start mr-20 rounded-circle"
                   src="<?php if (empty($messv["prof_pict"])) {
                       echo base_url(); ?>public/img/profile/pp_wanita2.png<?php } else {
                           echo $messv["prof_pict"];
                       } ?>" width="48" height="48" alt="<?php echo $messv["fullname"]; ?>" draggable="false"></div>
                       <div class="msg">
                        <p><?php echo $messv["message"]; ?></p>
                        <span class="pull-right text-muted"><?php echo $messv["chat_time"]; ?></span></small>
                    </div>
                </li>
                <?php } ?>
                <?php } ?>
            </ol>
            <?php } ?>
        </div>
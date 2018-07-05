<?php $this->load->view('navbar/D_navbar'); ?>
<div class="container babooidin">
	<div class="row">
		<!-- Left Side -->
		<div class="col-md-4">
			<div class="">
				<div class="card mb-15">
					<div class="text-left pr-20 pl-20">
						<div class="col-md-12" style="padding: 10px;">
							Pesan Masuk <!-- <a href="<?php echo site_url('message/new') ?>" class="create-msg" style="cursor: pointer;height: 33px;"><span><i class="fa fa-pencil-square-o"></i> Pesan Baru</span></a> -->
							<hr>
							<form class="form-inline">
								<input aria-label="Search" class="search-msg form-control search_message_form" id="search_user" placeholder="Cari Pesan" type="search">
							</form>
							<hr>
						</div>
					</div>
					<div class="list-group" style="height: 380px;overflow-y:scroll;">
						<?php if (!$this->uri->segment(2)): ?><?php if (isset($listMessage) && !empty($listMessage)) { ?><?php foreach ($listMessage as $messv) { ?>
						<div class="message-user" data-usr-name="<?php echo $messv['fullname']; ?>">
							<a class="list-group-item list-group-item-action flex-column align-items-start btn_list_msg" data-usr-msg="<?php echo $messv['user_id']; ?>" data-usr-name="<?php echo $messv['fullname']; ?>" href="test" id="btn_list_msg">
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;">
								<div class="media" style="width: 100%;">
									<img alt="<?php echo $messv['fullname']; ?>" class="d-flex align-self-start mr-20 rounded-circle" height="48" src="<?php if (empty($messv['prof_pict'])) { echo base_url(); ?>public/img/profile/blank-photo.jpg <?php } else { echo $messv['prof_pict']; } ?>" width="48">
									<div class="media-body">
										<span class="nametitle2"><?php echo $messv['fullname']; ?></span><br>
										<span class="text-muted fontkecil"><?php echo (strlen($messv['user_latest_message']) >= 31) ? substr($messv['user_latest_message'], 0, 30) : $messv['user_latest_message'] . '...'; ?></span>
										<p class="text-muted fontkecil "><?php echo $messv['user_chat_time']; ?></p>
										<p></p>
									</div>
								</div>
							</div></a>
						</div><?php } ?><?php } ?><?php else: ?><?php if (isset($listMessageDetail) && !empty($listMessageDetail)) { ?><?php foreach ($listMessageDetail as $messv) { ?>
						<div class="message-user" data-usr-name="<?php echo $messv['fullname']; ?>">
							<a class="list-group-item list-group-item-action flex-column align-items-start btn_list_msg" data-usr-msg="<?php echo $messv['user_id']; ?>" data-usr-name="<?php echo $messv['fullname']; ?>" href="test" id="btn_list_msg">
							<div class="row mb-10" style="padding: 0px 10px 0px 10px;text-align: left;">
								<div class="media" style="width: 100%;">
									<img alt="<?php echo $messv['fullname']; ?>" class="d-flex align-self-start mr-20 rounded-circle" src="<?php if (empty($messv['prof_pict'])) { echo base_url(); ?>public/img/profile/blank-photo.jpg<?php } else { echo $messv['prof_pict']; } ?>" width="48" height="48">
									<div class="media-body">
										<span class="nametitle2"><?php echo $messv['fullname']; ?></span>
												<p class="text-muted fontkecil"><?php echo (strlen($messv['user_latest_message']) >= 31) ? substr($messv['user_latest_message'], 0, 30) : $messv['user_latest_message'] . '...'; ?>
												</p>
										<span class="text-muted fontkecil" style="margin-top: -25px;"><?php echo $messv['user_chat_time']; ?></span>
									</div>
								</div>
							</div></a>
						</div><?php } ?><?php } ?><?php endif ?>
					</div>
				</div><!-- Trending -->
			</div>
		</div>
		<div class="col-md-8 tmlin">
			<div class="">
				<?php if ($this->uri->segment(2)): ?>
				<div class="card mb-15">
					<div class="card-header"><b><?php if ($this->uri->segment(2) == 'new'): ?>Kepada: <input name="search_user_new" placeholder="Ketik nama orang" type="text"> <?php else: ?> <?php echo $this->input->post('usr_name'); ?> <?php endif ?></b></div>
					<div class="card-body p-0 rowchat">
						<ul class="list-group list-group-flush" id="latestreadbook"></ul><br>
						<?php foreach ($listMessage as $msg_detail): ?>
						<div class="<?php if($msg_detail['user_id'] == $this->session->userdata('userData')['user_id']) { echo 'text-right p-10 chatright'; }else{ echo 'text-left p-10 chatleft'; } ?>">
							<p class="<?php if($msg_detail['user_id'] == $this->session->userdata('userData')['user_id']) { echo 'txtchatright'; }else{ echo 'txtchatleft'; } ?>"><?php echo $msg_detail['message']; ?></p>
						</div><?php endforeach ?>
						<div class="msg_view">
							<!-- <div class="text-right p-10 chatright">
                                        <p class="txtchatright msg_view">View Message</p>
                                    </div> -->
						</div>
					</div>
					<div class="card-header">
						<form id="submit_msg" name="submit_msg">
							<input class="form-msg input_usr" name="input_usr" placeholder="Tulis pesan disini" type="hidden" value="<?php echo html_escape($this->input->post('usr_msg')); ?>"> <input class="form-msg input_msg" name="input_msg" placeholder="Tulis pesan disini" type="text"> <button name="submit" type="submit" value="submit" style="background: none;border: none;"><img src="<?php echo base_url('public/img/assets/icon_sendcomm.png'); ?>" width="46" height="46"></button>
						</form>
					</div>
				</div>
				<?php else: ?>
					<div class="card mb-15" align="center" style="height: 500px;">
						<div class="mt-200">
							<img src="<?php echo base_url('') ?>public/img/msg-blank.svg">
							<div class='text-center'> <h4><b></b></h4> <p style='font-size: 12pt;'>Yuk Mulai chatting di Baboo</p></div>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div><?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
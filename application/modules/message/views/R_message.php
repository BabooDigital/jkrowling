<style>

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

::-webkit-scrollbar {
	min-width: 12px;
	width: 12px;
	max-width: 12px;
	min-height: 12px;
	height: 12px;
	max-height: 12px;
	background: #e5e5e5;
	box-shadow: inset 0px 50px 0px rgba(82,179,217,0.9), inset 0px -52px 0px #fafafa;
}

::-webkit-scrollbar-thumb {
	background: #bbb;
	border: none;
	border-radius: 100px;
	border: solid 3px #e5e5e5;
	box-shadow: inset 0px 0px 3px #999;
}

::-webkit-scrollbar-thumb:hover {
	background: #b0b0b0;
	box-shadow: inset 0px 0px 3px #888;
}

::-webkit-scrollbar-thumb:active {
	background: #aaa;
	box-shadow: inset 0px 0px 3px #7f7f7f;
}

::-webkit-scrollbar-button {
	display: block;
	height: 26px;
}
</style>
<body id="pageContent">
	<div class="bodymessage">
			<div class="lds-css ng-scope" style="display: none;">
			<div class="lds-eclipse" style="width:100%;height:100%">
				<img class="img-loading" src="<?php echo base_url('public/img/splash_.png'); ?>" width="90">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
	<input type="checkbox" id="toggle-right">
	<div class="page-wrap">
		<nav class="navbar navbar-expand-lg fixed-top bg-white" style="height:50px;">
			<div class="container bodymessage">
				<a class="menu-page <?php if ($this->uri->segment('1') == 'timeline') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('timeline'); ?>" id="tab_page" dat-title="Timeline"><i class="fa fa-arrow-left fa-2x"></i></a>

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
	<div class="container bodymessage" style="height: 100vh;">
		<?php if (isset($listMessage) && !empty($listMessage)) { ?>
		<div class="paddingbook search_message">
			<form class="">
				<input id="search_user" class="form-search search_message_form" type="text" placeholder="Cari pesan masuk"
				aria-label="Search">
			</form>
		</div>
		<br/>
		<?php foreach ($listMessage as $messv) { ?>
		<div class="card-library mb-15 message-user" data-usr-msg="<?php echo $messv["user_id"]; ?>"
			data-usr-name ="<?php echo $messv["fullname"]; ?>" style="height: auto;">
			<div class="list-group">
				<div class="row mb-10" style="padding: 0px 10px 0px 10px;">
					<div class="media">
						<img class="d-flex align-self-start mr-20 rounded-circle"
						src="<?php if (empty($messv["prof_pict"])) {
							echo base_url(); ?>public/img/profile/blank-photo.png<?php } else {
								echo $messv["prof_pict"];
							} ?>" width="48" height="48" alt="Generic placeholder image">
							<div class="media-body mt-5">
								<h5 class="card-title nametitle2"><?php echo $messv["fullname"]; ?></h5>
								<p class="text-muted" style="margin-top:-10px;">
									<small>
										<span><?php echo (strlen($messv["user_latest_message"]) >= 31) ? substr($messv["user_latest_message"], 0, 30) : $messv["user_latest_message"] . '...'; ?></span>
										<span class="ml-10"><?php echo $messv["user_chat_time"]; ?></span></small>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php }else { ?>
					<div class="text-center mt-50">
						<img class="mr-20 mb-30" src="<?php echo base_url('public/img/message_empty.png'); ?>">
						<h4>Pesan kosong</h4>
					</div>
				<?php } ?>
			</div>
			</div>
			<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="border:none !important;">

						<div class="modal-header bg-white">
							<button type="button" class="closes" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
							</button>
						</div>

						<div class="modal-body bg-white mb-10" style="height: 100px;">
						</div>
						<div class="modal-footer navbar navbar-light fixed-bottom  bg-white">
							<span class="w-100">
								<input id="pmessageas" placeholder="Tulis sesuatu.." type="text" class="frmcomment commentform"
								style="width: 80%;height: 45px;">
								<a href="javascript:void(0)" id="postMessage" class="btn Rpost-message-parap"
								data-p-id="390">Kirim</a>
							</span>
						</div>
					</div><!-- modal-content -->
				</div><!-- modal-dialog -->
			</div><!-- modal -->

			<?php if (isset($js)): ?>
				<?php echo get_js($js) ?>
			<?php endif ?>
		</body>
		</html>
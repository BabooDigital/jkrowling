<?php 
echo "<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=".APPID_FB."';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";
?>
<style>
.modal {
	z-index: 5000 !important;
}
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
	<div class="lds-css ng-scope" style="display: none;"><div style="width:100%;height:100%" class="lds-eclipse"><img src="<?php echo base_url('public/img/splash_.png'); ?>" width="90" class="img-loading"><div></div><div></div><div></div><div></div><div></div></div></div>
	<?php $this->load->view('navbar/R_navbar'); ?>
	<div id="floating-btn">
		<a href="<?php echo site_url(); ?>create_mybook" class="floating-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></a>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div>
		<div class="babooid" align="center">
			<div class="row">
				<input type="hidden" id="iaiduui" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
			</div>
			<div class="profile">
				<div class="p-10 mt-10">
					<div class="profile_avatar">
						<img alt="<?php echo $userdata['fullname']; ?>" class="rounded-circle ml-20" height="80" src="<?php if($userdata['prof_pict'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $userdata['prof_pict']; } ?>" style="border: .5px #7554bd solid;padding: 3px;object-fit: cover;" onerror="this.onerror=null;this.src='<?php echo base_url('public/img/profile/blank-photo.jpg'); ?>';" width="80">
						<br>
						<p class="label_name"><?php echo $userdata['fullname']; ?></p>
						<p class="profile_location"><?php echo $userdata['address']; ?></p>
						<p class="fs-14px quote"><?php echo $userdata['about_me']; ?></p>
						<hr>
						<div class="info">
							<img src="<?php echo base_url('') ?>public/img/icon-tab/book.svg"><b class="label_info">
								<?php echo $userdata['book_made']; ?></b>
								<p class="text-muted">Buku</p>
							</div>
							<div class="info">
								<img src="<?php echo base_url('') ?>public/img/icon-tab/followers.svg"><b
								class="label_info"> <?php echo $userdata['followers']; ?></b>
								<p class="text-muted">Teman</p>
							</div>
							<div class="info_last">
								<img src="<?php echo base_url('') ?>public/img/icon-tab/sale.svg"><b
								class="label_info"><?php echo $userdata['book_sold']; ?></b>
								<p class="text-muted">Terjual</p>
							</div>
							<br>
							<input type="hidden" id="thisUsr" value="<?php echo $userdata['user_id']; ?>">
							<div class="profile_message">
								<a href="javascript:void(0);" class="btn-profile message-user" data-usr-msg="<?php echo $userdata["user_id"]; ?>" data-usr-name ="<?php echo $userdata["fullname"]; ?>"><img
									src="<?php echo base_url('') ?>public/img/icon-tab/icon_message.svg" width="20"> Kirim Pesan
								</a>
								<?php if($userdata['isFollow'] == false) { ?>
								<a href="javascript:void(0);" class="btn-message follow-u" data-follow="<?php echo $userdata['user_id']; ?>">
									<img src="<?php echo base_url('') ?>public/img/icon-tab/add_follow.svg" width="25">
									<span class="txtfollow">Ikuti</span>
								</a>
								<?php }else { ?>
								<a href="javascript:void(0);" class="btn-message unfollow-u" data-follow="<?php echo $userdata['user_id']; ?>">
									<span class="txtfollow">Diikuti</span>
								</a>
								<?php } ?>
							</div>
							<br>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
<!-- <div class="babooid mb-60" style="overflow-y: hidden;overflow-x: hidden;">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div id="r_publishdatas" class="w-100">
						<div class="loaderpubl mx-auto" style="display: none;"></div>

					</div>
					<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="babooid" style="overflow-y: hidden;overflow-x: hidden;">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="w-100" id="r_publishdatas">
						<?php $this->load->view('data/R_other_profile', $bookdata);
						if ($bookdata == null || $bookdata == [] || empty($bookdata)) {
							echo "<div class='container first_login mt-30'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'> <img src='".base_url('public/img/first_login.png')."' width='190'> </div> <div class='text-center'> <h4><b>Teman mu ini belum membuat buku.</b></h4></div> </div> </div> </div> ";
						}
						?>
					</div>
					<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
				</div>
			</div>
		</div>
	</div>
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

<!-- JS -->

<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
</body>
</html>
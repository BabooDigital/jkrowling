<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
.list-group-item.active {
	z-index: 2;
	color: #fff;
	background-color: #7661ca;
}
.bgboo {
	background: #edf0f3;
}
.title_out {
	font-weight: 900;
}
.desc_outs {
	font-weight: 600;
}
.pcat {
	font-size: 10pt;
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
.modal-backdrop
{
	opacity:0.5 !important;
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

.closes {
	background: none;
	font-size: 2rem;
	line-height: 1;
	opacity: .5;
	border: none;
	position: absolute;
	right: 10px;
}
.list-group-item.disabled, .list-group-item:disabled {
	background: none;
}
.right-posi {
	right: 10px !important;
}
.show {
	display: inline;
}
.textp > p {
	text-indent: 10%;
}
.modal-backdrop ~ .modal-backdrop
{
	z-index : 1051 ;
}
.modal-backdrop ~ .modal-backdrop ~ .modal-backdrop
{
	z-index : 1052 ;
}
.modal-backdrop ~ .modal-backdrop ~ .modal-backdrop ~ .modal-backdrop
{
	z-index : 1053 ;
}

.mentions-input-box {
  position: relative;
  background: #fff;
  width: 80%;
  border-radius: 35px;
  float: left;
}

.mentions-input-box textarea {
  width: 80%;
  display: block;
  height: 18px;
  padding: 9px;
  overflow: hidden;
  background: transparent;
  position: relative;
  outline: 0;
  resize: none;

  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

.mentions-input-box .mentions-autocomplete-list {
  display: none;
  background: #fff;
  border: 1px solid #b2b2b2;
  position: absolute;
  left: 0;
  bottom: 40px;
  right: 0;
  z-index: 1070;

  border-radius:5px;
  border-top-right-radius:0;
  border-top-left-radius:0;

  -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.148438);
     -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.148438);
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.148438);
}

.mentions-input-box .mentions-autocomplete-list ul {
    margin: 0;
    padding: 0;
}

.mentions-input-box .mentions-autocomplete-list li {
  background-color: #fff;
  padding: 0 5px;
  margin: 0;
  width: auto;
  border-bottom: 1px solid #eee;
  height: 26px;
  line-height: 26px;
  overflow: hidden;
  cursor: pointer;
  list-style: none;
  white-space: nowrap;
}

.mentions-input-box .mentions-autocomplete-list li:last-child {
  border-radius:5px;
}

.mentions-input-box .mentions-autocomplete-list li > img,
.mentions-input-box .mentions-autocomplete-list li > div.icon {
  width: 16px;
  height: 16px;
  float: left;
  margin-top:5px;
  margin-right: 5px;
  -moz-background-origin:3px;

  border-radius:3px;
}

.mentions-input-box .mentions-autocomplete-list li em {
  font-weight: bold;
  font-style: none;
}

.mentions-input-box .mentions-autocomplete-list li:hover,
.mentions-input-box .mentions-autocomplete-list li.active {
  background-color: #f2f2f2;
}

.mentions-input-box .mentions-autocomplete-list li b {
  background: #ffff99;
  font-weight: normal;
}

.mentions-input-box .mentions {
  position: absolute;
  left: 1px;
  right: 0;
  top: 1px;
  bottom: 0;
  padding: 9px;
  color: #fff;
  overflow: hidden;

  white-space: pre-wrap;
  word-wrap: break-word;
}

.mentions-input-box .mentions > div {
  color: #fff;
  white-space: pre-wrap;
  width: 100%;
}

.mentions-input-box .mentions > div > strong {
  font-weight:normal;
  background: #d8dfea;
}

.mentions-input-box .mentions > div > strong > span {
  filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);
}

.fix-comm {
	display: none;
	z-index: 1060;
    background: #f5f8fa;
}

.mores {
	display: none;
}

.coment_ {
	border-bottom: 1px #dddddd solid;
}

#pdf-main-container {
	width: 95%;
	margin: 20px auto;
}

#pdf-loader {
	display: none;
	text-align: center;
	color: #999999;
	font-size: 13px;
	line-height: 100px;
	height: 100px;
}
#pdf-contents {
	display: none;
}

#pdf-meta {
	overflow: hidden;
	margin: 0 0 20px 0;
}

#pdf-buttons {
	float: left;
}

#page-count-container {
	float: right;
}

#pdf-current-page {
	display: inline;
}

#pdf-total-pages {
	display: inline;
}

#pdf-canvas {
	width: 100%;
	border: 1px solid rgba(0,0,0,0.2);
	box-sizing: border-box;
}

#page-loader {
	height: 100px;
	line-height: 100px;
	text-align: center;
	display: none;
	color: #999999;
	font-size: 13px;
}

.btn-nav-pdf {
	background: #fcfcff;
	border: 1px #c3c3c3 solid;
	border-radius: 6px;
}

</style>
<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->
<div class="bannerPopUp"></div>
<!-- BANNER POPUP BUTTON PLAYSTORE MOBILE -->

<div data-content-category='Book &gt; <?php echo $detail_book['data']['category']['category_name']; ?>' data-content-ids='<?php echo $detail_book['data']['book_info']['book_id']; ?>' data-content-name='<?php echo $detail_book['data']['book_info']['title_book']; ?>' data-content-type='<?php echo $m_type; ?>' data-page-type='ViewContent' data-value='<?php echo $m_book_price; ?>' id='fbpixel'></div>

<input type="checkbox" id="toggle-right">
<div class="page-wrap wrapper">
	<div id="banner">
		<nav class="navbar navbar-expand-lg fixed-top mb-20 bgboo" id="navscroll" style="height: 60px;">
			<div class="container">
				<form class="navbar-brande">
					<a class="clear-btn backfrmbook" href="javascript:void(0);"><i class="fa fa-arrow-left"></i> &nbsp;</a>
				</form>
				<label class="profile-toggle" for="toggle-right"><img src="<?php echo base_url('') ?>/public/img/icon-tab/more_icon.svg"></label>
			</div>
		</nav>
	</div>
	<div class="profiles">
		<label class="close" for="toggle-right" style="height: 45px;">&nbsp;&nbsp;&times;</label>
		<div class="text-center p-10">
			<?php
			if ((bool)$detail_book['data']['book_info']['is_pdf'] != true) { ?>
				<div class="mt-20 spadding">
				<?php }else{
					function incrementalHash($len = 5){$charset = "0123456789abcdefghijklmnopqrstuvwxyz"; $base = strlen($charset); $result = ''; $now = explode(' ', microtime())[1]; while ($now >= $base){$i = $now % $base; $result = $charset[$i] . $result; $now /= $base; } return substr($result, -5); }
					$generateDate = $detail_book['data']['book_info']['epoch_time'];
					$datapassword = 'ID#' . $detail_book['data']['book_info']['book_id'] . '#' . $detail_book['data']['book_info']['title_book'] . '#' . strtotime($generateDate);
					$password = hash_hmac('sha512', $datapassword, strtotime($generateDate)).incrementalHash(); ?>
					<div class="mt-20 spadding" dat-cpss="<?php echo $password; ?>">
					<?php } ?>
				<p><img class="cover_image rounded" height="180" src="<?php echo $detail_book['data']['book_info']['cover_url']; ?>" width="130"></p>
			</div>
			<div class="mt-15">
				<h1 class="title_book" style="font-weight: bold;color: #141414;font-size: 25px;"><?php echo $detail_book['data']['book_info']['title_book']; ?></h1>
				<div class="text-center mb-15">
					<p class="text-muted pcat"><b class="cbookd"><?php echo $detail_book['data']['category']['category_name']; ?></b> &#8226; Dibaca <span class="boview"><?php echo $this->thousand_to_k->ConvertToK($detail_book['data']['book_info']['view_count']); ?></span> kali</p>
				</div>
			</div>
			<div class="mt-15">
				<button type="button" class="btn-share-ch share-fb w-100 pt-10 pb-10"><img src="<?php echo base_url('public/img/assets/share_chapter.svg'); ?>"> Bagikan Buku</button>
			</div>
		</div>
		<div class="mt-10">
			<?php if ((bool)$detail_book['data']['book_info']['is_pdf'] == true) { ?>
				<div class="mt-10 mb-100 pl-10 pr-10 desc_pdf">
					<?php echo $detail_book['data']['book_info']['desc']; ?>
				</div>
			<?php }else{ ?>
				<p class="text-muted ml-20">Daftar Chapter</p>
				<div class="list-group mt-10 mb-90 pl-10 pr-10" id="">
					<?php $uri = $this->uri->segment(3); $uri4 = $this->uri->segment(5); $usDat = $this->session->userdata('userData');
					foreach ($chapt_data as $ch) {
						$chid = $ch['chapter_id'];
						$notfree = '';
						$imgnotfree = '';
						$urlnotfree = site_url('penulis/'.$detail_book['data']['author']['author_id'].'-'.url_title($detail_book['data']['author']['author_name'], '-', true).'/'.$uri.'/chapter/'.$ch['chapter_id']);
						if ((bool)$ch['chapter_free'] == false && $usDat['user_id'] != $detail_book['data']['author']['author_id'])	 {
							$notfree = ' text-muted';
							$imgnotfree = "<img src='".base_url('public/img/assets/icon_sell.png')."' width='20' class='mt-5 float-right'>";
							$urlnotfree = 'javascript:void(0);';
						}else if($usDat['user_id'] == $detail_book['data']['author']['author_id'] && $ch['status_publish']['status_id'] != 2){
							$imgnotfree = "<img src='".base_url('public/img/assets/icon_draft_pub.png')."' width='40' class='img-fluid float-right'>";
						}
					 ?>
						<a href="<?php echo $urlnotfree; ?>" class="borbot bornone bg-none list-group-item list-group-item-action chpt <?php if ($uri4 == $chid){echo 'active';} echo $notfree; ?>"><h2 class="font-weight-bold" style="font-size: 15px;"><?php echo $ch['chapter_title']; echo $imgnotfree; ?></h2></a>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
		<?php $usDat = $this->session->userdata('userData'); if ($detail_book['data']['book_info']['is_free'] == true || $usDat['user_id'] == $detail_book['data']['author']['author_id']) { ?>
		<div></div>
		<?php }else{ ?>
		<div class="bg-white" style="width: 250px;height: auto;position: fixed;bottom: 0;padding: 5px 15px;">
			<small>Versi Buku Full</small>
			<div>
				<?php if ($detail_book['data']['book_info']['status_payment'] == 'pending') {
					$statusp = 'pend';
				}else{
					$statusp = 'done';
				}  ?>
				<p><img src="<?php echo site_url('public/img/assets/icon_sell.png'); ?>" width="20" class="mr-5"><span style="color: #7661ca;font-weight: 600;">Rp <span class="priceb"><?php echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?></span></span> <button type="button" class="float-right btn-transparant buyfullbook" stats-book='<?php echo $statusp; ?>' style="margin-top: -10px;padding: 3px 30px;border-radius: 35px;background: #7661ca;color: #fff;">Beli</button></p>
			</div>
		</div>
		<?php } ?>
	</div><br>
	<br>
	<div class="container mt-30 mb-70">
		<?php if ($detail_book['data']['book_info']['book_type'] != 1) { ?>
		<div class="row mb-30">
			<div class="col-12">
				<div class="text-center mb-15">
					<p class="h1" style="font-weight: 900;"><?php echo $detail_book['data']['book_info']['title_book']; ?></p>
					<p class="text-muted pcat"><b class="cbookd"><?php echo $detail_book['data']['category']['category_name']; ?></b> &#8226; Dibaca <span class="boview"><?php echo $detail_book['data']['book_info']['view_count']; ?></span> kali</p>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<div class="row mb-30" style="display: none;">
			<div class="col-12">
				<div class="text-center mb-15">
					<p class="h1" style="font-weight: 900;"><?php echo $detail_book['data']['book_info']['title_book']; ?></p>
					<p class="text-muted pcat"><b class="cbookd"><?php echo $detail_book['data']['category']['category_name']; ?></b> &#8226; Dibaca <span class="boview"><?php echo $detail_book['data']['book_info']['view_count']; ?></span> kali</p>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if ((bool)$detail_book['data']['book_info']['is_pdf'] != true) { ?>
			<?php $sess = $this->session->userdata('userData'); if ($detail_book['data']['book_info']['book_type'] != 1) { ?>
				<div class="row">
				<?php }else{ ?>
					<div class="row" style="display: none;">
					<?php } ?>
					<div class="col-12">
						<div class="media mb-20">
							<img alt="<?php echo $detail_book['data']['author']['author_name']; ?>" class="d-flex align-self-start mr-10 rounded-circle authimg" height="55" src="<?php if($detail_book['data']['author']['avatar'] == NULL){ echo base_url('public/img/profile/blank-photo.jpg'); }else{ echo $detail_book['data']['author']['avatar']; } ?>" width="55">
							<div class="media-body mt-5">
								<div style="display: flex;"><span class="nametitle2 mr-10"><a href="<?php echo site_url('penulis/'.$detail_book['data']['author']['author_id'].'-'.url_title($detail_book['data']['author']['author_name'], 'dash', true)); ?>" class="author_name"><?php echo $detail_book['data']['author']['author_name']; ?></a></span>
									<?php if ($sess['user_id'] == $detail_book['data']['author']['author_id']) { ?>
										<div></div>
									<?php }else{ ?>
										<a data-follow="<?php echo $detail_book['data']['author']['author_id']; ?>" class="btn-topup <?php if ($detail_book['data']['author']['is_follow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow" style="font-size: 12px;"><?php if ($detail_book['data']['author']['is_follow'] == false) { echo "Ikuti"; }else{ echo "Diikuti"; } ?></span></a>
									<?php } ?>
								</div>
								<p style="margin-top: -5px;"><span class="text-muted"><small><?php echo $detail_book['data']['book_info']['publish_date']; ?></small></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			<?php }else{ ?>
				<div></div>
			<?php } ?>
		<input id="iaidubi" name="iaidubi" type="hidden" value="<?php echo $detail_book['data']['book_info']['book_id']; ?>"> <input id="iaiduui" name="iaiduui" type="hidden" value="<?php $dat = $this->session->userdata('userData'); echo $dat['user_id']; ?>">
                    <?php if ($detail_book['data']['book_info']['book_type'] != 3){ ?>
                    <?php $usDat = $this->session->userdata('userData'); if ($detail_book['data']['chapter']['chapter_free'] == true  || $usDat['user_id'] == $detail_book['data']['author']['author_id']) { ?>
                        <div class="row">
                            <div class="col-12 text-center mt-10">
                                <span class="h5" style="font-weight: 900;"><?php echo $detail_book['data']['chapter']['chapter_title']; ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <?php if ((bool)$detail_book['data']['book_info']['is_pdf'] != true) { ?>
                                <div class="col-12">
                                    <div class="detailbook">
                                        <?php
                                        foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {
                                            $text = strip_tags($book['paragraph_text']);
                                            $datas .= "<div  class='mb-15 textp' id='detailStyle' data-id-p='".$book['paragraph_id']."'>".ucfirst($book['paragraph_text'])."</div>";
                                        }
                                        echo $datas;
                                        ?>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div id="pdf-main-container" style="margin-top: -19px;">
                                    <div id="pdf-loader">Mohon tunggu..</div>
                                    <div id="pdf-contents">
                                        <canvas id="pdf-canvas"></canvas>
                                        <div id="page-loader">Loading page ...</div>
                                        <div id="pdf-meta">
                                            <div id="page-count-container">Halaman <div id="pdf-current-page"></div> dari <div id="pdf-total-pages"></div></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?php if (!empty($chapt_count) && $chapt_count > 1) { ?>
                            <div class="row" id="paging-chapter">
                            <?php if (!isset($next_ch) && empty($next_ch)) {$next_paging = "display:none;"; }else if (!isset($prev_ch) && empty($prev_ch)) {$prev_paging = "display:none;"; } ?>
                            <div class='col-4'>
                                <a href="<?php echo site_url('penulis/'.$detail_book['data']['author']['author_id'].'-'.url_title($detail_book['data']['author']['author_name'], '-', true).'/'.$uri.'/chapter/'.$prev_ch); ?>" class='pull-left  btn-next-chapt' style="<?php echo $prev_paging ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                            </div>
                            <div class='col-4'>
                                <span class='w-100'> </span>
                            </div>
                            <div class='col-4'>
                                <a href="<?php echo site_url('penulis/'.$detail_book['data']['author']['author_id'].'-'.url_title($detail_book['data']['author']['author_name'], '-', true).'/'.$uri.'/chapter/'.$next_ch); ?>" class='pull-right btn-next-chapt' style="<?php echo $next_paging ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        <?php }else { echo ""; } ?>
                        </div>
                        <div class="row mt-20" style="width:90%;margin: auto">
                            <div class="text-center mx-auto" style="overflow: hidden;">
                                <?php echo $this->load->view('ads/360_side_ad'); ?>
                            </div>
                        </div>
                    <?php }else{ ?>
                    <?php } ?>
                    <div class="container text-center">

                        <?php if ((bool)$detail_book['data']['book_info']['is_pdf'] != true) { ?>
                            <div class="row">
                                <div class="col-12">
                                    <span class="h3">Versi Buku Full</span>
                                    <img src="<?php echo site_url('public/img/assets/icon_sell.png'); ?>" width="20" class="mr-5"><span style="color: #7661ca;font-weight: 600;">Rp <span><?php echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?></span></span>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div id="pdf-main-container" style="margin-top: -19px;">
                                <div id="pdf-loader">Mohon tunggu..</div>
                                <div id="pdf-contents">
                                    <canvas id="pdf-canvas"></canvas>
                                    <div id="page-loader">Loading page ...</div>
                                    <div id="pdf-meta">
                                        <div id="page-count-container">Halaman <div id="pdf-current-page"></div> dari <div id="pdf-total-pages"></div></div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row mt-15">
                            <!-- <div class="col-12">
                                <button type="button" class="float-right btn-transparant buyfullbook w-100" style="margin-top: -10px;padding: 10px 30px;border-radius: 35px;background: #7661ca;color: #fff;">Beli</button>
                            </div> -->
                        </div>
                    </div>
                </div>
        <?php }else{ ?>
        <div class="app">
            <div class="sidebar-wrapper out">
                <div class="sidebar">
                    <div class="tab-list">
                        <a data-tab="toc" class="item">
                            <i class="icon material-icons">list</i>
                        </a>
                        <a data-tab="search" class="item">
                            <i class="icon material-icons">search</i>
                        </a>
                        <a data-tab="info" class="item">
                            <i class="icon material-icons">info</i>
                        </a>
                        <a data-tab="settings" class="item">
                            <i class="icon material-icons">settings</i>
                        </a>
                    </div>
                    <div class="tab-container mb-50">
                        <div class="tab" data-tab="toc">
                            <div class="toc-list"></div>
                        </div>
                        <div class="tab search" data-tab="search">
                            <div class="search-bar">
                                <input type="text" autocomplete="off" placeholder="Search book..." class="search-box">
                                <button class="search-button">
                                    <i class="icon material-icons">search</i>
                                </button>
                            </div>
                            <div class="search-results"></div>
                        </div>
                        <div class="tab info" data-tab="info">
                            <div class="cover-wrapper">
                                <img src="" alt="" class="cover">
                            </div>
                            <div class="title"><?php echo $detail_book['data']['book_info']['title_book']; ?></div>
                            <div class="series-info">
                                <span class="series-name"></span>
                                <span class="divider"> - </span>
                                <span class="series-index"></span>
                            </div>
                            <div class="author"><?php echo $detail_book['data']['author']['author_name']; ?></div>
                            <div class="description"><?php echo $detail_book['data']['book_info']['desc']; ?></div>
                        </div>
                        <div class="tab settings" data-tab="settings">
                            <div class="setting">
                                <div class="setting-label">Themes</div>
                                <div class="setting-content theme chips" data-chips="theme">
                                    <div class="theme chip" style="background: #fff; color: #000;" data-default="true" data-value="#fff;#000">A</div>
                                    <div class="theme chip" style="background: #000; color: #fff;" data-value="#000;#fff">A</div>
                                    <div class="theme chip" style="background: #333; color: #eee;" data-value="#333;#eee">A</div>
                                    <div class="theme chip" style="background: #f5deb3; color: #000;" data-value="#f5deb3;#000">A</div>
                                    <div class="theme chip" style="background: #111; color: #f5deb3;" data-value="#111;#f5deb3">A</div>
                                    <div class="theme chip" style="background: #111b21; color: #e8e8e8;" data-value="#111b21;#e8e8e8">A</div>
                                </div>
                            </div>
                            <div class="setting">
                                <div class="setting-label">Font</div>
                                <div class="setting-content fonts chips" data-chips="fonts">
                                    <div class="fonts chip" style="font-family: 'Arial', Arimo, Liberation Sans, sans-serif;" data-value="'Arial', Arimo, Liberation Sans, sans-serif">Arial</div>
                                    <div class="fonts chip" style="font-family: 'Lato', sans-serif;" data-value="'Lato', sans-serif">Lato</div>
                                    <div class="fonts chip" style="font-family: 'Georgia', Liberation Serif, serif;" data-value="'Georgia', Liberation Serif, serif">Georgia</div>
                                    <div class="fonts chip" style="font-family: 'Times New Roman', Tinos, Liberation Serif, Times, serif;" data-value="'Times New Roman', Tinos, Liberation Serif, Times, serif"
                                         data-default="true">Times New Roman</div>
                                    <div class="fonts chip" style="font-family: 'Arbutus Slab', serif;" data-value="'Arbutus Slab', serif">Arbutus Slab</div>
                                </div>
                            </div>
                            <div class="setting">
                                <div class="setting-label">Font Size</div>
                                <div class="setting-content font-size chips" data-chips="font-size">
                                    <div class="size chip" style="font-size: 8pt" data-value="8pt">8</div>
                                    <div class="size chip" style="font-size: 9pt" data-value="9pt">9</div>
                                    <div class="size chip" style="font-size: 10pt" data-value="10pt">10</div>
                                    <div class="size chip" style="font-size: 11pt" data-default="true" data-value="11pt">11</div>
                                    <div class="size chip" style="font-size: 12pt" data-value="12pt">12</div>
                                    <div class="size chip" style="font-size: 14pt" data-value="14pt">14</div>
                                    <div class="size chip" style="font-size: 16pt" data-value="16pt">16</div>
                                    <div class="size chip" style="font-size: 18pt" data-value="18pt">18</div>
                                </div>
                            </div>
                            <div class="setting">
                                <div class="setting-label">Line Spacing</div>
                                <div class="setting-content line-spacing chips" data-chips="line-spacing">
                                    <div class="size chip" data-value="1">1</div>
                                    <div class="size chip" data-value="1.2">1.2</div>
                                    <div class="size chip" data-value="1.4">1.4</div>
                                    <div class="size chip" data-default="true" data-value="1.6">1.6</div>
                                    <div class="size chip" data-value="1.8">1.8</div>
                                    <div class="size chip" data-value="2">2</div>
                                    <div class="size chip" data-value="2.3">2.3</div>
                                    <div class="size chip" data-value="2.6">2.6</div>
                                    <div class="size chip" data-value="3">3</div>
                                </div>
                            </div>
                            <div class="setting">
                                <div class="setting-label">Margin</div>
                                <div class="setting-content margin chips" data-chips="margin">
                                    <div class="size chip" data-value="0">0</div>
                                    <div class="size chip" data-value="1px">1px</div>
                                    <div class="size chip" data-value="2px">2px</div>
                                    <div class="size chip" data-value="3px">3px</div>
                                    <div class="size chip" data-value="4px">4px</div>
                                    <div class="size chip" data-default="true" data-value="5px">5px</div>
                                    <div class="size chip" data-value="7px">7px</div>
                                    <div class="size chip" data-value="9px">9px</div>
                                    <div class="size chip" data-value="12px">12px</div>
                                    <div class="size chip" data-value="15px">15px</div>
                                </div>
                            </div>
                            <div class="setting">
                                <div class="setting-label">Fullscreen</div>
                                <div class="setting-content">
                                    <a href="javascript:ePubViewer.doFullscreen();">Fullscreen</a>
                                </div>
                            </div>
                            <div class="setting">
                                <div class="setting-label">Reset</div>
                                <div class="setting-content">
                                    <a href="javascript:void(0);" onclick="if(confirm('Are you sure?')){localStorage.clear();window.location.reload();}">Reset All</a>
                                </div>
                            </div>
                            <div class="setting">
                                <div class="setting-label">Share</div>
                                <div class="setting-content">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="javascript:void(0);" class="share-fb">
                                                    <p class="mb-10 p-15" style="background-color: #3a81d5;border-radius: 5px;">
                                                        <img src="<?php echo base_url(); ?>public/img/assets/icon_fb_white.svg" width="30">
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <br /> This app requires Microsoft Edge 15+, Mozilla Firefox 50+, Chrome 50+, or Safari 10+.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="error hidden">
                <div class="error-title"></div>
                <div class="error-description"></div>
                <div class="error-info"></div>
                <div class="error-dump"></div>
            </div>
            <div class="bar">
                <div class="left">

                </div>
                <div class="title">
                    <span class="book-title"><?php echo $detail_book['data']['book_info']['title_book']; ?></span>
                    <span class="divider"> - </span>
                    <span class="book-author"><?php echo $detail_book['data']['author']['author_name']; ?></span>
                </div>
                <div class="right">
                    <button class="sidebar-button hidden" onclick="ePubViewer.doSidebar()">
                        <i class="icon material-icons">menu</i>
                    </button>
                </div>
            </div>
            <a class="book" onload="javascript:ePubViewer.doBook();">
                <!-- <div class="empty-wrapper">
                    <div class="empty">
                        <div class="app-name">ePubViewer</div>
                        <div class="message">
                            Unknown error. If this message does not disappear in a few seconds, try using a different browser (Chrome or Firefox), and
                            if the issue still persists,
                            <a href="https://github.com/geek1011/ePubViewer">report it here</a>.
                        </div>
                    </div>
                </div> -->
            </a>
            <div class="bar">
                <div class="left">
                    <button class="prev hidden">
                        <i class="icon material-icons">chevron_left</i>
                    </button>
                </div>
                <div class="loc"></div>
                <div class="right">
                    <button class="next hidden">
                        <i class="icon material-icons">chevron_right</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
</div>
</div>
<div id="footbanner">
	<nav class="navbar navbar-expand-lg fixed-bottom baboonav" id="navscrollf" style="height:60px;">
		<div class="container-fluid">
			<div>
				<a class="<?php if($detail_book['data']['book_info']['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>" data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo"><img class=" loveicon" src="<?php if($detail_book['data']['book_info']['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" width="24"> <span id="likecount"><?php echo $this->thousand_to_k->ConvertToK($detail_book['data']['book_info']['like_count']); ?></span></a>
			</div>
			<div>
				<a href="javascript:void(0);" class="comment_"><img class="" src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="22"> <?php echo $this->thousand_to_k->ConvertToK($detail_book['data']['book_info']['book_comment_count']); ?></a>
			</div>
			<div>
				<a class="share-fb-ch" href="javascript:void(0);"><img class="" src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="23"> <span class="boshare"><?php echo $this->thousand_to_k->ConvertToK($detail_book['data']['book_info']['share_count']); ?></span></a>
			</div>
			<div>
				<a href="#"><img class="" src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="35"> <?php echo $this->thousand_to_k->ConvertToK($detail_book['data']['book_info']['view_count']); ?></a>
			</div>
			<div>
				<a class="<?php if($detail_book['data']['book_info']['is_bookmark'] == false){ echo 'bookmark'; }else{ echo 'unbookmark'; } ?>" data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="bookmarkboo"><img class=" bookmarkicon" src="<?php if($detail_book['data']['book_info']['is_bookmark'] == false){ echo base_url('public/img/assets/icon_bookmark.svg'); }else{ echo base_url('public/img/assets/icon_bookmark_active.svg'); } ?>" width="27"></a>
			</div>
		</div>
	</nav>
</div>
<!-- Modal -->
<div class="modal right fade" id="modComment" tabindex="-1" role="dialog" aria-labelledby="modComment2">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="closes" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="modal-title" id="modComment2"><b>Komentar <?php if ($detail_book['data']['book_info']['book_comment_count'] != 0) {echo "(".$detail_book['data']['book_info']['book_comment_count'].")"; }else{echo ""; } ?></b></span>
			</div>

			<div class="modal-body pt-5">
				<div class="mb-50">
					<div id="Rbookcomment_list">

					</div>
					<div class="loader mx-auto" style="display: none;"></div>
				</div>
				<nav class="pt-5 pb-5 navbar bg-boo fixed-bottom fix-comm">
					<textarea class="frmcomment commentform mention" id="comments" placeholder="Tulis komentarmu disini..." type="text" style="width:100%;height: 45px;"></textarea>
					<div id="btn-com"><button class="Rpost-comment" type="button" style="background: none;border: none;"><img src="<?php echo base_url('public/img/assets/icon_sendcomm.png'); ?>" width="43" height="43"></button></div>
				</nav>
			</div>

		</div>
	</div>
</div>
<!-- modal -->

<?php if ($this->session->flashdata('popup_status_payment')): ?>
	<div class="modal fade" id="notifpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<?php $this->load->view('include/modal_pending'); ?>
    </div>
<?php endif ?>

<?php $this->load->view('include/modal_checkout', $detail_book); ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
<?php if (isset($js)): ?>
	<?php echo get_js($js) ?>
<?php endif ?>
<script src='https://podio.github.io/jquery-mentions-input/lib/jquery.events.input.js' type='text/javascript'></script>
<script src='https://podio.github.io/jquery-mentions-input/lib/jquery.elastic.js' type='text/javascript'></script>
<?php echo $this->session->flashdata('pay_alert'); if ($detail_book['data']['book_info']['book_type'] == 2) { ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.worker.js"></script>
<?php }else if ($detail_book['data']['book_info']['book_type'] == 3){ ?>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/polyfills/babel-polyfill.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/polyfills/fetch.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/polyfills/pep.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/libs/sanitize-html.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/libs/jszip.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/libs/epub.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/epub_detail_book.js'); ?>"></script>
    <script>
        detailEPUB();
    </script>
<?php }else {}?>
<script type="text/javascript">
	$(document).ready(function() {
		showPopUpBanner();
		<?php if ($detail_book['data']['book_info']['book_type'] == 2) { ?>
			getBooks();
		<?php } ?>
		<?php if ((bool)$detail_book['data']['book_info']['is_free'] == false) { ?>
			$("#notifpayment").modal('show');
			buyBook();
		<?php } ?>
        var getHashDaft = window.location.hash;
        if (getHashDaft != "" && getHashDaft == "#buynow") {
            $('.buyfullbook').click();
        }
	});

	var segment = '<?php echo $this->uri->segment(3); ?>';
	var userdata = '<?php $usDat = $this->session->userdata('userData'); echo $usDat['user_id']; ?>';
	var userbook = '<?php echo $detail_book['data']['author']['author_id']; ?>';
	var author = '<?php echo $detail_book['data']['author']['author_name']; ?>';
	<?php if ($detail_book['data']['book_info']['book_type'] != 1) { ?>
	var desc = $('.desc_pdf').text();
	<?php }else{ ?>
	var desc = "<?php $st1 = strip_tags($datas); $st2 = str_replace('"', '', $st1); if (strlen($st2) > 200) echo $st2 = substr($st2, 0, 200) . '...';  ?>";
	<?php } ?>

	var banner_height = $("#navscroll, #navscrollf").height();
	var lastScrollTop = 0;
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		var currScrollTop = $(this).scrollTop();
		if (scroll >= banner_height && currScrollTop > lastScrollTop) {
			$("#banner, #footbanner").hide();
		} else {
			$("#banner, #footbanner").show();
		}
		lastScrollTop = currScrollTop;

	});

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};
	var bid = segment.split('-');
	<?php $aid = explode('-', $this->uri->segment(2)); $bid = explode('-', $this->uri->segment(3)); $cid = $this->uri->segment(5); if (empty($cid)) { $url = BASE_URL_DEEPLINK.'penulis/'.$aid[0].'/'.$bid[0]; }else{ $url = BASE_URL_DEEPLINK.'penulis/'.$aid[0].'/'.$bid[0].'/chapter/'.$cid;} ?>
	var link = "intent://"+"<?php echo $url; ?>"+"#Intent;scheme=https;package=id.android.baboo;S.doctype=FRA;S.docno=FRA1234;S.browser_fallback_url=market://details?id=id.android.baboo;end";
	$('.bannerPopUp').html("<div class='popUpBannerBox'> <div class='popUpBannerInner'> <div class='popUpBannerContent'> <a href='"+link+"'><span class='popUpBannerSpan'>Baca di Aplikasi</span></a><a href='#' class='closeButton'>&#120;</a> </div> </div> </div>");

	function showPopUpBanner() {
		if( isMobile.Android() ) {
			$('.popUpBannerBox').fadeIn("2000");
		}else{

		}
	}

	$('.closeButton').click(function() {
		$('.popUpBannerBox').fadeOut("2000");
		return false;
	});

	<?php if (empty($this->uri->segment(5))) {
		echo "var link_url = '".BASE_URL_WEB."penulis/".$this->uri->segment(2)."/".$bid[0]."';";
	}else{
		echo "var link_url = '".BASE_URL_WEB."penulis/".$this->uri->segment(2)."/".$bid[0]."/chapter/".$cid."';";
	} ?>
	var chapter_title = '<?php echo $detail_book['data']['chapter']['chapter_title']; ?>';
</script>
</body>
</html>

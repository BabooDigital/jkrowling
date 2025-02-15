<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div data-content-category='Book &gt; <?php echo $detail_book['data']['category']['category_name']; ?>' data-content-ids='<?php echo $detail_book['data']['book_info']['book_id']; ?>' data-content-name="<?php echo $detail_book['data']['book_info']['title_book']; ?>" data-content-type='<?php echo $m_type; ?>' data-page-type='ViewContent' data-value='<?php echo $m_book_price; ?>' id='fbpixel'></div>

<?php $this->load->view('navbar/D_navbar'); ?>

<style type="text/css">
@media only screen and (min-width: 1200px) {.modal.right.fade .modal-dialog {right: -29%; } } @media only screen and (min-width: 1300px) {.modal.right.fade .modal-dialog {right: -32%; } } @media only screen and (max-width: 1000px) {.modal.right.fade .modal-dialog {right: -25%; } } /*Right*/ .modal.right.fade .modal-dialog {-webkit-transition: opacity 0.3s linear, right 0.3s ease-out; -moz-transition: opacity 0.3s linear, right 0.3s ease-out; -o-transition: opacity 0.3s linear, right 0.3s ease-out; transition: opacity 0.3s linear, right 0.3s ease-out; } .modal.right.fade.in .modal-dialog {right: 0; } .modal-backdrop {opacity:0.5 !important; } /* ----- MODAL STYLE ----- */ .modal-content {border-radius: 0; border: none; height: 100vh; } .modal-header {border-bottom-color: #EEEEEE; background-color: #FAFAFA; } .closes {background: none; font-size: 2rem; line-height: 1; opacity: .5; border: none; position: absolute; right: 35px; } .thumbnail {position: relative; display: inline-block; } .caption {position: absolute; top: 44%; left: 50%; transform: translate( -50%, -50% ); text-align: center; font-weight: bold; color: #7554bd; } .comment-marker .num-comment{top: 5px !important; } .mentions-input-box {position: relative; background: #fff; width: 80%; border-radius: 35px; float: left; } .mentions-input-box textarea {width: 80%; display: block; height: 18px; padding: 9px; overflow: hidden; background: transparent; position: relative; outline: 0; resize: none; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; } .mentions-input-box .mentions-autocomplete-list {display: none; background: #fff; border: 1px solid #b2b2b2; position: absolute; left: 0; bottom: 40px; right: 0; z-index: 1070; border-radius:5px; border-top-right-radius:0; border-top-left-radius:0; -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.148438); -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.148438); box-shadow: 0 2px 5px rgba(0, 0, 0, 0.148438); } .mentions-input-box .mentions-autocomplete-list ul {margin: 0; padding: 0; } .mentions-input-box .mentions-autocomplete-list li {background-color: #fff; padding: 0 5px; margin: 0; width: auto; border-bottom: 1px solid #eee; height: 26px; line-height: 26px; overflow: hidden; cursor: pointer; list-style: none; white-space: nowrap; } .mentions-input-box .mentions-autocomplete-list li:last-child {border-radius:5px; } .mentions-input-box .mentions-autocomplete-list li > img, .mentions-input-box .mentions-autocomplete-list li > div.icon {width: 16px; height: 16px; float: left; margin-top:5px; margin-right: 5px; -moz-background-origin:3px; border-radius:3px; } .mentions-input-box .mentions-autocomplete-list li em {font-weight: bold; font-style: none; } .mentions-input-box .mentions-autocomplete-list li:hover, .mentions-input-box .mentions-autocomplete-list li.active {background-color: #f2f2f2; } .mentions-input-box .mentions-autocomplete-list li b {background: #ffff99; font-weight: normal; } .mentions-input-box .mentions {position: absolute; left: 1px; right: 0; top: 1px; bottom: 0; padding: 9px; color: #fff; overflow: hidden; white-space: pre-wrap; word-wrap: break-word; } .mentions-input-box .mentions > div {color: #fff; white-space: pre-wrap; width: 100%; } .mentions-input-box .mentions > div > strong {font-weight:normal; background: #d8dfea; } .mentions-input-box .mentions > div > strong > span {filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0); } .mores {display: none; } .coment_ {border-bottom: 1px #dddddd solid; } #pdf-main-container {width: 95%; margin: 20px auto; } #pdf-loader {display: none; text-align: center; color: #999999; font-size: 13px; line-height: 100px; height: 100px; } #pdf-contents {display: none; } #pdf-meta {overflow: hidden; margin: 0 0 20px 0; } #pdf-buttons {float: left; } #page-count-container {float: right; } #pdf-current-page {display: inline; } #pdf-total-pages {display: inline; } #pdf-canvas {width: 100%; border: 1px solid rgba(0,0,0,0.2); box-sizing: border-box; } #page-loader {height: 100px; line-height: 100px; text-align: center; display: none; color: #999999; font-size: 13px; } .btn-nav-pdf {background: #fcfcff; border: 1px #c3c3c3 solid; border-radius: 6px; } #parentparaph { text-align: justify; }
	#list_chapters {cursor: pointer;}
</style>
</style>
<?php if ($detail_book['data']['book_info']['status_payment'] == 'pending') {
	$statusp = 'pend';
}else{
	$statusp = 'done';
}  ?>
<div class="container pt-80 mb-80">
    <input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $detail_book['data']['book_info']['book_id']; ?>">
    <div class="row mb-5">
    <?php if ($detail_book['data']['book_info']['book_type'] != 3 ){ ?>
		<div class="col-2"></div>
		<div class="col-8">
			<?php echo $this->load->view('ads/top_mid_ad'); ?>
		</div>
		<div class="col-2"></div>
	</div>
	<div class="row">
		<div class="col-md-4 dtlbok">
			<?php if (!empty($detail_book)) { ?>
			<div class="card pb-20" style="background: #F5F8FA;">
				<div class="text-center pr-30 pl-30 pt-20">
					<img class="cover_image effect-img" src="<?php echo ($detail_book['data']['book_info']['cover_url'] != '') ? ($detail_book['data']['book_info']['cover_url'] != null ? $detail_book['data']['book_info']['cover_url'] : base_url('public/img/blank_cover.png')) : base_url('public/img/blank_cover.png'); ?>" width="150" height="200">
					<div class="card-body">
						<input type="hidden" name="iaidubi" id="iaidubi" value="<?php echo $detail_book['data']['book_info']['book_id']; ?>">
						<h1 class="dbooktitle" style="font-size:25px;"><?php echo $detail_book['data']['book_info']['title_book']; ?></h1>

						<div class="dbooksociallist">
							<span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_view.svg" width="27"> <span id="viewcount"><?php echo $detail_book['data']['book_info']['view_count']; ?></span></span>
						</div>
						<div class="dbooksociallist">
							<span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="14"> <span id="commentcount"><?php echo $detail_book['data']['book_info']['book_comment_count']; ?></span></span>
						</div>
						<div class="dbooksociallist">
							<span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_love.svg" width="16"> <span id="likecount"><?php echo $detail_book['data']['book_info']['like_count']; ?></span></span>
						</div>
						<div class="dbooksociallist">
							<span class="fs-13"><img src="<?php echo base_url(); ?>public/img/assets/icon_share.svg" width="14"> <span id="sharecount"><?php echo $detail_book['data']['book_info']['share_count']; ?></span></span>
						</div>
					</div>
				</div>
				<div class="pr-20 pl-20 subchapter">
					<?php if ((bool) $detail_book['data']['book_info']['is_pdf'] == false) { ?>
						<ul class="list-group list-group-flush">
							<li class="list-group-item" style="background: transparent;border-bottom: 1px #eeeeee;"><small>Bagian Cerita</small></li>
							<div id="loader_chapter">
								<div class="loads-css ng-scope"><div style="width:20px;height:20px" class="lds-flickr"><div></div><div></div><div></div></div></div>
							</div>
							<div id="list_chapter">

							</div>
						</ul>
					<?php }else{
						function incrementalHash($len = 5){$charset = "0123456789abcdefghijklmnopqrstuvwxyz"; $base = strlen($charset); $result = ''; $now = explode(' ', microtime())[1]; while ($now >= $base){$i = $now % $base; $result = $charset[$i] . $result; $now /= $base; } return substr($result, -5); }
						$generateDate = $detail_book['data']['book_info']['epoch_time'];
						$datapassword = 'ID#' . $detail_book['data']['book_info']['book_id'] . '#' . $detail_book['data']['book_info']['title_book'] . '#' . strtotime($generateDate);
						$password = hash_hmac('sha512', $datapassword, strtotime($generateDate)).incrementalHash(); ?>
						<div class="mb-10 text-center">
							<div class="spadding" dat-cpss="<?php echo $password; ?>"></div>
							<span style="font-size: 15pt;font-weight: 600;">Deskripsi Cerita</span></div>
						<div class="text-justify desc_pdf"><?php echo $detail_book['data']['book_info']['desc']; ?></div>
						<?php $usDat = $this->session->userdata('userData'); if ((bool)$detail_book['data']['book_info']['is_free'] == true || $usDat['user_id'] == $detail_book['data']['author']['author_id']) { ?>
							<div></div>
						<?php }else{ ?>
							<div style="background:transparent;" class="list-group-item mt-15"><a class="" id=""><p style="font-size:10px;">Versi buku full</p><span style="color:#7554bd">Rp <?php echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?></span></a><button style="float:right;margin-top: -15px;cursor: pointer;" class="btn-buy buyfullbook" stats-book='<?php echo $statusp; ?>'>Beli</button></div>
						<?php } ?>
					<?php } ?>
				</div>
                <br>
                <div class="mx-auto">
                	<?php echo $this->load->view('ads/250_side_ad'); ?>
                </div>
			</div>
			<?php  }else {
				echo "kosong";
			} ?>
		</div>
		<div class="col-md-7" id="pdfview" style="background: #fff;border-radius: 10px;">
			<div class="card pb-20 pt-10 pl-20 pr-20 book-content">
				<div class="card-body">
					<div class="media">
						<img class="d-flex align-self-start mr-10 rounded-circle" width="50" height="50" src="
						<?php $urlToUser = url_title($detail_book['data']['author']['author_name'], 'dash', true).'-'.$detail_book['data']['author']['author_id'];
						if($detail_book['data']['author']['avatar'] == NULL){
							echo base_url('public/img/profile/blank-photo.jpg');
						}else{
							echo $detail_book['data']['author']['avatar']; } ?>" alt="<?php echo $detail_book['data']['author']['author_name']; ?>">
							<div class="media-body">
								<a data-usr-prf="<?php echo $detail_book['data']['author']['author_id']; ?>" data-usr-name="<?php echo $detail_book['data']['author']['author_name'] ?>" href="<?php echo $this->baboo_lib->urlToUser($urlToUser); ?>" class=""><span class="card-title nametitle2 profile mt-10 h2"><?php
							echo $detail_book['data']['author']['author_name']; ?></span></a>
								<!-- <span class="nametitle2 author_name"><?php echo $detail_book['data']['author']['author_name']; ?></span> -->
								<p><small><span>&nbsp;&nbsp;</span></small></p>
								<?php $sess = $this->session->userdata('userData'); if ($sess['user_id'] == $detail_book['data']['author']['author_id']) { ?>
									<div></div>
								<?php }else{ ?>
								<a href="javascript:void(0)" data-follow="<?php echo $detail_book['data']['author']['author_id']; ?>" class="btn-no-fill dbookfollowbtn ml-20 <?php if ((bool)$detail_book['data']['author']['isFollow'] == false) { echo "follow-u"; }else{ echo "unfollow-u"; } ?>"><span class="nametitle2 txtfollow"><?php if ($detail_book['data']['author']['isFollow'] == false) { echo "Follow"; }else{ echo "Unfollow"; } ?></span></a>
								<?php } ?>
							</div>
						</div>
				<center>
					<div class="loader" id="loader_scroll" style="display: none;"></div>
				</center>
						<?php if ((bool) $detail_book['data']['book_info']['is_pdf'] == false) { ?>
							<div id="appentoContent">
								<br>
								<div id="post-data">
									<?php $this->load->view('data/D_book'); ?>
								</div>
							</div>
							<div id="appendContent">

							</div>
						<?php }else{ ?>
							<div id='pdf-viewer'> </div>
							<?php $usDat = $this->session->userdata('userData'); if ((bool) $detail_book['data']['book_info']['is_bought'] == false && (bool) $detail_book['data']['book_info']['is_free'] == false && $usDat['user_id'] != $detail_book['data']['author']['author_id']) { ?>
								<div style="background:transparent;" class="list-group-item mt-15"><a class="" id=""><p>Versi buku full</p><span style="color:#7554bd">Rp <?php echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?></span></a><button style="float:right;margin-top: -15px;cursor: pointer;" class="btn-buy buyfullbook" stats-book='<?php echo $statusp; ?>'>Beli</button></div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-md-1">
				<div class="card stickymenu" style="background: #F5F8FA;">
					<div class="text-center">
						<a onclick="showLoading()" href="<?php echo site_url('penulis/'.url_title($detail_book['data']['author']['author_name'], 'dash', true).'-'.$detail_book['data']['author']['author_id'].'/'.url_title($detail_book['data']['book_info']['title_book'], 'dash', true).'-'.$detail_book['data']['book_info']['book_id']); ?>/reading-mode">
						<div class="p-1">
							<img src="<?php echo base_url(); ?>public/img/assets/read-mode.svg" width="45">
							<span class="bold11px">Mode Baca</span>

						</div>
					</a>
					<div class="border1px"></div>
					<div class="pt-20 pb-20">
						<p class="mb-30">
							<a data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo" class="fs-14px <?php if($detail_book['data']['book_info']['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>">
								<img src="<?php if($detail_book['data']['book_info']['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="loveicon" width="40">
							</a>
						</p>
						<p><button data-b-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" onclick="getCommentBook()" type="button" data-toggle="modal" data-target="#commentModal" style="cursor: pointer;background: none;border: none;">
							<div class="thumbnail"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="40"><div class="caption"><span id="commentcount"><?php echo $detail_book['data']['book_info']['book_comment_count']; ?></span></div></div>
						</button></p>
					</div>
					<div class="border1px"></div>
					<div class="pt-20 pb-20 pl-5 pr-5">
						<a href="javascript:void(0);" class="share-fb">
							<p class="mb-10" style="background-color: #3a81d5;padding: 10px 5px;border-radius: 5px;">
								<img src="<?php echo base_url(); ?>public/img/assets/icon_fb_white.svg" width="30">
							</p>
						</a>
					</div>
				</div>
			</div>
		</div>
    <?php }else{
        $usDat = $this->session->userdata('userData');
        if ((bool)$detail_book['data']['book_info']['is_free'] == true || $usDat['user_id'] == $detail_book['data']['author']['author_id']){
            $c_pb = "";
        }else{
            $c_pb = "pb-140";
        }
        ?>
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
                        <div class="toc-list <?php echo $c_pb; ?>"></div>
                        <?php if ((bool)$detail_book['data']['book_info']['is_free'] == true || $usDat['user_id'] == $detail_book['data']['author']['author_id']){ ?>
                        <?php }else{ ?>
                            <div class="bg-white pb-20 mt-30 text-center" style="position:absolute;bottom:50px;">
                                <p class="p-5">Beli buku ini untuk mendapatkan versi lengkapnya dengan harga <span class="h3 font-weigh-bold d-block">Rp <?php echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?></span></p>
                                <a href="javascript:void(0);" class="btn-buy buyfullbook w-100" stats-book="<?php echo $statusp; ?>" style="padding: 10px 35px;"> Beli Sekarang </a>
                            </div>
                        <?php } ?>
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
                            <div class="cover_image effect-img" src="<?php echo $detail_book['data']['book_info']['cover_url'] ?>"></div>
                        </div>
                        <h1 class="title dbooktitle"><?php echo $detail_book['data']['book_info']['title_book']; ?></h1>
                        <div class="series-info">
                            <span class="series-name"></span>
                            <span class="divider"> - </span>
                            <span class="series-index"></span>
                        </div>
                        <div class="author"><?php echo $detail_book['data']['author']['author_name']; ?></div>
                        <div class="description desc_pdf"><?php echo $detail_book['data']['book_info']['desc']; ?></div>
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
    <?php } ?>
	</div>
</div>
<div class="modal fade" id="buymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<?php $this->load->view('data/D_paybook'); ?>
</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-bottom box-shadow-navbar">
			<div class="container pt-5 pb-5">
				<div class="col-md-4">

				</div>
				<div class="col-md-7">
					<ul class="navbar-nav pull-right">
						<!-- <li class="nav-item"><span class="text-muted" id="id_page"><small>Page</small> <strong>Description</strong></span></li> -->
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" href="javascript:void(0);" id="loveboo" class="fs-14px <?php if($detail_book['data']['book_info']['is_like'] == false){ echo 'like'; }else{ echo 'unlike'; } ?>">
								<img src="<?php if($detail_book['data']['book_info']['is_like'] == false){ echo base_url('public/img/assets/icon_love.svg'); }else{ echo base_url('public/img/assets/love_active.svg'); } ?>" class="loveicon" width="30">
							</a>
						</li>
						<li class="nav-item ml-20">
							<button data-b-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>" onclick="getCommentBook()" type="button" data-toggle="modal" data-target="#commentModal" style="cursor: pointer;background: none;border: none;">
								<div class="thumbnail"><img src="<?php echo base_url(); ?>public/img/assets/icon_comment.svg" width="25"><div class="caption fs-12px"><span id="commentcount"><?php echo $detail_book['data']['book_info']['book_comment_count']; ?></span></div></div>
							</button>
						</li>
						<li class="nav-item ml-20">
							<a href="javascript:void(0);" id="bookmarkboo" class="<?php if($detail_book['data']['book_info']['is_bookmark'] == false){ echo 'bookmark'; }else{ echo 'unbookmark'; } ?>" data-id="<?php echo $detail_book['data']['book_info']['book_id']; ?>"><img src="<?php if($detail_book['data']['book_info']['is_bookmark'] == false){ echo base_url('public/img/assets/icon_bookmark.svg'); }else{ echo base_url('public/img/assets/icon_bookmark_active.svg'); } ?>" class="mr-5 bookmarkicon" width="27"></a>
						</li>
					</ul>
				</div>
				<div class="col-md-1">

				</div>
			</div>

			<div class="progress navprogress" id="progress">
				<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
		</nav>
		<!-- Modal -->
		<div class="modal right fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-header bg-white">
						<button type="button" class="closes" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<span class="h4 modal-title" id="commentLabel">Komentar</span>
					</div>

					<div class="modal-body mb-50" style="overflow-x: auto;">
						<div>
							<div id="bookcomment_list">

							</div>
						</div>

						<nav class="pt-5 pb-5 navbar bg-boo fixed-bottom">
							<textarea class="frmcomment commentform mention" id="comments" placeholder="Tulis komentarmu disini..." type="text" style="width:100%;height: 45px;"></textarea>
							<div id="btn-com"><button class="post-comment" type="button" style="background: none;border: none;"><img src="<?php echo base_url('public/img/assets/icon_sendcomm.png'); ?>" width="43" height="43"></button></div>
						</nav>
					</div>

				</div><!-- modal-content -->
			</div><!-- modal-dialog -->
		</div><!-- modal -->
		<!-- modal -->
		<?php if ($this->session->flashdata('popup_status_payment')): ?>
			<div class="modal fade" id="notifpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<?php $this->load->view('data/D_notifpayment'); ?>
			</div>
		<?php endif ?>

		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
		<script type="text/javascript">
			var segment = '<?php echo $this->uri->segment(3); ?>';
			var count_data = '<?php echo $detailChapter; ?>';
			var userdata = '<?php echo $this->session->userdata('userData')['user_id']; ?>';
			var userbook = '<?php echo $detail_book['data']['author']['author_id']; ?>';
            var full_url = '<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>';
			<?php if ($detail_book['data']['book_info']['book_type'] != 1) { ?>
				var desc = $('.desc_pdf').text();
			<?php }else{ ?>
				var desc = "<?php foreach ($detail_book['data']['chapter']['paragraphs'] as $book) {$text = strip_tags($book['paragraph_text']); $datas .= "<div  class='mb-15 textp' id='detailStyle' data-id-p='".$book['paragraph_id']."'>".ucfirst($book['paragraph_text'])."</div>"; } $st1 = strip_tags($datas); $st2 = str_replace('"', '', $st1); if (strlen($st2) > 200) echo $st2 = substr($st2, 0, 200) . '...'; ?>";
        <?php } ?>
		</script>
			<script src='https://podio.github.io/jquery-mentions-input/lib/jquery.events.input.js' type='text/javascript'></script>
			<script src='https://podio.github.io/jquery-mentions-input/lib/jquery.elastic.js' type='text/javascript'></script>
			<?php if ($detail_book['data']['book_info']['book_type'] == 2) { ?>
				<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.js"></script>
				<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.87/pdf.worker.js"></script>
				<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script>
				<script>getBooks();
				window.onload = function() {document.addEventListener("contextmenu", function(e){e.preventDefault(); }, false); document.addEventListener("keydown", function(e) {if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {disabledEvent(e); } if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {disabledEvent(e); } if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {disabledEvent(e); } if (e.ctrlKey && e.keyCode == 85) {disabledEvent(e); } if (event.keyCode == 123) {disabledEvent(e); } if (e.ctrlKey && e.keyCode == 65) {disabledEvent(e); } if (e.ctrlKey && e.keyCode == 67) {disabledEvent(e); } if (e.ctrlKey) {disabledEvent(e); } }, false); function disabledEvent(e){if (e.stopPropagation){e.stopPropagation(); } else if (window.event){window.event.cancelBubble = true; } e.preventDefault(); return false; } }; </script>
			<?php }else if ($detail_book['data']['book_info']['book_type'] == 3){ ?>
            <script type="text/javascript" src="<?php echo base_url('public/plugins/epub/polyfills/babel-polyfill.min.js'); ?>";></script>
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
</body>
</html>

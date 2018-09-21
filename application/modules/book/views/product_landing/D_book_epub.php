<?php
$usDat = $this->session->userdata('userData');
if ((bool)$detail_book['data']['book_info']['is_free'] == true || $usDat['user_id'] == $detail_book['data']['author']['author_id']){
    $c_pb = "";
}else{
    $c_pb = "pb-140";
}
?>
<div class="w-100 d-block">
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
                <div class="tab-container">
                    <div class="tab" data-tab="toc">
                        <div class="toc-list <?php echo $c_pb; ?>"></div>
<!--                        --><?php //if ((bool)$detail_book['data']['book_info']['is_free'] == true || $usDat['user_id'] == $detail_book['data']['author']['author_id']){ ?>
<!--                        --><?php //}else{ ?>
<!--                            <div class="bg-white pb-20 mt-30 text-center" style="position:absolute;bottom:0;">-->
<!--                                <p class="p-5">Beli buku ini untuk mendapatkan versi lengkapnya dengan harga <span class="h3 font-weigh-bold d-block">Rp --><?php //echo number_format( $detail_book['data']['book_info']['book_price'], 0, ',', '.'); ?><!--</span></p>-->
<!--                                <a href="javascript:void(0);" class="btn-buy buyfullbook w-100" stats-book="--><?php //echo $statusp; ?><!--" style="padding: 10px 35px;"> Beli Sekarang </a>-->
<!--                            </div>-->
<!--                        --><?php //} ?>
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
                        <span class="title dbooktitle"><?php echo $detail_book['data']['book_info']['title_book']; ?></span>
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
</div>

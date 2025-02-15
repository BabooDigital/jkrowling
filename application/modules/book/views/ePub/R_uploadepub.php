<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body id="pageContent" style="background-color: #f7f6f4;">
<nav class="navbar navbar-expand-lg fixed-top" style="height:60px;background: #fcfcff;">
    <div class="container">
        <form class="navbar-brande">
            <button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> &nbsp; <span>Upload PDF</span> </button>
        </form>
        <form class="form-inline">
            <!--            <a href="javascript:void(0);" class="mr-20 change-file-pdf" style="color: #333;"> GANTI FILE </a>-->
            <a href="javascript:void(0);" class="btn-transparant" id="post-uploadpdf" style="color: #7554bd;"><img src="<?php echo base_url() ?>public/img/assets/icon_publish.png" width="23"> &nbsp;<span>Publish</span></a>
        </form>
    </div>
</nav>
<br>
<br>
<input accept="application/epub+zip" id="file-to-upload" type="file" style="display: none;">
<div class="app container">
    <div class="dictionary-wrapper hidden">
        <div class="dictionary"></div>
    </div>
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
                    <div class="title"></div>
                    <div class="series-info">
                        <span class="series-name"></span>
                        <span class="divider"> - </span>
                        <span class="series-index"></span>
                    </div>
                    <div class="author"></div>
                    <div class="description"></div>
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
                        <div class="setting-label">About</div>
                        <div class="setting-content">
                            ePubViewer v3.0.0
                            <br /> Copyright 2018
                            <a href="https://geek1011.github.io">Patrick Gaskin</a>
                            <br />
                            <a href="https://github.com/geek1011/ePubViewer">Code</a> |
                            <a href="https://github.com/geek1011/ePubViewer/issues">Report an issue</a>
                            <br />
                            <br /> This app requires Microsoft Edge 15+, Mozilla Firefox 50+, Chrome 50+, or Safari 10+.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    <div class="error hidden">-->
    <!--        <div class="error-title"></div>-->
    <!--        <div class="error-description"></div>-->
    <!--        <div class="error-info"></div>-->
    <!--        <div class="error-dump"></div>-->
    <!--    </div>-->
    <div class="bar">
        <div class="left">
            <button class="open" data-toggle="tooltip" data-placement="bottom" title="Klik untuk mengganti file">
                <i class="icon material-icons">file_upload</i>
            </button>
        </div>
        <div class="title">
            <span class="book-title"></span>
            <span class="divider"> - </span>
            <span class="book-author"></span>
        </div>
        <div class="right">
            <button class="sidebar-button hidden" onclick="ePubViewer.doSidebar()">
                <i class="icon material-icons">menu</i>
            </button>
        </div>
    </div>
    <div class="book">
        <div class="empty-wrapper">
            <div class="empty">
                <div class="app-name">ePUB Uploader</div>
                <div class="message">
                    Unknown error. If this message does not disappear in a few seconds, try using a different browser (Chrome or Firefox), and
                    if the issue still persists,
                    <a href=mailto:dev@baboo.id">report it here</a>.
                </div>
            </div>
        </div>
    </div>
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
    <div class='pdf_file_nec' pdf_book="<?php echo $this->session->userdata('idBook_'); ?>" pdf_f="0"></div>
    <div class='pdf_file_in'></div>
</div>

<nav class="navbar fixed-bottom navbar-light bg-baboo-nav">
    <div class="container">
        <a class="navbar-brand" href="javascript:void(0);" id="post-uploaddraftpdf"><img src="<?php echo base_url('public/img/assets/icon_save_draft.svg'); ?>" class="mr-5 img-fluid" ><span class="commenttxt">Simpan ke Draft</span></a>
    </div>
</nav>

<div id="snackbar">Data disimpan ke Draft.</div>

<script>
    function isIE(userAgent) {
        userAgent = userAgent || navigator.userAgent;
        return userAgent.indexOf("MSIE ") > -1 || userAgent.indexOf("Trident/") > -1;
    }
    if (isIE()) alert("ePubViewer does not support Internet Explorer. Please use Chrome or Firefox.");
</script>

<script>
    var sw = "<?php echo base_url('public/plugins/epub/sw.js'); ?>";
    if ('serviceWorker' in navigator) window.addEventListener('load', () => {
        navigator.serviceWorker.register(sw).then(reg => {
        reg.onupdatefound = () => {
        const installingWorker = reg.installing;
        installingWorker.onstatechange = () => {
            if (installingWorker.state === 'installed' && navigator.serviceWorker.controller) {
                location.reload();
            }
        };
    };
    })
    });
    try {
        window.caches.keys().then(keys => console.log("caches: " + keys.join(", "))).catch(err => console.log("error checking cache version"));
    } catch (err) { }
</script>
<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
<script>
    $('[data-toggle="tooltip"]').tooltip();
    checking_epub();
</script>
</body>
</html>

<style type="text/css">
.btnfollow-f {
    background: #7554bd;
    border: none;
    border-radius: 50px;
    padding: 0% 13%;
    font-size: 13pt;
    color: #ffffff;
}
.absopos {
    position: absolute;
    left: 60px;
    z-index: 9999;
}
</style>
<?php 
    $base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
    $appid = '196429547790304';
    if (strpos($base, 'stg.baboo.id') !== false) {
        $appid = '1677083049033942';
    } elseif (strpos($base, 'localhost/jkrowling') !== false || strpos($base, 'dev-baboo.co.id') !== false) {
        $appid = '196429547790304';
    } elseif (strpos($base, 'baboo.id') !== false || strpos($base, 'www.baboo.id') !== false) {
        $appid = '2093513617332249';
    }
    echo "<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=".$appid."';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>";
?>
<body id="pageContent">
    <div class="lds-css ng-scope" style="display: none;"><div style="width:100%;height:100%" class="lds-eclipse"><img src="<?php echo base_url('public/img/splash_.png'); ?>" width="90" class="img-loading"><div></div><div></div><div></div><div></div><div></div></div></div>
    <input type="checkbox" id="toggle-right">
    <div class="page-wrap">
        <nav class="navbar navbar-expand-lg fixed-top bg-white" style="height:50px;">
            <div class="container bodymessage">
                <a class="menu-page <?php if ($this->uri->segment('1') == 'timeline') { echo 'boo-menu-active'; }else { echo 'boo-menu'; } ?>" href="<?php echo site_url('timeline'); ?>" id="tab_page" dat-title="Timeline"><i class="fa fa-arrow-left fa-2x"></i></a>

                <div class="paddingbook search_message absopos">
                    <!-- <form class="form-inline my-2 my-lg-0"> -->
                        <input class="form-control mr-sm-2 form-searchs search_message_form" id="searchss" type="search" placeholder="Cari apapun disini..." aria-label="Search" style="border: none;border-bottom: 1px #efefef solid;width: 230px;">
                    <!-- </form> -->
                </div>
            </div>
        </nav>
    </div>
    <br/>
    <br/>

    <div class="container babooid" align="center">
        <div class="row p-10">
            <p class="mt-10 mb-30"><span class="terakhir_dilihat_label">Pengguna</span></p>
            <div class="loader" style="display: none;margin-left: auto;margin-right: auto;margin-top: 40px;"></div>
            <div id="myWorkContent" class="p10 mb-10" style="margin-top: -10px;">
                <div id="insideDiv">

                </div>
            </div>
        </div>
        <hr>
        <div class="">
            <div class="row p-10">
                <p class="mt-5 mb-5"><span class="terakhir_dilihat_label">Postingan Buku</span></p>
            </div>
            <div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
            <div id="search_books" class="mb-10">
            </div>
        </div>
    </div>

    <?php if (isset($js)): ?>
        <?php echo get_js($js) ?>
    <?php endif ?>
</body>
</html>
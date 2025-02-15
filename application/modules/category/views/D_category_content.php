<style>
    .btnfollow-f {
        background: #fff;
        border: none;
        border-radius: 50px;
        padding: 0% 10%;
        font-size: 12pt;
        color: #7554bd;
        cursor: pointer;
    }
    .btnfollow-f:hover {
        background: #44758c;
        color: #fff;
    }
    .body-foll {
        background: #7db6d0;
        padding: 6% 3% 0% 0%;
        color: #fff !important;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    .media-border {
        box-shadow: 0px 0px 10px #bdbdbd;
        border-radius: 10px;
    }
</style>
<?php $this->load->view('navbar/D_navbar'); ?>
<div class="container babooidin">
    <div class="row">
        <div class="head">
            <?php if (!empty($list_content)) { ?>
                <h1 class="h1 mt-10 font-weight-bold" style="color: #333;"><?php echo ucwords(str_replace("-"," ",$this->uri->segment(2))); ?></h1>
                <hr>
            <?php }else{ ?>
                <p class="h5 mt-10 font-weight-bold" style="color: #333;">Maaf, Tidak ada Buku yang ditemukan...</p>
                <hr>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <nav aria-label="breadcrumb">
            <?php
            $uri2 = $this->uri->segment(3);
            $title =  ucwords(str_replace('-',' ' , $uri2));

            $this->breadcumb_lib->add('Timeline', base_url());
            $this->breadcumb_lib->add('Kategori', base_url('kategori'));
            $this->breadcumb_lib->add($title, base_url('kategori/'.$uri2));
            echo $this->breadcumb_lib->render();
            ?>
        </nav>
    </div>
    <div class="row" id="post-data">
        <?php
        $this->load->view('data/D_category_content', $list_content);
        ?>
    </div>
    <div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
</div>
<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
</body>
</html>

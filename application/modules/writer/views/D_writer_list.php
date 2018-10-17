<?php
if ($this->agent->is_mobile()) {
    $this->load->view('navbar/R_navbar');
    echo "<div class='container mt-120 mb-80'>";
}else{
    $this->load->view('navbar/D_navbar');
    echo "<div class='container mt-80 mb-80'>";
}
?>

<div class="container mt-80 mb-80">
    <div class="row">
        <div class="head col-sm-12">
            <?php if (!empty($userlist)) { ?>
                <h1 class="h1 mt-10 font-weight-bold" style="color: #333;"><?php echo ucwords($this->uri->segment(1)); ?></h1>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <nav aria-label="breadcrumb">
                            <?php
                            $this->breadcumb_lib->add('Timeline', base_url());
                            $this->breadcumb_lib->add('Penulis', base_url('penulis'));
                            echo $this->breadcumb_lib->render();
                            ?>
                        </nav>
                    </div>
                </div>
            <?php }else{ ?>
                <p class="h5 mt-10 font-weight-bold" style="color: #333;">Maaf, Mohon kembali lagi nanti...</p>
                <hr>
            <?php } ?>
        </div>
    </div>

    <div class="row" id="post-data">
        <?php if (!empty($userlist)){
            $this->load->view('data/D_writer_list');
        }else{
            echo "Kosong";
        } ?>
        <div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
    </div>
</div>

<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
<script>
    function funcDropdown() {
        document.getElementById("myDropdown").classList.toggle("showss")
    }
    $(function () {
        loaded = true;
        var page = 2;
        $(window).scroll(function() {
            if  ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && loaded){
                loadMoreData(page)
                page++;
            }
        });

        function loadMoreData(page) {
            loaded = false;
            var field = 'category';
            var url = window.location.href;
            var sendUrl = '?page=' + page;
            $.ajax({
                url: sendUrl,
                type: "get",
                beforeSend: function() {
                    $('.loader').show();
                }
            })
                .done(function(data) {
                    if (!$.trim(data)) {
                        $('.loader').hide();
                        $('#post-data').append("<div class='mb-30 text-center'>Tidak ada data lagi..</div>");
                        return;

                    };
                    $('.loader').hide();
                    $("#post-data").append(data);
                    loaded = true;
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('server not responding...');
                    loaded = true;
                    // location.reload();
                });
        }
    });
</script>
</body>
</html>

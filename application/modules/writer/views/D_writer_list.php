<?php
$this->load->view('navbar/D_navbar');
?>

<div class="container mt-80 mb-80">
    <div class="row">
        <div class="col-md-12">
            <div class="head">
                <?php if (!empty($list_content)) { ?>
                    <h1 class="h1 mt-10 font-weight-bold" style="color: #333;"><?php echo ucwords(str_replace("-"," ",$this->uri->segment(2))); ?></h1>
                    <hr>
                <?php }else{ ?>
                    <p class="h5 mt-10 font-weight-bold" style="color: #333;">Maaf, Mohon kembali lagi nanti...</p>
                    <hr>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
<script>
    $(function () {
    });
</script>
</body>
</html>

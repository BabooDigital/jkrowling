<?php $this->load->view('navbar/D_navbar'); ?>

<div id="clouds">
    <div class="cloud x1"></div>
    <div class="cloud x1_5"></div>
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
</div>
<div class='c'>
    <div class='_404 mb-10'>404</div>
    <hr class="_404-hr">
    <div class='_1'>HALAMAN</div>
    <div class='_2'>TIDAK DITEMUI</div>
    <a class='btn btn-back mt-20' href='#'>AYO KEMBALI</a>
</div>

<?php $this->load->view('footer/D_footer'); ?>

<?php if (isset($js)): ?><?php echo get_js($js) ?><?php endif ?>
<script>
    $(document).on('click', '.btn-back', function(event) {
        event.preventDefault();
        /* Act on the event */
        window.history.back();
    });
</script>
</body>
</html>
<body>

</body>
</html>

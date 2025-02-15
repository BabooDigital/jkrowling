<style>
    textarea::-webkit-input-placeholder {
        color: #e5e5e5;
    }

    textarea:-moz-placeholder { /* Firefox 18- */
        color: #e5e5e5;
    }

    textarea::-moz-placeholder {  /* Firefox 19+ */
        color: #e5e5e5;
    }

    textarea:-ms-input-placeholder {
        color: #e5e5e5;
    }
    .desc::-webkit-input-placeholder {
        color: #e5e5e5;
        font-size: 12pt;
    }

    .desc:-moz-placeholder { /* Firefox 18- */
        color: #e5e5e5;
        font-size: 12pt;
    }

    .desc::-moz-placeholder {  /* Firefox 19+ */
        color: #e5e5e5;
        font-size: 12pt;
    }

    .desc:-ms-input-placeholder {
        color: #e5e5e5;
        font-size: 12pt;
    }
    .bg-baboo-nav {
        background: #fcfcff;
    }
</style>
<body id="pageContent" style="background-color: #f7f6f4;">
<nav class="navbar navbar-expand-lg fixed-top bg-baboo-nav" style="height:60px;">
    <div class="container">
        <form class="navbar-brande">
            <button type="button" class="clear-btn" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> &nbsp; <span>Kembali</span> </button>
        </form>
        <form class="form-inline">
            <a href="javascript:void(0);" class="btn-transparant" id="post-prepdf" style="color: #7554bd;"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;<span>Lanjut</span></a>
        </form>
    </div>
</nav>
<br>
<br>
<div class="mt-20 pt-15 pl-10">
    <label for="title_book_out" style="font-size: 14pt;">Judul Buku</label>
    <br>
    <textarea type="text" name="title_book_out" id="judul_buku" class="title_book_form text-left" data-min-rows='3' placeholder="Tulis di sini"></textarea>
</div>
<div class="pdf_file_nec" pdf_book=""></div>
<div class="mt-10 pt-15 pl-10">
    <label for="title_book_out" style="font-size: 14pt;">Deskripsi</label>
    <br>
    <textarea type="text" name="title_book_out" id="isi_buku" class="title_book_form autoExpand text-left desc" data-min-rows='3' placeholder="Minimal 150 karakter" style="font-size: 12pt !important;"></textarea>
</div>
<nav class="navbar fixed-bottom navbar-light bg-baboo-nav">
    <a class="navbar-brand" href="javascript:void(0);" id="post-draftprepdf"><img src="<?php echo base_url('public/img/assets/icon_save_draft.svg'); ?>" class="mr-5 img-fluid" ><span class="commenttxt">Simpan ke Draft</span></a>
</nav>

<div id="snackbar">Data disimpan ke Draft.</div>

<?php if (isset($js)): ?>
    <?php echo get_js($js) ?>
<?php endif ?>
<script type="text/javascript">
    checking_pdf();
    // Applied globally on all textareas with the "autoExpand" class
    $(document)
        .one('focus.autoExpand', 'textarea.autoExpand', function(){
            var savedValue = this.value;
            this.value = '';
            this.baseScrollHeight = this.scrollHeight;
            this.value = savedValue;
        })
        .on('input.autoExpand', 'textarea.autoExpand', function(){
            var minRows = this.getAttribute('data-min-rows')|0, rows;
            this.rows = minRows;
            rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
            this.rows = minRows + rows;
        });
</script>
</body>
</html>

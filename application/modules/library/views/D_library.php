<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $title; ?></title><!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css"
    rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/baboo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>public/css/slick.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>public/css/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    type="text/css">


</head>
<style type="text/css">
    .terakhir_dilihat_imgs {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.5);
    width: 100%;
    }
</style>
<body>
<?php $this->load->view('navbar/D_navbar'); ?>
<div class="container">
    <!-- <div class="row"> -->
        <div class="paddingslide" align="center">
            <div class="col-md-10">
                <h4 align="left"><b>Terakhir Dibaca</b></h4>
                <div class="your-class">
                    <?php $this->load->view('include/slide'); ?>
                </div>
            </div>
        </div>
        <div class="paddingslide" align="center">
            <div class="col-md-10">
                <h4 align="left"><b>Bookmark Buku</b></h4>
                <div class="container" align="center">
                    <div class="row">
                        <?php $this->load->view('include/bookmark'); ?>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <!-- </div> -->
    </div>
    <!-- JS -->
    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/umd/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js">
    </script>
    <script src="https://cdn.rawgit.com/leafo/sticky-kit/v1.1.2/jquery.sticky-kit.js">
    </script>
    <script src="<?php echo base_url(); ?>public/js/baboo.js">
    </script>
    <script src="<?php echo base_url(); ?>public/js/slick.js">
    </script>
    <script type="text/javascript">
        var user = '<?php echo $this->session->userdata('userData')['user_id']; ?>';
    </script>
    <?php if (isset($js)): ?>
        <?php echo get_js($js) ?>
    <?php endif ?>
    <script type="text/javascript">
        $('.your-class').slick({
            centerMode: true,
            centerPadding: '200px',
            slidesToShow: 1,
            responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '110px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1,
                }
            }
            ]
        });


    </script>
</body>
</html>
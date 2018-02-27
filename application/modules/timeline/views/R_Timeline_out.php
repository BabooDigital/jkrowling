<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<title>Timeline Baboo - Baca buku online</title><!-- CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>public/css/baboo.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/slick.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/slick-theme.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/baboo-responsive.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>public/css/custom-margin-padding.css" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	
</head>
<style type="text/css">
.card {
	border-radius: 0 !important;
}
body {
	background: #ebf0f4 !important;
}
a:hover {
	outline: none;
}
</style>
<body>
	<nav class="navbar navbar-expand-lg fixed-top baboonav">
		<button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="fa fa-bars"></span></button>
		<a class="" href="#"><img alt="Baboo - Beyond Book &amp; Creativity" src="<?php echo base_url(); ?>public/img/new_logo.svg" width="100"></a>
		<a href="<?php echo site_url();?>login" class="btn bukupilihan" style="background-color:#f7f3ff; border:solid 1px #7554bd; color:#7554bd; ">Masuk</a>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item mr-20 active">
					<a class="nav-link b-nav-link" href="#">Beranda</a>
				</li>
				<li class="nav-item mr-100">
					<a class="nav-link" href="#">Explore</a>
				</li>
				<li class="nav-item mr-30">
					<a class="nav-link btn-navmasuk" href="#">Masuk</a>
				</li>
				<li class="nav-item">
					<div class="mb-10">
						<a class="nav-link btn-navdaftar" href="#"><span class="navdaftar">Daftar</span></a>
					</div>
				</li>
			</ul>
		</div>
	</nav><!-- slider -->
	<div class="mt-50">
		<div class="slidecontrols">
			<span id="slider-prev"></span> <span id="slider-next" style="padding-left: 40%;"></span>
		</div>
		<div class="your-class">
			<?php $this->load->view('include/R_slide'); ?>
		</div>

	</div>

	<div style="background-color: #7554bd; height:40px;">
		<div class="container">
			<div class="row" style="margin:0;">
				<div class="col-3 aktip" style="padding-left:0px; padding-right:0px; padding-top: 5px;">
					<center><a style="font-size:12px; color:#fff; font-family: 'Poppins';" class="btnfilter" data-filter="all">Buku Pilihan</a></center>
				</div>
				<div class="col-3" style="padding-left:0px; padding-right:0px; padding-top: 5px;;">
					<center><a style="font-size:12px; color:#fff; font-family: 'Poppins';" class="btnfilter" data-filter="fiksi">Fiksi</a></center>
				</div>
				<div class="col-3" style="padding-left:0px; padding-right:0px; padding-top: 5px;">
					<center><a style="font-size:12px; color:#fff; font-family: 'Poppins';" class="btnfilter" data-filter="nonfiksi">Non Fiksi</a></center>
				</div>
				<div class="col-3" style="padding-left:0px; padding-right:0px; padding-top: 5px;">
					<center><a style="font-size:12px; color:#fff; font-family: 'Poppins';" class="btnfilter" data-filter="komik">Komik</a></center>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class=" babooid" style="overflow-y: hidden;overflow-x: hidden;">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6" id="post-data">
						<?php 
						$this->load->view('data/R_timeline_out', $home);
						?>
					</div>
					<div class="loader" style="display: none;margin-left: auto;margin-right: auto;"></div>
				</div>
			</div>
			<!-- JS -->
			<!-- Javascript -->
			<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url();?>public/plugins/infinite_scroll/jquery.jscroll.js"></script>
			<script type="text/javascript" src="<?php echo base_url();?>public/js/tether.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url();?>public/js/umd/popper.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js">
			</script> 
			<script src="https://cdn.rawgit.com/leafo/sticky-kit/v1.1.2/jquery.sticky-kit.js">
			</script> 
			<script src="<?php echo base_url(); ?>public/js/baboo.js">
			</script>
			<script src="<?php echo base_url(); ?>public/js/slick.js">
			</script>
			<script type="text/javascript">
				var page = 1;
				$(window).scroll(function() {
					if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
						page++;
						loadMoreData(page);
					}
				});

				function loadMoreData(page){
					$.ajax(
					{
						url: '?page=' + page,
						type: "get",
						beforeSend: function()
						{
							$('.loader').show();
						}
					})
					.done(function(data)
					{
						if(data == " "){
							$('.loader').html("No more records found");
							return;
						}
						$('.loader').hide();
						$("#post-data").append(data);
				            // console.log(data);
				        })
					.fail(function(jqXHR, ajaxOptions, thrownError)
					{
						console.log('server not responding...');
					});
				}
			</script>
			<script type="text/javascript">
				$('.your-class').slick({
					centerMode: true,
					centerPadding: '30px',
					slidesToShow: 1,
					arrows: true,
		            prevArrow:"<i class='fa fa-chevron-left contslider slidebtn prevbtn'></i>",
		            nextArrow:"<i class='fa fa-chevron-right contslider slidebtn nextbtn'></i>",
					responsive: [
					{
						breakpoint: 768,
						settings: {
							arrows: true,
							centerMode: true,
							centerPadding: '166px',
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
					],
				});


			</script>
		</body>
		</html>
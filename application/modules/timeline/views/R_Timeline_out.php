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
	.navbar {
		padding: 0.4rem 1rem !important;
	}
	a:hover {
		outline: none;
	}
</style>
<body>
	<?php $this->load->view('navbar/R_navbar'); ?>
	<!-- slider -->
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
						<?php if (!empty($event['data']['image']) || !empty($event['data']['redirect'])) { ?>
						<div class="card mb-15 bg-transparent" style="box-shadow: none;">
							<div class="card-body pt-5 pb-5 pr-10 pl-10">
								<a href="<?php echo $event['data']['redirect']; ?>">
									<img src="<?php echo $event['data']['image']; ?>" class="img-fluid">
								</a>
							</div>
						</div>
						<?php } else { } ?>
						<?php 
						$this->load->view('data/R_timeline_out', $home);
						if ($home == null || $home == [] || empty($home)) {
							echo "<div class='container first_login mt-30'> <div class='row'> <div class='mx-auto' style='width: 85%;'> <div class='text-center mb-10'> <img src='".base_url('public/img/first_login.png')."'> </div> <div class='text-center'> <h4><b>Tentukan konten yang kamu suka!</b></h4> <p style='font-size: 12pt;'>Jangan buang-buang waktu dengan hal yg tidak kamu suka, yuk atur konten yg kamu suka.</p> <br> <a href='".site_url('login')."' class='btn btn-navdaftar'><span class='navdaftar'>Daftar Sekarang</span></a> </div> </div> </div> </div> ";
						}
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
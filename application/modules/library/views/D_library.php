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
<?php $this->load->view('navbar/D_navbar'); ?>	
<div class="paddingslide" align="center">
	<div class="col-md-9">
		<h4 align="left"><b>Terakhir Dibaca</b></h4>
		<div class="your-class">
			<?php $this->load->view('include/slide'); ?>
		</div>

	</div>
</div>
<div class="paddingslide" align="center">
	<div class="col-md-9">
		<h4 align="left"><b>Bookmark Buku</b></h4>
		<div class="container" align="center">
			<div class="row">
				<div class="col-md-9">
					<div id="myWorkContent">
						<div id="insideDivTerakhirDilihat">
							<div class="terakhir_dilihat">
								<a class="terakhir_dilihat_label"></a>
								<a class="terakhir_dilihat_button"><b></b></a>
								<div class="terakhir_dilihat_enter mt-20"></div>
								<div class="terakhir_dilihat_sub1a">
									<img src="https://spark.adobe.com/images/landing/examples/how-to-book-cover.jpg" class="terakhir_dilihat_img">
									<div class="terakhir_dilihat_sub2">
										<div id="title_book">
											<b class="font_title_terakhir_dilihat">The Kite Runner ...</b>
										</div>
										<div id="author_book">
											<p class="terakhir_dilihat_by">By : Idealcom</p>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
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
			var user = '<?php echo $this->session->userdata('userData')['user_id']; ?>';
		</script>
		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
		<script type="text/javascript">
			$('.your-class').slick({
				centerMode: true,
				centerPadding: '30px',
				slidesToShow: 1,
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
				]
			});


		</script>
	</body>
	</html>
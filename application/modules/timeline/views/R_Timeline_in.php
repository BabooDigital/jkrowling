<style type="text/css">
.card {
	border-radius: 0 !important;
}
</style>
<body id="pageContent">
	<div id="floating-btn">
		<a href="<?php echo site_url(); ?>create_mybook" class="floating-btn"><img src="<?php echo base_url(); ?>public/img/assets/icon_tulis.svg"></a>
	</div>
	<?php $this->load->view('navbar/R_navbar'); ?>	
	<br>
	<br>
	<br>
	<br>
	<div>	
		<div class="babooid">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							<br>
							<div class="loader mx-auto" style="display: none;"></div>
						</div>
					</div>
				</div>
			</div>
			<div class=" babooid" style="overflow-y: hidden;overflow-x: hidden;">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6" id="post-data">
								<!-- Status -->
								<?php 
								$this->load->view('data/R_Timeline_in', $home);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- JS -->

		<?php if (isset($js)): ?>
			<?php echo get_js($js) ?>
		<?php endif ?>
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
				})
				.fail(function(jqXHR, ajaxOptions, thrownError)
				{
					console.log('server not responding...');
				});
			}
		</script>
	</body>
	</html>

<body id="pageContent">
<div id="floating-btn">
	<form action="<?php echo site_url(); ?>createidbook" method="POST">
		<input type="hidden" name="iaiduui" value="<?php $name = $this->session->userdata('userData'); echo $name['user_id']; ?>">
		<!-- <a href="<?php echo site_url('create_book') ?>" class="floating-btn"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
		<button type="submit" class="floating-btn"><i class="fa fa-pencil" aria-hidden="true"></i></button>
	</form>
</div>
	<nav class="navbar navbar-expand-lg fixed-top baboonav" style="height:60px;">
		<?php $this->load->view('navbar/R_navbar'); ?>	
	</nav>
		<br>
		<br>
		<br>
		<br>
		<br>
	<div>	
	<div class="container babooid" align="center">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<br>
						<div class="loader" style="display: none;"></div>
					</div>
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
              alert('server not responding...');
        });
}
</script>
</body>
</html>
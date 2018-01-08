

	<!-- JS -->
	<!-- <script src="<?php echo base_url(); ?>public/js/jquery-3.2.1.slim.min.js"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url() ?>public/js/jquery.min.js"/></script> -->
  
	<script src="<?php echo base_url(); ?>public/js/umd/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/jquery.bxslider.min.js">
	</script> 
	<script src="<?php echo base_url(); ?>public/js/jquery.sticky-kit.min.js">
	</script>
	<script src="<?php echo base_url(); ?>public/js/baboo.js">
	</script>
	<?php if (isset($js)): ?>
		<?php echo get_js($js) ?>
    <?php endif ?>
</body>
</html>
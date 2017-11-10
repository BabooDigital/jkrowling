
<body id="pageContent">

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
						Library
					</div>
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
</body>
</html>
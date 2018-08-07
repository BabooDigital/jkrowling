	<meta name="Keywords" content="baboo">
	<meta name="description" content="<?php echo $page_desc; ?> - Baboo.id" />
	<meta property="og:title" content="<?php echo $title; ?> - Baboo.id" />
	<meta property="og:url" content="<?php echo current_url(); ?>" />
	<meta property="og:description" content="<?php echo $page_desc; ?> - Baboo.id" />
	<meta property="og:site_name" content="Baboo.id" />

	<meta name='twitter:site' content='@baboo_id' />
	<meta name='twitter:description' content='<?php echo $page_desc; ?> - Baboo.id' />
	<meta name='twitter:title' content='<?php echo $title; ?> - Baboo.id' />

	<?php if ($this->uri->segment(1) == 'book') {
		echo "<meta property='og:type' content='".$m_type."' />";
		echo "<meta property='og:image' content='".$m_book_cover."' />";

		echo "<meta name='twitter:image' content='".$m_book_cover."' />";
		echo "<meta name='twitter:card' content='".$m_type."' />";
		echo "<meta name='twitter:label1' content='Harga' />";
		echo "<meta name='twitter:data1' content='".$m_book_price."' />";

		echo "<meta property='product:price:amount' content='".$m_book_price."' />";
		echo "<meta property='product:price:currency' content='IDR' />";
	} ?>
	

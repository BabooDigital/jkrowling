<?php
    $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
    $url_fix = 'https://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
?>

<meta name="description" content="<?php if (!empty($page_desc)) { echo $page_desc; } ?>" />
<meta name="author" content="<?php if (!empty($author_meta)) { echo $author_meta; } else { echo "Baboo Digital Indonesia"; } ?>">
<meta property="og:url" content="<?php echo current_url(); ?>" />
<meta property="og:description" content="<?php if (!empty($page_desc)) { echo $page_desc; } ?>" />
<meta property="og:site_name" content="Baboo.id" />

<meta name='twitter:site' content='@baboo_id' />
<meta name="twitter:domain" content="https://twitter.com/baboo_id" />
<meta name='twitter:description' content='<?php if (!empty($page_desc)) { echo $page_desc; } ?>' />
<meta name='twitter:card' content='summary' />

<meta name="google-site-verification" content="H1TyRzWK3ppRRDlk8GuM6Rpv2tArZPXOgrDHuPTgM9s" />

<link href="https://plus.google.com/106535919547018503020" rel="publisher"/>
<link rel="canonical" href="<?php echo $url_fix; ?>">

<?php if (empty($_GET)){
    $robots = "index, follow";
    $googlebot = "index";
    $googlebotnews = "snippet";
}else{
    $robots = "noindex, nofollow";
    $googlebot = "noindex";
    $googlebotnews = "nosnippet";
} ?>
<meta name="robots" content="<?php echo $robots; ?>">
<meta name="googlebot" content="<?php echo $googlebot; ?>">
<meta name="googlebot-news" content="<?php echo $googlebotnews; ?>">

<?php if ($this->uri->segment(1) == 'penulis') {
    echo "<meta name='twitter:title' content='".$title."' />";
    echo "<meta property='og:title' content='".$title."' />";

    echo "<meta property='og:type' content='".$m_type."' />";
    echo "<meta property='og:image' content='".$m_book_cover."' />";
    echo "<meta property='og:image:alt' content='".$title."' />";

    echo "<meta name='twitter:image' content='".$m_book_cover."' />";
    echo "<meta name='twitter:label1' content='Harga' />";
    echo "<meta name='twitter:data1' content='".$m_book_price."' />";

    echo "<meta property='product:price:amount' content='".$m_book_price."' />";
    echo "<meta property='product:price:currency' content='IDR' />";
}else{
    echo "<meta name='twitter:title' content='".$title."' />";
    echo "<meta property='og:title' content='".$title."' />";
} ?>


<?php
$uri1 = $this->uri->segment(1); $uri2 = $this->uri->segment(2); $uri3 = $this->uri->segment(3);
// FB
if ($uri1 == 'penulis' || $uri1 == 'search' || $uri1 == 'timeline') {
	echo "<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12&appId=".APPID_FB."';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>";
}

// Midtrans
if ($uri1 == 'penulis' && $this->session->userdata('isLogin') == 200) {
	echo "<script type='text/javascript' src='https://".MID_BASE_URL."/snap/snap.js' data-client-key='".MID_CLIENT."'></script>";
}

// Google Analytics & Tag Manager
echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','".TAGMNG_GID."');
</script>";

// Adop JS Implement
echo "<script async src='//compass.adop.cc/assets/js/adop/adop.js?v=10' ></script>";

// Facebook Pixel Code
echo "<noscript><img height='1' width='1' style='display:none'
	src='https://www.facebook.com/tr?id=115118832500565&ev=PageView&noscript=1'
	/></noscript>";

?>

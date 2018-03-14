<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Facebook API Configuration
| -------------------------------------------------------------------
|
| To get an facebook app details you have to create a Facebook app
| at Facebook developers panel (https://developers.facebook.com)
|
|  facebook_app_id               string   Your Facebook App ID.
|  facebook_app_secret           string   Your Facebook App Secret.
|  facebook_login_type           string   Set login type. (web, js, canvas)
|  facebook_login_redirect_url   string   URL to redirect back to after login. (do not include base URL)
|  facebook_logout_redirect_url  string   URL to redirect back to after logout. (do not include base URL)
|  facebook_permissions          array    Your required permissions.
|  facebook_graph_version        string   Specify Facebook Graph version. Eg v2.6
|  facebook_auth_on_load         boolean  Set to TRUE to check for valid access token on every page load.
*/

	$CI =& get_instance();
	$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
	$appid = '382931948848880';
	$secret = '430d521842b720b566c2fae7a81d0022';
	if (strpos($base, Curl_Request::staging) !== false) {
		$appid = '1015515621929474';
		$secret = 'd43ecd9f845acf851018a8980df350ea';
	} elseif (strpos($base, Curl_Request::local) !== false || strpos($base, Curl_Request::dev) !== false) {
		$appid = '382931948848880';
		$secret = '430d521842b720b566c2fae7a81d0022';
	} elseif (strpos($base, Curl_Request::production) !== false) {
		$appid = '142508586445900';
		$secret = '241fc515da5a34cac76f9b58df81cdce';
	}


$config['facebook_app_id']              = $appid;
$config['facebook_app_secret']          = $secret;
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'auth/C_Login/fb_login';
$config['facebook_logout_redirect_url'] = 'auth/C_Login/fb_disconnect';
$config['facebook_permissions']         = array('email');
$config['facebook_graph_version']       = 'v2.12';
$config['facebook_auth_on_load']        = TRUE;
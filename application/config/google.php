<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/

	$CI =& get_instance();
	$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
	$clientid = '625200931795-v9j07677ch7drvplu5ohpph4u48b4277.apps.googleusercontent.com';
	$clientsecret = '9a-ThTIiKvuELANSjq-HFn4g';
	if (strpos($base, Curl_Request::staging) !== false) {
		$clientid = '347878416490-7era9p9mn379qdod4vbd61s217ubk2co.apps.googleusercontent.com';
		$clientsecret = 'TnNCHFjM1d8g44fzBM0cV3eL';
	} elseif (strpos($base, Curl_Request::local) !== false || strpos($base, Curl_Request::dev) !== false) {
		$clientid = '625200931795-v9j07677ch7drvplu5ohpph4u48b4277.apps.googleusercontent.com';
		$clientsecret = '9a-ThTIiKvuELANSjq-HFn4g';
	} elseif (strpos($base, Curl_Request::production) !== false) {
		$clientid = '87855736095-9bo8c78nojsne31dj3vr3gf694itavoh.apps.googleusercontent.com';
		$clientsecret = 'DHXnd3vSUDQI8C0YOLmLk4YO';
	}

$config['google']['client_id']        = $clientid;
$config['google']['client_secret']    = $clientsecret;
$config['google']['redirect_uri']     = base_url().'auth/C_Login/google_login';
$config['google']['application_name'] = 'BabooLoginApp ';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();
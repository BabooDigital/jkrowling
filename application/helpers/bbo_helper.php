<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!class_exists("Curl_Request")){
    require_once APPPATH . 'libraries/Curl_Request.php';
}


if(!function_exists("checkBase")){
	function checkBase(){
		$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
		$CI =& get_instance();
		$api_current = Curl_Request::dev_url;
		if (strpos($base, Curl_Request::staging) !== false) {
			$api_current = Curl_Request::staging_url;
		} elseif (strpos($base, Curl_Request::local) !== false || strpos($base, Curl_Request::dev) !== false) {
			$api_current = Curl_Request::dev_url;
		} elseif (strpos($base, Curl_Request::production) !== false) {
			$api_current = Curl_Request::production_url;
		}
		return $api_current;
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!class_exists("Curl_Request")){
    require_once APPPATH . 'libraries/Curl_Request.php';
}


if(!function_exists("checkBase")){
	function checkBase(){
		$base = (isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
		$CI =& get_instance();
		$api_current = 'api.baboo.id/v1/';
		// $api_current = 'https://api.baboo.id/v1/';
		return $api_current;
	}
}
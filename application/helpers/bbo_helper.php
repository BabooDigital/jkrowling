<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!class_exists("Curl_Request")){
    require_once APPPATH . 'libraries/Curl_Request.php';
}


if(!function_exists("checkBase")){
	function checkBase(){
		$api_current = API_URL;
		return $api_current;
	}
}
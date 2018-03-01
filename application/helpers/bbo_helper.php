<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists("checkBase")){
	function checkBase(){
		$CI =& get_instance();
		if(!class_exists("Curl_Request")){
			$CI->load->library("Curl_Request");
		}
		$api_current = Curl_Request::dev_url;
		if (base_url() == Curl_Request::local || base_url() == Curl_Request::dev) {
			$api_current = Curl_Request::dev_url;
		}else if(base_url() == Curl_Request::staging) {
			$api_current = Curl_Request::staging_url;
		}else if(base_url() == Curl_Request::production){
			$api_current = Curl_Request::production_url;			
		}
		return $api_current;
	}
}
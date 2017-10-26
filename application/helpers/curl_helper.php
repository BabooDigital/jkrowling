<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
if (!function_exists('CurlAPI')) {
	function CurlAPI()
	{
		$ci =& get_instance();
		$API="api.dev-baboo.co.id/v1/auth";

		$APINAME="baboo-auth-key";

		$AUTH="authorization";
		$AUTHVAL="Basic ZGV2YmFib286YmFib28yMDE3";

		$uname = 'devbaboo';
		$pass = 'baboo2017';

		$GenerateKey = json_decode($ci->curl->simple_get($API.'/Key/index'));
		$ci->curl->http_login($uname, $pass);
		$ci->curl->http_header($APINAME, $GenerateKey->key);
		$ci->curl->http_header($AUTH, $AUTHVAL);

		echo $ci->curl->error_string;
	}
}
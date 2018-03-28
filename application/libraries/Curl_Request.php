<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Curl_Request
{
	const dev_url = 'api.dev-baboo.co.id/v1/';
	const staging_url = 'api.stg.baboo.id/v1/';
	const production_url = 'api.baboo.id/v1/';
	const local = 'jkrowling';
	const dev = 'dev-baboo.co.id';
	const staging = 'stg.baboo.id';
	const production = 'baboo.id';

	public function __construct()
	{

	}
	public function curl_get($auth,$url)
	{
		$ch = curl_init();
        $options = array(
        	  CURLOPT_URL			 => $url,
        	  CURLOPT_RETURNTRANSFER => true,
        	  CURLOPT_FOLLOWLOCATION => true,
	          CURLOPT_CUSTOMREQUEST  =>"GET",    // Atur type request
	          CURLOPT_POST           =>false,    // Atur menjadi GET
	          CURLOPT_FOLLOWLOCATION => true,    // Follow redirect aktif
	          CURLOPT_SSL_VERIFYPEER => 0,
	          CURLOPT_HEADER         => 1,
	          CURLOPT_HTTPHEADER	 => array('baboo-auth-key : '.$auth)

        );
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        
		return $content;
	}
	public function curl_post($url)
	{
		$ch = curl_init();
        $options = array(
        	  CURLOPT_URL			 => $url,
        	  CURLOPT_RETURNTRANSFER => true,
        	  CURLOPT_FOLLOWLOCATION => true,
	          CURLOPT_CUSTOMREQUEST  =>"GET",    // Atur type request
	          CURLOPT_POST           =>false,    // Atur menjadi GET
	          CURLOPT_FOLLOWLOCATION => true,    // Follow redirect aktif
	          CURLOPT_SSL_VERIFYPEER => 0,
	          CURLOPT_HEADER         => 1,
	          CURLOPT_HTTPHEADER	 => array('baboo-auth-key : '.$auth)

        );
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        $headers=array();
        
        $data=explode("\n",$content);
        $headers['status']=$data[0];

		array_shift($data);

		foreach($data as $part){
		    $middle=explode(":",$part);
		    $headers[trim($middle[0])] = trim($middle[1]);
		}
	}
	public function curl_post_no_key($url, $sendData = '', $auth = '')
	{
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
        $result = curl_exec($ch);
        
        $headers=array();

        $data=explode("\n",$result);


        array_shift($data);

        foreach($data as $part){
            $middle=explode(":",$part);
            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        
        
        $resval = (array)json_decode(end($data), true);

        return $resval;
	}
	public function curl_get_no_key($url, $sendData = '', $auth = '')
	{
		error_reporting(0);
		$ch = curl_init();
		$options = array(
			CURLOPT_URL			 => $url,
			CURLOPT_RETURNTRANSFER => true,
	          CURLOPT_CUSTOMREQUEST  =>"GET",
	          CURLOPT_POST           =>false,
	          CURLOPT_FOLLOWLOCATION => false,
	          CURLOPT_SSL_VERIFYPEER => 0,
	          CURLOPT_HEADER         => 1,
	          CURLOPT_HTTPHEADER	 => array('baboo-auth-key: '.$auth)

	      );
		curl_setopt_array($ch, $options);
		$content = curl_exec($ch);
		curl_close($ch);
		$headers=array();

		$data=explode("\n",$content);
		$headers['status']=$data[0];

		array_shift($data);

		foreach($data as $part){
			$middle=explode(":",$part);
			$headers[trim($middle[0])] = trim($middle[1]);
		}
		$resval = (array)json_decode(end($data), true);
        return $resval;
	}
}
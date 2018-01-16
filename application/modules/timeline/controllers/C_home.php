<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends MX_Controller {

	var $API = "";
	private $perPage = 5;

	function __construct(){
		parent::__construct();
		$this->API = "api.dev-baboo.co.id/v1/timeline/Home";
		if ($this->session->userdata('isLogin') == 200) {
			redirect('timeline');
		}
	}

	public function index()
	{
		error_reporting(0);
		$auths = $this->session->userdata('authKey');
		$ch = curl_init();
		if (!empty($this->input->get("page"))) {
			$id = '/'.$this->input->get("page");
		}else{
			$id = "";
		}
		curl_setopt($ch, CURLOPT_URL, $this->API.'/index'.$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auths));
		$result = curl_exec($ch);

		$headers=array();

		$datas=explode("\n",$result);

		array_shift($datas);

		foreach($datas as $part){
			$middle=explode(":",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/bestBook');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auths));
		$result = curl_exec($ch);
		$headers=array();

		$datas=explode("\n",$result);

		array_shift($datas);

		foreach($datas as $part){
			$middle=explode(":",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}
		// $datas['home'] = json_decode($datas[14], true);
		// $datas['baboo'] = json_decode($datas[5], true);
		$resval = (array)json_decode(end($datas), true);
		$psn = $datas['home']['message'];
		$data = $datas['home']['data'];
		$auth = $datas['baboo']['BABOO-AUTH-KEY'];
		if (isset($datas['home']['code']) && $datas['home']['code'] == '200')
		{
			$status = $datas['home']['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $datas['home']['code'];
		}
		$data['home'] = json_decode(end($datas), true);
		$data['slide'] = $resval;
		$data['title'] = "Baboo - Beyond Book & Creativity";
		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/plugins/infinite_scroll/jquery.jscroll.js";
		$data['js'][]   = "public/js/jquery.bxslider.min.js";
		$data['js'][]   = "public/js/baboo.js";
		$data['js'][]   = "public/js/jquery.sticky-kit.min.js";
		$data['js'][]   = "public/js/custom/D_timeline_out.js";

		if ($this->agent->is_mobile('ipad'))
		{
			$this->load->view('include/head', $data);
			$this->load->view('D_Timeline_out');
		}
		if ($this->agent->is_mobile())
		{
			$mobile['title'] = "Baboo - Beyond Mobile Book & Creativity";
			$mobile['css'][]   = "public/css/jquery.bxslider.min.css";
			
			$mobile['js'][]   = "public/js/jquery.bxslider.min.js";
			$mobile['js'][]   = "public/js/slick.js";
			$mobile['js'][]   = "public/js/custom/slick_slider.js";
			if (!empty($this->input->get("page"))) {
				$result = $this->load->view('data/R_Timeline_out', $data);
			}else{

				$this->load->view('R_Timeline_out', $data);
			}
			// $this->load->view('include/head', $mobile);
			// $this->load->view('R_Timeline_out', $data);
		}
		else
		{
			if (!empty($this->input->get("page"))) {
				$result = $this->load->view('data/D_Timeline_out', $data);
			}else{

				$this->load->view('include/head', $data);
				$this->load->view('D_Timeline_out', $data);
			}
		}

		// if ($i%2==0) {
		// 	echo "genap";
		// }if ($i%2!=0) {
		// 	echo "ganjil";
		// }
		// print_r($data['slide']);
	}

	public function getWritter()
	{
		$auths = $this->session->userdata('authKey');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/bestWriter');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auths));
		$result = curl_exec($ch);
		$headers=array();

		$datas=explode("\n",$result);

		array_shift($datas);

		foreach($datas as $part){
			$middle=explode(":",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}
		$datas['home'] = json_decode(end($datas), true);
		// $datas['baboo'] = json_decode($datas[5], true);
		$psn = $datas['home']['message'];
		$data = $datas['home']['data'];
		echo $datas['home'];
	}
	public function getSlide()
	{
		error_reporting(0);
		$auths = $this->session->userdata('authKey');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/bestBook');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auths));
		$result = curl_exec($ch);
		$headers=array();

		$datas=explode("\n",$result);

		array_shift($datas);

		foreach($datas as $part){
			$middle=explode(":",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}
		// $datas['home'] = json_decode($datas[14], true);
		// $datas['baboo'] = json_decode($datas[5], true);
		$resval = (array)json_decode(end($datas), true);
		$psn = $datas['home']['message'];
		$data = $datas['home']['data'];
		$auth = $datas['baboo']['BABOO-AUTH-KEY'];
		if (isset($datas['home']['code']) && $datas['home']['code'] == '200')
		{
			$status = $datas['home']['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $datas['home']['code'];
		}
		// print_r(end($datas));
		// echo json_encode($resval['data'], true);
	}
}
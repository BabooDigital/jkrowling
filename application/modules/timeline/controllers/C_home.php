<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends MX_Controller {

	var $API = "";
	private $perPage = 5;

	function __construct(){
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;
		if ($this->session->userdata('isLogin') == 200) {
			redirect('timeline');
		}
	}

	public function index()
	{
		error_reporting(0);

		// Data Timeline
		$ch = curl_init();
		if (!empty($this->input->get("page"))) {
			$id = '/'.$this->input->get("page");
		}else{
			$id = "";
		}
		$api_url = checkBase();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Home/index'.$id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		$result = curl_exec($ch);

		$headers=array();
		
		$timeline=explode("\n",$result);
		
		array_shift($timeline);
		
		foreach($timeline as $part){
			$middle=explode(":",$part);
			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}

		// DATA SLIDER
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Home/bestBook');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auths));
		$result = curl_exec($ch);
		
		$headers=array();
		
		$slider=explode("\n",$result);
		
		array_shift($slider);
		
		foreach($slider as $part){
			$middle=explode(":",$part);
			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}

		$resval1 = (array)json_decode(end($timeline), true);
		$resval2 = (array)json_decode(end($slider), true);

		$psn = $timeline['home']['message'];
		$data = $timeline['home']['data'];
		$auth = $timeline['baboo']['BABOO-AUTH-KEY'];
		if (isset($timeline['home']['code']) && $timeline['home']['code'] == '200')
		{
			$status = $timeline['home']['code'];
		}
		else
		{
			$status = $timeline['home']['code'];
		}

		$data['home'] = json_decode(end($timeline), true);
		$data['slide'] = $resval2;
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

		}
		else
		{
			if (!empty($this->input->get("page"))) {
				$result = $this->load->view('data/D_Timeline_out', $data);
			}else{
				$this->load->view('include/head', $data);
				$this->load->view('D_Timeline_out', $data);
				// print_r($resval1)
			}
		}
	}
	public function getBestBook()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$ch = curl_init();
		$options = array(
			CURLOPT_URL			 => $this->API.'timeline/Home/bestBook',
			CURLOPT_RETURNTRANSFER => true,
	          CURLOPT_CUSTOMREQUEST  =>"GET",    // Atur type request
	          CURLOPT_POST           =>false,    // Atur menjadi GET
	          CURLOPT_FOLLOWLOCATION => false,    // Follow redirect aktif
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

		$data['home'] = json_decode(end($data), true);
		$data_best = $data['home']['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		if (isset($data['home']['code']) && $data['home']['code'] == '200')
		{
			$status = $data['home']['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $data['home']['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		// print_r(end($data));
		if ($datas['home']['code'] == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode($data_best, true);
		}
	}
	public function getWritter()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Home/bestWriter');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		
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
		$data = json_decode(end($datas), true);
		
		echo json_encode($data['data'], true);
	}
}
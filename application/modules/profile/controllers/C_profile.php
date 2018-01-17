<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profile extends MX_Controller {

	var $API = "";

	function __construct(){
		parent::__construct();
		$this->API = "api.dev-baboo.co.id/v1/auth/OAuth";

		if ($this->session->userdata('isLogin') != 200) {
			redirect('login');
		}
	}

	public function index()
	{
		error_reporting(0);
		$url = $this->API.'/profile';
		$auth = $this->session->userdata('authKey');
		$userdata = $this->session->userdata('userData');

		$sendData = array(
			'user_id' => $userdata['user_id']
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
		$result = curl_exec($ch);


		$headers=array();

		$data=explode("\n",$result);


		array_shift($data);
		$middle = array();
		$moddle = array();
		foreach($data as $part){
			$middle=explode(":",$part);
			$moddle=explode("{",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}
		$getdata = end($data);
		$resval =  json_decode($getdata, TRUE);

		$psn = $resval['message'];
		$userdetail = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		$status = $resval['code'];
		$data['userdata'] = $userdetail;

		$data['title'] = "Profile Page - Baboo";
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/jquery.sticky-kit.min.js";
		if ($this->agent->mobile()) {

			$data['css'][] = "public/css/baboo-responsive.css";
			$data['js'][] = "public/js/custom/mobile/r_profile_page.js";
			
			$this->load->view('include/head', $data);
			$this->load->view('R_profile', $data);
			
		}else{
			$data['js'][] = "public/js/custom/profile_page.js";

			$this->load->view('include/head', $data);
			$this->load->view('D_profile');
			// $this->load->view('timeline/include/foot');

		}
	}

	public function getPublishBook() {
		error_reporting(0);
		$url = 'api.dev-baboo.co.id/v1/timeline/Timelines/publish';
		$auth = $this->session->userdata('authKey');
		$userdata = $this->input->post('user_id');

		$sendData = array(
			'user_id' => $userdata
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
		$result = curl_exec($ch);


		$headers=array();

		$data=explode("\n",$result);


		array_shift($data);
		$middle = array();
		$moddle = array();
		foreach($data as $part){
			$middle=explode(":",$part);
			$moddle=explode("{",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}
		$getdata = end($data);
		$resval =  json_decode($getdata, TRUE);

		$psn = $resval['message'];
		$userdetail = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		$status = $resval['code'];

		echo json_encode($userdetail);	
	}

	public function getDraftBook() {
		error_reporting(0);
		$url = 'api.dev-baboo.co.id/v1/timeline/Timelines/draft';
		$auth = $this->session->userdata('authKey');
		$userdata = $this->input->post('user_id');

		$sendData = array(
			'user_id' => $userdata
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
		$result = curl_exec($ch);


		$headers=array();

		$data=explode("\n",$result);


		array_shift($data);
		$middle = array();
		$moddle = array();
		foreach($data as $part){
			$middle=explode(":",$part);
			$moddle=explode("{",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}
		$getdata = end($data);
		$resval =  json_decode($getdata, TRUE);

		$psn = $resval['message'];
		$userdetail = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		$status = $resval['code'];

		echo json_encode($userdetail);	
	}

	public function getLatestRead()
	{
		error_reporting(0);
		$url = 'api.dev-baboo.co.id/v1/book/Books/latestRead';
		$auth = $this->session->userdata('authKey');
		$userdata = $this->input->post('user_id');

		$sendData = array(
			'user_id' => $userdata
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
		$result = curl_exec($ch);


		$headers=array();

		$data=explode("\n",$result);


		array_shift($data);
		$middle = array();
		$moddle = array();
		foreach($data as $part){
			$middle=explode(":",$part);
			$moddle=explode("{",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}
		$getdata = end($data);
		$resval =  json_decode($getdata, TRUE);

		$psn = $resval['message'];
		$userdetail = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		$status = $resval['code'];

		echo json_encode($userdetail);
	}

	public function settingProfile()
	{
		$data['title'] = 'Pengaturan | Baboo - Beyond Book &amp; Creativity';
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/tether.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$this->load->view('R_setting_profile', $data);
	}

}
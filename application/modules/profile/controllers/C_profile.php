<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_profile extends MX_Controller {
	var $API = "";
	function __construct(){
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;
		if ($this->session->userdata('isLogin') != 200) {
			redirect('login');
		}
	}
	public function index()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->session->userdata('userData');
		$sendData = array(
			'user_id' => $userdata['user_id']
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'auth/OAuth/profile');
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
		
		$status = $resval['code'];
		$data['userdata'] = $userdetail;
		$data['title'] = "Profile Page - Baboo";
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/jquery.sticky-kit.min.js";
		$data['js'][] = "public/js/custom/notification.js";
		$data['js'][] = "public/js/jquery.validate.js";
		
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$this->session->set_userdata('authKey', $auth);
			if ($this->agent->mobile()) {
				$data['css'][] = "public/css/baboo-responsive.css";
				$data['js'][] = "public/js/custom/mobile/r_profile_page.js";
				$data['js'][] = "public/js/custom/mobile/r_first_login.js";
				$data['js'][] = "public/js/menupage.js";
				$this->load->view('include/head', $data);
				$this->load->view('R_profile', $data);
			}else{
				$data['css'][] = "public/css/baboo.css";
				$data['css'][] = "public/css/sweetalert2.min.css";
				$data['js'][] = "public/js/sweetalert2.all.min.js";
				$data['js'][] = "public/js/custom/profile_page.js";
				$this->load->view('include/head', $data);
				$this->load->view('D_profile');
			// $this->load->view('timeline/include/foot');
			}
		}
	}
	public function otherProfile()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->session->userdata('userData');
		$id_user = $this->input->post('usr_prf');
		
		$iduser = $this->uri->segment(2);
        $ids = explode('-', $iduser, 2);
        if (is_array($ids)) ;

        if ($id_user != NULL || $id_user != "") {
        	$idfix = $id_user;
        }else {
        	$idfix = $ids[0];
        }
		$sendData = array(
			'user_id' => $userdata['user_id'], 
			'user_profile' => $idfix 
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'auth/OAuth/otherProfile');
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
		$status = $resval['code'];
		$auth = $headers['BABOO-AUTH-KEY'];

		$data['userdata'] = $userdetail['user_info'];
		$data['bookdata'] = $userdetail['book_published'];
		// $data['bookprofile'] = $userbook;
		$data['title'] = "Profile Page - Baboo";
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/jquery.sticky-kit.min.js";
		$data['js'][] = "public/js/custom/follow.js";
		$data['js'][] = "public/js/custom/notification.js";

		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$this->session->set_userdata('authKey', $auth);

			if ($this->agent->mobile()) {

				$data['css'][] = "public/css/baboo-responsive.css";
				$data['js'][] = "public/js/menupage.js";
				$data['js'][] = "public/js/custom/mobile/r_other_profile.js";

				$this->load->view('include/head', $data);
				$this->load->view('R_other_profile');

			}else{
				$data['js'][] = "public/js/custom/profile_page.js";

				$this->load->view('include/head', $data);
				$this->load->view('D_profile');
			// $this->load->view('timeline/include/foot');

			}
		}
		// print_r($result_books);
		// print_r($data['userdata']);
	}
	public function getPublishBook() {
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->input->post('user_id');
		$sendData = array(
			'user_id' => $userdata
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/publish');
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
		$datas = $resval['data'];
		$status = $resval['code'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array('code' => $status, 'data' => $datas));
		}
	}
	public function getDraftBook() {
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->input->post('user_id');
		$sendData = array(
			'user_id' => $userdata
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/draft');
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
		
		$status = $resval['code'];
		$this->session->set_userdata('authKey', $auth);
		
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode($userdetail);
		}
	}
	public function getLatestRead()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->input->post('user_id');
		$sendData = array(
			'user_id' => $userdata
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'book/Books/latestRead');
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
		
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode($userdetail);
		}
	}
	public function settingProfile()
	{
		$data['title'] = 'Pengaturan | Baboo.id';
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
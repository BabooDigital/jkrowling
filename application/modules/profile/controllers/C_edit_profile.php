<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_edit_profile extends MX_Controller {

	function __construct(){
		parent::__construct();

		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		$user = $this->session->userdata('userData');

		$data['userData'] = $user;

		$data['title'] = "Ubah Data Profile | Baboo - Beyond Book &amp; Creativity";
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/tether.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/moment.js";
		$data['js'][] = "public/js/combodate.js";
		$data['js'][] = "public/js/custom/mobile/r_profile_page.js";

		$this->load->view('R_edit_profile', $data);
	}

	public function postEditProfile()
	{
		error_reporting(0);
		$url = 'api.dev-baboo.co.id/v1/auth/OAuth/editProfile';
		$auth = $this->session->userdata('authKey');
		$user = $this->session->userdata('userData');

		$name = $this->input->post('fullname');
		$date = $this->input->post('date_of_birth');
		$address = $this->input->post('location');
		$bio = $this->input->post('about_me');

		$sendData = array(
			'user_id' => $user['user_id'],
			'fullname' => $name,
			'date_of_birth' => $date,
			'location' => $address,
			'about_me' => $bio
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

		$resval =  json_decode(end($data), TRUE);

		$psn = $resval['message'];
		$userdetail = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		$status = $resval['code'];
	}

	public function completeProfile()
	{
		$data['title'] = 'Lengkapi Profile | Baboo';
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/tether.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/moment.js";
		$data['js'][] = "public/js/combodate.js";
		$data['js'][] = "public/js/custom/mobile/r_first_login.js";
		
		$this->load->view('R_fill_profile', $data);
	}

	public function selectCategory()
	{
		$data['title'] = 'Pilih Kategori | Baboo';
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/tether.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/moment.js";
		$data['js'][] = "public/js/combodate.js";
		$data['js'][] = "public/js/custom/mobile/r_profile_page.js";

		$this->load->view('R_select_category', $data);
	}

	public function firstFollowUser()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');

		$url = 'api.dev-baboo.co.id/v1/timeline/Timelines/bestWriter';

		$user = $this->session->userdata('userData');

		$sendData = array(
			'user_id' => $user['user_id']
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

		$resval = json_decode(end($data), true);
		$auth = $headers['BABOO-AUTH-KEY'];
		
		if ($resval['code'] == 200) {
			$this->session->set_userdata('authKey', $auth);
		}

		$data['userFollow'] = $resval['data'];

		$data['title'] = 'Ikuti Pengguna | Baboo';
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/tether.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/moment.js";
		$data['js'][] = "public/js/combodate.js";
		$data['js'][] = "public/js/custom/mobile/r_first_follow.js";

		$this->load->view('R_first_follow', $data);
	}

	public function postUploadProfPict()
	{
		error_reporting(0);
		$url = 'api.dev-baboo.co.id/v1/auth/OAuth/uploadProfpict';
		$auth = $this->session->userdata('authKey');

		$user = $this->input->post('user_id');

		$file_name_with_full_path = $_FILES["prof_pict"]["tmp_name"];
	        if (function_exists('curl_file_create')) { // php 5.5+
	        	$cFile = curl_file_create($file_name_with_full_path, $_FILES["prof_pict"]["type"],$_FILES["prof_pict"]["name"]);
	        } else { //
	        	$cFile = '@' . realpath($file_name_with_full_path);
	        }

		$sendData = array(
			'user_id' => $user['user_id'],
			'prof_pict' => $cFile,
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data','baboo-auth-key : '.$auth));
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

		$resval =  json_decode(end($data), TRUE);

		$psn = $resval['message'];
		$userdetail = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		if ($resval['code'] == 200) {
			$this->session->set_userdata('authKey', $auth);
		}
		$status = $resval['code'];
		print_r($resval);
	}

}
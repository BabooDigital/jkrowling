<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_notification extends MX_Controller
{
	
	function __construct(){
		parent::__construct();	
		if ($this->session->userdata('isLogin') != 200) {
			redirect('login');
		}

        $api_url = checkBase();

        $this->API = $api_url."/timeline/Timelines";
	}
	public function index()
	{
		$data['title'] = "Notification Page - Baboo";

		$data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/js/menupage.js";
        // $data['js'][] = "public/js/notification.js";
		if ($this->agent->is_mobile()){

			$this->load->view('include/head', $data);
			$this->load->view('R_notification', $data);

		}
	}
	public function getNotification()
	{
		$auth = $this->session->userdata('authKey');
		$id_user = $this->session->userdata('userData')['user_id'];

		$userdata = array(
			'user_id' => $id_user
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/notification');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $userdata);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
		$result = curl_exec($ch);

		$headers=array();

		$data=explode("\n",$result);


		array_shift($data);

		foreach($data as $part){
			$middle=explode(":",$part);
			error_reporting(0);
			$headers[trim($middle[0])] = trim($middle[1]);
		}
		$resval = (array)json_decode(end($data));
		$notif = (array)$resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		if(!empty($auth)){
			$this->session->set_userdata('authKey', $auth);
		}
		if (isset($resval['code']) && $resval['code'] == '200')
		{
			$status = $resval['code'];
		}
		else
		{
			$status = $resval['code'];
		}
		$data['title'] = "Notification Page - Baboo";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/menupage.js";
		echo json_encode($notif);
	}
	public function activity()
	{
		$auth = $this->session->userdata('authKey');
		$id_user = $this->session->userdata('userData')['user_id'];

		$userdata = array(
			'user_id' => $id_user
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/notification');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $userdata);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
		$result = curl_exec($ch);

		$headers=array();

		$data=explode("\n",$result);


		array_shift($data);

		foreach($data as $part){
			$middle=explode(":",$part);
			error_reporting(0);
			$headers[trim($middle[0])] = trim($middle[1]);
		}
		$resval = (array)json_decode(end($data));
		$notif = (array)$resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		if (isset($resval['code']) && $resval['code'] == '200')
		{
			$status = $resval['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $resval['code'];
		}
		$data['title'] = "Notification Page - Baboo";
		$data['notification'] = $notif;
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/menupage.js";
		if ($this->agent->is_mobile()){

			$this->load->view('include/head', $data);
			$this->load->view('R_notification', $data);
			// print_r($result);

		}else{
			echo json_encode($notif);
		}
	}
	public function updateNtf()
	{
		$auth = $this->session->userdata('authKey');
		$id_notif = $this->input->post('ntf');

		$updateNtf = array(
			'notif_id' => $id_notif,
			'delete'   => false
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/notifUpdatestat');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $updateNtf);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
		$result = curl_exec($ch);

		$headers=array();
;
		$data=explode("\n",$result);


		array_shift($data);

		foreach($data as $part){
			$middle=explode(":",$part);
			error_reporting(0);
			$headers[trim($middle[0])] = trim($middle[1]);
		}
		$resval = (array)json_decode(end($data));
		$notif = (array)$resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		if (isset($resval['code']) && $resval['code'] == '200')
		{
			$status = $resval['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $resval['code'];
		}
		// print_r($data);
		// echo json_encode($data);
	}
}
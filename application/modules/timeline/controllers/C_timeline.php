<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_timeline extends MX_Controller {

	var $API = "";

	function __construct(){
		parent::__construct();
		$this->API = "api.dev-baboo.co.id/v1/timeline/Timelines";
		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}


	public function index()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->session->userdata('userData');


		$ch = curl_init();
		if (!empty($this->input->get("page"))) {
			$id = '/'.$this->input->get("page");
		}else{
			$id = "";
		}
		$url = $this->API.'/index'.$id;
		$uid = array(
			'user_id' => $userdata['user_id']
		);
		// print_r($uid);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $uid);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
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

    $resval = (array)json_decode($data[16], true);

		$psn = $resval['message'];
		$book = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		$status = $resval['code'];
		
		$datas['home'] = $book;

   		$datas['judul'] = "Baboo - Beyond Book & Creativity";
		$datas['js'][]   = "public/js/jquery.min.js";
		$datas['js'][]   = "public/js/jquery.sticky-kit.min.js";
		$datas['js'][]   = "public/js/custom/D_timeline_in.js";

		if ($this->agent->is_mobile('ipad'))
		{
			$this->load->view('include/head', $datas);
			$this->load->view('D_Timeline_in');
		}
		if ($this->agent->is_mobile())
		{
			$data['js'][]   = "public/js/menupage.js";
			if (!empty($this->input->get("page"))) {
				$result = $this->load->view('data/R_Timeline_in', $datas);
			}else{
				$this->load->view('include/head', $datas);
				$this->load->view('R_Timeline_in', $datas);
			}
			// $this->load->view('R_Timeline_in', $datas);
		}
		else
		{
			$this->load->view('include/head', $datas);
			$this->load->view('D_Timeline_in',$datas);
		}
	}

	public function createbook_id()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$id = $this->input->post('iaiduui');
		$bookData = array(
			'user_id' => $id
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'api.dev-baboo.co.id/v1/book/Books/preCreateBook');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $bookData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
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


		$resval = (array)json_decode($data[16], true);

		$psn = $resval['message'];
		$book = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		if (isset($resval['code']) && $resval['code'] == '200')
		{
			$status = $resval['code'];
			$this->session->set_userdata('authKey', $auth);
			$this->session->set_userdata('idBook_', $book['book_id']);
			redirect('my_book/'.$book['book_id']);
		}
		else
		{
			$status = $resval['code'];
		}
		echo json_encode(array(
			'code' => $status,
			'data' => $book,
			'message' => $psn
		));	
	}

	public function getWritter()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$url = 'api.dev-baboo.co.id/v1/timeline/Home/bestWriter';
		$ch = curl_init();
		$options = array(
			CURLOPT_URL			 => $url,
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

		$data['home'] = json_decode($data[14], true);
		$auth = $headers['BABOO-AUTH-KEY'];
		if (isset($data['home']['code']) && $data['home']['code'] == '200')
		{
			$status = $data['home']['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $data['home']['code'];
		}
		echo json_encode($data[14], true);
	}
	
	public function signout() {
		$this->facebook->destroy_session();
		$this->session->unset_userdata('isLogin');
		$this->session->sess_destroy();
		redirect('');
	}
	public function explore()
	{
		$this->load->view('page/explore');
	}
	public function library()
	{
		$this->load->view('page/library');
	}
	public function profile()
	{
		$this->load->view('page/profile');
	}
}
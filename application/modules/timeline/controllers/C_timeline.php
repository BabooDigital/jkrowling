<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_timeline extends MX_Controller {

	var $API = "";

	function __construct(){
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;			
		
		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
		$this->load->library(array('simple_cache','thousand_to_k'));
	}

	
	public function index()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->session->userdata('userData');

		$ch = curl_init();
		if (!empty($this->input->get("page"))) {
			$id = $this->input->get("page");
		}else{
			$id = "";
		}
		$uid = array(
			'count' => $id
		);

		$resval = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/index', $uid, $auth);
		$best_writter = $this->curl_request->curl_get($this->API.'timeline/Home/bestWriter', '', $auth);
		$best_book = $this->curl_request->curl_get($this->API.'timeline/Timelines/bestBook', '', $auth);

		$psn = $resval['message'];
		$book = $resval['data']['data'];
		$auth = $resval['bbo_auth'];
		$this->session->set_userdata('authKey', $auth);
		$status = $resval['data']['code'];
		
		if (!$this->simple_cache->is_cached('key'))
		{
			$datas['home'] = $book;

			$datas['writter'] = $best_writter['data'];
			$datas['best'] = $best_book['data'];

			$datas['title'] = "Baboo.id";
			
			$datas['css'][] = "public/plugins/holdOn/css/HoldOn.css";

			$datas['css'][] = "public/css/sweetalert2.min.css";
			$datas['js'][] = "public/js/sweetalert2.all.min.js";
			$datas['js'][]   = "public/js/jquery.min.js";
			$datas['js'][]   = "public/js/umd/popper.min.js";
			$datas['js'][]   = "public/js/bootstrap.min.js";
			$datas['js'][]   = "public/js/jquery.sticky-kit.min.js";
			$datas['js'][] = "public/plugins/holdOn/js/HoldOn.js";
			$datas['js'][]   = "public/js/custom/notification.js";
			$datas['js'][]   = "public/js/custom/transaction.js";
			$datas['js'][]   = "public/js/custom/follow.js";
			$this->simple_cache->cache_item('key', $datas);
		} else {
			$datas = $this->simple_cache->get_item('key');
		}
		if ($resval['code'] == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			if ($this->agent->is_mobile())
			{
				$datas['js'][]   = "public/js/custom/mobile/r_timeline_in.js";
				$datas['js'][]   = "public/js/menupage.js";

				if (!empty($this->input->get("page"))) {
					$result = $this->load->view('data/R_Timeline_in', $datas);
				}else{

					$this->load->view('include/head', $datas);
					$this->load->view('R_Timeline_in', $datas);
				}
			}
			else
			{
				$datas['js'][]   = "public/js/custom/search.js";
				$datas['js'][]   = "public/js/custom/D_timeline_in.js";
				if (!empty($this->input->get("page"))) {
					
					$result = $this->load->view('data/D_timeline_in', $datas);
				}else{

					$this->load->view('include/head',$datas);
					$this->load->view('D_Timeline_in', $datas);
				}
			}
		}
	}
	public function getBestBookEvent()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$ch = curl_init();
		$options = array(
			CURLOPT_URL			 => $this->API.'timeline/Timelines/bestBook',
			CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_CUSTOMREQUEST  =>"GET",    // Atur type request
	        CURLOPT_POST           =>false,    // Atur menjadi GET
	        CURLOPT_FOLLOWLOCATION => false,    // Follow redirect aktif
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

		$data['home'] = json_decode(end($data), true);
		$data_best = $data['home']['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		$this->session->set_userdata('authKey', $auth);
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
	public function createbook_id()
	{
		if ($this->session->userdata('dataBook')) {
			$this->session->unset_userdata('dataCover');
			$this->session->unset_userdata('dataBook');
		}
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$id = $this->input->post('iaiduui');
		$bookData = array(
			'user_id' => $id
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'book/Books/preCreateBook');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $bookData);
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
		$data = $this->curl_request->curl_get($this->API.'timeline/Home/bestWriter', '', $auth);

		$datas['home'] = $data;
		if ($datas['home']['code'] == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(end($datas['home']), true);
		}
	}
	public function getBestBook()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$ch = curl_init();
		$options = array(
			CURLOPT_URL			 => $this->API.'timeline/Timelines/bestBook',
			CURLOPT_RETURNTRANSFER => true,
	          CURLOPT_CUSTOMREQUEST  =>"GET",    // Atur type request
	          CURLOPT_POST           =>false,    // Atur menjadi GET
	          CURLOPT_FOLLOWLOCATION => false,    // Follow redirect aktif
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
	
	public function signout() {
		$this->facebook->destroy_session();
		$this->session->unset_userdata('isLogin');
		$this->session->sess_destroy();
		redirect('');
	}

	public function postBookmark()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userid = $this->input->post('user_id');
		$bookid = $this->input->post('book_id');

		$sendData = array(
			'user_id' => $userid,
			'book_id' => $bookid
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/bookmark');
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
		// print_r($resval);
		$status = $resval['code'];
		$pesan = $resval['message'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array('code' => $status, 'message' => $pesan));
		}
	}

	public function postLike()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userid = $this->input->post('user_id');
		$bookid = $this->input->post('book_id');

		$sendData = array(
			'user_id' => $userid,
			'book_id' => $bookid
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/likeBook');
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
		$status = $resval['code'];
		$pesan = $resval['message'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array('code' => $status, 'message' => $pesan));	
		}
	}

	public function postFollowUser()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$fuserid = $this->input->post('fuser_id');
		$userid = $this->input->post('user_id');
		if (empty($userid)) {
			$id_user = $userid;
		}else{
			$id_user = $this->session->userdata('userData')['user_id'];
		}
		$sendData = array(
			'user_follow' => $fuserid,
			'user_id' => $id_user
		);
		// print_r($sendData);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/follow');
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
		$status = $resval['code'];
		$pesan = $resval['message'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array('code' => $status, 'message' => $pesan));	
		}
	}

	public function postShareSocmed()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userid = $this->input->post('user_id');
		$bookid = $this->input->post('book_id');

		$sendData = array(
			'user_id' => $userid,
			'book_id' => $bookid,
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/shareBook');
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
		$status = $resval['code'];
		$pesan = $resval['message'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array('code' => $status, 'message' => $pesan));	
		}
	}

	public function draftListView()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userid = $this->input->post('user_id');

		$sendData = array(
			'user_id' => $userid
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
		$status = $resval['code'];
		$pesan = $resval['message'];
		$auth = $headers['BABOO-AUTH-KEY'];
		
		$this->session->set_userdata('authKey', $auth);
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{	
		}
		if ($this->agent->mobile()) {
			$data['datadraft'] = $resval['data'];
			$data['title'] = "Daftar Draft Buku | Baboo.id";
			$data['css'][] = "public/css/bootstrap.min.css";
			$data['css'][] = "public/css/font-awesome.min.css";
			$data['css'][] = "public/css/baboo-responsive.css";
			$data['css'][] = "public/css/custom-margin-padding.css";
			$data['css'][] = "public/css/sweetalert2.min.css";

			$data['js'][] = "public/js/jquery.min.js";
			$data['js'][] = "public/js/tether.min.js";
			$data['js'][] = "public/js/umd/popper.min.js";
			$data['js'][] = "public/js/bootstrap.min.js";
			$data['js'][] = "public/js/sweetalert2.all.min.js";
			$data['js'][] = "public/js/custom/mobile/r_draft.js";
			$data['js'][] = "public/js/menupage.js";

			$this->load->view('R_draft', $data);
		}else{
		}
	}

	public function AllPopularWriters()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$url = $this->API . 'timeline/Home/popularWriter';
		$ch = curl_init();
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",    // Atur type request
            CURLOPT_POST => false,    // Atur menjadi GET
            CURLOPT_FOLLOWLOCATION => false,    // Follow redirect aktif
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HEADER => 1,
            CURLOPT_HTTPHEADER => array('baboo-auth-key: ' . $auth)

        );
		curl_setopt_array($ch, $options);
		$content = curl_exec($ch);
		curl_close($ch);
		$headers = array();

		$data = explode("\n", $content);
		$headers['status'] = $data[0];

		array_shift($data);

		foreach ($data as $part) {
			$middle = explode(":", $part);
			$headers[trim($middle[0])] = trim($middle[1]);
		}

		$resval = json_decode(end($data), true);
		$auth = $headers['BABOO-AUTH-KEY'];
		if (isset($resval['code']) && $resval['code'] == 200) {
			if ($this->agent->is_mobile())
			{
				$data['populars'] = $resval['data'];
				$data['title'] = "Daftar Penulis Populer | Baboo.id";
				$data['css'][] = "public/css/bootstrap.min.css";
				$data['css'][] = "public/css/font-awesome.min.css";
				$data['css'][] = "public/css/baboo-responsive.css";
				$data['css'][] = "public/css/custom-margin-padding.css";

				$data['js'][] = "public/js/jquery.min.js";
				$data['js'][] = "public/js/tether.min.js";
				$data['js'][] = "public/js/umd/popper.min.js";
				$data['js'][] = "public/js/bootstrap.min.js";
				$data['js'][]   = "public/js/custom/follow.js";
				$data['js'][] = "public/js/menupage.js";

				$this->session->set_userdata('authKey', $auth);
				$this->load->view('data/R_popular_writer', $data);
			}
			else
			{
				
			}

		} else {
			$status = $resval['code'];
		}

		if ($resval['code'] == 403) {
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login', 'refresh');
		} else {
			
		}
	}
}
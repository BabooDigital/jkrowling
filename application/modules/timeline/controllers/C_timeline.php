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
		$this->load->library(array('simple_cache'));
	}
	
	public function index()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->session->userdata('userData');
		$ch = curl_init();
		if (!empty($this->input->get("page"))) {
			$idpage = $this->input->get("page");
		}else{
			$idpage = "";
		}
		$sendData = array('count' => $idpage );

		$this->curl_multiple->add_call("writter","get",$this->API.'timeline/Home/bestWriter','',array(CURLOPT_HTTPHEADER => array('baboo-auth-key: '.$auth)));
		$this->curl_multiple->add_call("book","get",$this->API.'timeline/Timelines/bestBook','',array(CURLOPT_HTTPHEADER => array('baboo-auth-key: '.$auth)));
		$resvals = $this->curl_multiple->execute();
		$resval = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/home', $sendData, $auth);

		$best_writter = json_decode($resvals['writter']['response'], TRUE);
		$best_book = json_decode($resvals['book']['response'], TRUE);

		$auth = $resval['bbo_auth'];
		$this->session->set_userdata('authKey', $auth);
		if (!$this->simple_cache->is_cached('key'))
		{
			$datas['home'] = $resval['data']['data'];
			$datas['writter'] = $best_writter['data'];
			$datas['best'] = $best_book['data'];
			$datas['title'] = "Baboo.id";
			
			$datas['css'][] = "public/css/sweetalert2.min.css";
			$datas['js'][]	 = "public/js/sweetalert2.all.min.js";
			$datas['js'][]   = "public/js/jquery.min.js";
			$datas['js'][]   = "public/js/umd/popper.min.js";
			$datas['js'][]   = "public/js/bootstrap.min.js";
			$datas['js'][]   = "public/js/custom/notification.js";
			$datas['js'][]   = "public/js/custom/transaction.js";
			$this->simple_cache->cache_item('key', $datas);
		} else {
			$datas = $this->simple_cache->get_item('key');
		}
		if ($resval['data']['code'] == 403){
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
					$this->load->view('R_Timeline_in');
				}
			}
			else
			{
				$datas['css'][] = "public/plugins/holdOn/css/HoldOn.css";
				$datas['js'][]   = "public/js/jquery.sticky-kit.min.js";
				$datas['js'][]	 = "public/plugins/holdOn/js/HoldOn.js";
				$datas['js'][]   = "public/js/custom/follow.js";
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
	// public function getBestBookEvent()
	// {
	// 	error_reporting(0);
	// 	$auth = $this->session->userdata('authKey');
	// 	$datas = $this->curl_request->curl_get_auth($this->API.'timeline/Timelines/bestBook', '', $auth);

	// 	$data['home'] = $datas['data'];
	// 	$data_best = $data['home']['data'];
	// 	$auth = $datas['bbo_auth'];
	// 	$this->session->set_userdata('authKey', $auth);

	// 	if ($datas['home']['code'] == 403){
	// 		$this->session->unset_userdata('userData');
	// 		$this->session->unset_userdata('authKey');
	// 		$this->session->sess_destroy();
	// 		redirect('login','refresh');
	// 	}else{
	// 		echo json_encode($data_best, true);
	// 	}
	// }
	public function createbook_id()
	{
		if ($this->session->userdata('dataBook')) {
			$this->session->unset_userdata('dataCover');
			$this->session->unset_userdata('dataBook');
		}
		error_reporting(0);
		$auth = $this->session->userdata('authKey');

		$resval = $this->curl_request->curl_post_auth($this->API.'book/Books/preCreateBook', '', $auth);

		$book = $resval['data']['data'];
		$auth = $resval['bbo_auth'];
		if (isset($resval['data']['code']) && $resval['data']['code'] == '200')
		{
			$status = $resval['data']['code'];
			$this->session->set_userdata('authKey', $auth);
			$this->session->set_userdata('idBook_', $book['book_id']);
			redirect('my_book/'.$book['book_id']);
		}
		else
		{
			$status = $resval['data']['code'];
		}
		echo json_encode(array(
			'code' => $status,
			'data' => $book
		));	
	}
	public function getWritter()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$data = $this->curl_request->curl_get($this->API.'timeline/Home/bestWriter', '', $auth);
		$datas['home'] = $data;
		if ($datas['home']['data']['code'] == 403){
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
		$resval = $this->curl_request->curl_get_auth($this->API.'timeline/Timelines/bestBook', '', $auth);

		$data['home'] = $resval['data']['data'];
		$data_best = $data['home']['data'];
		$auth = $resval['bbo_auth'];
		if (isset($data_best['code']) && $data_best['code'] == '200')
		{
			$status = $data_best['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $data_best['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		if ($data_best['code'] == 403){
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
		$userid = $this->input->post('user_id', TRUE);
		$bookid = $this->input->post('book_id', TRUE);

		$sendData = array(
			'book_id' => $bookid
		);

		$resval = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/bookmark', $sendData, $auth);

		$status = $resval['data']['code'];
		$auth = $resval['bbo_auth'];
		
		$this->session->set_userdata('authKey', $auth);
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array('code' => $status));
		}
	}
	public function postLike()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');

		$bookid = $this->input->post('book_id', TRUE);

		$sendData = array(
			'book_id' => $bookid
		);

		$resval = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/likeBook', $sendData, $auth);

		$status = $resval['data']['code'];
		$pesan = $resval['data']['message'];
		
		$auth = $resval['bbo_auth'];
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

		$fuserid = $this->input->post('fuser_id', TRUE);

		$sendData = array(
			'user_follow' => $fuserid
		);

		$resval = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/follow', $sendData, $auth);

		$status = $resval['data']['code'];
		$pesan = $resval['data']['message'];
		
		$auth = $resval['bbo_auth'];
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

		$bookid = $this->input->post('book_id', TRUE);

		$sendData = array(
			'book_id' => $bookid,
		);

		$resval = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/shareBook', $sendData, $auth);

		$status = $resval['data']['code'];
		$pesan = $resval['data']['message'];
		
		$auth = $resval['bbo_auth'];
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

		$resval = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/draft', '', $auth);

		$status = $resval['data']['code'];

		$auth = $resval['bbo_auth'];
		$this->session->set_userdata('authKey', $auth);
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{	
		}
		if ($this->agent->mobile()) {
			$data['datadraft'] = $resval['data']['data'];
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

		$resval = $this->curl_request->curl_get_auth($this->API.'timeline/Home/popularWriter', '', $auth);

		$auth = $resval['bbo_auth'];
		$this->session->set_userdata('authKey', $auth);
		if (isset($resval['data']['code']) && $resval['data']['code'] == 200) {
			if ($this->agent->is_mobile())
			{
				$data['populars'] = $resval['data']['data'];
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
				$this->load->view('data/R_popular_writer', $data);
			}
			else
			{
				
			}
		} else {
			$status = $resval['data']['code'];
		}
		if ($resval['data']['code'] == 403) {
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login', 'refresh');
		} else {
			
		}
	}
}
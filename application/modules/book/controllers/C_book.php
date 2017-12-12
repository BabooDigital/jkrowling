<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_book extends MX_Controller {

	var $API = "";

	function __construct(){
		parent::__construct();
		$this->API = "api.dev-baboo.co.id/v1/book/Books";

		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$id_book = $this->uri->segment(2);
		$idb = explode('-', $id_book, 2);
		if (is_array($idb));
		// $id_chapter = $this->uri->segment(4);

        // $url = $this->API.'/detailBook/'.$id_book.'/chapter/'.$id_chapter;

        if (!$this->input->get("chapter")) {
        	$url = $this->API.'/detailBook/'.$idb[0];
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

	        $data['detail_book'] = json_decode($data[14], true);
	        $auth = $headers['BABOO-AUTH-KEY'];
	        if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200')
	        {
	            $status = $data['detail_book']['code'];
	           	$this->session->set_userdata('authKey', $auth);
	           	// $this->session->set_userdata('dataBook', $book);
	        }
	        else
	        {
	            $status = $data['detail_book']['code'];
	        }
        }else{
			$id = '/'.$this->input->get("chapter");

        	$url = $this->API.'/detailBook/'.$idb[0];
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

	        $data['detail_book'] = json_decode($data[14], true);
	        $auth = $headers['BABOO-AUTH-KEY'];
	        if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200')
	        {
	            $status = $data['detail_book']['code'];
	           	$this->session->set_userdata('authKey', $auth);
	           	// $this->session->set_userdata('dataBook', $book);
	        }
	        else
	        {
	            $status = $data['detail_book']['code'];
	        }

        }
        
		$data['judul'] = $data['detail_book']['data']['title_book']." - Baboo";
		$data['detailBook'] = json_decode($data[14], true);
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/jquery.sticky-kit.min.js";
		$data['js'][] = "public/js/custom/detail_book.js";
		
		if ($this->agent->mobile()) {
			$this->load->view('timeline/include/head', $data);
			$this->load->view('R_book', $data);
		}else{
			if ($this->input->get("chapter")) {
				print_r($data['detail_book']['data']['chapters']);
			}else{	
				$this->load->view('timeline/include/head', $data);
				$this->load->view('D_book', $data);
			}
		}
		// $this->load->view('timeline/include/foot');
	}
	public function chapter()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$id_book = $this->input->post("id_book");
		$idb = explode('-', $id_book, 2);
		if (is_array($idb));
		$id_chapter = $this->input->post("id_chapter");

        $url = $this->API.'/detailBook/'.$idb[0].'/'.$id_chapter;

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

		$resval = (array)json_decode($data[14], true);
        $data['detail_book'] = json_decode($data[14], true);
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200')
        {
            $status = $data['detail_book']['code'];
           	$this->session->set_userdata('authKey', $auth);
        }
        else
        {
            $status = $data['detail_book']['code'];
        }
        // print_r($resval['data']['content']);
        echo json_encode($resval['data']['content']);
		// $data['judul'] = $data['detail_book']['data']['title_book']." - Baboo";
		// $data['detailBook'] = json_decode($data[14], true);
		// $data['js'][] = "public/js/jquery.min.js";
		// $data['js'][] = "public/js/umd/popper.min.js";
		// $data['js'][] = "public/js/bootstrap.min.js";
		// $data['js'][] = "public/js/jquery.sticky-kit.min.js";
		// $data['js'][] = "public/js/custom/detail_book.js";
		
		// if ($this->agent->mobile()) {
		// 	$this->load->view('timeline/include/head', $data);
		// 	$this->load->view('R_book', $data);
		// }else{
		// 	$this->load->view('timeline/include/head', $data);
		// 	$this->load->view('D_book', $data);
		// }
		// $this->load->view('timeline/include/foot');
	}

	public function readingMode()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$id_book = $this->uri->segment(2);
		$idb = explode('-', $id_book, 2);
		if (is_array($idb));
		// $id_chapter = $this->uri->segment(4);

        // $url = $this->API.'/detailBook/'.$id_book.'/chapter/'.$id_chapter;
        $url = $this->API.'/detailBook/'.$idb[0];
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

        $data['detail_book'] = json_decode($data[14], true);
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200')
        {
            $status = $data['detail_book']['code'];
           	$this->session->set_userdata('authKey', $auth);
           	// $this->session->set_userdata('dataBook', $book);
        }
        else
        {
            $status = $data['detail_book']['code'];
        }
		$data['judul'] = $data['detail_book']['data']['title_book']." - Baboo";
		$data['detailBook'] = json_decode($data[14], true);

		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo.css";
		
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/custom/reading_mode.js";
		$this->load->view('D_readingmode', $data);
	}

}
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
		$user = $this->session->userdata('userData')['user_id'];
		$id_book = $this->uri->segment(2);
		$idb = explode('-', $id_book, 2);
		if (is_array($idb));

		$data_book = array(
			'book_id' => $idb[0],
			'user_id' => $user
		);
		// print_r($data_book);
		// START GET CHAPTER
			
		// END GET CHAPTER
		$ch = curl_init();
        	$url = $this->API.'/detailBook/';
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
	        $content = curl_exec($ch);
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
	        
           	$this->session->set_userdata('authKey', $auth);

           	print_r($content);

        if (!$this->input->get("chapter")) {
	        
        }else{
        	$url = $this->API.'/allChapters/'.$idb[0];
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
	        
	        $data_before_chapter=explode("\n",$content);
	        $headers['status']=$data_before_chapter[0];

			array_shift($data_before_chapter);

			foreach($data_before_chapter as $part){
			    $middle=explode(":",$part);
			    $headers[trim($middle[0])] = trim($middle[1]);
			}

	        $data_before_chapter['chapter'] = json_decode($data_before_chapter[14], true);
	        $auth = $headers['BABOO-AUTH-KEY'];
	        if (isset($data_before_chapter['chapter']['code']) && $data_before_chapter['chapter']['code'] == '200')
	        {
	            $status = $data_before_chapter['chapter']['code'];
	           	$this->session->set_userdata('authKey', $auth);
	        }
	        else
	        {
	            $status = $data_before_chapter['chapter']['code'];
	        }


			$id = '/'.$this->input->get("chapter");

	        $chapter_id = '/'.$data_before_chapter['chapter']['data'][$this->input->get("chapter")]['chapter_id'];

        	$url = $this->API.'/detailBook/'.$idb[0].$chapter_id;
	        $ch = curl_init();
	        $options = array(
	        	  CURLOPT_URL			 => $url,
	        	  CURLOPT_RETURNTRANSFER => true,
		          CURLOPT_CUSTOMREQUEST  =>"POST",    // Atur type request
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
	        }
	        else
	        {
	            $status = $data['detail_book']['code'];
	        }
        }
        
		$data['judul'] = $data['detail_book']['data']['book_info']['title_book']." - Baboo";
		$data['detailBook'] = json_decode($data[14], true);
		$data['detailChapter'] = count($data_before_chapter['chapter']) - 1;
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
				if ($data_before_chapter['chapter']['data'][$this->input->get("chapter")] == null || $data_before_chapter['chapter']['data'][$this->input->get("chapter")] == '') {
		        	print_r("kosong chapter");
		        }else{
					$result = $this->load->view('data/D_book', $data);
		        }
			}else{	
				$this->load->view('timeline/include/head', $data);
				$this->load->view('D_book', $data);
				// print_r($content);
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

        $url = $this->API.'/allChapters/'.$idb[0];
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
        $data_before_chapter=explode("\n",$content);
        $headers['status']=$data_before_chapter[0];

		array_shift($data_before_chapter);

		foreach($data_before_chapter as $part){
		    $middle=explode(":",$part);
		    $headers[trim($middle[0])] = trim($middle[1]);
		}

        $data_before_chapter['chapter'] = json_decode($data_before_chapter[14], true);
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($data_before_chapter['chapter']['code']) && $data_before_chapter['chapter']['code'] == '200')
        {
            $status = $data_before_chapter['chapter']['code'];
           	$this->session->set_userdata('authKey', $auth);
        }
        else
        {
            $status = $data_before_chapter['chapter']['code'];
        }
        echo json_encode($data_before_chapter['chapter']['data']);
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
  //       if (!empty($this->input->get("page"))) {
		// 	$id = '/'.$this->input->get("page");
		// }else{
		// 	$id = "";
		// }
		// $url = 'api.dev-baboo.co.id/v1/timeline/Timelines/index'.$id;
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
		// if (!empty($this->input->get("page"))) {
		// 	$result = $this->load->view('data/D_readingmode', $datas);
		// }else{
		// 	$this->load->view('D_readingmode', $datas);
		// }
	}
}
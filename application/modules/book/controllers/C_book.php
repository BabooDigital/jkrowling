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
        $url = $this->API.'/detailBook/'.$idb[0];
        $ch = curl_init();
        $options = array(
        	  CURLOPT_URL			 => $url,
        	  CURLOPT_RETURNTRANSFER => true,
        	  CURLOPT_FOLLOWLOCATION => true,
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
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/jquery.sticky-kit.min.js";
		$data['js'][] = "public/js/custom/detail_book.js";
		
		$this->load->view('timeline/include/head', $data);
		$this->load->view('D_book', $data);
		// $this->load->view('timeline/include/foot');
	}

}
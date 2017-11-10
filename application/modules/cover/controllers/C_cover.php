<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cover extends MX_Controller {
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		$data['judul'] = "Buat Sebuah Cover Untuk Buku Mu - Baboo";

		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo.css";

		$data['js'][] = "public/js/jquery-3.2.1.slim.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/custom/create_cover.js";

		$this->load->view('D_createcover', $data);
	}

}
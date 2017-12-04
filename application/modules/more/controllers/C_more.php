<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_more extends MX_Controller
{
	
	function __construct(){
		// parent::__construct();	
		// if ($this->session->userdata('isLogin') != 200) {
		// 	redirect('home');
		// }
	}
	public function index()
	{
		$data['judul'] = "More Page - Baboo";

		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/js/custom/author_this_week.js";
		$data['js'][]   = "public/js/menupage.js";
		if ($this->agent->is_mobile()){

			$this->load->view('timeline/include/head', $data);
			$this->load->view('R_more', $data);
		
		}
	}
}
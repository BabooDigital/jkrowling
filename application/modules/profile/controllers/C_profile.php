<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profile extends MX_Controller {
	function __construct(){
		parent::__construct();
		// if ($this->session->userdata('isLogin') != 200) {
		// 	redirect('home');
		// }
	}

	public function index()
	{
		$data['judul'] = "Profile Page - Baboo";
		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/js/custom/author_this_week.js";
		$data['js'][]   = "public/js/menupage.js";
		if ($this->agent->mobile()) {

			$data['css'][]   = "public/css/baboo-responsive.css";
			$this->load->view('timeline/include/head', $data);
			$this->load->view('R_profile', $data);
			
		}else{
			$this->load->view('timeline/include/head', $data);
			$this->load->view('D_profile');
			$this->load->view('timeline/include/foot');
		
		}
	}

}
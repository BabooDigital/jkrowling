<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_profile extends MX_Controller {
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		$title['judul'] = "Profile Page - Baboo";

		$this->load->view('timeline/include/head', $title);
		$this->load->view('D_profile');
		$this->load->view('timeline/include/foot');
	}

}
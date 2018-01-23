<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_notification extends MX_Controller
{
	
	function __construct(){
		parent::__construct();	
		if ($this->session->userdata('isLogin') != 200) {
			redirect('login');
		}
	}
	public function index()
	{
		$data['title'] = "Notification Page - Baboo";

		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/js/menupage.js";
		if ($this->agent->is_mobile()){

			$this->load->view('include/head', $data);
			$this->load->view('R_notification', $data);
		
		}
	}
}
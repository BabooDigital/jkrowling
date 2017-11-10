<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends MX_Controller {
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('isLogin') == 200) {
			redirect('timeline');
		}
	}

	public function index()
	{
		$data['judul'] = "Baboo - Beyond Book & Creativity";
		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/js/jquery.bxslider.min.js";
		$data['js'][]   = "public/js/baboo.js";
		$data['js'][]   = "public/js/jquery.sticky-kit.min.js";
		$data['js'][]   = "public/js/custom/author_this_week.js";
		$data['js'][]   = "public/js/custom/popular_books.js";
		$data['js'][]   = "public/js/custom/choice_books.js";
		if ($this->agent->is_mobile('ipad'))
		{
			$this->load->view('include/head', $title);
		    $this->load->view('D_Timeline_out');
		}
		if ($this->agent->is_mobile())
		{
			$mobile['judul'] = "Baboo - Beyond Mobile Book & Creativity";
			$mobile['css'][]   = "public/css/jquery.bxslider.min.css";
			
			$mobile['js'][]   = "public/js/jquery.bxslider.min.js";
			$mobile['js'][]   = "public/js/slick.js";
			$mobile['js'][]   = "public/js/custom/slick_slider.js";

			// $this->load->view('include/head', $mobile);
		    $this->load->view('R_Timeline_out');
		}
		else
		{
			$this->load->view('include/head', $data);
		    $this->load->view('D_Timeline_out');
		}
	}
}
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
		$title['judul'] = "Baboo - Beyond Book & Creativity";
		$data['js'][]   = "public/js/custom/author_this_week.js";
		$data['js'][]   = "public/js/custom/popular_books.js";
		$data['js'][]   = "public/js/custom/choice_books.js";
		if ($this->agent->is_mobile('ipad'))
		{
			$this->load->view('include/head', $title);
		    $this->load->view('D_Timeline_out');
		    $this->load->view('include/foot');
		}
		if ($this->agent->is_mobile())
		{
			$this->load->view('include/head', $title);
		    $this->load->view('R_Timeline_out');
		}
		else
		{
			$this->load->view('include/head', $title);
		    $this->load->view('D_Timeline_out', $data);
		    $this->load->view('include/foot');
		}
	}
}
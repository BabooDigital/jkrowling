<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_book extends MX_Controller {
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		$title['judul'] = "Detail Book - Baboo";

		$this->load->view('timeline/include/head', $title);
		$this->load->view('D_book');
		$this->load->view('timeline/include/foot');
	}

	public function book_detail()
	{
		$this->load->view('D_book_det');
	}

}
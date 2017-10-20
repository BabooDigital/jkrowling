<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_timeline extends MX_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Timeline_in');
	}
	public function beranda()
	{
		$this->load->view('Timeline_out');
	}
}
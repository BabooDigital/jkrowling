<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_terms extends MX_Controller
{
	public function index()
	{
		$this->load->view('include/head');
		$this->load->view('tnc');
	}	
}
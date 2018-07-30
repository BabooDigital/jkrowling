<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_terms extends MX_Controller
{
	public function index()
	{
		$data['title'] = 'Terms And Service | Baboo Digital Indonesia';
		$data['page_desc'] = "Terms and Service - Baboo";
		$this->load->view('include/head', $data);
		$this->load->view('tnc');
	}	
}
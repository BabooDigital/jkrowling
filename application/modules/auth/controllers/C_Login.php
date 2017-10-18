<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends MX_Controller {

	public function index()
	{
		if ($this->agent->is_mobile('ipad'))
		{
		        $this->load->view('d_login');
		}
		if ($this->agent->is_mobile())
		{
		        $this->load->view('r_login');
		}
		else
		{
		        $this->load->view('d_login');
		}
	}

}

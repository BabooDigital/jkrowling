<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends MX_Controller {

	public function index()
	{
		if ($this->agent->is_mobile('ipad'))
		{
		        $this->load->view('D_login');
		}
		if ($this->agent->is_mobile())
		{
		        $this->load->view('R_login');
		}
		else
		{
		        $this->load->view('D_login');
		}
	}

}

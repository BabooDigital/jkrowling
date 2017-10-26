<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_timeline extends MX_Controller {
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('isLogin') != 400) {
			redirect('');
		}
	}


	public function timeline()
	{
		if ($this->agent->is_mobile('ipad'))
		{
		        $this->load->view('D_Timeline_in');
		}
		if ($this->agent->is_mobile())
		{
		        $this->load->view('R_Timeline_in');
		}
		else
		{
		        $this->load->view('D_Timeline_in');
		}
	}

	public function beranda()
	{
		if ($this->agent->is_mobile('ipad'))
		{
		        $this->load->view('D_Timeline_out');
		}
		if ($this->agent->is_mobile())
		{
		        $this->load->view('R_Timeline_out');
		}
		else
		{
		        $this->load->view('D_Timeline_out');
		}
	}
	
	public function signout() {
		$this->facebook->destroy_session();

        $this->session->unset_userdata('isLogin');
		$this->session->sess_destroy();
        redirect('');
    }
}
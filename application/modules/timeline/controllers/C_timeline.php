<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_timeline extends MX_Controller {
	function __construct(){
		parent::__construct();
		// if ($this->session->userdata('isLogin') != 200) {
		// 	redirect('home');
		// }
	}


	public function index()
	{
		$data['judul'] = "Baboo - Beyond Book & Creativity";
		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/js/custom/author_this_week.js";
		$data['js'][]   = "public/js/menupage.js";

		if ($this->agent->is_mobile('ipad'))
		{
			$this->load->view('include/head', $title);
		    $this->load->view('D_Timeline_in');
		    $this->load->view('include/foot');
		}
		if ($this->agent->is_mobile())
		{
			$this->load->view('include/head', $data);
		    $this->load->view('R_Timeline_in', $data);
		}
		else
		{
			$this->load->view('include/head', $title);
		    $this->load->view('D_Timeline_in',$data);
		    $this->load->view('include/foot');
		}
	}
	
	public function signout() {
		$this->facebook->destroy_session();
        $this->session->unset_userdata('isLogin');
		$this->session->sess_destroy();
    	    redirect('');
    }
    public function explore()
    {
    	$this->load->view('page/explore');
    }
    public function library()
    {
    	$this->load->view('page/library');
    }
    public function profile()
    {
    	$this->load->view('page/profile');
    }
}
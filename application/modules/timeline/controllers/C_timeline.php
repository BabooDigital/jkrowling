<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_timeline extends MX_Controller {

	var $API = "";

	function __construct(){
		parent::__construct();
		$this->API = "api.dev-baboo.co.id/v1/timeline/Home";
		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}


	public function index()
	{
		$auths = $this->session->userdata('authKey');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/index');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auths));
		$result = curl_exec($ch);

		$headers=array();

		$datas=explode("\n",$result);

		array_shift($datas);

		foreach($datas as $part){
			$middle=explode(":",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}

		$datas['home'] = json_decode($datas[14], true);
		$datas['baboo'] = json_decode($datas[5], true);
		$psn = $datas['home']['message'];
		$data = $datas['home']['data'];
		$auth = $datas['baboo']['BABOO-AUTH-KEY'];
		if (isset($datas['home']['code']) && $datas['home']['code'] == '200')
		{
			$status = $datas['home']['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $datas['home']['code'];
		}
		$data['home'] = json_decode($datas[14], true);
		$data['judul'] = "Baboo - Beyond Book & Creativity";
		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/js/jquery.sticky-kit.min.js";
		$data['js'][]   = "public/js/custom/D_timeline_in.js";

		if ($this->agent->is_mobile('ipad'))
		{
			$this->load->view('include/head', $data);
		    $this->load->view('D_Timeline_in');
		}
		if ($this->agent->is_mobile())
		{
			$data['js'][]   = "public/js/menupage.js";
			$this->load->view('include/head', $data);
		    $this->load->view('R_Timeline_in', $data);
		}
		else
		{
			$this->load->view('include/head', $data);
		    $this->load->view('D_Timeline_in',$data);
		}
	}

	public function getWritter()
	{
		$auths = $this->session->userdata('authKey');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/bestWriter');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auths));
		$result = curl_exec($ch);
		$headers=array();

		$datas=explode("\n",$result);

		array_shift($datas);

		foreach($datas as $part){
			$middle=explode(":",$part);

			if (error_reporting() == 0) {
				$headers[trim($middle[0])] = trim($middle[1]);
			}
		}
		$datas['home'] = json_decode($datas[14], true);
		$datas['baboo'] = json_decode($datas[5], true);
		$psn = $datas['home']['message'];
		$data = $datas['home']['data'];
		$auth = $datas['baboo']['BABOO-AUTH-KEY'];
		if (isset($datas['home']['code']) && $datas['home']['code'] == '200')
		{
			$status = $datas['home']['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $datas['home']['code'];
		}
		echo json_encode($datas[14], true);
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
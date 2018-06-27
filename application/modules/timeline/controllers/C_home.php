<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends MX_Controller {

	var $API = "";

	function __construct(){
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;
		if ($this->session->userdata('isLogin') == 200) {
			redirect('timeline');
		}
	}

	public function index()
	{
		error_reporting(0);

		if (!empty($this->input->get("page"))) {
			$id = '/'.$this->input->get("page");
		}else{
			$id = "";
		}
		
		$this->curl_multiple->add_call("timeline","get",$this->API.'timeline/Home/index'.$id);
		$this->curl_multiple->add_call("slider","get",$this->API.'timeline/Home/slideBook');
		$this->curl_multiple->add_call("writters", "get",$this->API.'timeline/Home/bestWriter');
		// $this->curl_multiple->add_call("event","get",$this->API.'event/Events/getEvent');
		$resval = $this->curl_multiple->execute();

		$data['home'] = json_decode($resval['timeline']['response'], TRUE);
		$data['slide'] = json_decode($resval['slider']['response'], TRUE);
		$data['writter'] = json_decode($resval['writters']['response'], TRUE);
		// $data['event'] = json_decode($resval['event']['response'], TRUE);

		$data['title'] = "Baboo - Make Money From Writing";
		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/plugins/infinite_scroll/jquery.jscroll.js";
		$data['js'][]   = "public/js/jquery.bxslider.min.js";
		$data['js'][]   = "public/js/baboo.js";
		$data['js'][]   = "public/js/jquery.sticky-kit.min.js";
		$data['js'][]   = "public/js/custom/D_timeline_out.js";
		if ($this->agent->is_mobile('ipad'))
		{
			$this->load->view('include/head', $data);
			$this->load->view('D_Timeline_out');
		}
		if ($this->agent->is_mobile())
		{
			$mobile['title'] = "Baboo - Beyond Mobile Book & Creativity";
			$mobile['css'][]   = "public/css/jquery.bxslider.min.css";
			
			$mobile['js'][]   = "public/js/jquery.bxslider.min.js";
			$mobile['js'][]   = "public/js/slick.js";
			$mobile['js'][]   = "public/js/custom/slick_slider.js";
			if (!empty($this->input->get("page"))) {
				$result = $this->load->view('data/R_Timeline_out', $data);
			}else{
				$this->load->view('R_Timeline_out', $data);
			}
		}
		else
		{
			if (!empty($this->input->get("page"))) {
				$result = $this->load->view('data/D_Timeline_out', $data);
			}else{
				$this->load->view('include/head', $data);
				$this->load->view('D_Timeline_out');
			}
		}
	}
	public function getBestBookEvent()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$datas = $this->curl_request->curl_get($this->API.'timeline/Home/bestBook', '', $auth);

		$datas['home'] = json_decode(end($data), true);
		$data_best = $datas['home']['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		$this->session->set_userdata('authKey', $auth);
		
		if ($datas['home']['code'] == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode($data_best, true);
		}
	}
}
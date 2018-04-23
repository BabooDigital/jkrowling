<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_notfound extends MX_Controller {

	public function index()
	{
		$data['title'] = 'Kamu Tersesat.. | 404 Page Not Found - Baboo.id';
		if ($this->agent->is_mobile()) {
			$this->load->view('r_404_page', $data);
		}else {
			$this->load->view('d_404_page', $data);
		}
	}

}

/* End of file C_notfound.php */
/* Location: ./application/modules/notfound/controllers/C_notfound.php */
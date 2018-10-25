<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_notfound extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $this->output->set_status_header('404');
		$data['title'] = 'Kamu Tersesat.. | 404 Page Not Found - Baboo.id';

        $data['css'][] = "public/css/baboo-404.css";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";

		if ($this->agent->is_mobile()) {
			$this->load->view('r_404_page', $data);
		}else {
		    $this->load->view('include/head', $data);
			$this->load->view('d_404_page');
		}
	}

}

/* End of file C_notfound.php */
/* Location: ./application/modules/notfound/controllers/C_notfound.php */

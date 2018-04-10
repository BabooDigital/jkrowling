<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pin_auth extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data['title'] = 'Keamanan Jual Beli - Buka Dompet | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('first_warning');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function second()
	{
		$data['title'] = 'Aktivasi Data Diri - Buka Dompet | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('second_activation');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function third()
	{
		$data['title'] = 'Konfirmasi Kode OTP - Buka Dompet | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('third_otp');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function fourth()
	{
		$data['title'] = 'Buat Kode PIN Keamanan - Buka Dompet | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('fourth_createpin');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function fifth()
	{
		$data['title'] = 'Konfirmasi Kode PIN Keamanan - Buka Dompet | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('fifth_confirmpin');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function sixth()
	{
		$data['title'] = 'Tentukan Pertanyaan Keamanan - Buka Dompet | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('sixth_questionselect');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function seventh()
	{
		$data['title'] = 'Berhasil Membuka Dompet - Buka Dompet | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('seventh_done');
		}else {
			redirect('timeline','refresh');
		}
	}

}

/* End of file C_pin_auth.php */
/* Location: ./application/modules/pin/controllers/C_pin_auth.php */
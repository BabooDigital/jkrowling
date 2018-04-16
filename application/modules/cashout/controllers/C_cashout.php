<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cashout extends MX_Controller {

	function __construct()
	{
		parent::__construct();
			//Do your magic here
	}

	public function index()
	{
		$data['title'] = 'Saldo Dompet Baboo Anda | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('view_balance');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function first_()
	{
		$data['title'] = 'Pilih Nomor Rekening Untuk Penarikan | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('first_cashout');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function second_()
	{
		$data['title'] = 'Masukan Informasi Rekening | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('second_cashout');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function third_()
	{
		$data['title'] = 'Masukan Jumlah Saldo yang Ingin di Tarik | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('third_cashout');
		}else {
			redirect('timeline','refresh');
		}
	}

	public function fourth_()
	{
		$data['title'] = 'Selamat! Anda berhasil melakukan penarikan. | Baboo.id';

		if ($this->agent->is_mobile()) {
			$this->load->view('inc/head', $data, FALSE);
			$this->load->view('fourth_cashout');
		}else {
			redirect('timeline','refresh');
		}
	}

}

/* End of file C_cashout.php */
/* Location: ./application/modules/cashout/controllers/C_cashout.php */
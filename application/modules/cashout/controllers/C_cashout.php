<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cashout extends MX_Controller {

	var $API = "";
	
	function __construct()
	{
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;
		
		$usrPin = $this->session->userdata('hasPIN');
		if ($this->session->userdata('isLogin') != 200 || $usrPin != 1) {
			$this->session->set_flashdata('fail_alert', '<script>
					swal("Gagal", "Maaf, Perlu verifikasi PIN / Daftar PIN", "warning");
				</script>');
			redirect('profile#PINauth', 'refresh');
		}
	}

	public function index()
	{
		if ($this->session->userdata('dompet') == 200) {
			error_reporting(0);
			$auth = $this->session->userdata('authKey');
			$datas = $this->curl_request->curl_get($this->API.'payment/Iris/historyPayout', '', $auth);

			if ($datas['code'] == 403){
				$this->session->sess_destroy();
				redirect('login','refresh');
			}else{
				$data['balance'] = $datas['data']['balance_info'];
				$data['pay_pending'] = $datas['data']['payout_pending'];
				$data['history'] = $datas['data']['transaction_history'];
				$data['title'] = 'Saldo Dompet Baboo Anda | Baboo.id';

				if ($this->agent->is_mobile()) {
					$this->load->view('inc/head', $data, FALSE);
					$this->load->view('view_balance');
				}else {
					redirect('timeline','refresh');
				}
			}
		}else{
			$this->session->set_flashdata('fail_alert', '<script>
					swal("Gagal", "Maaf, Perlu verifikasi PIN / Daftar PIN", "warning");
				</script>');
			redirect('profile#PINauth', 'refresh');
		}
	}

	public function viewStatusPending()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$datas = $this->curl_request->curl_get($this->API.'payment/Iris/pendingPayout', '', $auth);
		
		if (http_response_code() == 200) {
			if ($datas['code'] == 403){
				$this->session->sess_destroy();
				redirect('login','refresh');
			}else{
				if ($this->agent->is_mobile()) {
					$data['pend'] = $datas['data'];
					$data['title'] = 'Informasi Status Penarikan Saldo Dompet Baboo anda | Baboo.id';

					$this->load->view('inc/head', $data, FALSE);
					$this->load->view('view_status');
				}else {
					redirect('timeline','refresh');
				}
			}
		}else{
			echo "terjadi kesalahan";
		}
	}

	public function first_()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$datas = $this->curl_request->curl_get($this->API.'payment/Iris/listAccount', '', $auth);

		if ($datas['code'] == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$data['bank'] = $datas['data'];
			$data['title'] = 'Pilih Nomor Rekening Untuk Penarikan | Baboo.id';
			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('first_cashout');
			}else {
				redirect('timeline','refresh');
			}
		}
	}

	public function second_()
	{
		// if ($this->session->userdata('2PAY_step') == 200) {
			error_reporting(0);
			$auth = $this->session->userdata('authKey');
			$datas = $this->curl_request->curl_get($this->API.'payment/Iris/listBank', '', $auth);

			if ($datas['code'] == 403){
				$this->session->sess_destroy();
				redirect('login','refresh');
			}else{
				$data['bank'] = $datas['data'];
				$data['title'] = 'Masukan Informasi Rekening | Baboo.id';
				if ($this->agent->is_mobile()) {
					$this->load->view('inc/head', $data, FALSE);
					$this->load->view('second_cashout');
				}else {
					redirect('timeline','refresh');
				}
			}
		// }else{
		// 	$this->session->set_flashdata('fail_alert', '<script>
		// 		$(window).on("load", function(){
		// 			swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
		// 		});
		// 		</script>');
		// 	redirect('dompet','refresh');
		// }
	}

	public function third_()
	{
		if ($this->session->userdata('2PAY_step') == 200) {
			error_reporting(0);
			$auth = $this->session->userdata('authKey');
			$datas = $this->curl_request->curl_get($this->API.'payment/Iris/listAccount', '', $auth);

			if ($datas['code'] == 403){
				$this->session->sess_destroy();
				redirect('login','refresh');
			}else{
				$data['bank'] = $datas['data'];
				$data['title'] = 'Masukan Jumlah Saldo yang Ingin di Tarik | Baboo.id';
				if ($this->agent->is_mobile()) {
					$this->load->view('inc/head', $data, FALSE);
					$this->load->view('third_cashout');
				}else {
					redirect('timeline','refresh');
				}
			}
		}else{
			$this->session->set_flashdata('fail_alert', '<script>
				$(window).on("load", function(){
					swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
				});
				</script>');
			redirect('dompet','refresh');
		}
	}

	public function fourth_()
	{
		if ($this->session->userdata('3PAY_step') == 200) {
			$data['title'] = 'Selamat! Anda berhasil melakukan penarikan. | Baboo.id';

			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('fourth_cashout');
			}else {
				redirect('timeline','refresh');
			}
		}else{
			$this->session->set_flashdata('fail_alert', '<script>
				$(window).on("load", function(){
					swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
				});
				</script>');
			redirect('dompet','refresh');
		}
	}



	// ACTION
	public function checkAccountBank()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		// $idacc    = $this->input->post('id_acc');
		$acc = $this->input->post('account_number');

		$send = array('account_number' => $acc);
		$datas = $this->curl_request->curl_post($this->API.'payment/Iris/checkAccount', $send, $auth);

		if (http_response_code() == 200) {
			echo json_encode(array(
				'code' => $datas['code'],
				'data' => $datas['data']
			));
			if ($datas['code'] == 200) {
				$this->session->set_userdata('2PAY_step', 200);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('cashout/first','refresh');
			}
			
		}else{
			echo "terjadi kesalahan";
		}
	}

	public function createAccBank()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$anumb = $this->input->post('numb');
		$aname = $this->input->post('name');
		$bcode = $this->input->post('code');

		$send = array('account_number' => $anumb,'account_name' => $aname,'bank_code' => $bcode);
		$datas = $this->curl_request->curl_post($this->API.'payment/Iris/createBeneficiaries', $send, $auth);

		if (http_response_code() == 200) {
			echo json_encode(array(
				'code' => $datas['code'],
				'data' => $datas['data'],
				'msg' => $datas['message']
			));
			if ($datas['code'] == 200) {
				$this->session->set_userdata('2PAY_step', 200);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('cashout/first','refresh');
			}
		}else{
			echo "terjadi kesalahan";
		}
	}

	public function createCashout()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$aname = $this->input->post('accnum');
		$amount = $this->input->post('amount');

		$send = array('account_number' => $aname,'amount' => $amount);
		$datas = $this->curl_request->curl_post($this->API.'payment/Iris/createPayout', $send, $auth);

		if (http_response_code() == 200) {
			echo json_encode(array(
				'code' => $datas['code'],
				'data' => $datas['data'],
				'msg' => $datas['message']
			));
			if ($datas['code'] == 200) {
				$this->session->unset_userdata('2PAY_step');
				$this->session->set_userdata('3PAY_step', 200);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('cashout/first','refresh');
			}
		}else{
			echo "terjadi kesalahan";
		}
	}


	public function confirmPinExist()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$pin    = $this->input->post('confirmpin');

		$send = array('pin' => $pin);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/confirmPIN', $send, $auth);

		if ($datas['code'] == 200) {
			$this->session->set_userdata('dompet', $datas['code']);
		}else {
			$this->session->set_flashdata('fail_alert', '<script>
				$(window).on("load", function(){
					swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
				});
				</script>');
			redirect('pin-dompet/second','refresh');
		}
		echo json_encode(array(
			'code' => $datas['code']
		));
	}

}

/* End of file C_cashout.php */
/* Location: ./application/modules/cashout/controllers/C_cashout.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_forgot_pin extends MX_Controller {

	var $API = "";
	
	function __construct()
	{
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;
		
		$usrPin = $this->session->userdata('hasPIN');
		if ($this->session->userdata('isLogin') != 200 || $usrPin != 1) {
			$this->session->set_flashdata('fail_alert', '<script>
					swal("Gagal", "Maaf, sepertinya anda sudah membuat PIN", "warning");
				</script>');
			redirect('timeline', 'refresh');
		}
	}

	public function index()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$datas = $this->curl_request->curl_get($this->API.'auth/OAuth/listQuestionForgot', '', $auth);

		if ($datas['code'] == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$data['listQ'] = $datas['data'];
			$data['title'] = 'Lupa PIN Dompet - PIN Dompet | Baboo.id';

			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('forgotpin/view_first_question');
			}else {
				redirect('timeline','refresh');
			}
		}
	}

	public function secondOTP()
	{
		if ($this->session->userdata('2Forgot_pin') == 200) {
			$data['title'] = 'Konfirmasi OTP - PIN Dompet | Baboo.id';
			$data['phone'] = $this->session->userdata('hasPhone');
			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('forgotpin/view_second_otp');
			}else {
				redirect('timeline','refresh');
			}
		}else{
			redirect('pin-dompet/forgot-one','refresh');
		}
	}

	public function threePIN()
	{
		if ($this->session->userdata('3Forgot_pin') == 200) {
			$data['title'] = 'Buat PIN Baru - PIN Dompet | Baboo.id';
			$data['phone'] = $this->session->userdata('hasPhone');
			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('forgotpin/view_three_pin');
			}else {
				redirect('timeline','refresh');
			}
		}else{
			redirect('pin-dompet/forgot-one','refresh');
		}
	}

	public function fourConfirmPIN()
	{
		if ($this->session->userdata('4Forgot_pin') == 200) {
			$data['title'] = 'Konfirmasi Ulang PIN Baru - PIN Dompet | Baboo.id';
			$data['phone'] = $this->session->userdata('hasPhone');
			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('forgotpin/view_four_confirmpin');
			}else {
				redirect('timeline','refresh');
			}
		}else{
			redirect('pin-dompet/forgot-one','refresh');
		}
	}




	// ACTION
	public function answerQuestion()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$que    = $this->input->post('questionQ', TRUE);
		$ans    = $this->input->post('answerQ', TRUE);

		$send = array('question' => $que, 'answer' => $ans);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/checkQuestion', $send, $auth);

		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$this->session->set_userdata('authKey', $auth);
			echo json_encode(array(
				'code' => $datas['code'],
				'data' => $datas['data']
			));
			if ($datas['code'] == 200) {
				$this->session->set_userdata('2Forgot_pin', $datas['code']);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/forgot-one','refresh');
			}
		}
	}

	public function confirmOTPforgot()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$otp    = $this->input->post('otp', TRUE);

		$send = array('otp' => $otp);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/confirmOTP', $send, $auth);

		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$this->session->set_userdata('authKey', $auth);
			echo json_encode(array(
				'code' => $datas['code'],
				'data' => $datas['data'],
			));
			if ($datas['code'] == 200) {
				$this->session->unset_userdata('2Forgot_pin');
				$this->session->set_userdata('3Forgot_pin', $datas['code']);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/forgot-one','refresh');
			}
		}
	}
	public function resendOTPforgot()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');

		$datas = $this->curl_request->curl_get($this->API.'auth/OAuth/resendOTP', '', $auth);
		
		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$this->session->set_userdata('authKey', $auth);
			echo json_encode(array(
				'code' => $datas['code'],
				'data' => $datas['data'],
			));
			if ($datas['code'] != 200) {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/forgot-one','refresh');
			}
		}
	}
	public function createNewPinForgot()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$pin    = $this->input->post('newpin', TRUE);

		$send = array('pin' => $pin);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/updatePIN', $send, $auth);

		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$this->session->set_userdata('authKey', $auth);
			echo json_encode(array(
				'code' => $datas['code']
			));
			if ($datas['code'] == 200) {
				$this->session->unset_userdata('3Forgot_pin');
				$this->session->set_userdata('4Forgot_pin', $datas['code']);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/forgot-one','refresh');
			}
		}
	}
	public function confirmNewPinForgot()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$pin    = $this->input->post('confirmpin', TRUE);

		$send = array('pin' => $pin);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/confirmPIN', $send, $auth);

		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$this->session->set_userdata('authKey', $auth);
			echo json_encode(array(
				'code' => $datas['code']
			));
			if ($datas['code'] == 200) {
				$this->session->unset_userdata('4Forgot_pin');
				$this->session->set_userdata('dompet', $datas['code']);
				$this->session->set_flashdata('success_change_pin', "<script>
					var x = document.getElementById('snackbarpin');
					x.className = 'show';
					setTimeout(function(){ x.className = x.className.replace('show', ''); }, 3000);
					</script>");
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/forgot-one','refresh');
			}
		}
	}


}

/* End of file C_forgot_pin.php */
/* Location: ./application/modules/pin/controllers/C_forgot_pin.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pin_auth extends MX_Controller {

	var $API = "";
	
	function __construct()
	{
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;
		
		$usrPin = $this->session->userdata('hasPIN');
		if ($this->session->userdata('isLogin') != 200 || $usrPin == 1) {
			$this->session->set_flashdata('fail_alert', '<script>
					swal("Gagal", "Maaf, sepertinya anda sudah membuat PIN", "warning");
				</script>');
			redirect('timeline', 'refresh');
		}
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
		if ($this->session->userdata('2Pin_step') != 200) {
			$this->session->set_flashdata('fail_alert', '<script>
				$(window).on("load", function(){
					swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
				});
				</script>');
			redirect('pin-dompet/second','refresh');
		}else{
			$data['title'] = 'Konfirmasi Kode OTP - Buka Dompet | Baboo.id';

			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('third_otp');
			}else {
				redirect('timeline','refresh');
			}
		}
	}

	public function fourth()
	{

		if ($this->session->userdata('3Pin_step') != 200){
			$this->session->set_flashdata('fail_alert', '<script>
				$(window).on("load", function(){
					swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
				});
				</script>');
			redirect('pin-dompet/second','refresh');
		}else{
			$data['title'] = 'Buat Kode PIN Keamanan - Buka Dompet | Baboo.id';

			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('fourth_createpin');
			}else {
				redirect('timeline','refresh');
			}
		}
	}

	public function fifth()
	{

		if ($this->session->userdata('4Pin_step') != 200){
			$this->session->set_flashdata('fail_alert', '<script>
				$(window).on("load", function(){
					swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
				});
				</script>');
			redirect('pin-dompet/second','refresh');
		}else{
			$data['title'] = 'Konfirmasi Kode PIN Keamanan - Buka Dompet | Baboo.id';

			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('fifth_confirmpin');
			}else {
				redirect('timeline','refresh');
			}
		}
	}

	public function sixth()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$datas = $this->curl_request->curl_get($this->API.'auth/OAuth/questionSecure', '', $auth);

		if ($this->session->userdata('5Pin_step') != 200){
			$this->session->set_flashdata('fail_alert', '<script>
				$(window).on("load", function(){
					swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
				});
				</script>');
			redirect('pin-dompet/second','refresh');
		}else{
			if (http_response_code() == 403){
				$this->session->unset_userdata('userData');
				$this->session->unset_userdata('authKey');
				$this->session->sess_destroy();
				redirect('login','refresh');
			}else{
				$data['listQ'] = $datas['data'];
				$data['title'] = 'Tentukan Pertanyaan Keamanan - Buka Dompet | Baboo.id';

				if ($this->agent->is_mobile()) {
					$this->load->view('inc/head', $data, FALSE);
					$this->load->view('sixth_questionselect');
				}else {
					redirect('timeline','refresh');
				}
			}
		}
	}

	public function seventh()
	{
		if ($this->session->userdata('6Pin_step') != 200 || $this->session->set_userdata('hasPIN', 1)){
			$this->session->set_flashdata('fail_alert', '<script>
				$(window).on("load", function(){
					swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
				});
				</script>');
			redirect('pin-dompet/second','refresh');
		}else{
			$data['title'] = 'Berhasil Membuka Dompet - Buka Dompet | Baboo.id';

			if ($this->agent->is_mobile()) {
				$this->load->view('inc/head', $data, FALSE);
				$this->load->view('seventh_done');
			}else {
				redirect('timeline','refresh');
			}
		}
	}

	// AUTH PROCESS
	public function confirmAccountForPin()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$name    = $this->input->post('fullname');
		$phone    = $this->input->post('phone');
		$ktpno    = $this->input->post('ktp_no');
		$ktpimg    = $_FILES["ktp_image"]["tmp_name"];

		if (function_exists('curl_file_create')) {
			$cFile = curl_file_create($ktpimg, $_FILES["ktp_image"]["type"],$_FILES["ktp_image"]["name"]);
		} else { 
			$cFile = '@' . realpath($ktpimg);
		}

		$send = array('fullname' => $name,'phone' => $phone,'ktp_no' => $ktpno,'ktp_image' => $cFile);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/confirmAccount', $send, $auth);

		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array(
				'code' => $datas['code'],
				'data' => $datas['data'],
			));
			if ($datas['code'] == 200) {
				$this->session->set_userdata('2Pin_step', $datas['code']);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/second','refresh');
			}
		}
	}
	public function confirmOTP()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$otp    = $this->input->post('otp');

		$send = array('otp' => $otp);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/confirmOTP', $send, $auth);

		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array(
				'code' => $datas['code'],
				'data' => $datas['data'],
			));
			if ($datas['code'] == 200) {
				$this->session->unset_userdata('2Pin_step');
				$this->session->set_userdata('3Pin_step', $datas['code']);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/second','refresh');
			}
		}
	}
	public function resendOTP()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');

		$datas = $this->curl_request->curl_get($this->API.'auth/OAuth/resendOTP', '', $auth);
		
		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
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
				redirect('pin-dompet/second','refresh');
			}
		}
	}
	public function createNewPin()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$pin    = $this->input->post('newpin');

		$send = array('pin' => $pin);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/insertPIN', $send, $auth);

		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array(
				'code' => $datas['code']
			));
			if ($datas['code'] == 200) {
				$this->session->unset_userdata('3Pin_step');
				$this->session->set_userdata('4Pin_step', $datas['code']);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/second','refresh');
			}
		}
	}
	public function confirmNewPin()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$pin    = $this->input->post('confirmpin');

		$send = array('pin' => $pin);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/confirmPIN', $send, $auth);

		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array(
				'code' => $datas['code']
			));
			if ($datas['code'] == 200) {
				$this->session->unset_userdata('4Pin_step');
				$this->session->set_userdata('5Pin_step', $datas['code']);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/second','refresh');
			}
		}
	}
	public function setQuestionSecure()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$q1    = $this->input->post('question1');
		$a1    = $this->input->post('answer1');
		$q2    = $this->input->post('question2');
		$a2    = $this->input->post('answer2');

		$send = array('question1' => $q1,'answer1' => $a1,'question2' => $q2,'answer2' => $a2);
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/insertQuestion', $send, $auth);

		if (http_response_code() == 403){
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array(
				'code' => $datas['code']
			));
			if ($datas['code'] == 200) {
				$this->session->unset_userdata('5Pin_step');
				$this->session->set_userdata('hasPIN', 1);
				$this->session->set_userdata('6Pin_step', $datas['code']);
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
					});
					</script>');
				redirect('pin-dompet/second','refresh');
			}
		}
	}

}

/* End of file C_pin_auth.php */
/* Location: ./application/modules/pin/controllers/C_pin_auth.php */
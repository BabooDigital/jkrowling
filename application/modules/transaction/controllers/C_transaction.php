<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class C_transaction extends MX_Controller
{
	
	function __construct()
	{
		$api_url = checkBase();
		$this->API = $api_url;
	}
	public function count_transaction()
	{
		$auth = $this->session->userdata('authKey');
		$data = $this->curl_request->curl_post($this->API.'payment/Payment/reminderPay', '', $auth);

		$datas['transaction'] = $data;
		if ($datas['transaction']['code'] == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode($datas['transaction']['data'], true);
		}
	}
	public function detail_transaction()
	{
		$auth = $this->session->userdata('authKey');
		$transaction_id = $this->input->post('transaction_id');
		$sendData = array('book_id' => $transaction_id);
		$data = $this->curl_request->curl_post($this->API.'payment/Payment/reminderPay', $sendData, $auth);

		echo json_encode($data['data']);		
	}
}

/* End of file C_Transaction.php */
/* Location: ./application/modules/transaction/controllers/C_Transaction.php */
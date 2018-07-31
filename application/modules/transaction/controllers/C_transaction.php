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
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$data = $this->curl_request->curl_get_auth($this->API.'payment/Payment/reminderPay', '', $auth);

		$datas['transaction'] = $data['data'];
		
		$auth = $data['bbo_auth'];
    	$this->session->set_userdata('authKey', $auth);
		if ($datas['transaction']['code'] == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(count($datas['transaction']['data']), true);
		}
	}
	public function detail_transaction()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$transaction_id = $this->input->post('transaction_id', TRUE);
		$sendData = array('book_id' => $transaction_id);
		$data = $this->curl_request->curl_get_auth($this->API.'payment/Payment/reminderPay', $sendData, $auth);
		$auth = $data['bbo_auth'];
		$this->session->set_userdata('authKey', $auth);
		echo json_encode($data['data']['data']);		
	}
	public function cancel_transaction()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$order_id = $this->input->post('or_id', TRUE);
		$sendData = array('order_id' => $order_id);
		$data = $this->curl_request->curl_post_auth($this->API.'payment/Midtrans_Payment/cancelTrans', $sendData, $auth);
		$auth = $data['bbo_auth'];
		$this->session->set_userdata('authKey', $auth);
		echo json_encode($data['data']);
	}
}

/* End of file C_Transaction.php */
/* Location: ./application/modules/transaction/controllers/C_Transaction.php */
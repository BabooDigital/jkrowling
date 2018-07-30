<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_message extends MX_Controller
{
	
	function __construct(){
		parent::__construct();
        $api_url = checkBase();
        $this->API = $api_url;

		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		$data['title'] = "Pesan - Baboo";

		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/js/menupage.js";
        $this->listMessage();
	}
	public function listMessage(){
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $user = $this->session->userdata('userData');

        $data_message = array(
            'user_id' => $user['user_id']
        );
        $datas = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/listMessage', $data_message, $auth);
        
        $data['list_message'] = $datas['data'];
        $auth = $datas['bbo_auth'];

        if(!empty($auth)) $this->session->set_userdata('authKey', $auth);

        $resval = $datas['data'];

        if ($resval['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {

            $datas['title'] = "Message - Baboo";
            $lists = $resval['data'];
            $datas["resval"] = $resval;
            $datas['listMessage'] = $data["list_message"]["data"];

            // $datas['css'][] = "public/css/bootstrap.min.css";
            $datas['css'][] = "public/css/custom-margin-padding.css";
            $datas['css'][] = "public/css/font-awesome.min.css";
            $datas['css'][] = "public/plugins/holdOn/css/HoldOn.css";

            $datas['js'][] = "public/js/jquery.min.js";
            $datas['js'][] = "public/js/umd/popper.min.js";
            $datas['js'][] = "public/js/bootstrap.min.js";
            $datas['js'][] = "public/plugins/holdOn/js/HoldOn.js";
            $datas['js'][] = "public/js/custom/messages.js";

            if ($this->agent->mobile()) {
                $this->load->view('include/head', $datas);
                $this->load->view('R_message', $data);
            } else {
                $datas['js'][] = "public/js/custom/notification.js";
                $datas['js'][] = "public/js/custom/transaction.js";
                $datas['js'][]   = "public/js/custom/search.js";
                $this->load->view('include/head', $datas);
                $this->load->view('D_message', $data);
            }
        }
    }

    public function send_message()
    {
		$data['js'][]   = "public/js/menupage.js";
        error_reporting(0);

        $auth = $this->session->userdata('authKey');
        $user_to = $this->input->post('user_to', TRUE);
        $message = $this->input->post('message', TRUE);

        $sendData = array(
                'user_to' => $user_to,
                'message' => $message
        );

        $datas = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/message', $sendData, $auth);
        
        $resval = $datas['data'];

        $psn = $resval['message'];
        $userdetail = $resval['data'];
        $auth = $datas['bbo_auth'];

        $this->session->set_userdata('authKey', $auth);
        $status = $resval['code'];
        if ($status == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode($userdetail);
        }
    }

    public function detailMessage() {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        if ($this->input->post()) {
        	$params = $this->input->post('usr_msg', TRUE);
        }else{
			$params = $this->uri->segment(2);
        }
        $user_with = ($params && !empty($params))? $params : 0;
        $user = $this->session->userdata('userData');
        $data_message = array(
            'user_id' => $user['user_id'],
            'user_with' => $user_with
        );

        $datas = $this->curl_request->curl_post($this->API.'timeline/Timelines/detailMessage', $data_message, $auth);
        
        $resval = $datas;


        $data_message = array(
            'user_id' => $user['user_id']
        );
        $datass = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/listMessage', $data_message, $auth);
        
        $data['list_message'] = $datass;
        $auth = $datass['bbo_auth'];
        if(!empty($auth)) $this->session->set_userdata('authKey', $auth);

        if ($resval['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {

           $datas['title'] = "Detail Pesan - Baboo";
            $lists = $resval['data'];
            $datas["resval"] = $resval;
            $datas['userWith'] = $lists["user_with"];
            $datas['listMessage'] = $lists["messages"];
            $datas['listMessageDetail'] = $data["list_message"]["data"]["data"];
            $datas["user_iw"] = $user_with;
            // $datas['css'][] = "public/css/bootstrap.min.css";
            $datas['css'][] = "public/css/custom-margin-padding.css";
            $datas['css'][] = "public/css/font-awesome.min.css";
            // $datas['css'][] = "public/css/baboo.css";
            $datas['css'][] = "public/plugins/holdOn/css/HoldOn.css";

            $datas['js'][] = "public/js/jquery.min.js";
            $datas['js'][] = "public/js/umd/popper.min.js";
            $datas['js'][] = "public/js/bootstrap.min.js";
            $datas['js'][] = "public/plugins/holdOn/js/HoldOn.js";
            $datas['js'][] = "public/js/custom/messages.js";

            if ($this->agent->mobile()) {
                $this->load->view('include/head', $datas);
                $this->load->view('data/R_Detail', $data);
            } else {
                $datas['js'][]   = "public/js/custom/notification.js";
                $this->load->view('include/head', $datas);
	            $this->load->view('D_message', $data);
            }
//            print_r($datas['listMessageDetail']);
        }
    }

    public function detailMessageDesktop() {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        if ($this->input->post()) {
            $params = $this->input->post('usr_msg', TRUE);
        }else{
            $params = $this->uri->segment(2);
        }
        $user_with = ($params && !empty($params))? $params : 0;
        $user = $this->session->userdata('userData');
        $data_message = array(
            'user_id' => $user['user_id'],
            'user_with' => $user_with
        );

        $datas = $this->curl_request->curl_post($this->API.'timeline/Timelines/detailMessage', $data_message, $auth);
        
        $resval = $datas;


        $data_message = array(
            'user_id' => $user['user_id']
        );
        $datass = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/listMessage', $data_message, $auth);
        
        $data['list_message'] = $datass;
        $auth = $datass['bbo_auth'];
        if(!empty($auth)) $this->session->set_userdata('authKey', $auth);

        if ($resval['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {

           $datas['title'] = "Detail Pesan - Baboo";
           $lists = $resval['data'];
           $datas["resval"] = $resval;
           $datas['userWith'] = $lists["user_with"];
           $datas['listMessage'] = $lists["messages"];
           $datas['listMessageDetail'] = $data["list_message"]["data"];
           $datas["user_iw"] = $user_with;
           $datas['css'][] = "public/css/custom-margin-padding.css";

           $datas['js'][] = "public/js/jquery.min.js";
           $datas['js'][] = "public/js/umd/popper.min.js";
           $datas['js'][] = "public/js/bootstrap.min.js";
           $datas['js'][] = "public/js/custom/messages.js";

           $this->load->view('include/head', $datas);
           $this->load->view('data/R_Detail');
       }
   }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_message extends MX_Controller
{
	
	function __construct(){
		parent::__construct();
        $api_url = checkBase();
        $this->API = $api_url."timeline/Timelines";

		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		$data['title'] = "Pesan - Baboo";

		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/js/menupage.js";
//		if ($this->agent->is_mobile()){
//
//			$this->load->view('include/head', $data);
//			$this->load->view('R_message', $data);
//
//		}
        $this->listMessage();
	}
	public function listMessage(){
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $user = $this->session->userdata('userData');

        $data_message = array(
            'user_id' => $user['user_id']
        );
        // print_r($data_book);
        // print_r($data_book);

        // START GET CHAPTER
        $url = $this->API . '/listMessage/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_message);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : ' . $auth));
        $content = curl_exec($ch);
        $headers = array();

        $data = explode("\n", $content);
        $headers['status'] = $data[0];

        array_shift($data);

        foreach ($data as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }
        $data['list_message'] = json_decode(end($data), true);
        $auth = $headers['BABOO-AUTH-KEY'];

        if(!empty($auth)) $this->session->set_userdata('authKey', $auth);

        $resval = json_decode(end($data), TRUE);

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

            $datas['css'][] = "public/css/bootstrap.min.css";
            $datas['css'][] = "public/css/custom-margin-padding.css";
            $datas['css'][] = "public/css/font-awesome.min.css";
            $datas['css'][] = "public/css/baboo.css";
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
                    $this->load->view('D_message', $datas);
            }
        }
    }
    public function detailMessage(){
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $params = $this->uri->segment(2);
        $user_with = ($params && !empty($params))? $params : 0;
        $user = $this->session->userdata('userData');
        $data_message = array(
            'user_id' => $user['user_id'],
            'user_with' => $user_with
        );
        // print_r($data_book);
        // print_r($data_book);

        // START GET CHAPTER
        $url = $this->API . '/detailMessage/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_message);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : ' . $auth));
        $content = curl_exec($ch);
        $headers = array();

        $data = explode("\n", $content);
        $headers['status'] = $data[0];

        array_shift($data);

        foreach ($data as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }
        $resval = json_decode(end($data), TRUE);
        $auth = $headers['BABOO-AUTH-KEY'];

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
            $datas["user_iw"] = $user_with;
            $datas['css'][] = "public/css/bootstrap.min.css";
            $datas['css'][] = "public/css/custom-margin-padding.css";
            $datas['css'][] = "public/css/font-awesome.min.css";
            $datas['css'][] = "public/css/baboo.css";
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
                    $this->load->view('D_message', $datas);
            }
        }
    }
}
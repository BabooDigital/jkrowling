<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_writer extends MX_Controller {
    var $API = "";
    function __construct(){
        parent::__construct();
        $api_url = checkBase();
        $this->API = $api_url;
    }

    public function index()
    {
        error_reporting(0);

        if (!empty($this->input->get("page"))) {
            $idpage = $this->input->get("page");
        }else{
            $idpage = "";
        }
        $dataArr = array(
            'count' => $idpage
        );

        $user_data = $this->curl_request->curl_post($this->API.'timeline/Home/allUsersWriter', $dataArr, '');

        $data['userlist'] = $user_data['data'];

        $data['title'] = 'Kumpulan para penulis | Baboo';
        $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";
        $data['css'][] = "public/css/sweetalert2.min.css";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/js/sweetalert2.all.min.js";

        if ($this->session->userdata('isLogin') == '200'){
            $data['js'][] = "public/js/custom/notification.js";
            $data['js'][] = "public/js/custom/transaction.js";
            $data['js'][] = "public/js/custom/search.js";
            $data['js'][] = "public/js/custom/follow.js";
        }

//        if ($this->agent->is_mobile()) {
//
//        }else{
            if (!empty($this->input->get("page"))) {
                $this->load->view('data/D_writer_list', $data);
            }else{
                $this->load->view('include/head', $data);
                $this->load->view('D_writer_list');
            }
//        }
    }
}

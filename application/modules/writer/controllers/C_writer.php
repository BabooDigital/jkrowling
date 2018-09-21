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
        $perpage = 12;

        $user_data = $this->curl_request->curl_get($this->API.'timeline/Home/bestWriter', '', '');
//        print_r($user_data);

        $data['title'] = 'Kumpulan para penulis | Baboo';
        $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";
        $data['css'][] = "public/css/sweetalert2.min.css";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/js/sweetalert2.all.min.js";
        $data['js'][] = "public/js/custom/notification.js";
        $data['js'][] = "public/js/custom/transaction.js";
        $data['js'][] = "public/js/custom/search.js";

        $this->load->view('include/head', $data);
        $this->load->view('D_writer_list');
    }
}

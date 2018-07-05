<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_search extends MX_Controller
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
        $data['title'] = "Pencarian - Baboo";

        $data['js'][]   = "public/js/jquery.min.js";

        $datas['title'] = "Pencarian - Baboo";
        $datas['css'][] = "public/css/bootstrap.min.css";
        $datas['css'][] = "public/css/custom-margin-padding.css";
        $datas['css'][] = "public/css/font-awesome.min.css";
        $datas['css'][] = "public/css/baboo.css";
        $datas['css'][] = "public/plugins/holdOn/css/HoldOn.css";

        $datas['js'][] = "public/js/jquery.min.js";
        $datas['js'][] = "public/js/umd/popper.min.js";
        $datas['js'][] = "public/js/bootstrap.min.js";
        $datas['js'][] = "public/plugins/holdOn/js/HoldOn.js";
        $datas['js'][] = "public/js/custom/R_search.js";
        $datas['js'][] = "public/js/custom/follow.js";
        $datas['js'][]   = "public/js/menupage.js";

        if ($this->agent->mobile()) {
            $this->load->view('include/head', $datas);
            $this->load->view('R_search', $datas);
        } else {
            error_reporting(0);
            $auth = $this->session->userdata('authKey');

            $search = $this->uri->segment(2);
            $ids = str_replace('+', ' ', $search);


            $sendData = array(
                'search' => $ids
            );

            $datas = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/search', $sendData, $auth);
            
            $resval = $datas['data'];

            $psn = $resval['message'];
            $usersearch = $resval['data'];
            $auth = $datas['bbo_auth'];

            $this->session->set_userdata('authKey', $auth);
            $status = $resval['code'];
            if ($status == 403) {
                $this->session->unset_userdata('userData');
                $this->session->unset_userdata('authKey');
                $this->session->sess_destroy();
                redirect('login', 'refresh');
            } else {
                if ($this->agent->mobile()) {
                    echo json_encode($usersearch);
                }else{
                    $datas['data_search'] = $usersearch;
                    $this->load->view('include/head', $datas);
                    $this->load->view('D_search', $datas);
                }
            }
        }
    }

    public function search()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $search = $this->input->post('search');

        $sendData = array(
            'search' => $search
        );

        $datas = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/search', $sendData, $auth);
        
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

    public function searchUser()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $search = $this->input->post('search');

        $sendData = array(
            'search' => $search
        );

        $datas = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/searchUsers', $sendData, $auth);
        
        $resval = $datas['data'];

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
}
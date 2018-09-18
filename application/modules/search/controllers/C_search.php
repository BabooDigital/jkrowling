<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_search extends MX_Controller
{

    function __construct(){
        parent::__construct();
        $api_url = checkBase();
        $this->API = $api_url;
        $this->title = "Pencarian - Baboo";
        $this->p_desc = "Cari buku dan teman mu disini. - Baboo";

        if ($this->session->userdata('isLogin') != 200) {
            redirect('home');
        }
    }

    public function index()
    {
        $datas['css'][] = "public/plugins/holdOn/css/HoldOn.css";

        $datas['js'][] = "public/js/jquery.min.js";
        $datas['js'][] = "public/js/umd/popper.min.js";
        $datas['js'][] = "public/js/bootstrap.min.js";
        $datas['js'][] = "public/plugins/holdOn/js/HoldOn.js";
        $datas['js'][] = "public/js/custom/R_search.js";
        $datas['js'][] = "public/js/custom/follow.js";
        $datas['js'][]   = "public/js/menupage.js";

        if ($this->agent->mobile()) {
            $datas['title'] = $this->title;
            $datas['page_desc'] = $this->p_desc;

            $this->load->view('include/head', $datas);
            $this->load->view('R_search');
        } else {
            error_reporting(0);
            $auth = $this->session->userdata('authKey');

            $search = $this->uri->segment(2);
            $ids = str_replace('+', ' ', $search);
            $idss = str_replace('%20', ' ', $ids);


            $sendData = array(
                'search' => $idss
            );

            $datas = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/search', $sendData, $auth);
            $data_user = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/searchUsers', $sendData, $auth);
            $data_book = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/searchBooks', $sendData, $auth);

            $resval = $datas['data'];

            $data_page = array(
                'users' => $data_user['data'],
                'books' => $data_book['data']
            );

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
                    $datas['title'] = $this->title;
                    $datas['page_desc'] = $this->p_desc;
                    $datas['js'][] = "public/js/jquery.min.js";
                    $datas['js'][] = "public/js/umd/popper.min.js";
                    $datas['js'][] = "public/js/bootstrap.min.js";
                    $datas['js'][] = "public/js/custom/search.js";
                    $datas['js'][] = "public/js/custom/notification.js";
                    $datas['js'][] = "public/js/custom/follow.js";

                    $datas['data_search'] = $data_page;
                    $this->load->view('include/head', $datas);
                    $this->load->view('D_search');
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

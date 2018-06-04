<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_search extends MX_Controller
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
        $datas['js'][] = "public/js/custom/search.js";
        $datas['js'][] = "public/js/custom/follow.js";
        $datas['js'][]   = "public/js/menupage.js";

        if ($this->agent->mobile()) {
            $this->load->view('include/head', $datas);
            $this->load->view('R_search', $datas);
        } else {
            error_reporting(0);
            $url = $this->API . '/search';
            $auth = $this->session->userdata('authKey');
            $user = $this->session->userdata('userData');

            $search = $this->uri->segment(2);
            $ids = str_replace('+', ' ', $search);


            $sendData = array(
                'user_id' => $user["user_id"],
                'search' => $ids
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
            $result = curl_exec($ch);


            $headers = array();

            $data = explode("\n", $result);


            array_shift($data);
            $middle = array();
            $moddle = array();
            foreach ($data as $part) {
                $middle = explode(":", $part);
                $moddle = explode("{", $part);

                if (error_reporting() == 0) {
                    $headers[trim($middle[0])] = trim($middle[1]);
                }
            }
            $getdata = end($data);
            $resval = json_decode($getdata, TRUE);

            $psn = $resval['message'];
            $usersearch = $resval['data'];
            $auth = $headers['BABOO-AUTH-KEY'];

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
            // print_r($sendData);
        }
    }


    public function search()
    {
        error_reporting(0);
        $url = $this->API . '/search';
        $auth = $this->session->userdata('authKey');
        
        $search = $this->input->post('search', TRUE);


        $sendData = array(
            'search' => $search
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $result = curl_exec($ch);


        $headers = array();

        $data = explode("\n", $result);


        array_shift($data);
        $middle = array();
        $moddle = array();
        foreach ($data as $part) {
            $middle = explode(":", $part);
            $moddle = explode("{", $part);

            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        $getdata = end($data);
        $resval = json_decode($getdata, TRUE);

        $psn = $resval['message'];
        $userdetail = $resval['data'];
        $auth = $headers['BABOO-AUTH-KEY'];

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
        // print_r($data);
    }
}
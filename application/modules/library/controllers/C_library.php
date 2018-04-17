<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Library extends MX_Controller
{
    var $API = "";
    function __construct()
    {
        parent::__construct();
        $api_url = checkBase();
        $this->API = $api_url; 
        if ($this->session->userdata('isLogin') != 200) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = "Library Page | Baboo.id";
        $datas['title'] = "Library Page | Baboo.id";

        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $seg = $this->session->userdata('userData');
        $userid = $seg['user_id'];

        $sendData = array(
            'user_id' => $userid
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'book/Books/latestRead');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
        $result = curl_exec($ch);

        $headers=array();
        
        $slider=explode("\n",$result);
        
        array_shift($slider);
        
        foreach($slider as $part){
            $middle=explode(":",$part);
            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/listBookmark');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
        $result = curl_exec($ch);

        $headers=array();

        $book=explode("\n",$result);


        array_shift($book);
        $middle = array();
        $moddle = array();
        foreach($book as $part){
            $middle=explode(":",$part);
            $moddle=explode("{",$part);

            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }

        $auth = $headers['BABOO-AUTH-KEY'];
        $resval1 = (array)json_decode(end($slider), true);
        $resval2 = (array)json_decode(end($book), true);
        
        
        $resval3 = $this->curl_request->curl_post($this->API.'payment/Payment/reminderPay', '', $auth);

        $resval4 = $this->curl_request->curl_post($this->API.'timeline/Timelines/listCollections', '', $auth);

        $datas['slide'] = $resval1;
        $datas['bookmark'] = $resval2;
        $datas['transaction'] = $resval3;
        $datas['collection'] = $resval4;

        $this->session->set_userdata('authKey', $auth);
        $datas['js'][]   = "public/js/custom/notification.js";
        $datas['js'][] = "public/js/custom/transaction.js";
        if ($this->agent->is_mobile()) {
            $data['js'][] = "public/js/jquery.min.js";
            $data['js'][] = "public/js/umd/popper.min.js";
            $data['js'][] = "public/js/bootstrap.min.js";
            $data['js'][] = "public/js/custom/mobile/library.js";
            $data['js'][] = "public/js/menupage.js";
            $data['js'][] = "public/js/custom/notification.js";

            $this->load->view('include/head', $data);
            $this->load->view('R_library');

        }else{
            $this->load->view('include/head', $datas);
            $this->load->view('D_library');
        }
    }

    public function bookmark()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $userid = $this->input->post('user');
        $sendData = array(
            'user_id' => $userid
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/listBookmark');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
        $result = curl_exec($ch);

        $headers=array();

        $data=explode("\n",$result);


        array_shift($data);
        $middle = array();
        $moddle = array();
        foreach($data as $part){
            $middle=explode(":",$part);
            $moddle=explode("{",$part);

            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        $getdata = end($data);
        $resval =  json_decode($getdata, TRUE);
        $status = $resval['code'];
        $pesan = $resval['message'];
        $auth = $headers['BABOO-AUTH-KEY'];
        
        $resval = (array)json_decode(end($data), true);
        $bookmark = $resval['data'];
        
        if ($data['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            echo json_encode(array(
                'code' => $status,
                'data' => $bookmark
            ));
        }
    }
    
    public function lastRead()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $userid = $this->input->post('user');

        $sendData = array(
            'user_id' => $userid
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'book/Books/latestRead');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
        $result = curl_exec($ch);

        $headers=array();

        $data=explode("\n",$result);


        array_shift($data);
        $middle = array();
        $moddle = array();
        foreach($data as $part){
            $middle=explode(":",$part);
            $moddle=explode("{",$part);

            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        $getdata = end($data);
        $resval =  json_decode($getdata, TRUE);
        $status = $resval['code'];
        $pesan = $resval['message'];
        $auth = $headers['BABOO-AUTH-KEY'];
        
        $resval = (array)json_decode(end($data), true);
        $lastRead = $resval['data'];
        
        $output = array_slice($lastRead, 0, 5);
        
        if ($data['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            echo json_encode(array(
                'code' => $status,
                'data' => $output
            ));
        }
    }

    public function Collections()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $data = $this->curl_request->curl_get($this->API.'timeline/Timelines/allCollections', '', $auth);
        $output = array_slice($data['data'], 0, 4);

        if ($data['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            echo json_encode(array(
                'code' => $data['code'],
                'data' => $output
            ));
        }
    }


    public function allBookmark()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $data = $this->curl_request->curl_get($this->API.'timeline/Timelines/allBookmark', '', $auth);

        if ($data['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            if ($this->agent->is_mobile()) {
                $datas['book'] = $data['data'];
                $datas['title'] = "Semua Bookmark Buku | Baboo.id";
                $datas['css'][] = "public/css/bootstrap.min.css";
                $datas['css'][] = "public/css/font-awesome.min.css";
                $datas['css'][] = "public/css/baboo-responsive.css";
                $datas['css'][] = "public/css/custom-margin-padding.css";

                $datas['js'][] = "public/js/jquery.min.js";
                $datas['js'][] = "public/js/tether.min.js";
                $datas['js'][] = "public/js/umd/popper.min.js";
                $datas['js'][] = "public/js/bootstrap.min.js";
                $datas['js'][] = "public/js/menupage.js";

                $this->load->view('all/bookmark', $datas);
            }else{
                redirect('timeline','refresh');
            }
        }
    }
    public function allLatestRead()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $data = $this->curl_request->curl_get($this->API.'book/Books/all_latestRead', '', $auth);

        if ($data['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            if ($this->agent->is_mobile()) {
                $datas['book'] = $data['data'];
                $datas['title'] = "Semua Buku yang Terakhir di Baca | Baboo.id";
                $datas['css'][] = "public/css/bootstrap.min.css";
                $datas['css'][] = "public/css/font-awesome.min.css";
                $datas['css'][] = "public/css/baboo-responsive.css";
                $datas['css'][] = "public/css/custom-margin-padding.css";

                $datas['js'][] = "public/js/jquery.min.js";
                $datas['js'][] = "public/js/tether.min.js";
                $datas['js'][] = "public/js/umd/popper.min.js";
                $datas['js'][] = "public/js/bootstrap.min.js";
                $datas['js'][] = "public/js/menupage.js";

                $this->load->view('all/lastread', $datas);
            }else{
                redirect('timeline','refresh');
            }
        }
    }
    public function allCollection()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $data = $this->curl_request->curl_get($this->API.'timeline/Timelines/allCollections', '', $auth);

        if ($data['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            if ($this->agent->is_mobile()) {
                $datas['book'] = $data['data'];
                $datas['title'] = "Semua Koleksi Buku Mu | Baboo.id";
                $datas['css'][] = "public/css/bootstrap.min.css";
                $datas['css'][] = "public/css/font-awesome.min.css";
                $datas['css'][] = "public/css/baboo-responsive.css";
                $datas['css'][] = "public/css/custom-margin-padding.css";

                $datas['js'][] = "public/js/jquery.min.js";
                $datas['js'][] = "public/js/tether.min.js";
                $datas['js'][] = "public/js/umd/popper.min.js";
                $datas['js'][] = "public/js/bootstrap.min.js";
                $datas['js'][] = "public/js/menupage.js";

                $this->load->view('all/collection', $datas);
            }else{
                redirect('timeline','refresh');
            }
        }
    }
}
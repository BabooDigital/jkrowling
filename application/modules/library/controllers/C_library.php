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

        $resval1 = $this->curl_request->curl_post_auth($this->API.'book/Books/latestRead', '', $auth);
        $resval2 = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/listBookmark', '', $auth);
        $resval3 = $this->curl_request->curl_get_auth($this->API.'payment/Payment/reminderPay', '', $auth);
        $resval4 = $this->curl_request->curl_get_auth($this->API.'timeline/Timelines/listCollections', '', $auth);

        $datas['slide'] = $resval1['data'];
        $datas['bookmark'] = $resval2['data'];
        $datas['transaction'] = $resval3['data'];
        $datas['collection'] = $resval4['data'];

        $auth = $resval4['bbo_auth'];
        $this->session->set_userdata('authKey', $auth);
        $datas['js'][]   = "public/js/custom/notification.js";
        $datas['js'][] = "public/js/custom/transaction.js";
        if ($this->agent->is_mobile()) {
            $data['transaction'] = $resval3['data']['data'];
            $data['js'][] = "public/js/jquery.min.js";
            $data['js'][] = "public/js/umd/popper.min.js";
            $data['js'][] = "public/js/bootstrap.min.js";
            $data['js'][] = "public/js/custom/mobile/library.js";
            $data['js'][] = "public/js/menupage.js";
            $data['js'][] = "public/js/custom/notification.js";
            $data['js'][] = "public/js/custom/transaction.js";

            $this->load->view('include/head', $data);
            $this->load->view('R_library');

        }else{
            $datas['js'][]   = "public/js/custom/search.js";
            $this->load->view('include/head', $datas);
            $this->load->view('D_library');
        }
    }
    public function getBestBookLibrary()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $datas = $this->curl_request->curl_get($this->API.'timeline/Timelines/bestBook', '', $auth);

        $data['home'] = $datas;
        $data_best = $data['home']['data'];

        if ($datas['home']['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            echo json_encode(array_splice($data_best, 2), true);
        }
    }
    public function bookmark()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');

        $getdata = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/listBookmark', '', $auth);
        
        $resval =  $getdata['data'];

        $auth = $getdata['bbo_auth'];
        $this->session->set_userdata('authKey', $auth);
        if ($resval['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            echo json_encode(array(
                'code' => $resval['code'],
                'data' => $resval['data']
            ));
        }
    }
    
    public function lastRead()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');

        $getdata = $this->curl_request->curl_post_auth($this->API.'book/Books/latestRead', '', $auth);

        $resval =  $getdata['data'];

        $lastRead = $resval['data'];
        $output = array_slice($lastRead, 0, 5);
        
        $auth = $getdata['bbo_auth'];
        $this->session->set_userdata('authKey', $auth);
        if ($resval['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            echo json_encode(array(
                'code' => $resval['code'],
                'data' => $output
            ));
        }
    }

    public function Collections()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $data = $this->curl_request->curl_get($this->API.'timeline/Timelines/listCollections', '', $auth);
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
        $data = $this->curl_request->curl_get_auth($this->API.'timeline/Timelines/allCollections', '', $auth);
        $resval = $data['data'];

        if ($resval['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            if ($this->agent->is_mobile()) {
                $datas['book'] = $resval['data'];
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
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
        $data['title'] = "Library Page | Baboo - Beyond Book & Creativity";
        $data['css'][]   = "public/css/jquery.bxslider.min.css";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/js/custom/mobile/library.js";
        $data['js'][] = "public/js/menupage.js";
        $data['js'][]   = "public/js/custom/notification.js";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Home/bestBook');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
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

        $resval2 = (array)json_decode(end($slider), true);

        $data['slide'] = $resval2;
        if ($this->agent->is_mobile()) {

            $this->load->view('include/head', $data);
            $this->load->view('R_library', $data);

        }else{
            $this->load->view('include/head', $data);
            $this->load->view('D_library', $data);
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
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
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
        
        echo json_encode($bookmark, TRUE);  
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
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
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

        echo json_encode($output, TRUE);
    }
}
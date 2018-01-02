<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Library extends MX_Controller
{
    var $API = "";
    function __construct()
    {
        parent::__construct();
        $this->API = "api.dev-baboo.co.id/v1/timeline/Timelines";
        if ($this->session->userdata('isLogin') != 200) {
        	redirect('home');
        }
    }

    public function index()
    {
        $data['judul'] = "Library Page - Baboo";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/custom/mobile/library.js";
        $data['js'][] = "public/js/menupage.js";
        if ($this->agent->is_mobile()) {

            $this->load->view('include/head', $data);
            $this->load->view('R_library', $data);

        }
    }
    public function bookmark()
    {
        error_reporting(0);
        $url = $this->API.'/listBookmark';
        $auth = $this->session->userdata('authKey');
        $userid = $this->input->post('user');

        $sendData = array(
            'user_id' => $userid
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

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
        
        $this->session->set_userdata('authKey', $auth);
        $resval = (array)json_decode($data[16], true);
        $bookmark = $resval['data'];
        
        echo json_encode($bookmark, TRUE); 
        // print_r($data);
        // echo json_encode(array('code' => $status, 'message' => $pesan));    
    }
    public function lastRead()
    {
        error_reporting(0);
        $url = $this->API.'/latestRead';
        $auth = $this->session->userdata('authKey');
        $userid = $this->input->post('user');

        $sendData = array(
            'user_id' => $userid
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

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
        
        $this->session->set_userdata('authKey', $auth);
        $resval = (array)json_decode($data[16], true);
        $lastRead = $resval['data'];
        
        $output = array_slice($lastRead, 0, 2);
        // print_r($output);
        echo json_encode($output, TRUE); 
    }
}
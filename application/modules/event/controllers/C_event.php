<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Event extends MX_Controller
{
    var $API = "";
    function __construct()
    {
        parent::__construct();
        $api_url = checkBase();
        $this->API = $api_url;
    }
    public function index()
    {
        $data['title'] = "Event Page | Baboo - Beyond Book & Creativity";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][]   = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/js/custom/event.js";

        $data['event'] = $this->getEvent();
        $this->load->view('include/head', $data);
        $this->load->view('D_event', $data);
    }
    public function getEvent()
    {

        $auth = $this->session->userdata('authKey');
        $userdata = $this->session->userdata('userData');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'event/Events/getEvent');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
        
        $result = curl_exec($ch);
        $headers=array();
        $datas=explode("\n",$result);
        array_shift($datas);
        foreach($datas as $part){
            $middle=explode(":",$part);
            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        $this->session->set_userdata('authKey', $auth);
        $data = json_decode(end($datas), true);
        return $data;
    }
    public function followEvent()
    {
        $this->session->set_flashdata('is_follow_event', '200');
        redirect('timeline');
    }
}
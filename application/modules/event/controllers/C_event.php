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

        $data['css'][] = "public/css/custom/event-responsive.css";
        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][]   = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        if (!$this->session->userdata('isLogin')) {
            $data['css'][] = "public/css/sweetalert2.min.css";
            $data['js'][] = "public/js/sweetalert2.all.min.js";
            $data['js'][] = "public/js/custom/notification.js";
        }
        $data['js'][] = "public/js/jquery.validate.js";
        $data['js'][] = "public/js/custom/event.js";

        $data['event'] = $this->getEvent();
        $data['winner'] = $this->bestWinner();
        $this->load->view('include/head', $data);
        $this->load->view('D_event', $data);
    }
    public function getEvent()
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'event/Events/getEvent');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        
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
        $data = json_decode(end($datas), true);
        return $data['data'][0];
    }
    public function followEvent()
    {
        $email = $this->session->userdata('userData')['email'];
        if ($this->input->post()) {
            $nohp = $this->input->post('nohp');

            $sendData = array('email'=>$email, 'phone'=>$nohp);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->API.'event/Events/setEvent');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            $result = curl_exec($ch);

            $headers=array();

            $data=explode("\n",$result);


            array_shift($data);

            foreach($data as $part){
                $middle=explode(":",$part);
                if (error_reporting() == 0) {
                    $headers[trim($middle[0])] = trim($middle[1]);
                }
            }


            $resval = (array)json_decode(end($data), true);

            if ($resval['code'] == 200) {
                $this->session->set_flashdata('is_follow_event', 200);
            }if($resval['code'] == 403){
                $this->session->set_flashdata('is_not_follow_event', 403);
            }
        }else{
            $user = $this->session->userdata('userData');
            $this->session->set_userdata('userData', $user);
            redirect('event#follow_event');
        }
    }
    public function getBestBookEvent()
    {
        error_reporting(0);
        $ch = curl_init();
        $options = array(
            CURLOPT_URL          => $this->API.'timeline/Home/finalisBook',
            CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST  =>"POST",    // Atur type request
              CURLOPT_POST           =>TRUE,    // Atur menjadi GET
              CURLOPT_FOLLOWLOCATION => false,    // Follow redirect aktif
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_HEADER         => 1,
              CURLOPT_HTTPHEADER     => array('baboo-auth-key: '.$auth)
          );
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        $headers=array();

        $data=explode("\n",$content);
        $headers['status']=$data[0];

        array_shift($data);

        foreach($data as $part){
            $middle=explode(":",$part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data['home'] = json_decode(end($data), true);
        $data_best = $data['home']['data'];
        // $auth = $headers['BABOO-AUTH-KEY'];
        // $this->session->set_userdata('authKey', $auth);
        // print_r(end($data));
        if ($datas['home']['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            echo json_encode(array_splice($data_best, 2), true);
        }
    }
    public function seeAll()
    {
        $data['title'] = "Event Page | Baboo - Beyond Book & Creativity";

        $data['css'][] = "public/css/custom/event-responsive.css";
        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][]   = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        if (!$this->session->userdata('isLogin')) {
            $data['css'][] = "public/css/sweetalert2.min.css";
            $data['js'][] = "public/js/sweetalert2.all.min.js";
        }
        $data['js'][] = "public/js/jquery.validate.js";
        $data['js'][] = "public/js/custom/event.js";

        $seall = $this->bestBookEventSeeAll();
        $data['event'] = $this->getEvent();
        $data['seeall_event'] = $seall;
        $this->load->view('include/head', $data);
        $this->load->view('D_seeall', $data);
    }
    public function bestBookEventSeeAll()
    {
        error_reporting(0);
        // $auth = $this->session->userdata('authKey');
        $ch = curl_init();
        $options = array(
            CURLOPT_URL          => $this->API.'timeline/Home/finalisBook',
            CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST  =>"POST",    // Atur type request
              CURLOPT_POST           =>TRUE,    // Atur menjadi GET
              CURLOPT_FOLLOWLOCATION => false,    // Follow redirect aktif
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_HEADER         => 1,
              CURLOPT_HTTPHEADER     => array('baboo-auth-key: '.$auth)
          );
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        $headers=array();

        $data=explode("\n",$content);
        $headers['status']=$data[0];

        array_shift($data);

        foreach($data as $part){
            $middle=explode(":",$part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data['home'] = json_decode(end($data), true);
        $data_best = $data['home']['data'];
        $auth = $headers['BABOO-AUTH-KEY'];
        // $this->session->set_userdata('authKey', $auth);
        if ($datas['home']['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            return $data_best;
        }
    }
    public function bestWinner()
    {
        error_reporting(0);
        // $auth = $this->session->userdata('authKey');
        $ch = curl_init();
        $options = array(
            CURLOPT_URL          => $this->API.'timeline/Home/finalisWinner',
            CURLOPT_RETURNTRANSFER => true,
              CURLOPT_CUSTOMREQUEST  =>"POST",    // Atur type request
              CURLOPT_POST           =>false,    // Atur menjadi GET
              CURLOPT_FOLLOWLOCATION => false,    // Follow redirect aktif
              CURLOPT_SSL_VERIFYPEER => 0,
              CURLOPT_HEADER         => 1,
              CURLOPT_HTTPHEADER     => array('baboo-auth-key: '.$auth)
          );
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        $headers=array();

        $data=explode("\n",$content);
        $headers['status']=$data[0];

        array_shift($data);

        foreach($data as $part){
            $middle=explode(":",$part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data['home'] = json_decode(end($data), true);
        $data_best = $data['home']['data'];
        // $auth = $headers['BABOO-AUTH-KEY'];
        // $this->session->set_userdata('authKey', $auth);
        if ($datas['home']['code'] == 403){
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login','refresh');
        }else{
            return $data['home'];
        }
    }
}
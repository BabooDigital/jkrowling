<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends MX_Controller
{

    var $API = "";
    
    function __construct()
    {
        parent::__construct();
        $this->API = "api.dev-baboo.co.id/v1/auth/OAuth";
        
        if ($this->session->userdata('isLogin') == 200)
        {
            redirect('timeline');
        }
    }
    
    public function index()
    {
        $data['authUrl'] = $this->facebook->login_url();
        $data['authUrlG'] = $this->google->loginURL();
        if ($this->agent->is_mobile('ipad'))
        {
            $this->load->view('D_login', $data);
        }
        if ($this->agent->is_mobile())
        {
            $this->load->view('R_login', $data);
        }
        else
        {
            $this->load->view('D_login', $data);
        }
    }
    
    public function fb_login()
    {
        error_reporting(0);
        if ($this->facebook->is_authenticated())
        {
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender');
            
            $userData = array(
                'oauth_provider' => 'facebook',
                'oauth_uid' => $userProfile['id'],
                'email' => $userProfile['email'],
                'prof_pict' => 'https://graph.facebook.com/'.$userProfile['id'].'/picture',
                'fullname' => $userProfile['first_name'] . " " . $userProfile['last_name'],
                'token' => $userProfile['id'],
                'jk' => $userProfile['gender']
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->API.'/login_fb');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);
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


            $resval = (array)json_decode($data[16], true);

            $psn = $resval['message'];
            $user = $resval['data'];
            if (isset($resval['code']) && $resval['code'] == '200')
            {
                $status = $resval['code'];

                $this->session->set_userdata('isLogin', $status);
                $this->session->set_userdata('userDatafb', $user);
                redirect("timeline");
            }
        }else
        {
            $status = $resval['code'];

            $fbuser = '';
            echo "<script type='text/javascript'>alert ('".$psn."');window.location.href = '".site_url('login')."';</script>";
        }

        echo json_encode(array(
            'status' => $status,
            'data' => $user,
            'message' => $psn
        ));
    }

    public function google_login()
    {
        error_reporting(0);
        if(isset($_GET['code'])){

            $this->google->getAuthenticate();
            
            $gpInfo = $this->google->getUserInfo();

            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            $userData['fullname']       = $gpInfo['given_name'] . " " . $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['token']          = $gpInfo['id'];
            $userData['prof_pict']      = $gpInfo['picture'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->API.'/login_google');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);
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
            
            
            $resval = (array)json_decode($data[16], true);

            $psn = $resval['message'];
            $status = $resval['code'];
            $user = $resval['data'];

            $this->session->set_userdata('isLogin', $status);
            $this->session->set_userdata('userDatagoogle', $user);

            redirect('timeline');
        }else {
            $status = $resval['code'];
            $data = "Not Found";

            echo "<script type='text/javascript'>alert ('".$psn."');window.location.href = '".site_url('login')."';</script>";
        }
        echo json_encode(array(
            'status' => $status, 
            'data' => $user,
            'message' => $psn
        ));
    }

    public function postloginuser()
    {
        error_reporting(0);
        $email = $this->input->post('emails');
        $password = $this->input->post('passwords');

        $data = array(
            'username' => $email,
            'password' => $password
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'/login');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
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
        
        
        $resval = (array)json_decode($data[16], true);

        $psn = $resval['message'];
        $user = $resval['data'];
        if (isset($resval['code']) && $resval['code'] == '200')
        {
            $status = $resval['code'];

            $this->session->set_userdata('userData', $user);
            $this->session->set_userdata('isLogin', $status);
            redirect("timeline");
        }
        else
        {
            $status = $resval['code'];

            echo "<script type='text/javascript'>alert ('".$psn."');window.location.href = '".site_url('login')."';</script>";
        }

        echo json_encode(array(
            'status' => $status,
            'data' => $user,
            'message' => $psn
        ));
    }

    public function postregisteruser()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $tgl = $this->input->post('tgl_lahir');
        $jk = $this->input->post('j_kelamin');

        $data = array(
            'fullname' => $name, 
            'email' => $email, 
            'password' => $pass, 
            'date_of_birth' => $tgl, 
            'jk' => $jk, 
            'created' => date("Y-m-d H:i:s"), 
            'modify' => date("Y-m-d H:i:s") 
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'/register');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        
        $headers=array();

        $data=explode("\n",$result);


        array_shift($data);

        foreach($data as $part){
            $middle=explode(":",$part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }
        
        
        $resval = (array)json_decode($data[16], true);

        $psn = $resval['message'];
        $user = $resval['data'];
        if (isset($resval['code']) && $resval['code'] == '200')
        {
            $status = $resval['code'];

            $this->session->set_userdata('userData', $user);
            $this->session->set_userdata('isLogin', $status);
            redirect("timeline");
        }
        else
        {
            $status = $resval['code'];

            echo "<script type='text/javascript'>alert ('".$psn."');window.location.href = '".site_url('login')."';</script>";
        }

        echo json_encode(array(
            'status' => $status,
            'data' => $user,
            'message' => $psn
        ));
    }

}
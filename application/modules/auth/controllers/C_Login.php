<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends MX_Controller
{
    
    var $API = "";
    
    function __construct()
    {
        parent::__construct();
        $this->API = "api.dev-baboo.co.id/v1/auth";
        
        $this->load->model('user');
        
        if ($this->session->userdata('isLogin') == 200)
        {
            redirect('timeline');
        }
    }
    
    public function index()
    {
        if ($this->agent->is_mobile('ipad'))
        {
            $data['authUrl'] = $this->facebook->login_url();
            $data['authUrlG'] = $this->google->loginURL();
            $this->load->view('D_login', $data);
        }
        if ($this->agent->is_mobile())
        {
            $data['authUrl'] = $this->facebook->login_url();
            $data['authUrlG'] = $this->google->loginURL();
            $this->load->view('R_login', $data);
        }
        else
        {
            $data['authUrl'] = $this->facebook->login_url();
            $data['authUrlG'] = $this->google->loginURL();
            $this->load->view('D_login', $data);
        }
    }
    
    public function fb_login()
    {
        echo CurlAPI();
        $this->curl->create($this->API . '/OAuth/login_fb');
        
        if ($this->facebook->is_authenticated())
        {
            
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender');
            
            $userData = array(
                'oauth_provider' => 'facebook',
                'oauth_uid' => $userProfile['id'],
                'email' => $userProfile['email'],
                'fullname' => $userProfile['first_name'] . " " . $userProfile['last_name'],
                'jk' => $userProfile['gender']
            );
            
            $this->curl->post($userData);
            $userID = json_decode($this->curl->execute());
            $psn = $userID->message;
        	// echo $this->curl->error_string;
            
            if (isset($userID->code) && $userID->code == '200')
            {
                $status = $userID->code;
                
                $this->session->set_userdata('isLogin', $status);
                $this->session->set_userdata('userDatafb', $userData);
                redirect('timeline');
            }
        }
        else
        {
            $status = $userID->code;
            $fbuser = '';
        	echo "<script type='text/javascript'>alert ('".$psn."');window.location.href = '".site_url('login')."';</script>";
        }
        echo json_encode(array(
            'status' => $status, 
            'data' => $userData,
            'message' => $psn
        ));
    }

    public function google_login()
    {
        echo CurlAPI();
        $this->curl->create($this->API . '/OAuth/login_google');

        if(isset($_GET['code'])){

            $this->google->getAuthenticate();
            
            $gpInfo = $this->google->getUserInfo();

            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            $userData['fullname']     = $gpInfo['given_name'] . " " . $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            
            $this->curl->post($userData);
            $userID = json_decode($this->curl->execute());
            $psn = $userID->message;
        	// echo $this->curl->error_string;

            $status = $userID->code;

            $this->session->set_userdata('isLogin', $status);
            $this->session->set_userdata('userDatagoogle', $userData);

            redirect('timeline');
        }else {
        	$status = $userID->code;
        	$data = "Not Found";

        	echo "<script type='text/javascript'>alert ('".$psn."');window.location.href = '".site_url('login')."';</script>";
        } 
        echo json_encode(array(
            'status' => $status, 
            'data' => $userData,
            'message' => $psn
        ));
    }

    public function postloginuser()
    {
        echo CurlAPI();
        $this->curl->create($this->API.'/OAuth/login');
        
        $email = $this->input->post('emails');
        $password = $this->input->post('passwords');
        
        $data = array(
            'username' => $email,
            'password' => $password
        );
        $this->curl->post($data);
        $cek = json_decode($this->curl->execute());
        $psn = $cek->message;
        // echo $this->curl->error_string;
        
        if (isset($cek->code) && $cek->code == '200')
        {
            $status = $cek->code;

            $this->session->set_userdata('userData', $data);
            $this->session->set_userdata('isLogin', $status);
            redirect("timeline");
        }
        else
        {
        	$status = $cek->code;

            echo "<script type='text/javascript'>alert ('".$psn."');window.location.href = '".site_url('login')."';</script>";
        }

        echo json_encode(array(
            'status' => $status,
            'data' => $data,
            'message' => $psn
        ));
    }

    public function postregisteruser()
    {
        echo CurlAPI();
        $this->curl->create($this->API.'/OAuth/register');
    	
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

        $this->curl->post($data);
        $cek = json_decode($this->curl->execute());
        $psn = $cek->message;

        if (isset($cek->code) && $cek->code == '200')
        {
            $status = $cek->code;

	        $this->session->set_userdata('userData', $data);
	        $this->session->set_userdata('isLogin', $status);
            redirect("timeline");
        }
        else
        {
        	$status = $cek->code;
            echo "<script type='text/javascript'>alert ('".$psn."');window.location.href = '".site_url('login')."';</script>";
        }

        echo json_encode(array(
            'status' => $status,
            'data' => $data,
            'message' => $psn
        ));
    }

}
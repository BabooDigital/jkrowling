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
            $userID = $this->curl->execute();
        	// echo $this->curl->error_string;
            
            if (isset($userID))
            {
                $status = 200;
                
                $data['disconnectUrl'] = $this->facebook->logout_url();
                $data['email']         = $userProfile['email'];
                $data['oauth_uid']     = $userProfile['id'];
                
                $this->session->set_userdata('isLogin', $status);
                $this->session->set_userdata('userData', $userData);
                redirect('timeline');
            }
        }
        else
        {
            $status = 404;
            $fbuser = '';
            redirect('', 'refresh');
        }
        echo json_encode(array(
            'status' => $status, 
            'data' => $data
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
            $userID = $this->curl->execute();
        	// echo $this->curl->error_string;

            $status = 200;

            $this->session->set_userdata('isLogin', $status);
            $this->session->set_userdata('userData', $userData);

            redirect('timeline');
        }else {
        	$status = 404;
        	$data = "Not Found";
        	
            redirect('', 'refresh');
        } 
        echo json_encode(array(
            'status' => $status, 
            'data' => $userData
        ));
    }

    public function postloginuser()
    {
        echo CurlAPI();
        $this->curl->create($this->API.'/OAuth/login');
        
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $data = array(
            'username' => $email,
            'password' => $password
        );
        $this->curl->post($data);
        $cek = $this->curl->execute();
        // echo $this->curl->error_string;
        
        if ($cek == TRUE)
        {
            $status = 200;

	        $this->session->set_userdata('userData', $data);
	        $this->session->set_userdata('isLogin', $status);
            redirect("timeline");
        }
        else
        {
        	$status = 404;
            echo "<script type='text/javascript'>alert ('Maaf Email Dan Password Anda Salah !');</script>";
            redirect('login', 'refresh');
        }

        echo json_encode(array(
            'status' => $status,
            'data' => $data
        ));
    }

}
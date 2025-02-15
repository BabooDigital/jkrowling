<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_Login extends MX_Controller
{
    var $API = "";

    var $wrss = "";
    var $boss = "";
    var $chss = "";
    var $hass = "";

    function __construct()
    {
        parent::__construct();
        $api_url = checkBase();
        $this->API_BASE = $api_url;
        $this->API = $api_url."auth/OAuth";

        $this->wrss = $this->session->userdata('userRef');
        $this->boss = $this->session->userdata('bookRef');
        $this->chss = $this->session->userdata('chapterRef');
        $this->hass = $this->session->userdata('buyHash');

        if ($this->session->userdata('isLogin') == 200)
        {
            redirect('');
        }
    }

    public function index()
    {
        $data['title'] = "Login Baboo - Baca buku online";
        $data['page_desc'] = "Masuk dengan akun anda untuk memasuki dunia Baboo...";

        $data['authUrl'] = $this->facebook->login_url();
        $data['authUrlG'] = $this->google->loginURL();
        $data['authUrlGEv'] = $this->google->loginURLEvent();
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
    public function google_event()
    {
        $array = array(
            'event' => 1
        );

        $this->session->set_userdata($array);
        redirect($this->google->loginURLEvent());
    }
    public function facebook_event()
    {
        $array = array(
            'event' => 1
        );

        $this->session->set_userdata($array);
        redirect($this->facebook->login_url());
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
            $resval = $this->curl_request->curl_post_auth($this->API.'/login_fb', $userData, '');
            $psn = $resval['data']['message'];
            $user = $resval['data']['data'];
            $status = $resval['data']['code'];
            $auth = $resval['bbo_auth'];
            if (isset($status) && $status == 200)
            {
                $this->session->set_userdata('isLogin', $status);
                $this->session->set_userdata('authKey', $auth);
                $this->session->set_userdata('userData', $user);
                $this->session->set_userdata('hasPIN', $user['has_pin']);
                $this->session->set_userdata('hasPhone', $user['phone_number']);

                if ((bool)$user['is_newuser'] == TRUE){
                    if ($this->agent->is_mobile()) {
                        redirect("firstlogin");
                    }else{
                        redirect('complete_profile');
                    }
                }

                $redirect = "";
                if (!empty($this->wrss)){
                    $redirect .= "penulis/".$this->wrss;
                    if (!empty($this->boss)){
                        $redirect .= '/'.$this->boss;
                        if (!empty($this->chss)){
                            $redirect .= "/chapter/".$this->chss;
                        }
                        if (!empty($this->hass)){
                            $redirect .= "#".$this->hass;
                        }
                    }
                }else{
                    $redirect .= "";
                }
                redirect($redirect);
            }
            else
            {
                $this->session->set_flashdata('login_alert', '<script>
                  $(window).on("load", function(){
                    swal("Gagal", "'.ucwords($psn).'", "error");
                });
                </script>');
                redirect('login','refresh');
            }
        }
    }
    public function google_login()
    {
        error_reporting(0);
        if(isset($_GET['code']))
        {
            $this->google->getAuthenticate();

            $gpInfo = $this->google->getUserInfo();
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            $userData['fullname']       = $gpInfo['given_name'] . " " . $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['token']          = $gpInfo['id'];
            $userData['prof_pict']      = $gpInfo['picture'];

            $resval = $this->curl_request->curl_post_auth($this->API.'/login_google', $userData, '');
            $psn = $resval['data']['message'];
            $status = $resval['data']['code'];
            $user = $resval['data']['data'];
            $auth = $resval['bbo_auth'];
            if (isset($status) && $status == 200)
            {
                $this->session->set_userdata('isLogin', $status);
                $this->session->set_userdata('authKey', $auth);
                $this->session->set_userdata('userData', $user);
                $this->session->set_userdata('hasPIN', $user['has_pin']);
                $this->session->set_userdata('hasPhone', $user['phone_number']);

                if ((bool)$user['is_newuser'] == TRUE){
                    if ($this->agent->is_mobile()) {
                        redirect("firstlogin");
                    }else{
                        redirect('complete_profile');
                    }
                }

                $redirect = "";
                if (!empty($this->wrss)){
                    $redirect .= "penulis/".$this->wrss;
                    if (!empty($this->boss)){
                        $redirect .= '/'.$this->boss;
                        if (!empty($this->chss)){
                            $redirect .= "/chapter/".$this->chss;
                        }
                        if (!empty($this->hass)){
                            $redirect .= "#".$this->hass;
                        }
                    }
                }else{
                    $redirect .= "";
                }
                redirect($redirect);
            }else{
                $this->session->set_flashdata('login_alert', '<script>
                  $(window).on("load", function(){
                    swal("Gagal", "'.ucwords($psn).'", "error");
                });
                </script>');
                redirect('login','refresh');
            }
        }
        else
        {
            $this->session->set_flashdata('login_alert', '<script>
                  $(window).on("load", function(){
                    swal("Gagal", "Terjadi kesalahan dengan metode login Google", "error");
                });
                </script>');
            redirect('login','refresh');
        }
    }
    public function postloginuser()
    {
        error_reporting(0);
        $email = $this->input->post('emails', TRUE);
        $password = $this->input->post('passwords', TRUE);
        $userData = array(
            'username' => $email,
            'password' => $password
        );
        $this->form_validation->set_rules('emails', ' ', 'trim|required');
        $this->form_validation->set_rules('passwords', ' ', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        }else{
            $resval = $this->curl_request->curl_post_auth($this->API.'/login', $userData, '');
            $psn = $resval['data']['message'];
            $user = $resval['data']['data'];
            $status = $resval['data']['code'];
            $auth = $resval['bbo_auth'];
            if (isset($status) && $status == 200)
            {
                $this->session->set_userdata('userData', $user);
                $this->session->set_userdata('hasPIN', $user['has_pin']);
                $this->session->set_userdata('hasPhone', $user['phone_number']);
                $this->session->set_userdata('authKey', $auth);
                $this->session->set_userdata('isLogin', $status);


                $redirect = "";
                if (!empty($this->wrss)){
                    $redirect .= "penulis/".$this->wrss;
                    if (!empty($this->boss)){
                        $redirect .= '/'.$this->boss;
                        if (!empty($this->chss)){
                            $redirect .= "/chapter/".$this->chss;
                        }
                        if (!empty($this->hass)){
                            $redirect .= "#".$this->hass;
                        }
                    }
                }else{
                    $redirect .= "";
                }
                redirect($redirect);
            }
            else
            {
                $this->session->set_flashdata('login_alert', '<script>
                  $(window).on("load", function(){
                    swal("Gagal", "'.ucwords($psn).'", "error");
                });
                </script>');
                redirect('login','refresh');
            }
        }
    }
//    public function postloginevent()
//    {
//        error_reporting(0);
//        $email = $this->input->post('emails', TRUE);
//        $password = $this->input->post('passwords', TRUE);
//        $userData = array(
//            'username' => $email,
//            'password' => $password
//        );
//        $this->form_validation->set_rules('emails', ' ', 'trim|required');
//        $this->form_validation->set_rules('passwords', ' ', 'trim|required');
//        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
//        if ($this->form_validation->run() == FALSE) {
//            $this->index();
//        }else{
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, $this->API.'/login');
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//            curl_setopt($ch, CURLOPT_POST, 1);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//            curl_setopt($ch, CURLOPT_HEADER, 1);
//            $result = curl_exec($ch);
//
//            $headers=array();
//            $data=explode("\n",$result);
//            array_shift($data);
//            foreach($data as $part){
//                $middle=explode(":",$part);
//                if (error_reporting() == 0) {
//                    $headers[trim($middle[0])] = trim($middle[1]);
//                }
//            }
//
//
//            $resval = (array)json_decode(end($data), true);
//            $psn = $resval['message'];
//            $user = $resval['data'];
//            $auth = $headers['BABOO-AUTH-KEY'];
//            if (isset($resval['code']) && $resval['code'] == 200)
//            {
//                $status = $resval['code'];
//                $this->session->set_userdata('userData', $user);
//                $this->session->set_userdata('hasPIN', $user['has_pin']);
//                $this->session->set_userdata('hasPhone', $user['phone_number']);
//                $this->session->set_userdata('authKey', $auth);
//                $this->session->set_userdata('isLogin', $status);
//
//                $this->boss = $this->session->userdata('bookRef');
//                if (!empty($this->boss)) {
//                    redirect('book/'.$this->boss);
//                }else{
//                    $this->session->set_userdata('userData', $user);
//                    $this->session->set_userdata('hasPIN', $user['has_pin']);
//                    $this->session->set_userdata('hasPhone', $user['phone_number']);
//                    redirect('follow_event');
//                }
//            }
//            else
//            {
//                $status = $resval['code'];
//                $this->session->set_flashdata('login_alert', '<script>
//                  $(window).on("load", function(){
//                    swal("Gagal", "'.$psn.'", "error");
//                });
//                </script>');
//                redirect('login#event','refresh');
//            }
//            echo json_encode(array(
//                'status' => $status,
//                'data' => $user,
//                'message' => $psn
//            ));
//        }
//    }
    public function postregisteruser()
    {
        error_reporting(0);
        $name = $this->input->post('name', TRUE);
        $email = $this->input->post('email', TRUE);
        $pass = $this->input->post('password', TRUE);
        $tgl = $this->input->post('tgl_lahir', TRUE);
        $jk = $this->input->post('j_kelamin', TRUE);
        $userData = array(
            'fullname' => $name,
            'email' => $email,
            'password' => $pass,
            'date_of_birth' => $tgl,
            'jk' => $jk,
            'created' => date("Y-m-d H:i:s"),
            'modify' => date("Y-m-d H:i:s")
        );

        $resval = $this->curl_request->curl_post_auth($this->API.'/register', $userData, '');
        $psn = $resval['data']['message'];
        $user = $resval['data']['data'];
        $status = $resval['data']['code'];
        $auth = $resval['bbo_auth'];
        if (isset($status) && $status == 200)
        {
            $this->session->set_userdata('userData', $user);
            $this->session->set_userdata('hasPIN', $user['has_pin']);
            $this->session->set_userdata('hasPhone', $user['phone_number']);
            $this->session->set_userdata('authKey', $auth);
            $this->session->set_userdata('isLogin', $status);

            if ((bool)$user['is_newuser'] == TRUE) {
                if ($this->agent->is_mobile()) {
                    redirect("firstlogin");
                }else{
                    redirect("complete_profile");
                }
            }
        }else{
            $this->session->set_flashdata('isRegistered', '<script>
                  $(window).on("load", function(){
                    swal("Gagal", "'.ucwords($psn).'", "error");
                });
                </script>');
            redirect('login#btndaftar');
        }
    }

}

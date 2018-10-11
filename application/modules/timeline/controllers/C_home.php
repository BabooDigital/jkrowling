<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends MX_Controller {

    var $API = "";

    function __construct(){
        parent::__construct();
        $api_url = checkBase();
        $this->API = $api_url;
    }

    public function index()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $userdata = $this->session->userdata('userData');

        if (!empty($this->input->get("page"))) {
            $idpage = $this->input->get("page");
        }else{
            $idpage = "";
        }
        $count_page = array(
            'count' => $idpage
        );

        $data['title'] = "Baboo - Make Money From Writing";
        $data['page_desc'] = "Baboo Situs untuk para pembaca dan pembuat buku dimana mereka dapat menghasilkan uang hanya dengan menulis ceritanya. Ayo buat bukumu sekarang!";


        $data['js'][]   = "public/js/jquery.min.js";
        $data['js'][]   = "public/js/umd/popper.min.js";
        $data['js'][]   = "public/js/bootstrap.min.js";
        if ($this->session->userdata('isLogin') == 200) {

            $data['css'][] = "public/css/sweetalert2.min.css";
            $data['js'][]	= "public/js/sweetalert2.all.min.js";
            $data['js'][]   = "public/js/custom/notification.js";
            $data['js'][]   = "public/js/custom/transaction.js";

            $this->curl_multiple->add_call("writter","get",$this->API.'timeline/Home/bestWriter','',array(CURLOPT_HTTPHEADER => array('baboo-auth-key: '.$auth)));
            $this->curl_multiple->add_call("book","get",$this->API.'timeline/Timelines/bestBook','',array(CURLOPT_HTTPHEADER => array('baboo-auth-key: '.$auth)));
            $resvals = $this->curl_multiple->execute();

            $best_writter = json_decode($resvals['writter']['response'], TRUE);
            $best_book = json_decode($resvals['book']['response'], TRUE);

            if (isset($_GET) && !empty($_GET)){
                if (empty($_GET['sub'])){
                    $cat = $_GET['category'];
                }else{
                    $cat = $_GET['sub'];
                }
                $sendData = array('category' => $cat, 'count' => $idpage );
                $resval = $this->curl_request->curl_post_auth($this->API.'category/Categories/byCategory', $sendData, $auth);
            }else{
                $sendData = array('count' => $idpage);
                $resval = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/home', $sendData, $auth);
            }

            $data['home'] = $resval['data']['data'];
            $data['writter'] = $best_writter['data'];
            $data['best'] = $best_book['data'];

            $auth = $resval['bbo_auth'];
            $this->session->set_userdata('authKey', $auth);
            if ($this->agent->is_mobile())
            {
                $data['js'][]   = "public/js/custom/mobile/r_timeline_in.js";
                $data['js'][]   = "public/js/menupage.js";

                if (!empty($this->input->get("page"))) {
                    $result = $this->load->view('data/R_Timeline_in', $data);
                }else{
                    $this->load->view('include/head', $data);
                    $this->load->view('R_Timeline_in');
                }
            }else
            {
                $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";
                $data['js'][]   = "public/js/jquery.sticky-kit.min.js";
                $data['js'][]	= "public/plugins/holdOn/js/HoldOn.js";
                $data['js'][]   = "public/js/custom/follow.js";
                $data['js'][]   = "public/js/custom/search.js";
                $data['js'][]   = "public/js/custom/D_timeline_in.js";

                if (!empty($this->input->get("page"))) {
                    $result = $this->load->view('data/D_Timeline_in', $data);
                }else{
                    $this->load->view('include/head',$data);
                    $this->load->view('D_Timeline_in');
                }
            }

        }
        else
        {
            $data['css'][]  = "public/css/jquery.bxslider.min.css";
            $data['js'][]   = "public/js/jquery.bxslider.min.js";
            $data['js'][]   = "public/js/baboo.js";
            $data['js'][]   = "public/js/custom/D_timeline_out.js";

            $this->curl_multiple->add_call("timeline","post",$this->API.'timeline/Home/index', $count_page, array());
            $this->curl_multiple->add_call("slider","get",$this->API.'timeline/Home/slideBook', '', array());
            $this->curl_multiple->add_call("writters", "get",$this->API.'timeline/Home/bestWriter', '', array());
            $resval = $this->curl_multiple->execute();

            $data['home'] = json_decode($resval['timeline']['response'], TRUE);
            $data['slide'] = json_decode($resval['slider']['response'], TRUE);
            $data['writter'] = json_decode($resval['writters']['response'], TRUE);

            if ($this->agent->is_mobile())
            {
                $data['js'][]   = "public/js/slick.js";
                $data['js'][]   = "public/js/custom/slick_slider.js";

                if (!empty($this->input->get("page"))) {
                    $result = $this->load->view('data/R_Timeline_out', $data);
                }else{
                    $this->load->view('R_Timeline_out', $data);
                }
            }
            else
            {
                $data['js'][]   = "public/js/jquery.sticky-kit.min.js";

                if (!empty($this->input->get("page"))) {
                    $result = $this->load->view('data/D_Timeline_out', $data);
                }else{
                    $this->load->view('include/head', $data);
                    $this->load->view('D_Timeline_out');
                }
            }
        }
    }

//	public function getBestBookEvent()
//	{
//		error_reporting(0);
//		$auth = $this->session->userdata('authKey');
//		$datas = $this->curl_request->curl_get($this->API.'timeline/Home/bestBook', '', $auth);
//
//		$datas['home'] = json_decode(end($data), true);
//		$data_best = $datas['home']['data'];
//		$auth = $headers['BABOO-AUTH-KEY'];
//		$this->session->set_userdata('authKey', $auth);
//
//		if ($datas['home']['code'] == 403){
//			$this->session->unset_userdata('userData');
//			$this->session->unset_userdata('authKey');
//			$this->session->sess_destroy();
//			redirect('login','refresh');
//		}else{
//			echo json_encode($data_best, true);
//		}
//	}

    public function homeDirect()
    {
        redirect('');
    }
}

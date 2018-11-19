<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_profile extends MX_Controller {
	var $API = "";
	function __construct(){
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;
//		if ($this->session->userdata('isLogin') != 200) {
//			redirect('login');
//		}
	}
	public function index()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->session->userdata('userData');

		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/profile', '', $auth);

		if (!empty($this->input->get("page"))) {
			$idpage = $this->input->get("page");
		}else{
			$idpage = "";
		}
		$sendData = array('count' => $idpage);

		$datas2 = $this->curl_request->curl_post($this->API.'timeline/Timelines/publish', $sendData, $auth);
		$datas3 = $this->curl_request->curl_post($this->API.'timeline/Timelines/draft', '', $auth);
		$datas4 = $this->curl_request->curl_post($this->API.'book/Books/latestRead', '', $auth);

        $followers_list = $this->curl_request->curl_post_auth($this->API.'auth/OAuth/listFollowers', '', $auth);
        $statistik = $this->curl_request->curl_get_auth($this->API.'auth/OAuth/statisticUser', '', $auth);

		$data['userdata'] = $datas['data'];
		$data['bookdata'] = $datas2['data'];
		$data['draftdata'] = $datas3['data'];
		$data['latestread'] = $datas4['data'];
		$data['followers'] = array_slice($followers_list['data']['data'], 0, 20);
		$data['statistik'] = $statistik['data'];
		$data['title'] = "Profile Page - Baboo";
        $data['page_desc'] = 'Profile Page Penulis | Baboo';
        $data['author_meta'] = $datas['data']['fullname'];
		$data['css'][] = "public/css/sweetalert2.min.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/jquery.sticky-kit.min.js";
		$data['js'][] = "public/js/custom/notification.js";
		$data['js'][] = "public/js/custom/follow.js";
		$data['js'][] = "public/js/custom/transaction.js";
		$data['js'][] = "public/js/jquery.validate.js";
		$data['js'][] = "public/js/sweetalert2.all.min.js";

		if (http_response_code() == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			$this->session->set_userdata('authKey', $auth);

			if ($datas['code'] == 200) {
				if ($this->agent->mobile()) {
					$data['css'][] = "public/css/baboo-responsive.css";
					$data['js'][] = "public/js/custom/mobile/r_profile_page.js";
					$data['js'][] = "public/js/custom/mobile/r_first_login.js";
					$data['js'][] = "public/js/custom/cashout_auth.js";
					$data['js'][] = "public/js/menupage.js";

					if (!empty($this->input->get("page"))) {
						$result = $this->load->view('data/R_profile', $data);
					}else{
						$this->load->view('include/head', $data);
						$this->load->view('R_profile');
					}
				}else{
					$data['css'][] = "public/css/baboo.css";
					$data['js'][] = "public/js/custom/profile_page.js";
					$data['js'][] = "public/js/custom/cashout_auth.js";
                	$data['js'][]   = "public/js/custom/search.js";

                	if (!empty($this->input->get("page"))) {
						$result = $this->load->view('data/D_profile', $data);
					}else{
						$this->load->view('include/head', $data);
						$this->load->view('D_profile');
					}
				}
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
						});
						</script>');
				redirect('','refresh');
			}
		}
	}
	public function otherProfile()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$id_user = $this->input->post('usr_prf', TRUE);
        $id_session = $this->session->userdata('userData')['user_id'];
		if (!empty($this->input->get("page"))) {
			$idpage = $this->input->get("page");
		}else{
			$idpage = "";
		}
		$iduser = $this->uri->segment(2);
		$ids = explode('-', $iduser);
		if (is_array($ids)) ;

		if ($id_user != NULL || $id_user != "") {
			$idfix = $id_user;
		}else {
			$idfix = end($ids);
		}

		if($idfix == $id_session){
		    redirect(site_url("profile"), "location");
        }

		$sendData = array(
			'user_profile' => $idfix,
			'count' => $idpage
		);

		if ($this->session->userdata('isLogin') == 200){
            $datas = $this->curl_request->curl_post($this->API.'auth/OAuth/otherProfile', $sendData, $auth);
            $datas2 = $this->curl_request->curl_post($this->API.'book/Books/latestRead', $sendData, $auth);

            $uid = array('user_id' => $idfix);
            $followers_list = $this->curl_request->curl_post_auth($this->API.'auth/OAuth/listFollowers', $uid, $auth);
        }else{
            $datas = $this->curl_request->curl_post($this->API.'auth/OAuth/otherProfileWeb', $sendData, '');
            $datasbook = $this->curl_request->curl_get($this->API.'timeline/Home/bestBook', '', '');
        }

		$data['userdata'] = $datas['data']['user_info'];
		$data['bookdata'] = $datas['data']['book_published'];
		$data['latestread'] = $datas2['data'];
		$data['best_book'] = $datasbook['data'];
        $data['followers'] = array_slice($followers_list['data']['data'], 0, 20);
        $data['author_meta'] = $datas['data']['user_info']['fullname'];

        $data['title'] = "Penulis ".ucwords($data['author_meta'])." | Baboo";
        $data['page_desc'] = "Salah satu penulis handal ".ucwords($data['author_meta']).", cari tau buku apa saja yang dia buat... | Baboo";
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/jquery.sticky-kit.min.js";
		$data['js'][] = "public/js/custom/follow.js";
		$data['js'][] = "public/js/custom/notification.js";
        $data['js'][] = "public/js/custom/search.js";
		$data['js'][] = "public/js/custom/transaction.js";

		$url_title = url_title($data['author_meta'], '-', true).'-'.$data['userdata']['user_id'];
		if (sizeof($ids) == 1){
            header("Location: ".$url_title, true, 301); /* Redirect browser */

            exit; /* Make sure that code below does not get executed when we redirect. */
        }

//		if (http_response_code() == 403){
//			$this->session->unset_userdata('userData');
//			$this->session->unset_userdata('authKey');
//			$this->session->sess_destroy();
//			redirect('login','refresh');
//		}else{
//			$this->session->set_userdata('authKey', $auth);

			if ($datas['code'] == 200) {
				if ($this->agent->mobile()) {

					$data['css'][] = "public/css/sweetalert2.min.css";
					$data['css'][] = "public/css/baboo-responsive.css";
					$data['js'][] = "public/js/sweetalert2.all.min.js";
					$data['js'][] = "public/js/menupage.js";
					$data['js'][] = "public/js/custom/mobile/r_other_profile.js";

					if (!empty($this->input->get("page"))) {
						$result = $this->load->view('data/R_other_profile', $data);
					}else{
						$this->load->view('include/head', $data);
						$this->load->view('R_other_profile');
					}
				}else{
					$data['js'][] = "public/js/custom/profile_page.js";
                    if (!empty($this->input->get("page"))) {
                        $result = $this->load->view('data/D_profile', $data);
                    }else {
                        $this->load->view('include/head', $data);
                        $this->load->view('D_profile');
                    }
				}
			}else {
				$this->session->set_flashdata('fail_alert', '<script>
					$(window).on("load", function(){
						swal("Gagal", "Maaf, terjadi sebuah kesalahan", "error");
						});
						</script>');
				redirect('','refresh');
			}
//		}
	}
	public function getPublishBook() {
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->input->post('user_id', TRUE);
		$sendData = array(
			'user_id' => $userdata
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/publish');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
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
		$psn = $resval['message'];
		$datas = $resval['data'];
		$status = $resval['code'];
		$auth = $headers['BABOO-AUTH-KEY'];

		$this->session->set_userdata('authKey', $auth);
		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode(array('code' => $status, 'data' => $datas));
		}
	}
	public function getDraftBook() {
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->input->post('user_id', TRUE);
		$sendData = array(
			'user_id' => $userdata
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'timeline/Timelines/draft');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
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
		$psn = $resval['message'];
		$userdetail = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];

		$status = $resval['code'];
		$this->session->set_userdata('authKey', $auth);

		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode($userdetail);
		}
	}
	public function getLatestRead()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$userdata = $this->input->post('user_id', TRUE);
		$sendData = array(
			'user_id' => $userdata
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'book/Books/latestRead');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: '.$auth));
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
		$psn = $resval['message'];
		$userdetail = $resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];

		$this->session->set_userdata('authKey', $auth);
		$status = $resval['code'];

		if ($status == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			echo json_encode($userdetail);
		}
	}
	public function settingProfile()
	{
		$data['title'] = 'Pengaturan | Baboo.id';
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/tether.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$this->load->view('R_setting_profile', $data);
	}

	public function getPublishBookOther()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$user = $this->input->post('user_profile', TRUE);
		$sendData = array('user_profile' => $user );
		$datas = $this->curl_request->curl_post($this->API.'auth/OAuth/otherProfile', $sendData, $auth);

		if (http_response_code() == 403){
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}else{
			if ($datas['code'] == 200) {
				echo json_encode(array('code' => $datas['code'], 'data' => $datas['data']['book_published']));
			}
		}
	}

	public function getMentionPeople()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');

		$resval = $this->curl_request->curl_get_auth($this->API.'auth/Users/allUsers', '', $auth);

		$comm_data = $resval['data']['data'];

		$auth = $resval['bbo_auth'];
		$this->session->set_userdata('authKey', $auth);
		$status = $resval['data']['code'];
		if ($status == 403) {
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login', 'refresh');
		} else {
			echo json_encode($comm_data);
		}
	}

	public function getFollowersList()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');

		$resval = $this->curl_request->curl_post_auth($this->API.'auth/OAuth/listFollowers', '', $auth);

		$foll_list = $resval['data']['data'];
		$status = $resval['data']['code'];

		$auth = $resval['bbo_auth'];
		$this->session->set_userdata('authKey', $auth);

		$data['followers'] = $resval['data']['data'];
		$data['title'] = "Semua Daftar Teman Mu | Baboo.id";
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/tether.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][]   = "public/js/custom/follow.js";
		$data['js'][] = "public/js/menupage.js";

		if ($status == 403) {
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login', 'refresh');
		} else {
//			if ($this->agent->mobile()) {
				$this->load->view('R_list_followers', $data);
//			}else{
//				redirect('profile','refresh');
//			}
		}
	}

	public function getFollowersListOther()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$id_user = $this->uri->segment(2);
        $idb = explode('-', $id_user);
        if (is_array($idb)) ;
		$sendData = array('user_id' => end($idb));

		$resval = $this->curl_request->curl_post_auth($this->API.'auth/OAuth/listFollowers', $sendData, $auth);

		$foll_list = $resval['data']['data'];
		$status = $resval['data']['code'];

		$auth = $resval['bbo_auth'];
		$this->session->set_userdata('authKey', $auth);

		$data['followers'] = $resval['data']['data'];
		$data['title'] = "Semua Daftar Teman | Baboo.id";
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/tether.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][]   = "public/js/custom/follow.js";
		$data['js'][] = "public/js/menupage.js";

		if ($status == 403) {
			$this->session->unset_userdata('userData');
			$this->session->unset_userdata('authKey');
			$this->session->sess_destroy();
			redirect('login', 'refresh');
		} else {
//			if ($this->agent->mobile()) {
				$this->load->view('R_list_followers_other', $data);
//			}else{
//				redirect('profile','refresh');
//			}
		}
	}

    public function getReportUser()
    {
        if ($this->session->userdata('isLogin') != 200) {
            redirect('login');
        }
        error_reporting(0);
        $usd = $this->session->userdata('userData');
        $auth = $this->session->userdata('authKey');
        $param = $_GET['uid'];

        if ($usd['user_id'] != 1){
            $uid = $usd['user_id'];
        }else{
            $uid = $param;
        }

        $sendData = array(
            'user_id' => $uid
        );

        $resval = $this->curl_request->curl_post_auth($this->API.'auth/OAuth/bookReportUser', $sendData, $auth);

        $code = $resval['data']['code'];
        $result = $resval['data']['data'];
        $auth = $resval['bbo_auth'];
        if (http_response_code(200) && $code !== 404){
            $this->session->set_userdata('authKey', $auth);

                $data['user_result'] = $result['user_info'];
                $data['book_result'] = $result['book_info'];
        }else{
            $this->session->sess_destroy();
            redirect('login');
        }

        $data['title'] = "Laporan Interaksi Buku Anda | Baboo.id";

        $data['css'][] = "public/plugins/datatable/datatables.min.css";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/plugins/datatable/datatables.min.js";
        $data['js'][] = "public/js/custom/notification.js";
        $data['js'][] = "public/js/custom/transaction.js";
        $data['js'][] = "public/js/custom/search.js";
        $data['js'][] = "public/js/custom/report_user.js";

        if ($this->agent->mobile()) {
            redirect('profile','refresh');
        }else{
            $this->load->view('include/head', $data);
            $this->load->view('report/D_report_user');
        }
    }
}

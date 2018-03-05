<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_message extends MX_Controller
{
	
	function __construct(){
		parent::__construct();
        $api_url = checkBase();
        $this->API = $api_url."timeline/Timelines";

		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		$data['title'] = "Pesan - Baboo";

		$data['js'][]   = "public/js/jquery.min.js";
		$data['js'][]   = "public/js/menupage.js";
		if ($this->agent->is_mobile()){

			$this->load->view('include/head', $data);
			$this->load->view('R_message', $data);
		
		}
	}
	public function listMessage(){
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $user = $this->session->userdata('userData');

        $data_message = array(
            'user_id' => $user['user_id']
        );
        // print_r($data_book);
        // print_r($data_book);

        // START GET CHAPTER
        $url = $this->API . '/listMessage/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_message);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : ' . $auth));
        $content = curl_exec($ch);
        $headers = array();

        $data = explode("\n", $content);
        $headers['status'] = $data[0];

        array_shift($data);

        foreach ($data as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }
        $data['list_message'] = json_decode(end($data), true);
        $auth = $headers['BABOO-AUTH-KEY'];

        if(!empty($auth)) $this->session->set_userdata('authKey', $auth);

        if ($data['list_message']['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {

            $data['title'] = $data['list_message']['data']['book_info']['title_book'] . " - Baboo";

            $data['detailBook'] = json_decode(end($data), true);
            $data['menuChapter'] = $data_before_chapter['chapter'];
            if ($data_before_chapter['chapter']['data']['chapter'][3]['chapter_free'] != "false") {
                $data['detailChapter'] = count($data_before_chapter['chapter']['data']['chapter']);
            } else {
                $data['detailChapter'] = 2 + 1;
            }

            $data['id_chapter'] = $this->input->get("chapter");
            $data['chapter_free'] = $data_before_chapter['chapter']['data']['chapter'][3]['chapter_free'];
            $data['css'][] = "public/css/bootstrap.min.css";
            $data['css'][] = "public/css/custom-margin-padding.css";
            $data['css'][] = "public/css/font-awesome.min.css";
            $data['css'][] = "public/css/baboo.css";
            $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";

            $data['js'][] = "public/js/jquery.min.js";
            $data['js'][] = "public/js/umd/popper.min.js";
            $data['js'][] = "public/js/bootstrap.min.js";
            $data['js'][] = "public/plugins/holdOn/js/HoldOn.js";

            $data['js'][] = "public/js/custom/reading_mode.js";
            if ($this->agent->mobile()) {
                $this->load->view('include/head', $data);
                $this->load->view('R_book', $data);
            } else {
                if ($this->input->get("chapter")) {
                    if ($data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == null || $data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == '') {
                        // print_r("kosong chapter");
                    } else {
                        $result = $this->load->view('data/D_readingmode', $data);

                    }
                } else {
                    $this->load->view('D_readingmode', $data);
                }
            }
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_cover extends MX_Controller {

	var $API = "";

	function __construct(){
		parent::__construct();
		$this->API = "api.dev-baboo.co.id/v1/book/Books";
		
		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		$data['judul'] = "Buat Sebuah Cover Untuk Buku Mu - Baboo";

		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/colorpicker/bootstrap-colorpicker.min.css";
		$data['css'][] = "public/css/sweetalert2.min.css";
		$data['css'][] = "public/plugins/holdOn/css/HoldOn.css";
		$data['css'][] = "public/css/baboo.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/html2canvas.js";
		$data['js'][] = "public/js/colorpicker/bootstrap-colorpicker.min.js";
		$data['js'][] = "public/js/sweetalert2.all.min.js";
		$data['js'][] = "public/plugins/holdOn/js/HoldOn.js";
		$data['js'][] = "public/js/custom/create_cover.js";
		$data['js'][] = "public/js/jquery.sticky-kit.min.js";

		$this->load->view('D_createcover', $data);
	}

	public function sendCover()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');

		$id = $this->input->post('user_id');
		$img = $this->input->post('cover_url');

		$file_name_with_full_path = $_FILES["cover_url"]["tmp_name"];
            if (function_exists('curl_file_create')) { // php 5.5+
            	$cFile = curl_file_create($file_name_with_full_path, $_FILES["cover_url"]["type"],$_FILES["cover_url"]["name"]);
            } else { //
            	$cFile = '@' . realpath($file_name_with_full_path);
            }

            $coverData = array(
            	'user_id' => $id,
            	'cover_url' => $cFile
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->API.'/cover');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $coverData);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data','baboo-auth-key : '.$auth));
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
            $cover = $resval['data'];
            $auth = $headers['BABOO-AUTH-KEY'];
            if (isset($resval['code']) && $resval['code'] == '200')
            {
            	$status = $resval['code'];
            	$this->session->set_userdata('authKey', $auth);
            	$this->session->set_userdata('dataCover', $cover);
            }
            else
            {
            	$status = $resval['code'];
            }
            echo json_encode(array(
            	'code' => $status,
            	'data' => $cover,
            	'message' => $psn
            ));
        }

    }
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_createpdf extends MX_Controller {
	
	function __construct()
	{
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;
		
		if ($this->session->userdata('isLogin') != 200) {
			redirect('home');
		}
	}

	public function index()
	{
		$data['title'] = "Berikan Deskripsi Mengenai Cerita Mu - Baboo";
		$data['page_desc'] = "Upload PDF mu dan Berikan Deskripsi Mengenai Cerita Mu - Baboo";
		
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";
		$data['css'][] = "public/css/sweetalert2.min.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/sweetalert2.all.min.js";
		$data['js'][] = "public/js/custom/upload_pdf_r.js";

		if ($this->agent->mobile()) {
			$this->load->view('include/head', $data);
			$this->load->view('R_precreatepdf');
		}else{
			$this->load->view('include/head', $data);
			$this->load->view('D_precreatepdf');
		}
	}

	public function uploadPDFView()
	{
		$data['title'] = "Upload Cerita Mu Dalam Bentuk PDF File - Baboo";
		$data['page_desc'] = "Upload PDF - Baboo";
		
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";
		$data['css'][] = "public/css/sweetalert2.min.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/sweetalert2.all.min.js";
		$data['js'][] = "public/js/custom/upload_pdf_r.js";

		if (!empty($this->session->userdata('idBook_'))) {
			if ($this->agent->mobile()) {
				$this->load->view('include/head', $data);
				$this->load->view('R_uploadpdf');
			}else{
				$this->load->view('include/head', $data);
				$this->load->view('D_uploadpdf');
			}
		}else{
			redirect('upload_mypdf','refresh');
		}
	}

	public function editDescPDFView()
	{
		error_reporting(0);
        $auth = $this->session->userdata('authKey');

		$data['title'] = "Berikan Deskripsi Mengenai Cerita Mu - Baboo";
		$data['page_desc'] = "Upload PDF - Baboo";
		
		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";
		$data['css'][] = "public/css/sweetalert2.min.css";

		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/sweetalert2.all.min.js";
		$data['js'][] = "public/js/custom/upload_pdf_r.js";

		$bid = $this->uri->segment(2);

		$data_book = array(
            'book_id' => $bid
        );

		$resval = $this->curl_request->curl_post_auth($this->API.'book/Books/detailEditPDF', $data_book, $auth);

		$data['desc'] = $resval['data'];
		if ($data['desc']['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        }else if (isset($data['desc']['code']) && $data['desc']['code'] == '200') {
        	$auth = $resval['bbo_auth'];
            $status = $data['desc']['code'];
            $this->session->set_userdata('authKey', $auth);
        }

		if ($this->agent->mobile()) {
			$this->load->view('include/head', $data);
			$this->load->view('R_precreatepdf_edit');
		}else{
			$this->load->view('include/head', $data);
			$this->load->view('D_precreatepdf_edit');
		}
	}

	// FUNCTION ACTION
	public function preCreatePDFPost()
	{
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $title = $this->input->post('title_book', TRUE);
        $desc = $this->input->post('desc_book', TRUE);
        $id = $this->input->post('id_book', TRUE);

        if (empty($id)) {
        	$data_book = array(
        		'title_book' => $title,
        		'descriptions' => $desc
        	);
        }else{
        	$data_book = array(
        		'book_id' => $id,
        		'title_book' => $title,
        		'descriptions' => $desc
        	);
        }

        $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/preCreateBookPDF', $data_book, $auth);

        $data = $resval['data'];
        if (isset($data['code']) && $data['code'] == '200') {
        	$auth = $resval['bbo_auth'];
            $status = $data['code'];
            $this->session->set_userdata('authKey', $auth);
            $this->session->set_userdata('idBook_', $data['data']['book_id']);
        } else {
            $status = $data['code'];
        }
        if ($data['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode(array('c' => $data['code'],'d' => $data['data']));
        }
    }
	public function checkDetailPDF()
	{
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $id = $this->input->post('id_book', TRUE);

        $data_book = array(
        	'book_id' => $id
        );

        $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/detailEditPDF', $data_book, $auth);

        $data = $resval['data'];
        if (isset($data['code']) && $data['code'] == '200') {
        	$auth = $resval['bbo_auth'];
            $status = $data['code'];
            $this->session->set_userdata('authKey', $auth);
            $this->session->set_userdata('idBook_', $data['data']['book_id']);
        } else {
            $status = $data['code'];
        }
        if ($data['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode(array('c' => $data['code'],'d' => $data['data']));
        }
    }

	public function uploadPDFPost()
	{
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $book_id = $this->input->post('id_book', TRUE);
        $pdffile = $_FILES["pdf_file"]["tmp_name"];

        if (function_exists('curl_file_create')) {
			$cFile = curl_file_create($pdffile, $_FILES["pdf_file"]["type"],$_FILES["pdf_file"]["name"]);
		} else { 
			$cFile = '@' . realpath($pdffile);
		}

		if (empty($pdffile)) {
			$data_book = array(
				'book_id' => $book_id
			);
		}else{
			$data_book = array(
				'book_id' => $book_id,
				'pdf_book' => $cFile
			);
		}

        $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/uploadPDF', $data_book, $auth);

        $data = $resval['data'];
        if (isset($data['code']) && $data['code'] == '200') {
        	$auth = $resval['bbo_auth'];
            $status = $data['code'];
            $this->session->set_userdata('authKey', $auth);
        } else {
            $status = $data['code'];
        }
        if ($data['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode(array('c' => $data['code'],'d' => $data['data']));
        }
    }

}

/* End of file C_createpdf.php */
/* Location: ./application/modules/book/controllers/C_createpdf.php */
<?php
/**
 * Created by PhpStorm.
 *  * User: Aditia@Baboo.id
 * Date: 13/09/2018
 * Time: 11.14
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class C_createepub extends MX_Controller {

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
        $data['page_desc'] = "Upload ePUB mu dan Berikan Deskripsi Mengenai Cerita Mu - Baboo";

        $data['css'][] = "public/css/sweetalert2.min.css";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/sweetalert2.all.min.js";
        $data['js'][] = "public/js/custom/upload_pdf_r.js";

        if ($this->agent->mobile()) {
            $this->load->view('include/head', $data);
            $this->load->view('ePub/R_precreateepub');
        }else{
            $this->load->view('include/head', $data);
            $this->load->view('ePub/D_precreateepub');
        }
    }

    public function uploadEPUBView()
    {
        $data['title'] = "Upload Cerita Mu Dalam Bentuk PDF File - Baboo";
        $data['page_desc'] = "Upload PDF - Baboo";

        $data['css'][] = "public/css/bootstrap.min.css";
        $data['css'][] = "public/css/custom-margin-padding.css";
        $data['css'][] = "public/css/font-awesome.min.css";
        $data['css'][] = "public/css/baboo-responsive.css";
        $data['css'][] = "public/css/sweetalert2.min.css";
        $data['css'][] = "public/plugins/epub/epub-style.css";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/js/sweetalert2.all.min.js";
        $data['js'][] = "public/plugins/epub/polyfills/babel-polyfill.min.js";
        $data['js'][] = "public/plugins/epub/polyfills/fetch.js";
        $data['js'][] = "public/plugins/epub/polyfills/pep.min.js";
        $data['js'][] = "public/plugins/epub/libs/sanitize-html.min.js";
        $data['js'][] = "public/plugins/epub/libs/jszip.min.js";
        $data['js'][] = "public/plugins/epub/libs/epub.js";
        $data['js'][] = "public/plugins/epub/script.js";
        $data['js'][] = "public/js/custom/upload_pdf_r.js";

        if (!empty($this->session->userdata('idBook_'))) {
            if ($this->agent->mobile()) {
                $this->load->view('include/head', $data);
                $this->load->view('ePub/R_uploadepub');
            }else{
                $this->load->view('include/head', $data);
                $this->load->view('ePub/D_uploadepub');
            }
        }else{
            redirect('upload_myepub','refresh');
        }
    }

    public function editDescEPUBView()
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
            $this->load->view('ePub/R_precreateepub_edit');
        }else{
            $this->load->view('include/head', $data);
            $this->load->view('ePub/D_precreateepub_edit');
        }
    }
}

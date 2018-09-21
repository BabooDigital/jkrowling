<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_category extends MX_Controller
{

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $api_url = checkBase();

        $this->API = $api_url;
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        if ($this->agent->mobile()) {
            $this->load->view('include/head', $data);
            $this->load->view('R_book');
        }else{
            $this->load->view('include/head', $data);
            $this->load->view('D_category');
        }
    }

    public function categoryContent()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $cat = $this->uri->segment(2);
        $subcat = $this->uri->segment(3);
        if (empty($subcat)){
            $category = $cat;
        }else{
            $category = $subcat;
        }

        if (!empty($this->input->get("page"))) {
            $id = $this->input->get("page");
        }else{
            $id = "";
        }

        $data_book = array(
            'category' => strtolower($category),
            'count' => $id
        );

        $resval = $this->curl_request->curl_post_auth($this->API.'category/Categories/byCategory', $data_book, $auth);

        $auth = $resval['bbo_auth'];
        $this->session->set_userdata('authKey', $auth);
        $status = $resval['data']['code'];

        $data['title'] = 'Daftar Buku Kategori - '.ucwords(str_replace("-"," ",$cat));
        $data['list_content'] = $resval['data']['data']['timeline'];

        $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/plugins/holdOn/js/HoldOn.js";
        $data['js'][] = "public/js/custom/R_search.js";
        $data['js'][] = "public/js/custom/follow.js";
        $data['js'][] = "public/js/custom/category_page.js";
        $data['js'][] = "public/js/menupage.js";

        if ($status == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
//            if ($this->agent->mobile()) {
//                $this->load->view('include/head', $data);
//                $this->load->view('R_book');
//            }else{
                if (!empty($this->input->get("page"))) {
                    $this->load->view('data/D_category_content', $data);
                }else{
                    $this->load->view('include/head', $data);
                    $this->load->view('D_category_content');
                }
//            }
        }
    }

    public function postCategoryName()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $cat = $this->input->post('category', TRUE);

        $catData = array(
          'category' => $cat
        );

        $resval = $this->curl_request->curl_post_auth($this->API.'category/Categories/byCategory', $catData, $auth);

        $auth = $resval['bbo_auth'];
        $status = $resval['data']['code'];
        $bookdata = $resval['data']['data'];

        $this->session->set_userdata('authKey', $auth);
        if ($status == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            $data = array(
              'c' => $status,
                'd' => $bookdata['timeline']
            );
            echo json_encode($data);
        }
    }
}

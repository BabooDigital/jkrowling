<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Event extends MX_Controller
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
        $data['title'] = "Event Page | Baboo - Beyond Book & Creativity";
        $data['css'][] = "public/css/custom-margin-padding.css";

        $data['js'][] = "public/js/jquery.min.js";
        // $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/js/custom/event.js";

        $this->load->view('include/head', $data);
        $this->load->view('D_event', $data);
    }
}
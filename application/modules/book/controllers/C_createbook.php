<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_createbook extends MX_Controller {

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
		$data['judul'] = "Buat Sebuah Cerita - Baboo";

		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo.css";
		 	
		$data['js'][] = "public/js/jquery.min.js";
		$data['js'][] = "public/js/umd/popper.min.js";
		$data['js'][] = "public/js/bootstrap.min.js";
		$data['js'][] = "public/js/jquery.sticky-kit.min.js";
		$data['js'][] = "public/plugins/ckeditor/ckeditor.js";
		$data['js'][] = "public/plugins/ckfinder/ckfinder.js";
		$data['js'][] = "public/js/custom/create_book.js";

		$this->load->view('D_createbook', $data);
	}

	public function createbook_id()
	{
		$user = $this->input->post('id_user');

		$book = array('author_id' => $user );
		$query = $this->db->insert('book', $book);

		$id = $this->db->insert_id();
		$q = $this->db->get_where('book', array('book_id' => $id));
		foreach ($q->result() as $row){
			$redirect =  $row->id;
			header('Location:create_book/' . $id);
			}	
	}

	public function save()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');

        $title = $this->input->post('title_book');
        $chapter = $this->input->post('title_book');
        if (!empty($this->input->post('chapter_title'))) {
        	$chapter = $this->input->post('chapter_title');  	
        }
        $cover = $this->input->post('file_cover');
        $cat = $this->input->post('category');
        $user = $this->input->post('user_id');
        $parap = $this->input->post('paragraph');

        $bookData = array(
            'title_book' => $title, 
            'file_cover' => $cover, 
            'category' => $cat, 
            'user_id' => $user, 
            'chapter_title' => $chapter, 
            'paragraph' => $parap
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'/newbooks');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $bookData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
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
        $user = $resval['data'];
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($resval['code']) && $resval['code'] == '200')
        {
            $status = $resval['code'];
           	$this->session->set_userdata('authKey', $auth);
           	$this->session->set_userdata('dataBook', $user);
        }
        else
        {
            $status = $resval['code'];
        }
        echo json_encode(array(
            'code' => $status,
            'data' => $user,
            'message' => $psn
        ));
	}

	public function createchapter_id()
	{
		$book = $this->input->post('id_book');
		$title = $this->input->post('title_book');
		$desc = $this->input->post('description');

		$chapter = array('id_book' => $book );
		$query = $this->db->insert('chapter', $chapter);

		// $id = $this->db->insert_id();
		// $q = $this->db->get_where('chapter', array('chapter_id' => $id));
		// foreach ($q->result() as $row){
		// 	$redirect =  $row->id;
		// 	header('Location:create_book/' .$book.'/chapters/'.$id);
		// 	}	
		echo json_encode($this->input->post());
	}

	public function awasd()
	{
		$post = $this->input->post('paragraph');
		echo $post;

	}

}
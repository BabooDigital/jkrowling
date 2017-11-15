<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_createbook extends MX_Controller {
	function __construct(){
		parent::__construct();
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
		echo json_encode($this->input->post());
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
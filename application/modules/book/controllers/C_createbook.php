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
		$data['css'][] = "public/css/baboo-responsive.css";
		$data['css'][] = "public/css/baboo.css";
		$data['css'][] = "public/plugins/holdOn/css/HoldOn.css";
		$data['css'][] = "public/plugins/wysiwyg/src/bootstrap-wysihtml5.css";

		$data['js'][] = "public/plugins/wysiwyg/lib/js/wysihtml5-0.3.0.js";
		$data['js'][] = "public/js/jquery.min.js";
		
		$data['css'][] = "public/plugins/froala/css/froala_editor.css";
		$data['css'][] = "public/plugins/froala/css/froala_style.css";
		$data['css'][] = "public/plugins/froala/css/plugins/code_view.css";
		$data['css'][] = "public/plugins/froala/css/plugins/colors.css";
		// $data['css'][] = "public/plugins/froala/css/plugins/emoticons.css";
		$data['css'][] = "public/plugins/froala/css/plugins/image_manager.css";
		$data['css'][] = "public/plugins/froala/css/plugins/image.css";
		$data['css'][] = "public/plugins/froala/css/plugins/line_breaker.css";
		$data['css'][] = "public/plugins/froala/css/plugins/table.css";
		$data['css'][] = "public/plugins/froala/css/plugins/char_counter.css";
		$data['css'][] = "public/plugins/froala/css/plugins/video.css";
		$data['css'][] = "public/plugins/froala/css/plugins/fullscreen.css";
		// $data['css'][] = "public/plugins/froala/css/plugins/file.css";
		$data['css'][] = "public/plugins/froala/css/plugins/quick_insert.css";


		$data['js'][] = "public/plugins/froala/js/froala_editor.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/align.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/char_counter.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/code_beautifier.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/code_view.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/colors.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/draggable.min.js";
		// $data['js'][] = "public/plugins/froala/js/plugins/emoticons.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/entities.min.js";
		// $data['js'][] = "public/plugins/froala/js/plugins/file.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/font_size.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/font_family.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/fullscreen.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/image.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/image_manager.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/line_breaker.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/inline_style.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/link.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/lists.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/paragraph_format.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/paragraph_style.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/quick_insert.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/quote.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/table.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/save.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/url.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/video.min.js";
		$data['js'][] = "public/js/custom/create_book_r.js";

		if ($this->agent->mobile()) {

			$this->load->view('include/head', $data);
			$this->load->view('R_createbook');
		}
		else{
			$data['js'][] = "public/js/umd/popper.min.js";
			$data['js'][] = "public/js/bootstrap.min.js";
			$data['js'][] = "public/js/jquery.sticky-kit.min.js";
			$data['js'][] = "public/js/custom/create_book.js";

			
			$data['js'][] = "public/js/custom/edit_book.js";

			// $data['js'][] = "public/js/menupage.js";


			$data['js'][] = "public/plugins/holdOn/js/HoldOn.js";

			$data['css'][] = "public/css/baboo.css";
			$this->load->view('D_createbook', $data);
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
        $book_id = $this->input->post('id_books');
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
		if (!empty($this->input->post('id_books'))) {
        	$bookData['book_id'] = $this->input->post('id_books');
        }
        	// print_r($bookData);
        
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
            'message' => $psn,
            'book' =>$this->input->post('id_books')
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
	public function mybook()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$id_book = $this->uri->segment(2);
		$id_chapter = $this->uri->segment(4);

        $url = $this->API.'/detailBook/book_id/'.$id_book.'/chapter/'.$id_chapter;
        $ch = curl_init();
        $options = array(
        	  CURLOPT_URL			 => $url,
        	  CURLOPT_RETURNTRANSFER => true,
        	  CURLOPT_FOLLOWLOCATION => true,
	          CURLOPT_CUSTOMREQUEST  =>"GET",    // Atur type request
	          CURLOPT_POST           =>false,    // Atur menjadi GET
	          CURLOPT_FOLLOWLOCATION => true,    // Follow redirect aktif
	          CURLOPT_SSL_VERIFYPEER => 0,
	          CURLOPT_HEADER         => 1,
	          CURLOPT_HTTPHEADER	 => array('baboo-auth-key : '.$auth)

        );
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        $headers=array();
        
        $data=explode("\n",$content);
        $headers['status']=$data[0];

		array_shift($data);

		foreach($data as $part){
		    $middle=explode(":",$part);
		    $headers[trim($middle[0])] = trim($middle[1]);
		}
		// $headers['BABOO-AUTH-KEY']

        $data['detail_book'] = json_decode($data[14], true);
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200')
        {
            $status = $data['detail_book']['code'];
           	$this->session->set_userdata('authKey', $auth);
           	$this->session->set_userdata('dataBook', $user);
        }
        else
        {
            $status = $data['detail_book']['code'];
        }
		$data['judul'] = "Buat Sebuah Cerita - Baboo";

		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";
		$data['css'][] = "public/css/baboo.css";
		$data['css'][] = "public/plugins/holdOn/css/HoldOn.css";
		 	
		$data['js'][] = "public/js/jquery.min.js";

		$data['css'][] = "public/plugins/froala/css/froala_editor.css";
		$data['css'][] = "public/plugins/froala/css/froala_style.css";
		$data['css'][] = "public/plugins/froala/css/plugins/code_view.css";
		$data['css'][] = "public/plugins/froala/css/plugins/colors.css";
		$data['css'][] = "public/plugins/froala/css/plugins/emoticons.css";
		$data['css'][] = "public/plugins/froala/css/plugins/image_manager.css";
		$data['css'][] = "public/plugins/froala/css/plugins/image.css";
		$data['css'][] = "public/plugins/froala/css/plugins/line_breaker.css";
		$data['css'][] = "public/plugins/froala/css/plugins/table.css";
		$data['css'][] = "public/plugins/froala/css/plugins/char_counter.css";
		$data['css'][] = "public/plugins/froala/css/plugins/video.css";
		$data['css'][] = "public/plugins/froala/css/plugins/fullscreen.css";
		$data['css'][] = "public/plugins/froala/css/plugins/file.css";
		$data['css'][] = "public/plugins/froala/css/plugins/quick_insert.css";


		$data['js'][] = "public/plugins/froala/js/froala_editor.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/align.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/char_counter.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/code_beautifier.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/code_view.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/colors.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/draggable.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/emoticons.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/entities.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/file.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/font_size.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/font_family.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/fullscreen.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/image.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/image_manager.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/line_breaker.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/inline_style.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/link.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/lists.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/paragraph_format.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/paragraph_style.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/quick_insert.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/quote.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/table.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/save.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/url.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/video.min.js";

		$data['js'][] = "public/js/custom/create_book_r.js";
		if ($this->agent->mobile()) {
			$this->load->view('include/head', $data);
			$this->load->view('R_createbook');
		}
		else{
			$data['js'][] = "public/js/umd/popper.min.js";
			$data['js'][] = "public/js/bootstrap.min.js";
			$data['js'][] = "public/js/jquery.sticky-kit.min.js";
			$data['js'][] = "public/js/custom/create_book.js";

			$data['js'][] = "public/js/custom/edit_book.js";

			// $data['js'][] = "public/js/menupage.js";


			$data['js'][] = "public/plugins/holdOn/js/HoldOn.js";

			$data['css'][] = "public/css/baboo.css";
			$this->load->view('D_editbook', $data);
		}
	}
	public function editor_upload()
	{
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
		$_PATH_UPLOAD = "public/file_upload/baboo-editor/";
		$_PATH_UPLOAD_FOR_VIEW = "public/file_upload/baboo-editor/";
		$_IMAGES = array();
		if($_FILES) {
			$fileName = "uploaded-file-".time()."-".rand().".".pathinfo($_FILES["image1"]["name"], PATHINFO_EXTENSION);
			$fileTmpLoc = $_FILES["image1"]["tmp_name"];
			$fileType = $_FILES["image1"]["type"];
			$fileSize = $_FILES["image1"]["size"];
			$fileErrorMsg = $_FILES["image1"]["error"];
			
			if (!$fileTmpLoc) {
				die("error");
			}
			if(move_uploaded_file($fileTmpLoc, $_PATH_UPLOAD."$fileName")) {
				$_IMAGES["path"] = $_PATH_UPLOAD_FOR_VIEW.$fileName;
				$_IMAGES["name"] = $_FILES["image1"]["name"];
				die(json_encode($_IMAGES));
			} else  {
				die("failed");
			}
		}
	}
}
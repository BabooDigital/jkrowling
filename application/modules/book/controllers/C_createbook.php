<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_createbook extends MX_Controller {

	var $API = "";

	function __construct(){
		parent::__construct();

		$api_url = checkBase();

		$this->API = $api_url."book/Books";

		$this->API_EXT = $api_url;

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

		$data['js'][] = "public/js/jquery.validate.js";
		$data['js'][] = "public/plugins/froala/js/froala_editor.min.js";
		$data['js'][] = "public/js/custom/create_book_r.js";

		if ($this->agent->mobile()) {
			$data['js'][] = "public/plugins/froala/js/plugins/align.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/char_counter.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/colors.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/draggable.min.js";
		// $data['js'][] = "public/plugins/froala/js/plugins/emoticons.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/entities.min.js";
		// $data['js'][] = "public/plugins/froala/js/plugins/file.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/font_size.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/fullscreen.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/image.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/image_manager.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/line_breaker.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/inline_style.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/paragraph_format.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/paragraph_style.min.js";
			// $data['js'][] = "public/plugins/froala/js/plugins/save.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/url.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/video.min.js";
			$this->load->view('include/head', $data);
			$this->load->view('R_precreatebook');
		}
		else{
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

			$data['js'][] = "public/js/umd/popper.min.js";
			$data['js'][] = "public/js/bootstrap.min.js";
			$data['js'][] = "public/js/jquery.sticky-kit.min.js";
			$data['js'][] = "public/js/custom/create_book.js";

			
			// $data['js'][] = "public/js/custom/edit_book.js";

			// $data['js'][] = "public/js/menupage.js";


			$data['js'][] = "public/plugins/holdOn/js/HoldOn.js";

			$data['css'][] = "public/css/baboo.css";
			$this->load->view('D_createbook', $data);
		}
	}
	public function chapter()
	{
		if ($this->input->post('book_id')) {
			
		}else{
			$auth = $this->session->userdata('authKey');
			$title_book = $this->input->post('title_book');
			$id_user = $this->session->userdata('userData')['user_id'];

			$chapterData = array(
				'user_id' => $id_user,
				'title_book' => $title_book
			);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this->API.'/preCreateBook');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $chapterData);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
			$result = curl_exec($ch);

			$headers=array();

			$data=explode("\n",$result);


			array_shift($data);

			foreach($data as $part){
				$middle=explode(":",$part);
				error_reporting(0);
				$headers[trim($middle[0])] = trim($middle[1]);
			}
			$resval = (array)json_decode(end($data));
			$book_id = (array)$resval['data'];
			$auth = $headers['BABOO-AUTH-KEY'];
			if (isset($resval['code']) && $resval['code'] == '200')
			{
				$status = $resval['code'];
				$this->session->set_userdata('title_book', $title_book);
				$this->session->set_userdata('authKey', $auth);
				$this->session->set_userdata('idBook_', $book_id);
				$this->session->set_userdata('dataBook', $user);
			}
			else
			{
				$status = $resval['code'];
			}
		}
		
		$data['title'] = "Buat Sebuah Cerita - Baboo";

		$data['css'][] = "public/css/bootstrap.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/css/font-awesome.min.css";
		$data['css'][] = "public/css/baboo-responsive.css";
		$data['css'][] = "public/css/baboo.css";
		$data['css'][] = "public/css/sweetalert2.min.css";
		$data['css'][] = "public/css/custom-margin-padding.css";
		$data['css'][] = "public/plugins/holdOn/css/HoldOn.css";
		$data['css'][] = "public/plugins/wysiwyg/src/bootstrap-wysihtml5.css";

		$data['js'][] = "public/plugins/wysiwyg/lib/js/wysihtml5-0.3.0.js";
		$data['js'][] = "public/js/jquery.min.js";
		
		$data['css'][] = "public/plugins/froala/css/froala_editor.css";
		$data['css'][] = "public/plugins/froala/css/froala_style.css";
		$data['css'][] = "public/plugins/froala/css/plugins/code_view.css";
		$data['css'][] = "public/plugins/froala/css/plugins/colors.css";
		$data['css'][] = "public/plugins/froala/css/plugins/image_manager.css";
		$data['css'][] = "public/plugins/froala/css/plugins/image.css";
		$data['css'][] = "public/plugins/froala/css/plugins/line_breaker.css";
		$data['css'][] = "public/plugins/froala/css/plugins/table.css";
		$data['css'][] = "public/plugins/froala/css/plugins/char_counter.css";
		$data['css'][] = "public/plugins/froala/css/plugins/video.css";
		$data['css'][] = "public/plugins/froala/css/plugins/fullscreen.css";
		$data['css'][] = "public/plugins/froala/css/plugins/quick_insert.css";


		$data['js'][] = "public/plugins/froala/js/froala_editor.min.js";
		$data['js'][] = "public/js/sweetalert2.all.min.js";
		$data['js'][] = "public/js/custom/create_book_r.js";

		$data['js'][] = "public/plugins/froala/js/plugins/align.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/char_counter.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/colors.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/draggable.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/entities.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/font_size.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/fullscreen.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/image.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/image_manager.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/line_breaker.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/inline_style.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/paragraph_format.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/paragraph_style.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/url.min.js";
		$data['js'][] = "public/plugins/froala/js/plugins/video.min.js";
		if ($this->input->post('book_id')) {
			$data['book_id'] = $this->input->post('book_id');
		}else{
			$data['book_id'] = $book_id['book_id'];
		}
		$this->load->view('include/head', $data);
		$this->load->view('R_chapter');
	}

	public function saveChapter()
	 {
	 	$auth = $this->session->userdata('authKey');
		$id_user = $this->session->userdata('userData')['user_id'];

	 	$book_id = $this->input->post('book_id');
		$chapter_title = $this->input->post('chapter_title');
		$paragraph = $this->input->post('paragraph_book');

		$chapterData = array(
			'book_id' => $book_id,
			'chapter_title' => $chapter_title,
			'paragraph' => $paragraph
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/saveChapter');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $chapterData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
		$result = curl_exec($ch);

		$headers=array();

		$data=explode("\n",$result);


		array_shift($data);

		foreach($data as $part){
			$middle=explode(":",$part);
        	error_reporting(0);
			$headers[trim($middle[0])] = trim($middle[1]);
		}
		$resval = (array)json_decode(end($data));
		$book_id = (array)$resval['data'];
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
		// if ($resval['code'] == 200) {
			echo json_encode($resval);
		// }
	 } 
	 public function listChapter()
	 {
	 	$auth = $this->session->userdata('authKey');
		$id_user = $this->session->userdata('userData')['user_id'];
		$book_id = $this->uri->segment(2);

		$chapterData = array(
			'book_id' => $book_id,
			'user_id' => $id_user
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/allChapters');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $chapterData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
		$result = curl_exec($ch);

		$headers=array();

		$data=explode("\n",$result);

		array_shift($data);

		foreach($data as $part){
			$middle=explode(":",$part);
        	error_reporting(0);
			$headers[trim($middle[0])] = trim($middle[1]);
		}
		$resval = (array)json_decode(end($data), true);
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

		$data['title'] = 'Daftar chapter buku mu | Baboo Beyond Book &amp; Creativity';
		$data['list_chapter'] = $resval['data'];
		$data['book_id'] = $book_id;
		$data['title_book'] = $this->session->userdata('title_book');
		$this->load->view('include/head', $data);
		$this->load->view('R_list_chapter');
	 }
	public function cover_v()
	{
		$data['title'] = "Buat Sebuah Cerita - Baboo";

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
			$data['css'][] = "public/plugins/froala/css/plugins/image_manager.css";
			$data['css'][] = "public/plugins/froala/css/plugins/image.css";
			$data['css'][] = "public/plugins/froala/css/plugins/line_breaker.css";
			$data['css'][] = "public/plugins/froala/css/plugins/table.css";
			$data['css'][] = "public/plugins/froala/css/plugins/char_counter.css";
			$data['css'][] = "public/plugins/froala/css/plugins/video.css";
			$data['css'][] = "public/plugins/froala/css/plugins/fullscreen.css";
			$data['css'][] = "public/plugins/froala/css/plugins/quick_insert.css";


			$data['js'][] = "public/plugins/froala/js/froala_editor.min.js";
			$data['js'][] = "public/js/custom/create_book_r.js";

			$data['js'][] = "public/plugins/froala/js/plugins/align.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/char_counter.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/colors.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/draggable.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/entities.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/font_size.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/fullscreen.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/image.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/image_manager.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/line_breaker.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/inline_style.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/paragraph_format.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/paragraph_style.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/url.min.js";
			$data['js'][] = "public/plugins/froala/js/plugins/video.min.js";

			$data['book_id'] = $this->uri->segment(2);
			$this->load->view('include/head', $data);
			$this->load->view('R_cover');
	}
	public function cover()
	{
		$auth = $this->session->userdata('authKey');
		$id_user = $this->session->userdata('userData')['user_id'];

		$book_id = $this->input->post('book_id');
		$chapter_title = $this->input->post('chapter_title');
		$paragraph = $this->input->post('paragraph');
		$chapterData = array(
			'book_id' => $book_id,
			'chapter_title' => $chapter_title,
			'paragraph' => $paragraph
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/saveChapter');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $chapterData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
		$result = curl_exec($ch);

		$headers=array();

		$data=explode("\n",$result);


		array_shift($data);

		foreach($data as $part){
			$middle=explode(":",$part);
        	error_reporting(0);
			$headers[trim($middle[0])] = trim($middle[1]);
		}
		$resval = (array)json_decode(end($data));
		$book_id = (array)$resval['data'];
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
		if ($resval['code'] == 200) {
			echo json_encode($resval);
		}
	}
	public function img_book()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$id_book = $this->session->userdata('idBook_');
		
		if(isset($_FILES["file"]["tmp_name"]))  
		{  
			$config['upload_path'] = './uploads';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('file'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();  
				$config['image_library'] = 'gd2';  
				$config['source_image'] = './uploads/'.$data["file_name"];  
				$config['create_thumb'] = FALSE;  
				$config['maintain_ratio'] = FALSE;  
				$config['quality'] = '75%';  
				$config['width'] = 640;  
				$config['height'] = 480;  
				$config['new_image'] = './uploads/'.$data["file_name"];  
				$this->load->library('image_lib', $config);  
				$this->image_lib->resize();    
				$image_data = array(  
					'name'          =>     $data["file_name"]  
				);
				if (function_exists('curl_file_create')) {
	        		$cFile = curl_file_create($data['full_path'], $data["file_type"],$data["file_name"]);
		        } else { 
		        	$cFile = '@' . realpath($data['full_path']);
		        }
		        $url = $this->API.'/uploadImage';
		        $data = array(
		        	'is_cover'	=> 'false',
		        	'image_url' => $cFile,
		        	'book_id'	=> $id_book
		        );
		        $ch = curl_init();
		        curl_setopt($ch, CURLOPT_URL, $this->API.'/uploadImage');
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		        curl_setopt($ch, CURLOPT_POST, 1);
		        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
		        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		        curl_setopt($ch, CURLOPT_HEADER, 1);
		        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data','baboo-auth-key : '.$auth));
		        $result = curl_exec($ch);

		        $headers=array();

		        $data=explode("\n",$result);
		        
		        array_shift($data);

		        foreach($data as $part){
		        	$middle=explode(":",$part);
		        	error_reporting(0);
		        	$headers[trim($middle[0])] = trim($middle[1]);
		        }
		        $resval = (array)json_decode(end($data), true);

		        $psn = $resval['message'];
		        $data_img = $resval['data']['asset_url'];
		        $auth = $headers['BABOO-AUTH-KEY'];
		        $this->session->set_userdata('authKey', $auth);
				if (unlink($cFile->name))
				{
					echo json_encode(array("link"=>$data_img,"name"=>$data_img));  
				}
			}  
        }
	}
	public function video_book()
	{
		$auth = $this->session->userdata('authKey');
		$id_book = $this->session->userdata('idBook_');
		
		$file_name_with_full_path = $_FILES["file"]["tmp_name"];
        if (function_exists('curl_file_create')) { // php 5.5+
        	$cFile = curl_file_create($file_name_with_full_path, $_FILES["file"]["type"],$_FILES["file"]["name"]);
        } else { //
        	$cFile = '@' . realpath($file_name_with_full_path);
        }

		$url = $this->API.'/uploadVideo';
        $data = array(
        	'video_url' => $cFile,
        	'book_id'	=> $id_book
        );
        // print_r($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'/uploadVideo');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data','baboo-auth-key : '.$auth));
        $result = curl_exec($ch);

        $headers=array();

        $data=explode("\n",$result);
        
        array_shift($data);

        foreach($data as $part){
        	$middle=explode(":",$part);
        	error_reporting(0);
        	$headers[trim($middle[0])] = trim($middle[1]);
        }
        // print_r($headers);
        $resval = (array)json_decode(end($data), true);

        $psn = $resval['message'];
        $data_video = $resval['data']['asset_url'];
        $auth = $headers['BABOO-AUTH-KEY'];
        $this->session->set_userdata('authKey', $auth);
		echo json_encode(array("link"=>$data_video,"name"=>$data_video));
	}
	public function save()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$bData = $this->session->userdata('dataBook');

		$title = $this->input->post('title_book');
		$chapter = $this->input->post('chapter_title');
		if (!empty($bData)) {
			$chapter = $this->input->post('chapter_title');
			$title = $bData['title_book']; 	
		}
		$cover = $this->input->post('cover_name');
		if ($cover != null) {
			$covers = $cover;
		}else{
			$covers = null;
		}
		$book_id = $this->input->post('book_id');
		$cat = $this->input->post('category_id');
		$user = $this->input->post('user_id');
		$parap = $this->input->post('book_paragraph');
		$output = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $parap);
		$bookData = array(
			'book_id' => $book_id,
			'title_book' => $title, 
			'file_cover' => $covers, 
			'category' => $cat, 
			'status_publish' => 'draft',
			'user_id' => $user, 
			'chapter_title' => $chapter, 
			'paragraph' => $output
		);
		if (!empty($this->input->post('id_books'))) {
			$bookData['book_id'] = $this->input->post('id_books');
		}
		// print_r($bookData);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/saveBook');
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


		$resval = (array)json_decode(end($data), true);

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
		// print_r($bookData);
		echo json_encode(array(
			'code' => $status,
			'data' => $user,
			'message' => $psn,
			'book' => $this->input->post('id_books'),
			'send' => $bookData
		));
	}
	public function updateChapter()
	{
		error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$bData = $this->session->userdata('dataBook');

		$title = $this->input->post('title_book');
		$chapter = $this->input->post('title_chapter');
		if (!empty($bData)) {
			$chapter = $this->input->post('title_chapter');
			$title = $bData['title_book']; 	
		}
		$cover = $this->input->post('cover_name');
		if ($cover != null) {
			$covers = $cover;
		}else{
			$covers = "";
		}
		$book_id = $this->input->post('book_id');
		$cat = $this->input->post('category_id');
		$user = $this->input->post('user_id');
		$parap = $this->input->post('book_paragraph');
		$chapter_id = $this->input->post('chapter_id');
		$bookData = array(
			'book_id' => $book_id,
			'title_book' => $title, 
			'file_cover' => $covers, 
			'category' => $cat, 
			'status_publish' => 'draft',
			'user_id' => $user, 
			'chapter_title' => $chapter, 
			'paragraph' => $parap,
			'chapter_id' => $chapter_id
		);
		if (!empty($this->input->post('id_books'))) {
			$bookData['book_id'] = $this->input->post('id_books');
		}
		// print_r($bookData);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/saveBook');
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


		$resval = (array)json_decode(end($data), true);

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
			'book' => $this->input->post('id_books'),
			'send' => $bookData
		));
	}
	public function publishBook()
	{
		error_reporting(0);
		$auths = $this->session->userdata('authKey');
		$bData = $this->session->userdata('dataBook');

		$title = $this->input->post('title_book');
		// $chapter = $this->input->post('chapter_title');
		if (!empty($bData)) {
			$chapter = $this->input->post('title_chapter');
			$title = $bData['title_book']; 	
		}else{
			$chapter = $this->input->post('title_chapter');
		}
		$book_id = $this->input->post('book_id');
		$cat = $this->input->post('category_id');
		$user = $this->input->post('user_id');
		$parap = $this->input->post('book_paragraph');
		$cover = $this->input->post('cover_name');
		if ($_FILES['file_cover']['size'] != 0 || $cover != null) {
			$covers = $cover;
			$file_name_with_full_path = $_FILES["file_cover"]["tmp_name"];
	        if (function_exists('curl_file_create')) { // php 5.5+
	        	$cFile = curl_file_create($file_name_with_full_path, $_FILES["file_cover"]["type"],$_FILES["file_cover"]["name"]);
	        } else { //
	        	$cFile = '@' . realpath($file_name_with_full_path);
	        }
	        $id = $this->input->post('book_id');
	        $coverData = array(
	        	'book_id' => $id,
	        	'is_cover' => 'true',
	        	'image_url' => $cFile
	        );

	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, $this->API.'/uploadImage');
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	        curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $coverData);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	        curl_setopt($ch, CURLOPT_HEADER, 1);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data','baboo-auth-key : '.$auths));
	        $result = curl_exec($ch);

	        $headers=array();

	        $data=explode("\n",$result);


	        // print_r($data);
	        array_shift($data);

	        foreach($data as $part){
	        	$middle=explode(":",$part);

	        	if (error_reporting() == 0) {
	        		$headers[trim($middle[0])] = trim($middle[1]);
	        	}
	        }

	        $resval = (array)json_decode(end($data), true);
	        $psn = $resval['message'];
	        $covers = $resval['data']['asset_url'];
	        $auth = $headers['BABOO-AUTH-KEY'];
	    	$status = $resval['code'];
	    	$this->session->set_userdata('authKey', $auths);
	        $this->session->set_userdata('dataCover', $covers);
		}else{
			$covers = "";
        }
        // print_r($bookData) ;
        $bookData = array(
        	'book_id' => $book_id,
        	'title_book' => $title, 
        	'file_cover' => $covers, 
        	'category' => $cat, 
        	'status_publish' => 'publish',
        	'user_id' => $user, 
        	'chapter_title' => $chapter, 
        	'paragraph' => $parap
        );
        if (!empty($this->input->post('id_books'))) {
        	$bookData['book_id'] = $this->input->post('id_books');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->API.'/saveBook');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $bookData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auths));
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


        $resval = (array)json_decode(end($data), true);

        $psn = $resval['message'];
        $user = $resval['data'];
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($resval['code']) && $resval['code'] == '200')
        {
	    	$status = $resval['code'];
	    	$this->session->set_userdata('authKey', $auths);
	    	$this->session->set_userdata('dataBook', $user);
	    	$this->session->unset_userdata('dataCover');
	    	$this->session->unset_userdata('dataBook');
    		redirect('timeline','refresh');
        }
        else
        {
        	$status = $resval['code'];
        }
        // print_r($bookData);
    }
    public function publishBookMr()
    {
    	$auth = $this->session->userdata('authKey');
		$id_user = $this->session->userdata('userData')['user_id'];

		$book_id = $this->input->post('book_id');
		$file_cover = $this->input->post('file_cover');
		$category = $this->input->post('category');
		$bookData = array(
			'book_id' => $book_id,
			'file_cover' => $file_cover,
			'category' => $category
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/savePublish');
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
        	error_reporting(0);
			$headers[trim($middle[0])] = trim($middle[1]);
		}
		$resval = (array)json_decode(end($data));
		$book_id = (array)$resval['data'];
		$auth = $headers['BABOO-AUTH-KEY'];
		if (isset($resval['code']) && $resval['code'] == '200')
		{
			$status = $resval['code'];
			$this->session->set_userdata('authKey', $auth);
			$this->session->set_userdata('dataBook', $user);
			$this->session->unset_userdata('dataCover');
		}
		else
		{
			$status = $resval['code'];
		}
		if ($resval['code'] == 200) {
			echo json_encode($resval);
		}
		// print_r($resval);
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
    	
		$id_user = $this->session->userdata('userData')['user_id'];

    	$id_book = $this->uri->segment(2);
    	$id_chapter = $this->uri->segment(4);
    	$bookData = array(
    		"book_id" => $id_book,
    		"chapter" => $id_chapter);

    	$data_book = array(
			'book_id' => $id_book,
			'user_id' => $id_user
		);
		// print_r($data_book);

		// START GET CHAPTER
		$url = $this->API.'/allChapters/';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
		$content = curl_exec($ch);
		curl_close($ch);
		$headers=array();
		$data_before_chapter=explode("\n",$content);
		$headers['status']=$data_before_chapter[0];

		array_shift($data_before_chapter);

		foreach($data_before_chapter as $part){
			$middle=explode(":",$part);
			$headers[trim($middle[0])] = trim($middle[1]);
		}

		$auth = $headers['BABOO-AUTH-KEY'];
		if (isset($data['detail_chapter']['code']) && $data['detail_chapter']['code'] == '200')
		{
			$status = $data['detail_chapter']['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $data['detail_chapter']['code'];
		}

    	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->API.'/detailBook');
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
    		$headers[trim($middle[0])] = trim($middle[1]);
    	}
		// $headers['BABOO-AUTH-KEY']

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

    	$data['detail_book'] = json_decode(end($data), true);
    	$data['title'] = "Buat Sebuah Cerita - Baboo";
		$data['detail_chapter'] = json_decode(end($data_before_chapter), true);
    	// print_r($data['detail_book']);

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
    		// $data['js'][] = "public/js/custom/create_book.js";

    		$data['js'][] = "public/js/custom/edit_book.js";

    		$data['js'][] = "public/plugins/holdOn/js/HoldOn.js";

    		$data['css'][] = "public/css/baboo.css";
    		$this->load->view('D_editbook', $data);
    	}
    	// print_r($data['detail_chapter']);
    	// print_r($data);
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
    public function getChapter()
    {
    	error_reporting(0);
		$auth = $this->session->userdata('authKey');
		$user = $this->session->userdata('userData')['user_id'];
		$id_book = $this->input->post('book_id');
		// print_r($data_book);

		// START GET CHAPTER
		$data_book = array(
			'book_id' => $id_book,
			'user_id' => $user
		);
		// print_r($data_book);

		// START GET CHAPTER
		$url = $this->API.'/allChapters/';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key : '.$auth));
		$content = curl_exec($ch);
		curl_close($ch);
		$headers=array();
		
		$data_before_chapter=explode("\n",$content);
		$headers['status']=$data_before_chapter[0];

		array_shift($data_before_chapter);

		foreach($data_before_chapter as $part){
			$middle=explode(":",$part);
			$headers[trim($middle[0])] = trim($middle[1]);
		}

		$data_before_chapter['chapter'] = json_decode(end($data_before_chapter), true);
		$auth = $headers['BABOO-AUTH-KEY'];
		if (isset($data_before_chapter['chapter']['code']) && $data_before_chapter['chapter']['code'] == '200')
		{
			$status = $data_before_chapter['chapter']['code'];
			$this->session->set_userdata('authKey', $auth);
		}
		else
		{
			$status = $data_before_chapter['chapter']['code'];
		}
		echo json_encode($data_before_chapter['chapter']['data']['chapter']);
		// print_r($data_before_chapter['chapter']['data']['chapter']);
    }
}
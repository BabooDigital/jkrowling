<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_book_out extends MX_Controller {

	function __construct(){
		parent::__construct();
		$uri1 = $this->uri->segment(1);
		$uri2 = $this->uri->segment(2);
		if ($this->session->userdata('isLogin') == 200) {
			redirect($uri1.'/'.$uri2);
		}
	}

	public function index()
	{
		error_reporting(0);
		$book_id = $this->uri->segment(2);
		$id = explode('-', $book_id);
		$bookData = array(
			'book_id' => $id[0]
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'api.dev-baboo.co.id/v1/timeline/Home/detailBook');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $bookData);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HEADER, 1);
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

		$book['css'][] = "public/plugins/holdOn/css/HoldOn.css"
		;
		$datas['js'][]   = "public/js/custom/D_timeline_in.js";

		$book['js'][] = "public/js/jquery.min.js";
		$book['js'][] = "public/js/umd/popper.min.js";
		$book['js'][] = "public/js/bootstrap.min.js";
		$book['js'][] = "public/js/jquery.sticky-kit.min.js";		
		$book['js'][] = "public/plugins/holdOn/js/HoldOn.js";
		$book['js'][]   = "public/js/custom/notification.js";

		$book['js'][] = "public/js/custom/detail_book.js";

		$book['detailBook'] = $resval['data'];
		$book['title'] = $resval['data']['book_info']['title_book'];
		$book['cover'] = $resval['data']['book_info']['cover_url'];
		$book['desc'] = $resval['data']['chapter']['paragraphs'];
		$book['bid'] = $resval['data']['book_info']['book_id'];
		$book['author'] = $resval['data']['author']['author_name'];
		$book['avatar'] = $resval['data']['author']['avatar'];

		$this->load->view('D_book_out', $book);
	}
}
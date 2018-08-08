<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_book_out extends MX_Controller {

	var $API = "";

	function __construct(){
		parent::__construct();
		$api_url = checkBase();
		$this->API = $api_url;

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
		$chapter_id = $this->uri->segment(5);
		$id = explode('-', $book_id);
		$visits =base64_encode(uniqid(time(), true));
        if (!isset($_COOKIE['VISITOR_INF'])) $_COOKIE['VISITOR_INF'] = $visits;
        $kuki = $_COOKIE['VISITOR_INF'];
        setcookie('VISITOR_INF',$kuki,time()+86400*7,'/');

		$sendData = array(
			'book_id' => $id[0],
			'ip_client' => $kuki,
			'chapter'=>$chapter_id
		);

		$datas = $this->curl_request->curl_post($this->API.'timeline/Home/detailBook', $sendData, '');
		// $datas = $this->curl_request->curl_post($this->API.'timeline/Home/allChapters', $sendData, '');
		$st1 = strip_tags($datas['data']['chapter']['paragraphs'][0]['paragraph_text']); 
		$st2 = str_replace("'", "", $st1);
		$book['page_desc'] = substr($st2, 5, 150) . '...';
		$book['m_book_cover'] = $datas['data']['book_info']['cover_url'];
		$book['m_book_price'] = preg_replace('/[^0-9]/', '', $datas['data']['book_info']['book_price']);
		if ((bool)$datas['data']['book_info']['is_free'] == false) {
			$book['m_type'] = 'product';
		}else{
			$book['m_type'] = 'website';
		}

		$book['css'][] = "public/plugins/holdOn/css/HoldOn.css";
		$book['js'][] = "public/js/jquery.min.js";
		$book['js'][] = "public/js/umd/popper.min.js";
		$book['js'][] = "public/js/bootstrap.min.js";
		$book['js'][] = "public/js/jquery.sticky-kit.min.js";		
		$book['js'][] = "public/plugins/holdOn/js/HoldOn.js";
		$book['js'][] = "public/js/custom/notification.js";
		$book['js'][] = "public/js/custom/detail_book.js";
		$datas['js'][] = "public/js/custom/D_timeline_in.js";

		$book['detailBook'] = $datas['data'];
		$book['title'] = $datas['data']['book_info']['title_book'];
		$book['cover'] = $datas['data']['book_info']['cover_url'];
		$book['category'] = $datas['data']['category']['category_name'];
		$book['view'] = $datas['data']['book_info']['view_count'];
		$book['comment'] = $datas['data']['book_info']['book_comment_count'];
		$book['share'] = $datas['data']['book_info']['share_count'];
		$book['like'] = $datas['data']['book_info']['like_count'];
		$book['desc'] = $datas['data']['chapter']['paragraphs'];
		$book['bid'] = $datas['data']['book_info']['book_id'];
		$book['aid'] = $datas['data']['author']['author_id'];
		$book['author'] = $datas['data']['author']['author_name'];
		$book['avatar'] = $datas['data']['author']['avatar'];
		$book['ch_title'] = $datas['data']['chapter']['chapter_title'];
		if ($this->agent->mobile()) {
			$this->load->view('R_book_out', $book);
		}else {
			$this->load->view('D_book_out', $book);
		}
	}
}
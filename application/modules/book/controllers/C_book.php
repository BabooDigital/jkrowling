<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_book extends MX_Controller
{

    var $API = "";

    function __construct()
    {
        parent::__construct();
        $api_url = checkBase();

        $this->API = $api_url;

        if ($this->session->userdata('isLogin') != 200) {
            $id = $this->uri->segment(2);
            redirect('book/' . $id . '/preview');
        }
    }

    public function index()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $user = $this->session->userdata('userData');
        $id_book = $this->uri->segment(2);
        $idb = explode('-', $id_book, 2);
        if (is_array($idb)) ;

        $data_book = array(
            'book_id' => $idb[0],
            'user_id' => $user['user_id']
        );
        // print_r($data_book);

        // START GET CHAPTER
        $url = $this->API . 'book/Books/allChapters/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $content = curl_exec($ch);
        $headers = array();
        $data_before_chapter = explode("\n", $content);
        $headers['status'] = $data_before_chapter[0];

        array_shift($data_before_chapter);

        foreach ($data_before_chapter as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data_before_chapter['chapter'] = json_decode(end($data_before_chapter), true);
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($data_before_chapter['chapter']['code']) && $data_before_chapter['chapter']['code'] == '200') {
            $status = $data_before_chapter['chapter']['code'];
            $this->session->set_userdata('authKey', $auth);
        } else {
            $status = $data_before_chapter['chapter']['code'];
        }

        // END GET CHAPTER
        $ch = curl_init();
        $url = $this->API . 'book/Books/detailBook/';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $content = curl_exec($ch);
        $headers = array();

        $data = explode("\n", $content);
        $headers['status'] = $data[0];

        array_shift($data);

        foreach ($data as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data['detail_book'] = json_decode(end($data), true);
        $auth = $headers['BABOO-AUTH-KEY'];

        $this->session->set_userdata('authKey', $auth);


        if (!$this->input->get("chapter")) {
        } else {
            $chapter_id = $data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")]['chapter_id'];

            $url = $this->API . 'book/Books/detailBook/';
            $data_book = array(
                'book_id' => $idb[0],
                'user_id' => $user,
                'chapter' => $chapter_id
            );

            $ch = curl_init();
            $url = $this->API . 'book/Books/detailBook/';
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
            $content = curl_exec($ch);
            $headers = array();
            $data = explode("\n", $content);
            $headers['status'] = $data[0];
            // print_r($data);
            array_shift($data);

            foreach ($data as $part) {
                $middle = explode(":", $part);
                $headers[trim($middle[0])] = trim($middle[1]);
            }

            $data['detail_book'] = json_decode(end($data), true);
            $auth = $headers['BABOO-AUTH-KEY'];
            if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200') {
                $status = $data['detail_book']['code'];
                if(!empty($auth)) $this->session->set_userdata('authKey', $auth);
            } else {
                $status = $data['detail_book']['code'];
            }
        }

        $data['title'] = $data['detail_book']['data']['book_info']['title_book'] . " - Baboo";

        $data['detailBook'] = json_decode(end($data), true);
        $data['menuChapter'] = json_decode(end($data_before_chapter), true);
        if ($data_before_chapter['chapter']['data']['chapter'][3]['chapter_free'] != "false") {
            $data['detailChapter'] = count($data_before_chapter['chapter']['data']['chapter']);
        } else {
            $data['detailChapter'] = 2;
        }

        $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";

        $data['js'][] = "public/js/jquery.min.js";
        $data['js'][] = "public/js/custom/search.js";
        $data['js'][] = "public/js/umd/popper.min.js";
        $data['js'][] = "public/js/bootstrap.min.js";
        $data['js'][] = "public/js/jquery.sticky-kit.min.js";
        $data['js'][] = "public/plugins/holdOn/js/HoldOn.js";

        $data['id_chapter'] = $this->input->get("chapter");

        $data['id_chapter_asli'] = $data['detailBook']['data']['chapter']['chapter_id'];
        if ($this->agent->mobile()) {
            $data['js'][] = "public/js/custom/mobile/r_detail_book.js";
            $this->load->view('include/head', $data);
            $this->load->view('R_book', $data);
        } else {
            $data['js'][] = "public/js/custom/notification.js";
            $data['js'][] = "public/js/custom/transaction.js";
            if ($this->input->get("chapter")) {
                if ($data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == null || $data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == '') {
                    // print_r("kosong chapter");
                } else {
                    $data['js'][] = "public/js/custom/detail_book.js";
                    $result = $this->load->view('data/D_book', $data);
                }
            } else {
                // print_r($content);
                $data['js'][] = "public/js/custom/detail_book.js";
                $this->load->view('include/head', $data);
                $this->load->view('D_book', $data);
                count($data_before_chapter['chapter']);
            }
        }
    }

    public function chapterBook()
    {

        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $user = $this->session->userdata('userData');
        $id_book = $this->uri->segment(2);
        $id_chapter = $this->uri->segment(4);
        $idb = explode('-', $id_book, 2);
        if (is_array($idb)) ;

        $data_book = array(
            'book_id' => $idb[0],
            'chapter' => $id_chapter,
            'user_id' => $user['user_id']
        );
        // print_r($data_book);
        $ch = curl_init();
        $url = $this->API . 'book/Books/detailBook/';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $content = curl_exec($ch);
        $headers = array();

        $data = explode("\n", $content);
        $headers['status'] = $data[0];

        array_shift($data);

        foreach ($data as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data['detail_book'] = json_decode(end($data), true);
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200') {
            $status = $data['detail_book']['code'];
            $this->session->set_userdata('authKey', $auth);
        } else {
            $status = $data['detail_book']['code'];
        }
        if ($data['detail_book']['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode($data['detail_book']['data']);
        }
        // $data['js'][] = "public/js/jquery.min.js";
        // $data['js'][] = "public/js/umd/popper.min.js";
        // $data['js'][] = "public/js/bootstrap.min.js";
        // $data['js'][] = "public/js/jquery.sticky-kit.min.js";
        // $data['id_chapter'] = $this->input->get("chapter");

        // $data['id_chapter_asli'] = $data['detailBook']['data']['chapter']['chapter_id'];
        // if ($this->agent->mobile()) {
        // 	$data['js'][] = "public/js/custom/mobile/r_detail_book.js";
        // 	$this->load->view('include/head', $data);
        // 	$this->load->view('R_book', $data);
        // }else{
        // 	if ($this->input->get("chapter")) {
        // 		if ($data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == null || $data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == '') {
        //         	// print_r("kosong chapter");
        // 		}else{
        // 			$data['js'][] = "public/js/custom/detail_book.js";
        // 			$result = $this->load->view('data/D_book', $data);
        // 		}
        // 	}else{
        // 		$data['js'][] = "public/js/custom/detail_book.js";
        // 		$this->load->view('include/head', $data);
        // 		$this->load->view('D_book', $data);
        // 		// count($data_before_chapter['chapter']);
        // 		// print_r($data['detailChapter']);
        // 	}
        // }
    }

    public function getChapterResponsive()
    {
        error_reporting(0);
        $url = $this->API . 'book/Books/detailBook';
        $auth = $this->session->userdata('authKey');
        $bid = $this->uri->segment(2);
        $str = explode('-', $bid);
        $bookid = $str[0];
        $idch = $this->uri->segment(3);

        $sendData = array(
            'book_id' => $bookid,
            'chapter' => $idch,
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $result = curl_exec($ch);

        $headers = array();

        $data = explode("\n", $result);


        array_shift($data);
        $middle = array();
        $moddle = array();
        foreach ($data as $part) {
            $middle = explode(":", $part);
            $moddle = explode("{", $part);

            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        $getdata = end($data);
        $resval = json_decode($getdata, TRUE);

        $auth = $headers['BABOO-AUTH-KEY'];

        $this->session->set_userdata('authKey', $auth);

        $datas['detail_book'] = $resval;
        $datas['title'] = $resval['data']['chapter']['chapter_title'] . " | " . $resval['data']['book_info']['title_book'] . " - Baboo";
        $datas['js'][] = "public/js/jquery.min.js";
        $datas['js'][] = "public/js/umd/popper.min.js";
        $datas['js'][] = "public/js/bootstrap.min.js";
        $datas['js'][] = "public/js/jquery.sticky-kit.min.js";
        $datas['js'][] = "public/js/custom/mobile/r_detail_book.js";
        if ($data['home']['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            $this->load->view('include/head', $datas);
            $this->load->view('R_book');
        }
    }

    public function chapter()
    {

        error_reporting(0);

        $user = $this->session->userdata('userData');
        $auth = $this->session->userdata('authKey');

        $id_book = $this->input->post("id_book");
        $idb = explode('-', $id_book, 2);
        if (is_array($idb)) ;
        $id_chapter = $this->input->post("id_chapter");

        $data_book = array(
            'book_id' => $idb[0],
            'user_id' => $user['user_id']
        );
        // print_r($data_book);

        // START GET CHAPTER
        $url = $this->API . 'book/Books/allChapters/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $content = curl_exec($ch);
        curl_close($ch);
        $headers = array();
        $data_before_chapter = explode("\n", $content);
        $headers['status'] = $data_before_chapter[0];

        array_shift($data_before_chapter);

        foreach ($data_before_chapter as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data_before_chapter['chapter'] = json_decode(end($data_before_chapter), true);
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($data_before_chapter['chapter']['code']) && $data_before_chapter['chapter']['code'] == '200') {
            $status = $data_before_chapter['chapter']['code'];
            $this->session->set_userdata('authKey', $auth);
        } else {
            $status = $data_before_chapter['chapter']['code'];
        }
        $data_price = $data_before_chapter['chapter']['data']['book_info']['book_price'];
        $is_free = $data_before_chapter['chapter']['data']['book_info']['is_free'];
        $author_id = $data_before_chapter['chapter']['data']['author']['author_id'];

        $data_before_chapter['chapter']['data']['chapter']['pay']['book_price'] = number_format($data_price);
        $data_before_chapter['chapter']['data']['chapter']['pay']['is_free'] = $is_free;
        $data_before_chapter['chapter']['data']['chapter']['pay']['author_id'] = $author_id;
        if ($data_before_chapter['chapter']['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode($data_before_chapter['chapter']['data']['chapter']);
        }
    }

    public function readingMode()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $user = $this->session->userdata('userData');
        $id_book = $this->uri->segment(2);
        $idb = explode('-', $id_book, 2);
        if (is_array($idb)) ;

        $data_book = array(
            'book_id' => $idb[0],
            'user_id' => $user['user_id']
        );
        // print_r($data_book);
        // print_r($data_book);

        // START GET CHAPTER
        $url = $this->API . 'book/Books/allChapters/';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $content = curl_exec($ch);
        curl_close($ch);
        $headers = array();

        $data_before_chapter = explode("\n", $content);
        $headers['status'] = $data_before_chapter[0];

        array_shift($data_before_chapter);

        foreach ($data_before_chapter as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data_before_chapter['chapter'] = json_decode(end($data_before_chapter), true);
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($data_before_chapter['chapter']['code']) && $data_before_chapter['chapter']['code'] == '200') {
            $status = $data_before_chapter['chapter']['code'];
            $this->session->set_userdata('authKey', $auth);
        } else {
            $status = $data_before_chapter['chapter']['code'];
        }

        // END GET CHAPTER
        $ch = curl_init();
        $url = $this->API . 'book/Books/detailBook/';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $content = curl_exec($ch);
        $headers = array();

        $data = explode("\n", $content);
        $headers['status'] = $data[0];

        array_shift($data);

        foreach ($data as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data['detail_book'] = json_decode(end($data), true);
        $auth = $headers['BABOO-AUTH-KEY'];

        $this->session->set_userdata('authKey', $auth);

        if ($data['detail_book']['code'] == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {

            if (!$this->input->get("chapter")) {
            } else {
                $chapter_id = $data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")]['chapter_id'];

                $url = $this->API . 'book/Books/detailBook/';
                $data_book = array(
                    'book_id' => $idb[0],
                    'user_id' => $user,
                    'chapter' => $chapter_id
                );

                $ch = curl_init();
                $url = $this->API . 'book/Books/detailBook/';
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_book);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_HEADER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
                $content = curl_exec($ch);
                $headers = array();
                $data = explode("\n", $content);
                $headers['status'] = $data[0];
                // print_r($data);
                array_shift($data);

                foreach ($data as $part) {
                    $middle = explode(":", $part);
                    $headers[trim($middle[0])] = trim($middle[1]);
                }

                $data['detail_book'] = json_decode(end($data), true);
                $auth = $headers['BABOO-AUTH-KEY'];
                if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200') {
                    $status = $data['detail_book']['code'];
                    $this->session->set_userdata('authKey', $auth);
                } else {
                    $status = $data['detail_book']['code'];
                }
            }

            $data['title'] = $data['detail_book']['data']['book_info']['title_book'] . " - Baboo";

            $data['detailBook'] = json_decode(end($data), true);
            $data['menuChapter'] = $data_before_chapter['chapter'];
            if ($data_before_chapter['chapter']['data']['chapter'][3]['chapter_free'] != false) {
                $data['detailChapter'] = count($data_before_chapter['chapter']['data']['chapter']);
            } else {
                $data['detailChapter'] = 2 + 1;
            }

            $data['id_chapter'] = $this->input->get("chapter");
            $data['chapter_free'] = $data_before_chapter['chapter']['data']['chapter'][3]['chapter_free'];
            $data['css'][] = "public/css/bootstrap.min.css";
            $data['css'][] = "public/css/custom-margin-padding.css";
            $data['css'][] = "public/css/font-awesome.min.css";
            $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";

            $data['js'][] = "public/js/jquery.min.js";
            $data['js'][] = "public/js/umd/popper.min.js";
            $data['js'][] = "public/js/bootstrap.min.js";
            $data['js'][] = "public/plugins/holdOn/js/HoldOn.js";

            $data['js'][] = "public/js/custom/reading_mode.js";
            if ($this->agent->mobile()) {
                $data['css'][] = "public/css/baboo-responsive.css";
                $this->load->view('include/head', $data);
                $this->load->view('R_book', $data);
            } else {
                if ($this->input->get("chapter")) {
                    if ($data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == null || $data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == '') {
                        // print_r("kosong chapter");
                    } else {
                        $data['css'][] = "public/css/baboo.css";
                        $result = $this->load->view('data/D_readingmode', $data);

                    }
                } else {
                    $this->load->view('D_readingmode', $data);
                }
            }
        }
        // print_r($data['menuChapter']);
    }

    public function postCommentBook()
    {
        error_reporting(0);
        $url = $this->API . 'book/Books/addComment';
        $auth = $this->session->userdata('authKey');
        $book_id = $this->input->post('book_id');
        $parap_id = $this->input->post('paragraph_id');
        $user_id = $this->input->post('user_id');
        $comment = $this->input->post('comments');

        if (!empty($book_id)) {
            $sendData = array(
                'book_id' => $book_id,
                'user_id' => $user_id,
                'comments' => $comment
            );
        } else {
            $sendData = array(
                'paragraph_id' => $parap_id,
                'user_id' => $user_id,
                'comments' => $comment
            );
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $result = curl_exec($ch);


        $headers = array();

        $data = explode("\n", $result);


        array_shift($data);
        $middle = array();
        $moddle = array();
        foreach ($data as $part) {
            $middle = explode(":", $part);
            $moddle = explode("{", $part);

            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        $getdata = end($data);
        $resval = json_decode($getdata, TRUE);

        $psn = $resval['message'];
        $userdetail = $resval['data'];
        $auth = $headers['BABOO-AUTH-KEY'];

        $this->session->set_userdata('authKey', $auth);
        $status = $resval['code'];
        if ($status == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode($userdetail);
        }
        // print_r($data);
    }

    public function getCommentBook()
    {
        error_reporting(0);
        $url = $this->API . 'timeline/Timelines/getComment';


        $auth = $this->session->userdata('authKey');
        $book_id = $this->input->post('book_id');
        $idb = explode('-', $book_id, 2);
        if (is_array($idb)) ;
        $parap_id = $this->input->post('paragraph_id');
        if (!empty($book_id)) {
            $sendData = array(
                'book_id' => $idb[0]
            );
        } else {
            $sendData = array(
                'paragraph_id' => $parap_id
            );
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $result = curl_exec($ch);


        $headers = array();

        $data = explode("\n", $result);


        array_shift($data);
        $middle = array();
        $moddle = array();
        foreach ($data as $part) {
            $middle = explode(":", $part);
            $moddle = explode("{", $part);

            if (error_reporting() == 0) {
                $headers[trim($middle[0])] = trim($middle[1]);
            }
        }
        $getdata = end($data);
        $resval = json_decode($getdata, TRUE);

        $psn = $resval['message'];
        $userdetail = $resval['data']['comments'];
        $auth = $headers['BABOO-AUTH-KEY'];

        $this->session->set_userdata('authKey', $auth);
        $status = $resval['code'];
        if ($status == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode($userdetail);
        }
        // echo $result;
    }

    public function getCategory()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $url = $this->API . 'book/Books/allCategory';
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",    // Atur type request
            CURLOPT_POST => false,    // Atur menjadi GET
            CURLOPT_FOLLOWLOCATION => false,    // Follow redirect aktif
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HEADER => 1,
            CURLOPT_HTTPHEADER => array('baboo-auth-key: ' . $auth)

        );
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        $headers = array();

        $data = explode("\n", $content);
        $headers['status'] = $data[0];

        array_shift($data);

        foreach ($data as $part) {
            $middle = explode(":", $part);
            $headers[trim($middle[0])] = trim($middle[1]);
        }

        $data['category'] = json_decode(end($data), true);
        $auth = $headers['BABOO-AUTH-KEY'];
        if (isset($data['category']['code']) && $data['category']['code'] == '200') {
            $status = $data['category']['code'];
            $this->session->set_userdata('authKey', $auth);
        } else {
            $status = $data['category']['code'];
        }
        if ($status == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode($data['category']['data']);
        }
    }

    public function deleteDraftBook()
    {
    	error_reporting(0);
    	$url = $this->API . 'book/Books/draftDelete';

    	$auth = $this->session->userdata('authKey');
    	$book_id = $this->input->post('book_id');

        $sendData = array(
            'book_id' => $book_id
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('baboo-auth-key: ' . $auth));
        $result = curl_exec($ch);


        $headers = array();

        $data = explode("\n", $result);


        array_shift($data);
        $middle = array();
        $moddle = array();
        foreach ($data as $part) {
          $middle = explode(":", $part);
          $moddle = explode("{", $part);

          if (error_reporting() == 0) {
             $headers[trim($middle[0])] = trim($middle[1]);
         }
     }
     $getdata = end($data);
     $resval = json_decode($getdata, TRUE);

     $psn = $resval['message'];
     $datas = $resval['data'];
     $auth = $headers['BABOO-AUTH-KEY'];

     $this->session->set_userdata('authKey', $auth);
     $status = $resval['code'];
    if ($status == 403) {
        $this->session->unset_userdata('userData');
        $this->session->unset_userdata('authKey');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
      } else {
        echo json_encode(array("code"=>$status));  
    }
}
public function token_pay()
{
    $params = array('server_key' => 'SB-Mid-server-4bmgeo85fTsjFQccrdZt6T6E', 'production' => false);
    $this->load->library('midtrans');
    $this->midtrans->config($params);        

    $id_book = $this->input->post('id_book');
    $url_redirect = $this->input->post('url_redirect');

    $auth = $this->session->userdata('authKey');
    $sendData = array('book_id'=>$id_book);
    $data = $this->curl_request->curl_post($this->API.'book/Books/detailBook/', $sendData, $auth);
    if ($data['code'] == 200) {
        $array = array(
            'book_id' => $id_book,
            'url_redirect' => $url_redirect
        );

        $this->session->set_userdata($array);
        $transaction_details = array(
          'order_id' => rand(),
          'gross_amount' => $data['data']['book_info']['book_price'],
        );
        $customer_details = array(
            'email'            => $this->session->userdata('userData')['email']
        );
        $transaction = array(
          'transaction_details' => $transaction_details,
          'customer_details' => $customer_details
        );
        $snapToken = $this->midtrans->getSnapToken($transaction);
        error_log($snapToken);
        echo $snapToken;
    }
}
public function finish_pay()
{
    error_reporting(0);
    $result_data = $this->input->post('result_data');

    $data_midtrans = (array)json_decode($result_data);

    $transaction_id = $data_midtrans['transaction_id'];
    $order_id = $data_midtrans['order_id'];
    $book_id = $this->session->userdata('book_id');
    $url_redirect = $this->session->userdata('url_redirect');
    $user_id = $this->session->userdata('userData')['user_id'];

    $sendData = array(
        "transaction_id" => $transaction_id,
        "order_id"       => $order_id,
        "book_id"       => $book_id,
        "user_id"       => $user_id,
        "pdf_url"       => $data_midtrans['pdf_url']
    );
    $data_update = $this->curl_request->curl_post($this->API.'payment/Payment/UpdateTrans', $sendData);
    if ($data_update['code'] == 200) {

        if ($data_midtrans['payment_type'] == 'bank_transfer' || $data_midtrans['payment_type'] == 'echannel' && $data_midtrans['transaction_status'] == 'pending') {
            $this->session->set_flashdata('popup_status_payment', 2);
            $this->session->set_userdata('popup_status_payment', 2);
            $this->session->set_flashdata('pdf_url', $data_midtrans['pdf_url']);
            redirect($url_redirect,'refresh');
        }if ($data_midtrans['payment_type'] == 'credit_card') {
            $this->session->unset_userdata('popup_status_payment');
            $this->session->set_flashdata('popup_status_payment', 1);
            $this->session->set_userdata('popup_status_payment', 1);
            redirect($url_redirect,'refresh');
        }
    }
}
}
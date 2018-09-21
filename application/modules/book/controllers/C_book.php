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
    }

    public function index()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $id_book = $this->uri->segment(3);
        $idb = explode('-', $id_book);
        if (is_array($idb)) ;

        $this->curl_multiple->add_call("writter","get",$this->API.'timeline/Home/bestWriter','',array(CURLOPT_HTTPHEADER => array('baboo-auth-key: '.$auth)));
        $this->curl_multiple->add_call("book","get",$this->API.'timeline/Timelines/bestBook','',array(CURLOPT_HTTPHEADER => array('baboo-auth-key: '.$auth)));
        $getData = $this->curl_multiple->execute();

        $best_writter = json_decode($getData['writter']['response'], TRUE);
        $best_book = json_decode($getData['book']['response'], TRUE);

        // START GET CHAPTER
        $data_book1 = array(
            'book_id' => end($idb)
        );
        $data_before_chapter = $this->curl_request->curl_post_auth($this->API.'book/Books/allChapters/', $data_book1, $auth);
        $data_before_chapter['chapter'] = $data_before_chapter['data'];
        $auth = $data_before_chapter['bbo_auth'];
        if (isset($data_before_chapter['chapter']['code']) && $data_before_chapter['chapter']['code'] == '200') {
            $status = $data_before_chapter['chapter']['code'];
            $this->session->set_userdata('authKey', $auth);
        } else {
            $status = $data_before_chapter['chapter']['code'];
        }
        $count = ($this->uri->segment(5) && !empty($this->uri->segment(5))) ? $this->uri->segment(5) : $data_before_chapter['chapter']['data']['chapter'][0]['chapter_id'];
        foreach ($data_before_chapter['chapter']['data']['chapter'] as $key=>$val) {
            if ($count == $val['chapter_id']) {
                $nexts = $key + 1;
                $prevs = $key - 1;
                $currs = $key;
            }
            $datas[] = $val['chapter_id'];
        }
        $data_book = array(
            'book_id' => end($idb),
            'chapter' => $count
        );

        // END GET CHAPTER
        if ($this->session->userdata('isLogin') != 200) {
            $data = $this->curl_request->curl_post($this->API.'timeline/Home/detailBook', $data_book, '');
            $id = $this->uri->segment(2).'/'.$this->uri->segment(3);
            $chaptid = $this->uri->segment(5);
            if ($data['data']['book_info']['is_pdf'] != 1) {
                if (empty($chaptid)) {
                    if ($this->uri->segment(3))
                        redirect('penulis/' . $id . '/preview');
                }else{
                    redirect('penulis/' . $id . '/preview/chapter/'.$chaptid);
                }
            }else{
                redirect('penulis/' . $id . '/preview/pdf');
            }
        }else{
            $data = $this->curl_request->curl_post_auth($this->API.'book/Books/detailBook/', $data_book, $auth);
            $datapdf = $this->curl_request->curl_post_auth($this->API.'book/Books/detailPDF/', $data_book, $auth);
        }

        if ($data['data']['data']['book_info']['book_type'] == 1) {
            foreach ($data['data']['data']['chapter']['paragraphs'] as $book) {
                $text = strip_tags($book['paragraph_text']);
                 $datasa .= "<div>".ucfirst($book['paragraph_text'])."</div>";
             }
             $st1 = strip_tags($datasa);
             $st2 = str_replace('"', '', $st1);

            $data['detail_book'] = $data['data'];
            $data['page_desc'] = 'Baboo.id - '.substr($st2, 0, 160) .' - '.$data['detail_book']['data']['author']['author_name'];
            $data['title'] = $data['detail_book']['data']['book_info']['title_book'].' - '.$data['detail_book']['data']['author']['author_name'].' | Baboo';
        }else{
            $st2 = str_replace('"', '', $datapdf['data']['data']['book_info']['desc']);
            $data['detail_book'] = $datapdf['data'];
            $data['page_desc'] = 'Baboo.id - '.substr($st2, 0, 160).' - '.$data['detail_book']['data']['author']['author_name'];
            $data['title'] = $datapdf['data']['data']['book_info']['title_book'].' - '.$datapdf['data']['data']['author']['author_name'].' | Baboo';
        }
        $data['author_meta'] = $data['detail_book']['data']['author']['author_name'];
        $auth = $data['bbo_auth'];

        if ($this->session->userdata('isLogin') != 200) {
        }else{
            if (!$this->input->get("chapter")) {
            } else {
                $chapter_id = $data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")]['chapter_id'];

                $data_book = array(
                    'book_id' => end($idb),
                    'chapter' => $chapter_id
                );

                $data = $this->curl_request->curl_post_auth($this->API.'book/Books/detailBook/', $data_book, $auth);

                $auth = $data['bbo_auth'];
            $this->session->set_userdata('authKey', $auth);
                if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200') {
                    $status = $data['detail_book']['code'];
                    if(!empty($auth)) $this->session->set_userdata('authKey', $auth);
                } else {
                    $status = $data['detail_book']['code'];
                }
                // unset($data['bbo_auth']);
                $data['detail_book'] = $data['data'];
            }

            $data['ch_title'] = $data['detail_book']['data']['chapter']['chapter_title'];
            $data['m_book_cover'] = $data['detail_book']['data']['book_info']['cover_url'];
            $data['m_book_price'] = $data['detail_book']['data']['book_info']['book_price'];

            $data['detailBook'] = json_decode(end($data), true);
            $data['menuChapter'] = json_decode(end($data_before_chapter), true);
            if ((bool)$data['detail_book']['data']['book_info']['is_free'] == FALSE) {
                $data['m_type'] = 'product';
            }else{
                $data['m_type'] = 'website';
            }

            if ($data_before_chapter['chapter']['data']['chapter'][3]['chapter_free'] != "false") {
                $data['detailChapter'] = count($data_before_chapter['chapter']['data']['chapter']);
            } else {
                $data['detailChapter'] = 2;
            }

//            Product
            $data['best_writter'] = $best_writter['data'];
            $data['best_book'] = $best_book['data'];

            $data['js'][] = "public/js/jquery.min.js";
            $data['js'][] = "public/js/umd/popper.min.js";
            $data['js'][] = "public/js/bootstrap.min.js";
            $data['js'][] = "public/js/jquery.mentionsInput.js";
            if ($datapdf['data']['data']['book_info']['book_type'] == 3){
                $data['css'][] = "public/plugins/epub/epub-style.css";
            }
            $data['id_chapter'] = $this->input->get("chapter");

            $data['id_chapter_asli'] = $data['detailBook']['data']['chapter']['chapter_id'];
            if ($this->agent->mobile()) {
                $data['css'][] = "public/css/sweetalert2.min.css";

                $data['chapt_count'] = count($data_before_chapter['chapter']['data']['chapter']);
                $data['chapt_data'] = $data_before_chapter['chapter']['data']['chapter'];

                $data['next_ch'] = $datas[$nexts];
                $data['prev_ch'] = $datas[$prevs];
                $data['curr_ch'] = $datas[$currs];

                $data['js'][] = "public/js/sweetalert2.all.min.js";
                $data['js'][] = "public/js/custom/mobile/r_detail_book.js";
                $this->load->view('include/head', $data);
                $this->load->view('R_book');
            } else {
                $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";
                $data['css'][] = "public/css/sweetalert2.min.css";
                $data['js'][] = "public/plugins/holdOn/js/HoldOn.js";
                $data['js'][] = "public/js/jquery.sticky-kit.min.js";
                $data['js'][] = "public/js/custom/notification.js";
                $data['js'][] = "public/js/custom/transaction.js";
                $data['js'][] = "public/js/sweetalert2.all.min.js";
                if ($this->input->get("chapter")) {
                    if ($data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == null || $data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == '') {
                        // print_r("kosong chapter");
                    } else {
                        $data['js'][] = "public/js/custom/detail_book.js";
                        $result = $this->load->view('data/D_book', $data);
                    }
                } else {
                    // print_r($content);
                    $data['js'][] = "public/js/custom/search.js";
                    $data['js'][] = "public/js/custom/detail_book.js";
                    $this->load->view('include/head', $data);
                    $this->load->view('product_landing/D_product');
                    count($data_before_chapter['chapter']);
                }
            }
        }
    }

    public function chapterBook()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $id_book = $this->uri->segment(3);
        $id_chapter = $this->uri->segment(5);
        $idb = explode('-', $id_book);
        if (is_array($idb)) ;

        $data_book = array(
            'book_id' => end($idb),
            'chapter' => $id_chapter
        );

        $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/detailBook', $data_book, $auth);

        $data['detail_book'] = $resval['data'];
        $auth = $resval['bbo_auth'];
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
            echo json_encode(array(
                'chapter' => $data['detail_book']['data']['chapter']
            ));
        }
    }

    public function chapter()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');

        $id_book = $this->input->post("id_book", TRUE);
        $idb = explode('-', $id_book);
        if (is_array($idb)) ;

        $data_book = array(
            'book_id' => end($idb)
        );

        $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/allChapters', $data_book, $auth);
        $resval2 = $this->curl_request->curl_post_auth($this->API.'book/Books/detailBook', $data_book, $auth);

        $data_before_chapter['chapter'] = $resval['data'];
        $data_author = $resval2['data']['data']['author'];

        $auth = $resval['bbo_auth'];
        if (isset($data_before_chapter['chapter']['code']) && $data_before_chapter['chapter']['code'] == '200') {
            $status = $data_before_chapter['chapter']['code'];
            $this->session->set_userdata('authKey', $auth);
        } else {
            $status = $data_before_chapter['chapter']['code'];
        }
        $data_price = $data_before_chapter['chapter']['data']['book_info']['book_price'];
        $is_free = $data_before_chapter['chapter']['data']['book_info']['is_free'];
        $author_id = $data_author['author_id'];
        $status_pay = $resval2['data']['data']['book_info']['status_payment'];

        $data_before_chapter['chapter']['data']['chapter']['pay']['book_price'] = number_format($data_price);
        $data_before_chapter['chapter']['data']['chapter']['pay']['is_free'] = $is_free;
        $data_before_chapter['chapter']['data']['chapter']['pay']['author_id'] = $author_id;
        $data_before_chapter['chapter']['data']['chapter']['pay']['stats'] = $status_pay;

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
        $id_book = $this->uri->segment(3);
        $idb = explode('-', $id_book);
        if (is_array($idb)) ;

        $data_book = array(
            'book_id' => end($idb)
        );

        // START GET CHAPTER
        $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/allChapters', $data_book, $auth);

        $data_before_chapter['chapter'] = $resval['data'];
        $auth = $resval['bbo_auth'];
        if (isset($data_before_chapter['chapter']['code']) && $data_before_chapter['chapter']['code'] == '200') {
            $status = $data_before_chapter['chapter']['code'];
            $this->session->set_userdata('authKey', $auth);
        } else {
            $status = $data_before_chapter['chapter']['code'];
        }

        // END GET CHAPTER
        $resvals = $this->curl_request->curl_post_auth($this->API.'book/Books/detailBook', $data_book, $auth);

        $data['detail_book'] = $resvals['data'];

        $auth = $resval['bbo_auth'];
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

                $data_book = array(
                    'book_id' => end($idb),
                    'chapter' => $chapter_id
                );

                $resvalss = $this->curl_request->curl_post_auth($this->API.'book/Books/detailBook/', $data_book, $auth);

                $data['detail_book'] = $resvalss['data'];
                $auth = $resvalss['bbo_auth'];
                if (isset($data['detail_book']['code']) && $data['detail_book']['code'] == '200') {
                    $status = $data['detail_book']['code'];
                    $this->session->set_userdata('authKey', $auth);
                } else {
                    $status = $data['detail_book']['code'];
                }
            }

            $data['title'] = $data['detail_book']['data']['book_info']['title_book'] . " - Baboo";

            $data['detailBook'] = $resvalss['data'];
            $data['menuChapter'] = $data_before_chapter['chapter'];
            if ($data_before_chapter['chapter']['data']['chapter'][3]['chapter_free'] != false) {
                $data['detailChapter'] = count($data_before_chapter['chapter']['data']['chapter']);
            } else {
                $data['detailChapter'] = 2 + 1;
            }

            $data['id_chapter'] = $this->input->get("chapter");
            $data['count_chapter'] = $this->input->get("chapter")+1;
            $data['chapter_free'] = $data_before_chapter['chapter']['data']['chapter'][3]['chapter_free'];
            $data['css'][] = "public/css/bootstrap.min.css";
            $data['css'][] = "public/css/baboo.css";
            $data['css'][] = "public/css/custom-margin-padding.css";
            $data['css'][] = "public/css/font-awesome.min.css";
            $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";

            $data['js'][] = "public/js/jquery.min.js";
            $data['js'][] = "public/js/umd/popper.min.js";
            $data['js'][] = "public/js/bootstrap.min.js";
            $data['js'][] = "public/plugins/holdOn/js/HoldOn.js";

            if ($this->agent->mobile()) {
                $data['css'][] = "public/css/baboo-responsive.css";
                $this->load->view('include/head', $data);
                $this->load->view('R_book', $data);
            } else {
                if ($this->input->get("chapter")) {
                    if ($data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == null || $data_before_chapter['chapter']['data']['chapter'][$this->input->get("chapter")] == '') {
                    } else {
                        $data['css'][] = "public/css/baboo.css";
                        $result = $this->load->view('data/D_readingmode', $data);

                    }
                } else {
                    $this->load->view('D_readingmode', $data);
                }
            }
        }
    }

    public function postCommentBook()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');

        $book_id = $this->input->post('book_id', TRUE);
        $parap_id = $this->input->post('paragraph_id', TRUE);
        $comment = $this->input->post('comments', TRUE);


        if (!empty($book_id)) {
            $sendData = array(
                'book_id' => $book_id,
                'comments' => ' '.$comment
            );
        } else {
            $sendData = array(
                'paragraph_id' => $parap_id,
                'comments' => ' '.$comment
            );
        }

        $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/addComment', $sendData, $auth);

        $psn = $resval['data']['message'];
        $userdetail = $resval['data']['data'];

        // $auth = $resval['bbo_auth'];
        // $this->session->set_userdata('authKey', $auth);
        $status = $resval['data']['code'];
        if ($status == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode($userdetail);
        }
    }

    public function getCommentBook()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $book_id = $this->input->post('book_id', TRUE);
        $idb = explode('-', $book_id);
        if (is_array($idb)) ;
        $parap_id = $this->input->post('paragraph_id', TRUE);
        if (!empty($book_id)) {
            $sendData = array(
                'book_id' => end($idb)
            );
        } else {
            $sendData = array(
                'paragraph_id' => $parap_id
            );
        }

        $resval = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/getComment', $sendData, $auth);

        $psn = $resval['data']['message'];
        $userdetail = $resval['data']['data']['comments'];

        $auth = $resval['bbo_auth'];
        $this->session->set_userdata('authKey', $auth);
        $status = $resval['data']['code'];
        if ($status == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode($userdetail);
        }
    }

    public function getCategory()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');

        $resval = $this->curl_request->curl_get_auth($this->API.'book/Books/allCategory', '', $auth);

        $data['category'] = $resval['data'];
        $auth = $resval['bbo_auth'];
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
    	$auth = $this->session->userdata('authKey');
    	$book_id = $this->input->post('book_id', TRUE);

        $sendData = array(
            'book_id' => $book_id
        );

        $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/draftDelete', $sendData, $auth);

        $psn = $resval['data']['message'];
        $datas = $resval['data']['data'];

        $auth = $resval['bbo_auth'];
        $this->session->set_userdata('authKey', $auth);
        $status = $resval['data']['code'];
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
    $params = array('server_key' => MID_SERVER, 'production' => MID_STAT_PROD);
    $this->load->library('midtrans');
    $this->midtrans->config($params);
    $user = $this->session->userdata('userData');

    $id_book = $this->input->post('id_book', TRUE);
    $url_redirect = $this->input->post('url_redirect', TRUE);

    $auth = $this->session->userdata('authKey');
    $sendData = array('book_id'=>$id_book);
    $data = $this->curl_request->curl_post($this->API.'book/Books/detailBook/', $sendData, $auth);
    if ($data['code'] == 200) {
        $array = array(
            'user_id' => $user['user_id'],
            'book_id' => $id_book,
            'url_redirect' => $url_redirect
        );

        $this->session->set_userdata($array);
        $transaction_details = array(
          'order_id' => rand(),
          'gross_amount' => $data['data']['book_info']['book_price'],
      );
        $billing_address = array(
            'first_name'       => $user['fullname'],
            'phone'            => $user['phone_number'],
            'address'          => $user['address']
        );
        $shipping_address = array(
            'first_name'       => $user['fullname'],
            'phone'            => $user['phone_number'],
            'address'          => $user['address']
        );
        $customer_details = array(
            'email'            => $user['email'],
            'first_name'       => $user['fullname'],
            'phone'            => $user['phone_number'],
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );
        $item_details = array(
            'id' => $data['data']['book_info']['book_id'],
            'price' => $data['data']['book_info']['book_price'],
            'quantity' => 1,
            'name' => $data['data']['book_info']['title_book']
        );
        $transaction = array(
          'transaction_details' => $transaction_details,
          'customer_details' => $customer_details,
          'item_details' => $item_details
      );
        $snapToken = $this->midtrans->getSnapToken($transaction);
        error_log($snapToken);
        echo $snapToken;
    }
}
public function finish_pay()
{
    error_reporting(0);
    $result_data = $this->input->post('result_data', TRUE);

    $data_midtrans = (array)json_decode($result_data);

    $transaction_id = $data_midtrans['transaction_id'];
    $order_id = $data_midtrans['order_id'];
    $book_id = $this->session->userdata('book_id');
    $url_redirect = $this->session->userdata('url_redirect');
    $user_id = $this->session->userdata('userData');

    $sendData = array(
        "transaction_id" => $transaction_id,
        "order_id"       => $order_id,
        "book_id"       => $book_id,
        "user_id"       => $user_id['user_id'],
        "pdf_url"       => $data_midtrans['pdf_url']
    );
    $data_update = $this->curl_request->curl_post($this->API.'payment/Payment/UpdateTrans', $sendData);
    if ($data_update['code'] == 200) {

        if ($data_midtrans['payment_type'] == 'bank_transfer' || $data_midtrans['payment_type'] == 'echannel' || $data_midtrans['payment_type'] == 'mandiri_clickpay' || $data_midtrans['payment_type'] == 'gopay' && $data_midtrans['transaction_status'] == 'pending') {
            $this->session->set_flashdata('popup_status_payment', 2);
            $this->session->set_userdata('popup_status_payment', 2);
            $this->session->set_flashdata('pdf_url', $data_midtrans['pdf_url']);
            redirect($url_redirect,'refresh');
        }else if ($data_midtrans['payment_type'] == 'credit_card' && $data_midtrans['transaction_status'] == 'capture') {
            $this->session->unset_userdata('popup_status_payment');
            $this->session->set_flashdata('popup_status_payment', 1);
            $this->session->set_userdata('popup_status_payment', 1);
            $this->session->set_flashdata('pay_alert', '<script>
                    swal("Success", "Pembayaran berhasil, menunggu untuk proses selanjutnya...", "success");
                </script>');
            redirect($url_redirect,'refresh');
        }else if ($data_midtrans['payment_type'] == 'mandiri_clickpay' || $data_midtrans['payment_type'] == 'gopay' || $data_midtrans['payment_type'] == 'credit_card' && $data_midtrans['transaction_status'] == 'settlement') {
            $this->session->unset_userdata('popup_status_payment');
            $this->session->set_flashdata('popup_status_payment', 1);
            $this->session->set_userdata('popup_status_payment', 1);
            $this->session->set_flashdata('pay_alert', '<script>
                    swal("Success", "Pembayaran berhasil, selamat membaca dengan versi Full...", "success");
                </script>');
            redirect($url_redirect,'refresh');
        }else{
            $this->session->set_flashdata('pay_alert', '<script>
                    swal("Warning", "Pembayaran gagal dan buku belum memiliki versi full..", "warning");
                </script>');
            redirect($url_redirect,'refresh');
        }
    }
}

public function postReplyComment()
{
    error_reporting(0);
    $auth = $this->session->userdata('authKey');
    $com_id = $this->input->post('comment_id');
    $comment = $this->input->post('comments');

    $sendData = array(
        'comment_id' => $com_id,
        'comments' => ' '.$comment
    );

    $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/addComment', $sendData, $auth);

    $comm_data = $resval['data']['data'];

    $auth = $resval['bbo_auth'];
    $this->session->set_userdata('authKey', $auth);
    $status = $resval['data']['code'];
    if ($status == 403) {
        $this->session->unset_userdata('userData');
        $this->session->unset_userdata('authKey');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    } else {
        echo json_encode($comm_data);
    }
}
public function postDeleteComment()
{
    error_reporting(0);
    $auth = $this->session->userdata('authKey');
    $com_id = $this->input->post('comment_id');

    $sendData = array(
        'comment_id' => $com_id
    );

    $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/commentDelete', $sendData, $auth);

    $comm_data = $resval['data']['code'];

    $auth = $resval['bbo_auth'];
    $this->session->set_userdata('authKey', $auth);
    $status = $resval['data']['code'];
    if ($status == 403) {
        $this->session->unset_userdata('userData');
        $this->session->unset_userdata('authKey');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    } else {
        echo json_encode($comm_data);
    }
}
public function postEditComment()
{
    error_reporting(0);
    $auth = $this->session->userdata('authKey');
    $com_id = $this->input->post('commentupdate_id');
    $comment = $this->input->post('comments');

    $sendData = array(
        'commentupdate_id' => $com_id,
        'comments' => ' '.$comment
    );

    $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/addComment', $sendData, $auth);

    $comm_data = $resval['data'];

    $auth = $resval['bbo_auth'];
    $this->session->set_userdata('authKey', $auth);
    $status = $resval['data']['code'];
    if ($status == 403) {
        $this->session->unset_userdata('userData');
        $this->session->unset_userdata('authKey');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    } else {
        echo json_encode($comm_data);
    }
}



// TEST PDF
public function getDetailPDFTest()
{
    error_reporting(0);
    $auth = $this->session->userdata('authKey');
    $id_book = $this->input->post('book_id', TRUE);

    $data_book = array(
        'book_id' => $id_book
    );

    $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/detailPDF/', $data_book, $auth);

    $comm_data = $resval['data'];

    $auth = $resval['bbo_auth'];
    $this->session->set_userdata('authKey', $auth);
    $status = $resval['data']['code'];
    if ($status == 403) {
        $this->session->unset_userdata('userData');
        $this->session->unset_userdata('authKey');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    } else {
        echo json_encode(
            array(
                'c' => $resval['data']['code'],
                'dat' => array(
                    'u' => base64_encode($comm_data['data']['book_info']['url_book']),
                    // 'e' => $comm_data['data']['book_info']['epoch_time'],
                    // 't' => $comm_data['data']['book_info']['title_book'],
                    'ib' => $comm_data['data']['book_info']['is_bought'],
                    'ip' => $comm_data['data']['book_info']['is_pdf']
                )
            )
        );
    }
}

//Archive Book
    public function postArchiveBook()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $book_id = $this->input->post('book_id', TRUE);

        $sendData = array(
            'book_id' => $book_id
        );

        $resval = $this->curl_request->curl_post_auth($this->API.'book/Books/archiveBook', $sendData, $auth);

        $psn = $resval['data']['message'];
        $datas = $resval['data']['data'];

        $auth = $resval['bbo_auth'];
        $this->session->set_userdata('authKey', $auth);
        $status = $resval['data']['code'];
        if ($status == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        } else {
            echo json_encode(array("code"=>$status));
        }
    }

//  View For Landing Product Detail Book
    public function viewProductDetail()
    {
        error_reporting(0);
        $auth = $this->session->userdata('authKey');
        $id_book = $this->uri->segment(3);
        $idb = explode('-', $id_book);
        if (is_array($idb)) ;

        // START GET CHAPTER
        $data_book = array(
            'book_id' => end($idb)
        );

        $this->curl_multiple->add_call("writter","get",$this->API.'timeline/Home/bestWriter','',array(CURLOPT_HTTPHEADER => array('baboo-auth-key: '.$auth)));
        $this->curl_multiple->add_call("book","get",$this->API.'timeline/Timelines/bestBook','',array(CURLOPT_HTTPHEADER => array('baboo-auth-key: '.$auth)));
        $resvals = $this->curl_multiple->execute();

        $book_data = $this->curl_request->curl_post_auth($this->API.'book/Books/detailBook', $data_book, $auth);
        $comm_data = $this->curl_request->curl_post_auth($this->API.'timeline/Timelines/getComment', $data_book, $auth);

        $best_writter = json_decode($resvals['writter']['response'], TRUE);
        $best_book = json_decode($resvals['book']['response'], TRUE);
        $resp_comm = $comm_data['data']['data'];
        $resp_code = $book_data['data']['code'];
        $resp_data = $book_data['data']['data'];
        $auth_code = $book_data['bbo_auth'];

        if (isset($resp_code) && $resp_code == 403) {
            $this->session->unset_userdata('userData');
            $this->session->unset_userdata('authKey');
            $this->session->sess_destroy();
            redirect('login', 'refresh');
        }else {
            $this->session->set_userdata('authKey', $auth_code);

            $data['book'] = $resp_data['book_info'];
            $data['author'] = $resp_data['author'];
            $data['category'] = $resp_data['category'];
            $data['chapter'] = $resp_data['chapter'];
            $data['comment'] = $resp_comm['comments'];
            $data['best_writter'] = $best_writter['data'];
            $data['best_book'] = $best_book['data'];
            $data['comment'] = $resp_comm['comments'];

            $data['title'] = 'Product Detail | Baboo';
            $data['css'][] = "public/plugins/holdOn/css/HoldOn.css";
            $data['css'][] = "public/css/sweetalert2.min.css";

            $data['js'][] = "public/js/jquery.min.js";
            $data['js'][] = "public/js/umd/popper.min.js";
            $data['js'][] = "public/js/bootstrap.min.js";
            $data['js'][] = "public/js/sweetalert2.all.min.js";
            $data['js'][] = "public/js/custom/notification.js";
            $data['js'][] = "public/js/custom/transaction.js";
            $data['js'][] = "public/js/custom/search.js";

            if ($this->agent->mobile())
            {
                $this->load->view('include/head', $data);
                $this->load->view('product_landing/R_product');
            }else{
                $data['js'][] = "public/plugins/holdOn/js/HoldOn.js";
                $data['js'][] = "public/js/jquery.sticky-kit.min.js";
                $data['js'][] = "public/js/custom/search.js";
//            $data['js'][] = "public/js/custom/detail_book.js";

                $this->load->view('include/head', $data);
                $this->load->view('product_landing/D_product');
            }
        }
    }
}

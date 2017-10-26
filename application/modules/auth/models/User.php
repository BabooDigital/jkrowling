<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model{

	var $API ="";
	var $APINAME ="";
	var $GENERATEKEY ="";

	function __construct(){
		parent::__construct();
		$this->API="api.dev-baboo.co.id/v1/auth/OAuth";
		$this->APINAME="baboo-auth-key";
		$this->uname = 'devbaboo';
    	$this->pass = 'baboo2017';

		$this->tableName = 'users';
		$this->primaryKey = 'user_id';
	}

	public function checkUserFB($data = array()){
		$GenerateKey = json_decode($this->curl->simple_get('api.dev-baboo.co.id/v1/auth/Key/index'));
		$this->curl->create($this->API.'/userbyrequest');
		$this->curl->http_login($this->uname, $this->pass);
		$this->curl->http_header($this->APINAME, $GenerateKey->key);

		$this->db->select($this->primaryKey);
		$this->db->from($this->tableName);
		$this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();
			$this->curl->post($prevCheck);
			$this->curl->execute();
		$users = array();
		if($prevCheck > 0){
			$prevResult = $prevQuery->row_array();
			$data['modified'] = date("Y-m-d H:i:s");
			$update = $this->db->update($this->tableName,$data,array('user_id'=>$prevResult['user_id']));
			$userID = $prevResult['user_id'];
			$users["status"] = 400;
			$users["userID"] = $userID;
			$users["userdata"] = $prevResult;
			$users["response"] = "Login success";
		}
		else{
			$data['created'] = date("Y-m-d H:i:s");
			$data['modified'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert($this->tableName,$data);
			$userID = $this->db->insert_id();
			$users["status"] = 400;
			$users["userID"] = $userID;
			$users["response"] = "Register success";
		}
			return $users?$users:FALSE;
    }
	public function get_userdata($userID){		
		$gq = $this->db->get_where($this->tableName,array("id"=>$userID));
		$sq = "user not found";
		if($gq->num_rows() > 0){
			$sq = $gq->result();
		}
		return $sq;
	}
	public function checkUser($data = array()){
		$this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $query = $this->db->get();
        $check = $query->num_rows();
        
        if($check > 0){
            $result = $query->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('user_id'=>$result['user_id']));
            $userID = $result['user_id'];
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified']= date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:false;
    }
}

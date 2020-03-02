<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model{

    private $database = 'mywebsite_crud';
	private $collection = 'user';
    private $conn;
    
    function __construct() {
		parent::__construct();
		$this->conn = $this->mongodb->getConn();
    }
    
    function Save_user() {
		$data=[
			"full_name"=>$this->input->post('full_name',true),
			"username"=>$this->input->post('username',true),
			"email"=>$this->input->post('email',true),
			"password1"=>md5($this->input->post('password1',true))
		];

		try {			
			$query = new MongoDB\Driver\BulkWrite();
			$query->insert($data);
			
			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
			
			if($result == 1) {
				return TRUE;
			}			
			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while saving data: ' . $ex->getMessage(), 500);
		}
	}
}
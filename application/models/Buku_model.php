<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_Model extends CI_Model
{
    private $database = 'mywebsite_crud';
	private $collection = 'buku';
	private $conn;
	
	function __construct() {
		parent::__construct();
		$this->conn = $this->mongodb->getConn();
	}
    
    
	function getBuku() {
		try {
			
			$query = new MongoDB\Driver\Query([]);
			
			$result = $this->conn->executeQuery($this->database.'.'.$this->collection, $query);

			return $result;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching data: ' . $ex->getMessage(), 500);
		}
	}
	
	function addBuku() {
		$data=[
			"penulis"=>$this->input->post('penulis',true),
			"judul"=>$this->input->post('judul',true),
			"kota"=>$this->input->post('kota',true),
			"penerbit"=>$this->input->post('penerbit',true),
			"tahun"=>$this->input->post('tahun',true)
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
    
    function getBukuBy($_id) {
		try {
			$filter = ['_id' => new MongoDB\BSON\ObjectId($_id)];
			$query = new MongoDB\Driver\Query($filter);
			
			$result = $this->conn->executeQuery($this->database.'.'.$this->collection, $query);
			
			foreach($result as $data) {
				return $data;
			}
			
			return NULL;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while fetching data: ' . $ex->getMessage(), 500);
		}
	}

	function updateBukuBy($_id) {
		$data=[
            "penulis"=>$this->input->post('penulis',true),
            "judul"=>$this->input->post('judul',true),
            "kota"=>$this->input->post('kota',true),
            "penerbit"=>$this->input->post('penerbit',true),
            "tahun"=>$this->input->post('tahun',true)
		];

		try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->update(['_id' => new MongoDB\BSON\ObjectId($_id)], ['$set' => $data]);
			
			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
			
			if($result == 1) {
				return TRUE;
			}
			
			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while updating data: ' . $ex->getMessage(), 500);
		}
	}

	function deleteBukuBy($_id) {
		try {
			$query = new MongoDB\Driver\BulkWrite();
			$query->delete(['_id' => new MongoDB\BSON\ObjectId($_id)]);
			
			$result = $this->conn->executeBulkWrite($this->database.'.'.$this->collection, $query);
			
			if($result == 1) {
				return TRUE;
			}
			
			return FALSE;
		} catch(MongoDB\Driver\Exception\RuntimeException $ex) {
			show_error('Error while deleting data: ' . $ex->getMessage(), 500);
		}
	}

    

}


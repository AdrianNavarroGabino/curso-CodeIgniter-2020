<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TestModel extends CI_Model {

	private $db = null;

	function __construct() {

		parent::__construct();

		$this->db = $this->load->database('default', true);
	}

	public function executeArrayResults($sql) {

		$query = $this->db->query($sql);
		$rows = $query->result_array();
		$query->free_result();

		return ($rows);
	}

	public function primera() {

		$sql = "select * from users";
		return ($this->executeArrayResults($sql));
	}

	public function devolverUnUsuario($id) {

		$sql = "select * from users where id = " . $id;
		return ($this->executeArrayResults($sql));
	}
}
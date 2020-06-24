<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class QueryModel extends CI_Model {

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

	public function init() {

		$query = $this->db->get('users');

		foreach ($query->result() as $row) {
			$data[] = $row->name;
		}

		return ($data);

		/*
		$sql = "select * from users";
		return ($this->executeArrayResults($sql));
		*/
	}

	public function insert($tabla, $datos) {

		$insert = $this->db->insert($tabla, $datos);
	}

	public function update($tabla, $datos, $where) {

		$insert = $this->db->update($tabla, $datos, $where);
	}

	public function delete($tabla, $where) {

		$insert = $this->db->delete($tabla, $where);
	}
}
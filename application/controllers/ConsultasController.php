<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultasController extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('QueryModel', 'QueryModel');
	}

	public function index() {

		$users = $this->QueryModel->init();

		debug($users);

		echo "consultas";
	}

	public function insert() {

		$datos['id'] = 3;
		$datos['name'] = "Juan";
		$datos['email'] = "juan@juan.com";

		$this->QueryModel->insert('users', $datos);

		echo "FIN";
	}

	public function update() {

		$where['id'] = "3";

		$datos['name'] = "Juan modificado";

		$this->QueryModel->update('users', $datos, $where);

		echo "FIN";
	}

	public function delete() {

		$where['id'] = "3";

		$this->QueryModel->delete('users', $where);

		echo "FIN";
	}
}
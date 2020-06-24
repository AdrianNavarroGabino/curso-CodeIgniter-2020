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
}
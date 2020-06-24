<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('BackEndModel', 'BackEndModel');
	}

	public function index() {

		$datos = array();

		$vista = array(
			'vista' => 'admin/index.php',
			'params' => $datos,
			'layout' => 'ly_admin.php',
			'titulo' => 'Prueba de controlador login'
		);
		$this->layoutblog->view($vista);
	}

	public function registro() {

		$datos = array();

		$vista = array(
			'vista' => 'admin/new_autor.php',
			'params' => $datos,
			'layout' => 'ly_admin.php',
			'titulo' => 'Prueba de controlador login'
		);
		$this->layoutblog->view($vista);
	}

	public function addAutor() {

		foreach ($_POST as $key => $value) {
			
			$datos[$key] = $value;
		}

		if(isset($datos['enabled'])) {

			$datos['enabled'] = 1;
		}
		else {
			$datos['enabled'] = 0;
		}

		$this->BackEndModel->insert('authors', $datos);

		header("location: list");
	}

	public function list() {

		echo "pagina listado";
	}
}

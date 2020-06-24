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

	public function login() {

		$datos = array();

		$vista = array(
			'vista' => 'admin/login.php',
			'params' => $datos,
			'layout' => 'ly_admin.php',
			'titulo' => 'Prueba de controlador login'
		);
		$this->layoutblog->view($vista);
	}

	public function login2() {

		$datos['email'] = $_POST['email_login'];
		$datos['password'] = $_POST['login_password'];

		$user = $this->BackEndModel->login($datos);

		header("location: list");
	}
}

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

		$datos['password'] = md5($datos['password']);
		$this->BackEndModel->insert('authors', $datos);

		header("location: list");
	}

	public function list() {

		echo "pagina listado";
	}

	public function login() {

		if($this->uri->segment(3) ==! null && $this->uri->segment(3) == 'error') {

			$datos = array(
				'error' => "Usuario o contraseña invalidos"
			);
		}
		else {

			$datos = array();
		}

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
		$datos['password'] = md5($_POST['login_password']);

		$user = $this->BackEndModel->login($datos);

		if(empty($user)) {

			header("location: login/error");
		}
		else {
			header("location: ../list");
		}
	}
}

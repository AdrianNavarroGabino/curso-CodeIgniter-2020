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

		$posts = $this->BackEndModel->listPosts();

		$datos = array(
			'posts' => $posts
		);

		$vista = array(
			'vista' => 'admin/index.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Prueba de controlador login'
		);
		$this->layoutblog->view($vista);
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

	public function newPost() {
		
		$authors = $this->BackEndModel->listAuthors();

		$datos = array('authors' => $authors);

		$vista = array(
			'vista' => 'admin/new_post.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Prueba de controlador login'
		);
		$this->layoutblog->view($vista);
	}

	public function addPost() {
		
		foreach ($_POST as $key => $value) {
			
			$datos[$key] = $value;
		}

		if(isset($datos['enabled'])) {

			$datos['enabled'] = 1;
		}
		else {
			$datos['enabled'] = 0;
		}

		$this->BackEndModel->insert('posts', $datos);

		header("location: list");
	}

	public function autores() {

		$authors = $this->BackEndModel->listAuthors();

		$datos = array('authors' => $authors);

		$vista = array(
			'vista' => 'admin/list_autores.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Prueba de controlador login'
		);
		$this->layoutblog->view($vista);
	}

	public function edit() {

		$post = $this->BackEndModel->listOnePost($this->uri->segment(2));
		$authors = $this->BackEndModel->listAuthors();

		$datos = array(
			'post' => $post['data'],
			'authors' => $authors
		);

		$vista = array(
			'vista' => 'admin/edit_post.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Prueba de controlador login'
		);
		$this->layoutblog->view($vista);
	}

	public function update() {

		foreach ($_POST as $key => $value) {
			
			$datos[$key] = $value;
		}

		if(isset($datos['enabled'])) {

			$datos['enabled'] = 1;
		}
		else {
			$datos['enabled'] = 0;
		}

		$where['id'] = $datos['id'];
		unset($datos['id']);

		$this->BackEndModel->update('posts', $datos, $where);

		header("location: list");
	}

	public function editAutor() {

		$autor = $this->BackEndModel->listOneAutor($this->uri->segment(2));

		$datos = array(
			'autor' => $autor['data']
		);

		$vista = array(
			'vista' => 'admin/edit_autor.php',
			'params' => $datos,
			'layout' => 'ly_home.php',
			'titulo' => 'Prueba de controlador login'
		);
		$this->layoutblog->view($vista);
	}

	public function updateAutor() {

		foreach ($_POST as $key => $value) {
			
			$datos[$key] = $value;
		}

		if(isset($datos['enabled'])) {

			$datos['enabled'] = 1;
		}
		else {
			$datos['enabled'] = 0;
		}

		$where['id'] = $datos['id'];
		unset($datos['id']);

		$this->BackEndModel->update('authors', $datos, $where);

		header("location: autores");
	}

	public function delete() {

		$where = array('id' => $this->uri->segment(2));

		$this->BackEndModel->delete('posts', $where);

		header("location: ../list");
	}

	public function deleteAutor() {

		$where = array('id' => $this->uri->segment(2));

		$this->BackEndModel->delete('authors', $where);

		header("location: ../autores");
	}
}

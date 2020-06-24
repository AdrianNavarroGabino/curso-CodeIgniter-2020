<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
}

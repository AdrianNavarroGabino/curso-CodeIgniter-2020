<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('TestModel', 'TestModel');
	}

	public function prueba()
	{
		
		$usuarios = $this->TestModel->primera();
		$usuario2 = $this->TestModel->devolverUnUsuario(2);

		/*
		### Comentamos estas líneas para mostrar los usuarios desde la vista.

		echo "<pre>";
		print_r($usuarios);
		print_r($usuario2);
		echo "</pre>";
		*/

		$parametros['param1'] = "valor1";
		$parametros['param2'] = "valor2";
		$parametros['param3'] = array(
			'p1' => 'soy p1',
			'p2' => 'soy p2'
		);
		$parametros['usuarios'] = $usuarios;
		$parametros['usuario2'] = $usuario2;

		$this->load->view('prueba', $parametros);
	}
}

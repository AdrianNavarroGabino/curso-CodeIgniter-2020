<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('TestModel', 'TestModel');
	}

	public function prueba()
	{

		$this->load->library('LibreriaClass');

		$l = $this->libreriaclass->miClase();

		//print_r($l);

		/*
		## Sirve para parar la ejecución.
		## Lo quitamos porque queremos que siga.
		die;
		*/

		/*
		## Lo comentamos porque, como lo vamos a utilizar en toda la
		## aplicación, lo hemos añadido al array de helpers del autoload.

		$this->load->helper('utiles');
		*/
		
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

		/*
		## Podemos mostrarlo desde aquí o desde la vista.
		debug($parametros);
		die;
		*/

		//$this->load->view('prueba', $parametros);

		/*
		## Lo comentamos porque, como lo vamos a utilizar en toda la
		## aplicación, lo hemos añadido al array de libraries del autoload.

		$this->load->library('layout');
		*/

		$vista = array(
			'vista' => 'admin/login.php',
			'params' => $parametros,
			'layout' => 'index.php',
			'titulo' => 'Prueba de controlador'
		);

		$this->layout->view($vista);
	}
}

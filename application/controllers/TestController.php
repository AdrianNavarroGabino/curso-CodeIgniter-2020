<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

	public function prueba()
	{
		$parametros['param1'] = "valor1";
		$parametros['param2'] = "valor2";
		$parametros['param3'] = array(
			'p1' => 'soy p1',
			'p2' => 'soy p2'
		);

		$this->load->view('prueba', $parametros);
	}
}

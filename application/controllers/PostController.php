<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller {

    function __construct() {

		parent::__construct();

		$this->load->model('PostModel', 'PostModel');
    }
    
	public function index()
	{
        $posts = $this->PostModel->listsAllPosts();
		$datos = array('posts' => $posts);

		$vista = array(
			'vista' => 'web/index.php',
			'params' => $datos,
			'layout' => 'ly_blog.php',
			'titulo' => 'Título del blog'
		);
		$this->layoutblog->view($vista);
	}
}

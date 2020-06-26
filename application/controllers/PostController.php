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
    
    public function post() {

        $post = $this->PostModel->listsOnePosts($this->uri->segment(2));
		$datos = array('post' => $post);

		$vista = array(
			'vista' => 'web/post.php',
			'params' => $datos,
			'layout' => 'ly_blog.php',
			'titulo' => 'Título del blog'
		);
		$this->layoutblog->view($vista);
    }

    public function author() {

        $posts = $this->PostModel->listsAllPostsByAuthor($this->uri->segment(2));
		$datos = array('posts' => $posts);

		$vista = array(
			'vista' => 'web/author.php',
			'params' => $datos,
			'layout' => 'ly_blog.php',
			'titulo' => 'Título del blog'
		);
		$this->layoutblog->view($vista);
    }
}

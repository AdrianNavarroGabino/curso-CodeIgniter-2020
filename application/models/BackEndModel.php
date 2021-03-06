<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BackEndModel extends CI_Model {

  private $db = null;

  function __construct()
  {

    parent::__construct();

    $this->db = $this->load->database('default2', true);

  }

  public function executeArrayResults($sql) {

    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return ( $rows);
  }

  public function executeResultsParamsArray($sql, $params)
  {

    $query = $this->db->query($sql, $params);
    $rows['data'] = $query->result_array();
    $query->free_result();

    return ($rows);

  }

  public function execute($sql) {

    $this->db->query($sql);
  }

  public function insert($tabla, $datos) {

    $this->db->insert($tabla, $datos);
  }

  public function update($tabla, $datos, $where) {

    $this->db->update($tabla, $datos, $where);
  }

  public function delete($tabla, $where) {

    $this->db->delete($tabla, $where);
  }

  public function login($datos) {

    $sql = "select * from authors where email = '" . $datos['email'] .
      "' and password = '" . $datos['password'] . "'";

    return ($this->executeArrayResults($sql));
  }

  public function listPosts() {

    $sql = "select * from posts order by id desc";
    return ($this->executeArrayResults($sql));
  }

  public function listAuthors() {

    $sql = "select * from authors order by display_name asc";
    return ($this->executeArrayResults($sql));
  }

  public function listOnePost($post_id) {

    $sql = "select * from posts where id = ?";
    $params = array($post_id);
    return ($this->executeResultsParamsArray($sql, $params));
  }

  public function listOneAutor($post_id) {

    $sql = "select * from authors where id = ?";
    $params = array($post_id);
    return ($this->executeResultsParamsArray($sql, $params));
  }
}
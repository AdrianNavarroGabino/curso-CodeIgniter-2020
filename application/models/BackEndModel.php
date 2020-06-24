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

  public function execute($sql) {

    $this->db->query($sql);
  }

  public function insert($tabla, $datos) {

    $this->db->insert($tabla, $datos);
  }
}
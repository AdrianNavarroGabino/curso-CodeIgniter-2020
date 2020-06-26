<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostModel extends CI_Model
{
  # Variable donde se guarda la conexión a la base de datos
  private $db = null;

  function __construct()
  {

    parent::__construct();

    # Cargamos la conexión a la base de datos
    $this->db = $this->load->database('default2', true);

  }

   # Ejecuta consultas y devuelte los resultados en un array
  public function ExecuteArrayResults($sql)
  {
    $query = $this->db->query($sql);
    $rows = $query->result_array();
    $query->free_result();

    return ($rows);
  }

  public function ExecuteResultsParamsArray($sql, $params)
  {

    $query = $this->db->query($sql, $params);
    $rows['data'] = $query->result_array();
    $query->free_result();

    return ($rows);

  }

  public function listsAllPosts()
  {

    $sql = "Select p.*, a.display_name 
      From posts as p
      left join authors as a  On p.author_id = a.id
      where p.enabled = 1 order by p.created desc limit 10";
    return ($this->ExecuteArrayResults($sql));

  }

}
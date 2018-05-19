<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPart extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getLimitPart($number, $offset)
  {
    $sql = "ALTER TABLE t_part AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    return $this->db->get('t_part', $number, $offset);
  }

  public function getAllPart()
  {
    $sql = "ALTER TABLE t_part AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    return $this->db->get('t_part');
  }

  public function insertPart($data)
  {
    $sql = "ALTER TABLE t_part AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    $this->db->insert('t_part', $data);
  }

  public function editPart($where)
  {
    return $this->db->get_where('t_part', $where);
  }

  public function updatePart($where, $data)
  {
    $this->db->where($where);
    $this->db->update('t_part', $data);
  }

  public function deletePart($where)
  {
    $this->db->delete('t_part', $where);
    $sql = "ALTER TABLE t_part AUTO_INCREMENT = 1;";
    $this->db->query($sql);
  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MJasa extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  public function getLimitJasa($number, $offset)
  {
    $sql = "ALTER TABLE t_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    return $this->db->get('t_jasa', $number, $offset);
  }

  public function getAllJasa()
  {
    $sql = "ALTER TABLE t_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    return $this->db->get('t_jasa');
  }

  public function insertJasa($data)
  {
    $sql = "ALTER TABLE t_part AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    $this->db->insert('t_jasa', $data);
  }

  public function editJasa($where)
  {
    return $this->db->get_where('t_jasa', $where);
  }

  public function updateJasa($where, $data)
  {
    $this->db->where($where);
    $this->db->update('t_jasa', $data);
  }

  public function deleteJasa($where)
  {
    $this->db->delete('t_jasa', $where);
    $sql = "ALTER TABLE t_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
  }

}

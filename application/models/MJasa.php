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
    $sql = "ALTER TABLE t_part_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    return $this->db->get_where('t_part_jasa', array('tipe' => "Jasa"), $number, $offset);
  }

  public function getAllJasa()
  {
    $sql = "ALTER TABLE t_part_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    return $this->db->get_where('t_part_jasa', array('tipe' => "Jasa"));
  }

  public function insertJasa($data)
  {
    $sql = "ALTER TABLE t_part_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    $this->db->insert('t_part_jasa', $data);
  }

  public function editJasa($where)
  {
    return $this->db->get_where('t_part_jasa', $where);
  }

  public function updateJasa($where, $data)
  {
    $this->db->where($where);
    $this->db->update('t_part_jasa', $data);
  }

  public function deleteJasa($where)
  {
    $this->db->delete('t_part_jasa', $where);
    $sql = "ALTER TABLE t_part_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
  }

}

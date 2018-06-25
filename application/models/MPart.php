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
    $sql = "ALTER TABLE t_part_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    return $this->db->get_where('t_part_jasa', array('tipe' => "Sparepart"), $number, $offset);
  }

  public function getAllPart()
  {
    $sql = "ALTER TABLE t_part_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    return $this->db->get_where('t_part_jasa', array('tipe' => "Sparepart"));
  }

  public function insertPart($data)
  {
    $sql = "ALTER TABLE t_part_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
    $this->db->insert('t_part_jasa', $data);
  }

  public function editPart($where)
  {
    return $this->db->get_where('t_part_jasa', $where);
  }

  public function updatePart($where, $data)
  {
    $this->db->where($where);
    $this->db->update('t_part_jasa', $data);
  }

  public function updateStokPart($data)
  {
    $this->db->set('stok_part', $data['stok_part'], FALSE);
    $this->db->where('id_part_jasa', $data['id_part']);
    $this->db->update('t_part_jasa');
  }

  public function deletePart($where)
  {
    $this->db->delete('t_part_jasa', $where);
    $sql = "ALTER TABLE t_part_jasa AUTO_INCREMENT = 1;";
    $this->db->query($sql);
  }

}

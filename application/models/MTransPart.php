<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MTransPart extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllTempTransPart()
  {
    return $this->db->get('t_temp_trans_part');
  }

  public function getAllTransPartMain()
  {
    return $this->db->get('t_trans_part');
  }

  public function getAllTransPartDetail()
  {
    return $this->db->get('t_detail_trans_part');
  }

  public function getAllTempTableTransPart()
  {
    $query = "SELECT t_temp_trans_part.id_temp_trans_part,
    t_part_jasa.no_part_jasa, t_part_jasa.nama_part_jasa,
    t_part_jasa.harga_jual_part_jasa, t_temp_trans_part.jumlah
    FROM t_part_jasa, t_temp_trans_part
    WHERE t_part_jasa.id_part_jasa = t_temp_trans_part.id_part_jasa;";

    return $this->db->query($query);
  }

  public function insertTempTransPart($data)
  {
    $this->db->insert('t_temp_trans_part', $data);
  }

  public function insertTransPartMain($data)
  {
    $this->db->insert('t_trans_part', $data);
  }

  public function insertTransPartDetail($data)
  {
    $this->db->insert('t_detail_trans_part', $data);
  }

  public function editTransPart($where)
  {
    return $this->db->get_where('t_temp_trans_part', $where);
  }

  public function updateTransPart($where, $data)
  {
    $this->db->where($where);
    $this->db->update('t_temp_trans_part', $data);
  }

  public function deleteTempTransPart($where)
  {
    $this->db->delete('t_temp_trans_part', $where);
  }

  public function truncatTempTransPart()
  {
    $this->db->truncate('t_temp_trans_part');
  }

}

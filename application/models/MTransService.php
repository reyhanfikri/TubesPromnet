<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MTransService extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllTempTransService()
  {
    return $this->db->get('t_temp_trans_service');
  }

  public function getAllTransServiceMain()
  {
    return $this->db->get('t_trans_service');
  }

  public function getAllTempTableTransService()
  {
    $query = "SELECT t_temp_trans_service.id_temp_trans_service,
    t_jasa.nama_jasa, t_jasa.harga_jasa
    FROM t_jasa, t_temp_trans_service
    WHERE t_jasa.id_jasa = t_temp_trans_service.id_jasa;";

    return $this->db->query($query);
  }

  public function insertTempTransService($data)
  {
    $this->db->insert('t_temp_trans_service', $data);
  }

  public function insertTransServiceMain($data)
  {
    $this->db->insert('t_trans_service', $data);
  }

  public function insertTransServiceDetail($data)
  {
    $this->db->insert('t_detail_trans_service', $data);
  }

  public function editTransService($where)
  {
    return $this->db->get_where('t_temp_trans_service', $where);
  }

  public function updateTransService($where, $data)
  {
    $this->db->where($where);
    $this->db->update('t_temp_trans_service', $data);
  }

  public function deleteTempTransService($where)
  {
    $this->db->delete('t_temp_trans_service', $where);
  }

  public function truncatTempTransService()
  {
    $this->db->truncate('t_temp_trans_service');
  }

}

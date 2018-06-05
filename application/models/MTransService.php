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

  public function insertTempTransService($data)
  {
    $this->db->insert('t_temp_trans_service', $data);
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

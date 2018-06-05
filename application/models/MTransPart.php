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

  public function insertTempTransPart($data)
  {
    $this->db->insert('t_temp_trans_part', $data);
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

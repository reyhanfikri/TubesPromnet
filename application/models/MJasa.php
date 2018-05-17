<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MJasa extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllJasa()
  {
    return $this->db->get('t_jasa');
  }
}

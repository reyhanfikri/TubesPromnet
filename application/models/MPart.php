<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPart extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllPart()
  {
    return $this->db->get('t_part');
  }
}

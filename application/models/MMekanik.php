<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMekanik extends CI_Model
{
	public function __construct() {

		parent::__construct();

	}

	public function getAllMekanik() {

		$query = "ALTER TABLE t_mekanik AUTO_INCREMENT = 1;";
    	$this->db->query($query);
		$query = $this->db->get("t_mekanik");
		return $query;

	}

	public function getLimitMekanik($number, $offset) {

		$query = "ALTER TABLE t_mekanik AUTO_INCREMENT = 1;";
    	$this->db->query($query);
	    $query = $this->db->get('t_mekanik', $number, $offset);
	    return $query;

	}

	public function getById($id) {

		$query = $this->db->get_where('t_mekanik', $id);
		return $query;

	}

	public function insertMekanik($data) {

		$this->db->insert('t_mekanik', $data);

	}

	public function updateMekanik($where, $data) {

		$this->db->where($where);
    	$this->db->update('t_mekanik', $data);

	}

	public function deleteMekanik($where) {

		$this->db->delete('t_mekanik', $where);
		$query = "ALTER TABLE t_mekanik AUTO_INCREMENT = 1;";
    	$this->db->query($query);
		
	}
}

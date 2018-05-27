<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPelanggan extends CI_Model
{
	public function __construct() {

		parent::__construct();

	}

	public function getAllPelanggan() {

		$query = "ALTER TABLE t_pelanggan AUTO_INCREMENT = 1;";
    	$this->db->query($query);
		$query = $this->db->get("t_pelanggan");
		return $query;

	}

	public function getLimitPelanggan($number, $offset) {

		$query = "ALTER TABLE t_pelanggan AUTO_INCREMENT = 1;";
    	$this->db->query($query);
	    $query = $this->db->get('t_pelanggan', $number, $offset);
	    return $query;

	}

	public function getById($id) {

		$query = $this->db->get_where('t_pelanggan', $id);
		return $query;

	}

	public function insertPelanggan($data) {

		$this->db->insert('t_pelanggan', $data);

	}

	public function updatePelanggan($where, $data) {

		$this->db->where($where);
    	$this->db->update('t_pelanggan', $data);

	}

	public function deletePelanggan($where) {

		$this->db->delete('t_pelanggan', $where);
		$query = "ALTER TABLE t_pelanggan AUTO_INCREMENT = 1;";
    	$this->db->query($query);

	}
}

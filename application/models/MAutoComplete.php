<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAutoComplete extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	function search ($part){

        $this->db->like('nama_part_jasa', $part , 'both');
        $this->db->or_like('no_part_jasa', $part , 'both');
        // $this->db->or_like('harga_part', $part , 'both');
        // $this->db->or_like('stok_part', $part , 'both');
        $this->db->order_by('no_part_jasa', 'ASC');
        $this->db->limit(10);

        return $this->db->get('t_part_jasa')->result();

    }

}

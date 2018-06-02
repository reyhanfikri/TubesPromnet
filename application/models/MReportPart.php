<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MReportPart extends CI_Model
{
	public function __construct() {

		parent::__construct();

	}

	public function getAllReportPartByDate() {

		$query = "ALTER TABLE t_pelanggan AUTO_INCREMENT = 1;";
    	$this->db->query($query);

		$query = "SELECT t_trans_part.id_trans_part, t_trans_part.tanggal_trans_part, t_part.id_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part AND t_trans_part.tanggal_trans_part BETWEEN '2018-05-05' and '2018-06-31';";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getLimitReportPartByDate($number, $offset) {

		$query = "ALTER TABLE t_pelanggan AUTO_INCREMENT = 1;";
    	$this->db->query($query);

		$query = "SELECT t_trans_part.id_trans_part, t_trans_part.tanggal_trans_part, t_part.id_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part AND t_trans_part.tanggal_trans_part BETWEEN '2018-05-05' and '2018-06-31' LIMIT ".$number." OFFSET ".$offset.";";

		$hasil = $this->db->query($query);

		return $hasil;

	}
}

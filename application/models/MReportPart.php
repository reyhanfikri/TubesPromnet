<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MReportPart extends CI_Model
{
	public function __construct() {

		parent::__construct();

	}

	public function getAllReportPart() {

		$query = "SELECT t_trans_part.id_trans_part, t_trans_part.tanggal_trans_part, t_part.nama_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getLimitReportPart($number, $offset) {

		$query = "SELECT t_trans_part.id_trans_part, t_trans_part.tanggal_trans_part, t_part.nama_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part LIMIT ".$number." OFFSET ".$offset.";";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getAllReportPartByDate($from, $to) {

		$query = "SELECT t_trans_part.id_trans_part, t_trans_part.tanggal_trans_part, t_part.nama_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part AND t_trans_part.tanggal_trans_part BETWEEN '".$from."' and '".$to."';";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getLimitReportPartByDate($number, $offset, $from, $to) {

		$query = "SELECT t_trans_part.id_trans_part, t_trans_part.tanggal_trans_part, t_part.nama_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part AND t_trans_part.tanggal_trans_part BETWEEN '".$from."' and '".$to."' LIMIT ".$number." OFFSET ".$offset.";";

		$hasil = $this->db->query($query);

		return $hasil;

	}
}

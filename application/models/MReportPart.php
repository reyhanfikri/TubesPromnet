<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MReportPart extends CI_Model
{
	public function __construct() {

		parent::__construct();

	}

	public function getAllReportPart() {

		$query = "SELECT t_detail_trans_part.id_detail_trans_part, t_trans_part.tanggal_trans_part, t_part.nama_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getLimitReportPart($number, $offset) {

		$query = "SELECT t_detail_trans_part.id_detail_trans_part, t_trans_part.tanggal_trans_part, t_part.nama_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part LIMIT ".$number." OFFSET ".$offset.";";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getGraphReportPart() {

		$query = "SELECT t_trans_part.tanggal_trans_part, SUM(t_detail_trans_part.jumlah_part) AS 'jumlah_part_terjual' FROM t_trans_part, t_detail_trans_part WHERE t_detail_trans_part.id_trans_part = t_trans_part.id_trans_part GROUP BY tanggal_trans_part;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getAllReportPartByDate($from, $to) {

		$query = "SELECT t_detail_trans_part.id_detail_trans_part, t_trans_part.tanggal_trans_part, t_part.nama_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part AND t_trans_part.tanggal_trans_part BETWEEN '".$from."' and '".$to."';";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getGraphReportPartByDate($from, $to) {

		$query = "SELECT t_trans_part.tanggal_trans_part, SUM(t_detail_trans_part.jumlah_part) AS 'jumlah_part_terjual' FROM t_trans_part, t_detail_trans_part WHERE t_detail_trans_part.id_trans_part = t_trans_part.id_trans_part AND t_trans_part.tanggal_trans_part BETWEEN '".$from."' and '".$to."' GROUP BY tanggal_trans_part;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getAllReportPartByMonth($month) {

		$query = "SELECT t_detail_trans_part.id_detail_trans_part, t_trans_part.tanggal_trans_part, t_part.nama_part, t_pelanggan.nama_pelanggan, t_detail_trans_part.jumlah_part, t_detail_trans_part.total_harga FROM t_trans_part, t_part, t_pelanggan, t_detail_trans_part WHERE t_trans_part.id_trans_part = t_detail_trans_part.id_trans_part AND t_trans_part.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_part.id_part = t_part.id_part AND MONTH(t_trans_part.tanggal_trans_part) = MONTH('".$month."') AND YEAR(t_trans_part.tanggal_trans_part) = YEAR('".$month."');";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getGraphReportPartByMonth($month) {

		$query = "SELECT t_trans_part.tanggal_trans_part, SUM(t_detail_trans_part.jumlah_part) AS 'jumlah_part_terjual' FROM t_trans_part, t_detail_trans_part WHERE t_detail_trans_part.id_trans_part = t_trans_part.id_trans_part AND MONTH(t_trans_part.tanggal_trans_part) = MONTH('".$month."') AND YEAR(t_trans_part.tanggal_trans_part) = YEAR('".$month."') GROUP BY tanggal_trans_part;";

		$hasil = $this->db->query($query);

		return $hasil;

	}
}

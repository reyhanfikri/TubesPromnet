<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLaporanPenjualanPart extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	public function getLaporanTahunan($tahun) {

		$query = "SELECT DATE_FORMAT(t_trans_part.tanggal_trans_part, '%m/%Y') AS 'bulan_tahun', YEAR(t_trans_part.tanggal_trans_part) AS 'tahun' , MONTH(t_trans_part.tanggal_trans_part) AS 'bulan', SUM(t_detail_trans_part.jumlah_part) AS 'jumlah_part', SUM(t_detail_trans_part.harga) AS 'total_harga' FROM t_trans_part, t_detail_trans_part WHERE t_detail_trans_part.id_trans_part = t_trans_part.id_trans_part AND YEAR(t_trans_part.tanggal_trans_part) = '" . $tahun . "' GROUP BY DATE_FORMAT(t_trans_part.tanggal_trans_part, '%m/%Y') ORDER BY DATE_FORMAT(t_trans_part.tanggal_trans_part, '%m/%Y');";

		$hasil = $this->db->query($query);

		if ($hasil->num_rows() > 0) {

			return $hasil->result();

		} else {

			return 0;

		}

	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLaporanPenjualanService extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	public function getLaporanTahunan($tahun) {

		$query = "SELECT DATE_FORMAT(t_trans_service.tanggal_trans_service, '%m/%Y') AS 'bulan_tahun', YEAR(t_trans_service.tanggal_trans_service) AS 'tahun' , MONTH(t_trans_service.tanggal_trans_service) AS 'bulan', COUNT(t_detail_trans_service.id_jasa) AS 'jumlah_service', SUM(t_detail_trans_service.harga) AS 'total_harga' FROM t_trans_service, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND YEAR(t_trans_service.tanggal_trans_service) = '".$tahun."' GROUP BY DATE_FORMAT(t_trans_service.tanggal_trans_service, '%m/%Y') ORDER BY DATE_FORMAT(t_trans_service.tanggal_trans_service, '%m/%Y');";

		$hasil = $this->db->query($query);

		if ($hasil->num_rows() > 0) {

			return $hasil->result();

		} else {

			return 0;

		}

	}

}

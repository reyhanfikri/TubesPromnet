<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLaporanPendapatanService extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	public function getLaporanTahunan($tahun) {

		$query = "SELECT DATE_FORMAT(t_trans_service.tanggal_trans_service, '%m/%Y') AS 'bulan_tahun', YEAR(t_trans_service.tanggal_trans_service) AS 'tahun' , MONTH(t_trans_service.tanggal_trans_service) AS 'bulan', SUM(t_detail_trans_service.qty) AS 'jumlah_service', SUM(t_detail_trans_service.harga) AS 'total_harga' FROM t_trans_service, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND YEAR(t_trans_service.tanggal_trans_service) = '".$tahun."' GROUP BY DATE_FORMAT(t_trans_service.tanggal_trans_service, '%m/%Y') ORDER BY DATE_FORMAT(t_trans_service.tanggal_trans_service, '%m/%Y');";

		$hasil = $this->db->query($query);

		if ($hasil->num_rows() > 0) {

			return $hasil->result();

		} else {

			return 0;

		}

	}

	public function getLaporanHarian($tanggal) {

		$query = "SELECT DATE_FORMAT(t_trans_service.tanggal_trans_service, '%d/%m/%Y %H:%i:%s') AS 'tanggal_jam',  t_jasa.no_jasa AS 'id_jasa', t_jasa.nama_jasa, COUNT(t_detail_trans_service.id_jasa) AS 'qty', t_jasa.harga_jasa AS 'harga', t_detail_trans_service.harga AS 'subtotal', t_user.username AS 'kasir' FROM t_trans_service INNER JOIN t_detail_trans_service ON t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service INNER JOIN t_jasa ON t_jasa.id_jasa = t_detail_trans_service.id_jasa INNER JOIN t_user ON t_user.id_user = t_trans_service.id_user WHERE DATE(t_trans_service.tanggal_trans_service) = '".$tanggal."' ORDER BY t_trans_service.tanggal_trans_service;";

		$hasil = $this->db->query($query);

		return $hasil->result();

	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MReportService extends CI_Model
{
	public function __construct() {

		parent::__construct();

	}

	public function getAllReportService() {

		$query = "SELECT t_detail_trans_service.id_detail_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getLimitReportService($number, $offset) {

		$query = "SELECT t_detail_trans_service.id_detail_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik LIMIT ".$number." OFFSET ".$offset.";";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getGraphReportService() {

		$query = "SELECT t_trans_service.tanggal_trans_service, COUNT(t_detail_trans_service.id_trans_service) AS 'jumlah_service_terjual' FROM t_trans_service, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service GROUP BY tanggal_trans_service;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getAllReportServiceByDate($from, $to) {

		$query = "SELECT t_detail_trans_service.id_detail_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik AND t_trans_service.tanggal_trans_service BETWEEN '".$from."' and '".$to."';";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getGraphReportServiceByDate($from, $to) {

		$query = "SELECT t_trans_service.tanggal_trans_service, COUNT(t_detail_trans_service.id_trans_service) AS 'jumlah_service_terjual' FROM t_trans_service, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.tanggal_trans_service BETWEEN '".$from."' and '".$to."' GROUP BY tanggal_trans_service;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getAllReportServiceByMonth($month) {

		$query = "SELECT t_detail_trans_service.id_detail_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik AND MONTH(t_trans_service.tanggal_trans_service) = MONTH('".$month."') AND YEAR(t_trans_service.tanggal_trans_service) = YEAR('".$month."');";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getGraphReportServiceByMonth($month) {

		$query = "SELECT t_trans_service.tanggal_trans_service, COUNT(t_detail_trans_service.id_trans_service) AS 'jumlah_service_terjual' FROM t_trans_service, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND MONTH(t_trans_service.tanggal_trans_service) = MONTH('".$month."') AND YEAR(t_trans_service.tanggal_trans_service) = YEAR('".$month."') GROUP BY tanggal_trans_service;";

		$hasil = $this->db->query($query);

		return $hasil;

	}
}

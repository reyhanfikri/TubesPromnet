<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MReportService extends CI_Model
{
	public function __construct() {

		parent::__construct();

	}

	public function getAllReportService() {

		$query = "SELECT t_trans_service.id_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getLimitReportService($number, $offset) {

		$query = "SELECT t_trans_service.id_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik LIMIT ".$number." OFFSET ".$offset.";";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getAllReportServiceByDate($from, $to) {

		$query = "SELECT t_trans_service.id_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik AND t_trans_service.tanggal_trans_service BETWEEN '".$from."' and '".$to."';";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getLimitReportServiceByDate($number, $offset, $from, $to) {

		$query = "SELECT t_trans_service.id_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik AND t_trans_service.tanggal_trans_service BETWEEN '".$from."' and '".$to."' LIMIT ".$number." OFFSET ".$offset.";";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getAllReportServiceByMonth($month) {

		$query = "SELECT t_trans_service.id_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik AND MONTH(t_trans_service.tanggal_trans_service) = MONTH('".$month."') AND YEAR(t_trans_service.tanggal_trans_service) = YEAR('".$month."');";

		$hasil = $this->db->query($query);

		return $hasil;

	}

	public function getLimitReportServiceByMonth($number, $offset, $month) {

		$query = "SELECT t_trans_service.id_trans_service, t_trans_service.tanggal_trans_service, t_jasa.nama_jasa, t_mekanik.nama_mekanik, t_pelanggan.nama_pelanggan, t_detail_trans_service.harga FROM t_trans_service, t_jasa, t_pelanggan, t_mekanik, t_detail_trans_service WHERE t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service AND t_trans_service.id_pelanggan = t_pelanggan.id_pelanggan AND t_detail_trans_service.id_jasa = t_jasa.id_jasa AND t_trans_service.id_mekanik = t_mekanik.id_mekanik AND MONTH(t_trans_service.tanggal_trans_service) = MONTH('".$month."') AND YEAR(t_trans_service.tanggal_trans_service) = YEAR('".$month."') LIMIT ".$number." OFFSET ".$offset.";";

		$hasil = $this->db->query($query);

		return $hasil;

	}
}

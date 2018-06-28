<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MNotaTransService extends CI_Model
{
	public function __construct()
  {
		parent::__construct();
	}

	public function getNota($noKwitansi)
  {
		$query = "SELECT
				DATE_FORMAT(t_trans_service.tanggal_trans_service, '%d/%m/%Y %H:%i:%s') AS 'tanggal_jam',
				t_trans_service.id_pelanggan,
				t_trans_service.nomor_kwitansi AS 'no_kuitansi',
				t_part_jasa.no_part_jasa AS 'id_part_jasa',
				t_part_jasa.id_part_jasa AS 'no_part_jasa',
				t_part_jasa.nama_part_jasa,
				t_detail_trans_service.qty,
				t_detail_trans_service.harga,
				t_detail_trans_service.harga * t_detail_trans_service.qty AS 'subtotal',
				t_user.username AS 'kasir',
				t_part_jasa.tipe
				FROM
				t_trans_service
				INNER JOIN t_detail_trans_service ON t_detail_trans_service.id_trans_service = t_trans_service.id_trans_service
				INNER JOIN t_part_jasa ON t_detail_trans_service.id_part_jasa = t_part_jasa.id_part_jasa
				INNER JOIN t_user ON t_trans_service.id_user = t_user.id_user
				WHERE
					t_trans_service.nomor_kwitansi = '".$noKwitansi."'
				ORDER BY
					t_trans_service.tanggal_trans_service;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

}

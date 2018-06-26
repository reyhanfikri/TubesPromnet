<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MNotaTransPart extends CI_Model
{
	public function __construct()
  {
		parent::__construct();
	}

	public function getNota($id)
  {
		$query = "SELECT
					t_trans_part.id_trans_part AS 'no_transaksi',
					DATE_FORMAT( t_trans_part.tanggal_trans_part, '%d/%m/%Y %H:%i:%s' ) AS 'tanggal_jam',
					t_part_jasa.no_part_jasa AS 'id_part',
					t_part_jasa.nama_part_jasa AS 'nama_part',
					t_detail_trans_part.jumlah_part AS 'qty',
					t_detail_trans_part.harga,
					t_detail_trans_part.harga * t_detail_trans_part.jumlah_part AS 'subtotal',
					t_user.username AS 'kasir'
				FROM
					t_trans_part
					INNER JOIN t_detail_trans_part ON t_detail_trans_part.id_trans_part = t_trans_part.id_trans_part
					INNER JOIN t_part_jasa ON t_part_jasa.id_part_jasa = t_detail_trans_part.id_part_jasa
					INNER JOIN t_user ON t_user.id_user = t_trans_part.id_user
				WHERE
					t_trans_part.id_trans_part = '".$id."'
				ORDER BY
					t_trans_part.tanggal_trans_part;";

		$hasil = $this->db->query($query);

		return $hasil;

	}

}

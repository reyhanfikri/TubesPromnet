<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLaporanPenjualanPart extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	public function getLaporanTahunan($tahun) {

		$query = "SELECT
					DATE_FORMAT( t_trans_part.tanggal_trans_part, '%m/%Y' ) AS 'bulan_tahun',
					YEAR ( t_trans_part.tanggal_trans_part ) AS 'tahun',
					MONTH ( t_trans_part.tanggal_trans_part ) AS 'bulan',
					SUM( t_detail_trans_part.jumlah_part ) AS 'jumlah_part',
					SUM( t_detail_trans_part.harga ) AS 'total_harga' 
				FROM
					t_trans_part,
					t_detail_trans_part 
				WHERE
					t_detail_trans_part.id_trans_part = t_trans_part.id_trans_part 
					AND YEAR ( t_trans_part.tanggal_trans_part ) = '" . $tahun . "' 
				GROUP BY
					DATE_FORMAT( t_trans_part.tanggal_trans_part, '%m/%Y' ) 
				ORDER BY
					DATE_FORMAT( t_trans_part.tanggal_trans_part, '%m/%Y' );";

		$hasil = $this->db->query($query);

		if ($hasil->num_rows() > 0) {

			return $hasil->result();

		} else {

			return 0;

		}

	}

	public function getLaporanHarian($tanggal) {

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
					DATE( t_trans_part.tanggal_trans_part ) = '".$tanggal."' 
				ORDER BY
					t_trans_part.tanggal_trans_part;";

		$hasil = $this->db->query($query);

		return $hasil->result();

	}

	public function getLaporanBulanan($bulan_tahun) {

		$query = "SELECT
					t_trans_part.id_trans_part AS 'no_transaksi',
					DATE_FORMAT( t_trans_part.tanggal_trans_part, '%d/%m/%Y %H:%i:%s' ) AS 'tanggal_jam',
					t_part.no_part AS 'id_part',
					t_part.nama_part,
					t_detail_trans_part.jumlah_part AS 'qty',
					t_part.harga_part AS 'harga',
					t_detail_trans_part.harga AS 'subtotal',
					t_user.username AS 'kasir' 
				FROM
					t_trans_part
					INNER JOIN t_detail_trans_part ON t_detail_trans_part.id_trans_part = t_trans_part.id_trans_part
					INNER JOIN t_part ON t_part.id_part = t_detail_trans_part.id_part
					INNER JOIN t_user ON t_user.id_user = t_trans_part.id_user 
				WHERE
					YEAR ( t_trans_part.tanggal_trans_part ) = YEAR ( '".$bulan_tahun."' ) 
					AND MONTH ( t_trans_part.tanggal_trans_part ) = MONTH ( '".$bulan_tahun."' ) 
				ORDER BY
					DATE( t_trans_part.tanggal_trans_part );";

		$hasil = $this->db->query($query);

		return $hasil->result();

	}

}

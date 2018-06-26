<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLaporanPembelianPart extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	public function getDetailLaporan($bulan_tahun) {

		$query = "SELECT
					t_pembelian_part.nomor_invoice,
					t_pembelian_part.tanggal_pembelian,
					t_part_jasa.no_part_jasa,
					t_part_jasa.nama_part_jasa,
					t_part_jasa.stok_part AS 'qty_awal',
					t_detail_pembelian_part.qty AS 'qty_tambah',
					t_detail_pembelian_part.harga_beli,
					t_detail_pembelian_part.qty * t_detail_pembelian_part.harga_beli AS 'subtotal',
					t_part_jasa.nama_part_jasa,
					t_user.username 
				FROM
					t_pembelian_part
					INNER JOIN t_detail_pembelian_part ON t_detail_pembelian_part.id_pembelian_part = t_pembelian_part.id_pembelian_part
					INNER JOIN t_part_jasa ON t_detail_pembelian_part.id_part_jasa = t_part_jasa.id_part_jasa
					INNER JOIN t_user ON t_pembelian_part.id_user = t_user.id_user 
				WHERE
					YEAR ( t_pembelian_part.tanggal_pembelian ) = YEAR ( '".$bulan_tahun."' ) 
					AND MONTH ( t_pembelian_part.tanggal_pembelian ) = MONTH ( '".$bulan_tahun."' ) 
				ORDER BY
					DATE( t_detail_pembelian_part.id_pembelian_part ) ASC;";

		$hasil = $this->db->query($query);

		return $hasil->result();

	}

	public function getTotalTransaksidanNilai() {

		$query = "SELECT
					COUNT( t_pembelian_part.id_pembelian_part ) AS 'total_transaksi_pembelian',
					SUM( t_detail_pembelian_part.harga_beli * t_detail_pembelian_part.qty )  AS 'total_nilai_pembelian'
				FROM
					t_pembelian_part
					INNER JOIN t_detail_pembelian_part ON t_detail_pembelian_part.id_pembelian_part = t_pembelian_part.id_pembelian_part 
				WHERE
					YEAR ( t_pembelian_part.tanggal_pembelian ) = YEAR ( '2018-06-11' ) 
					AND MONTH ( t_pembelian_part.tanggal_pembelian ) = MONTH ( '2018-06-11' ) 
				ORDER BY
					DATE( t_detail_pembelian_part.id_pembelian_part ) ASC;";

		$hasil = $this->db->query($query);

		return $hasil->row();

	}

}

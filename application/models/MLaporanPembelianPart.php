<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLaporanPembelianPart extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	public function getDetailLaporan($nomor_invoice) {

		$query = "SELECT
					t_detail_pembelian_part.id_detail_pembelian_part AS 'kode',				
					t_detail_pembelian_part.id_part_jasa AS 'kode2',
					t_part_jasa.no_part_jasa AS 'id_part',
					t_part_jasa.nama_part_jasa AS 'nama_part',
					t_detail_pembelian_part.qty_awal AS 'qty_awal',
					t_detail_pembelian_part.qty AS 'qty_tambah',
					t_detail_pembelian_part.harga_beli,
					t_detail_pembelian_part.qty * t_detail_pembelian_part.harga_beli AS 'subtotal',
					t_part_jasa.stok_part
				FROM
					t_pembelian_part
					INNER JOIN t_detail_pembelian_part ON t_detail_pembelian_part.id_pembelian_part = t_pembelian_part.id_pembelian_part
					INNER JOIN t_part_jasa ON t_detail_pembelian_part.id_part_jasa = t_part_jasa.id_part_jasa
				WHERE
					t_pembelian_part.nomor_invoice = '".$nomor_invoice."' 
				ORDER BY
					t_detail_pembelian_part.id_detail_pembelian_part ASC;";

		$hasil = $this->db->query($query);

		return $hasil->result();

	}

	public function getTotalTransaksidanNilai($bulan_tahun) {

		$query = "SELECT
					COUNT( t_pembelian_part.id_pembelian_part ) AS 'total_transaksi_pembelian',
					SUM( t_detail_pembelian_part.harga_beli * t_detail_pembelian_part.qty )  AS 'total_nilai_pembelian'
				FROM
					t_pembelian_part
					INNER JOIN t_detail_pembelian_part ON t_detail_pembelian_part.id_pembelian_part = t_pembelian_part.id_pembelian_part 
				WHERE
					YEAR ( t_pembelian_part.tanggal_pembelian ) = YEAR ( '".$bulan_tahun."' ) 
					AND MONTH ( t_pembelian_part.tanggal_pembelian ) = MONTH ( '".$bulan_tahun."' ) 
				ORDER BY
					DATE( t_detail_pembelian_part.id_pembelian_part ) ASC;";

		$hasil = $this->db->query($query);

		return $hasil->row();

	}

	public function getGroupByNomorInvoice($bulan_tahun) {

		$query = "SELECT
					t_pembelian_part.nomor_invoice,
					DATE_FORMAT( t_pembelian_part.tanggal_pembelian, '%d/%m/%Y %H:%i:%s' ) AS 'tanggal_pembelian',
					DAYNAME( t_pembelian_part.tanggal_pembelian ) AS 'hari',
					t_user.username AS 'kasir' 
				FROM
					t_pembelian_part
					INNER JOIN t_detail_pembelian_part ON t_detail_pembelian_part.id_pembelian_part = t_pembelian_part.id_pembelian_part
					INNER JOIN t_part_jasa ON t_detail_pembelian_part.id_part_jasa = t_part_jasa.id_part_jasa
					INNER JOIN t_user ON t_pembelian_part.id_user = t_user.id_user 
				WHERE
					YEAR ( t_pembelian_part.tanggal_pembelian ) = YEAR ( '".$bulan_tahun."' ) 
					AND MONTH ( t_pembelian_part.tanggal_pembelian ) = MONTH ( '".$bulan_tahun."' ) 
				GROUP BY
					t_pembelian_part.nomor_invoice
				ORDER BY
					t_detail_pembelian_part.id_detail_pembelian_part ASC;";

		$hasil = $this->db->query($query);

		return $hasil->result();

	}

	public function getOneGroupByNomorInvoice($nomor_invoice) {

		$query = "SELECT
					t_pembelian_part.nomor_invoice,
					DATE_FORMAT( t_pembelian_part.tanggal_pembelian, '%d/%m/%Y %H:%i:%s' ) AS 'tanggal_pembelian',
					DAYNAME( t_pembelian_part.tanggal_pembelian ) AS 'hari',
					t_user.username AS 'kasir' 
				FROM
					t_pembelian_part
					INNER JOIN t_detail_pembelian_part ON t_detail_pembelian_part.id_pembelian_part = t_pembelian_part.id_pembelian_part
					INNER JOIN t_part_jasa ON t_detail_pembelian_part.id_part_jasa = t_part_jasa.id_part_jasa
					INNER JOIN t_user ON t_pembelian_part.id_user = t_user.id_user 
				WHERE
					t_pembelian_part.nomor_invoice = '".$nomor_invoice."';";

		$hasil = $this->db->query($query);

		return $hasil->row();

	}

}

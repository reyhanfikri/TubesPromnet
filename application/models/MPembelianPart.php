<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPembelianPart extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllTempPembelianPart()
  {
    return $this->db->get('t_temp_pembelian_part');
  }

  public function getAllPembelianPartMain()
  {
    return $this->db->get('t_pembelian_part');
  }

  public function getAllPembelianPartDetail()
  {
    return $this->db->get('t_detail_pembelian_part');
  }

  public function getAllTempTablePembelianPart()
  {
    $query = "SELECT
              t_temp_pembelian_part.id_temp_pembelian_part,
              t_part_jasa.no_part_jasa AS 'id_part',
              t_part_jasa.nama_part_jasa AS 'nama_part',
              t_part_jasa.stok_part AS 'qty_awal',
              t_temp_pembelian_part.qty_tambah,
              t_temp_pembelian_part.harga_beli,
              t_temp_pembelian_part.qty_tambah * t_temp_pembelian_part.harga_beli AS 'subtotal'
            FROM
              t_part_jasa,
              t_temp_pembelian_part 
            WHERE
              t_part_jasa.id_part_jasa = t_temp_pembelian_part.id_part_jasa;";

    return $this->db->query($query);
  }

  public function insertTempPembelianPart($data)
  {
    $num_rows = $this->db->get_where('t_temp_pembelian_part', array('id_part_jasa' => $data['id_part_jasa']))->num_rows();

    if ($num_rows == 0) {

      $this->db->insert('t_temp_pembelian_part', $data);

    } else {

      $this->db->where(array('id_part_jasa' => $data['id_part_jasa']));
      $this->db->update('t_temp_pembelian_part', $data);

    }

    
  }

  public function insertPembelianPartMain($data)
  {
    $this->db->insert('t_pembelian_part', $data);
  }

  public function insertPembelianPartDetail($data)
  {
    $this->db->insert('t_detail_pembelian_part', $data);
  }

  public function editPembelianPart($where)
  {
    return $this->db->get_where('t_temp_pembelian_part', $where);
  }

  public function updatePembelianPart($where, $data)
  {
    $this->db->where($where);
    $this->db->update('t_temp_pembelian_part', $data);
  }

  public function deleteTempPembelianPart($where)
  {
    $this->db->delete('t_temp_pembelian_part', $where);
  }

  public function truncatTempPembelianPart()
  {
    $this->db->truncate('t_temp_pembelian_part');
  }

  public function numRowsNomorInvoice($nomor)
  {
    $this->db->like('nomor_invoice', $nomor , 'both');

    return $this->db->get('t_pembelian_part')->num_rows();
  }

  public function updatePembelianPartById($id, $qty_tambah)
  {
    $query = "UPDATE t_detail_pembelian_part SET qty = '".$qty_tambah."' WHERE id_detail_pembelian_part = '".$id."';";

    $this->db->query($query);
  }

}

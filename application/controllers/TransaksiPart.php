<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiPart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MPelanggan');
		$this->load->model('MPart');
		$this->load->model('MTransPart');
	}

	public function index()
	{
		$data['pelanggan'] = $this->MPelanggan->getAllPelanggan()->result();
		$data['part'] = $this->MPart->getAllPart()->result();
		$data['transPart'] = $this->MTransPart->getAllTempTransPart()->result();

		$this->load->view('v_header');
		$this->load->view('Transaksi/v_trans_part', $data);
		$this->load->view('Transaksi/v_tabel_trans_part', $data);
		$this->load->view('v_footer');
	}

	public function tambahTempTransPart()
	{
		$dataPart = $this->MPart->getAllPart()->result();

		foreach ($dataPart as $value)
		{
			if ($value->nama_part == $this->input->post('barang') && $value->stok_part >= $this->input->post('jumlah'))
			{
				$data = array(
					'nama_pelanggan' => $this->input->post('pelanggan'),
					'tanggal' => $this->input->post('tanggal'),
					'nama_part' => $this->input->post('barang'),
					'harga' => $this->input->post('harga'),
					'jumlah' => $this->input->post('jumlah')
			 	);
				$this->MTransPart->insertTempTransPart($data);
			}
		}
		redirect('TransaksiPart');
	}

	public function hapusTempTransPart($id)
	{
		$where = array('id_temp_trans_part' => $id);
		$this->MTransPart->deleteTempTransPart($where);
		redirect('TransaksiPart');
	}

	public function clearTempTransPart()
	{
		$this->MTransPart->truncatTempTransPart();

		redirect('TransaksiPart');
	}
}

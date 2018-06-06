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
		$data['transPart'] = $this->MTransPart->getAllTempTableTransPart()->result();
		$dataTransPart = $this->MTransPart->getAllTempTransPart()->result();

		$data['nama_pelanggan'] = '';
		$data['tanggal'] = '';
		if (count($dataTransPart) > 0)
		{
			foreach ($dataTransPart as $value1)
			{
				foreach ($data['pelanggan'] as $value2)
				{
					if ($value1->id_pelanggan == $value2->id_pelanggan)
					{
						$data['nama_pelanggan'] = $value2->nama_pelanggan;
						$data['tanggal'] = $value1->tanggal;
					}
				}
			}
		}

		$this->load->view('v_header');
		$this->load->view('Transaksi/v_trans_part', $data);
		$this->load->view('Transaksi/v_tabel_trans_part', $data);
		$this->load->view('v_footer');
	}

	public function tambahTempTransPart()
	{
		$dataPelanggan = $this->MPelanggan->getAllPelanggan()->result();
		$dataPart = $this->MPart->getAllPart()->result();

		$nama_pelanggan = $this->input->post('pelanggan');
		$tanggal = $this->input->post('tanggal');
		$nama_part = $this->input->post('barang');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');

		foreach ($dataPart as $value1)
		{
			foreach ($dataPelanggan as $value2)
			{
				if ($value1->nama_part == $nama_part && $value1->stok_part >= $this->input->post('jumlah'))
				{
					if ($value2->nama_pelanggan == $nama_pelanggan)
					{
						$data = array(
							'id_pelanggan' => $value2->id_pelanggan,
							'tanggal' => $tanggal,
							'id_part' => $value1->id_part,
							'harga' => $harga,
							'jumlah' => $jumlah
					 	);
						$this->MTransPart->insertTempTransPart($data);
					}
				}
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

	public function tambahTransPartMain()
	{
		$dataTempTransPart = $this->MTransPart->getAllTempTransPart()->row();

		if (isset($dataTempTransPart))
		{
			$dataMain = array(
				'id_pelanggan' => $dataTempTransPart->id_pelanggan,
				'tanggal_trans_part' => $dataTempTransPart->tanggal
			);
			$this->MTransPart->insertTransPartMain($dataMain);
		}
		redirect('TransaksiPart/tambahTransPartDetail');
	}

	public function tambahTransPartDetail()
	{
		$dataTempTransPart = $this->MTransPart->getAllTempTransPart()->result();
		$dataTransPartMain = $this->MTransPart->getAllTransPartMain()->result();

		foreach ($dataTransPartMain as $value1)
		{
			foreach ($dataTempTransPart as $value2)
			{
				if ($value1->id_pelanggan == $value2->id_pelanggan && $value1->tanggal_trans_service == $value2->tanggal)
				{
					$dataDetail = array(
						'id_trans_part' => $value1->id_trans_part,
						'id_part' => $value2->id_part,
						'jumlah_part' => $value2->jumlah,
						'harga' => $value2->harga
					);
					$this->MTransPart->insertTransPartDetail($dataDetail);
				}
			}
		}
		redirect('TransaksiPart/clearTempTransPart');
	}

}

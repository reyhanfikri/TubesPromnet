<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembelianPart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MPelanggan');
		$this->load->model('MPart');
		$this->load->model('MPembelianPart');
	}

	public function index()
	{

		if ($this->session->userdata('isLoggedIn')) {

			$data['data'] = $this->MPembelianPart->getAllTempTablePembelianPart()->result();

			$this->load->view('v_header');
			$this->load->view('Part/v_pembelian_part', $data);
			$this->load->view('v_footer');

		} else {

			redirect(site_url('Login'));

		}
	}

	public function tambahTempPembelianPart()
	{
		$part = $this->input->post('part');
		$jumlah = $this->input->post('jumlah');

		preg_match_all('!\d+!', $part, $matches);

		$no_part = substr($part, 0, 8);
		$qty_awal = $matches[0][3];
		$where = array('no_part_jasa' => $no_part);

		$dataPart = $this->MPart->editPart($where)->result();

		foreach ($dataPart as $value1)
		{
			if ($value1->no_part_jasa == $no_part)
			{
				$data = array(
					'no_part' => $no_part,
					'tanggal' => date('Y-m-d H:i:s'),
					'id_part_jasa' => $value1->id_part_jasa,
					'harga_beli' => $value1->harga_beli_part,
					'qty_awal' => $qty_awal,
					'qty_tambah' => $jumlah
			 	);
				$this->MPembelianPart->insertTempPembelianPart($data);
			}
		}
		redirect('PembelianPart');
	}

	public function hapusTempPembelianPart($id)
	{
		$where = array('id_temp_pembelian_part' => $id);
		$this->MPembelianPart->deleteTempPembelianPart($where);
		redirect('PembelianPart');
	}

	public function clearTempPembelianPart()
	{
		$this->MPembelianPart->truncatTempPembelianPart();
		redirect('LaporanPembelianPart');
	}

	public function tambahPembelianPartMain()
	{
		$dataTempPembelianPart = $this->MPembelianPart->getAllTempPembelianPart()->last_row();

		if (isset($dataTempPembelianPart))
		{
			$date = new DateTime($dataTempPembelianPart->tanggal);
			$result = $date->format('dmy');

			$num_rows_nomor_invoice = $this->MPembelianPart->numRowsNomorInvoice($result);

			$dataMain = array(
				'id_user' => 1,
				'nomor_invoice' => $result.sprintf("%02d", $num_rows_nomor_invoice + 1),
				'tanggal_pembelian' => date('Y-m-d H:i:s', strtotime($dataTempPembelianPart->tanggal))
			);
			$this->MPembelianPart->insertPembelianPartMain($dataMain);
		}
		redirect('PembelianPart/tambahPembelianPartDetail');
	}

	public function tambahPembelianPartDetail()
	{
		$dataPart = $this->MPart->getAllPart()->result();
		$dataTempPembelianPart = $this->MPembelianPart->getAllTempPembelianPart()->result();
		$dataPembelianPartMain = $this->MPembelianPart->getAllPembelianPartMain()->result();

		foreach ($dataPembelianPartMain as $value1)
		{
			foreach ($dataTempPembelianPart as $value2)
			{
				if ($value1->tanggal_pembelian >= $value2->tanggal)
				{
					$dataDetail = array(
						'id_pembelian_part' => $value1->id_pembelian_part,
						'id_part_jasa' => $value2->id_part_jasa,
						'qty_awal' => $value2->qty_awal,
						'qty' => $value2->qty_tambah,
						'harga_beli' => $value2->harga_beli
					);

					$this->MPembelianPart->insertPembelianPartDetail($dataDetail);
				}

				foreach ($dataPart as $value3)
				{
					if ($value3->id_part_jasa == $value2->id_part_jasa)
					{
						$data = array(
							'id_part_jasa' => $value3->id_part_jasa,
							'stok_part' => $value3->stok_part + $value2->qty_tambah
						);

						$this->MPart->UpdateStokPArt($data);
					}
				}
			}
		}
		redirect('PembelianPart/clearTempPembelianPart');
	}

}

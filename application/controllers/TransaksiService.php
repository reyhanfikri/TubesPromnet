<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiService extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MPelanggan');
		$this->load->model('MMekanik');
		$this->load->model('MJasa');
		$this->load->model('MPart');
		$this->load->model('MTransService');
		$this->load->model('MNotaTransService');
	}

	public function service($id)
	{

		if ($this->session->userdata('isLoggedIn')) {

			$data['id_pelanggan'] = $id;
			$id = array('id_pelanggan' => $id);
			$data['pelanggan'] = $this->MPelanggan->getById($id)->result();

			$data['service'] = $this->MJasa->getAllJasa()->result();
			$data['transService'] = $this->MTransService->getAllTempTableTransService()->result();
			$data['dataService'] = $this->MTransService->getAllTransServiceMain()->last_row();

			if (isset($data['dataService']))
			{
				substr($data['dataService']->nomor_kwitansi++, -4);
				$data['noKwitansi'] = $data['dataService']->nomor_kwitansi;
			}
			else
			{
				$data['noKwitansi'] = "T0001";
			}

			$this->load->view('v_header');
			$this->load->view('Transaksi/v_trans_service', $data);
			$this->load->view('Transaksi/v_tabel_trans_service', $data);
			$this->load->view('v_footer');

		} else {

			redirect(site_url('Login'));

		}
	}

	public function tambahTempTransService()
	{
		$dataService = $this->MJasa->getAllJasa()->result();

		$id_pelanggan = $this->input->post('id_pelanggan');
		$nama_service = $this->input->post('service');

		foreach ($dataService as $value1)
		{
			if ($value1->nama_part_jasa == $nama_service)
			{
				$data = array(
					'nomor_kwitansi' => $this->input->post('nomor_kwitansi'),
					'id_pelanggan' => $id_pelanggan,
					'tanggal' => date('Y-m-d H:i:s'),
					'id_part_jasa' => $value1->id_part_jasa,
					'jumlah' => 1,
					'harga' => $value1->harga_jual_part_jasa
			 	);
				$this->MTransService->insertTempTransService($data);
			}
		}
		redirect('TransaksiService/service/' . $id_pelanggan);
	}

	public function tambahTempTransPart()
	{
		$id_pelanggan = $this->input->post('id_pelanggan');
		$part = $this->input->post('part');
		$jumlah = $this->input->post('jumlah');

		$no_part = substr($part, 0, 8);
		$where = array('no_part_jasa' => $no_part);

		$dataPart = $this->MPart->editPart($where)->result();

		foreach ($dataPart as $value1)
		{
			if ($value1->no_part_jasa == $no_part && $value1->stok_part >= $jumlah)
			{
				$data = array(
					'nomor_kwitansi' => $this->input->post('nomor_kwitansi'),
					'id_pelanggan' => $id_pelanggan,
					'tanggal' => date('Y-m-d H:i:s'),
					'id_part_jasa' => $value1->id_part_jasa,
					'jumlah' => $jumlah,
					'harga' => $value1->harga_jual_part_jasa
			 	);
				$this->MTransService->insertTempTransService($data);
			}
		}
		redirect('TransaksiService/service/' . $id_pelanggan);
	}

	public function hapusTempTransService($id_pelanggan,$id)
	{
		$where = array('id_temp_trans_service' => $id);
		$this->MTransService->deleteTempTransService($where);
		redirect('TransaksiService/service/' . $id_pelanggan);
	}

	public function clearTempTransService($id_pelanggan)
	{
		$this->MTransService->truncatTempTransService();
		redirect('TransaksiService/service/' . $id_pelanggan);
	}

	public function cancelTempTransService()
	{
		$this->MTransService->truncatTempTransService();
		redirect('Pelanggan');
	}

	public function tambahTransServicetMain()
	{
		$dataTempTransService = $this->MTransService->getAllTempTransService()->last_row();

		if (isset($dataTempTransService))
		{
			$dataMain = array(
				'id_pelanggan' => $dataTempTransService->id_pelanggan,
				'id_user' => 1,
				'nomor_kwitansi' => $dataTempTransService->nomor_kwitansi,
				'tanggal_trans_service' => $dataTempTransService->tanggal
			);
			$this->MTransService->insertTransServiceMain($dataMain);
		}
		redirect('TransaksiService/tambahTransServiceDetail');
	}

	public function tambahTransServiceDetail()
	{
		$dataPart = $this->MPart->getAllPart()->result();
		$dataTempTransService = $this->MTransService->getAllTempTransService()->result();
		$dataTransServiceMain = $this->MTransService->getAllTransServiceMain()->result();

		foreach ($dataTransServiceMain as $value1)
		{
			foreach ($dataTempTransService as $value2)
			{
				if ($value1->id_pelanggan == $value2->id_pelanggan && $value1->tanggal_trans_service >= $value2->tanggal)
				{
					$dataDetail = array(
						'id_trans_service' => $value1->id_trans_service,
						'id_part_jasa' => $value2->id_part_jasa,
						'qty' => $value2->jumlah,
						'harga' => $value2->harga
					);
					$id = $value1->id_trans_service;
					$this->MTransService->insertTransServiceDetail($dataDetail);
				}
			}

			foreach ($dataPart as $value3)
			{
				if ($value3->id_part_jasa == $value2->id_part_jasa)
				{
					$data = array(
						'id_part_jasa' => $value3->id_part_jasa,
						'stok_part' => $value3->stok_part - $value2->jumlah
					);

					$this->MPart->UpdateStokPArt($data);
				}
			}
		}
		$this->MTransService->truncatTempTransService();
		redirect('NotaTransService/nota/'.$id);
	}

	function detailTransService($noKwitansi)
	{
		$data['transServiceMain'] = $this->MNotaTransService->getNota($noKwitansi)->last_row();
		$data['transService'] = $this->MNotaTransService->getNota($noKwitansi)->result();

		if (isset($data['transServiceMain']))
		{
			$id_pelanggan = array('id_pelanggan' => $data['transServiceMain']->id_pelanggan);
		}
		$data['pelanggan'] = $this->MPelanggan->getById($id_pelanggan)->result();

		$this->load->view('v_header');
		$this->load->view('Transaksi/v_detail_trans_service', $data);
		$this->load->view('v_footer');
	}

	function formEditTransService($noKwitansi)
	{
		$this->MTransService->truncatTempTransService();
		$dataTransService = $this->MNotaTransService->getNota($noKwitansi)->result();

		foreach ($dataTransService as $value1)
		{
			if ($value1->no_kuitansi == $noKwitansi)
			{
				$data = array(
					'nomor_kwitansi' => $value1->no_kuitansi,
					'id_pelanggan' => $value1->id_pelanggan,
					'tanggal' => date('Y-m-d H:i:s'),
					'id_part_jasa' => $value1->no_part_jasa,
					'jumlah' => $value1->qty,
					'harga' => $value1->harga
			 	);

				$this->MTransService->insertTempTransService($data);
			}
		}
		$data['noKwitansi'] = $noKwitansi;

		$data['transService'] = $this->MTransService->getAllTempTableTransService()->result();

		$this->load->view('v_header');
		$this->load->view('Transaksi/v_edit_trans_service', $data);
		$this->load->view('v_footer');
	}

	function editTransService($noKwitansi)
	{
		$post = $this->input->post();
		$no_kwitansi = array('nomor_kwitansi' => $noKwitansi);
		$dataTransServiceMain = $this->MTransService->getTransServiceByNoKwitansi($no_kwitansi)->last_row();
		$dataTransService = $this->MTransService->getAllTempTransService()->result();

		foreach ($dataTransService as $key => $value)
		{
			if (isset($dataTransServiceMain))
			{
				$where = array('id_trans_service' => $dataTransServiceMain->id_trans_service, 'id_part_jasa' => $value->id_part_jasa);
				$data = array(
					'id_trans_service' => $dataTransServiceMain->id_trans_service,
					'id_part_jasa' => $value->id_part_jasa,
					'qty' => $post['jumlah'][$key],
					'harga' => $value->harga
				);

				$dataPart = $this->MPart->editPart(array('id_part_jasa' => $value->id_part_jasa ))->result();
				foreach ($dataPart as $value1)
				{
					$dataPart = array(
						'id_part_jasa' => $value->id_part_jasa,
						'stok_part' => $value1->stok_part - ($post['jumlah'][$key] - $value->jumlah)
					);
					$this->MPart->updateStokPart($dataPart);
				}

				$this->MTransService->updateTransServiceDetail($where, $data);
			}
		}
		$this->MTransService->truncatTempTransService();
		redirect('TransaksiService/detailTransService/'.$noKwitansi);
	}

}

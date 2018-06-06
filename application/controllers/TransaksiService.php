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
		$this->load->model('MTransService');
	}

	public function index()
	{
		$data['pelanggan'] = $this->MPelanggan->getAllPelanggan()->result();
		$data['mekanik'] = $this->MMekanik->getAllMekanik()->result();
		$data['service'] = $this->MJasa->getAllJasa()->result();
		$data['transService'] = $this->MTransService->getAllTempTableTransService()->result();

		$dataTransService = $this->MTransService->getAllTempTransService()->result();

		$data['nama_pelanggan'] = '';
		$data['nama_mekanik'] = '';
		$data['tanggal'] = '';

		if (count($dataTransService) > 0)
		{
			foreach ($dataTransService as $value1)
			{
				foreach ($data['pelanggan'] as $value2)
				{
					foreach ($data['mekanik'] as $value3)
					{
						if ($value1->id_pelanggan == $value2->id_pelanggan && $value1->id_mekanik == $value3->id_mekanik)
						{
							$data['nama_pelanggan'] = $value2->nama_pelanggan;
							$data['nama_mekanik'] = $value3->nama_mekanik;
							$data['tanggal'] = $value1->tanggal;
						}
					}
				}
			}
		}

		$this->load->view('v_header');
		$this->load->view('Transaksi/v_trans_service', $data);
		$this->load->view('Transaksi/v_tabel_trans_service', $data);
		$this->load->view('v_footer');
	}

	public function tambahTempTransService()
	{
		$dataPelanggan = $this->MPelanggan->getAllPelanggan()->result();
		$dataMekanik = $this->MMekanik->getAllMekanik()->result();
		$dataService = $this->MJasa->getAllJasa()->result();

		$nama_pelanggan = $this->input->post('pelanggan');
		$nama_mekanik = $this->input->post('mekanik');
		$tanggal = $this->input->post('tanggal');
		$nama_service = $this->input->post('service');
		$harga = $this->input->post('harga');

		foreach ($dataService as $value1)
		{
			foreach ($dataPelanggan as $value2)
			{
				foreach ($dataMekanik as $value3)
				{
					if ($value1->nama_jasa == $nama_service)
					{
						if ($value2->nama_pelanggan == $nama_pelanggan && $value3->nama_mekanik == $nama_mekanik)
						{
							$data = array(
								'id_pelanggan' => $value2->id_pelanggan,
								'id_mekanik' => $value3->id_mekanik,
								'tanggal' => $tanggal,
								'id_jasa' => $value1->id_jasa,
								'harga' => $harga
						 	);
							$this->MTransService->insertTempTransService($data);
						}
					}
				}
			}
		}
		redirect('TransaksiService');
	}

	public function hapusTempTransService($id)
	{
		$where = array('id_temp_trans_part' => $id);
		$this->MTransService->deleteTempTransService($where);
		redirect('TransaksiService');
	}

	public function clearTempTransService()
	{
		$this->MTransService->truncatTempTransService();
		redirect('TransaksiService');
	}


		public function tambahTransServicetMain()
		{
			$dataTempTransService = $this->MTransService->getAllTempTransService()->row();

			if (isset($dataTempTransService))
			{
				$dataMain = array(
					'id_pelanggan' => $dataTempTransService->id_pelanggan,
					'id_mekanik' => $dataTempTransService->id_mekanik,
					'tanggal_trans_service' => $dataTempTransService->tanggal
				);
				$this->MTransService->insertTransServiceMain($dataMain);
			}
			redirect('TransaksiService/tambahTransServiceDetail');
		}

		public function tambahTransServiceDetail()
		{
			$dataTempTransService = $this->MTransService->getAllTempTransService()->result();
			$dataTransServiceMain = $this->MTransService->getAllTransServiceMain()->result();

			foreach ($dataTransServiceMain as $value1)
			{
				foreach ($dataTempTransService as $value2)
				{
					if ($value1->id_pelanggan == $value2->id_pelanggan && $value1->tanggal_trans_service == $value2->tanggal)
					{
						$dataDetail = array(
							'id_trans_service' => $value1->id_trans_service,
							'id_jasa' => $value2->id_jasa,
							'harga' => $value2->harga
						);
						$this->MTransService->insertTransServiceDetail($dataDetail);
					}
				}
			}
			redirect('TransaksiService/clearTempTransService');
		}
}

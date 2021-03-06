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
		$this->load->model('MNotaTransPart');
	}

	public function index()
	{

		if ($this->session->userdata('isLoggedIn')) {

			$data['transPart'] = $this->MTransPart->getAllTempTableTransPart()->result();

			$this->load->view('v_header');
			$this->load->view('Transaksi/v_trans_part');
			$this->load->view('Transaksi/v_tabel_trans_part', $data);
			$this->load->view('v_footer');

		} else {

			redirect(site_url('Login'));

		}
	}

	public function tambahTempTransPart()
	{
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
					'no_part' => $no_part,
					'tanggal' => date('Y-m-d H:i:s'),
					'id_part_jasa' => $value1->id_part_jasa,
					'harga' => $value1->harga_jual_part_jasa,
					'jumlah' => $jumlah
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

	public function tambahTransPartMain()
	{
		$dataTempTransPart = $this->MTransPart->getAllTempTransPart()->last_row();

		if (isset($dataTempTransPart))
		{
			$dataMain = array(
				'id_user' => 1,
				'tanggal_trans_part' => date('Y-m-d H:i:s', strtotime($dataTempTransPart->tanggal))
			);
			$this->MTransPart->insertTransPartMain($dataMain);
		}
		redirect('TransaksiPart/tambahTransPartDetail');
	}

	public function tambahTransPartDetail()
	{
		$dataPart = $this->MPart->getAllPart()->result();
		$dataTempTransPart = $this->MTransPart->getAllTempTransPart()->result();
		$dataTransPartMain = $this->MTransPart->getAllTransPartMain()->result();

		foreach ($dataTransPartMain as $value1)
		{
			foreach ($dataTempTransPart as $value2)
			{
				if ($value1->tanggal_trans_part >= $value2->tanggal)
				{
					$dataDetail = array(
						'id_trans_part' => $value1->id_trans_part,
						'id_part_jasa' => $value2->id_part_jasa,
						'jumlah_part' => $value2->jumlah,
						'harga' => $value2->harga
					);
					$id = $value1->id_trans_part;
					$this->MTransPart->insertTransPartDetail($dataDetail);
				}

				foreach ($dataPart as $value3)
				{
					if ($value3->id_part_jasa == $value2->id_part_jasa)
					{
						$data = array(
							'id_part_jasa' => $value3->id_part_jasa,
							'stok_part' => $value3->stok_part - $value2->jumlah
						);

						$this->MPart->updateStokPart($data);
					}
				}
			}
		}
		$this->MTransPart->truncatTempTransPart();
		redirect('NotaTransPart/nota/'.$id);
	}

	function detailTransPart($id)
	{
		$data['transPartMain'] = $this->MNotaTransPart->getNota($id)->last_row();
		$data['transPart'] = $this->MNotaTransPart->getNota($id)->result();

		$this->load->view('v_header');
		$this->load->view('Transaksi/v_detail_trans_part', $data);
		$this->load->view('v_footer');
	}

	public function tambahTempEditTransPart()
	{
		$id = $this->input->post('id_trans_part');
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
					'no_part' => $no_part,
					'tanggal' => date('Y-m-d H:i:s'),
					'id_part_jasa' => $value1->id_part_jasa,
					'harga' => $value1->harga_jual_part_jasa,
					'jumlah' => $jumlah
			 	);
				$this->MTransPart->insertTempTransPart($data);
			}
		}
		redirect('TransaksiPart/formEditTransPart/'.$id);
	}

	function formEditTransPart($id)
	{
		$dataTransPart = $this->MNotaTransPart->getNota($id)->result();

		foreach ($dataTransPart as $value1)
		{
			$this->MTransPart->truncatTempTransPart();
			if ($value1->no_transaksi == $id)
			{
				$data = array(
					'no_part' => $value1->id_part,
					'tanggal' => date('Y-m-d H:i:s'),
					'id_part_jasa' => $value1->id_part_jasa,
					'harga' => $value1->harga,
					'jumlah' => $value1->qty
			 	);
				$this->MTransPart->insertTempTransPart($data);
			}
		}
		$data['id'] = $id;
		$data['transPart'] = $this->MTransPart->getAllTempTableTransPart()->result();

		$this->load->view('v_header');
		$this->load->view('Transaksi/v_edit_trans_part', $data);
		$this->load->view('v_footer');
	}

	function editTransPart($id)
	{
		$post = $this->input->post();
		$dataTransPart = $this->MTransPart->getAllTempTransPart()->result();

		foreach ($dataTransPart as $key => $value)
		{
			$where = array('id_trans_part' => $id, 'id_part_jasa' => $value->id_part_jasa);
			$data = array(
				'id_trans_part' => $id,
				'id_part_jasa' => $value->id_part_jasa,
				'jumlah_part' => $post['jumlah'][$key],
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

			$this->MTransPart->updateTransPartDetail($where, $data);
		}
		$this->MTransPart->truncatTempTransPart();
		redirect('TransaksiPart/detailTransPart/'.$id);
	}

}

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
		$data['transService'] = $this->MTransService->getAllTempTransService()->result();

		$this->load->view('v_header');
		$this->load->view('Transaksi/v_trans_service', $data);
		$this->load->view('Transaksi/v_tabel_trans_service', $data);
		$this->load->view('v_footer');
	}
}

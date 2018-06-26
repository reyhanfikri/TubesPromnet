<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPendapatanTahunan extends CI_Controller
{

	private $tahun;

	public function __construct() {

		parent::__construct();
		$this->load->model(array('MLaporanPenjualanPart', 'MLaporanPendapatanService'));
		$this->tahun = date('Y');

	}

	public function index() {

		if ($this->session->userdata('isLoggedIn')) {

			if ($this->input->post('updatelaporan') !== null) {

				$this->tahun = $this->input->post('year');
				$data['data'] = $this->MLaporanPenjualanPart->getLaporanTahunan($this->tahun);
				$data['data2'] = $this->MLaporanPendapatanService->getLaporanTahunan($this->tahun);

			} else {

				$data['data'] = $this->MLaporanPenjualanPart->getLaporanTahunan($this->tahun);
				$data['data2'] = $this->MLaporanPendapatanService->getLaporanTahunan($this->tahun);

			}

			$data['tahun'] = $this->tahun;

			$this->load->view('v_header');

			if ($data['data'] != 0) {

				$this->load->view('Laporan/v_laporan_tahunan_part', $data);

			} else {

				$this->load->view('Laporan/v_laporan_tahunan_part_kosong', $data);

			}

			if ($data['data2'] != 0) {

				$this->load->view('Laporan/v_laporan_tahunan_service', $data);

			} else {

				$this->load->view('Laporan/v_laporan_tahunan_service_kosong', $data);

			}

			$this->load->view('v_footer');

		} else {

			redirect(site_url('Login'));

		}
		
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanHarian extends CI_Controller
{

	private $tanggal;

	public function __construct() {

		parent::__construct();
		$this->load->model(array('MLaporanPenjualanPart', 'MLaporanPendapatanService'));
		$this->tanggal = date('Y-m-d');

	}

	public function index() {

		if ($this->session->userdata('isLoggedIn')) {

			if ($this->input->post('updatelaporan') !== null) {

				$this->tanggal = $this->input->post('tanggal');
				$data['data'] = $this->MLaporanPenjualanPart->getLaporanHarian($this->tanggal);
				$data['data2'] = $this->MLaporanPendapatanService->getLaporanHarian($this->tanggal);

			} else {

				$data['data'] = $this->MLaporanPenjualanPart->getLaporanHarian($this->tanggal);
				$data['data2'] = $this->MLaporanPendapatanService->getLaporanHarian($this->tanggal);

			}

			$data['tanggal_raw'] = $this->tanggal;
			$data['tanggal'] = date_create($this->tanggal)->format('d/m/Y');
			$temp_hari = date_create($this->tanggal)->format('l');

			if ($temp_hari == "Monday") {

				$data['hari'] = "Senin";

			} else if ($temp_hari == "Tuesday") {

				$data['hari'] = "Selasa";

			} else if ($temp_hari == "Wednesday") {

				$data['hari'] = "Rabu";

			} else if ($temp_hari == "Thursday") {

				$data['hari'] = "Kamis";

			} else if ($temp_hari == "Friday") {

				$data['hari'] = "Jumat";

			} else if ($temp_hari == "Saturday") {

				$data['hari'] = "Sabtu";

			} else if ($temp_hari == "Sunday") {

				$data['hari'] = "Minggu";

			}

			$this->load->view('v_header');
			$this->load->view('Laporan/v_laporan_harian_part', $data);
			$this->load->view('Laporan/v_laporan_harian_service', $data);
			$this->load->view('v_footer');

		} else {

			redirect(site_url('Login'));

		}
		
	}

}

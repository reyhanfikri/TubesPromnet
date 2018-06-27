<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPembelianPart extends CI_Controller
{

	private $bulan_tahun;

	public function __construct() {

		parent::__construct();
		$this->load->model(array('MLaporanPembelianPart'));
		$this->bulan_tahun = date('Y-m');

	}

	public function index() {

		if ($this->session->userdata('isLoggedIn')) {

			if ($this->input->post('updatelaporan') !== null) {

				$this->bulan_tahun = $this->input->post('tahun')."-".$this->input->post('bulan');
				$this->bulan_tahun .= "-01";

				$bulan_tahun_converted_to_time = strtotime($this->bulan_tahun);
				$data['bulan'] = date("m", $bulan_tahun_converted_to_time);
				$data['tahun'] = date("Y", $bulan_tahun_converted_to_time);

				$data['data'] = $this->MLaporanPembelianPart->getGroupByNomorInvoice($this->bulan_tahun);
				$data['data2'] = $this->MLaporanPembelianPart->getTotalTransaksidanNilai($this->bulan_tahun);

			} else {

				$this->bulan_tahun .= "-01";

				$bulan_tahun_converted_to_time = strtotime($this->bulan_tahun);
				$data['bulan'] = date("m", $bulan_tahun_converted_to_time);
				$data['tahun'] = date("Y", $bulan_tahun_converted_to_time);

				$data['data'] = $this->MLaporanPembelianPart->getGroupByNomorInvoice($this->bulan_tahun);
				$data['data2'] = $this->MLaporanPembelianPart->getTotalTransaksidanNilai($this->bulan_tahun);

			}

			$this->load->view('v_header');

			if ($data['data'] != null) {

				$i = 1;

				foreach ($data['data'] as $value) {

					$data_detail[$i] = $this->MLaporanPembelianPart->getDetailLaporan($value->nomor_invoice);
					$i++;

				}

				$data['data_detail'] = $data_detail;
				$data['bulan_tahun'] = date_create($this->bulan_tahun)->format('m/Y');

				$this->load->view('Laporan/v_laporan_pembelian_part', $data);

			} else {

				$data['bulan_tahun'] = date_create($this->bulan_tahun)->format('m/Y');
				$this->load->view('Laporan/v_laporan_pembelian_part_kosong', $data);

			}
			
			$this->load->view('v_footer');

		} else {

			redirect(site_url('Login'));

		}
		
	}

}

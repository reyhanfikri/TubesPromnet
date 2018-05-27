<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
	public function __construct() {

		parent::__construct();
		$this->load->model('MPelanggan');
		$this->load->library('pagination');

	}

	public function index() {

		$config['base_url'] = site_url().'Pelanggan/index';
		$config['total_rows'] = $this->MPelanggan->getAllPelanggan()->num_rows();
		$config['per_page'] = 50;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['attributes'] = array('class' => 'page-link');


		$this->pagination->initialize($config);

		if ($this->uri->segment(3)) {

			$page = ($this->uri->segment(3));

		} else {

			$page = 0;

		}

		$data['pelanggan'] = $this->MPelanggan->getLimitPelanggan($config['per_page'], $page)->result();
		$data['links'] = $this->pagination->create_links();

		$this->load->view('v_header');
		$this->load->view('Pelanggan/v_pelanggan', $data);
		$this->load->view('v_footer');
		
	}

	public function formTambahPelanggan() {

		$this->load->view('v_header');
		$this->load->view('Pelanggan/v_insert_pelanggan');
		$this->load->view('v_footer');

	}

	public function tambahPelanggan() {

		$data = array(

			'nomor_polisi' => $this->input->post('nomor_polisi'),
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
			'merk_type_kendaraan' => $this->input->post('merk_type_kendaraan'),
			'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
			'isi_silinder' => $this->input->post('isi_silinder'),
			'nomor_rangka' => $this->input->post('nomor_rangka'),
			'nomor_mesin' => $this->input->post('nomor_mesin'),
			'bahan_bakar' => $this->input->post('bahan_bakar')

	 	);

		$this->MPelanggan->insertPelanggan($data);
		redirect('Pelanggan');

	}

	public function formEditPelanggan($id) {

		$id = array('id_pelanggan' => $id);
		$data['pelanggan'] = $this->MPelanggan->getById($id)->result();

		$this->load->view('v_header');
		$this->load->view('Pelanggan/v_edit_pelanggan', $data);
		$this->load->view('v_footer');

	}

	public function editPelanggan() {

		$where = array('id_pelanggan' => $this->input->post('id_pelanggan'));

		$data = array(

			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'nomor_polisi' => $this->input->post('nomor_polisi'),
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
			'merk_type_kendaraan' => $this->input->post('merk_type_kendaraan'),
			'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
			'isi_silinder' => $this->input->post('isi_silinder'),
			'nomor_rangka' => $this->input->post('nomor_rangka'),
			'nomor_mesin' => $this->input->post('nomor_mesin'),
			'bahan_bakar' => $this->input->post('bahan_bakar')

	 	);

		$this->MPelanggan->updatePelanggan($where, $data);
		redirect('Pelanggan');

	}

	public function hapusPelanggan($id) {

		$where = array('id_pelanggan' => $id);
		$this->MPelanggan->deletePelanggan($where);
		redirect('Pelanggan');

	}
}

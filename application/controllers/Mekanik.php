<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mekanik extends CI_Controller
{
	public function __construct() {

		parent::__construct();
		$this->load->model('MMekanik');
		$this->load->library('pagination');

	}

	public function index() {

		$config['base_url'] = site_url().'Mekanik/index';
		$config['total_rows'] = $this->MMekanik->getAllMekanik()->num_rows();
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

		$data['mekanik'] = $this->MMekanik->getLimitMekanik($config['per_page'], $page)->result();
		$data['links'] = $this->pagination->create_links();

		$this->load->view('v_header');
		$this->load->view('Mekanik/v_mekanik', $data);
		$this->load->view('v_footer');
		
	}

	public function formTambahMekanik() {

		$this->load->view('v_header');
		$this->load->view('Mekanik/v_insert_mekanik');
		$this->load->view('v_footer');

	}

	public function tambahMekanik() {

		$data = array(

			'nama_mekanik' => $this->input->post('nama_mekanik'),
			'alamat_mekanik' => $this->input->post('alamat_mekanik'),
			'nomor_telepon' => $this->input->post('nomor_telepon')

	 	);

		$this->MMekanik->insertMekanik($data);
		redirect('Mekanik');

	}

	public function formEditMekanik($id) {

		$id = array('id_mekanik' => $id);
		$data['mekanik'] = $this->MMekanik->getById($id)->result();

		$this->load->view('v_header');
		$this->load->view('Mekanik/v_edit_mekanik', $data);
		$this->load->view('v_footer');

	}

	public function editMekanik() {

		$where = array('id_mekanik' => $this->input->post('id_mekanik'));

		$data = array(

			'id_mekanik' => $this->input->post('id_mekanik'),
			'nama_mekanik' => $this->input->post('nama_mekanik'),
			'alamat_mekanik' => $this->input->post('alamat_mekanik'),
			'nomor_telepon' => $this->input->post('nomor_telepon')

	 	);

		$this->MMekanik->updateMekanik($where, $data);
		redirect('Mekanik');

	}

	public function hapusMekanik($id) {

		$where = array('id_mekanik' => $id);
		$this->MMekanik->deleteMekanik($where);
		redirect('Mekanik');

	}
}

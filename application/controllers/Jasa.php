<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MJasa');
		$this->load->library('pagination');
	}

	public function index()
	{
		if ($this->session->userdata('isLoggedIn')) {

			$config['base_url'] = site_url().'Jasa/index';
			$config['total_rows'] = $this->MJasa->getAllJasa()->num_rows();
			$config['per_page'] = 5;
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
			if($this->uri->segment(3))
			{
				$page = ($this->uri->segment(3));
			}
			else
			{
				$page = 0;
			}

			$data['jasa'] = $this->MJasa->getLimitJasa($config['per_page'], $page)->result();
			$data['links'] = $this->pagination->create_links();

			$this->load->view('v_header');
			$this->load->view('Jasa/v_jasa', $data);
			$this->load->view('v_footer');

		} else {

			redirect(site_url('Login'));

		}
	}

	public function formTambahJasa()
	{
		$this->load->view('v_header');
		$this->load->view('Jasa/v_insert_jasa');
		$this->load->view('v_footer');
	}

	public function tambahJasa()
	{
		$data = array(
			'no_jasa' => $this->input->post('no_jasa'),
			'nama_jasa' => $this->input->post('nama_jasa'),
			'harga_jasa' => $this->input->post('harga_jasa')
	 	);
		$this->MJasa->insertJasa($data);
		redirect('Jasa');
	}

	public function formEditJasa($id)
	{
		$where = array('id_jasa' => $id);
		$data['jasa'] = $this->MJasa->editJasa($where)->result();

		$this->load->view('v_header');
		$this->load->view('Jasa/v_edit_jasa', $data);
		$this->load->view('v_footer');
	}

	public function editJasa()
	{
		$where = array('id_jasa' => $this->input->post('id_jasa'));
		$data = array(
			'id_jasa' => $this->input->post('id_jasa'),
			'no_jasa' => $this->input->post('no_jasa'),
			'nama_jasa' => $this->input->post('nama_jasa'),
			'harga_jasa' => $this->input->post('harga_jasa')
	 	);
		$this->MJasa->updateJasa($where, $data);
		redirect('Jasa');
	}

	public function hapusJasa($id)
	{
		$where = array('id_jasa' => $id);
		$this->MJasa->deleteJasa($where);
		redirect('Jasa');
	}
}

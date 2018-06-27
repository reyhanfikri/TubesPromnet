<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Part extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MPart');
		$this->load->library('pagination');
	}

	public function index()
	{

		if ($this->session->userdata('isLoggedIn')) {

			$config['base_url'] = site_url().'Part/index';
			$config['total_rows'] = $this->MPart->getAllPart()->num_rows();
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
			if($this->uri->segment(3))
			{
				$page = ($this->uri->segment(3));
			}
			else
			{
				$page = 0;
			}

			$data['part'] = $this->MPart->getLimitPart($config['per_page'], $page)->result();
			$data['links'] = $this->pagination->create_links();

			$this->load->view('v_header');
			$this->load->view('Part/v_part', $data);
			$this->load->view('v_footer');

		} else {

			redirect(site_url('Login'));

		}
	}

	public function formTambahPart()
	{
		$this->load->view('v_header');
		$this->load->view('Part/v_insert_part');
		$this->load->view('v_footer');
	}

	public function tambahPart()
	{
		$dataPart = $this->MPart->getAllPart()->last_row();

		if (isset($dataPart))
		{
			substr($dataPart->no_part_jasa++, -6);
			$id_part = $dataPart->no_part_jasa;
		}
		else
		{
			$id_part = "SP000001";
		}

		$data = array(
			'no_part_jasa' => $id_part,
			'nama_part_jasa' => $this->input->post('nama_part'),
			'stok_part' => $this->input->post('stok_part'),
			'harga_jual_part_jasa' => $this->input->post('harga_part'),
			'tipe' => "Sparepart"
	 	);
		$this->MPart->insertPart($data);
		redirect('Part');
	}

	public function formEditPart($id)
	{
		$where = array('id_part_jasa' => $id);
		$data['part'] = $this->MPart->editPart($where)->result();

		$this->load->view('v_header');
		$this->load->view('Part/v_edit_part', $data);
		$this->load->view('v_footer');
	}

	public function editPart()
	{
		$where = array('id_part_jasa' => $this->input->post('id_part'));
		$data = array(
			'id_part_jasa' => $this->input->post('id_part'),
			'no_part_jasa' => $this->input->post('no_part'),
			'nama_part_jasa' => $this->input->post('nama_part'),
			'stok_part' => $this->input->post('stok_part'),
			'harga_jual_part_jasa' => $this->input->post('harga_part'),
			'tipe' => "Sparepart"
	 	);
		$this->MPart->updatePart($where, $data);
		redirect('Part');
	}

	public function hapusPart($id)
	{
		$where = array('id_part_jasa' => $id);
		$this->MPart->deletePart($where);
		redirect('Part');
	}
}

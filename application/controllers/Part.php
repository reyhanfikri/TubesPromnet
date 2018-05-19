<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Part extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MPart');
	}

	public function index()
	{
		$num = 0;
		if (!empty($_POST["nomor"])) {
			$num = ($this->input->post('nomor') *100) - 100;
		}

		$data['part'] = $this->MPart->getLimitPart($num)->result();
		$data['numrows'] = $this->MPart->getAllPart()->num_rows()/100;

		$this->load->view('v_header');
		$this->load->view('Part/v_part', $data);
		$this->load->view('v_footer');
	}

	public function tambahPart()
	{
		// code...
	}
}

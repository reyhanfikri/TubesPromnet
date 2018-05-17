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
		$data['part'] = $this->MPart->getAllPart()->result();

		$this->load->view('v_header');
		$this->load->view('v_part', $data);
		$this->load->view('v_footer');
	}
}

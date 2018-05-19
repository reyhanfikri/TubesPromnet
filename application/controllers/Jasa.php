<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MJasa');
	}

	public function index()
	{
		
		$data['jasa'] = $this->MJasa->getAllJasa()->result();

		$this->load->view('v_header');
		$this->load->view('Jasa/v_jasa', $data);
		$this->load->view('v_footer');
	}
}

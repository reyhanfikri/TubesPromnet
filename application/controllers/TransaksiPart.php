<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiPart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('Transaksi/v_trans_part');
		$this->load->view('v_footer');
	}
}

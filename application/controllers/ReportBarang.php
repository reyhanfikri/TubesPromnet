<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportBarang extends CI_Controller {

	public function __construct() {

		parent::__construct();

	}

	public function index() {

		$this->load->view('v_header');
		$this->load->view('Report/v_report_barang');
		$this->load->view('v_footer');
		
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Referensi pembuatan grafik chart: http://mfikri.com/artikel/Membuat-grafik-atau-chart-menggunakan-codeigniter.html
*/

class ReportPart extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('MReportPart');
		$this->load->library('pagination');

	}

	public function index() {

		if ($this->input->post('filter') !== null) {

			$from = $this->input->post('from');
			$to = $this->input->post('to');

			$data['reportpart'] = $this->MReportPart->getAllReportPartByDate($from, $to)->result();

			$data['graphicreportpart'] = $this->MReportPart->getGraphReportPartByDate($from, $to)->result();

			$this->load->view('v_header');
			$this->load->view('Report/v_report_part', $data);
			$this->load->view('v_footer');

		} else if ($this->input->post('filterperbulan') !== null) {

			$month = $this->input->post('month');
			$month .= "-01";

			$data['reportpart'] = $this->MReportPart->getAllReportPartByMonth($month)->result();

			$data['graphicreportpart'] = $this->MReportPart->getGraphReportPartByMonth($month)->result();

			$this->load->view('v_header');
			$this->load->view('Report/v_report_part', $data);
			$this->load->view('v_footer');

		} else {

			$config['base_url'] = site_url().'ReportPart/index';
			$config['total_rows'] = $this->MReportPart->getAllReportPart()->num_rows();
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

			$data['reportpart'] = $this->MReportPart->getLimitReportPart($config['per_page'], $page)->result();
			$data['links'] = $this->pagination->create_links();

			$data['graphicreportpart'] = $this->MReportPart->getGraphReportPart()->result();

			$this->load->view('v_header');
			$this->load->view('Report/v_report_part', $data);
			$this->load->view('v_footer');

		}
		
	}

}

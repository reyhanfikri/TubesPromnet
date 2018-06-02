<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Referensi pembuatan grafik chart: http://mfikri.com/artikel/Membuat-grafik-atau-chart-menggunakan-codeigniter.html
*/

class ReportService extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('MReportService');
		$this->load->library('pagination');

	}

	public function index() {

		if ($this->input->post('filter') !== null) {

			$from = $this->input->post('from');
			$to = $this->input->post('to');

			$data['reportservice'] = $this->MReportService->getAllReportServiceByDate($from, $to)->result();

			$data['graphicreportservice'] = $this->MReportService->getGraphReportServiceByDate($from, $to)->result();

			$this->load->view('v_header');
			$this->load->view('Report/v_report_service', $data);
			$this->load->view('v_footer');

		} else if ($this->input->post('filterperbulan') !== null) {

			$month = $this->input->post('month');
			$month .= "-01";

			$data['reportservice'] = $this->MReportService->getAllReportServiceByMonth($month)->result();

			$data['graphicreportservice'] = $this->MReportService->getGraphReportServiceByMonth($month)->result();

			$this->load->view('v_header');
			$this->load->view('Report/v_report_service', $data);
			$this->load->view('v_footer');

		} else {

			$config['base_url'] = site_url().'ReportService/index';
			$config['total_rows'] = $this->MReportService->getAllReportService()->num_rows();
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

			$data['reportservice'] = $this->MReportService->getLimitReportService($config['per_page'], $page)->result();
			$data['links'] = $this->pagination->create_links();

			$data['graphicreportservice'] = $this->MReportService->getGraphReportService()->result();

			$this->load->view('v_header');
			$this->load->view('Report/v_report_service', $data);
			$this->load->view('v_footer');

		}
		
	}

}

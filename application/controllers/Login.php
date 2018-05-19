<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model(array('MLogin'));

	}

	public function index() {

		if ($this->session->userdata('isLoggedIn')) {

			redirect(site_url('Pelanggan'));

		} else {

			$this->login();

		}
	}

	public function login() {

		$data['error'] = "";

		if ($this->input->post('submit') !== null) {

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$record = $this->MLogin->login($username, $password);

			if ($record){

				$row = $record->row();

				$arrSession = [

					'isLoggedIn' => TRUE,
					'username' => $row->username,
					'password' => $row->password

				];

				$this->session->set_userdata($arrSession);

				redirect(site_url('Pelanggan'));

			}else {

				$data['error'] = "Username/Password tidak benar!";
				$this->load->view('v_login', $data);

			}

		} else {

			$this->load->view('v_login', $data);

		}

	}

	public function logout() {

		$this->session->sess_destroy();
		redirect(site_url('login'));

	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLogin extends CI_Model
{
	public function __construct() {

		parent::__construct();
		
	}

	public function login($username, $password) {

		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$user = $this->db->get('t_user');

		if ($user->num_rows() > 0){

			return $user;

		} else {

			return FALSE;

		}

	}
}

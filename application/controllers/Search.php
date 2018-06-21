<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model(array('MAutoComplete'));

	}

	public function index() {

		if ($this->input->get('term') !== null) {

            $result = $this->MAutoComplete->search($_GET['term']);

            if (count($result) > 0) {

	            foreach ($result as $row) {

	            	$arr_result[] = $row->no_part." - ".$row->nama_part." - ".$row->harga_part." - ".$row->stok_part;

	            }
                
                echo json_encode($arr_result);

            }

        }

	}

	public function test() {

		if ($this->input->post('submit') !== null) {

			echo $this->input->post('part');

		}

	}

}

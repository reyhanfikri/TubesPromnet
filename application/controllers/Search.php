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

	            	$arr_result[] = $row->no_part_jasa." | ".$row->nama_part_jasa." | ".$row->harga_jual_part_jasa." | ".$row->stok_part;

	            }

                echo json_encode($arr_result);

            }

        }

	}

	public function pembelian_part() {

		if ($this->input->get('term') !== null) {

            $result = $this->MAutoComplete->search_pembelian_part($_GET['term']);

            if (count($result) > 0) {

	            foreach ($result as $row) {

	            	$arr_result[] = $row->no_part_jasa." | ".$row->nama_part_jasa." | Harga Beli: ".number_format($row->harga_beli_part)." | Stok: ".$row->stok_part;

	            }

                echo json_encode($arr_result);

            }

        }

	}

}

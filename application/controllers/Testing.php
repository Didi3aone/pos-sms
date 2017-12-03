<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_penjualan');
	}

	public function index() {
		/*$data['userdata'] 	= $this->userdata;
		//$data['dataPenjualan'] 	= $this->M_penjualan->select_all();

		$data['page'] 		= "testing";
		$data['judul'] 		= "Testing";
		$data['deskripsi'] 	= "Manage Testing";

		//$data['modal_tambah_penjualan'] = show_my_modal('modals/modal_tambah_penjualan', 'tambah-penjualan', $data);

		$this->template->views('penjualan/test', $data);*/
		$this->load->view('penjualan/test_datatable_editor');
	}

}

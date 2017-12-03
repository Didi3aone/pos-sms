<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MutasiStock extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_gudang');
    $this->load->model('M_stock');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
    $data['dataGudang'] = $this->M_gudang->select_all();
    $data['dataStock'] 	= $this->M_stock->select_all();


		$data['page'] 		= "mutasi_stock";
		$data['judul'] 		= "Mutasi Stock";
		$data['deskripsi'] 	= "Manage Data Mutasi Stock";

		$this->template->views('mutasi_stock/home', $data);
	}

}

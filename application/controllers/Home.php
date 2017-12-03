<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_jenisUsaha');
		$this->load->model('M_kota');
		$this->load->model('M_gudang');
	}

	public function index() {
		$data['jml_jenisUsaha'] 	= $this->M_jenisUsaha->total_rows();
		$data['jml_kota'] 		= $this->M_kota->total_rows();
		$data['jml_gudang'] 	= $this->M_gudang->total_rows();

		$data['userdata'] 		= $this->userdata;

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Data Point of Sales";
		$this->template->views('home', $data);
	}
}

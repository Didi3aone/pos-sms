<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReturPembelian extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_gudang');
    $this->load->model('M_stock');
		$this->load->model('M_pembelian');
		$this->load->model('M_supplier');
		$this->load->model('M_stock');
		$this->load->model('M_gudang');
		$this->load->model('M_temp');
		$this->load->model('M_admin');

		/*Database terkait
    rtnpembelian
		karturetur
		totrtnpembelian
    */

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
		$data['dataSupplier'] 	= $this->M_supplier->select_all();
		$data['dataStock'] 	= $this->M_stock->select_all();
		$data['dataGudang'] 	= $this->M_gudang->select_all();
		$data['dataTemp'] = $this->M_temp->select_all();
		$data['dataTotal'] = $this->M_temp->grand_total();
		$data['looping'] = $this->M_temp->select_by_last_record();
		$data['dataFakturRetur'] 	= $this->M_pembelian->getFaktur();

		$data['page'] 		= "retur_pembelian";
		$data['judul'] 		= "Retur Pembelian";
		$data['deskripsi'] 	= "Manage Data Retur Pembelian";

		$this->template->views('retur_pembelian/home', $data);
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReturPenjualan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_penjualan');
		$this->load->model('M_supplier');
		$this->load->model('M_gudang');
		$this->load->model('M_admin');
		$this->load->model('M_tempReturPenjualan');
		$this->load->model('M_stock');
		$this->load->model('M_satuan');
    /*Database terkait
    rtnpenjualan
    karturetur
    totrtnpenjualan
    */

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
		$data['dataSupplier'] 	= $this->M_supplier->select_all();
		$data['dataFakturRetur'] 	= $this->M_penjualan->getFaktur();
		$data['dataTempRetur'] 	= $this->M_tempReturPenjualan->select_all();
		$data['dataSTotal'] = $this->M_tempReturPenjualan->sub_total();

		$data['page'] 		= "retur_penjualan";
		$data['judul'] 		= "Retur Penjualan";
		$data['deskripsi'] 	= "Manage Data Retur Penjualan";

		$this->template->views('retur_penjualan/home', $data);
	}

	public function pencarianRetur() {
		$faktur 	= $this->input->post('fakturCari');

		$data['dataReturCari'] = $this->M_penjualan->selectRetur($faktur);
		echo show_my_modal('modals/retur_penjualan/modal_tampil_data', 'cari-retur-beli', $data);
	}

	public function insert() {
		$faktur = $this->input->post('faktur_retur');

		foreach($_POST['cekList'] as $kode) {
			$this->M_tempReturPenjualan->insert($kode, $faktur);
		}
}

public function tambahBaru() {
	$this->M_tempReturPenjualan->reset();
	redirect('ReturPenjualan');
}

public function updateReturPjl() {
	$data['userdata'] 	= $this->userdata;
	$id			= trim($_POST['id']);
	$data['dataReturUpdate'] 	= $this->M_penjualan->select_update($id);
	$data['dataStock'] 	= $this->M_stock->select_all();
	$data['dataSatuan'] 	= $this->M_satuan->select_all();


	echo show_my_modal('modals/retur_penjualan/modal_update_returpjl', 'update-returpjl', $data);
}

public function prosesUpdateReturPjl() {
		$data 	= $this->input->post();
		$this->M_penjualan->update($data);
}

}

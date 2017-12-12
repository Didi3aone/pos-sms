<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfirmasiFakturKembali extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_konfFakturKembali');
		$this->load->model('M_admin');
		$this->load->model('M_penjualan');
		$this->load->model('M_customer');

    /*
    Database yang terkait:
		1. konfirmfaktur
		2. konfirmdraftkembalifaktur
		3. konfirmdraftkembali
		4. totkonfirmfaktur
		5. totpenjualan
    */
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
		$data['dataKonfirmasi'] 	= $this->M_konfFakturKembali->select();

		$data['page'] 		= "konfirmasi_faktur_kembali";
		$data['judul'] 		= "Konfirmasi Faktur Kembali dari Kiriman";
		$data['deskripsi'] 	= "Manage Data Konfirmasi Faktur Kembali";

		$this->template->views('konfirmasi_faktur_kembali/home', $data);
	}

	public function pencarianFakturKembali() {

		$fakturCari 	= $this->input->post('fakturCari');

		$faktur = $this->M_konfFakturKembali->selectFaktur($fakturCari);
		$fakturTemp['Faktur'] = $faktur[0]->faktur;
		$getFaktur = $fakturTemp['Faktur'];

		$data['dataKonfirmasiFaktur'] = $this->M_konfFakturKembali->selectKonfirmasi($getFaktur);
		$data['dataTotal'] = $this->M_konfFakturKembali->grand_total($getFaktur);

		echo show_my_modal('modals/konfirmasi_faktur/modal_tampil_data', 'cari-konf-faktur', $data);
	}

	public function updateKonfirmasiFak() {
		$data['userdata'] 	= $this->userdata;
		$faktur				= trim($_POST['id']);

		$data['dataKonfirmasi'] 	= $this->M_konfFakturKembali->select_data_edit($faktur);

		echo show_my_modal('modals/konfirmasi_faktur/modal_update_konfak', 'update-konfak', $data);
	}

	public function prosesUpdateKonFak() {
		$fak 	= $this->input->post('faktur');
		$tgl 	= $this->input->post('tanggal');
		$cus 	= $this->input->post('customer');
		$dr 	= $this->input->post('draft');
		$tot 	= $this->input->post('total');

		$kodeCus = $this->M_penjualan->selectKodeCus($fak);
		$kodeTemp['Kode'] = $kodeCus[0]->cus;
		$getKode = $kodeTemp['Kode'];

		$this->M_konfFakturKembali->update($fak, $tgl, $cus, $getKode, $dr, $tot);

	}



}

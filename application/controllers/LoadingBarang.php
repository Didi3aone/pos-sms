<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoadingBarang extends AUTH_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_loadingBarang');
		$this->load->model('M_tempLoadingBarang');
		$this->load->model('M_stock');

    /*
    Database yang terkait:
    1. loadingbarang
    2. loadingfaktur
    3. totloading
    */
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
		$data['dataLoading'] = $this->M_tempLoadingBarang->select_all();
		$data['dataLoadBarang'] = $this->M_tempLoadingBarang->select_all_item();
		$data['dataLoadingCus'] 	= $this->M_loadingBarang->select_customer();

		$data['page'] 		= "loading_barang";
		$data['judul'] 		= "Loading Barang";
		$data['deskripsi'] 	= "Manage Data Loading Barang";

		$this->template->views('loading_barang/home', $data);
	}

	public function load() {
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
		$faktur = $this->M_loadingBarang->selectFaktur($data);
		$fakturTemp['Faktur'] = $faktur[0]->faktur;
		$getFaktur = $fakturTemp['Faktur'];

		$data['dataLoad'] = $this->M_loadingBarang->selectLoad($getFaktur);
		echo show_my_modal('modals/loading_barang/modal_load', 'load-barang', $data);
	}

	}

	public function insert() {
		$fakturLoad = $this->input->post('faktur_load');

		foreach($_POST['cekList'] as $faktur){

			$tgl = $this->M_loadingBarang->selectTgl($faktur);
			$tglTemp['Tgl'] = $tgl[0]->tgl;
			$getTgl = $tglTemp['Tgl'];

			$ket = $this->M_loadingBarang->selectCustomer($fakturLoad);
			$ketTemp['Keterangan'] = $ket[0]->ket;
			$getKet = $ketTemp['Keterangan'];

			$this->M_tempLoadingBarang->insert($faktur, $getTgl, $getKet);
		}

		$loop = $this->M_loadingBarang->countFaktur($fakturLoad);
		for($i=0; $i<$loop; $i++) {

			$kode = $this->M_loadingBarang->getKode($fakturLoad);
			$kodeTemp['Kode'] = $kode[$i]->kode;
			$getKode = $kodeTemp['Kode'];

			$nama = $this->M_stock->getNama($getKode);
			$namaTemp['Nama'] = $nama[0]->nama;
			$getNama = $namaTemp['Nama'];

			$sizeL = $this->M_loadingBarang->selectSizeL($getKode);
			$sizeLTemp['L'] = $sizeL[0]->l;
			$getsizeL = $sizeLTemp['L'];

			$sizeM = $this->M_loadingBarang->selectSizeM($getKode);
			$sizeMTemp['M'] = $sizeM[0]->m;
			$getsizeM = $sizeMTemp['M'];

			$sizeS = $this->M_loadingBarang->selectSizeS($getKode);
			$sizeSTemp['S'] = $sizeS[0]->s;
			$getsizeS = $sizeSTemp['S'];

			$this->M_tempLoadingBarang->insertLoading($getKode, $getNama, $getsizeL, $getsizeM, $getsizeS);

		}

	}

	public function tambahBaru() {

		$this->M_tempLoadingBarang->reset();
		$this->M_tempLoadingBarang->resetData();
		redirect('LoadingBarang');

	}

	public function pencarianLoading() {

		$ket 	= $this->input->post('ketCari');

		$faktur = $this->M_loadingBarang->selectFakturCari($ket);
		$fakturTemp['Faktur'] = $faktur[0]->faktur;
		$getFaktur = $fakturTemp['Faktur'];

		$data['dataCari'] = $this->M_loadingBarang->selectLoad($getFaktur);
		echo show_my_modal('modals/loading_barang/modal_cari', 'cari-load-barang', $data);
	}

	public function cariLoad() {
		$fakturLoad = $this->input->post('faktur_load');

		foreach($_POST['cekList'] as $faktur) {

			$tgl = $this->M_loadingBarang->selectTgl($faktur);
			$tglTemp['Tgl'] = $tgl[0]->tgl;
			$getTgl = $tglTemp['Tgl'];

			$ket = $this->M_loadingBarang->selectCustomer($fakturLoad);
			$ketTemp['Keterangan'] = $ket[0]->ket;
			$getKet = $ketTemp['Keterangan'];

			$this->M_tempLoadingBarang->insert($faktur, $getTgl, $getKet);
		}

		$loop = $this->M_loadingBarang->countFaktur($fakturLoad);
		for($i=0; $i<$loop; $i++) {

			$kode = $this->M_loadingBarang->getKode($fakturLoad);
			$kodeTemp['Kode'] = $kode[$i]->kode;
			$getKode = $kodeTemp['Kode'];

			$nama = $this->M_stock->getNama($getKode);
			$namaTemp['Nama'] = $nama[0]->nama;
			$getNama = $namaTemp['Nama'];

			$sizeL = $this->M_loadingBarang->selectSizeL($getKode);
			$sizeLTemp['L'] = $sizeL[0]->l;
			$getsizeL = $sizeLTemp['L'];

			$sizeM = $this->M_loadingBarang->selectSizeM($getKode);
			$sizeMTemp['M'] = $sizeM[0]->m;
			$getsizeM = $sizeMTemp['M'];

			$sizeS = $this->M_loadingBarang->selectSizeS($getKode);
			$sizeSTemp['S'] = $sizeS[0]->s;
			$getsizeS = $sizeSTemp['S'];

			$this->M_tempLoadingBarang->insertLoading($getKode, $getNama, $getsizeL, $getsizeM, $getsizeS);

		}

	}


}

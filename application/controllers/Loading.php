<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loading extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pembelian');
		$this->load->model('M_supplier');
		$this->load->model('M_merk');
		$this->load->model('M_gudang');
		$this->load->model('M_temp');
		$this->load->model('M_kendaraan');
		$this->load->model('M_insentifKirim');
		$this->load->model('M_loading');
		$this->load->model('M_tempKonfDraft');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataJenis'] 	= $this->M_loading->select_jenis_draft();
		$data['dataKendaraan'] 	= $this->M_kendaraan->select_all();
		$data['dataMerk'] 	= $this->M_merk->select_all();
		$data['dataGudang'] 	= $this->M_gudang->select_all();
		$data['dataInsentifKirim'] 	= $this->M_insentifKirim->select_all();
		$data['dataSupir'] 	= $this->M_loading->select_supir();
		$data['dataHelper'] 	= $this->M_loading->select_helper();
		$data['dataTemp'] = $this->M_temp->select_all();
		$data['dataTotal'] = $this->M_temp->grand_total();
		$data['looping'] = $this->M_temp->select_by_last_record();
		$data['dataDraft'] = $this->M_loading->select_all();


		$data['page'] 		= "loading";
		$data['judul'] 		= "Halaman Loading";
		$data['deskripsi'] 	= "Manage Loading Barang ke Gudang";
		$this->template->views('loading/home', $data);
	}

	public function prosesTambah() {
		$tgl = $this->input->post('tgl_draft');
		$jenis = $this->input->post('jenisFaktur');

		$looping = $this->M_loading->countFaktur($tgl, $jenis);
		for($i=0; $i<$looping; $i++) {
		$kodeDraft = $this->M_loading->selectKode($tgl, $jenis);
		$kodeDraftArray['draft'] = $kodeDraft[$i]->dr;
		$getKode = $kodeDraftArray['draft'];

		$this->M_tempKonfDraft->insert($tgl, $jenis, $getKode);
	}
		redirect('Loading');
	}

	public function tambahBaru() {
		$this->M_tempKonfDraft->reset();
		// $this->M_temp->resetData();
		redirect('Loading');
	}

	public function delete() {
		$this->M_temp->delete_by_last_record();
		redirect('Pembelian/index');
	}

	public function simpan($id) {
		$this->form_validation->set_rules('tgl_pembelian', 'Tanggal Pembelian', 'trim|required');
		$this->form_validation->set_rules('supplier', 'Nama Supplier', 'trim|required');
		$this->input->post('faktur_beli');
		$this->form_validation->set_rules('faktur_supplier', 'Faktur Supplier', 'trim|required');
		$this->form_validation->set_rules('jatuh_tempo', 'Jatuh Tempo', 'trim|required');
		$this->input->post('keterangan');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			for($i=0; $i<$id; $i++) {
			$result = $this->M_temp->save($data);
		}
			$resultData = $this->M_pembelian->saveData();
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		redirect('Pembelian/index');
	}

}

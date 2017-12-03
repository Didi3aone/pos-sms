<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PiutangKaryawan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_piutangKaryawan');
		$this->load->model('M_pegawai');

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
		$data['dataPegawai'] 	= $this->M_pegawai->select_pegawai();
		$data['dataPiutangKaryawan'] 	= $this->M_piutangKaryawan->select_faktur();

		$data['page'] 		= "piutang_karyawan";
		$data['judul'] 		= "Piutang Karyawan";
		$data['deskripsi'] 	= "Manage Data Piutang Karyawan";

		$this->template->views('piutang_karyawan/home', $data);
	}

	public function prosesSimpan() {
		$data 	= $this->input->post();
		$this->M_piutangKaryawan->insert($data);
		$this->M_piutangKaryawan->insert_kartu($data);

	}

	public function tambahBaru() {
		redirect('PiutangKaryawan');
	}

	public function pencarianPiutangKar() {
		$faktur = $this->input->post('fakturCari');

		$kodeTemp = $this->M_piutangKaryawan->getKode($faktur);
		$kodeArray['Kode'] = $kodeTemp[0]->kode;
		$kode = $kodeArray['Kode'];

		$data['dataPiutangKar'] = $this->M_piutangKaryawan->select($faktur, $kode);
		echo show_my_modal('modals/piutang_karyawan/modal_tampil_data', 'cari-piukar', $data);

	}

	public function updatePiutangKar() {
		$data['userdata'] 	= $this->userdata;
		$id				= trim($_POST['id']);
		$data['dataPiutang'] 	= $this->M_piutangKaryawan->select_by_id($id);

		$fakturTemp = $this->M_piutangKaryawan->getFaktur($id);
		$fakturArray['Faktur'] = $fakturTemp[0]->faktur;
		$faktur = $fakturArray['Faktur'];

		$kodeTemp = $this->M_piutangKaryawan->getKode($faktur);
		$kodeArray['Kode'] = $kodeTemp[0]->kode;
		$kode = $kodeArray['Kode'];

		$data['dataPegawai'] 	= $this->M_pegawai->select_pegawai();

		$data['dataKaryawan'] 	= $this->M_pegawai->select_by_kode($kode);

		echo show_my_modal('modals/piutang_karyawan/modal_update_piukar', 'update-piukar', $data);
	}

	public function prosesUpdatePiuKar() {
			$data 	= $this->input->post();
			$this->M_piutangKaryawan->update($data);
	}

	public function deletePiuKar() {
		$id = $_POST['id'];
		$this->M_piutangKaryawan->delete($id);
	}


}

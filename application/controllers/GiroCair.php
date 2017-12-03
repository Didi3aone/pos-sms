<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GiroCair extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_giro');
		$this->load->model('M_giroCair');
		$this->load->model('M_totalGiroCair');
		$this->load->model('M_tempGiro');
		$this->load->model('M_bank');
		echo "Testing Update Github";

	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
		$data['dataTotalGiroCair'] 	= $this->M_totalGiroCair->select();
		$data['dataTempGiro'] 	= $this->M_tempGiro->select_all();
		$data['dataTotal'] = $this->M_tempGiro->grand_total();
		$data['looping'] = $this->M_tempGiro->select_by_last_record();
		$data['dataBank'] 	= $this->M_bank->select_all();

		$data['page'] 		= "giro_cair";
		$data['judul'] 		= "Giro Cair";
		$data['deskripsi'] 	= "Manage Data Giro Cair";

		$this->template->views('giro_cair/home', $data);
	}

	public function prosesTambah() {
		$data 	= $this->input->post();
		$this->M_tempGiro->insert($data);
	}

	public function tambahBaru() {
		$this->M_tempGiro->reset();
		$this->M_tempGiro->resetData();
		redirect('GiroCair');
	}

	public function simpan() {
		$data 	= $this->input->post();
		$id = $this->input->post('idLooping');

		$total = $this->M_tempGiro->grand_total();
		$totalTemp['Total'] = $total[0]->g_total;
		$getTotal = $totalTemp['Total'];

		for($i=0; $i<$id; $i++) {
		$this->M_tempGiro->save($data, $getTotal);
	}

		$this->M_giro->save();
		$this->M_giroCair->save();
		$this->M_totalGiroCair->save($data, $getTotal);

		$this->session->set_flashdata('msg', '<div class="alert alert-info">
                    <h4>Informasi:</h4>
                    <p>Data transaksi giro cair berhasil disimpan, klik tombol [Baru] untuk
										melakukan transaksi lagi.</p>
										</div>');

			redirect('GiroCair');


	}


	public function pencarianGiro() {
		// echo "<pre>";
    //     print_r("Testing");
    //     echo "</pre>";
		$faktur = $this->input->post('faktur');

		$data['dataGabungan'] = $this->M_giroCair->select($faktur);
		echo show_my_modal('modals/giro_cair/modal_tampil_data', 'cari-giro', $data);

	}

	public function updateGiro() {
		$data['userdata'] 	= $this->userdata;

		$id				= trim($_POST['id']);
		$data['dataGiroCair'] 	= $this->M_giroCair->select_by_id($id);

		$kodeTemp = $this->M_giroCair->getKode($id);
		$kodeArray['Kode'] = $kodeTemp[0]->kode;
		$kode = $kodeArray['Kode'];

		$data['dataGiro'] 	= $this->M_giro->select_by_kode($kode);
		$data['dataBank'] 	= $this->M_bank->select_all();

		echo show_my_modal('modals/giro_cair/modal_update_giro', 'update-giro', $data);
	}

	public function prosesUpdateGiro() {
			$data 	= $this->input->post();
			$this->M_giro->update($data);
			$this->M_giroCair->update($data);

	}


}

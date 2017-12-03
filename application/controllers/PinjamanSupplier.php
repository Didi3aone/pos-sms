<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamanSupplier extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_supplier');
		$this->load->model('M_admin');
		$this->load->model('M_piutangSupplier');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
		$data['dataSupplier'] 	= $this->M_supplier->select_all();
		$data['dataPiutangSupplier'] 	= $this->M_piutangSupplier->select_faktur();

		$data['page'] 		= "pinjaman_supplier";
		$data['judul'] 		= "Pinjaman Supplier (Principal)";
		$data['deskripsi'] 	= "Manage Data Pinjaman Supplier (Principal)";

		$this->template->views('pinjaman_supplier/home', $data);
	}

	public function prosesSimpan() {
		$data 	= $this->input->post();
		$this->M_piutangSupplier->insert($data);
		//redirect('PinjamanSupplier');
	}

	public function tambahBaru() {
		redirect('PinjamanSupplier');
	}

	public function pencarianPinjamanSup() {
		$faktur = $this->input->post('fakturCari');

		$data['dataPinjamanSup'] = $this->M_piutangSupplier->select_by_faktur($faktur);
		echo show_my_modal('modals/pinjaman_supplier/modal_tampil_data', 'cari-pinsup', $data);

	}

	public function deletePinSup() {
		$id = $_POST['id'];
		$this->M_piutangSupplier->delete($id);
	}

	public function updatePinjamanSup() {
		$data['userdata'] 	= $this->userdata;
		$id				= trim($_POST['id']);

		$data['dataPinjamanSup'] 	= $this->M_piutangSupplier->select_by_id($id);
		$data['dataSupplier'] 	= $this->M_supplier->select_all();

		echo show_my_modal('modals/pinjaman_supplier/modal_update_pinsup', 'update-pinsup', $data);
	}

	public function prosesUpdatePinSup() {
			$data 	= $this->input->post();
			$this->M_piutangSupplier->update($data);

	}



}

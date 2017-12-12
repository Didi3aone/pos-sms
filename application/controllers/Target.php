<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_target');
		$this->load->model('M_salesman');
		$this->load->model('M_stock');
		$this->load->model('M_temp_target','',true);
		$this->load->model('M_satuan');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		// $id = $this->userdata->id;
		$data['dataSalesman'] 	= $this->M_salesman->select_all();
		$data['dataTemp1'] = $this->M_temp_target->select_all_temp1();
		$data['dataTemp2'] = $this->M_temp_target->select_all_temp2();
		$data['dataTemp3'] = $this->M_temp_target->select_all_temp3();
		$data['dataTemp4'] = $this->M_temp_target->select_all_temp4();
		$data['dataTemp'] = $this->M_temp_target->select_tempTarget();
		$data['dataStock'] 	= $this->M_stock->select_all();
		$data['dataSatuan'] = $this->M_satuan->select_all();
		$data['dataTarget'] = $this->M_target->select_all();
		$data['looping'] = $this->M_temp_target->select_temp1_last_record();
		$last=$this->M_temp_target->last_temp();
		// $data['id'] = 
		 $id=$this->M_target->last_record();
		// $data['kode'] = $this->M_target_1->ambil_kode();

		

		$data['page'] 		= "Target";
		$data['judul'] 		= "Target Sales";
		$data['deskripsi'] 	= "Manage Target Sales";

		$this->template->views('target/home', $data);
	}

public function prosesTambah_temp1() {
		$data = $this->input->post();
		$this->M_temp_target->insert_temp1($data);
	}

public function prosesTambah_temp2() {
		$data = $this->input->post();
		$this->M_temp_target->insert_temp2($data);
	}

public function prosesTambah_temp3() {
		$data = $this->input->post();
		$this->M_temp_target->insert_temp3($data);
	}

public function prosesTambah_temp4() {
		$data = $this->input->post();
		$this->M_temp_target->insert_temp4($data);
	}

	public function prosesTambah_tempTarget() {
		$data = $this->input->post();
		$this->M_temp_target->insert_tempTarget($data);
	}

	// public function prosesTambah() {
		
		
	// 	$id = trim($_POST['id']);
	// 	// $id=$_POST['id']+1;
	// 	$ids=$_POST['id']+2;
	// 	$data = $this->input->post();
	// 	$this->M_target_1->insert($data);
	// 	$data['dataKode']=$this->M_target_1->ambil_kode($id);
	// 	$this->M_target_1->ambil_jenis($id);
	// 	$this->M_target_1->insert2($ids, $data,$id);
	// 	// $this->M_target_1->busek($id);
	// 	redirect('Target1');
	// 	// $this->M_target_1->insertpf1();
	// 	// $this->M_target_1->insertpf2();
	// 	// $this->M_target_1->insertpf3();
	// 	// $this->M_target_1->insertpf4();
	// 	// $this->M_temp_target->kosong();
	// }

public function prosesTambah() {
      	$data = $this->input->post();
      	// $kd_sales = $dataTemp->kd_sales;
      	// $jenis = $dataTemp->jenis;


        $this->M_target->insert($data);

        $this->M_temp_target->tr_tempTarget();
        $this->M_target->insertpf1();
		$this->M_target->insertpf2();
	 	$this->M_target->insertpf3();
		$this->M_target->insertpf4();
		$this->M_temp_target->kosong();

        redirect('Target');
			}

	public function tambahBaru() {
      	$this->M_temp_target->tr_tempTarget();
        $this->M_temp_target->kosong();

        redirect('Target');
			}

public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataTarget'] 	= $this->M_target->select_by_id($id);

		echo show_my_modal('modals/modal_update_target', 'update-target', $data);
	}
	
	 public function delete_temp1() {
		$this->M_temp_target->delete_temp1();
		redirect('Target');
	}

public function delete_temp2() {
		$this->M_temp_target->delete_temp2();
		redirect('Target');
	}
	public function delete_temp3() {
		$this->M_temp_target->delete_temp3();
		redirect('Target');
	}
	public function delete_temp4() {
		$this->M_temp_target->delete_temp4();
		redirect('Target');
	}
}

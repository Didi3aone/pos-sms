<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_supplier');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['supplier'] 	= $this->M_supplier->select_all();
		$data['dataKode']	= $this->M_supplier->last_record();

		$data['page'] 		= "supplier";
		$data['judul'] 		= "Master Supplier";
		$data['deskripsi'] 	= "Manage Master Data Supplier";

		$data['modal_tambah_supplier'] = show_my_modal('modals/modal_tambah_supplier', 'tambah-supplier', $data);

		$this->template->views('supplier/home', $data);
	}

	public function tampil() {
		$data['dataSupplier'] = $this->M_supplier->select_all();
		$data['dataKode']	= $this->M_supplier->last_record();
		$this->load->view('supplier/list_data', $data);
	}

	public function prosesTambah() {
    $this->form_validation->set_rules('kode', 'Kode Supplier', 'trim|required');
	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
	$this->form_validation->set_rules('fax', 'Fax', 'trim|required');
	$this->form_validation->set_rules('kota', 'Kota', 'trim|required');

		$data['dataKode']	= $this->M_supplier->last_record();
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_supplier->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Supplier Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$kode				= trim($_POST['id']);
		$data['dataSupplier'] 	= $this->M_supplier->select_by_kode($kode);

		echo show_my_modal('modals/modal_update_supplier', 'update-supplier', $data);
	}

	public function prosesUpdate() {
    $this->form_validation->set_rules('kode', 'Kode Supplier', 'trim|required');
	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
	$this->form_validation->set_rules('fax', 'Fax', 'trim|required');
	$this->form_validation->set_rules('kota', 'Kota', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_supplier->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

public function detail() {
		$data['userdata'] 	= $this->userdata;

		$kode				= trim($_POST['id']);
		$data['dataSupplier'] 	= $this->M_supplier->select_by_kode($kode);

		echo show_my_modal('modals/modal_detail_supplier', 'detail-supplier', $data);
	}

	public function prosesDetail() {
    $this->form_validation->set_rules('kode', 'Kode Supplier', 'trim|required');
	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
	$this->form_validation->set_rules('fax', 'Fax', 'trim|required');
	$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
	$this->form_validation->set_rules('email', 'Email', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_supplier->detail($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Supplier Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$kode = $_POST['id'];
		$result = $this->M_supplier->delete($kode);

		if ($result > 0) {
			echo show_succ_msg('Data Supplier Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Supplier Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_supplier->select_all();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Kode");
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Alamat");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Kota");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Telepon");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Fax");
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', "Nama CP");
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', "Alamat CP");
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', "Telepon CP");
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', "Fax CP");
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', "Email CP");

		$rowCount = 2;
		foreach($data as $value){
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->Kode);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->Nama);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->Alamat);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->Kota);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->Telepon);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->Fax);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->NamaCP1);
			$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->AlamatCP1);
			$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->TelpCP1);
			$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->FaxCP1);
			$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $value->EmailCP1);
		    $rowCount++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save('./assets/excel/Data Supplier.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Supplier.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();

				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_supplier->check_kode($value['B']);

						if ($check != 1) {
							$resultData[$index]['kode'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_supplier->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Supplier Berhasil diimport ke database'));
						redirect('Supplier');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Supplier Gagal diimport ke database', 'warning', 'fa-warning'));
					redirect('Supplier');
				}

			}
		}
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutang extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_hutang');
		$this->load->model('M_supplier');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataHutang'] 	= $this->M_hutang->select_all();
		$data['dataSupplier'] = $this->M_supplier->select_all();
		$data['dataTotal'] = $this->M_hutang->jumlah();
		$data['page'] 		= "hutang";
		$data['judul'] 		= "Master Hutang";
		$data['deskripsi'] 	= "Manage Master Data Hutang";

		$data['modal_tambah_hutang'] = show_my_modal('modals/modal_tambah_hutang', 'tambah-hutang', $data);

		$this->template->views('hutang/home', $data);
	}

	public function tampil() {
		$data['dataHutang'] = $this->M_hutang->select_all();
		$this->load->view('hutang/list_data', $data);
	}

public function total() {
		$data['dataTotal'] = $this->M_hutang->jumlah();
		$this->load->view('hutang/list_total', $data);
	}
	
	public function prosesTambah() {
    $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
	$this->form_validation->set_rules('faktur', 'Faktur', 'trim|required');
	$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');
	$this->form_validation->set_rules('fakasli', 'Faktur Asli', 'trim|required');
	$this->form_validation->set_rules('hutang', 'Hutang', 'trim|required');
	$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_hutang->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Hutang Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Hutang Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataHutang'] 	= $this->M_hutang->select_by_id($id);
		$data['dataSupplier'] = $this->M_supplier->select_all();
		echo show_my_modal('modals/modal_update_hutang', 'update-hutang', $data);
	}

	public function prosesUpdate() {
    $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
	$this->form_validation->set_rules('faktur', 'Faktur', 'trim|required');
	$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');
	$this->form_validation->set_rules('fakasli', 'Faktur Asli', 'trim|required');
	$this->form_validation->set_rules('hutang', 'Hutang', 'trim|required');
	$this->form_validation->set_rules('status', 'Status', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_hutang->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Hutang Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Hutang Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_hutang->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Hutang Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Hutang Gagal dihapus', '20px');
		}
	}



	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_hutang->select_all();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Kode");
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Keterangan");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->Kode);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->Keterangan);
		    $rowCount++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save('./assets/excel/Data Hutang.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Hutang.xlsx', NULL);
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
						$check = $this->M_hutang->check_kode($value['B']);

						if ($check != 1) {
							$resultData[$index]['kode'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_hutang->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Hutang Berhasil diimport ke database'));
						redirect('Hutang');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Hutang Gagal diimport ke database', 'warning', 'fa-warning'));
					redirect('Hutang');
				}

			}
		}
	}
}

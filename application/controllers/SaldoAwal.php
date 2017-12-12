<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaldoAwal extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_saldoAwal');
		$this->load->model('M_stock');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSaldoAwal'] 	= $this->M_saldoAwal->select_all();
		$data['dataStock'] = $this->M_stock->select_all();

		$data['page'] 		= "saldo awal";
		$data['judul'] 		= "Master Saldo Awal";
		$data['deskripsi'] 	= "Manage Master Data Saldo Awal";

		$data['modal_tambah_saldo_awal'] = show_my_modal('modals/modal_tambah_saldo_awal', 'tambah-saldo-awal', $data);

		$this->template->views('saldo_awal/home', $data);
	}

	public function tampil() {
		$data['dataSaldoAwal'] = $this->M_saldoAwal->select_all();
		$data['dataStock'] = $this->M_stock->select_all();
		$this->load->view('saldo_awal/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('sat1', 'Satuan Small', 'trim|required');
		$this->form_validation->set_rules('jml1', 'Jumlah Satuan Small', 'trim|required');
		$this->form_validation->set_rules('sat2', 'Satuan Medium', 'trim|required');
		$this->form_validation->set_rules('jml2', 'Jumlah Satuan Medium', 'trim|required');
		$this->form_validation->set_rules('jml3', 'Jumlah Satuan Large', 'trim|required');

		$data['dataStock'] = $this->M_stock->select_all();
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {

			$result = $this->M_saldoAwal->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Saldo Awal Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Saldo Awal Gagal ditambahkan', '20px');
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
		$data['dataSaldoAwal'] 	= $this->M_saldoAwal->select_by_id($id);
		$data['dataStock'] = $this->M_stock->select_all();

		echo show_my_modal('modals/modal_update_saldo_awal', 'update-saldo-awal', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('sat1', 'Satuan Small', 'trim|required');
		$this->form_validation->set_rules('jml1', 'Jumlah Satuan Small', 'trim|required');
		$this->form_validation->set_rules('sat2', 'Satuan Medium', 'trim|required');
		$this->form_validation->set_rules('jml2', 'Jumlah Satuan Medium', 'trim|required');
		$this->form_validation->set_rules('jml3', 'Jumlah Satuan Large', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_saldoAwal->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Saldo Awal Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Saldo Awal Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_saldoAwal->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Saldo Awal Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Saldo Awal Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_saldoAwal->select_all();

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
		$objWriter->save('./assets/excel/Data Saldo Awal.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Saldo Awal.xlsx', NULL);
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
						$check = $this->M_saldoAwal->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_saldoAwal->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Saldo Awal Berhasil diimport ke database'));
						redirect('SaldoAwal');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Saldo Awal Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('SaldoAwal');
				}

			}
		}
	}
}

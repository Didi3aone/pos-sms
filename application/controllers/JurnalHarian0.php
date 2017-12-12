<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JurnalHarian extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_jurnalHarian');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataJurnalHarian'] 	= $this->M_jurnalHarian->select_all();

		$data['page'] 		= "jurnal_harian";
		$data['judul'] 		= "Master Jurnal Harian";
		$data['deskripsi'] 	= "Manage Master Data Jurnal Harian";

		$data['modal_tambah_jurnal_harian'] = show_my_modal('modals/modal_tambah_jurnal_harian', 'tambah-jurnal-harian', $data);

		$this->template->views('jurnal_harian/home', $data);
	}

	public function tampil() {
		$data['dataJurnalHarian'] = $this->M_jurnalHarian->select_all();
		$this->load->view('jurnal_harian/list_data', $data);
	}

	public function prosesTambah() {
    $this->form_validation->set_rules('kode', 'Kode Jurnal Harian', 'trim|required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_jurnalHarian->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jurnal Harian Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Jurnal Harian Gagal ditambahkan', '20px');
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
		$data['dataJurnalHarian'] 	= $this->M_jurnalHarian->select_by_id($id);

		echo show_my_modal('modals/modal_update_jurnal_harian', 'update-jurnal-harian', $data);
	}

	public function prosesUpdate() {
    $this->form_validation->set_rules('kode', 'Kode Jurnal Harian', 'trim|required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_jurnalHarian->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jurnal Harian Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Jurnal Harian Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_jurnalHarian->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Jurnal Harian Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Jurnal Harian Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_jurnalHarian->select_all();

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
		$objWriter->save('./assets/excel/Data Jurnal Harian.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Jurnal Harian.xlsx', NULL);
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
						$check = $this->M_jurnalHarian->check_kode($value['B']);

						if ($check != 1) {
							$resultData[$index]['kode'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_jurnalHarian->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Jurnal Harian Berhasil diimport ke database'));
						redirect('JurnalHarian');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Jurnal Harian Gagal diimport ke database', 'warning', 'fa-warning'));
					redirect('JurnalHarian');
				}

			}
		}
	}
}

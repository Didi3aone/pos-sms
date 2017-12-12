<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesman extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_salesman');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataSalesman'] 	= $this->M_salesman->select_all();

		$data['page'] 		= "salesman";
		$data['judul'] 		= "Master Salesman";
		$data['deskripsi'] 	= "Manage Master Data Salesman";

		$data['modal_tambah_salesman'] = show_my_modal('modals/modal_tambah_salesman', 'tambah-salesman', $data);

		$this->template->views('salesman/home', $data);
	}

	public function tampil() {
		$data['dataSalesman'] = $this->M_salesman->select_all();
		$this->load->view('salesman/list_data', $data);
	}

	public function prosesTambah() {
    //	$this->form_validation->set_rules('kode', 'Kode Salesman', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Sales', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('fax', 'Fax', 'trim|required');
		$this->form_validation->set_rules('hp', 'Handphone', 'trim|required');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_salesman->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Salesman Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Salesman Gagal ditambahkan', '20px');
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
		$data['dataSalesman'] 	= $this->M_salesman->select_by_id($id);

		echo show_my_modal('modals/modal_update_salesman', 'update-salesman', $data);
	}

	public function prosesUpdate() {
    //$this->form_validation->set_rules('kode', 'Kode Salesman', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Sales', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('fax', 'Fax', 'trim|required');
		$this->form_validation->set_rules('hp', 'Handphone', 'trim|required');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required');
		
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_salesman->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Salesman Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Salesman Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_salesman->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Salesman Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Salesman Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_salesman->select_all();

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
		$objWriter->save('./assets/excel/Data Salesman.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Salesman.xlsx', NULL);
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
						$check = $this->M_salesman->check_kode($value['B']);

						if ($check != 1) {
							$resultData[$index]['kode'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_salesman->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Salesman Berhasil diimport ke database'));
						redirect('Salesman');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Salesman Gagal diimport ke database', 'warning', 'fa-warning'));
					redirect('Salesman');
				}

			}
		}
	}
}

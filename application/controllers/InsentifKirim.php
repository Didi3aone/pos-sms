<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsentifKirim extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_insentifKirim');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['insentifKirim'] 	= $this->M_insentifKirim->select_all();

		$data['page'] 		= "Insentif_Kirim";
		$data['judul'] 		= "Master Insentif Kirim";
		$data['deskripsi'] 	= "Manage Master Data Insentif Kirim";

		$data['modal_tambah_insentif_kirim'] = show_my_modal('modals/modal_tambah_insentif_kirim', 'tambah-insentif-kirim', $data);

		$this->template->views('insentif_kirim/home', $data);
	}

	public function tampil() {
		$data['dataInsentifKirim'] = $this->M_insentifKirim->select_all();
		$this->load->view('insentif_kirim/list_data', $data);
	}

	public function prosesTambah() {
	$this->form_validation->set_rules('jenis', 'Jenis Usaha', 'trim|required');
  $this->form_validation->set_rules('supir', 'Supir', 'trim|required');
	$this->form_validation->set_rules('helper', 'Helper', 'trim|required');


		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_insentifKirim->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Insentif Kirim Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Insentif Kirim ditambahkan', '20px');
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
		$data['dataInsentifKirim'] 	= $this->M_insentifKirim->select_by_id($id);

		echo show_my_modal('modals/modal_update_insentif_kirim', 'update-insentif-kirim', $data);
	}

	public function prosesUpdate() {
	$this->form_validation->set_rules('jenis', 'Jenis Usaha', 'trim|required');
  $this->form_validation->set_rules('supir', 'Supir', 'trim|required');
	$this->form_validation->set_rules('helper', 'Helper', 'trim|required');


		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_insentifKirim->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Insentif Kirim Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Insentif Kirim Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_insentifKirim->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Insentif Kirim Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Insentif Kirim Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_insentifKirim->select_all();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Kode");
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Keterangan");

		$rowCount = 2;
		foreach($data as $value){
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->Kode);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->Nama);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->AN);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->Rek);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->Akun);
		    $rowCount++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save('./assets/excel/Data Insentif Kirim.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Insentif Kirim.xlsx', NULL);
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
						$check = $this->M_insentifKirim->check_kode($value['B']);

						if ($check != 1) {
							$resultData[$index]['kode'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_insentifKirim->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Insentif Kirim Berhasil diimport ke database'));
						redirect('InsentifKirim');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Insentif Kirim Gagal diimport ke database', 'warning', 'fa-warning'));
					redirect('InsentifKirim');
				}

			}
		}
	}
}

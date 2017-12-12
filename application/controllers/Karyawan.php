<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_karyawan');
		$this->load->model('M_jabatan');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKaryawan'] 	= $this->M_karyawan->select_all();
		$data['dataJabatan'] = $this->M_jabatan->select_all();

		$data['page'] 		= "karyawan";
		$data['judul'] 		= "Master Karyawan";
		$data['deskripsi'] 	= "Manage Master Data Karyawan";

		$data['modal_tambah_karyawan'] = show_my_modal('modals/modal_tambah_karyawan', 'tambah-karyawan', $data);

		$this->template->views('karyawan/home', $data);
	}

	public function tampil() {
		$data['dataKaryawan'] = $this->M_karyawan->select_all();
		$data['dataJabatan'] = $this->M_jabatan->select_all();
		$this->load->view('karyawan/list_data', $data);
	}

	public function prosesTambah() {
    	$this->form_validation->set_rules('kode', 'Kode Karyawan', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('kerja', 'Tanggal Kerja', 'trim|required');
		$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_karyawan->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Karyawan Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Karyawan Gagal ditambahkan', '20px');
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
		$data['dataKaryawan'] 	= $this->M_karyawan->select_by_id($id);
		$data['dataJabatan'] = $this->M_jabatan->select_all();

		echo show_my_modal('modals/modal_update_karyawan', 'update-karyawan', $data);
	}

	public function prosesUpdate() {
    $this->form_validation->set_rules('kode', 'Kode Karyawan', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('kerja', 'Tanggal Kerja', 'trim|required');
		$this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_karyawan->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Karyawan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Karyawan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_karyawan->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Karyawan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Karyawan Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_karyawan->select_all();

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
		$objWriter->save('./assets/excel/Data Karyawan.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Karyawan.xlsx', NULL);
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
						$check = $this->M_karyawan->check_kode($value['B']);

						if ($check != 1) {
							$resultData[$index]['kode'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_karyawan->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Karyawan Berhasil diimport ke database'));
						redirect('Karyawan');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Karyawan Gagal diimport ke database', 'warning', 'fa-warning'));
					redirect('Karyawan');
				}

			}
		}
	}
}

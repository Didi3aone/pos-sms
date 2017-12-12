<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HargaBeli extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_hargaBeli');
		$this->load->model('M_supplier');
		$this->load->model('M_stock');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataHargaBeli'] 	= $this->M_hargaBeli->select_all();
		$data['dataSupplier']= $this->M_supplier->select_all();
		$data['dataStock']= $this->M_stock->select_all();
		$data['page'] 		= "Harga Beli";
		$data['judul'] 		= "Master Harga Beli";
		$data['deskripsi'] 	= "Manage Master Data Harga Beli";

		$data['modal_tambah_harga_beli'] = show_my_modal('modals/modal_tambah_harga_beli', 'tambah-harga-beli', $data);

		$this->template->views('harga_beli/home', $data);
	}

	public function tampil() {
		$data['dataHargaBeli'] = $this->M_hargaBeli->select_all();
		$this->load->view('harga_beli/list_data', $data);
	}

	public function prosesTambah() {
    $this->form_validation->set_rules('supplier', 'Kode Supplier', 'trim|required');
	$this->form_validation->set_rules('kode', 'Kode Barang', 'trim|required');
	$this->form_validation->set_rules('hjs', 'Harga Beli Small', 'trim|required');
	$this->form_validation->set_rules('hjm', 'Harga Beli Medium', 'trim|required');
	$this->form_validation->set_rules('hjl', 'Harga Beli Large', 'trim|required');
	
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_hargaBeli->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Harga Beli Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Harga Beli Gagal ditambahkan', '20px');
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
		$data['dataHargaBeli'] 	= $this->M_hargaBeli->select_by_id($id);
		$data['dataSupplier'] = $this->M_supplier->select_all();
		$data['dataStock']= $this->M_stock->select_all();
		echo show_my_modal('modals/modal_update_harga_beli', 'update-harga-beli', $data);
	}

	public function prosesUpdate() {
    $this->form_validation->set_rules('supplier', 'Kode Supplier', 'trim|required');
	$this->form_validation->set_rules('kode', 'Kode Barang', 'trim|required');
	$this->form_validation->set_rules('hjs', 'Harga Beli Small', 'trim|required');
	$this->form_validation->set_rules('hjm', 'Harga Beli Medium', 'trim|required');
	$this->form_validation->set_rules('hjl', 'Harga Beli Large', 'trim|required');
	
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_hargaBeli->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Harga Beli Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Harga Beli Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_hargaBeli->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Harga Beli Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Harga Beli Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_hargaBeli->select_all();

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
		$objWriter->save('./assets/excel/Data Harga Beli.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Harga Beli.xlsx', NULL);
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
						$check = $this->M_hargaBeli->check_kode($value['B']);

						if ($check != 1) {
							$resultData[$index]['kode'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_hargaBeli->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Harga Beli Berhasil diimport ke database'));
						redirect('HargaBeli');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Harga Beli Gagal diimport ke database', 'warning', 'fa-warning'));
					redirect('HargaBeli');
				}

			}
		}
	}
}
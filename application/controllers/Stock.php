<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends AUTH_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('M_stock');
		$this->load->model('M_supplier');
		$this->load->model('M_satuan');
		$this->load->model('M_brand');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataStock'] 	= $this->M_stock->select_all();
		$data['dataSatuan'] = $this->M_satuan->select_all();
		$data['dataBrand']  = $this->M_brand->select_all();
		$data['dataSupplier'] = $this->M_supplier->select_all();
		$data['dataMerk'] = $this->M_stock->getBrand();
		// $brandKode = $dataStock->Merk;
		// $stockSelectKode = $this->M_stock->getKodeBrand($brandKode);
		// $stockTemp['Kode'] = $stockSelectKode[0]->Brand;
		// $getKodeBrand = $StockTemp['Kode'];

		// $data['dataTes'] = $this->M_stock->selectBrand($getKodeBrand);


		$data['page'] 		= "stock";
		$data['judul'] 		= "Master Stock";
		$data['deskripsi'] 	= "Manage Master Data Stock";

		$data['modal_tambah_stock'] = show_my_modal('modals/modal_tambah_stock', 'tambah-stock', $data);

		$this->template->views('stock/home', $data);
	}

	public function tampil() {
		$data['dataStock'] 	= $this->M_stock->select_all();
		$data['dataSatuan'] = $this->M_satuan->select_all();
		$data['dataBrand']  = $this->M_brand->select_all();
		$data['dataSupplier'] = $this->M_supplier->select_all();

		$brandKode = $dataStock->Merk;
		$stockSelectKode = $this->M_stock->getKodeBrand($brandKode);
		$stockTemp['Kode'] = $stockSelectKode[0]->Brand;
		$getKodeBrand = $StockTemp['Kode'];

		$this->load->view('stock/list_data', $data);
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id				= trim($_POST['id']);
		$data['dataStock'] 	= $this->M_stock->select_by_id($id);
		$data['dataSatuan'] = $this->M_satuan->select_all();
		$data['dataBrand']  = $this->M_brand->select_all();
		$data['dataSupplier'] = $this->M_supplier->select_all();
		echo show_my_modal('modals/modal_detail_stock', 'detail-stock', $data);
	}

	public function prosesTambah() {
        $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('sat1', 'Satuan Small', 'trim|required');
		$this->form_validation->set_rules('jml1', 'Jumlah Satuan Small', 'trim|required');
		$this->form_validation->set_rules('sat2', 'Satuan Medium', 'trim|required');
		$this->form_validation->set_rules('jml2', 'Jumlah Satuan Medium', 'trim|required');
		$this->form_validation->set_rules('sat3', 'Satuan Large', 'trim|required');
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		$this->form_validation->set_rules('supplier','Supplier','trim|required');
		$this->form_validation->set_rules('large','Stock Large','trim|required');
		$this->form_validation->set_rules('medium','Stock Medium','trim|required');
		$this->form_validation->set_rules('small','Stock Small','trim|required');
		$this->form_validation->set_rules('min','Stock Minimal','trim|required');
		$this->form_validation->set_rules('max','Stock Maksimal','trim|required');
		$this->form_validation->set_rules('viewSat1_1','Satuan Max/Min','trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result1 = $this->M_stock->insert1($data);
			$result2 = $this->M_stock->insert2($data);

			if (($result1 && $result2) > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stock Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Stock Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id				= trim($_POST['id']);
		$data['dataStock'] 	= $this->M_stock->select_by_id($id);
		$data['dataSatuan'] = $this->M_satuan->select_all();
		$data['dataBrand']  = $this->M_brand->select_all();
		$data['dataSupplier'] = $this->M_supplier->select_all();
		echo show_my_modal('modals/modal_update_stock', 'update-stock', $data);
	}

	public function prosesUpdate() {
        $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('sat1', 'Satuan Small', 'trim|required');
		$this->form_validation->set_rules('jml1', 'Jumlah Satuan Small', 'trim|required');
		$this->form_validation->set_rules('sat2', 'Satuan Medium', 'trim|required');
		$this->form_validation->set_rules('jml2', 'Jumlah Satuan Medium', 'trim|required');
		$this->form_validation->set_rules('sat3', 'Satuan Large', 'trim|required');
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		$this->form_validation->set_rules('supplier','Supplier','trim|required');
		$this->form_validation->set_rules('large','Stock Large','trim|required');
		$this->form_validation->set_rules('medium','Stock Medium','trim|required');
		$this->form_validation->set_rules('small','Stock Small','trim|required');
		$this->form_validation->set_rules('min','Stock Minimal','trim|required');
		$this->form_validation->set_rules('max','Stock Maksimal','trim|required');
		$this->form_validation->set_rules('viewSat1_1','Satuan Max/Min','trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result1 = $this->M_stock->update1($data);
			$result2 = $this->M_stock->update2($data);

			if (($result1 && $result2) > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stock Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stock Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		// $kode = $_POST['kode'];
		$result1 = $this->M_stock->delete($id);
		// $result2 = $this->M_stock->delete2($kode);

		if (($result1) > 0) {
			echo show_succ_msg('Data Stock Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Stock Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_stock->select_all();

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Kode");
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Alamat");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Kota");
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', "Telepon");
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', "Fax");
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', "Email");

		$rowCount = 2;
		foreach($data as $value){
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->Kode);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->Nama);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->Alamat);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->Kota);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->Telepon);
			$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->Fax);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->Email);
		    $rowCount++;
		}

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$objWriter->save('./assets/excel/Data Stock.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Stock.xlsx', NULL);
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
						$check = $this->M_stock->check_kode($value['B']);

						if ($check != 1) {
							$resultData[$index]['kode'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_stock->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Stock Berhasil diimport ke database'));
						redirect('Stock');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Stock Gagal diimport ke database', 'warning', 'fa-warning'));
					redirect('Stock');
				}

			}
		}
	}
}
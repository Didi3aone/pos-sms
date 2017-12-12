<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_customer');
		$this->load->model('M_jenisUsaha');
		$this->load->model('M_kota');
	}

	public function index() {
		
		$data['userdata'] 	= $this->userdata;
		$data['dataCustomer'] 	= $this->M_customer->select_all();
		$data['dataJenisUsaha'] = $this->M_jenisUsaha->select_all();
		$data['dataKota'] = $this->M_kota->select_all();
		// $data['dataKode'] = $this->M_customer->last_record();


		$data['page'] 		= "customer";
		$data['judul'] 		= "Master Customer";
		$data['deskripsi'] 	= "Manage Master Data Customer";

		$data['modal_tambah_customer'] = show_my_modal('modals/modal_tambah_customer', 'tambah-customer', $data);

		$this->template->views('customer/home', $data);
	}

	public function tampil() {

		$data['dataCustomer'] = $this->M_customer->select_all();
		$data['dataKota'] = $this->M_kota->select_all();
		$this->load->view('customer/list_data', $data);
	}


	public function prosesTambah() {
    $this->form_validation->set_rules('kotaInput', 'Kode', 'trim|required');
	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
	$this->form_validation->set_rules('fax', 'Fax', 'trim|required');
	$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
	$this->form_validation->set_rules('jenisUsaha', 'Jenis Usaha', 'trim|required');
	$this->form_validation->set_rules('email', 'E-mail', 'trim|required');

	
	
	// $nama = $this->input->post('nama');
	// $cekNama = $this->M_customer->cek_nama($nama);
	// $namaArray['jumlah'] = $cekNama[0]->jumlah;
	// $getNama = $namaArray['jumlah'];

	$areaArr=$this->input->post('kotaInput');
	$arr_area = explode (",",$areaArr);
	$area = $arr_area[0];
	$kodeTemp= $this->M_customer->last_kode($area);
	$kodeArray['Kode'] = $kodeTemp[0]->kode;
	$getKode = $kodeArray['Kode'];

	// if($kodeTemp != NULL){
	$cutHasil=substr($getKode,4);
  	$b=(int)$cutHasil+1;
  	$urut = sprintf('%04d', $b);
       	// $lastkodeString = (string)$lastkode;
    $gabung= $area."".$urut;
    // }else{
    // 	$urut = '0000';
    // 	$gabung= $area."".$urut;
    // }
              
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_customer->insert($data,$gabung);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Customer Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Customer Gagal ditambahkan', '20px');
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
		$data['dataCustomer'] 	= $this->M_customer->select_by_kode($kode);
		$data['dataJenisUsaha'] = $this->M_jenisUsaha->select_all();
		echo show_my_modal('modals/modal_update_customer', 'update-customer', $data);
	}

	public function prosesUpdate() {

		
   		$data 	= $this->input->post();
		
			$result = $this->M_customer->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Customer Berhasil diupdate', '20px');
			}else {if($result == 0){
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Customer Tidak diupdate', '20px');
			}else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Customer Gagal diupdate', '20px');
			}}
		

		echo json_encode($out);
	}

	public function delete() {
		$kode = $_POST['id'];
		$result = $this->M_customer->delete($kode);

		if ($result > 0) {
			echo show_succ_msg('Data Customer Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Customer Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);

		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_customer->select_all();

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
		$objWriter->save('./assets/excel/Data Customer.xlsx');

		$this->load->helper('download');
		force_download('./assets/excel/Data Customer.xlsx', NULL);
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
						$check = $this->M_customer->check_kode($value['B']);

						if ($check != 1) {
							$resultData[$index]['kode'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_customer->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Customer Berhasil diimport ke database'));
						redirect('Customer');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Customer Gagal diimport ke database', 'warning', 'fa-warning'));
					redirect('Customer');
				}

			}
		}
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pembelian');
		$this->load->model('M_supplier');
		$this->load->model('M_stock');
		$this->load->model('M_gudang');
		$this->load->model('M_temp');
		$this->load->model('M_admin');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
		$data['dataSupplier'] 	= $this->M_supplier->select_all();
		$data['dataStock'] 	= $this->M_stock->select_all();
		$data['dataGudang'] 	= $this->M_gudang->select_all();
		$data['dataTemp'] = $this->M_temp->select_all();
		$data['dataTotal'] = $this->M_temp->grand_total();
		$data['looping'] = $this->M_temp->select_by_last_record();
		$data['dataPembelian'] 	= $this->M_pembelian->select_all();

		$data['page'] 		= "pembelian";
		$data['judul'] 		= "Transaksi Pembelian";
		$data['deskripsi'] 	= "Manage Transaksi Data Pembelian";

		$this->template->views('pembelian/home', $data);
	}

	public function prosesTambah() {
		$this->input->post('kode_beli');
		$namaBarang = $this->input->post('nama_barang');
		$kodeTemp = $this->M_stock->getKode($namaBarang);
		$kodeArray['Kode'] = $kodeTemp[0]->kode;
		$kode = $kodeArray['Kode'];
		$qty = $this->input->post('qty');
    $satuan = $this->input->post('satuan');
		$disc1 = $this->input->post('disc_1');
		$disc2 = $this->input->post('disc_2');
		$disc3 = $this->input->post('disc_3');
		$discRp = $this->input->post('disc_Rp');
		$harga = $this->M_temp->hitungHarga($kode, $satuan);
		$hargaTemp['Harga'] = $harga[0]->harga_beli;
		$getHarga = $hargaTemp['Harga'];
		$hargaFix = $getHarga*$qty;
		$total = $hargaFix-($hargaFix*$disc1+$hargaFix*$disc2+$hargaFix*$disc3+$discRp);
		$this->form_validation->set_rules('exp_date', 'Expired Date', 'trim|required');
		$this->form_validation->set_rules('gudang', 'Kode Gudang', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_temp->insert($data, $getHarga, $total, $kode);
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		//redirect('Pembelian/index/0');
	}

	public function tambahBaru() {
		$this->M_temp->reset();
		$this->M_temp->resetData();
		redirect('Pembelian');
	}

	public function delete() {
		$this->M_temp->delete_by_last_record();
		redirect('Pembelian');
	}

	public function simpan() {
		$this->form_validation->set_rules('tgl_pembelian', 'Tanggal Pembelian', 'trim|required');
		$this->form_validation->set_rules('supplier', 'Nama Supplier', 'trim|required');
		$this->input->post('faktur_beli');
		$this->form_validation->set_rules('faktur_supplier', 'Faktur Supplier', 'trim|required');
		$this->form_validation->set_rules('jatuh_tempo', 'Jatuh Tempo', 'trim|required');
		$this->input->post('keterangan');
		$total = $this->M_temp->grand_total();
		$totalTemp['Total'] = $total[0]->g_total;
		$getTotal = $totalTemp['Total'];
		$id = $this->input->post('idLooping');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			for($i=0; $i<$id; $i++) {
			$result = $this->M_temp->save($data);
		}
			$resultData = $this->M_pembelian->save();
			$resultDt = $this->M_pembelian->saveData($data, $getTotal);
			$this->session->set_flashdata('msg', '<div class="alert alert-info">
                    <h4>Informasi:</h4>
                    <p>Data transaksi pembelian berhasil disimpan, klik tombol [Baru] untuk
										melakukan transaksi lagi.</p>
										</div>');

			redirect('Pembelian');

		}

	}

	public function deleteTransaksi() {
		$id = $_POST['id'];
		$this->M_pembelian->delete($id);
	}

	public function updateTransaksi() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataPembelian'] 	= $this->M_pembelian->select_by_id($id);

		echo show_my_modal('modals/modal_update_beli', 'update-beli', $data);
	}

	public function prosesUpdateTransaksi() {
			$data 	= $this->input->post();
			$this->M_pembelian->update($data);
	}

}

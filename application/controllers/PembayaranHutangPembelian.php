<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembayaranHutangPembelian extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_stock');
    $this->load->model('M_jenisBayar');
    $this->load->model('M_bank');
		$this->load->model('M_pembelian');
		$this->load->model('M_temp2');
		$this->load->model('M_pelunasanHutang');
		$this->load->model('M_totPelunasanHutang');
		$this->load->model('M_pelunasanHutangBayar');
		$this->load->model('M_jr');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
    $data['dataJenisBayar'] = $this->M_jenisBayar->select_all();
    $data['dataBank'] = $this->M_bank->select_all();
		$data['dataFaktur'] = $this->M_pembelian->getFaktur();
		$data['dataTemp'] = $this->M_temp2->select_all();
		$data['dataTemp2'] = $this->M_temp2->select_all2();
		$data['dataID'] = $this->M_temp2->select_id();
		$data['looping'] = $this->M_temp2->select_by_last_record();
		$data['dataTotalHutang'] = $this->M_temp2->total_hutang();
		$data['dataStatus'] = $this->M_jr->select_all();
		$data['getFaktur'] = $this->M_temp2->getFaktur();
		$data['dataPelunasanHutang'] = $this->M_pelunasanHutang->select_all();

		$data['page'] 		= "pembayaran_hutang_pembelian";
		$data['judul'] 		= "Pembayaran Hutang Pembelian";
		$data['deskripsi'] 	= "Manage Data Pembayaran Hutang Pembelian";
		$this->template->views('pembayaran_hutang_pembelian/home', $data);
	}

	public function prosesTambah() {
		$this->input->post('jenis_bayar');
		$this->input->post('nama_bank');
		$this->input->post('keterangan');
		$this->input->post('jatuh_tempo');
		$this->form_validation->set_rules('jumlah', 'Jumlah Bayar', 'trim|required');
		$id = $this->input->post('idLooping');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			for($i=0; $i<=$id; $i++) {
			$result = $this->M_temp2->insert($data);
		}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		redirect('PembayaranHutangPembelian');
	}

	public function prosesTambahBayar() {
		$id = $this->input->post('idLoop');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$faktur = $this->input->post('faktur');
		$this->input->post('tgl');
		$supplierTemp = $this->M_pembelian->getSupplier($faktur);
		$supplierArray['Supplier'] = $supplierTemp[0]->kodeSupplier;
		$kodeSupp = $supplierArray['Supplier'];
		$hutangTemp = $this->M_pembelian->getHutang($faktur);
		$hutangArray['Hutang'] = $hutangTemp[0]->hutang;
		$hutang = $hutangArray['Hutang'];
		$idBayar = $this->input->post('noUrut2');
		$bayarTemp = $this->M_temp2->getBayar($id);
		$bayarArray['Bayar'] = $bayarTemp[0]->jumlah;
		$bayar = $bayarArray['Bayar'];
		if($idBayar <= 1) {
			if($bayar == NULL) {
				$bayar = $hutang;
				$sisa = $bayar-$hutang;
			}
			else {
		$sisa = $bayar-$hutang;
	}
	}
		else {
			if($bayar == NULL) {
				$bayar = $hutang;
				$sisa = $bayar-$hutang;
			}
			else {
			$sisaTemp = $this->M_temp2->lastSisa();
			$sisaArray['Sisa'] = $sisaTemp[0]->sisa;
			$bayar = $sisaArray['Sisa'];
			$sisa = $bayar-$hutang;
			}
		}

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_temp2->insertBayar($data, $kodeSupp, $hutang, $bayar, $sisa);
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		redirect('PembayaranHutangPembelian');
	}

	public function tambahBaru() {
		$this->M_temp2->resetData();
		$this->M_temp2->resetData2();
		$this->M_temp2->resetData3();
		redirect('PembayaranHutangPembelian');
	}

	public function delete() {
		$this->M_temp2->delete_by_last_record();
		redirect('PembayaranHutangPembelian');
	}

	public function deleteBayar() {
		$this->M_temp2->delete_by_last_record2();
		redirect('PembayaranHutangPembelian');
	}

	public function simpan() {
		$this->input->post('faktur_bayar');
		$this->form_validation->set_rules('tgl_bayar', 'Tanggal Pembayaran', 'trim|required');
		$total = $this->input->post('total');
		$id = $this->input->post('idLooping');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			for($i=0; $i<$id; $i++) {
			$result = $this->M_temp2->save($data, $total);

			$fakturTemp = $this->M_temp2->getFaktur();
			$fakturArray['Faktur'] = $fakturTemp[$i]->faktur;
			$faktur = $fakturArray['Faktur'];

			$this->M_pembelian->updateStatus($faktur);
		}
			$resultData = $this->M_pelunasanHutang->save();
			$resultDt = $this->M_pelunasanHutangBayar->save();
			$resultD = $this->M_totPelunasanHutang->save($data);
			$this->session->set_flashdata('msg', '<div class="alert alert-info">
                    <h4>Informasi:</h4>
                    <p>Data transaksi pembayaran hutang pembelian berhasil disimpan, klik tombol [Baru] untuk
										melakukan transaksi lagi.</p>
										</div>');

			redirect('PembayaranHutangPembelian');
		}
	}

	public function deleteTransaksi() {
		$id = $_POST['id'];
		$this->M_pelunasanHutang->delete($id);
	}

	public function updateTransaksi() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataPelunasanHtg'] 	= $this->M_pelunasanHutang->select_by_id($id);

		echo show_my_modal('modals/modal_update_hutang', 'update-hutang', $data);
	}

	public function prosesUpdateTransaksi() {
			$data 	= $this->input->post();
			$this->M_pelunasanHutang->update($data);
	}


}

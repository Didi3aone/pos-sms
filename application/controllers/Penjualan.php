<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_penjualan');
		$this->load->model('M_supplier');
		$this->load->model('M_stock');
		$this->load->model('M_gudang');
		$this->load->model('M_temp3','',true);
		$this->load->model('M_admin');
		$this->load->model('M_testing');
		$this->load->model('M_salesman');
		$this->load->model('M_customer');
		/*
		Cari tidak dapat diedit saat data faktur sudah dieksekusi pada loading atau sudah lunas atau keduanya.
		BNS pada input by text dibuat otomatis default (No Bonus), BNS dapat diedit dengan proses cari.
		Disc default adalah 0, dapat diedit pada proses cari.
		Gudang di input by text dibuat otomatis gudang utama 00.
		Kode lengkap, 3 digit pertama adalah supplier.
		Loading mempengaruhi stock.
		Pembayaran mempengaruhi status lunas.
		Include Ppn tidak digunakan.
		Posisi piutang tidak boleh double bill, boleh jika telah disetujui oleh manajemen.(Lihat email)
		*/
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$id = $this->userdata->id;
		$data['getUser'] = $this->M_admin->select_user($id);
		$data['dataSupplier'] 	= $this->M_supplier->select_all();
		$data['dataSalesman'] 	= $this->M_salesman->select_all();
		$data['dataCustomer'] 	= $this->M_customer->select_all();
		$data['dataTemp'] = $this->M_temp3->select_all();
		$data['dataStock'] 	= $this->M_stock->select_all();
		$data['dataGudang'] 	= $this->M_gudang->select_all();
		$data['dataSTotal'] = $this->M_temp3->sub_total();
		$data['looping'] = $this->M_temp3->select_by_last_record();
		$data['dataPenjualan'] 	= $this->M_penjualan->select_all();

		$data['page'] 		= "Penjualan";
		$data['judul'] 		= "Transaksi Penjualan";
		$data['deskripsi'] 	= "Manage Transaksi Data Penjualan";

		$this->template->views('penjualan/home', $data);
	}

	public function prosesTambah() {
		$this->input->post('kode_jual');
		$namaBarang = $this->input->post('nama_barang');
		$kodeTemp = $this->M_stock->getKode($namaBarang);
		$kodeArray['Kode'] = $kodeTemp[0]->kode;
		$kode = $kodeArray['Kode'];
		$qty = $this->input->post('qty');
    $satuan = $this->input->post('satuan');
		$disc_1 = $this->input->post('disc_1');
		$disc_2 = $this->input->post('disc_2');
		$disc_3 = $this->input->post('disc_3');
		$harga = $this->M_temp3->hitungHarga($kode, $satuan);
		$hargaTemp['Harga'] = $harga[0]->harga_jual;
		$getHarga = $hargaTemp['Harga'];
		$hargaFix = $getHarga*$qty;
		$jumlah = $hargaFix-($hargaFix*$disc_1+$hargaFix*$disc_2+$hargaFix*$disc_3);
		$this->form_validation->set_rules('bns', 'Bonus', 'trim|required');
		$this->form_validation->set_rules('gudang', 'Kode Gudang', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_temp3->insert($data, $getHarga, $jumlah, $kode);
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

	}

	public function tambahBaru() {
		$this->M_temp3->reset();
		$this->M_temp3->resetData();
		redirect('Penjualan/index/0');
	}

	public function delete() {
		$this->M_temp3->delete_by_last_record();
		redirect('Penjualan');
	}

	public function simpan() {
		$ppnTemp = $this->input->post('ppn');
		if($ppnTemp == "yes") {
			$ppn = 0.15;
		}
		else {
			$ppn = 0.00;
		}
		$this->form_validation->set_rules('tgl_penjualan', 'Tanggal Penjualan', 'trim|required');
		$fakturElm1 = $this->input->post('supplier');
		$customerKode = $this->input->post('kd_customer');

		// $cusSelectKode = $this->M_customer->getCustomer($customerKode);
		// $cusTemp['Kode'] = $cusSelectKode[0]->kodeCustomer;
		// $getKodeCus = $cusTemp['Kode'];

		$fakturElm2 = $this->input->post('faktur_jual');
		$fakturCpl = $fakturElm1."-".$fakturElm2;
		$total = $this->M_temp3->sub_total();
		$totalTemp['Total'] = $total[0]->s_total;
		$getTotal = $totalTemp['Total'];
		$id = $this->input->post('idLooping');
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			for($i=0; $i<$id; $i++) {
			$result = $this->M_temp3->save($data, $ppn, $fakturCpl);
		}
			$resultData = $this->M_penjualan->save();
			$resultDt = $this->M_penjualan->saveData($data, $fakturCpl, $customerKode, $getTotal);
			$this->session->set_flashdata('msg', '<div class="alert alert-info">
                    <h4>Informasi:</h4>
                    <p>Data transaksi penjualan berhasil disimpan, klik tombol [Baru] untuk
										melakukan transaksi lagi.</p>
										</div>');

			redirect('Penjualan');

		}

	}

	public function tambahByText() {
		$data = $this->input->post();
		$this->M_temp3->insertByText($data);

	}

	public function ajax_addByText() {
      	$input = $this->input->post('inputText');
				$kodeSpl = $this->input->post('kode_supplier');
				$countHastag = substr_count($input,"#");
				$pecahInputHastag = explode('#',$input,$countHastag+1);

				for($i=0; $i<=$countHastag; $i++) {
				$pecahInput = explode(',',$pecahInputHastag[$i],3);
				$kode = $pecahInput[0];
				$qty = $pecahInput[1];
				$satuan = $pecahInput[2];

				$kodeComplete = $kodeSpl."".$kode;
				$harga = $this->M_temp3->hitungHarga($kodeComplete, $satuan);
				$hargaTemp['Harga'] = $harga[0]->harga_jual;
				$getHarga = $hargaTemp['Harga'];
				$jumlah = $getHarga*$qty;

				$namaBarangTemp = $this->M_stock->getNama($kodeComplete);
				$namaBarangArray['Nama'] = $namaBarangTemp[0]->nama;
				$namaBarang = $namaBarangArray['Nama'];
				$bonus = "N";
				$gudang = "00";

        $this->M_temp3->insertByText($kodeComplete, $namaBarang, $qty, $satuan, $getHarga, $jumlah, $bonus, $gudang);
			}
				echo json_encode(array("status" => TRUE));

	}

	public function deleteTransaksi() {
		$id = $_POST['id'];
		$this->M_penjualan->delete($id);
	}

	public function updateTransaksi() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataPenjualan'] 	= $this->M_penjualan->select_by_id($id);

		echo show_my_modal('modals/modal_update_jual', 'update-jual', $data);
	}

	public function prosesUpdateTransaksi() {
			$data 	= $this->input->post();
			$this->M_penjualan->update($data);
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_temp3 extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

	public function select_all() {
		$this->db->select('*');
		$this->db->from('temp_penjualan');

		$data = $this->db->get();

		return $data->result();
	}

	public function insert($data, $harga, $jumlah, $kode) {
		$sql = "INSERT INTO temp_penjualan(Kode, Nama, Qty, Sat, Harga, Disc1, Disc2, Disc3, Jumlah, Bns, Gdg)
    VALUES('" .$kode."', '" .$data['nama_barang'] ."','" .$data['qty'] ."','" .$data['satuan'] ."',
    '" .$harga ."','" .$data['disc_1'] ."','" .$data['disc_2'] ."','" .$data['disc_3'] ."',
    '" .$jumlah ."','" .$data['bns'] ."','" .$data['gudang'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function sub_total() {
		$sql = "SELECT SUM(Jumlah) AS s_total FROM temp_penjualan";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function reset() {
		$resetTabel = $this->db->truncate('temp_penjualan');
		return $resetTabel;
	}

	public function resetData() {
		$resetTabel = $this->db->truncate('temp_jual');
		return $resetTabel;
	}

	public function delete_by_last_record()
	{
		$sql = "delete from temp_penjualan order by Id desc limit 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function hitungHarga($kode, $satuan) {
		if($satuan == 'CRT') {
			$sql="SELECT hb.HJL AS harga_jual FROM hargajual hb INNER JOIN stock s
			ON hb.Kode='{$kode}' AND s.Kode = hb.Kode";
			$data = $this->db->query($sql);
			return $data->result();
	}
		else if($satuan == 'PAC' || $satuan == 'BAG') {
			$sql="SELECT hb.HJM AS harga_jual FROM hargajual hb INNER JOIN stock s
			ON hb.Kode='{$kode}' AND s.Kode = hb.Kode";
			$data = $this->db->query($sql);
			return $data->result();
		}

		else {
			$sql="SELECT hb.HJS AS harga_jual FROM hargajual hb INNER JOIN stock s
			ON hb.Kode='{$kode}' AND s.Kode = hb.Kode";
			$data = $this->db->query($sql);
			return $data->result();
		}
	}

	public function save($data, $ppn, $faktur) {
		$sql = "INSERT INTO temp_jual(PPn, faktur, tgl, customer, jenis_bayar, supplier, salesman,
 	  jatuh_tempo)
		VALUES('" .$ppn."', '" .$faktur."','" .$data['tgl_penjualan'] ."', '" .$data['customer'] ."',
		'" .$data['jenis_bayar']."', '" .$data['supplier'] ."', '" .$data['salesman'] ."', '" .$data['tgl_top'] ."')";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function select_by_last_record() {
		$sql = "SELECT Id AS id FROM temp_penjualan ORDER BY Id DESC LIMIT 1";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insertByText($kode, $nama, $qty, $satuan, $getHarga, $jumlah, $bonus, $gudang) {
		$sql = "INSERT INTO temp_penjualan(Kode, Nama, Qty, Sat, Harga, Jumlah, Bns, Gdg)
    VALUES('" .$kode."', '" .$nama."', '" .$qty."', '" .$satuan."','" .$getHarga."','" .$jumlah."','" .$bonus."', '" .$gudang."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

}

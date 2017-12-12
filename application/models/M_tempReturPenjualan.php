<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tempReturPenjualan extends CI_Model {

  public function insert($kode, $faktur) {
  		$sql = "INSERT INTO temp_returpenjualan(kode, nama, qty, satuan, harga, disc1, disc2, disc3, total, gudang)
      SELECT b.Kode, a.Nama, b.Qty, b.Satuan, b.Harga, b.Discount, b.Discount2, b.DiscRp, b.Jumlah, b.gudang
      FROM stock a INNER JOIN penjualan b ON a.Kode = '{$kode}' AND b.Kode = '{$kode}'
      WHERE b.Faktur = '{$faktur}'";

  		$this->db->query($sql);

  		return $this->db->affected_rows();
  }

  public function select_all() {
		$this->db->select('*');
		$this->db->from('temp_returpenjualan');

		$data = $this->db->get();

		return $data->result();
	}

  public function sub_total() {
		$sql = "SELECT SUM(total) AS s_total FROM temp_returpenjualan";
		$data = $this->db->query($sql);

		return $data->result();
	}

  public function reset() {
		$resetTabel = $this->db->truncate('temp_returpenjualan');
		return $resetTabel;
	}


}

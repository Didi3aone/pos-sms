<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stock extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('stock');

		$data = $this->db->get();

		return $data->result();
	}

	public function getKode($nama) {
		$sql = "SELECT Kode AS kode FROM stock WHERE Nama = '{$nama}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function getNama($kode) {
		$sql = "SELECT Nama AS nama FROM stock WHERE Kode = '{$kode}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function getBrand(){
		$sql = "SELECT a.Kode AS Kode,
						a.Keterangan AS Merk,
						b.Merk AS StockKode
					FROM merk a, stock b WHERE a.Kode = b.merk LIMIT 1";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function getKodeBrand($brandKode) {
		$sql = "SELECT Keterangan AS Brand FROM merk WHERE Kode = '{$brandKode}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

}

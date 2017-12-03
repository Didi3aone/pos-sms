<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_temp extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('temp_pembelian');

		$data = $this->db->get();

		return $data->result();
	}

	public function insert($data, $harga, $total, $kode) {
		$sql = "INSERT INTO temp_pembelian(Kode, Nama, Qty, Sat, Harga, Disc1, Disc2, Disc3, DiscRp, Total, ExpDate, Gdg)
    VALUES('" .$kode."', '" .$data['nama_barang'] ."','" .$data['qty'] ."','" .$data['satuan'] ."',
    '" .$harga ."','" .$data['disc_1'] ."','" .$data['disc_2'] ."','" .$data['disc_3'] ."',
    '" .$data['disc_Rp'] ."','" .$total ."','" .$data['exp_date'] ."','" .$data['gudang'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete_by_last_record()
	{
		$sql = "delete from temp_pembelian order by Id desc limit 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function grand_total() {
		$sql = "SELECT SUM(Total) AS g_total FROM temp_pembelian";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function reset() {
		$resetTabel = $this->db->truncate('temp_pembelian');
		return $resetTabel;
	}

	public function resetData() {
		$resetTabel = $this->db->truncate('temp_beli');
		return $resetTabel;
	}

	public function hitungHarga($kode, $satuan) {
		if($satuan == 'CRT') {
			$sql="SELECT hb.HJL AS harga_beli FROM hargabeli hb INNER JOIN stock s
			ON hb.Kode='{$kode}' AND s.Kode = hb.Kode";
			$data = $this->db->query($sql);
			return $data->result();
	}
		else if($satuan == 'PAC' || $satuan == 'BAG') {
			$sql="SELECT hb.HJM AS harga_beli FROM hargabeli hb INNER JOIN stock s
			ON hb.Kode='{$kode}' AND s.Kode = hb.Kode";
			$data = $this->db->query($sql);
			return $data->result();
		}

		else {
			$sql="SELECT hb.HJS AS harga_beli FROM hargabeli hb INNER JOIN stock s
			ON hb.Kode='{$kode}' AND s.Kode = hb.Kode";
			$data = $this->db->query($sql);
			return $data->result();
		}
	}

		public function select_by_last_record() {
			$sql = "SELECT Id AS id FROM temp_pembelian ORDER BY Id DESC LIMIT 1";
			$data = $this->db->query($sql);
			return $data->result();
		}

		public function save($data) {
			$sql = "INSERT INTO temp_beli(tgl, faktur, keterangan)
			VALUES('" .$data['tgl_pembelian'] ."', '" .$data['faktur_beli'] ."','" .$data['keterangan'] ."')";
			$this->db->query($sql);

			return $this->db->affected_rows();
		}

}

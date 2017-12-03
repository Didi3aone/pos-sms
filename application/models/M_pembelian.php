<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembelian extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('pembelian');

		$data = $this->db->get();

		return $data->result();
	}

	public function last_record()
	{
		$query ="select * from pembelian order by Faktur DESC LIMIT 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	 public function save() {
		$sql = "INSERT INTO pembelian(Tgl, Faktur, Keterangan, Kode, Qty, Satuan, Harga,
		Discount1, Discount2, Discount3, DiscRp, Jumlah, ExpDate, gudang)
		SELECT b.tgl, b.faktur, b.keterangan, p.Kode, p.Qty, p.Sat, p.Harga, p.Disc1, p.Disc2,
		p.Disc3, p.DiscRp, p.Total, p.ExpDate, p.Gdg FROM temp_beli b INNER JOIN temp_pembelian p ON b.id = p.Id";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

		public function saveData($data, $getTotal) {
			$query = "INSERT INTO totpembelian(Faktur, FakturAsli, status, Tgl, Jthtmp, Supplier, Total, Hutang, DateTime, UserName)
			VALUES('" .$data['faktur_beli']."', '" .$data['faktur_supplier']."', 'Belum Lunas',
			'" .$data['tgl_pembelian']."', '" .$data['jatuh_tempo']."',
			'" .$data['supplier']."', '" .$getTotal."', '" .$getTotal."', '" .$data['today']."', '" .$data['user']."')";

			$this->db->query($query);

			return $this->db->affected_rows();
		}

		public function getFaktur() {
			$sql = "SELECT Faktur FROM totpembelian WHERE status = 'Belum Lunas'";
			$data = $this->db->query($sql);

			return $data->result();
		}

		public function getSupplier($faktur) {
			$sql = "SELECT Supplier AS kodeSupplier FROM totpembelian WHERE Faktur = '{$faktur}'";
			$data = $this->db->query($sql);

			return $data->result();
		}

		public function getHutang($faktur) {
			$sql = "SELECT Hutang AS hutang FROM totpembelian WHERE Faktur = '{$faktur}'";
			$data = $this->db->query($sql);

			return $data->result();
		}

		public function updateStatus($faktur) {
			$sql = "UPDATE totpembelian SET status = 'Lunas' WHERE Faktur = '{$faktur}'";
			$this->db->query($sql);

			return $this->db->affected_rows();
		}

		public function delete($id) {
	 	 $sql = "DELETE FROM pembelian WHERE ID='" .$id ."'";

	 	 $this->db->query($sql);

	 	 return $this->db->affected_rows();
	  }

		public function select_by_id($id) {
	 	 $sql = "SELECT * FROM pembelian WHERE ID = '{$id}'";

	 	 $data = $this->db->query($sql);

	 	 return $data->row();
	  }

		public function update($data) {
	  $sql = "UPDATE pembelian SET Faktur='" .$data['faktur'] ."', Tgl='" .$data['tgl'] ."',
	 	Kode='" .$data['kode'] ."', Harga='" .$data['harga'] ."', Qty='" .$data['qty'] ."',
	 	Satuan='" .$data['sat'] ."', Jumlah='" .$data['jml'] ."', gudang='" .$data['gdg'] ."'
		WHERE ID='" .$data['id'] ."'";

	  	$this->db->query($sql);

	  	return $this->db->affected_rows();
	  }


}

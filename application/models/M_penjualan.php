<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('penjualan');

		$data = $this->db->get();

		return $data->result();
	}

	public function save() {
	 $sql = "INSERT INTO penjualan(Faktur, Tgl, Kode, Qty, Harga, Satuan,
	 Jumlah, gudang)
	 SELECT j.faktur, j.tgl, p.Kode, p.Qty, p.Harga, p.Sat, p.Jumlah, p.Gdg
	 FROM temp_jual j INNER JOIN temp_penjualan p ON j.id = p.Id";
	 $this->db->query($sql);

	 return $this->db->affected_rows();
 }

	 public function saveData($data, $faktur, $getKodeCus, $getTotal) {
		 $query = "INSERT INTO totpenjualan(Jenis, Faktur, Tgl, Jthtmp, Customer, SubTotal, Piutang, DateTime, UserName, Supplier)
		 VALUES('" .$data['jenis_bayar']."', '" .$faktur."', '" .$data['tgl_penjualan']."', '" .$data['tgl_top']."',
		 '" .$getKodeCus."', '" .$getTotal."', '" .$getTotal."', '" .$data['today']."', '" .$data['user']."',
		 '" .$data['supplier']."')";

		 $this->db->query($query);

		 return $this->db->affected_rows();
	 }

	 public function last_record()
 	{
 		$query ="select * from penjualan order by ID DESC LIMIT 1";
 		$res = $this->db->query($query);
 		return $res->result();
 	}

	public function delete($id) {
 	 $sql = "DELETE FROM penjualan WHERE ID='" .$id ."'";

 	 $this->db->query($sql);

 	 return $this->db->affected_rows();
  }

	public function select_by_id($id) {
 	 $sql = "SELECT * FROM penjualan WHERE ID = '{$id}'";

 	 $data = $this->db->query($sql);

 	 return $data->row();
  }

	public function update($data) {
  $sql = "UPDATE penjualan SET Faktur='" .$data['faktur'] ."', Tgl='" .$data['tgl'] ."',
 	Kode='" .$data['kode'] ."', Harga='" .$data['harga'] ."', Qty='" .$data['qty'] ."',
 	Satuan='" .$data['sat'] ."', Jumlah='" .$data['jml'] ."', gudang='" .$data['gdg'] ."'
	WHERE ID='" .$data['id'] ."'";

  	$this->db->query($sql);

  	return $this->db->affected_rows();
  }

	public function selectKodeCus($getFakturJual) {
		$sql = "SELECT Customer as cus FROM totpenjualan WHERE Faktur = '{$getFakturJual}'";

    $data = $this->db->query($sql);

    return $data->result();
	}

	public function getFaktur() {
		$sql = "SELECT Faktur FROM totpenjualan ORDER BY Faktur ASC";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function selectRetur($faktur) {
		$sql = "SELECT penjualan.ID, totpenjualan.Faktur ,penjualan.Kode, (SELECT stock.Nama FROM stock WHERE stock.Kode = penjualan.Kode) AS Nama, penjualan.Qty, penjualan.Satuan,
		penjualan.Harga, penjualan.Discount, penjualan.Discount2, penjualan.DiscRp, penjualan.Jumlah
		FROM penjualan, totpenjualan WHERE penjualan.Faktur = '{$faktur}' AND totpenjualan.Faktur = '{$faktur}'";
    $data = $this->db->query($sql);

    return $data->result();

	}

	public function select_update($id) {
		$sql = "SELECT penjualan.Kode, (SELECT stock.Nama FROM stock WHERE stock.Kode = penjualan.Kode) AS Nama, penjualan.Qty, penjualan.Satuan,
		penjualan.Harga, penjualan.Discount, penjualan.Discount2, penjualan.DiscRp, penjualan.Jumlah
		FROM penjualan WHERE penjualan.ID = '{$id}'";
		$data = $this->db->query($sql);

    return $data->row();

	}

}

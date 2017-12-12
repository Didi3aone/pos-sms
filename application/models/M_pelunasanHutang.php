<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelunasanHutang extends CI_Model {

	public function getSupplier($faktur) {
		$sql = "SELECT Supplier AS kodeSupplier FROM pelunasanhutang WHERE Fkt = '{$faktur}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function getHutang($faktur) {
		$sql = "SELECT Hutang AS hutang FROM pelunasanhutang WHERE Fkt = '{$faktur}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function save() {
	 $sql = "INSERT INTO pelunasanhutang(Faktur, Tgl, Fkt, Status, Bayar, Hutang, Sisa,
	 Supplier) SELECT tp.Faktur, tp.Tgl, ph.Faktur, ph.Status, ph.Bayar, ph.Hutang, ph.Sisa, ph.Supplier
	 FROM temp_totpelunasanhutang tp INNER JOIN temp_pelunasanhutang ph ON tp.Id = ph.Id";
	 $this->db->query($sql);

	 return $this->db->affected_rows();
 }

 public function select_all() {
	 $this->db->select('*');
	 $this->db->from('pelunasanhutang');

	 $data = $this->db->get();

	 return $data->result();
 }

 public function delete($id) {
	 $sql = "DELETE FROM pelunasanhutang WHERE ID='" .$id ."'";

	 $this->db->query($sql);

	 return $this->db->affected_rows();
 }

 public function select_by_id($id) {
	 $sql = "SELECT * FROM pelunasanhutang WHERE ID = '{$id}'";

	 $data = $this->db->query($sql);

	 return $data->row();
 }

 public function update($data) {
 	$sql = "UPDATE pelunasanhutang SET Faktur='" .$data['faktur'] ."', Tgl='" .$data['tgl'] ."',
	Fkt='" .$data['fakturBeli'] ."', Status='" .$data['stat'] ."', Hutang='" .$data['htg'] ."',
	Bayar='" .$data['byr'] ."', Supplier='" .$data['spl'] ."' WHERE ID='" .$data['id'] ."'";

 	$this->db->query($sql);

 	return $this->db->affected_rows();
 }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_brand extends CI_Model {
	public function select_all() {
		$sql = "SELECT m.ID AS ID, 
					   m.Kode AS Kode,
					   m.Keterangan AS Keterangan,
					   s.Nama AS Supplier,
					   m.Supplier AS KodeJenis
				FROM merk m 
				INNER JOIN supplier s ON m.Supplier = s.Kode";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function last_record()
	{
		$query ="SELECT * FROM merk ORDER BY Kode DESC limit 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function select_by_id($id) {
	//	$sql = "SELECT * FROM merk WHERE ID = '{$id}'";
	//	$data = $this->db->query($sql);
	//	return $data->row();
		$sql = "SELECT m.ID AS ID, 
					   m.Kode AS Kode,
					   m.Keterangan AS Keterangan,
					   s.Nama AS Supplier,
					   m.Supplier AS KodeJenis
				FROM merk m 
				INNER JOIN supplier s ON m.Supplier = s.Kode
				WHERE ID = '{$id}'";
		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO merk (Kode, Keterangan, Supplier) 
				VALUES('" .$data['kode'] ."', '" .$data['nama'] ."', '" .$data['supp'] ."')";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('merk', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE merk 
				SET Kode='" .$data['kode'] ."', 
					Keterangan='" .$data['nama'] ."', 
					Supplier='" .$data['supp'] ."'
					
				WHERE ID ='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM merk WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('merk');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('merk');

		return $data->num_rows();
	}
}

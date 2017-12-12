<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_jenisUsaha extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('jenisusaha');
		$data = $this->db->get();
		return $data->result();
	}
	public function select_by_id($id) {
		$sql = "SELECT * FROM jenisusaha WHERE ID = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}
	public function insert($data) {
		$sql = "INSERT INTO jenisusaha(Kode, Keterangan) VALUES('" .$data['kode'] ."', '" .$data['ket'] ."')";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	public function insert_batch($data) {
		$this->db->insert_batch('jenisusaha', $data);
		return $this->db->affected_rows();
	}
	public function update($data) {
		$sql = "UPDATE jenisusaha SET Kode='" .$data['kode'] ."', Keterangan='" .$data['ket'] ."' WHERE ID='" .$data['id'] ."'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	public function delete($id) {
		$sql = "DELETE FROM jenisusaha WHERE ID='" .$id ."'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('jenisusaha');
		return $data->num_rows();
	}
	public function total_rows() {
		$data = $this->db->get('jenisusaha');
		return $data->num_rows();
	}
}

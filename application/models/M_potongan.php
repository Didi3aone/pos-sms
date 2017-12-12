<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_potongan extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('potongan');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM potongan WHERE ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO potongan (Kode, Keterangan, Ket) 
				VALUES('" .$data['kode'] ."', '" .$data['nama'] ."', '" .$data['keterangan'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('potongan', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE potongan 
				SET Kode='" .$data['kode'] ."', 
					Keterangan='" .$data['nama'] ."', 
					Ket='" .$data['keterangan'] ."'
					
				WHERE ID ='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM potongan WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('potongan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('potongan');

		return $data->num_rows();
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bank extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('bank');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM bank WHERE ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO bank(Kode, Nama, AN, Rek, Akun) 
				VALUES('" .$data['kode'] ."', '" .$data['nama'] ."', '" .$data['an'] ."', '" .$data['rek'] ."', '" .$data['akun'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('bank', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE bank 
				SET Kode='" .$data['kode'] ."', 
					Nama='" .$data['nama'] ."', 
					AN='" .$data['an'] ."', 
					Rek='" .$data['rek'] ."',
					Akun= '" .$data['akun'] ."'
				WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM bank WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('bank');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('bank');

		return $data->num_rows();
	}
}

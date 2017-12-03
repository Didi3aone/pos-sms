<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gudang extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('gudang');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM gudang WHERE ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO gudang(Kode, Keterangan, Jenis) VALUES('" .$data['kode'] ."', '" .$data['ket'] ."', '" .$data['jenis'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('gudang', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE gudang SET Kode='" .$data['kode'] ."', Keterangan='" .$data['ket'] ."', Jenis='" .$data['jenis'] ."' WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM gudang WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('gudang');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('gudang');

		return $data->num_rows();
	}
}

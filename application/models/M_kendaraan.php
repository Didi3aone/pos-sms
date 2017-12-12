<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kendaraan extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('kendaraan');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM kendaraan WHERE ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO kendaraan(Kode, Keterangan) VALUES('" .$data['kode'] ."', '" .$data['keterangan'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('kendaraan', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE kendaraan SET Kode='" .$data['kode'] ."', Keterangan='" .$data['keterangan'] ."' WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM kendaraan WHERE ID ='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($kode) {
		$this->db->where('kode', $kode);
		$data = $this->db->get('kendaraan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('kendaraan');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */

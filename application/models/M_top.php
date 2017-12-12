<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_top extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('tpo');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM tpo WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO tpo(Tempo, Keterangan) VALUES('" .$data['tempo'] ."', '" .$data['keterangan'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('tpo', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE tpo SET Tempo='" .$data['tempo'] ."', Keterangan='" .$data['keterangan'] ."' WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM tpo WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($tempo) {
		$this->db->where('tempo', $tempo);
		$data = $this->db->get('tpo');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('tpo');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */

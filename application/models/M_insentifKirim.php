<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_insentifKirim extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('inskirim');

		$data = $this->db->get();

		return $data->result();
	}

public function select_by_id($id) {
		$sql = "SELECT * FROM inskirim WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO inskirim (jenis, supir, helper)
				VALUES('".$data['jenis']."', '" .$data['supir'] ."', '" .$data['helper'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('inskirim', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE inskirim
				SET jenis='" .$data['jenis'] ."',
				supir='" .$data['supir'] ."',
					helper='" .$data['helper'] ."'

				WHERE id ='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM inskirim WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('jenis', $kode);
		$data = $this->db->get('inskirim');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('inskirim');

		return $data->num_rows();
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jurnalHarian extends CI_Model {
	public function select_all() {
		//Editing pada atribut id di table rekening untuk testing
		$sql = "SELECT j.ID AS id, r.KODE AS kode, r.KETERANGAN AS perkiraan, j.Debet As debet, j.Kredit AS kredit FROM jurnal j INNER JOIN rekening r ON j.ID = r.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM jurnal WHERE ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO jurnal(Kode, Keterangan) VALUES('" .$data['kode'] ."', '" .$data['ket'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('jurnal', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE jurnal SET Kode='" .$data['kode'] ."', Keterangan='" .$data['ket'] ."' WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM jurnal WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('jurnal');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('jurnal');

		return $data->num_rows();
	}
}

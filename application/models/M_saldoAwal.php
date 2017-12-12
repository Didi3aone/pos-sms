<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_saldoAwal extends CI_Model {
	public function select_all() {
		$sql = "SELECT 	s.ID AS ID,
						s.Kode AS Kode,
						s.Nama AS Nama, 
						se.S AS Small, 
						s.Satuan1 AS Satuan1,
						se.M As Medium, 
						s.Satuan2 AS Satuan2, 
						se.L AS Large,
						s.Satuan3 AS Satuan3 
				FROM stockedit se INNER JOIN stock s ON s.Kode = se.kode";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM stockedit WHERE ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO stockedit (Kode, L, M, S) 
				VALUES('" .$data['kode'] ."', '" .$data['large'] ."', '" .$data['medium'] ."', 
					   '" .$data['small'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('stockedit', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE stockedit SET Kode='" .$data['kode'] ."', S='" .$data['small'] ."',
								 M='" .$data['medium'] ."', L='" .$data['large'] ."' 
				WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM stockedit WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($kode) {
		$this->db->where('kode', $kode);
		$data = $this->db->get('stockedit');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('stockedit');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */

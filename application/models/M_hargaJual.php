<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hargaJual extends CI_Model {
	public function select_all() {
//		$this->db->select('*');
//		$this->db->from('hargajual');
//		$data = $this->db->get();
//		return $data->result();
		$sql="SELECT h.ID AS ID,
				   h.JenisUsaha AS KodeJenis,
				   j.Keterangan AS JenisUsaha,
				   h.Kode AS KodeBarang,
				   st.Nama AS Barang,
				   h.HJL AS HJL,
				   h.HJM AS HJM,
				   h.HJS AS HJS
				   
			FROM hargajual h 
			JOIN jenisusaha j ON h.JenisUsaha = j.Kode
			JOIN stockbaru st ON h.Kode = st.Kode";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT h.ID AS ID,
				   h.JenisUsaha AS KodeJenis,
				   j.Keterangan AS JenisUsaha,
				   h.Kode AS KodeBarang,
				   st.Nama AS Barang,
				   h.HJL AS HJL,
				   h.HJM AS HJM,
				   h.HJS AS HJS
				   
			FROM hargajual h 
			JOIN jenisusaha j ON h.JenisUsaha = j.Kode
			JOIN stockbaru st ON h.Kode = st.Kode
			WHERE h.ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO hargajual (JenisUsaha, Kode, HJL, HJM, HJS) 
				VALUES('" .$data['jenisUsaha'] ."', '" .$data['kode'] ."', '" .$data['hjl'] ."',
						'".$data['hjm']."','".$data['hjs']."'	)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('hargajual', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE hargajual 
				SET JenisUsaha='" .$data['jenisUsaha'] ."', 
					Kode='" .$data['kode'] ."', 
					HJL='" .$data['hjl'] ."' ,
					HJM='" .$data['hjm'] ."',
					HJS='" .$data['hjs'] ."'
				WHERE ID ='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM hargajual WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('hargajual');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('hargajual');

		return $data->num_rows();
	}
}

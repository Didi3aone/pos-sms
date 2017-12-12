<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hargaBeli extends CI_Model {
	public function select_all() {
		// $this->db->select('*');
		// $this->db->from('hargabeli');

		// $data = $this->db->get();
	$sql = "SELECT hargabeli.ID AS ID,
				   hargabeli.Supplier AS KodeSupp,
				   (SELECT supplier.Nama FROM supplier WHERE supplier.Kode=hargabeli.Supplier) AS Supplier,
				   hargabeli.Kode AS KodeBarang,
				   (SELECT stock.Nama FROM stock WHERE stock.Kode=hargabeli.Kode) AS Barang,
				   hargabeli.HJL AS HJL,
				   hargabeli.HJM AS HJM,
				   hargabeli.HJS AS HJS
				   FROM hargabeli
			";
	$data = $this->db->query($sql);

	return $data->result();
		
	}

	public function select_by_id($id) {
		$sql = "SELECT h.ID AS ID,
				   h.Supplier AS KodeSupp,
				   s.Nama AS Supplier,
				   h.Kode AS KodeBarang,
				   st.Nama AS Barang,
				   h.HJL AS HJL,
				   h.HJM AS HJM,
				   h.HJS AS HJS
				   
			FROM hargabeli h 
			JOIN supplier s ON h.Supplier = s.Kode
			JOIN stockbaru st ON h.Kode = st.Kode
			WHERE h.ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO hargabeli (Supplier, Kode, HJL, HJM, HJS) 
				VALUES('".$data['supplier']."', '".$data['kode']."', 
						'".$data['hjl']."','".$data['hjm']."',
						'".$data['hjs']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('hargabeli', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE hargabeli 
				SET Supplier='" .$data['supplier'] ."', 
					Kode='" .$data['kode'] ."', 
					HJL='" .$data['hjl'] ."' ,
					HJM='" .$data['hjm'] ."',
					HJS='" .$data['hjs'] ."'
				WHERE ID ='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM hargabeli WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('hargabeli');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('hargabeli');

		return $data->num_rows();
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hutang extends CI_Model {
	public function select_all() {
		$sql = "SELECT h.ID AS ID,
				   h.Kode AS Kode,
				   h.Tanggal AS Tanggal,
				   h.Faktur AS Faktur,
				   s.Nama AS Supplier,
				   h.FakturAsli AS FakturAsli,
				   h.Hutang AS Hutang,
				   h.Status AS Status,
				   h.Supplier AS KodeSupp
			FROM hutang h INNER JOIN supplier s ON h.Supplier = s.Kode";
	$data = $this->db->query($sql);

	return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT h.ID AS ID,
				   h.Kode AS Kode,
				   h.Tanggal AS Tanggal,
				   h.Faktur AS Faktur,
				   s.Nama AS Supplier,
				   h.FakturAsli AS FakturAsli,
				   h.Hutang AS Hutang,
				   h.Status AS Status,
				   h.Supplier AS KodeSupp 
			FROM hutang h INNER JOIN supplier s ON h.Supplier = s.Kode 
			WHERE ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function jumlah(){
		$query = "SELECT Status, SUM(Hutang) AS Total FROM Hutang WHERE Status != 'Lunas' ";      
		$data = $this->db->query($query);
		return $data->result();
	}
	

	public function last_record()
	{
		$query ="SELECT * FROM hutang ORDER BY Kode DESC limit 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO hutang (Kode, Tanggal, Faktur, Supplier, FakturAsli, Hutang, Status) 
				VALUES('" .$data['kode'] ."', '" .$data['tanggal'] ."', '" .$data['faktur'] ."',
						'".$data['supplier']."','".$data['fakasli']."', '" .$data['hutang'] ."', '" .$data['status'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('hutang', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE hutang 
				SET Kode='" .$data['kode'] ."',
					Tanggal= '" .$data['tanggal'] ."',
					Faktur='" .$data['faktur'] ."',
					Supplier= '" .$data['supplier'] ."',
					FakturAsli= '" .$data['fakasli'] ."',
					Hutang= '" .$data['hutang'] ."',
					Status= '" .$data['status'] ."'
					 WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM hutang WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('hutang');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('hutang');

		return $data->num_rows();
	}
}

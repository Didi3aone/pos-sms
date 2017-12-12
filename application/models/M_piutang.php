<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_piutang extends CI_Model {
	public function select_all() {
		$sql = "SELECT p.ID AS ID,
				   p.Kode AS Kode,
				   p.Tanggal AS Tanggal,
				   p.Faktur AS Faktur,
				   c.Nama AS Customer,
				   p.FakturAsli AS FakturAsli,
				   p.Piutang AS Piutang,
				   p.Status AS Status,
				   p.Customer AS KodeCus
			FROM piutang p INNER JOIN customer c ON p.Customer = c.Kode";
	$data = $this->db->query($sql);

	return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT p.ID AS ID,
				   p.Kode AS Kode,
				   p.Tanggal AS Tanggal,
				   p.Faktur AS Faktur,
				   c.Nama AS Customer,
				   p.FakturAsli AS FakturAsli,
				   p.Piutang AS Piutang,
				   p.Status AS Status,
				   p.Customer AS KodeCus
			FROM piutang p INNER JOIN customer c ON p.Customer = c.Kode 
			WHERE p.ID = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function jumlah(){
		$query = "SELECT Status, SUM(Piutang) AS Total FROM Piutang WHERE Status != 'Lunas' ";      
		$data = $this->db->query($query);
		return $data->result();
	}
	

	public function last_record()
	{
		$query ="SELECT * FROM piutang ORDER BY Kode DESC limit 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO piutang (Kode, Tanggal, Faktur, Customer, FakturAsli, Piutang, Status) 
				VALUES('" .$data['kode'] ."', '" .$data['tanggal'] ."', '" .$data['faktur'] ."',
						'".$data['customer']."','".$data['fakasli']."', '" .$data['piutang'] ."', '" .$data['status'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('piutang', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE piutang 
				SET Kode='" .$data['kode'] ."',
					Tanggal= '" .$data['tanggal'] ."',
					Faktur='" .$data['faktur'] ."',
					Customer= '" .$data['customer'] ."',
					FakturAsli= '" .$data['fakasli'] ."',
					Piutang= '" .$data['piutang'] ."',
					Status= '" .$data['status'] ."'
					 WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM piutang WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('piutang');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('piutang');

		return $data->num_rows();
	}
}

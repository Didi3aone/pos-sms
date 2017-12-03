<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_piutangSupplier extends CI_Model {

	public function select_faktur() {
		$this->db->select('*');
		$this->db->from('piutangsup');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_faktur($faktur) {
		$sql = "SELECT * FROM piutangsup WHERE faktur = '{$faktur}'";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM piutangsup WHERE id = '{$id}'";

		$data = $this->db->query($sql);

    return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO piutangsup(tgl, faktur, supplier, keterangan, penerima, jumlah, username, datetime)
		VALUES('" .$data['tgl'] ."', '" .$data['faktur'] ."', '" .$data['kd_supplier'] ."', '" .$data['keterangan'] ."', '" .$data['penerima'] ."',
		'" .$data['jumlah'] ."', '" .$data['user'] ."', '" .$data['today'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function last_record()
	{
		$query ="select * from piutangsup order by faktur DESC LIMIT 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function update($data) {
		$sql = "UPDATE piutangsup SET tgl='" .$data['tanggal'] ."', supplier='" .$data['kode_supplier'] ."', keterangan='" .$data['keterangan'] ."',
		penerima='" .$data['penerima'] ."', jumlah='" .$data['jumlah'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM piutangsup WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

}

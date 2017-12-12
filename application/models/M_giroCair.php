<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_giroCair extends CI_Model {
	public function select_by_id($id) {
    $sql = "SELECT * FROM girocair WHERE ID = '{$id}'";

    $data = $this->db->query($sql);

    return $data->row();
	}

	public function getKode($id) {
		$sql = "SELECT Kode AS kode FROM girocair WHERE ID = '{$id}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function update($data) {
	$sql = "UPDATE girocair SET Kode='" .$data['no_bukti'] ."', bank='" .$data['bank'] ."'
	WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function select($faktur) {
	    $sql = "SELECT a.ID, a.Kode, b.JthTmp, b.Jumlah, a.bank FROM girocair a, giro b WHERE a.Faktur = '{$faktur}'
			AND b.Kode = a.Kode";
	    $data = $this->db->query($sql);

	    return $data->result();
	}

	public function save() {
		$sql = "INSERT INTO girocair(Faktur, Tgl, Kode, bank)
		SELECT b.faktur, b.tgl, a.no_bukti, a.bank
		FROM temp_giro a INNER JOIN temp_girocair b ON a.id = b.id";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}


}

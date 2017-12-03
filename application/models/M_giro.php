<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_giro extends CI_Model {

	public function select_by_kode($kode) {
	 $sql = "SELECT * FROM giro WHERE Kode = '{$kode}'";

	 $data = $this->db->query($sql);

	 return $data->row();
	}

	public function update($data) {
	$sql = "UPDATE giro SET Kode='" .$data['no_bukti'] ."', JthTmp='" .$data['jth_tempo'] ."',
	Jumlah='" .$data['jumlah'] ."' WHERE id='" .$data['kode'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function last_record()
	{
		$query ="select * from giro order by Faktur DESC LIMIT 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function save() {
		$sql = "INSERT INTO giro(Kode, Faktur, Status, Tgl, JthTmp, Jumlah, Username,
		Datetime)
		SELECT a.no_bukti, b.faktur_2, a.status, b.tgl, a.jatuh_tempo, a.jumlah, b.username,
		b.time FROM temp_giro a INNER JOIN temp_girocair b ON a.id = b.id";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_totalGiroCair extends CI_Model {
	public function select() {
		$this->db->select('Faktur, Total, Keterangan');
		$this->db->from('totgirocair');

		$data = $this->db->get();

		return $data->result();
	}

	public function last_record()
	{
		$query ="select * from totgirocair order by Faktur DESC LIMIT 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function save($data, $getTotal) {
		$sql = "INSERT INTO totgirocair(Tgl, Keterangan, Total, Username, Datetime, Faktur)
		VALUES('" .$data['tanggal']."', '" .$data['keterangan']."', '" .$getTotal."',
		'" .$data['user']."', '" .$data['today']."', '" .$data['faktur']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenisBayar extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('jenisbayar');

		$data = $this->db->get();

		return $data->result();
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_salesman extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('salesman');

		$data = $this->db->get();

		return $data->result();
	}

}

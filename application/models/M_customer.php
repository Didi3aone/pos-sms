<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('customer');

		$data = $this->db->get();

		return $data->result();
	}

	public function getCustomer($customerKode) {
		$sql = "SELECT kodebaru AS kodeCustomer FROM cus WHERE kodelama = '{$customerKode}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function getNama($kodeCus) {
		$sql = "SELECT Nama AS nama FROM customer WHERE Kode = '{$kodeCus}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function getKode($nama) {
		$sql = "SELECT Kode AS kode FROM customer WHERE Nama = '{$nama}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

}

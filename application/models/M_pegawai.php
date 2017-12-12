<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

  public function select_pegawai() {
    $this->db->select('kode, nama, jabatan');
    $this->db->from('pegawai');

    $data = $this->db->get();

    return $data->result();
  }

  public function select_by_kode($kode) {
	 $sql = "SELECT * FROM pegawai WHERE kode = '{$kode}'";

	 $data = $this->db->query($sql);

	 return $data->row();
	}


}

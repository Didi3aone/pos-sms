<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tempGiro extends CI_Model {

public function select_all() {
  $this->db->select('*');
  $this->db->from('temp_giro');

  $data = $this->db->get();

  return $data->result();
}

public function insert($data) {
  $sql = "INSERT INTO temp_giro(no_bukti, jatuh_tempo, jumlah, bank, status)
  VALUES('" .$data['no_bukti'] ."','" .$data['jatuh_tempo'] ."','" .$data['jumlah'] ."',
  '" .$data['bank'] ."', '" ."1"."')";

  $this->db->query($sql);

  return $this->db->affected_rows();
}

public function grand_total() {
  $sql = "SELECT SUM(jumlah) AS g_total FROM temp_giro";
  $data = $this->db->query($sql);

  return $data->result();
}

public function reset() {
  $resetTabel = $this->db->truncate('temp_giro');
  return $resetTabel;
}

public function resetData() {
  $resetTabel = $this->db->truncate('temp_girocair');
  return $resetTabel;
}

public function save($data, $getTotal) {
  $sql = "INSERT INTO temp_girocair(faktur, tgl, ket, total, faktur_2, username, time)
  VALUES('" .$data['faktur'] ."', '" .$data['tanggal'] ."','" .$data['keterangan'] ."', '" .$getTotal."'
  , '" .$data['faktur2'] ."', '" .$data['user'] ."', '" .$data['today'] ."')";
  $this->db->query($sql);

  return $this->db->affected_rows();
}

public function select_by_last_record() {
  $sql = "SELECT id AS id FROM temp_giro ORDER BY id DESC LIMIT 1";
  $data = $this->db->query($sql);
  return $data->result();
}

}

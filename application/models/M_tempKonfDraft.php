<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tempKonfDraft extends CI_Model {

public function insert($tgl, $jenis, $getKode) {
  $sql = "INSERT INTO temp_konfirmdraft(tgl, jenis, draft)
VALUES('" .$tgl."', '" .$jenis."', '" .$getKode."')";

$this->db->query($sql);

return $this->db->affected_rows();

}

public function reset(){
  $resetTabel = $this->db->truncate('temp_konfirmdraft');
		return $resetTabel;
}



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_totPelunasanHutang extends CI_Model {

  public function last_record()
	{
		$query ="select * from totpelunasanhutang order by ID DESC LIMIT 1";
		$res = $this->db->query($query);
		return $res->result();
	}

  public function save($data) {
	 $sql = "INSERT INTO totpelunasanhutang(UserName, DateTime, TotalSisa, Faktur, Tgl, TotalBayar, TotalLunas, TotalHutang)
	 VALUES('".$data['user']."', '".$data['today']."', 0, (SELECT Faktur FROM temp_totpelunasanhutang order by ID DESC LIMIT 1),
   (SELECT Tgl FROM temp_totpelunasanhutang order by ID DESC LIMIT 1),
   (SELECT total_bayar FROM temp_totpelunasanhutang order by ID DESC LIMIT 1),
   (SELECT total_bayar FROM temp_totpelunasanhutang order by ID DESC LIMIT 1),
   (SELECT total_hutang FROM temp_totpelunasanhutang order by ID DESC LIMIT 1))";
	 $this->db->query($sql);
	 return $this->db->affected_rows();
 }

}

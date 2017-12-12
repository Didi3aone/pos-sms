<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelunasanHutangBayar extends CI_Model {

	public function save() {
	 $sql = "INSERT INTO pelunasanhutangbayar(Tgl, Faktur, Jenis, JthTmp, Jumlah, Bank)
	 SELECT tp.Tgl, tp.Faktur, phb.Jenis, phb.Jatuh_Tempo, phb.Jumlah, phb.Bank
	 FROM temp_totpelunasanhutang tp INNER JOIN temp_pelunasanhutangbayar phb ON tp.Id = phb.Id";
	 $this->db->query($sql);

	 return $this->db->affected_rows();
 }

}

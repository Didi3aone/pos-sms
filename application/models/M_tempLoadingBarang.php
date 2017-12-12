<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tempLoadingBarang extends CI_Model {

  public function insert($faktur, $getTgl, $getKet) {
  		$sql = "INSERT INTO temp_loadingfaktur(faktur, tanggal, customer)
  		VALUES('" .$faktur."', '" .$getTgl."', '" .$getKet."')";

  		$this->db->query($sql);

  		return $this->db->affected_rows();
  }

  public function select_all() {
    $this->db->select('*');
		$this->db->from('temp_loadingfaktur');

		$data = $this->db->get();

		return $data->result();
  }

  public function insertLoading($getKode, $getNama, $getsizeL, $getsizeM, $getsizeS) {
  		$sql = "INSERT INTO temp_loadingbarang(kode, nama, L, M, S)
  		VALUES('" .$getKode."', '" .$getNama."', '" .$getsizeL."', '" .$getsizeM."', '" .$getsizeS."')";

  		$this->db->query($sql);

  		return $this->db->affected_rows();
  }

  public function select_all_item() {
    $this->db->select('*');
		$this->db->from('temp_loadingbarang');

		$data = $this->db->get();

		return $data->result();
  }

  public function reset() {
		$resetTabel = $this->db->truncate('temp_loadingfaktur');
		return $resetTabel;
	}

	public function resetData() {
		$resetTabel = $this->db->truncate('temp_loadingbarang');
		return $resetTabel;
	}

}

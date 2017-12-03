<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_loadingBarang extends CI_Model {

  public function selectFaktur($data) {
    $sql = "SELECT Faktur as faktur FROM totloading WHERE Keterangan = '" .$data['keterangan'] ."'";

		$data = $this->db->query($sql);

    return $data->result();
  }

  public function selectFakturCari($ket) {
    $sql = "SELECT Faktur as faktur FROM totloading WHERE Keterangan = '{$ket}'";

		$data = $this->db->query($sql);

    return $data->result();
  }

  public function selectLoad($faktur) {
    $sql = "SELECT a.FakJual, a.Tgl, b.Keterangan, b.Faktur FROM loadingfaktur a, totloading b WHERE a.Faktur = '{$faktur}'
    AND a.Faktur = b.Faktur";
    $data = $this->db->query($sql);

    return $data->result();
  }

  public function selectTgl($faktur) {
    $sql = "SELECT Tgl as tgl FROM loadingfaktur WHERE FakJual = '{$faktur}'";

    $data = $this->db->query($sql);

    return $data->result();
  }

  public function selectCustomer($fakturLoad) {
    $sql = "SELECT Keterangan as ket FROM totloading WHERE Faktur = '{$fakturLoad}'";

    $data = $this->db->query($sql);

    return $data->result();

  }

  public function countFaktur($fakturLoad) {
    $this->db->select('*');
    $this->db->where('Faktur',$fakturLoad);
    $hitung=$this->db->get('loadingbarang');
    $count=$hitung->result();
    return count($count);
  }

  public function getKode($fakturLoad) {
    $sql = "SELECT Kode as kode FROM loadingbarang WHERE Faktur = '{$fakturLoad}'";

    $data = $this->db->query($sql);

    return $data->result();

  }

  public function selectSizeL($getKode) {
    $sql = "SELECT L as l FROM loadingbarang WHERE Kode = '{$getKode}'";

    $data = $this->db->query($sql);

    return $data->result();

  }

  public function selectSizeM($getKode) {
    $sql = "SELECT M as m FROM loadingbarang WHERE Kode = '{$getKode}'";

    $data = $this->db->query($sql);

    return $data->result();

  }

  public function selectSizeS($getKode) {
    $sql = "SELECT S as s FROM loadingbarang WHERE Kode = '{$getKode}'";

    $data = $this->db->query($sql);

    return $data->result();

  }

  public function select_customer() {
		$this->db->select('Keterangan');
		$this->db->from('totloading');

		$data = $this->db->get();

		return $data->result();
	}

  public function selectCari() {
    $sql = "SELECT a.FakJual, a.Tgl, b.Keterangan, b.Faktur FROM loadingfaktur a, totloading b
    WHERE a.Faktur = b.Faktur";
    $data = $this->db->query($sql);

    return $data->result();
  }

}

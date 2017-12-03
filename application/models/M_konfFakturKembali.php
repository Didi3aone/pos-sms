<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_konfFakturKembali extends CI_Model {

  public function select() {
		$this->db->select('faktur');
		$this->db->from('totkonfirmfaktur');

		$data = $this->db->get();

		return $data->result();
	}

  public function selectFaktur($fakturCari) {
    $sql = "SELECT faktur as faktur FROM konfirmfaktur WHERE faktur = '{$fakturCari}'";

    $data = $this->db->query($sql);

    return $data->result();
  }

  public function selectFakJu($getFaktur) {
    $sql = "SELECT fakturjual as faktur_jual FROM konfirmfaktur WHERE faktur = '{$getFaktur}'";

    $data = $this->db->query($sql);

    return $data->result();

  }

  public function selectKonfirmasi($getFaktur) {
    $sql = "SELECT konfirmfaktur.fakturjual AS Faktur,
	  konfirmfaktur.tgl AS Tanggal,
	  (SELECT customer.Nama FROM customer WHERE customer.Kode = totpenjualan.Customer) AS Nama,
    (SELECT konfirmdraftkembali.draft FROM konfirmdraftkembali WHERE konfirmdraftkembali.faktur_jual = konfirmdraftkembalifaktur.fakjual) AS Draft,
    (SELECT totpenjualan.Total FROM totpenjualan WHERE totpenjualan.Faktur = konfirmfaktur.fakturjual) AS Total
    FROM konfirmfaktur
    JOIN totpenjualan ON konfirmfaktur.fakturjual = totpenjualan.Faktur
    JOIN konfirmdraftkembali ON totpenjualan.Faktur = konfirmdraftkembali.faktur_jual
    JOIN konfirmdraftkembalifaktur ON konfirmdraftkembali.faktur_jual = konfirmdraftkembalifaktur.fakjual
    WHERE konfirmfaktur.faktur = '{$getFaktur}'";

    $data = $this->db->query($sql);

    return $data->result();
  }

  public function grand_total($getFaktur) {
		$sql = "SELECT SUM(a.Total) AS g_total FROM totpenjualan a, konfirmfaktur b
    WHERE b.fakturjual = a.Faktur AND b.faktur = '{$getFaktur}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

  public function countFaktur($getFaktur) {
    $this->db->select('*');
    $this->db->where('faktur',$getFaktur);
    $hitung=$this->db->get('konfirmfaktur');
    $count=$hitung->result();
    return count($count);
  }

  public function select_data_edit($faktur) {
    $sql = "SELECT konfirmfaktur.fakturjual AS Faktur, konfirmfaktur.tgl AS Tanggal,
    (SELECT customer.Nama FROM customer WHERE customer.Kode = totpenjualan.Customer) AS Customer,
    (SELECT konfirmdraftkembali.draft FROM konfirmdraftkembali WHERE konfirmdraftkembali.faktur_jual = konfirmdraftkembalifaktur.fakjual) AS Draft,
    (SELECT totpenjualan.Total FROM totpenjualan WHERE totpenjualan.Faktur = konfirmfaktur.fakturjual) AS Total
    FROM konfirmfaktur
    JOIN totpenjualan ON konfirmfaktur.fakturjual = totpenjualan.Faktur
    JOIN konfirmdraftkembali ON totpenjualan.Faktur = konfirmdraftkembali.faktur_jual
    JOIN konfirmdraftkembalifaktur ON konfirmdraftkembali.faktur_jual = konfirmdraftkembalifaktur.fakjual
    WHERE konfirmfaktur.fakturjual = '{$faktur}'";

    $data = $this->db->query($sql);

    return $data->row();

  }

  public function update($fak, $tgl, $cus, $getKode, $dr, $tot) {

    // $this->db->set('a.tgl', $tgl);
    // $this->db->set('b.Nama', $cus);
    // $this->db->where('a.fakturjual', $fak);
    // $this->db->where('b.Kode = c.Customer');
    // $this->db->update('konfirmfaktur as a, customer as b, totpenjualan c');

    // $sql = "UPDATE konfirmfaktur SET tgl='" .$data['tanggal'] ."', supplier='" .$data['tanggal'] ."', keterangan='" .$data['customer'] ."',
		// penerima='" .$data['draft'] ."', jumlah='" .$data['total'] ."' WHERE id='" .$data['id'] ."'";
    //
    // $sql = "UPDATE konfirmfaktur SET tgl='" .$data['faktur'] ."', supplier='" .$data['tanggal'] ."', keterangan='" .$data['customer'] ."',
    //
    // penerima='" .$data['draft'] ."', jumlah='" .$data['total'] ."' WHERE id='" .$data['id'] ."'";
    //
    //

    $sql = "UPDATE konfirmfaktur a, customer b, totpenjualan c, konfirmdraftkembali d
                    SET a.tgl = '$tgl', b.Nama = '$cus',
                    d.draft = '$dr', c.Total ='$tot'
                    WHERE a.fakturjual = '$fak'
                    AND c.Faktur = '$fak'
                    AND b.Kode = '$getKode'
                    AND c.Customer = '$getKode'
                    AND d.faktur_jual = '$fak'";

		$this->db->query($sql);

		return $this->db->affected_rows();

  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_piutangKaryawan extends CI_Model {

	public function select_faktur() {
		$this->db->select('*');
		$this->db->from('bon');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_faktur($faktur) {
		$sql = "SELECT * FROM bon WHERE faktur = '{$faktur}'";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM bon WHERE id = '{$id}'";

		$data = $this->db->query($sql);

    return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO bon(tgl, faktur, kode, jumlah, username, datetime)
		VALUES('" .$data['tgl'] ."', '" .$data['faktur'] ."', '" .$data['kd_karyawan'] ."', '" .$data['jumlah'] ."',
		'" .$data['user'] ."', '" .$data['today'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_kartu($data) {
		$sql = "INSERT INTO kartubon(Faktur, Tgl, kode, Keterangan, Debet, UserName, DateTime)
		VALUES('" .$data['faktur'] ."', '" .$data['tgl'] ."', '" .$data['kd_karyawan'] ."', '" ."Pinjaman Karyawan"."',
		'" .$data['jumlah'] ."', '" .$data['user'] ."', '" .$data['today'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function last_record()
	{
		$query ="select * from bon order by faktur DESC LIMIT 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function getKode($faktur) {
		$sql = "SELECT kode AS kode FROM bon WHERE faktur = '{$faktur}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select($faktur, $kode) {
	    $sql = "SELECT a.id, a.tgl, b.nama, b.jabatan, a.jumlah FROM bon a, pegawai b WHERE a.faktur = '{$faktur}'
			AND b.Kode = '{$kode}'";
	    $data = $this->db->query($sql);

	    return $data->result();
	}

	public function getFaktur($id) {
    $sql = "SELECT faktur AS faktur FROM bon WHERE id = '{$id}'";
    $data = $this->db->query($sql);

    return $data->result();
  }

	public function update($data) {
		$sql = "UPDATE bon SET tgl='" .$data['tanggal'] ."', kode='" .$data['kode_karyawan'] ."', 
		jumlah='" .$data['jumlah'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM bon WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {
	public function select_all() {
	//	$this->db->select('*');
	//	$this->db->from('pegawai');
	//	$data = $this->db->get();
	//	return $data->result();
		$sql="SELECT p.id AS ID,
					 p.kode AS Kode,
					 p.nama AS Nama,
					 p.alamat AS Alamat,
					 p.jabatan AS KodeJab,
					 j.Keterangan AS Jabatan,
					 p.tgllahir AS Lahir,
					 p.tglkerja AS Kerja,
					 p.userinfo AS Info,
					 p.jk AS JK
			  FROM pegawai p
			  JOIN jabatan j 
			  ON p.jabatan=j.Kode";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT p.id AS ID,
					 p.kode AS Kode,
					 p.nama AS Nama,
					 p.alamat AS Alamat,
					 p.jabatan AS KodeJab,
					 j.Keterangan AS Jabatan,
					 p.tgllahir AS Lahir,
					 p.tglkerja AS Kerja,
					 p.userinfo AS Info,
					 p.jk AS JK
			  FROM pegawai p
			  JOIN jabatan j 
			  ON p.jabatan=j.Kode
			  WHERE p.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO pegawai (kode, nama, alamat, jabatan, tgllahir,tglkerja, jk) 
				VALUES ('" .$data['kode'] ."', '" .$data['nama'] ."', '" .$data['alamat'] ."', 
						'" .$data['jabatan'] ."', '" .$data['lahir'] ."', '" .$data['kerja'] ."',
						'" .$data['jenkel']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pegawai', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE pegawai 
				SET kode='" .$data['kode'] ."',
					nama = '" .$data['nama'] ."' , 
					alamat ='" .$data['alamat'] ."' , 
					jabatan ='" .$data['jabatan'] ."', 
					tgllahir ='" .$data['lahir'] ."', 
					tglkerja='" .$data['kerja'] ."',
					jk='".$data['jenkel']."'
				WHERE id ='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM pegawai WHERE id ='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {
	public function select_all() {
	//	$this->db->select('*');
	//	$this->db->from('customer');

	//	$data = $this->db->get();

	//	return $data->result();
	$sql = "SELECT customer.id AS ID,
				   customer.Kode AS Kode,
		           customer.Nama AS Nama, 
				   customer.Alamat AS Alamat, 
				   customer.Telepon AS Telepon,
				   customer.Fax As Fax, 
				   (SELECT kota.Keterangan FROM kota WHERE customer.Kota = kota.Kode) AS Kota, 
				   (SELECT jenisusaha.Keterangan FROM jenisusaha WHERE customer.JenisUsaha = jenisusaha.Kode) AS JenisUsaha,
				   customer.EmailCP1 AS EmailCP1,
				   customer.JenisUsaha AS KodeJenis
			FROM customer ";
	$data = $this->db->query($sql);

	return $data->result();
	}
	public function last_record()
	{
		$query ="SELECT * FROM customer ORDER BY Kode DESC limit 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function select_by_kode($kode) {
		$sql = "SELECT customer.id AS ID,
				   customer.Kode AS Kode,
		           customer.Nama AS Nama, 
				   customer.Alamat AS Alamat, 
				   customer.Telepon AS Telepon,
				   customer.Fax As Fax, 
				   customer.Kota AS Kota, 
				   (SELECT jenisusaha.Keterangan FROM jenisusaha WHERE customer.JenisUsaha = jenisusaha.Kode) AS JenisUsaha,
				   customer.EmailCP1 AS EmailCP1,
				   customer.JenisUsaha AS KodeJenis
			FROM customer  
			WHERE customer.Kode = '{$kode}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data,$gabung) {
		$sql = "INSERT INTO customer (Kode, Nama, Alamat,  Telepon, Fax, Kota, JenisUsaha, EmailCP1) 
				VALUES('" .$gabung."', '".$data['nama']."', '".$data['alamat']."',
						'".$data['telepon']."','".$data['fax']."', '" .$data['kota'] ."', '" .$data['jenisUsaha'] ."', '" .$data['email'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('customer', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE customer 
				SET Kode='" .$data['kode'] ."',
					Nama= '" .$data['nama'] ."',
					Alamat='" .$data['alamat'] ."',
					Telepon= '" .$data['telepon'] ."',
					Fax= '" .$data['fax'] ."',
					Kota= '" .$data['kota'] ."',
					JenisUsaha= '" .$data['jenisUsaha'] ."',
					EmailCP1= '" .$data['email'] ."'
				WHERE Kode='" .$data['kode'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($kode) {
		$sql = "DELETE FROM customer WHERE Kode ='" .$kode ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Kode', $kode);
		$data = $this->db->get('customer');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('customer');

		return $data->num_rows();
	}

	public function last_kode($area){
		
		$this->db->SELECT('Kode AS kode');
		$this->db->FROM('customer');
		$this->db->LIKE('Kode', $area , 'after' );
		$this->db->ORDER_BY('Kode', 'DESC');
		$this->db->LIMIT(1);
		$data = $this->db->get();

		return $data->result();

		// if($area){
  //           $text.="LIKE '".$area."%'";
  //       }
  //       return $this->db->query("
  //           SELECT Kode AS kode FROM customer WHERE Kode
  //           ".$text."
  //           ORDER BY Kode DESC LIMIT 1
  //       ");

	}

	public function cek_nama($nama){
		$sql = "SELECT COUNT( * ) AS jumlah FROM customer WHERE Nama = '{$nama}' HAVING COUNT( Nama )";
		$data=$this->db->query($sql);
		return $data->result();
	}
}

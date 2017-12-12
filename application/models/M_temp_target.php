<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_temp_target extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    public function select_tempTarget() {
		$query ="SELECT kd_sales,jenis FROM temp_target ORDER BY id DESC limit 1";
		$res = $this->db->query($query);
		return $res->result();
	}

	public function select_all_temp1() {
		$this->db->select('*');
		$this->db->from('temp_target_1');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_all_temp2() {
		$this->db->select('*');
		$this->db->from('temp_target_2');

		$data = $this->db->get();

		return $data->result();
	}

public function select_all_temp3() {
		$this->db->select('*');
		$this->db->from('temp_target_3');

		$data = $this->db->get();

		return $data->result();
	}

public function select_all_temp4() {
		$this->db->select('*');
		$this->db->from('temp_target_4');

		$data = $this->db->get();

		return $data->result();
	}

public function insert_temp1($data) {
		$sql = "INSERT INTO temp_target_1 (No,Nama, Kode, Salesman)
    VALUES('" .$data['no1']."', '" .$data['nama_barang1'] ."','" .$data['kode1'] ."','".$data['kd_sales']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

public function insert_tempTarget($data) {
		$sql = "INSERT INTO temp_target (kd_sales,jenis)
    VALUES('" .$data['kd_sales']."', '" .$data['jenis'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

public function last_temp()
	{
		$query ="select id from temp_target order by id DESC LIMIT 1";
		$res = $this->db->query($query);
		return $res->result();
	}

public function tr_tempTarget(){
	$resetTabel = $this->db->truncate('temp_target');
		return $resetTabel;

}

public function insert_temp2($data) {
		$sql = "INSERT INTO temp_target_2 (No,Nama, Kode, Salesman)
    VALUES('" .$data['no2']."', '" .$data['nama_barang2'] ."','" .$data['kode2'] ."','".$data['kd_sales']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

public function insert_temp3($data) {
		$sql = "INSERT INTO temp_target_3 (No,Nama, Kode, Salesman)
    VALUES('" .$data['no3']."', '" .$data['nama_barang3'] ."','" .$data['kode3'] ."','".$data['kd_sales']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

public function insert_temp4($data) {
		$sql = "INSERT INTO temp_target_4 (No,Nama, Kode, Salesman)
    VALUES('" .$data['no4']."', '" .$data['nama_barang4'] ."','" .$data['kode4'] ."','".$data['kd_sales']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

public function kosong(){
	$this->db->truncate('temp_target_1');
	$this->db->truncate('temp_target_2');
	$this->db->truncate('temp_target_3');
	$this->db->truncate('temp_target_4');
	// $this->query("TRUNCATE temp_target_1");
	// $this->query("TRUNCATE temp_target_2");
	// $this->query("TRUNCATE temp_target_3");
	// $this->query("TRUNCATE temp_target_4");
	}
public function delete_temp1()
	{
		$sql = "DELETE FROM temp_target_1 ORDER BY No DESC LIMIT 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function delete_temp2()
	{
		$sql = "DELETE FROM temp_target_2 ORDER BY No DESC LIMIT 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	public function delete_temp3()
	{
		$sql = "DELETE FROM temp_target_3 ORDER BY No DESC LIMIT 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	public function delete_temp4()
	{
		$sql = "DELETE FROM temp_target_4 ORDER BY No DESC LIMIT 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function select_temp1_last_record() {
		$sql = "SELECT No AS id FROM temp_target_1 ORDER BY No DESC LIMIT 1";
		$data = $this->db->query($sql);
		return $data->result();
	}
}

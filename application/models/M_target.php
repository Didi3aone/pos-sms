<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_target extends CI_Model {
	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('target');

		$data = $this->db->get();

		return $data->result();
	}	

// public function insertByText($kode, $qty, $satuan, $getHarga, $jumlah, $bonus, $gudang) {
// 		$sql = "INSERT INTO temp_penjualan(Kode, Qty, Sat, Harga, Jumlah, Bns, Gdg)
//     VALUES('" .$kode."', '" .$qty."', '" .$satuan."','" .$getHarga."','" .$jumlah."','" .$bonus."', '" .$gudang."')";

// 		$this->db->query($sql);

// 		return $this->db->affected_rows();
// 	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM target WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function last_record()
	{
		$query ="SELECT id AS ID FROM target ORDER BY id DESC LIMIT 1";
		$res = $this->db->query($query);
		return $res->result();
	}



	public function insert($data,$kd_sales,$jenis) {
		// $kd_sales = $this->db->query("SELECT kd_sales FORM temp_target WHERE id='{$last}'");
		// $jenis = $this->db->query("SELECT jenis FORM temp_target WHERE id='{$last}'");
		$sql = "INSERT INTO target(salesman, target, bobot, targetpf1, satpf1, targetpf2, satpf2, targetpf3, satpf3, targetpf4, satpf4, bobotpf, targetec, bobotec, targetoa, bobotoa, targetar, bobotar, jenis) 
			VALUES('".$kd_sales."','".$data['target']."','".$data['bobot']."',
				   '".$data['target1']."','".$data['satuan1']."','".$data['target2']."',
				   '".$data['satuan2']."','".$data['target3']."','".$data['satuan3']."',
				   '".$data['target4']."','".$data['satuan4']."','".$data['bobot4']."',
				   '".$data['targetEC']."','".$data['bobotEC']."','".$data['targetOA']."',
				   '".$data['bobotOA']."','".$data['targetAR']."','".$data['bobotAR']."',
				   '".$jenis."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	// public function ambil_kode($id){
		
	// 	$sql = "SELECT salesman FROM target WHERE id = '{$id}'";

	// 	$data = $this->db->query($sql);

	// 	return $data->row();
	// }

	// public function ambil_jenis($id){
	// 	$b=mysql_query("SELECT jenis FROM target WHERE id='{$id}'");
	// 	return $b->result_array();
	// }

	public function insert2($ids) {
		$a = ambil_kode();
		$b = ambil_jenis();
		$sql = "UPDATE target SET salesman ='{$a}', jenis = '{$b}' WHERE id ='{$ids}'";
		$this->db->query($sql);

		return $this->db->affected_rows();
		
	}

	public function busek($id){
		$sql="DELETE FROM target WHERE id='{$id}'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}


	public function insertpf1 (){
		$sql="INSERT INTO targetpf1 (salesman,kode) SELECT Salesman,Kode FROM temp_target_1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function insertpf2 (){
		$sql="INSERT INTO targetpf1 (salesman,kode) SELECT Salesman,Kode FROM temp_target_2";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function insertpf3 (){
		$sql="INSERT INTO targetpf1 (salesman,kode) SELECT Salesman,Kode FROM temp_target_3";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function insertpf4 (){
		$sql="INSERT INTO targetpf1 (salesman,kode) SELECT Salesman,Kode FROM temp_target_4";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('target', $data);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE target SET Kode='" .$data['kode'] ."', Keterangan='" .$data['ket'] ."', Jenis='" .$data['jenis'] ."' WHERE ID='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM target WHERE ID='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_kode($kode) {
		$this->db->where('Keterangan', $kode);
		$data = $this->db->get('target');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('target');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */

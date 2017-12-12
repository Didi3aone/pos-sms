<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tempHutang extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('temphutang');

		$data = $this->db->get();

		return $data->result();
	}

	public function insert($data, $disc_1, $disc_2, $disc_3, $disc_rp, $total) {
		$sql = "INSERT INTO temp(Kode, Nama, Qty, Sat, Harga, Disc1, Disc2, Disc3, DiscRp, Total, ExpDate, Gdg)
    VALUES('" .$data['kode_beli'] ."', '" .$data['nama_barang'] ."','" .$data['qty'] ."','" .$data['satuan'] ."',
    '" .$data['harga'] ."','" .$disc_1 ."','" .$disc_2 ."','" .$disc_3 ."',
    '" .$disc_rp ."','" .$total ."','" .$data['exp_date'] ."','" .$data['gudang'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete_by_last_record()
	{
		$sql = "delete from temp order by Id desc limit 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function grand_total() {
		$this->db->select_sum('Total');
		$query = $this->db->get('temp');
    return $query->result();

		/*$query = "SELECT SUM(Total) as Total FROM temp";
		$this->db->query($query);
		return $this->db->affected_rows();*/
	}

}

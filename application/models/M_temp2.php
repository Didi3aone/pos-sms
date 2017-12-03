<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_temp2 extends CI_Model {
	public function select_all() {
		$sort = "DESC";
		$this->db->select('*');
		$this->db->from('temp_pelunasanhutangbayar');
		$this->db->order_by('Id', $sort);
		$this->db->limit(1);

		$data = $this->db->get();

		return $data->result();
	}

	public function select_all2() {
		$this->db->select('*');
		$this->db->from('temp_pelunasanhutang');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_id() {
		$sql = "SELECT Id AS id FROM temp_pelunasanhutangbayar";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO temp_pelunasanhutangbayar(Jenis, Bank, Keterangan, Jatuh_Tempo, Jumlah)
    VALUES('" .$data['jenis_bayar'] ."','" .$data['nama_bank'] ."','" .$data['keterangan'] ."',
    '" .$data['jatuh_tempo'] ."','" .$data['jumlah'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insertBayar($data, $kodeSupp, $hutang, $bayar, $sisa) {
		$sql = "INSERT INTO temp_pelunasanhutang(Status, Faktur, Tanggal, Supplier, Total, Hutang, Bayar, Sisa)
    VALUES('" .$data['status'] ."','" .$data['faktur'] ."','" .$data['tgl'] ."',
    '" .$kodeSupp."','" .$hutang."','" .$hutang."','" .$bayar."', '" .$sisa."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete_by_last_record()
	{
		$sql = "delete from temp_pelunasanhutangbayar order by Id desc limit 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function delete_by_last_record2()
	{
		$sql = "delete from temp_pelunasanhutang order by Id desc limit 1";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function getBayar($id) {
		$sql = "SELECT Jumlah AS jumlah FROM temp_pelunasanhutangbayar WHERE Id = '{$id}'";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function resetData() {
		$resetTabel = $this->db->truncate('temp_pelunasanhutang');
		return $resetTabel;
	}

	public function resetData2() {
		$resetTabel = $this->db->truncate('temp_pelunasanhutangbayar');
		return $resetTabel;
	}

	public function resetData3() {
		$resetTabel = $this->db->truncate('temp_totpelunasanhutang');
		return $resetTabel;
	}

	public function lastSisa() {
		$sql = "SELECT Sisa AS sisa from temp_pelunasanhutang order by Id desc limit 1";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_last_record() {
		$sql = "SELECT Id AS id FROM temp_pelunasanhutang ORDER BY Id DESC LIMIT 1";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function total_hutang() {
		$sql = "SELECT SUM(Hutang) AS tot_hutang FROM temp_pelunasanhutang";
		$data = $this->db->query($sql);

		return $data->result();
	}

	public function save($data, $total) {
		$sql = "INSERT INTO temp_totpelunasanhutang(Tgl, Faktur, total_hutang, total_bayar)
		VALUES('" .$data['tgl_bayar'] ."', '" .$data['faktur_bayar'] ."', '" .$total ."', '" .$total ."')";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function getFaktur() {
		$sql = "SELECT Faktur AS faktur FROM temp_pelunasanhutang";
		$data = $this->db->query($sql);

		return $data->result();
	}



}

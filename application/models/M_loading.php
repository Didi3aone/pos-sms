<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_loading extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('temp_konfirmdraft');

		$data = $this->db->get();

		return $data->result();
	}

  public function select_supir() {
  		$sql = "SELECT nama FROM pegawai WHERE jabatan='SPR'";

  		$data = $this->db->query($sql);

  		return $data->result();
  	}

	public function select_draft($tgl){
		$sql = "SELECT draft FROM konfirmdraft WHERE tgl='{$tgl}'";

		$data = $this->db->query($sql);

		return $data->result();

	}

		public function select_jenis_draft(){
			$sql = "SELECT jenis FROM jenisdraft";

  		$data = $this->db->query($sql);

  		return $data->result();
		}

		public function select_helper() {
				$sql = "SELECT nama FROM pegawai WHERE jabatan='HLP'";

				$data = $this->db->query($sql);

				return $data->result();
			}

			public function hitungCount(){
				$sql= "SELECT ";

			}

		public function selectKode($tgl, $jenis){
			$sql="SELECT draft as dr FROM konfirmdraft WHERE tgl='{$tgl}' AND jenis='{$jenis}'";
			$data = $this->db->query($sql);

		return $data->result();

		}

		public function test() {

      $where = "jabatan='SPR'";
  		$this->db->select('*');
  		$this->db->from('pegawai');
      $this->db->where($where);

  		$data = $this->db->get();

  		return $data->result();
  	}

		public function countFaktur($tgl, $jenis) {
    $this->db->select('*');
    $this->db->where('tgl',$tgl);
		$this->db->where('jenis',$jenis);
    $hitung=$this->db->get('konfirmdraft');
    $count=$hitung->result();
    return count($count);
  }
}

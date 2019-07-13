<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linfoabsensi_model extends CI_Model {

	public function getLaporan()
	{
		$this->db->select('infoabsensi.*, mpegawai.nama AS namapegawai');
		$this->db->join('mpegawai', 'mpegawai.nik = infoabsensi.nik');
		$query = $this->db->get('infoabsensi');
		return $query->result();
	}

	public function getLaporanFilter($tanggal)
	{
		$this->db->select('infoabsensi.*, mpegawai.nama AS namapegawai');
		$this->db->join('mpegawai', 'mpegawai.nik = infoabsensi.nik');
		$this->db->where('DATE(infoabsensi.tanggal) LIKE', '%'.$tanggal.'%');
		$query = $this->db->get('infoabsensi');
		return $query->result();
	}

	public function getLaporanExcel($export){
		$this->db->select('infoabsensi.*, mpegawai.nama AS namapegawai');
		$this->db->join('mpegawai', 'mpegawai.nik = infoabsensi.nik');
		$query = $this->db->get('infoabsensi');
		return $query->result();
	}
}

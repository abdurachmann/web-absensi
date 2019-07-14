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

	public function getPegawai()
	{
		$query = $this->db->get('mpegawai');
		return $query->result();
	}

	public function getLaporanFilter($nik, $tanggal_awal, $tanggal_akhir)
	{
		$this->db->select('infoabsensi.*, mpegawai.nama AS namapegawai');
		$this->db->join('mpegawai', 'mpegawai.nik = infoabsensi.nik');
		if($nik != '0'){
			$this->db->where('infoabsensi.nik', $nik);
		}
		$this->db->where('infoabsensi.tanggal >=', $tanggal_awal);
		$this->db->where('infoabsensi.tanggal <=', $tanggal_akhir);
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

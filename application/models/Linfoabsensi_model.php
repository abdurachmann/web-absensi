<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linfoabsensi_model extends CI_Model {

	public function getLaporan()
	{
		$this->db->select('infoabsensi.*,
		mpegawai.nama AS namapegawai,
		COUNT(mpegawai.nik) AS jumlahkehadiran,
		COUNT(mpegawai_terlambat.nik) AS jumlahketerlambatan,
		COUNT(mpegawai_pulang_cepat.nik) AS jumlahpulangcepat');
		$this->db->join('mpegawai', 'mpegawai.nik = infoabsensi.nik');
		$this->db->join('mpegawai mpegawai_terlambat', 'mpegawai_terlambat.nik = infoabsensi.nik AND (infoabsensi.absenmasuk > TIME_FORMAT("08:00:00", "%H:%i:%s"))','LEFT');
		$this->db->join('mpegawai mpegawai_pulang_cepat', 'mpegawai_pulang_cepat.nik = infoabsensi.nik AND (infoabsensi.absenkeluar < TIME_FORMAT("16:30:00", "%H:%i:%s"))','LEFT');
		$this->db->group_by('infoabsensi.nik');
		$query = $this->db->get('infoabsensi');
		return $query->result();
	}

	public function getLaporanFilter($nik, $tanggal_awal, $tanggal_akhir)
	{
		$this->db->select('infoabsensi.*,
		mpegawai.nama AS namapegawai,
		COUNT(mpegawai.nik) AS jumlahkehadiran,
		COUNT(mpegawai_terlambat.nik) AS jumlahketerlambatan,
		COUNT(mpegawai_pulang_cepat.nik) AS jumlahpulangcepat');
		$this->db->join('mpegawai', 'mpegawai.nik = infoabsensi.nik');
		$this->db->join('mpegawai mpegawai_terlambat', 'mpegawai_terlambat.nik = infoabsensi.nik AND (infoabsensi.absenmasuk > TIME_FORMAT("08:00:00", "%H:%i:%s"))','LEFT');
		$this->db->join('mpegawai mpegawai_pulang_cepat', 'mpegawai_pulang_cepat.nik = infoabsensi.nik AND (infoabsensi.absenkeluar < TIME_FORMAT("16:30:00", "%H:%i:%s"))','LEFT');
		$this->db->group_by('infoabsensi.nik');
		if($nik != '0'){
			$this->db->where('infoabsensi.nik', $nik);
		}
		$this->db->where('infoabsensi.tanggal >=', $tanggal_awal);
		$this->db->where('infoabsensi.tanggal <=', $tanggal_akhir);
		$query = $this->db->get('infoabsensi');
		return $query->result();
	}

	public function getPegawai()
	{
		$query = $this->db->get('mpegawai');
		return $query->result();
	}

	public function getLaporanDetail($nik, $tanggal_awal, $tanggal_akhir)
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

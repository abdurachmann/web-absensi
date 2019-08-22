<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linfoabsensi_model extends CI_Model {

	public function getLaporan()
	{
		$date = strtotime(date('Y').'-'.date('m').'-15');
		$startDate = date('Y-m-d', $date);
		$endDate = date("Y-m-d", strtotime("+1 month", $date));

		$this->db->select('infoabsensi.*,
		mpegawai.nama AS namapegawai,
		COUNT(mpegawai.nik) AS jumlahkehadiran,
		COUNT(mpegawai_terlambat.nik) AS jumlahketerlambatan,
		COUNT(mpegawai_pulang_cepat.nik) AS jumlahpulangcepat');
		$this->db->join('mpegawai', 'mpegawai.nik = infoabsensi.nik');
		$this->db->join('mpegawai mpegawai_terlambat', 'mpegawai_terlambat.nik = infoabsensi.nik AND (infoabsensi.absenmasuk > TIME_FORMAT("08:00:00", "%H:%i:%s"))','LEFT');
		$this->db->join('mpegawai mpegawai_pulang_cepat', 'mpegawai_pulang_cepat.nik = infoabsensi.nik AND (infoabsensi.absenkeluar < TIME_FORMAT("16:30:00", "%H:%i:%s"))','LEFT');
		$this->db->group_by('infoabsensi.nik');
		$this->db->where('infoabsensi.tanggal >=', $startDate);
		$this->db->where('infoabsensi.tanggal <=', $endDate);
		$query = $this->db->get('infoabsensi');
		return $query->result();
	}

	public function getLaporanFilter($nik, $bulan, $tahun)
	{
		$date = strtotime("$tahun-$bulan-15");
		$startDate = date('Y-m-d', $date);
		$endDate = date("Y-m-d", strtotime("+1 month", $date));

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
		$this->db->where('infoabsensi.tanggal >=', $startDate);
		$this->db->where('infoabsensi.tanggal <=', $endDate);
		$query = $this->db->get('infoabsensi');
		return $query->result();
	}

	public function getPegawai()
	{
		$query = $this->db->get('mpegawai');
		return $query->result();
	}

	public function getLaporanDetail($nik, $bulan, $tahun)
	{
		$date = strtotime("$tahun-$bulan-15");
		$startDate = date('Y-m-d', $date);
		$endDate = date("Y-m-d", strtotime("+1 month", $date));

		$this->db->select('infoabsensi.*, mpegawai.nama AS namapegawai');
		$this->db->join('mpegawai', 'mpegawai.nik = infoabsensi.nik');
		if($nik != '0'){
			$this->db->where('infoabsensi.nik', $nik);
		}
		$this->db->where('infoabsensi.tanggal >=', $startDate);
		$this->db->where('infoabsensi.tanggal <=', $endDate);
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

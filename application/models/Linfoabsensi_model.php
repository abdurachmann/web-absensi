<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linfoabsensi_model extends CI_Model {

	public function getLaporan()
	{
		$this->db->select('infoabsensi.*, mpegawai.nama AS namapegawai');
		$this->db->join('mpegawai', 'mpegawai.id = infoabsensi.idpegawai');
		$query = $this->db->get('infoabsensi');
		return $query->result();
	}
}

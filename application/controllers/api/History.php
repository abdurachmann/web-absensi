<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class History extends REST_Controller
{
  public function index_get()
  {
		// Parameter
		$nik = $this->get('nik');
		$tahun = $this->get('tahun');

		// Query Database
		$this->db->where('mpegawai.nik', $nik);
		$this->db->where('tanggal LIKE ', $tahun.'%');
		$this->db->join('mpegawai', 'mpegawai.id = infoabsensi.idpegawai');
		$query = $this->db->get('infoabsensi');
		$data = $query->result();

		// Response
		if ($query->num_rows() > 0) {
			$this->response([
				'status' => true,
				'message' => 'no message',
				'data' => $data
			]);
		} else {
			$this->response([
				'status' => false,
				'message' => 'error',
				'data' => array()
			]);
		}
  }

}

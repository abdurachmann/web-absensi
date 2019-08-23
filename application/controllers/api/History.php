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
		$bulan = $this->get('bulan');
		$tahun = $this->get('tahun');

		$date = strtotime("$tahun-$bulan-15");
		$startDate = date('Y-m-d', $date);
		$endDate = date("Y-m-d", strtotime("+1 month", $date));

		// Query Database
		$this->db->where('nik', $nik);
		$this->db->where('tanggal >=', $startDate);
		$this->db->where('tanggal <=', $endDate);
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

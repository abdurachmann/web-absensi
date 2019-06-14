<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class SyncGps extends REST_Controller
{
	public function index_post()
	{
		// Parameter
		$latitude = $this->post('latitude');
		$longitude = $this->post('longitude');

		// Query Database
		$this->db->where('latitude', $latitude);
		$this->db->where('longitude ', $longitude);
		$query = $this->db->get('mperusahaan');
		$data = $query->row();

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

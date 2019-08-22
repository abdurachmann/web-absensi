<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class Profile extends REST_Controller
{
	public function index_get()
	{
		// Parameter
		$nik = $this->get('nik');

		// GENERATE PIN
		$limit = 4;
		$pin = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);

		$this->db->set('pin', $pin);
		$this->db->where('nik', $nik);
		if ($this->db->update('mpegawai')) {

			// Query Database
			$this->db->where('nik', $nik);
			$query = $this->db->get('mpegawai');
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
}

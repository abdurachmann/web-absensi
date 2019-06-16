<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class Login extends REST_Controller
{
	public function index_post()
	{
		// Parameter
		$nik = $this->post('nik');
		$password = $this->post('password');

		// Query Database
		$this->db->where('nik', $nik);
		$this->db->where('password', md5($password));
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

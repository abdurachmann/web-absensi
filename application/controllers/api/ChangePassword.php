<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class ChangePassword extends REST_Controller
{
	public function index_post()
	{
		// Parameter
		$nik = $this->post('nik');
		$passwordLama = $this->post('passwordlama');
		$passwordBaru = $this->post('passwordbaru');

		// Query Database
		$this->db->where('nik', $nik);
		$this->db->where('password', md5($password));
		$query = $this->db->get('mpegawai');
		$data = $query->row();

		// Response
		if ($query->num_rows() > 0) {
			$this->db->set('password', $passwordBaru);
			$this->db->where('nik', $nik);
			if ($this->db->update('infoabsensi')) {
				$this->response([
					'status' => true,
					'message' => 'no message',
					'data' => $data
				]);
			}
		} else {
			$this->response([
				'status' => false,
				'message' => 'error',
				'data' => array()
			]);
		}
	}
}

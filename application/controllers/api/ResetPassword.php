<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class ResetPassword extends REST_Controller
{
	public function index_post()
	{
		// Parameter
		$nik = $this->post('nik');

		// Query Database
		$this->db->where('nik', $nik);
		$query = $this->db->get('mpegawai');
		$data = $query->row();

		// Response
		if ($query->num_rows() > 0) {
			$newPassword = md5(str_replace("-", "", date('d-m-Y', strtotime($data->tanggallahir))));
			$this->db->set('password', $newPassword);
			$this->db->where('nik', $nik);
			if ($this->db->update('mpegawai')) {
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

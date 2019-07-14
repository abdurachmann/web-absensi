<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class Absen extends REST_Controller
{
	public function checkdate_get()
	{
		echo date("Y-m-d H:i:s");
		echo date_default_timezone_get();
	}

	public function index_post()
	{
		// Parameter
		$tanggal = date("Y-m-d");
		$jenisAbsen = $this->post('jenisabsen');
		$jamAbsen = date("H:i:s");

		$data = array();
		$data['tanggal'] = $tanggal;
		$data['nik'] = $this->post('nik');
		$data['macaddress'] = $this->post('macaddress');
		$data['latitude'] = $this->post('latitude');
		$data['longitude'] = $this->post('longitude');

		if (json_decode($jenisAbsen)) {
			if($jamAbsen > 8){
				$data['keteranganmasuk'] = 'Terlambat';
			}else{
				$data['keteranganmasuk'] = '-';
			}
			$data['absenmasuk'] = $jamAbsen;
		} else {
			if($jamAbsen < 16){
				$data['keterangankeluar'] = 'Pulang Cepat';
			}else{
				$data['keterangankeluar'] = '-';
			}
			$data['absenkeluar'] = $jamAbsen;
		}

		// Query Database & Response
		if ($this->db->on_duplicate('infoabsensi', $data)) {
			$this->response([
				'status' => true,
				'message' => $jamAbsen,
			]);
		} else {
			$this->response([
				'status' => false,
				'message' => 'error'
			]);
		}
	}

	public function office_get()
	{
		// Query Database
		$query = $this->db->get('mperusahaan');

		// Response
		if ($query->num_rows() > 0) {
			http_response_code(200);
			return $this->output
				->set_content_type('application/json')
				->set_output(json_encode($query->row()));
		} else {
			http_response_code(404);

			return $this->output
				->set_content_type('application/json')
				->set_output([
					'status' => false,
					'message' => 'error',
				]);
		}

	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class Absen extends REST_Controller
{
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

		if ($jenisAbsen == 1) {
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
				'message' => 'no message'
			]);
		} else {
			$this->response([
				'status' => false,
				'message' => 'error'
			]);
		}
	}
}

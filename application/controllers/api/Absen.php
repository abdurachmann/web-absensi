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
		$jamAbsen = $this->post('jamabsen');

		$data = array();
		$data['tanggal'] = $tanggal;
		$data['nik'] = $this->post('nik');
		$data['macaddress'] = $this->post('macaddress');
		$data['latitude'] = $this->post('latitude');
		$data['longitude'] = $this->post('longitude');

		if ($jenisAbsen == 'masuk') {
			if($jamAbsen > 8){
				$data['keterangan'] = 'Terlambat';
			}else{
				$data['keterangan'] = '-';
			}
			$data['absenmasuk'] = $this->post('jamabsen');
		} else {
			if($jamAbsen < 16){
				$data['keterangan'] = 'Pulang Cepat';
			}else{
				$data['keterangan'] = '-';
			}
			$data['absenkeluar'] = $this->post('jamabsen');
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
require 'application/libraries/REST_Controller.php';

class Absen extends REST_Controller
{
  public function index_get()
  {
		$this->response([
			'status' => true,
			'message' => 'no message',
			'data' => array(
				array(
					'id_data' => '1',
					'name' => 'Gunali Rezqi Mauludi'
				),
				array(
					'id_data' => '2',
					'name' => 'Abdu Rachman Ruchendar'
				),
				array(
					'id_data' => '3',
					'name' => 'Tian Huday Pison'
				),
				array(
					'id_data' => '4',
					'name' => 'Masdan Suryo Purmadianto'
				),
				array(
					'id_data' => '5',
					'name' => 'Jajang Maolana Yusup'
				),
			)
		]);
  }

  public function index_post()
  {
    // Create a new book
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mperusahaan extends CI_Controller {

	/**
	 * Mperusahaan controller.
	 * Developer @Abdu R Ruchendar
	 */

	public function __construct()
  {
		parent::__construct();
		permissionUserLoggedIn($this->session);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label>', '</label>');
		$this->load->model('Mperusahaan_model');
  }

	function index(){
		$row = $this->Mperusahaan_model->getSpecified(0);
		if(isset($row->id)){
			$data = array(
				'id' 						=> $row->id,
				'nama' 					=> $row->nama,
				'alamat' 				=> $row->alamat,
				'latitude' 			=> $row->latitude,
				'longitude' 		=> $row->longitude,
			);
			$data['error'] 			= '';
			$data['title'] 			= 'Lokasi Perusahaan';
			$data['content']	 	= 'Mperusahaan/manage';
			$data['breadcrum'] 	= array(
															array("Absensi PT Dinus Cipta Mandiri",'#'),
															array("Lokasi Perusahaan",'#')
														);

			$data = array_merge($data, backend_info());
			$this->parser->parse('module_template', $data);
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak ditemukan.');
			redirect('Mperusahaan','location');
		}
	}

	function save(){
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			if($this->Mperusahaan_model->updateData()){
				$this->session->set_flashdata('confirm',true);
				$this->session->set_flashdata('message_flash','data telah tersimpan.');
				redirect('Mperusahaan','location');
			}
		}else{
			$this->failed_save($this->input->post('id'));
		}
	}

	function failed_save($id){
		$data = $this->input->post();
		$data['error'] 	 = validation_errors();
		$data['content'] = 'Mperusahaan/manage';

		$data['title'] = 'Lokasi Perusahaan';
		$data['breadcrum'] = array(
														array("Absensi PT Dinus Cipta Mandiri",'#'),
														array("Lokasi Perusahaan",'#')
												);

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template',$data);
	}
}

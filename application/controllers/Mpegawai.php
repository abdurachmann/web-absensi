<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpegawai extends CI_Controller {

	/**
	 * Mpegawai controller.
	 * Developer @Abdu R Ruchendar
	 */

	public function __construct()
  {
		parent::__construct();
		permissionUserLoggedIn($this->session);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label>', '</label>');
		$this->load->model('Mpegawai_model');
  }

	function index(){
		$data = array();
		$data['error'] 			= '';
		$data['title'] 			= 'Pegawai';
		$data['content'] 		= 'Mpegawai/index';
		$data['breadcrum'] 	= array(
														array("Absensi PT Dinus Cipta Mandiri",'#'),
														array("Pegawai",'#'),
									    			array("List",'Pegawai')
													);

		$data['list_index'] = $this->Mpegawai_model->getAll();

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template', $data);
	}

	function create(){
		$data = array(
			'id' 					=> '',
			'nik' 				=> '',
			'nama' 				=> '',
			'alamat' 			=> '',
			'tanggallahir' 		=> '',
			'macaddress' 	=> '',
			'status' 			=> ''
		);

		$data['error'] 			= '';
		$data['title'] 			= 'Tambah Pegawai';
		$data['content'] 		= 'Mpegawai/manage';
		$data['breadcrum']	= array(
														array("Absensi PT Dinus Cipta Mandiri",'#'),
														array("Pegawai",'#'),
									    			array("Tambah",'Pegawai')
													);

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template', $data);
	}

	function update($nik){
		if($nik != ''){
			$row = $this->Mpegawai_model->getSpecified($nik);
			if(isset($row->nik)){
				$data = array(
					'id' 						=> $row->nik,
					'nik' 					=> $row->nik,
					'nama' 					=> $row->nama,
					'alamat' 				=> $row->alamat,
					'tanggallahir' 			=> $row->tanggallahir,
					'macaddress' 		=> $row->macaddress,
					'status' 				=> $row->status
				);
				$data['error'] 			= '';
				$data['title'] 			= 'Ubah Pegawai';
				$data['content']	 	= 'Mpegawai/manage';
				$data['breadcrum'] 	= array(
																array("Absensi PT Dinus Cipta Mandiri",'#'),
																array("Pegawai",'#'),
											    			array("Ubah",'Pegawai')
															);

				$data = array_merge($data, backend_info());
				$this->parser->parse('module_template', $data);
			}else{
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','data tidak ditemukan.');
				redirect('Mpegawai','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak ditemukan.');
			redirect('Mpegawai');
		}
	}

	function delete($nik){
		$this->Mpegawai_model->softDelete($nik);
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','data telah terhapus.');
		redirect('Mpegawai','location');
	}

	function save(){
		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tanggallahir', 'tanggallahir', 'trim|required');
		$this->form_validation->set_rules('macaddress', 'Mac Address', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			if($this->input->post('id') == '' ) {
				if($this->Mpegawai_model->saveData()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','data telah tersimpan.');
					redirect('Mpegawai','location');
				}
			} else {
				if($this->Mpegawai_model->updateData()){
					$this->session->set_flashdata('confirm',true);
					$this->session->set_flashdata('message_flash','data telah tersimpan.');
					redirect('Mpegawai','location');
				}
			}
		}else{
			$this->failed_save($this->input->post('id'));
		}
	}

	function failed_save($nik){
		$data = $this->input->post();
		$data['error'] 	 = validation_errors();
		$data['content'] = 'Mpegawai/manage';

		if($nik==''){
			$data['title'] = 'Tambah Pegawai';
			$data['breadcrum'] = array(
															array("Absensi PT Dinus Cipta Mandiri",'#'),
															array("Pegawai",'#'),
															array("Tambah",'Pegawai')
													);
		}else{
			$data['title'] = 'Ubah Pegawai';
			$data['breadcrum'] = array(
															array("Absensi PT Dinus Cipta Mandiri",'#'),
															array("Pegawai",'#'),
															array("Ubah",'Pegawai')
													);
		}

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template',$data);
	}
}

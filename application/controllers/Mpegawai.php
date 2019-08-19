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
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label>', '</label>');
		$this->load->model('Mpegawai_model');
  }

	function index(){
		permissionUserLoggedIn($this->session);

		$data = array();
		$data['error'] 			= '';
		$data['title'] 			= 'Karyawan';
		$data['content'] 		= 'Mpegawai/index';
		$data['breadcrum'] 	= array(
														array("Absensi PT Dinus Cipta Mandiri",'#'),
														array("Karyawan",'#'),
									    			array("List",'Karyawan')
													);

		$data['list_index'] = $this->Mpegawai_model->getAll();

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template', $data);
	}

	function create(){
		permissionUserLoggedIn($this->session);

		$data = array(
			'id' 					=> '',
			'nik' 				=> '',
			'nama' 				=> '',
			'jabatan' 		=> '',
			'alamat' 			=> '',
			'password' 		=> '',
			'macaddress' 	=> '',
			'status' 			=> ''
		);

		$data['error'] 			= '';
		$data['title'] 			= 'Tambah Karyawan';
		$data['content'] 		= 'Mpegawai/manage';
		$data['breadcrum']	= array(
														array("Absensi PT Dinus Cipta Mandiri",'#'),
														array("Karyawan",'#'),
									    			array("Tambah",'Karyawan')
													);

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template', $data);
	}

	function update($nik){
		permissionUserLoggedIn($this->session);

		if($nik != ''){
			$row = $this->Mpegawai_model->getSpecified($nik);
			if(isset($row->nik)){
				$data = array(
					'id' 						=> $row->nik,
					'nik' 					=> $row->nik,
					'nama' 					=> $row->nama,
					'jabatan' 			=> $row->jabatan,
					'alamat' 				=> $row->alamat,
					'password' 			=> $row->password,
					'macaddress' 		=> $row->macaddress,
					'status' 				=> $row->status
				);
				$data['error'] 			= '';
				$data['title'] 			= 'Ubah Karyawan';
				$data['content']	 	= 'Mpegawai/manage';
				$data['breadcrum'] 	= array(
																array("Absensi PT Dinus Cipta Mandiri",'#'),
																array("Karyawan",'#'),
											    			array("Ubah",'Karyawan')
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
		permissionUserLoggedIn($this->session);

		$this->Mpegawai_model->softDelete($nik);
		$this->session->set_flashdata('confirm',true);
		$this->session->set_flashdata('message_flash','data telah terhapus.');
		redirect('Mpegawai','location');
	}

	function save(){
		permissionUserLoggedIn($this->session);

		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]');
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
		permissionUserLoggedIn($this->session);

		$data = $this->input->post();
		$data['error'] 	 = validation_errors();
		$data['content'] = 'Mpegawai/manage';
		$data['jabatan'] = $this->input->post('jabatan');

		if($nik==''){
			$data['title'] = 'Tambah Karyawan';
			$data['breadcrum'] = array(
															array("Absensi PT Dinus Cipta Mandiri",'#'),
															array("Karyawan",'#'),
															array("Tambah",'Karyawan')
													);
		}else{
			$data['title'] = 'Ubah Karyawan';
			$data['breadcrum'] = array(
															array("Absensi PT Dinus Cipta Mandiri",'#'),
															array("Karyawan",'#'),
															array("Ubah",'Karyawan')
													);
		}

		$data = array_merge($data, backend_info());
		$this->parser->parse('module_template',$data);
	}

	function profile(){
		permissionUserLoggedIn($this->session);

		if($this->session->userdata('user_nik') != ''){
			$row = $this->Mpegawai_model->getSpecified($this->session->userdata('user_nik'));
			if(isset($row->nik)){
				$data = array(
					'id' 						=> $row->nik,
					'nik' 					=> $row->nik,
					'nama' 					=> $row->nama,
					'jabatan' 			=> $row->jabatan,
					'alamat' 				=> $row->alamat,
					'password' 			=> $row->password,
					'macaddress' 		=> $row->macaddress,
					'status' 				=> $row->status
				);
				$data['error'] = '';
				$data['title'] = 'Ubah Profile';
				$data['content'] = 'mpegawai/profile';
				$data['breadcrum'] = array(
															array("Absensi PT Dinus Cipta Mandiri",'dashboard'),
															array("Karyawan",'mpegawai'),
															array("Profile",'#')
														);

				$data = array_merge($data,backend_info());
				$this->parser->parse('module_template',$data);
			}else{
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('message_flash','data tidak ditemukan.');
				redirect('dashboard','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak ditemukan.');
			redirect('dashboard');
		}
	}

	function profile_update(){
		permissionUserLoggedIn($this->session);

		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('macaddress', 'Mac Address', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			if($this->mpegawai_model->update()){
				$this->session->set_flashdata('confirm',true);
				$this->session->set_flashdata('message_flash','data telah tersimpan.');
				redirect('mpegawai/profile','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak berhasil disimpan.');
			redirect('mpegawai/profile','location');
		}
	}

	function sign_in(){
		permissionUserLoggin($this->session);

		$data = array('username' => '', 'remember' => FALSE, 'error' => '');
		$data = array_merge($data,backend_info());
		$this->load->view('mpegawai/login_area',$data);
	}

	function dosign_in(){
		permissionUserLoggin($this->session);

		$nik =  $this->input->post('nik');
	 	$password =  $this->input->post('password');

		 //call the model for auth
		if($this->Mpegawai_model->signIn($nik, $password)){
			redirect('dashboard','location');
		}else{
            $this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','data tidak berhasil disimpan.');
			redirect('mpegawai/sign_in','location');
		}
	}

	function sign_out(){
		permissionUserLoggedIn($this->session);

		$this->Mpegawai_model->signOut();
		redirect('mpegawai/sign_in','location');
	}

	function lupa(){
		$this->load->view('muser_account/lupa');
	}

	function reset(){
		$this->form_validation->set_rules('username', 'username', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			if($this->muser_account_model->reset()){
				$this->session->set_flashdata('confirm',true);
				$this->session->set_flashdata('message_flash','Password berhasil di reset ke default, segera lakukan ubah password.');
				redirect('muser_account/sign_in','location');
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('message_flash','username tidak terdaftar.');
			redirect('muser_account/lupa','location');
		}
	}
}

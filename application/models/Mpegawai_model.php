<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpegawai_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $this->db->where('status', '1');
        $query = $this->db->get('mpegawai');
        return $query->result();
    }

    public function getSpecified($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('mpegawai');
        return $query->row();
    }

    public function saveData()
    {
        $this->nik 	       = $_POST['nik'];
        $this->nama 	     = $_POST['nama'];
        $this->jabatan 	   = $_POST['jabatan'];
        $this->alamat 	   = $_POST['alamat'];
        $this->macaddress  = $_POST['macaddress'];

        ($_POST['password'] !='')? $this->password = md5($_POST['password']) : $this->password = md5('123456');

        if($this->db->insert('mpegawai', $this)){
            return true;
        }else{
            $this->errorMessage = "Penyimpanan Gagal";
            return false;
        }
    }

    public function updateData()
    {
        $this->nik 	       = $_POST['nik'];
        $this->nama 	     = $_POST['nama'];
        $this->jabatan 	   = $_POST['jabatan'];
        $this->alamat 	   = $_POST['alamat'];
        $this->macaddress  = $_POST['macaddress'];

        if($_POST['password'] !='') $this->password = md5($_POST['password']);

        if($this->db->update('mpegawai', $this, array('nik' => $_POST['nik']))){
            return true;
        }else{
            $this->errorMessage = "Penyimpanan Gagal";
            return false;
        }
    }

    public function softDelete($nik)
    {
        $this->status = 0;

        if ($this->db->update('mpegawai', $this, array('nik' => $nik))) {
            return true;
        } else {
            $this->errorMessage = "Penyimpanan Gagal";
            return false;
        }
    }

    // function upload($update = false){
  	// 	if(isset($_FILES['foto'])){
  	// 		if($_FILES['foto']['name'] != ''){
  	// 			$config['upload_path'] = './assets/upload/users_avatar';
  	// 			$config['allowed_types'] = 'jpg|bmp';
  	// 			$config['encrypt_name']  = TRUE;
    //
  	// 			$this->load->library('upload', $config);
    //
  	// 			if ($this->upload->do_upload('foto')){
  	// 				$image_upload = $this->upload->data();
  	// 				$this->foto = $image_upload['file_name'];
    //
  	// 				if($update == true) $this->removeImage($_POST['id']);
    //
  	// 				return true;
  	// 			}else{
  	// 				$this->errorMessage = $this->upload->display_errors();
  	// 				return false;
  	// 			}
  	// 		}else{
  	// 			return true;
  	// 		}
  	// 	}else{
  	// 		return true;
  	// 	}
    //
  	// }

  	// function removeImage($id){
  	// 	$row = $this->getSpecified($id);
  	// 	if(file_exists('./assets/upload/users_avatar/'.$row->foto) && $row->foto !='') {
  	// 		unlink('./assets/upload/users_avatar/'.$row->foto);
  	// 	}
  	// }

    function signIn($nik, $password){
      $query = $this->db->query('SELECT *
        FROM mpegawai
        WHERE nik = "'.$nik.'" AND
        password = "'.md5($password).'" AND jabatan = "Adm"');

  		if($query->num_rows() > 0){
  			$row = $query->row();
  			$data = array(
  				'user_nik' 	      => $row->nik,
  				'user_name' 			=> $row->nama,
  				'user_password' 	=> $row->password,
          'user_jabatan' 	  => $row->jabatan,
  				'logged_in'  			=> TRUE,
  			);

  			$this->session->set_userdata($data);
  			return true;
  		}else{
  			return false;
  		}
  	}

  	function signOut(){
  		$data = array(
  			'user_nik'  	    => $this->session->userdata('user_nik'),
  			'user_name'  			=> $this->session->userdata('user_name'),
        'user_jabatan'  	=> $this->session->userdata('user_jabatan'),
  			'logged_in'    		=> $this->session->userdata('logged_in'),
  		);

  		$this->session->unset_userdata($data);
      $this->session->sess_destroy();
    }
    
    function reset(){
      $this->nik 	= $_POST['nik'];
      $this->password 	= md5('123456');
      $this->status 		= 1;
  
      if($this->upload(true)){
        $this->db->update('mpegawai', $this, array('nik' => $_POST['nik']));
        return true;
      }else{
        $this->error_message = "Penyimpanan Gagal";
        return false;
      }
    }
}

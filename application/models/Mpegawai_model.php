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
}

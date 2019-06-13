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

    public function getSpecified($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('mpegawai');
        return $query->row();
    }

    public function saveData()
		{
				$this->nik 	       = $_POST['nik'];
				$this->nama 	     = $_POST['nama'];
				$this->alamat 	   = $_POST['alamat'];
				$this->macaddress  = $_POST['macaddress'];
				$this->username    = $_POST['username'];

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
				$this->username    = $_POST['username'];

    		if($_POST['password'] !='') $this->password = md5($_POST['password']);

				if($this->db->update('mpegawai', $this, array('id' => $_POST['id']))){
					return true;
				}else{
					$this->errorMessage = "Penyimpanan Gagal";
					return false;
				}
	  }

    public function softDelete($id)
    {
        $this->status = 0;

        if ($this->db->update('mpegawai', $this, array('id' => $id))) {
            return true;
        } else {
            $this->errorMessage = "Penyimpanan Gagal";
            return false;
        }
    }
}

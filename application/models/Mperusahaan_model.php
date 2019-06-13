<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mperusahaan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSpecified($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('mperusahaan');
        return $query->row();
    }

	  public function updateData()
		{
				$this->nama 	     = $_POST['nama'];
				$this->alamat 	   = $_POST['alamat'];
				$this->latitude    = $_POST['latitude'];
				$this->longitude   = $_POST['longitude'];

				if($this->db->update('mperusahaan', $this, array('id' => $_POST['id']))){
					return true;
				}else{
					$this->errorMessage = "Penyimpanan Gagal";
					return false;
				}
	  }

    public function softDelete($id)
    {
        $this->status = 0;

        if ($this->db->update('mperusahaan', $this, array('id' => $id))) {
            return true;
        } else {
            $this->errorMessage = "Penyimpanan Gagal";
            return false;
        }
    }
}

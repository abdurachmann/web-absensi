<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCountPegawai()
    {
        $this->db->select('COUNT(nik) AS jumlahpegawai');
        $this->db->where('jabatan !=', 'Adm');
        $this->db->where('status', 1);
        $query = $this->db->get('mpegawai');
        return $query->row();
    }

    public function getCountUser()
    {
      $this->db->select('COUNT(nik) AS jumlahuser');
      $this->db->where('jabatan', 'Adm');
      $this->db->where('status', 1);
      $query = $this->db->get('mpegawai');
      return $query->row();
    }
}

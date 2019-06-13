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
        $this->db->select('COUNT(id) AS jumlahpegawai');
        $query = $this->db->get('mpegawai');
        return $query->row();
    }

    public function getCountUser()
    {
      $this->db->select('COUNT(id) AS jumlahuser');
      $query = $this->db->get('muser');
      return $query->row();
    }
}

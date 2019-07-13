<?php

class Linfoabsensi extends CI_Controller {

	/**
	 * Laporan Stok controller.
	 * Developer @Abdu R Ruchendar
	 */

	function __construct()
	{
		parent::__construct();
		permissionUserLoggedIn($this->session);

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<label>', '</label>');
		$this->load->model('Linfoabsensi_model');
	}

  public function index()
	{
		$data = array();
		$data['tanggal_awal']   = date("Y-m-d");
		$data['tanggal_akhir']  = date("Y-m-d");
		$data['title']          = 'Laporan Info Absensi';
		$data['content'] 		    = 'laporan/linfoabsensi';
    	$data['laporan']        = $this->Linfoabsensi_model->getLaporan();
		$data['breadcrum'] 		  = array(
  															array("Absensi PT Dinus Cipta Mandiri",'#'),
  															array("Laporan",'#'),
  													    array("Laporan Info Absensi",''),
  														);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

	public function search() {
		$tanggal = $this->input->post('tanggal_filter');

		$data = array();
		$data['tanggal_awal']   = date("Y-m-d");
		$data['tanggal_akhir']  = date("Y-m-d");
		$data['title']          = 'Laporan Info Absensi';
		$data['content'] 		    = 'laporan/linfoabsensi';
    	$data['laporan']        = $this->Linfoabsensi_model->getLaporanFilter($tanggal);
		$data['breadcrum'] 		  = array(
  															array("Absensi PT Dinus Cipta Mandiri",'#'),
  															array("Laporan",'#'),
  													    array("Laporan Info Absensi",''),
  														);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

	public function export(){
		$export = $this->input->post('laporan_excel');		

		$data = array();
		$data['tanggal_awal']   = date("Y-m-d");
		$data['tanggal_akhir']  = date("Y-m-d");
		$data['title']          = 'Laporan Info Absensi';
		$data['content'] 		    = 'laporan/Exportexcel';
    	$data['laporan']        = $this->Linfoabsensi_model->getLaporanExcel($export);
		$data['breadcrum'] 		  = array(
  															array("Absensi PT Dinus Cipta Mandiri",'#'),
  															array("Laporan",'#'),
  													    array("Laporan Info Absensi",''),
  														);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
		
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

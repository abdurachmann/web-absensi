<?php

class Dashboard extends CI_Controller {

	/**
	 * Dashboard controller.
	 * Developer @Abdu R Ruchendar
	 */

	function __construct()
	{
		parent::__construct();
		permissionUserLoggedIn($this->session);
		$this->load->model('dashboard_model');
	}

  public function index()
	{
    $data = array(
			'jumlahPegawai' => $this->dashboard_model->getCountPegawai()->jumlahpegawai,
			'jumlahUser' => $this->dashboard_model->getCountUser()->jumlahuser,
		);
    $data['title']      = 'Dashboard';
		$data['content'] 		= 'dashboard';
		$data['breadcrum'] 	= array(
												    array("Absensi PT Dinus Cipta Mandiri",'#'),
												    array("Dashboard",'#'),
												    array("Index",'')
													);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

<?php

require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

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
    $data['nik']   					= '';
    $data['bulan']   				= date("m");
    $data['tahun']  				= date("Y");
    $data['title']          = 'Laporan Info Absensi';
		$data['content'] 		    = 'Laporan/linfoabsensi';
    $data['laporan']        = $this->Linfoabsensi_model->getLaporan();
    $data['pegawai']        = $this->Linfoabsensi_model->getPegawai();
		$data['breadcrum'] 		  = array(
  															array("Absensi PT Dinus Cipta Mandiri",'#'),
  															array("Laporan",'#'),
  													    array("Laporan Info Absensi",''),
  														);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

	public function detail($nik, $bulan, $tahun)
	{
    $data = array();
    $data['nik']   					= $nik;
    $data['bulan']   				= $bulan;
    $data['tahun']  				= $tahun;
    $data['title']          = 'Laporan Info Absensi';
		$data['content'] 		    = 'Laporan/linfoabsensi_detail';
    $data['laporan']        = $this->Linfoabsensi_model->getLaporanDetail($nik, $bulan, $tahun);
    $data['pegawai']        = $this->Linfoabsensi_model->getPegawai();
		$data['breadcrum'] 		  = array(
  															array("Absensi PT Dinus Cipta Mandiri",'#'),
  															array("Laporan",'#'),
  													    array("Laporan Info Absensi",''),
  														);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

	public function gofilter() {
		$nik = $this->input->post('nik');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		if($nik != '' && $bulan != '' && $tahun != '') {
			redirect('linfoabsensi/filter/'.$nik.'/'.$bulan.'/'.$tahun);
		}else{
			redirect('linfoabsensi/index');
		}
	}

	public function filter($nik, $bulan, $tahun)
	{
    $data = array();
    $data['nik']   					= $nik;
    $data['bulan']   				= $bulan;
    $data['tahun']  				= $tahun;
    $data['title']          = 'Laporan Info Absensi';
		$data['content'] 		    = 'Laporan/linfoabsensi';
    $data['laporan']        = $this->Linfoabsensi_model->getLaporanFilter($nik, $bulan, $tahun);
    $data['pegawai']        = $this->Linfoabsensi_model->getPegawai();
		$data['breadcrum'] 		  = array(
  															array("Absensi PT Dinus Cipta Mandiri",'#'),
  															array("Laporan",'#'),
  													    array("Laporan Info Absensi",''),
  														);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

	public function print_report($nik, $bulan, $tahun)
	{
		$dompdf = new Dompdf();

		$data = array();
		$data['laporan'] = $this->Linfoabsensi_model->getLaporanFilter($nik, $bulan, $tahun);

		$html = $this->load->view('Laporan/linfoabsensi_print', $data, TRUE);

		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'potrait');

		// Render the HTML as PDF
		$dompdf->render();

		// // Output the generated PDF to Browser
		$dompdf->stream('Laporan Absensi.pdf', array('Attachment' => false));
	}

	public function export_excel($nik, $bulan, $tahun)
	{
		$data = array();
    $data['laporan'] = $this->Linfoabsensi_model->getLaporanFilter($nik, $bulan, $tahun);

		$this->load->view('Laporan/linfoabsensi_excel',$data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

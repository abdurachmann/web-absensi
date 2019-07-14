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
    $data['tanggal_awal']   = date("Y-m-d");
    $data['tanggal_akhir']  = date("Y-m-d");
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

	public function gofilter() {
		$nik = $this->input->post('nik');
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');

		if($nik != '' && $tanggal_awal != '' && $tanggal_akhir != '') {
			redirect('linfoabsensi/filter/'.$nik.'/'.$tanggal_awal.'/'.$tanggal_akhir);
		}else{
			redirect('linfoabsensi/index');
		}
	}

	public function filter($nik, $tanggal_awal, $tanggal_akhir)
	{
    $data = array();
    $data['nik']   					= $nik;
    $data['tanggal_awal']   = $tanggal_awal;
    $data['tanggal_akhir']  = $tanggal_akhir;
    $data['title']          = 'Laporan Info Absensi';
		$data['content'] 		    = 'Laporan/linfoabsensi';
    $data['laporan']        = $this->Linfoabsensi_model->getLaporanFilter($nik, $tanggal_awal, $tanggal_akhir);
    $data['pegawai']        = $this->Linfoabsensi_model->getPegawai();
		$data['breadcrum'] 		  = array(
  															array("Absensi PT Dinus Cipta Mandiri",'#'),
  															array("Laporan",'#'),
  													    array("Laporan Info Absensi",''),
  														);

		$data = array_merge($data,backend_info());
		$this->parser->parse('module_template',$data);
	}

	public function print_report($nik, $tanggal_awal, $tanggal_akhir)
	{
		$dompdf = new Dompdf();

		$data = array();
		$data['laporan'] = $this->Linfoabsensi_model->getLaporanFilter($nik, $tanggal_awal, $tanggal_akhir);

		$html = $this->load->view('Laporan/linfoabsensi_print', $data, TRUE);

		$dompdf->loadHtml($html);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'potrait');

		// Render the HTML as PDF
		$dompdf->render();

		// // Output the generated PDF to Browser
		$dompdf->stream('Laporan Absensi.pdf', array('Attachment' => false));
	}

	public function export_excel($nik, $tanggal_awal, $tanggal_akhir)
	{
		$data = array();
    $data['laporan'] = $this->Linfoabsensi_model->getLaporanFilter($nik, $tanggal_awal, $tanggal_akhir);

		$this->load->view('Laporan/linfoabsensi_excel',$data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

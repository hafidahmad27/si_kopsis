<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\dompdf;
use Dompdf\Options;

class Laporan_Keuntungan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->model('M_penjualan');
		$this->load->model('M_detail_penjualan');
	}

	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			$data['keuntungan'] = $this->M_detail_penjualan->keuntungan();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/laporan_keuntungan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function print_pdf()
	{
		$options = new Options();
		$options->setIsRemoteEnabled(true);
		$dompdf = new Dompdf($options);
		$dompdf->setPaper('A4', 'Potrait');

		$data['keuntungan'] = $this->M_detail_penjualan->keuntungan();
		$data['sum_keuntungan'] = $this->M_detail_penjualan->sum_keuntungan();
		$html = $this->load->view('admin/laporan/report_keuntungan', $data, true);

		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Keuntungan ' . date('d F Y'), array("Attachment" => false));
	}
}

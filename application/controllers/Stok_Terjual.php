<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\dompdf;
use Dompdf\Options;

class Stok_Terjual extends CI_Controller
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
			$data['barang_yg_terjual'] = $this->M_detail_penjualan->barang_terjual();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/stok_terjual', $data);
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

		// $tanggal_awal = date('d-m-Y', strtotime($this->input->post('tanggal_awal')));
		// $tanggal_akhir = date('d-m-Y', strtotime($this->input->post('tanggal_akhir')));
		// $this->M_detail_penjualan->filters($tanggal_awal, $tanggal_akhir);
		$data['barang_yg_terjual'] = $this->M_detail_penjualan->barang_terjual();
		$data['sum_terjual'] = $this->M_detail_penjualan->sum_terjual();
		$html = $this->load->view('admin/laporan/report_barang_terjual', $data, true);

		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Stok Terjual ' . date('d F Y'), array("Attachment" => false));
	}
}

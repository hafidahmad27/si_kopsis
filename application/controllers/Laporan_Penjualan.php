<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Laporan_Penjualan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penjualan');
		$this->load->model('M_detail_penjualan');
	}

	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			$data['all_penjualan'] = $this->M_penjualan->lihat();
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/laporan_penjualan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function detail($no_penjualan)
	{
		$data['penjualan'] = $this->M_penjualan->lihat_no_penjualan($no_penjualan);
		$data['all_detail_penjualan'] = $this->M_detail_penjualan->lihat_no_penjualan($no_penjualan);
		$data['no'] = 1;
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/detail_penjualan', $data);
	}

	public function hapus($no_penjualan)
	{
		if ($this->M_penjualan->hapus($no_penjualan) && $this->M_detail_penjualan->hapus($no_penjualan)) {
			$this->session->set_flashdata('success', 'Invoice Penjualan <strong>Berhasil</strong> Dihapus!');
			redirect('laporan_penjualan');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penjualan <strong>Gagal</strong> Dihapus!');
			redirect('laporan_penjualan');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$data['all_penjualan'] = $this->M_penjualan->lihat();
		$data['title'] = 'Laporan Data Penjualan';
		$data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('penjualan/report', $data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Penjualan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	public function export_detail($no_penjualan)
	{
		$dompdf = new Dompdf();
		$data['penjualan'] = $this->M_penjualan->lihat_no_penjualan($no_penjualan);
		$data['all_detail_penjualan'] = $this->M_detail_penjualan->lihat_no_penjualan($no_penjualan);
		$data['title'] = 'Laporan Detail Penjualan';
		$data['no'] = 1;

		$dompdf->setPaper('A6', 'Landscape');
		$html = $this->load->view('admin/detail_penjualan', $data, true);
		$html .= '<style>.hilangkan{display: none;}</style>';

		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Struk Detail Penjualan ' . date('d F Y'), array("Attachment" => false));
	}

	public function hapus_semua()
	{
		$this->M_penjualan->hapus_semua_data();
		redirect('Laporan_Penjualan/index');
	}

	public function getDetail()
	{
		echo json_encode($this->M_detail_penjualan->getDetailPenjualanById($_POST['id']));
	}
}

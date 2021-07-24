<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_detail_penjualan');
	}

	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			if (isset($_POST['tanggal'])) {
				$tanggal_awal = date("Y-m-d", strtotime(substr($_POST['tanggal'], 0, -13)));
				$tanggal_akhir = date("Y-m-d", strtotime(substr($_POST['tanggal'], 12)));
			} else {
				$tanggal_awal = '2021/01/01';
				$tanggal_akhir = '2021/07/24';
			}
			$data['barang_terjual_a'] = $this->M_detail_penjualan->barang_terjual_a();
			$data['barang_terjual_b'] = $this->M_detail_penjualan->barang_terjual_b();
			$data['total_keuntungan_per_tgl'] = $this->M_detail_penjualan->filter_grafik($tanggal_awal, $tanggal_akhir);
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function ambilId()
	{
		$tahun = $_POST['tahun'];
		$data = $this->M_detail_penjualan->sum_keuntungan_b($tahun);
		echo json_encode($data);
	}

	public function date_range()
	{
		if (isset($_POST['tanggal'])) {
			$tanggal_awal = date("Y-m-d", strtotime(substr($_POST['tanggal'], 0, -13)));
			$tanggal_akhir = date("Y-m-d", strtotime(substr($_POST['tanggal'], 12)));

			$data = [
				'tanggal_awal' => $tanggal_awal,
				'tanggal_akhir' => $tanggal_akhir
			];
			return $data;
		}
	}
}

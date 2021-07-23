<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
			$data['barang_terjual_a'] = $this->M_detail_penjualan->barang_terjual_a();
			$data['barang_terjual_b'] = $this->M_detail_penjualan->barang_terjual_b();
			$data['total_keuntungan_per_tgl'] = $this->M_detail_penjualan->sum_keuntungan_b('2021');
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
		// $data = $this->M_detail_penjualan->();
		$data = $this->M_detail_penjualan->sum_keuntungan_b($tahun);
		echo json_encode($data);
	}
}

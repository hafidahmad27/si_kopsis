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
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('dashboard', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}
}

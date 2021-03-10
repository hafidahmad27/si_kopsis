<?php

use Dompdf\Dompdf;

class Penjualan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_master');
		$this->load->model('M_penjualan');
		$this->load->model('M_detail_penjualan');
	}

	public function index()
	{
		$data['all_barang'] = $this->M_master->lihat_stok('tb_barang');
		if ($this->session->userdata('status') == 'login') {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/penjualan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function get_all_barang()
	{
		$data = $this->M_master->lihat_nama_barang($_POST['nama_barang']);
		echo json_encode($data);
	}

	public function keranjang_barang()
	{
		$this->load->view('admin/keranjang');
	}

	public function proses_tambah()
	{
		$jumlah_barang_dibeli = count($this->input->post('nama_barang_hidden'));

		$data_penjualan = [
			'no_penjualan' => $this->input->post('no_penjualan'),
			'nama_kasir' => $this->input->post('nama_kasir'),
			'tanggal_penjualan' => $this->input->post('tanggal_penjualan'),
			'jam_penjualan' => $this->input->post('jam_penjualan'),
			'total' => $this->input->post('total_hidden'),
		];

		$data_detail_penjualan = [];

		for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
			array_push($data_detail_penjualan, ['nama_barang' => $this->input->post('nama_barang_hidden')[$i]]);
			$data_detail_penjualan[$i]['no_penjualan'] = $this->input->post('no_penjualan');
			$data_detail_penjualan[$i]['harga_jual'] = $this->input->post('harga_jual_hidden')[$i];
			$data_detail_penjualan[$i]['jumlah_barang'] = $this->input->post('jumlah_hidden')[$i];
			// $data_detail_penjualan[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
			$data_detail_penjualan[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
		}

		if ($this->M_penjualan->tambah($data_penjualan) && $this->M_detail_penjualan->tambah($data_detail_penjualan)) {
			for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
				$this->M_master->min_stok($data_detail_penjualan[$i]['jumlah_barang'], $data_detail_penjualan[$i]['nama_barang']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('laporan_penjualan');
		} else {
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('penjualan');
		}
	}
}

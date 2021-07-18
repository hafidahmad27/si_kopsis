<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\dompdf;
use Dompdf\Options;

class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['barang'] = $this->M_master->tampil_data('tb_barang')->result();
		if ($this->session->userdata('status') == 'login') {
			$dariDB = $this->M_master->cekkodebarang();
			$nourut = substr($dariDB, 3, 4);
			$kodeBarangSekarang = $nourut + 1;
			$data = array('kode_barang' => $kodeBarangSekarang);
			$data['kategori_barang'] = $this->M_master->tampil_data('tb_kategori')->result();
			$data['barang'] = $this->M_master->getBarang();

			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/barang', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function tambah_aksi()
	{
		$id_kategori = $this->input->post('id_kategori');
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$stok_barang = $this->input->post('stok_barang');
		$harga_jual = $this->input->post('harga_jual');

		$data = array(
			'id_kategori'  => $id_kategori,
			'kode_barang'  => $kode_barang,
			'nama_barang'  => $nama_barang,
			'stok_barang'  => $stok_barang,
			'harga_jual' => str_replace(".", "", $harga_jual)
		);

		$this->M_master->input_data($data, 'tb_barang');
		redirect('barang/index');
	}

	public function edit($kode_barang)
	{
		$where = array('kode_barang' => $kode_barang);
		$data['barang'] = $this->M_master->edit_data($where, 'tb_barang')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('barang/index', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id_kategori = $this->input->post('id_kategori');
		$kode_barang = $this->input->post('kode_barang');
		$nama_barang = $this->input->post('nama_barang');
		$stok_barang = $this->input->post('stok_barang');
		$harga_jual = $this->input->post('harga_jual');

		$data = array(
			'id_kategori'  => $id_kategori,
			'kode_barang'  => $kode_barang,
			'nama_barang'  => $nama_barang,
			'stok_barang'  => $stok_barang,
			'harga_jual' => str_replace(".", "", $harga_jual)
		);

		$where = array(
			'kode_barang' => $kode_barang
		);

		$this->M_master->update_data($where, $data, 'tb_barang');
		redirect('barang/index');
	}

	// public function get_all_barang()
	// {
	// 	$data = $this->M_master->lihat_nama_barang($_POST['nama_barang']);
	// 	echo json_encode($data);
	// }

	public function hapus($kode_barang)
	{
		$where = array('kode_barang' => $kode_barang);
		$this->M_master->hapus_data($where, 'tb_barang');
		redirect('barang/index');
	}

	public function hapus_semua()
	{
		$this->M_master->hapus_semua_data('tb_barang');
		redirect('Barang/index');
	}

	public function print_pdf()
	{
		$options = new Options();
		$options->setIsRemoteEnabled(true);
		$dompdf = new Dompdf($options);
		$dompdf->setPaper('A4', 'Potrait');


		$data['kategori_barang'] = $this->M_master->tampil_data('tb_kategori')->result();
		$data['barang'] = $this->M_master->getBarang();
		// $data['sum_terjual'] = $this->M_detail_penjualan->sum_terjual();
		$html = $this->load->view('admin/laporan/report_barang', $data, true);

		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Barang ' . date('d F Y'), array("Attachment" => false));
	}

	public function getUbah()
	{
		echo json_encode($this->M_master->getBarangById($_POST['id']));
	}
}

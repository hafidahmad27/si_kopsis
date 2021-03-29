<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\dompdf;
use Dompdf\Options;

class Stok_Masuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_master');
	}

	public function index()
	{
		$data['supplier'] = $this->M_master->tampil_data('tb_supplier')->result();
		$data['barang'] = $this->M_master->tampil_data('tb_barang')->result();
		$data['stok_masuk'] = $this->M_master->getStokMasuk();

		if ($this->session->userdata('status') == 'login') {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/stok_masuk', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function tambah_aksi()
	{
		$id_barang = $this->input->post('id_barang');
		$id_supplier = $this->input->post('id_supplier');
		$tanggal_stok_masuk = $this->input->post('tanggal_stok_masuk');
		$jam_stok_masuk = $this->input->post('jam_stok_masuk');
		$jumlah_stok_masuk = $this->input->post('jumlah_stok_masuk');
		$harga_beli = $this->input->post('harga_beli');
		$total_harga_beli = $this->input->post('total_harga_beli');

		$data = array(
			'id_barang'  => $id_barang,
			'id_supplier'  => $id_supplier,
			'tanggal_stok_masuk'  => $tanggal_stok_masuk,
			'jam_stok_masuk'  => $jam_stok_masuk,
			'jumlah_stok_masuk'  => $jumlah_stok_masuk,
			'harga_beli'  => $harga_beli,
			'total_harga_beli'  => $total_harga_beli
		);

		$this->M_master->input_data($data, 'tb_stok_masuk');
		redirect('stok_masuk/index');
	}

	public function edit($id_stok_masuk)
	{
		$where = array('id_stok_masuk' => $id_stok_masuk);
		$data['stok_masuk'] = $this->M_master->edit_data($where, 'tb_stok_masuk')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('stok_masuk/index', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id_stok_masuk = $this->input->post('id_stok_masuk');
		$id_barang = $this->input->post('id_barang');
		$id_supplier = $this->input->post('id_supplier');
		$tanggal_stok_masuk = $this->input->post('tanggal_stok_masuk');
		$jam_stok_masuk = $this->input->post('jam_stok_masuk');
		$jumlah_stok_masuk = $this->input->post('jumlah_stok_masuk');
		$harga_beli = $this->input->post('harga_beli');
		$total_harga_beli = $this->input->post('total_harga_beli');

		$data = array(
			'id_stok_masuk'  => $id_stok_masuk,
			'id_barang'  => $id_barang,
			'id_supplier'  => $id_supplier,
			'tanggal_stok_masuk'  => $tanggal_stok_masuk,
			'jam_stok_masuk'  => $jam_stok_masuk,
			'jumlah_stok_masuk'  => $jumlah_stok_masuk,
			'harga_beli'  => $harga_beli,
			'total_harga_beli'  => $total_harga_beli
		);

		$where = array(
			'id_stok_masuk' => $id_stok_masuk
		);

		$this->M_master->update_data($where, $data, 'tb_stok_masuk');
		redirect('stok_masuk/index');
	}

	public function hapus($id_stok_masuk)
	{
		$where = array('id_stok_masuk' => $id_stok_masuk);
		$this->M_master->hapus_data($where, 'tb_stok_masuk');
		redirect('stok_masuk/index');
	}

	public function hapus_semua()
	{
		$this->M_master->hapus_semua_data('tb_stok_masuk');
		$this->db->query("UPDATE tb_barang SET stok_barang = 0");
		redirect('Stok_Masuk/index');
	}

	public function print_pdf()
	{
		$options = new Options();
		$options->setIsRemoteEnabled(true);
		$dompdf = new Dompdf($options);
		$dompdf->setPaper('A4', 'Potrait');

		$data['supplier'] = $this->M_master->tampil_data('tb_supplier')->result();
		$data['barang'] = $this->M_master->tampil_data('tb_barang')->result();
		$data['stok_masuk'] = $this->M_master->getStokMasuk();
		$data['sum_total_harga_beli'] = $this->M_master->sum_total_harga_beli();
		$html = $this->load->view('admin/laporan/report_stok_masuk', $data, true);

		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Stok Masuk  ' . date('d F Y'), array("Attachment" => false));
	}

	public function getUbah()
	{
		echo json_encode($this->M_master->getStokMasukById($_POST['id']));
	}
}

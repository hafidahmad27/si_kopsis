<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\dompdf;
use Dompdf\Options;

class Stok_Keluar extends CI_Controller
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
		$data['stok_keluar'] = $this->M_master->getStokKeluar();

		if ($this->session->userdata('status') == 'login') {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/stok_keluar', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function tambah_aksi()
	{
		$id_barang = $this->input->post('id_barang');
		$id_supplier = $this->input->post('id_supplier');
		$tanggal_stok_keluar = $this->input->post('tanggal_stok_keluar');
		$jam_stok_keluar = $this->input->post('jam_stok_keluar');
		$jumlah_stok_keluar = $this->input->post('jumlah_stok_keluar');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_barang'  => $id_barang,
			'id_supplier'  => $id_supplier,
			'tanggal_stok_keluar'  => $tanggal_stok_keluar,
			'jam_stok_keluar'  => $jam_stok_keluar,
			'jumlah_stok_keluar'  => $jumlah_stok_keluar,
			'keterangan' => $keterangan
		);

		$this->M_master->input_data($data, 'tb_stok_keluar');
		redirect('stok_keluar/index');
	}

	public function edit($id_stok_keluar)
	{
		$where = array('id_stok_keluar' => $id_stok_keluar);
		$data['stok_keluar'] = $this->M_master->edit_data($where, 'tb_stok_keluar')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('stok_keluar/index', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id_stok_keluar = $this->input->post('id_stok_keluar');
		$id_barang = $this->input->post('id_barang');
		$id_supplier = $this->input->post('id_supplier');
		$tanggal_stok_keluar = $this->input->post('tanggal_stok_keluar');
		$jam_stok_keluar = $this->input->post('jam_stok_keluar');
		$jumlah_stok_keluar = $this->input->post('jumlah_stok_keluar');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_stok_keluar'  => $id_stok_keluar,
			'id_barang'  => $id_barang,
			'id_supplier'  => $id_supplier,
			'tanggal_stok_keluar'  => $tanggal_stok_keluar,
			'jam_stok_keluar'  => $jam_stok_keluar,
			'jumlah_stok_keluar'  => $jumlah_stok_keluar,
			'keterangan' => $keterangan
		);

		$where = array(
			'id_stok_keluar' => $id_stok_keluar
		);

		$this->M_master->update_data($where, $data, 'tb_stok_keluar');
		redirect('stok_keluar/index');
	}

	public function hapus($id_stok_keluar)
	{
		$where = array('id_stok_keluar' => $id_stok_keluar);
		$this->M_master->hapus_data($where, 'tb_stok_keluar');
		redirect('stok_keluar/index');
	}

	public function hapus_semua()
	{
		$this->M_master->hapus_semua_data('tb_stok_keluar');
		redirect('Stok_Keluar/index');
	}

	public function print_pdf()
	{
		$options = new Options();
		$options->setIsRemoteEnabled(true);
		$dompdf = new Dompdf($options);
		$dompdf->setPaper('A4', 'Potrait');

		$data['supplier'] = $this->M_master->tampil_data('tb_supplier')->result();
		$data['barang'] = $this->M_master->tampil_data('tb_barang')->result();
		$data['stok_keluar'] = $this->M_master->getStokKeluar();
		$html = $this->load->view('admin/laporan/report_stok_keluar', $data, true);

		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Stok Keluar ' . date('d F Y'), array("Attachment" => false));
	}

	public function getUbah()
	{
		echo json_encode($this->M_master->getStokKeluarById($_POST['id']));
	}
}

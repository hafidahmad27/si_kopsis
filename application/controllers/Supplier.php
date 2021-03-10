<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\dompdf;
use Dompdf\Options;

class Supplier extends CI_Controller
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
		if ($this->session->userdata('status') == 'login') {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/supplier', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function tambah_aksi()
	{
		$nama_supplier = $this->input->post('nama_supplier');
		$alamat_supplier = $this->input->post('alamat_supplier');
		$telepon = $this->input->post('telepon');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nama_supplier' => $nama_supplier,
			'alamat_supplier' => $alamat_supplier,
			'telepon' => $telepon,
			'keterangan' => $keterangan
		);

		$this->M_master->input_data($data, 'tb_supplier');
		redirect('supplier/index');
	}

	public function edit($id_supplier)
	{
		$where = array('id_supplier' => $id_supplier);
		$data['supplier'] = $this->M_master->edit_data($where, 'tb_supplier')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('supplier/index', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id_supplier = $this->input->post('id_supplier');
		$nama_supplier = $this->input->post('nama_supplier');
		$alamat_supplier = $this->input->post('alamat_supplier');
		$telepon = $this->input->post('telepon');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nama_supplier' => $nama_supplier,
			'alamat_supplier' => $alamat_supplier,
			'telepon' => $telepon,
			'keterangan' => $keterangan
		);

		$where = array(
			'id_supplier' => $id_supplier
		);

		$this->M_master->update_data($where, $data, 'tb_supplier');
		redirect('Supplier/index');
	}

	public function hapus($id_supplier)
	{
		$where = array('id_supplier' => $id_supplier);
		$this->M_master->hapus_data($where, 'tb_supplier');
		redirect('Supplier/index');
	}

	public function hapus_semua()
	{
		$this->M_master->hapus_semua_data('tb_supplier');
		redirect('Supplier/index');
	}

	public function print_pdf()
	{
		$options = new Options();
		$options->setIsRemoteEnabled(true);
		$dompdf = new Dompdf($options);
		$dompdf->setPaper('A4', 'Potrait');

		$data['supplier'] = $this->M_master->tampil_data('tb_supplier')->result();
		// $data['sum_terjual'] = $this->M_detail_penjualan->sum_terjual();
		$html = $this->load->view('admin/laporan/report_supplier', $data, true);

		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Data Supplier ' . date('d F Y'), array("Attachment" => false));
	}

	public function getUbah()
	{
		echo json_encode($this->M_master->getSupplierById($_POST['id']));
	}
}

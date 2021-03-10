<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
	}

	public function index()
	{
		$data['kategori_barang'] = $this->M_master->tampil_data('tb_kategori')->result();
		if ($this->session->userdata('status') == 'login') {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('admin/kategori_barang', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->view('login');
		}
	}

	public function tambah_aksi()
	{
		$nama_kategori = $this->input->post('nama_kategori');

		$data = array(
			'nama_kategori' => $nama_kategori
		);

		$this->M_master->input_data($data, 'tb_kategori');
		redirect('kategori_barang/index');
	}

	public function edit($id_kategori)
	{
		$where = array('id_kategori' => $id_kategori);
		$data['kategori'] = $this->M_master->edit_data($where, 'tb_kategori')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kategori_barang/index', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');

		$data = array(
			'nama_kategori' => $nama_kategori
		);

		$where = array(
			'id_kategori' => $id_kategori
		);

		$this->M_master->update_data($where, $data, 'tb_kategori');
		redirect('Kategori_Barang/index');
	}

	public function hapus($id_kategori)
	{
		$where = array('id_kategori' => $id_kategori);
		$this->M_master->hapus_data($where, 'tb_kategori');
		redirect('Kategori_Barang/index');
	}

	public function hapus_semua()
	{
		$this->M_master->hapus_semua_data('tb_kategori');
		redirect('Kategori_Barang/index');
	}

	public function getUbah()
	{
		echo json_encode($this->M_master->getKategoriById($_POST['id']));
	}
}

<?php

class M_detail_penjualan extends CI_Model
{
	public function tambah($data)
	{
		return $this->db->insert_batch('tb_detail_penjualan', $data);
	}

	public function lihat_no_penjualan($no_penjualan)
	{
		return $this->db->get_where('tb_detail_penjualan', ['no_penjualan' => $no_penjualan])->result();
	}

	public function hapus($no_penjualan)
	{
		return $this->db->delete('tb_detail_penjualan', ['no_penjualan' => $no_penjualan]);
	}

	public function getDetailPenjualanById($no_penjualan)
	{
		return $this->db->get_where('tb_detail_penjualan', array('no_penjualan' => $no_penjualan))->row();
	}

	public function barang_terjual()
	{
		$this->db->select('tanggal_penjualan, nama_barang, SUM(jumlah_barang) as jumlah_barang_terjual, SUM(sub_total) as sub_total');
		$this->db->from('tb_penjualan');
		$this->db->join('tb_detail_penjualan', 'tb_detail_penjualan.no_penjualan = tb_penjualan.no_penjualan');
		$this->db->group_by('nama_barang');
		$this->db->order_by('tanggal_penjualan', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	public function filters($tanggal_penjualan)
	{
		$this->db->select('tanggal_penjualan, nama_barang, SUM(jumlah_barang) as jumlah_barang_terjual');
		$this->db->from('tb_penjualan');
		$this->db->join('tb_detail_penjualan', 'tb_detail_penjualan.no_penjualan = tb_penjualan.no_penjualan');
		$this->db->where('tanggal_penjualan', $tanggal_penjualan);
		$this->db->group_by('nama_barang');

		$query = $this->db->get();
		return $query->result();
	}

	public function sum_terjual()
	{
		$this->db->select('SUM(jumlah_barang) as sum_jumlah_barang, SUM(sub_total) as total');
		$this->db->from('tb_detail_penjualan');

		$query = $this->db->get();
		return $query->result();
	}
}
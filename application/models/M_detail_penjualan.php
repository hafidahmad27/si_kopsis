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

	public function barang_terjual_a()
	{
		$this->db->select('tanggal_penjualan, tb_detail_penjualan.nama_barang, SUM(jumlah_barang) as jumlah_barang_terjual');
		$this->db->from('tb_barang');
		$this->db->join('tb_detail_penjualan', 'tb_detail_penjualan.nama_barang = tb_barang.nama_barang');
		$this->db->join('tb_penjualan', 'tb_detail_penjualan.no_penjualan = tb_penjualan.no_penjualan');
		$this->db->join('tb_kategori', 'tb_barang.id_kategori = tb_kategori.id_kategori');
		$this->db->group_by('tanggal_penjualan');
		$this->db->group_by('nama_barang');
		$this->db->order_by('tanggal_penjualan', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	public function barang_terjual_b()
	{
		$this->db->select('tanggal_penjualan, tb_detail_penjualan.nama_barang, tb_kategori.nama_kategori, tb_barang.harga_jual, SUM(jumlah_barang) as jumlah_barang_terjual, SUM(sub_total) as sub_total');
		$this->db->from('tb_barang');
		$this->db->join('tb_detail_penjualan', 'tb_detail_penjualan.nama_barang = tb_barang.nama_barang');
		$this->db->join('tb_penjualan', 'tb_detail_penjualan.no_penjualan = tb_penjualan.no_penjualan');
		$this->db->join('tb_kategori', 'tb_barang.id_kategori = tb_kategori.id_kategori');

		$this->db->group_by('nama_barang');
		$this->db->order_by('tanggal_penjualan', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	// public function tgl()
	// {
	// 	$this->db->select('tanggal_penjualan');
	// 	$this->db->from('tb_detail_penjualan');
	// 	$this->db->join('tb_penjualan', 'tb_detail_penjualan.no_penjualan = tb_penjualan.no_penjualan');
	// 	$this->db->group_by('tanggal_penjualan');

	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	public function sum_terjual()
	{
		$this->db->select('SUM(jumlah_barang) as sum_jumlah_barang, SUM(sub_total) as total');
		$this->db->from('tb_detail_penjualan');

		$query = $this->db->get();
		return $query->result();
	}

	public function keuntungan()
	{
		$this->db->select('tanggal_penjualan, tb_detail_penjualan.nama_barang, harga_beli, tb_detail_penjualan.harga_jual, ((tb_detail_penjualan.harga_jual)-(harga_beli)) as untung, SUM(jumlah_barang) as jumlah_terjual, ((tb_detail_penjualan.harga_jual-harga_beli)*SUM(jumlah_barang)) as subtotal_untung');
		$this->db->from('tb_barang');
		$this->db->join('tb_stok_masuk', 'tb_stok_masuk.id_barang = tb_barang.id_barang');
		$this->db->join('tb_detail_penjualan', 'tb_detail_penjualan.nama_barang = tb_barang.nama_barang');
		$this->db->join('tb_penjualan', 'tb_detail_penjualan.no_penjualan = tb_penjualan.no_penjualan');
		$this->db->group_by('tanggal_penjualan');
		$this->db->group_by('nama_barang');
		$this->db->order_by('tanggal_penjualan', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}
	public function sum_keuntungan()
	{
		$this->db->select('SUM((tb_detail_penjualan.harga_jual-harga_beli)*(jumlah_barang)) as total_keuntungan');
		$this->db->from('tb_barang');
		$this->db->join('tb_stok_masuk', 'tb_stok_masuk.id_barang = tb_barang.id_barang');
		$this->db->join('tb_detail_penjualan', 'tb_detail_penjualan.nama_barang = tb_barang.nama_barang');
		$this->db->join('tb_penjualan', 'tb_detail_penjualan.no_penjualan = tb_penjualan.no_penjualan');

		$query = $this->db->get();
		return $query->result();
	}
	public function sum_keuntungan_b()
	{
		$this->db->select('tanggal_penjualan, SUM((tb_detail_penjualan.harga_jual-harga_beli)*(jumlah_barang)) as total_keuntungan');
		$this->db->from('tb_barang');
		$this->db->join('tb_stok_masuk', 'tb_stok_masuk.id_barang = tb_barang.id_barang');
		$this->db->join('tb_detail_penjualan', 'tb_detail_penjualan.nama_barang = tb_barang.nama_barang');
		$this->db->join('tb_penjualan', 'tb_detail_penjualan.no_penjualan = tb_penjualan.no_penjualan');
		$this->db->group_by('tanggal_penjualan');

		$query = $this->db->get();
		return $query->result();
	}

	// public function filters($tanggal_awal, $tanggal_akhir)
	// {
	// 	$this->db->select('tanggal_penjualan, nama_barang, SUM(jumlah_barang) as jumlah_barang_terjual');
	// 	$this->db->from('tb_penjualan');
	// 	$this->db->join('tb_detail_penjualan', 'tb_detail_penjualan.no_penjualan = tb_penjualan.no_penjualan');
	// 	$this->db->where('tanggal_penjualan = ' . $tanggal_awal);
	// 	$this->db->where('tanggal_penjualan = ' . $tanggal_akhir);
	// 	$this->db->group_by('nama_barang');

	// 	$query = $this->db->get();
	// 	return $query->result();
	// }
}

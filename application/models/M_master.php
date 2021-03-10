<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_master extends CI_Model
{
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->query("SET FOREIGN_KEY_CHECKS=0;");
		$this->db->delete($table);
		$this->db->query("SET FOREIGN_KEY_CHECKS=1;");
		$this->db->query("ALTER TABLE " . $table . " AUTO_INCREMENT=1;");
	}

	public function hapus_semua_data($table)
	{
		$this->db->query("SET FOREIGN_KEY_CHECKS=0;");
		$this->db->truncate($table);
		$this->db->query("SET FOREIGN_KEY_CHECKS=1;");
	}

	public function getSupplierById($id_supplier)
	{
		return $this->db->get_where('tb_supplier', array('id_supplier' => $id_supplier))->row();
	}

	public function getKategoriById($id_kategori)
	{
		return $this->db->get_where('tb_kategori', array('id_kategori' => $id_kategori))->row();
	}

	public function getBarangById($kode_barang)
	{
		return $this->db->get_where('tb_barang', array('kode_barang' => $kode_barang))->row();
	}

	public function getStokMasukById($id_stok_masuk)
	{
		return $this->db->get_where('tb_stok_masuk', array('id_stok_masuk' => $id_stok_masuk))->row();
	}

	public function getStokKeluarById($id_stok_keluar)
	{
		return $this->db->get_where('tb_stok_keluar', array('id_stok_keluar' => $id_stok_keluar))->row();
	}

	public function getUserById($id_user)
	{
		return $this->db->get_where('tb_user', array('id_user' => $id_user))->row();
	}

	public function getBarang()
	{
		$this->db->select('id_barang, kode_barang, nama_barang, stok_barang, harga_jual, nama_kategori');
		$this->db->from('tb_kategori');
		$this->db->join('tb_barang', 'tb_barang.id_kategori = tb_kategori.id_kategori');
		$query = $this->db->get();
		return $query->result();
	}

	public function getStokMasuk()
	{
		$this->db->select('id_stok_masuk, tanggal_stok_masuk, jam_stok_masuk, nama_barang, jumlah_stok_masuk, harga_beli, total_harga_beli, nama_supplier');
		$this->db->from('tb_barang');
		$this->db->join('tb_stok_masuk', 'tb_stok_masuk.id_barang = tb_barang.id_barang');
		$this->db->join('tb_supplier', 'tb_stok_masuk.id_supplier = tb_supplier.id_supplier');
		$this->db->order_by('tanggal_stok_masuk', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getStokKeluar()
	{
		$this->db->select('id_stok_keluar, tanggal_stok_keluar, jam_stok_keluar, nama_barang, jumlah_stok_keluar, nama_supplier, tb_stok_keluar.keterangan');
		$this->db->from('tb_barang');
		$this->db->join('tb_stok_keluar', 'tb_stok_keluar.id_barang = tb_barang.id_barang');
		$this->db->join('tb_supplier', 'tb_stok_keluar.id_supplier = tb_supplier.id_supplier');
		$this->db->order_by('tanggal_stok_keluar', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public $kode_barang;

	public function cekkodebarang()
	{
		$query = $this->db->query("SELECT MAX(kode_barang) as kodebarang from tb_barang");
		$hasil = $query->row();
		return $hasil->kodebarang;
	}

	public function lihat_stok()
	{
		$query = $this->db->get_where('tb_barang', 'stok_barang > 0');
		return $query->result();
	}

	public function lihat_id($kode_barang)
	{
		$query = $this->db->get_where('tb_barang', ['kode_barang' => $kode_barang]);
		return $query->row();
	}

	public function lihat_nama_barang($nama_barang)
	{
		$query = $this->db->select('*');
		$query = $this->db->where(['nama_barang' => $nama_barang]);
		$query = $this->db->get('tb_barang');
		return $query->row();
	}

	public function min_stok($stok, $nama_barang)
	{
		$query = $this->db->set('stok_barang', 'stok_barang-' . $stok, false);
		$query = $this->db->where('nama_barang', $nama_barang);
		$query = $this->db->update('tb_barang');
		return $query;
	}
}

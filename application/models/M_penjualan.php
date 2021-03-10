<?php

class M_penjualan extends CI_Model
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
		$this->db->delete($table);
	}
	protected $_table = 'tb_penjualan';

	public function lihat()
	{
		return $this->db->get($this->_table)->result();
	}

	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_penjualan($no_penjualan)
	{
		return $this->db->get_where($this->_table, ['no_penjualan' => $no_penjualan])->row();
	}

	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_penjualan)
	{
		return $this->db->delete($this->_table, ['no_penjualan' => $no_penjualan]);
	}

	public function hapus_semua_data()
	{
		$this->db->query("TRUNCATE tb_penjualan");
		$this->db->query("TRUNCATE tb_detail_penjualan");
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function login()
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('tb_user')->row();
	}

	public function getUser($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('tb_user');
	}
}

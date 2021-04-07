<?php

class M_users extends CI_Model
{
	private $table = 'users';
	public function cekLogin($email, $pass)
	{
		// select * from users where email = $email and password = $pass

		$this->db->where('email', $email);
		$this->db->where('password', $pass);
		return $this->db->get($this->table);
	}
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function checkUser($email)
	{
		return $this->db->where('email', $email)->get('tb_user')->row_array();
	}

	public function checkPassword($user)
	{
		if (!empty($user['email'])) {
			$value = array(
				'email' => $user['email'],
				'password' => sha1($user['password'])
			);
			$query = $this->db->get_where('tb_user', $value);
			if ($query->row_array()) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	public function registarsi($data)
	{
		return $this->db->insert('tb_user', $data);
	}
}

<?php

/**
 * 
 */
class Login_model extends CI_model
{
	
	function login($email,$password)
	{
		$this->db->where('email', $nip);
		$this->db->where('password', $password);
		$result = $this->db->get_where('user', ['email' => $email]);
		return $result;
	}

	function is_role()
	{
		return $this->session->userdata('role_id');
	}
} 




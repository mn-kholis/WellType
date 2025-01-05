<?php 
class Madmin extends CI_Model{

	function login($inputan){
		$username = $inputan['username'];
		$password = $inputan['password'];
		$password = sha1($password);

		$this->db->where('username_admin', $username);
		$this->db->where('password_admin', $password);
		$q = $this->db->get('admin');
		$cekadmin = $q->row_array();

		if (!empty($cekadmin)) {
			$this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
			$this->session->set_userdata("username", $cekadmin["username_admin"]);
			$this->session->set_userdata("status_admin", $cekadmin["status_admin"]);
			return "ada";
		} else{
			return "tidak ada";
		}
	}
}
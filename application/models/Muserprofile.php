<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muserprofile extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan profil pengguna berdasarkan username
    public function get_user_profile($username) {
        $this->db->where('username_user', $username);
        $query = $this->db->get('user');
        return $query->row(); // Mengambil satu baris data pengguna
    }
}
?>

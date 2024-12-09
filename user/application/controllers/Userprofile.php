<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprofile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model Muserprofile untuk mengakses data pengguna
        $this->load->model('Muserprofile');
        // Pastikan pengguna sudah login
        // if (!$this->session->userdata('username')) {
        //     redirect('auth/signin'); // Redirect ke halaman login jika belum login
        // }
    }

    public function index() {
        // Ambil data pengguna berdasarkan username yang tersimpan di session
        $username = 'example';//$this->session->userdata('username');
        $data['user'] = $this->Muserprofile->get_user_profile($username);

        // Tampilkan halaman profil dengan data pengguna
        $this->load->view('userprofile', $data);
    }
}
?>

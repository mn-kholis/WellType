<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

public function __construct() {
    parent::__construct();
    // Load library form_validation
    $this->load->library('form_validation');
}

public function index() {
    // Menampilkan view yang berisi form sign in dan sign up
    $this->load->view('auth_view'); // Ganti 'auth_view' dengan nama file view Anda
}

public function signup() {
    // Aturan validasi untuk signup
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[20]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

    // Jika validasi gagal
    if ($this->form_validation->run() == FALSE) {
        // Tampilkan kembali view dengan error
        // $this->session->set_flashdata('error', validation_errors());
        $this->load->view('auth_view');
    } else {
        // Ambil data dari form
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        // Lakukan penyimpanan data ke database
        // Misalnya: $this->User _model->register($username, $email, $password);
        
        // Redirect atau tampilkan pesan sukses
        redirect('auth/index'); // Kembali ke halaman form setelah signup
    }
}

public function signin() {
    // Aturan validasi untuk signin
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    // Jika validasi gagal
    if ($this->form_validation->run() == FALSE) {
        // Tampilkan kembali view dengan error
        $this->load->view('auth_view');
    } else {
        // Ambil data dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        // Lakukan validasi kredensial
        // Misalnya: if ($this->User _model->login($username, $password)) {
        
        // Redirect atau tampilkan pesan sukses
        redirect('dashboard'); // Ganti dengan URL tujuan setelah login
    }
}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typing extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mtyping');
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth'); // Redirect ke halaman login jika belum login
        }
    }

    public function index() {
        // Ambil teks target dari database
        $data['target_text'] = $this->Mtyping->getTargetText();
        $data['desk_text'] = $this->Mtyping->getDeskripsiText();
        $data['judul_text'] = $this->Mtyping->getJudulText();
        $this->load->view('typing', $data);
    }
}

